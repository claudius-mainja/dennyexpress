<?php

namespace App\Jobs;

use App\Models\Order;
use App\Services\OzowService;
use App\Services\PayFastService;
use App\Services\Payments\PaymentGatewayManager;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProcessPaymentNotification implements ShouldQueue
{
    use Dispatchable, Queueable;

    public string $gateway;
    public array $payload;
    public ?int $orderId;

    public function __construct(string $gateway, array $payload, ?int $orderId = null)
    {
        $this->gateway = $gateway;
        $this->payload = $payload;
        $this->orderId = $orderId;
    }

    public function handle(PaymentGatewayManager $gatewayManager): void
    {
        $order = $this->orderId ? Order::find($this->orderId) : null;

        $gatewayManager->logPayment(
            gateway: $this->gateway,
            eventType: 'webhook_received',
            payload: $this->payload,
            orderId: $this->orderId,
            status: 'processing'
        );

        try {
            match ($this->gateway) {
                'ozow' => $this->processOzow($gatewayManager, $order),
                'payfast' => $this->processPayFast($gatewayManager, $order),
                'payflex' => $this->processPayFlex($gatewayManager, $order),
                'payjustnow' => $this->processPayJustNow($gatewayManager, $order),
                default => Log::warning("Unknown gateway for queue processing: {$this->gateway}"),
            };

            $gatewayManager->logPayment(
                gateway: $this->gateway,
                eventType: 'webhook_processed',
                payload: $this->payload,
                orderId: $this->orderId,
                status: 'completed'
            );
        } catch (\Throwable $e) {
            Log::error("Payment notification processing failed for {$this->gateway}", [
                'error' => $e->getMessage(),
                'order_id' => $this->orderId,
            ]);

            $gatewayManager->logPayment(
                gateway: $this->gateway,
                eventType: 'webhook_failed',
                payload: $this->payload,
                response: ['error' => $e->getMessage()],
                orderId: $this->orderId,
                status: 'failed'
            );
        }
    }

    protected function processOzow(PaymentGatewayManager $gatewayManager, ?Order $order): void
    {
        if (!$order) {
            return;
        }

        $status = $this->payload['Status'] ?? '';
        $transactionId = $this->payload['TransactionId'] ?? null;

        if ($status === 'Complete') {
            $order->update([
                'payment_status' => 'completed',
                'status' => 'processing',
                'transaction_id' => $transactionId,
                'paid_at' => now(),
            ]);
        }
    }

    protected function processPayFast(PaymentGatewayManager $gatewayManager, ?Order $order): void
    {
        if (!$order) {
            return;
        }

        $resultCode = $this->payload['RESULT_CODE'] ?? '';
        $transactionId = $this->payload['TRANSACTION_ID'] ?? null;

        if ($resultCode === '00') {
            $order->update([
                'payment_status' => 'completed',
                'status' => 'processing',
                'transaction_id' => $transactionId,
                'paid_at' => now(),
            ]);
        }
    }

    protected function processPayFlex(PaymentGatewayManager $gatewayManager, ?Order $order): void
    {
        if (!$order) {
            return;
        }

        $status = $this->payload['status'] ?? '';

        if (in_array($status, ['completed', 'approved', 'success'])) {
            $order->update([
                'payment_status' => 'completed',
                'status' => 'processing',
                'paid_at' => now(),
            ]);
        }
    }

    protected function processPayJustNow(PaymentGatewayManager $gatewayManager, ?Order $order): void
    {
        if (!$order) {
            return;
        }

        $status = $this->payload['status'] ?? '';

        if (in_array($status, ['completed', 'success'])) {
            $order->update([
                'payment_status' => 'completed',
                'status' => 'processing',
                'paid_at' => now(),
            ]);
        }
    }
}
