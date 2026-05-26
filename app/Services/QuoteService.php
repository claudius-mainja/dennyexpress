<?php

namespace App\Services;

use App\Enums\QuoteStatus;
use App\Models\Product;
use App\Models\Quote;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class QuoteService
{
    public function createQuoteFromArray(array $data, array $products): Quote
    {
        $quote = Quote::create([
            'uuid' => (string) Str::uuid(),
            'user_id' => auth()->id(),
            'session_id' => $this->getSessionId(),
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'company' => $data['company'] ?? null,
            'message' => $data['message'] ?? null,
            'status' => QuoteStatus::PENDING->value,
        ]);

        foreach ($products as $item) {
            $productId = $item['product_id'] ?? $item['id'] ?? null;
            $quantity = $item['quantity'] ?? 1;
            $notes = $item['notes'] ?? null;

            $product = Product::find($productId);
            if (!$product) {
                continue;
            }

            $quote->items()->create([
                'product_id' => $product->id,
                'quantity' => $quantity,
                'price_at_time' => $product->sale_price ?? $product->price,
                'notes' => $notes,
            ]);
        }

        return $quote->load('items.product');
    }

    public function addToExistingQuote(Quote $quote, int $productId, int $quantity = 1): Quote
    {
        $product = Product::findOrFail($productId);

        $existing = $quote->items()->where('product_id', $productId)->first();
        if ($existing) {
            $existing->increment('quantity', $quantity);
        } else {
            $quote->items()->create([
                'product_id' => $productId,
                'quantity' => $quantity,
                'price_at_time' => $product->sale_price ?? $product->price,
            ]);
        }

        return $quote->fresh()->load('items.product');
    }

    public function getCurrentQuote(): ?Quote
    {
        if (auth()->check()) {
            return Quote::where('user_id', auth()->id())
                ->where('status', QuoteStatus::PENDING->value)
                ->with('items.product')
                ->latest()
                ->first();
        }

        return Quote::where('session_id', $this->getSessionId())
            ->where('status', QuoteStatus::PENDING->value)
            ->with('items.product')
            ->latest()
            ->first();
    }

    public function convertToOrder(Quote $quote): void
    {
        $quote->update(['status' => QuoteStatus::CONVERTED->value]);
    }

    protected function getSessionId(): string
    {
        $id = Session::get('quote_session_id');
        if (!$id) {
            $id = (string) Str::uuid();
            Session::put('quote_session_id', $id);
        }
        return $id;
    }
}
