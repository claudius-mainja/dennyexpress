<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CartService
{
    protected ?Cart $cart = null;

    protected string $sessionKey = 'cart_session_id';

    public function getCart(): Cart
    {
        if ($this->cart) {
            return $this->cart;
        }

        if (auth()->check()) {
            $this->cart = Cart::firstOrCreate(
                ['user_id' => auth()->id()],
                ['session_id' => $this->getSessionId()]
            );
        } else {
            $this->cart = Cart::firstOrCreate(
                ['session_id' => $this->getSessionId()],
                ['user_id' => null]
            );
        }

        return $this->cart;
    }

    public function add(int $productId, int $quantity = 1): CartItem
    {
        $product = Product::findOrFail($productId);
        $cart = $this->getCart();

        $existing = $cart->items()->where('product_id', $productId)->first();

        if ($existing) {
            $existing->increment('quantity', $quantity);
            return $existing->fresh();
        }

        return $cart->items()->create([
            'product_id' => $productId,
            'quantity' => $quantity,
            'price' => $product->sale_price ?? $product->price,
            'tax_rate' => 15.00,
        ]);
    }

    public function update(int $cartItemId, int $quantity): ?CartItem
    {
        $item = $this->getCart()->items()->findOrFail($cartItemId);

        if ($quantity <= 0) {
            $item->delete();
            return null;
        }

        $item->update(['quantity' => $quantity]);
        return $item->fresh();
    }

    public function remove(int $cartItemId): void
    {
        $this->getCart()->items()->findOrFail($cartItemId)->delete();
    }

    public function clear(): void
    {
        $this->getCart()->items()->delete();
    }

    public function content(): Collection
    {
        return $this->getCart()->items()->with('product.primaryImage')->get();
    }

    public function count(): int
    {
        return $this->getCart()->items()->sum('quantity');
    }

    public function total(): float
    {
        return round($this->content()->sum(fn(CartItem $item) => $item->price * $item->quantity), 2);
    }

    public function subtotal(): float
    {
        return $this->total();
    }

    public function totalWithTax(float $rate = 15): float
    {
        $total = $this->total();
        $tax = $total * ($rate / 100);
        return round($total + $tax, 2);
    }

    public function taxAmount(float $rate = 15): float
    {
        return round($this->total() * ($rate / 100), 2);
    }

    public function toArray(): array
    {
        return [
            'items' => $this->content()->map(fn(CartItem $item) => [
                'id' => $item->id,
                'product_id' => $item->product_id,
                'name' => $item->product?->name,
                'slug' => $item->product?->slug,
                'image' => $item->product?->primaryImage?->path,
                'quantity' => $item->quantity,
                'price' => (float) $item->price,
                'subtotal' => $item->subtotal,
                'tax_rate' => (float) $item->tax_rate,
            ])->values()->toArray(),
            'count' => $this->count(),
            'total' => $this->total(),
            'tax' => $this->taxAmount(),
            'grand_total' => $this->totalWithTax(),
        ];
    }

    public function mergePersistentToSession(): void
    {
        $sessionId = $this->getSessionId();
        $user = auth()->user();
        if (!$user) {
            return;
        }

        $sessionCart = Cart::where('session_id', $sessionId)
            ->whereNull('user_id')
            ->first();

        $userCart = Cart::firstOrCreate(
            ['user_id' => $user->id],
            ['session_id' => $sessionId]
        );

        if ($sessionCart && $sessionCart->id !== $userCart->id) {
            foreach ($sessionCart->items as $item) {
                $existing = $userCart->items()->where('product_id', $item->product_id)->first();
                if ($existing) {
                    $existing->increment('quantity', $item->quantity);
                } else {
                    $item->update(['cart_id' => $userCart->id]);
                }
            }
            $sessionCart->delete();
        }

        $this->cart = $userCart;
    }

    public function persistToDatabase(): void
    {
        $this->getCart()->touch();
    }

    public function getSessionId(): string
    {
        $id = Session::get($this->sessionKey);
        if (!$id) {
            $id = (string) Str::uuid();
            Session::put($this->sessionKey, $id);
        }
        return $id;
    }

    public function switchCartOnLogin(): void
    {
        $this->mergePersistentToSession();
    }
}
