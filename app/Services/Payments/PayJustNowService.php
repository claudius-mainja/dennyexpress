<?php

namespace App\Services\Payments;

use App\Models\Order;
use App\Models\PaymentGateway;
use App\Models\Setting;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PayJustNowService
{
    protected string $merchantId;
    protected string $apiKey;
    protected string $secretKey;
    protected bool $testMode;

    public function __construct()
    {
        $this->merchantId = Setting::get('payjustnow_merchant_id', '');
        $this->apiKey = Setting::get('payjustnow_api_key', '');
        $this->secretKey = Setting::get('payjustnow_secret_key', '');
        $this->testMode = (bool) Setting::get('payjustnow_test_mode', '1');
    }

    public static function fromGateway(PaymentGateway $gateway): self
    {
        $service = new self;
        $credential = $gateway->credential;

        if ($credential) {
            $service->merchantId = $credential->merchant_id ?? $service->merchantId;
            $service->apiKey = $credential->public_key ?? $service->apiKey;
            $service->secretKey = $credential->secret_key ?? $service->secretKey;
            $service->testMode = $gateway->sandbox_mode;
        }

        return $service;
    }

    public function getBaseUrl(): string
    {
        return $this->testMode
            ? 'https://sandbox.payjustnow.com/api'
            : 'https://api.payjustnow.com';
    }

    public function getPaymentUrl(): string
    {
        return $this->testMode
            ? 'https://sandbox.payjustnow.com'
            : 'https://pay.payjustnow.com';
    }

    public function createPaymentRequest(Order $order): array
    {
        $successUrl = route('checkout.success', $order->order_number);
        $cancelUrl = route('payment.cancel');
        $notifyUrl = route('payment.notify', ['gateway' => 'payjustnow']);
        $errorUrl = route('payment.error', ['order' => $order->order_number]);

        $payload = [
            'merchant_id' => $this->merchantId,
            'merchant_reference' => $order->order_number,
            'amount' => (float) $order->total,
            'currency' => 'ZAR',
            'customer_email' => $order->billing_email,
            'customer_phone' => $order->billing_phone ?? '',
            'customer_name' => $order->billing_name,
            'success_url' => $successUrl,
            'cancel_url' => $cancelUrl,
            'notify_url' => $notifyUrl,
            'error_url' => $errorUrl,
            'description' => "Order {$order->order_number}",
        ];

        $payload['hash'] = $this->generateHash($payload);

        try {
            $response = Http::timeout(15)->post($this->getBaseUrl() . '/initiate', $payload);

            if (!$response->successful()) {
                Log::error('PayJustNow: Initiation failed', [
                    'order' => $order->order_number,
                    'response' => $response->body(),
                ]);
                throw new \RuntimeException('Failed to initiate PayJustNow payment');
            }

            $data = $response->json();

            return [
                'redirect_url' => $data['redirect_url'] ?? $this->getPaymentUrl() . '/pay?' . http_build_query([
                    'reference' => $order->order_number,
                    'merchant' => $this->merchantId,
                ]),
                'transaction_id' => $data['transaction_id'] ?? null,
            ];
        } catch (\Exception $e) {
            Log::error('PayJustNow: HTTP error', [
                'order' => $order->order_number,
                'error' => $e->getMessage(),
            ]);
            throw $e;
        }
    }

    public function validateNotification(array $data): bool
    {
        $receivedHash = $data['hash'] ?? '';
        unset($data['hash']);

        $expected = $this->generateHash($data);

        return hash_equals($expected, $receivedHash);
    }

    protected function generateHash(array $data): string
    {
        ksort($data);
        $concatenated = '';

        foreach ($data as $key => $value) {
            $concatenated .= $value;
        }

        $concatenated .= $this->secretKey;

        return strtoupper(hash('sha256', $concatenated));
    }

    public function isEnabled(): bool
    {
        return (bool) Setting::get('payjustnow_enabled', '0');
    }
}
