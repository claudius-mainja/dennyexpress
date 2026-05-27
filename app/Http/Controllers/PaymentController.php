<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Enums\PaymentMethod;
use App\Enums\PaymentStatus;
use App\Models\Order;
use App\Services\PayFastService;
use App\Services\OzowService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    protected PayFastService $payFast;
    protected OzowService $ozow;

    public function __construct(PayFastService $payFast, OzowService $ozow)
    {
        $this->payFast = $payFast;
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
            case PaymentMethod::PAYFAST:
                return $this->redirectToPayFast($order);
            
            case PaymentMethod::OZOW:
                return $this->redirectToOzow($order);
            
            case PaymentMethod::PAYJUSTNOW:
                return view('payment.payjustnow', compact('order'));
            
            case PaymentMethod::BANK_TRANSFER:
            case PaymentMethod::CASH_ON_DELIVERY:
                return redirect()->route('checkout.success', $order->order_number)
                    ->with('info', 'Your order has been placed. Please follow the payment instructions.');
            
            default:
                return redirect()->route('checkout.success', $order->order_number)
                    ->with('info', 'Your order has been placed.');
        }
    }

    protected function redirectToPayFast(Order $order)
    {
        $payment = $this->payFast->createPaymentRequest($order);

        return view('payment.redirect', [
            'url' => $payment['url'],
            'data' => $payment['data'],
            'gateway' => 'PayFast',
        ]);
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
            case 'payfast':
                return $this->handlePayFastNotification($request);
            
            case 'ozow':
                return $this->handleOzowNotification($request);
            
            default:
                Log::warning("Unknown payment gateway: {$gateway}");
                return response('Unknown gateway', 400);
        }
    }

    protected function handlePayFastNotification(Request $request)
    {
        $data = $request->all();

        $signatureValid = $this->payFast->validateSignature($data);
        if (!$signatureValid) {
            Log::warning('PayFast: Invalid signature', $data);
            return response('Invalid signature', 400);
        }

        $ipValid = $this->payFast->validateServerIp($request->ip());
        if (!$ipValid) {
            Log::warning('PayFast: Invalid IP: ' . $request->ip());
        }

        $verification = $this->payFast->verifyPayment($data);
        if (!$verification['valid']) {
            Log::warning('PayFast: Payment validation failed', $verification);
            return response('Validation failed', 400);
        }

        $paymentStatus = strtolower($data['payment_status'] ?? '');
        $orderNumber = $data['m_payment_id'] ?? $data['item_name'] ?? '';

        $order = Order::where('order_number', $orderNumber)->first();
        if (!$order) {
            Log::error("PayFast: Order not found: {$orderNumber}");
            return response('Order not found', 404);
        }

        if ($paymentStatus === 'complete') {
            $order->update([
                'payment_status' => PaymentStatus::COMPLETED->value,
                'status' => OrderStatus::PROCESSING->value,
                'transaction_id' => $data['pf_payment_id'] ?? null,
                'paid_at' => now(),
            ]);
            Log::info("PayFast: Order {$order->order_number} marked as paid");
        } else {
            $order->update([
                'payment_status' => PaymentStatus::FAILED->value,
            ]);
            Log::info("PayFast: Order {$order->order_number} payment {$paymentStatus}");
        }

        return response('OK');
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
