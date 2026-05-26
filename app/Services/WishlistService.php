<?php

namespace App\Services;

use App\Models\Product;
use App\Models\Wishlist;
use App\Models\WishlistItem;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class WishlistService
{
    protected string $sessionKey = 'wishlist_session_id';

    protected string $sessionDataKey = 'wishlist_items';

    public function add(int $productId): bool
    {
        Product::findOrFail($productId);

        if (auth()->check()) {
            $wishlist = $this->getDbWishlist();
            if ($wishlist->items()->where('product_id', $productId)->exists()) {
                return false;
            }
            $wishlist->items()->create(['product_id' => $productId]);
            return true;
        }

        $items = $this->getSessionItems();
        if (in_array($productId, $items)) {
            return false;
        }
        $items[] = $productId;
        Session::put($this->sessionDataKey, array_unique($items));
        return true;
    }

    public function remove(int $productId): void
    {
        if (auth()->check()) {
            $wishlist = $this->getDbWishlist();
            $wishlist->items()->where('product_id', $productId)->delete();
            return;
        }

        $items = $this->getSessionItems();
        $items = array_values(array_diff($items, [$productId]));
        Session::put($this->sessionDataKey, $items);
    }

    public function toggle(int $productId): bool
    {
        if ($this->isInWishlist($productId)) {
            $this->remove($productId);
            return false;
        }

        $this->add($productId);
        return true;
    }

    public function clear(): void
    {
        if (auth()->check()) {
            $this->getDbWishlist()->items()->delete();
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
            ->with('primaryImage')
            ->get();
    }

    public function count(): int
    {
        return count($this->getProductIds());
    }

    public function isInWishlist(int $productId): bool
    {
        return in_array($productId, $this->getProductIds());
    }

    public function moveToCart(int $productId, int $quantity = 1): void
    {
        if (!$this->isInWishlist($productId)) {
            return;
        }

        app(CartService::class)->add($productId, $quantity);
        $this->remove($productId);
    }

    protected function getDbWishlist(): Wishlist
    {
        return Wishlist::firstOrCreate(
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
            return $this->getDbWishlist()
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
