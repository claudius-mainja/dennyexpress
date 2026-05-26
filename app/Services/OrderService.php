<?php

namespace App\Services;

use App\Enums\OrderStatus;
use App\Enums\PaymentStatus;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Str;

class OrderService
{
    protected CartService $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function createOrderFromCart(array $billingData, array $shippingData, string $paymentMethod, ?float $shippingCost = 0, ?float $discount = 0): Order
    {
        $cart = $this->cartService->getCart();
        $items = $this->cartService->content();

        if ($items->isEmpty()) {
            throw new \RuntimeException('Cannot create order from empty cart.');
        }

        $subtotal = $this->cartService->total();
        $taxRate = 15;
        $tax = $this->cartService->taxAmount($taxRate);
        $total = $subtotal + $shippingCost + $tax - $discount;

        $order = Order::create([
            'order_number' => $this->generateOrderNumber(),
            'user_id' => auth()->id(),
            'status' => OrderStatus::PENDING->value,
            'subtotal' => $subtotal,
            'shipping' => $shippingCost ?? 0,
            'tax' => $tax,
            'discount' => $discount ?? 0,
            'total' => max(0, $total),
            'currency' => 'ZAR',
            'billing_name' => $billingData['name'],
            'billing_email' => $billingData['email'],
            'billing_phone' => $billingData['phone'],
            'billing_address' => $billingData['address'],
            'billing_city' => $billingData['city'],
            'billing_state' => $billingData['state'] ?? null,
            'billing_zip' => $billingData['zip'] ?? null,
            'billing_country' => $billingData['country'] ?? 'South Africa',
            'shipping_name' => $shippingData['name'] ?? $billingData['name'],
            'shipping_email' => $shippingData['email'] ?? $billingData['email'],
            'shipping_phone' => $shippingData['phone'] ?? $billingData['phone'],
            'shipping_address' => $shippingData['address'] ?? $billingData['address'],
            'shipping_city' => $shippingData['city'] ?? $billingData['city'],
            'shipping_state' => $shippingData['state'] ?? null,
            'shipping_zip' => $shippingData['zip'] ?? null,
            'shipping_country' => $shippingData['country'] ?? 'South Africa',
            'payment_method' => $paymentMethod,
            'payment_status' => PaymentStatus::PENDING->value,
        ]);

        foreach ($items as $cartItem) {
            $product = $cartItem->product;
            if (!$product) {
                continue;
            }

            $order->items()->create([
                'product_id' => $product->id,
                'product_name' => $product->name,
                'sku' => $product->sku,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->price,
                'subtotal' => $cartItem->price * $cartItem->quantity,
                'tax' => ($cartItem->price * $cartItem->quantity) * ($cartItem->tax_rate / 100),
                'total' => ($cartItem->price * $cartItem->quantity) * (1 + $cartItem->tax_rate / 100),
                'specifications' => $product->specifications,
            ]);

            $this->deductInventory($product, $cartItem->quantity);
        }

        $this->cartService->clear();

        return $order->load('items');
    }

    public function updateOrderStatus(Order $order, OrderStatus $status): void
    {
        $order->update(['status' => $status->value]);
    }

    public function calculateTotals(Order $order): Order
    {
        $subtotal = $order->items->sum(fn($item) => $item->price * $item->quantity);
        $tax = $order->items->sum('tax');
        $total = $subtotal + $order->shipping + $tax - $order->discount;

        $order->update([
            'subtotal' => round($subtotal, 2),
            'tax' => round($tax, 2),
            'total' => round(max(0, $total), 2),
        ]);

        return $order->fresh();
    }

    protected function deductInventory(Product $product, int $quantity): void
    {
        if ($product->stock_quantity !== null) {
            $product->decrement('stock_quantity', $quantity);
        }
    }

    protected function generateOrderNumber(): string
    {
        $prefix = 'DEN-';
        $timestamp = now()->format('YmdHis');
        $random = strtoupper(Str::random(4));
        $number = $prefix . $timestamp . $random;

        while (Order::where('order_number', $number)->exists()) {
            $random = strtoupper(Str::random(4));
            $number = $prefix . $timestamp . $random;
        }

        return $number;
    }
}
