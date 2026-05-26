<?php

namespace App\Services;

use App\Models\CompareList;
use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CompareService
{
    protected int $maxItems = 4;

    protected string $sessionKey = 'compare_session_id';

    protected string $sessionDataKey = 'compare_items';

    public function add(int $productId): bool
    {
        Product::findOrFail($productId);

        if ($this->count() >= $this->maxItems) {
            return false;
        }

        if ($this->isInCompareList($productId)) {
            return false;
        }

        if (auth()->check()) {
            $list = $this->getDbCompareList();
            $list->items()->create(['product_id' => $productId]);
            return true;
        }

        $items = $this->getSessionItems();
        $items[] = $productId;
        Session::put($this->sessionDataKey, array_unique($items));
        return true;
    }

    public function remove(int $productId): void
    {
        if (auth()->check()) {
            $list = $this->getDbCompareList();
            $list->items()->where('product_id', $productId)->delete();
            return;
        }

        $items = $this->getSessionItems();
        $items = array_values(array_diff($items, [$productId]));
        Session::put($this->sessionDataKey, $items);
    }

    public function clear(): void
    {
        if (auth()->check()) {
            $this->getDbCompareList()->items()->delete();
            return;
        }

        Session::forget($this->sessionDataKey);
    }

    public function content(): Collection
    {
        $productIds = $this->getProductIds();

        if (empty($productIds)) {
            return collect();
        }

        return Product::whereIn('id', $productIds)
            ->with('primaryImage', 'categories')
            ->get();
    }

    public function count(): int
    {
        return count($this->getProductIds());
    }

    public function isInCompareList(int $productId): bool
    {
        return in_array($productId, $this->getProductIds());
    }

    public function maxItems(): int
    {
        return $this->maxItems;
    }

    protected function getDbCompareList(): CompareList
    {
        return CompareList::firstOrCreate(
            ['user_id' => auth()->id()],
            ['session_id' => $this->getSessionId()]
        );
    }

    protected function getSessionItems(): array
    {
        return Session::get($this->sessionDataKey, []);
    }

    protected function getProductIds(): array
    {
        if (auth()->check()) {
            return $this->getDbCompareList()
                ->items()
                ->pluck('product_id')
                ->toArray();
        }

        return $this->getSessionItems();
    }

    protected function getSessionId(): string
    {
        $id = Session::get($this->sessionKey);
        if (!$id) {
            $id = (string) Str::uuid();
            Session::put($this->sessionKey, $id);
        }
        return $id;
    }
}
