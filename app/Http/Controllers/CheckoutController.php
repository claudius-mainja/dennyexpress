<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Http\Requests\CheckoutRequest;
use App\Models\Order;
use App\Services\CartService;
use App\Services\OrderService;
use App\Services\OrderStatusNotifier;
use App\Services\Payments\PaymentGatewayManager;

class CheckoutController extends Controller
{
    protected CartService $cart;
    protected OrderService $orderService;
    protected OrderStatusNotifier $notifier;
    protected PaymentGatewayManager $gatewayManager;

    public function __construct(
        CartService $cart,
        OrderService $orderService,
        OrderStatusNotifier $notifier,
        PaymentGatewayManager $gatewayManager
    ) {
        $this->cart = $cart;
        $this->orderService = $orderService;
        $this->notifier = $notifier;
        $this->gatewayManager = $gatewayManager;
    }

    public function index()
    {
        $cart = $this->cart->toArray();

        if ($cart['count'] === 0) {
            return redirect()->route('cart.index')->with('info', 'Your cart is empty.');
        }

        $enabledGateways = $this->gatewayManager->getEnabledGateways();
        $provinces = array_keys(config('shipping.provinces', []));

        return view('checkout.index', compact('cart', 'enabledGateways', 'provinces'));
    }

    public function store(CheckoutRequest $request)
    {
        $cart = $this->cart->toArray();

        if ($cart['count'] === 0) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
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

        $shipping = $billing;

        $shippingProvince = $request->shipping_province;
        $shippingCost = config('shipping.provinces.' . $shippingProvince, 250.00);

        try {
            $order = $this->orderService->createOrderFromCart(
                $billing,
                $shipping,
                $request->payment_method,
                $shippingCost,
                shippingProvince: $shippingProvince,
            );

            if ($request->filled('notes')) {
                $order->update(['notes' => $request->notes]);
            }

            $this->notifier->notifyNewOrder($order);

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
