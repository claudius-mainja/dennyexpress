<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Enums\PaymentMethod;
use App\Enums\PaymentStatus;
use App\Models\Order;
use App\Services\OzowService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    protected OzowService $ozow;

    public function __construct(OzowService $ozow)
    {
        $this->ozow = $ozow;
    }

    public function process(Order $order)
    {
        if ($order->payment_status === PaymentStatus::COMPLETED) {
            return redirect()->route('checkout.success', $order->order_number)
                ->with('info', 'This order has already been paid.');
        }

        switch ($order->payment_method) {
            case PaymentMethod::CARD:
            case PaymentMethod::OZOW:
                return $this->redirectToOzow($order);
            
            case PaymentMethod::PAYJUSTNOW:
                return view('payment.payjustnow', compact('order'));
            
            case PaymentMethod::BANK_TRANSFER:
                return redirect()->route('checkout.success', $order->order_number)
                    ->with('info', 'Your order has been placed. Please follow the payment instructions.');
            
            default:
                return redirect()->route('checkout.success', $order->order_number)
                    ->with('info', 'Your order has been placed.');
        }
    }

    protected function redirectToOzow(Order $order)
    {
        $payment = $this->ozow->createPaymentRequest($order);

        return redirect()->away($payment['redirectUrl']);
    }

    public function notify(Request $request, string $gateway)
    {
        Log::info("Payment notification received from {$gateway}", $request->all());

        switch (strtolower($gateway)) {
            case 'ozow':
                return $this->handleOzowNotification($request);
            
            default:
                Log::warning("Unknown payment gateway: {$gateway}");
                return response('Unknown gateway', 400);
        }
    }

    protected function handleOzowNotification(Request $request)
    {
        $data = $request->all();

        $valid = $this->ozow->validateNotification($data);
        if (!$valid) {
            Log::warning('Ozow: Invalid signature', $data);
            return response('Invalid signature', 400);
        }

        $orderNumber = $data['TransactionReference'] ?? '';
        $status = $data['Status'] ?? '';

        $order = Order::where('order_number', $orderNumber)->first();
        if (!$order) {
            Log::error("Ozow: Order not found: {$orderNumber}");
            return response('Order not found', 404);
        }

        if ($status === 'Complete') {
            $order->update([
                'payment_status' => PaymentStatus::COMPLETED->value,
                'status' => OrderStatus::PROCESSING->value,
                'transaction_id' => $data['TransactionId'] ?? null,
                'paid_at' => now(),
            ]);
            Log::info("Ozow: Order {$order->order_number} marked as paid");
        } else {
            $order->update([
                'payment_status' => PaymentStatus::FAILED->value,
            ]);
            Log::info("Ozow: Order {$order->order_number} payment status: {$status}");
        }

        return response('OK');
    }

    public function cancel()
    {
        return redirect()->route('cart.index')
            ->with('info', 'Payment was cancelled. Your items are still in your cart.');
    }

    public function error(string $order)
    {
        $orderModel = Order::where('order_number', $order)->first();

        return view('payment.error', compact('orderModel'));
    }
}
