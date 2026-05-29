<?php

namespace App\Services\Payments;

use App\Models\PaymentGateway;
use App\Models\PaymentLog;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class PaymentGatewayManager
{
    protected ?array $gateways = null;

    protected function loadGateways(): array
    {
        if ($this->gateways !== null) {
            return $this->gateways;
        }

        $this->gateways = Cache::remember('payment_gateways', 3600, function () {
            return PaymentGateway::with('credential')
                ->orderBy('sort_order')
                ->get()
                ->keyBy('slug')
                ->toArray();
        });

        return $this->gateways;
    }

    public function refresh(): void
    {
        Cache::forget('payment_gateways');
        $this->gateways = null;
    }

    public function getEnabledGateways(): array
    {
        $all = $this->loadGateways();

        return array_filter($all, fn($g) => $g['is_enabled']);
    }

    public function isEnabled(string $slug): bool
    {
        $gateways = $this->loadGateways();

        return isset($gateways[$slug]) && $gateways[$slug]['is_enabled'];
    }

    public function getGateway(string $slug): ?array
    {
        $gateways = $this->loadGateways();

        return $gateways[$slug] ?? null;
    }

    public function getCredential(string $slug, string $field, mixed $default = null): mixed
    {
        $gateway = $this->getGateway($slug);

        if (!$gateway || !isset($gateway['credential'])) {
            return $default;
        }

        return $gateway['credential'][$field] ?? $default;
    }

    public function isSandboxMode(string $slug): bool
    {
        $gateway = $this->getGateway($slug);

        return $gateway['sandbox_mode'] ?? true;
    }

    public function getEnabledSlugs(): array
    {
        return array_keys($this->getEnabledGateways());
    }

    public function logPayment(
        string $gateway,
        string $eventType,
        array $payload = [],
        ?array $response = null,
        ?int $orderId = null,
        string $status = 'pending'
    ): PaymentLog {
        try {
            return PaymentLog::create([
                'gateway' => $gateway,
                'event_type' => $eventType,
                'payload' => $payload,
                'response' => $response,
                'order_id' => $orderId,
                'status' => $status,
            ]);
        } catch (\Throwable $e) {
            Log::error('Failed to write payment log', [
                'gateway' => $gateway,
                'error' => $e->getMessage(),
            ]);

            throw $e;
        }
    }
}
