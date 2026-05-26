<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Enums\PaymentMethod;
use App\Http\Requests\CheckoutRequest;
use App\Models\Order;
use App\Services\CartService;
use App\Services\OrderService;
use App\Services\PayFastService;

class CheckoutController extends Controller
{
    protected CartService $cart;

    protected OrderService $orderService;

    public function __construct(CartService $cart, OrderService $orderService)
    {
        $this->cart = $cart;
        $this->orderService = $orderService;
    }

    public function index()
    {
        $cart = $this->cart->toArray();

        if ($cart['count'] === 0) {
            return redirect()->route('cart')->with('info', 'Your cart is empty.');
        }

        $paymentMethods = PaymentMethod::cases();

        return view('checkout.index', compact('cart', 'paymentMethods'));
    }

    public function store(CheckoutRequest $request)
    {
        $cart = $this->cart->toArray();

        if ($cart['count'] === 0) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        $billing = [
            'name' => $request->billing_name,
            'email' => $request->billing_email,
            'phone' => $request->billing_phone,
            'address' => $request->billing_address,
            'city' => $request->billing_city,
            'state' => $request->billing_state,
            'zip' => $request->billing_zip,
            'country' => $request->billing_country ?? 'South Africa',
        ];

        $useShipping = !$request->boolean('shipping_same');
        $shipping = $useShipping ? [
            'name' => $request->shipping_name,
            'email' => $request->shipping_email,
            'phone' => $request->shipping_phone,
            'address' => $request->shipping_address,
            'city' => $request->shipping_city,
            'state' => $request->shipping_state,
            'zip' => $request->shipping_zip,
            'country' => $request->shipping_country ?? 'South Africa',
        ] : $billing;

        try {
            $order = $this->orderService->createOrderFromCart(
                $billing,
                $shipping,
                $request->payment_method
            );

            if ($request->filled('notes')) {
                $order->update(['notes' => $request->notes]);
            }

            return redirect()->route('payment.process', $order);
        } catch (\Exception $e) {
            report($e);
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function success(string $orderNumber)
    {
        $order = Order::with('items')
            ->where('order_number', $orderNumber)
            ->firstOrFail();

        return view('checkout.success', compact('order'));
    }

    public function cancel()
    {
        return view('checkout.cancel');
    }
}
