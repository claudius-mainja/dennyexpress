<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Enums\PaymentMethod;
use App\Enums\PaymentStatus;
use App\Models\Order;
use App\Services\OrderStatusNotifier;
use App\Services\OzowService;
use App\Services\PayFastService;
use App\Services\PayflexService;
use App\Services\Payments\PaymentGatewayManager;
use App\Services\Payments\PayJustNowService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    protected OzowService $ozow;
    protected PayFastService $payFast;
    protected PayflexService $payflex;
    protected PayJustNowService $payJustNow;
    protected OrderStatusNotifier $notifier;
    protected PaymentGatewayManager $gatewayManager;

    public function __construct(
        OzowService $ozow,
        PayFastService $payFast,
        PayflexService $payflex,
        PayJustNowService $payJustNow,
        OrderStatusNotifier $notifier,
        PaymentGatewayManager $gatewayManager
    ) {
        $this->ozow = $ozow;
        $this->payFast = $payFast;
        $this->payflex = $payflex;
        $this->payJustNow = $payJustNow;
        $this->notifier = $notifier;
        $this->gatewayManager = $gatewayManager;
    }

    public function process(Order $order)
    {
        if ($order->payment_status === PaymentStatus::COMPLETED) {
            return redirect()->route('checkout.success', $order->order_number)
                ->with('info', 'This order has already been paid.');
        }

        $paymentMethod = $order->payment_method instanceof \App\Enums\PaymentMethod
            ? $order->payment_method->value
            : $order->payment_method;

        $gateway = $this->gatewayManager->getGateway($paymentMethod);

        if ($gateway) {
            $this->configureServiceForGateway($paymentMethod, $gateway);
        }

        switch ($order->payment_method) {
            case PaymentMethod::CARD:
                return $this->redirectToPayFast($order);

            case PaymentMethod::OZOW:
                return $this->redirectToOzow($order);

            case PaymentMethod::PAYFAST:
                return $this->redirectToPayFast($order);

            case PaymentMethod::PAYFLEX:
                return $this->redirectToPayflex($order);

            case PaymentMethod::PAYJUSTNOW:
                return $this->redirectToPayJustNow($order);

            case PaymentMethod::BANK_TRANSFER:
                return redirect()->route('checkout.success', $order->order_number)
                    ->with('info', 'Your order has been placed. Please follow the payment instructions.');

            default:
                return redirect()->route('checkout.success', $order->order_number)
                    ->with('info', 'Your order has been placed.');
        }
    }

    protected function configureServiceForGateway(string $slug, array $gateway): void
    {
        match ($slug) {
            'ozow' => $this->ozow->configureForGateway(
                \App\Models\PaymentGateway::where('slug', $slug)->first()
            ),
            'payfast' => $this->payFast->configureForGateway(
                \App\Models\PaymentGateway::where('slug', $slug)->first()
            ),
            'payflex' => $this->payflex->configureForGateway(
                \App\Models\PaymentGateway::where('slug', $slug)->first()
            ),
            default => null,
        };
    }

    protected function redirectToOzow(Order $order)
    {
        try {
            $payment = $this->ozow->createPaymentRequest($order);
            return redirect()->away($payment['redirectUrl']);
        } catch (\Exception $e) {
            Log::error('Ozow redirect failed', [
                'order' => $order->order_number,
                'error' => $e->getMessage(),
            ]);
            return redirect()->route('checkout.index')
                ->with('error', 'Payment gateway is temporarily unavailable. Please try again.');
        }
    }

    protected function redirectToPayFast(Order $order)
    {
        try {
            $data = $this->payFast->initiateTransaction($order);
            return redirect()->away($data['redirect_url']);
        } catch (\Exception $e) {
            Log::error('PayFast redirect failed', [
                'order' => $order->order_number,
                'error' => $e->getMessage(),
            ]);
            return redirect()->route('checkout.index')
                ->with('error', 'Payment gateway is temporarily unavailable. Please try again.');
        }
    }

    protected function redirectToPayflex(Order $order)
    {
        try {
            $data = $this->payflex->createCheckout($order);

            if (empty($data['checkout_url'])) {
                throw new \RuntimeException('No checkout URL returned');
            }

            return redirect()->away($data['checkout_url']);
        } catch (\Exception $e) {
            Log::error('Payflex redirect failed', [
                'order' => $order->order_number,
                'error' => $e->getMessage(),
            ]);
            return redirect()->route('checkout.index')
                ->with('error', 'Payment gateway is temporarily unavailable. Please try again.');
        }
    }

    protected function redirectToPayJustNow(Order $order)
    {
        try {
            $data = $this->payJustNow->createPaymentRequest($order);
            return redirect()->away($data['redirect_url']);
        } catch (\Exception $e) {
            Log::error('PayJustNow redirect failed', [
                'order' => $order->order_number,
                'error' => $e->getMessage(),
            ]);
            return redirect()->route('checkout.index')
                ->with('error', 'Payment gateway is temporarily unavailable. Please try again.');
        }
    }

    public function notify(Request $request, string $gateway)
    {
        Log::info("Payment notification received from {$gateway}", $request->all());

        $this->gatewayManager->logPayment(
            gateway: $gateway,
            eventType: 'notification_received',
            payload: $request->all(),
            status: 'pending'
        );

        switch (strtolower($gateway)) {
            case 'ozow':
                return $this->handleOzowNotification($request);

            case 'payfast':
                return $this->handlePayFastNotification($request);

            case 'payflex':
                return $this->handlePayFlexNotification($request);

            case 'payjustnow':
                return $this->handlePayJustNowNotification($request);

            default:
                Log::warning("Unknown payment gateway: {$gateway}");
                return response('Unknown gateway', 400);
        }
    }

    protected function handleOzowNotification(Request $request)
    {
        $data = $request->all();

        $gateway = \App\Models\PaymentGateway::where('slug', 'ozow')->first();
        if ($gateway) {
            $this->ozow->configureForGateway($gateway);
        }

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
            $oldStatus = $order->status;
            $order->update([
                'payment_status' => PaymentStatus::COMPLETED->value,
                'status' => OrderStatus::PROCESSING->value,
                'transaction_id' => $data['TransactionId'] ?? null,
                'paid_at' => now(),
            ]);
            $order->refresh();
            $this->notifier->notify($order, $oldStatus);
            Log::info("Ozow: Order {$order->order_number} marked as paid");
        } else {
            $order->update([
                'payment_status' => PaymentStatus::FAILED->value,
            ]);
            Log::info("Ozow: Order {$order->order_number} payment status: {$status}");
        }

        return response('OK');
    }

    protected function handlePayFastNotification(Request $request)
    {
        try {
            $itnData = $this->payFast->handleItn($request);

            $order = Order::where('order_number', $itnData['order_number'])->first();
            if (!$order) {
                Log::error("PayFast: Order not found: {$itnData['order_number']}");
                return response('Order not found', 404);
            }

            if ($this->payFast->isSuccess($itnData)) {
                $oldStatus = $order->status;
                $order->update([
                    'payment_status' => PaymentStatus::COMPLETED->value,
                    'status' => OrderStatus::PROCESSING->value,
                    'transaction_id' => $itnData['transaction_id'],
                    'paid_at' => now(),
                ]);
                $order->refresh();
                $this->notifier->notify($order, $oldStatus);
                Log::info("PayFast: Order {$order->order_number} marked as paid");
            } else {
                $order->update([
                    'payment_status' => PaymentStatus::FAILED->value,
                ]);
                Log::info("PayFast: Order {$order->order_number} failed", $itnData);
            }

            return response('OK');
        } catch (\Exception $e) {
            Log::error('PayFast ITN error', ['error' => $e->getMessage()]);
            return response('Error', 400);
        }
    }

    protected function handlePayFlexNotification(Request $request)
    {
        $data = $request->all();
        $orderNumber = $data['merchant_reference'] ?? $data['reference'] ?? '';

        $order = Order::where('order_number', $orderNumber)->first();
        if (!$order) {
            Log::error("Payflex: Order not found: {$orderNumber}");
            return response('Order not found', 404);
        }

        $status = $data['status'] ?? '';

        if (in_array($status, ['completed', 'approved', 'success'])) {
            $oldStatus = $order->status;
            $order->update([
                'payment_status' => PaymentStatus::COMPLETED->value,
                'status' => OrderStatus::PROCESSING->value,
                'paid_at' => now(),
            ]);
            $order->refresh();
            $this->notifier->notify($order, $oldStatus);
            Log::info("Payflex: Order {$order->order_number} marked as paid");
        } else {
            $order->update([
                'payment_status' => PaymentStatus::FAILED->value,
            ]);
            Log::info("Payflex: Order {$order->order_number} status: {$status}");
        }

        return response('OK');
    }

    protected function handlePayJustNowNotification(Request $request)
    {
        $data = $request->all();

        $gateway = \App\Models\PaymentGateway::where('slug', 'payjustnow')->first();
        if ($gateway) {
            $this->payJustNow = \App\Services\Payments\PayJustNowService::fromGateway($gateway);
        }

        $valid = $this->payJustNow->validateNotification($data);
        if (!$valid) {
            Log::warning('PayJustNow: Invalid signature', $data);
            return response('Invalid signature', 400);
        }

        $orderNumber = $data['merchant_reference'] ?? $data['reference'] ?? '';
        $status = $data['status'] ?? '';

        $order = Order::where('order_number', $orderNumber)->first();
        if (!$order) {
            Log::error("PayJustNow: Order not found: {$orderNumber}");
            return response('Order not found', 404);
        }

        if (in_array($status, ['completed', 'success'])) {
            $oldStatus = $order->status;
            $order->update([
                'payment_status' => PaymentStatus::COMPLETED->value,
                'status' => OrderStatus::PROCESSING->value,
                'paid_at' => now(),
            ]);
            $order->refresh();
            $this->notifier->notify($order, $oldStatus);
            Log::info("PayJustNow: Order {$order->order_number} marked as paid");
        } else {
            $order->update([
                'payment_status' => PaymentStatus::FAILED->value,
            ]);
            Log::info("PayJustNow: Order {$order->order_number} status: {$status}");
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
