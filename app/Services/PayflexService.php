<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Setting;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PayflexService
{
    protected string $clientId;
    protected string $clientSecret;
    protected bool $testMode;
    protected ?string $accessToken = null;

    public function __construct()
    {
        $this->clientId = Setting::get('payflex_client_id', '');
        $this->clientSecret = Setting::get('payflex_client_secret', '');
        $this->testMode = (bool) Setting::get('payflex_test_mode', '1');
    }

    public static function fromGateway(\App\Models\PaymentGateway $gateway): self
    {
        $service = new self;
        $credential = $gateway->credential;

        if ($credential) {
            $service->clientId = $credential->merchant_id ?? $service->clientId;
            $service->clientSecret = $credential->secret_key ?? $service->clientSecret;
            $service->testMode = $gateway->sandbox_mode;
        }

        return $service;
    }

    public function configureForGateway(\App\Models\PaymentGateway $gateway): void
    {
        $this->testMode = $gateway->sandbox_mode;
        $credential = $gateway->credential;

        if ($credential) {
            if ($credential->merchant_id) {
                $this->clientId = $credential->merchant_id;
            }
            if ($credential->secret_key) {
                $this->clientSecret = $credential->secret_key;
            }
        }
        $this->accessToken = null;
    }

    public function getBaseUrl(): string
    {
        return $this->testMode
            ? 'https://api-staging.payflex.co.za'
            : 'https://api.payflex.co.za';
    }

    public function authenticate(): string
    {
        if ($this->accessToken) {
            return $this->accessToken;
        }

        $response = Http::asForm()->timeout(10)->post($this->getBaseUrl() . '/auth/token', [
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
            'grant_type' => 'client_credentials',
            'scope' => 'openid',
        ]);

        if (!$response->successful()) {
            Log::error('Payflex: Auth failed', ['response' => $response->body()]);
            throw new \RuntimeException('Failed to authenticate with Payflex');
        }

        $data = $response->json();
        $this->accessToken = $data['access_token'];

        return $this->accessToken;
    }

    public function createCheckout(Order $order): array
    {
        $token = $this->authenticate();

        $successUrl = route('payflex.success', $order->order_number);
        $cancelUrl = route('payflex.cancel', $order->order_number);
        $notifyUrl = route('payment.notify', ['gateway' => 'payflex']);

        $billingName = explode(' ', $order->billing_name, 2);
        $shippingName = explode(' ', ($order->shipping_name ?? $order->billing_name), 2);

        $payload = [
            'amount' => (float) $order->total,
            'currency' => 'ZAR',
            'merchant_reference' => $order->order_number,
            'success_url' => $successUrl,
            'cancel_url' => $cancelUrl,
            'notify_url' => $notifyUrl,
            'billing' => [
                'first_name' => $billingName[0] ?? '',
                'last_name' => $billingName[1] ?? '',
                'email' => $order->billing_email,
                'phone' => $order->billing_phone ?? '',
                'address' => $order->billing_address ?? '',
                'city' => $order->billing_city ?? '',
                'state' => $order->billing_state ?? '',
                'postcode' => $order->billing_zip ?? '',
                'country' => $order->billing_country ?? 'ZA',
            ],
            'shipping' => [
                'first_name' => $shippingName[0] ?? '',
                'last_name' => $shippingName[1] ?? '',
                'email' => $order->shipping_email ?? $order->billing_email,
                'phone' => $order->shipping_phone ?? $order->billing_phone ?? '',
                'address' => $order->shipping_address ?? $order->billing_address ?? '',
                'city' => $order->shipping_city ?? $order->billing_city ?? '',
                'state' => $order->shipping_state ?? $order->billing_state ?? '',
                'postcode' => $order->shipping_zip ?? $order->billing_zip ?? '',
                'country' => $order->shipping_country ?? 'ZA',
            ],
            'items' => $order->items->map(fn($item) => [
                'name' => $item->product_name,
                'sku' => $item->sku,
                'price' => (float) $item->price,
                'quantity' => $item->quantity,
            ])->toArray(),
        ];

        $response = Http::withToken($token)
            ->timeout(15)
            ->post($this->getBaseUrl() . '/checkouts', $payload);

        if (!$response->successful()) {
            Log::error('Payflex: Checkout creation failed', [
                'response' => $response->body(),
                'order' => $order->order_number,
            ]);
            throw new \RuntimeException('Failed to create Payflex checkout');
        }

        $data = $response->json();

        return [
            'checkout_url' => $data['data']['checkout_url'] ?? $data['checkout_url'] ?? '',
            'id' => $data['data']['id'] ?? $data['id'] ?? '',
        ];
    }

    public function getOrderStatus(string $checkoutId): array
    {
        $token = $this->authenticate();

        $response = Http::withToken($token)
            ->timeout(10)
            ->get($this->getBaseUrl() . '/checkouts/' . $checkoutId);

        if (!$response->successful()) {
            Log::error('Payflex: Status check failed', ['checkout_id' => $checkoutId]);
            throw new \RuntimeException('Failed to check Payflex order status');
        }

        return $response->json();
    }

    public function isEnabled(): bool
    {
        return (bool) Setting::get('payflex_enabled', '1');
    }
}
