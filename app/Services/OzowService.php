<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Setting;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class OzowService
{
    protected string $siteCode;
    protected string $apiKey;
    protected string $privateKey;
    protected bool $testMode;

    public function __construct()
    {
        $this->siteCode = Setting::get('ozow_site_code', 'DENNYEXPR001');
        $this->apiKey = Setting::get('ozow_api_key', '');
        $this->privateKey = Setting::get('ozow_private_key', '');
        $this->testMode = true;
    }

    public static function fromGateway(\App\Models\PaymentGateway $gateway): self
    {
        $service = new self;
        $credential = $gateway->credential;

        if ($credential) {
            $service->siteCode = $credential->merchant_id ?? $service->siteCode;
            $service->apiKey = $credential->public_key ?? $service->apiKey;
            $service->privateKey = $credential->secret_key ?? $service->privateKey;
        }

        $service->testMode = $gateway->sandbox_mode;

        return $service;
    }

    public function getApiUrl(): string
    {
        return 'https://api.ozow.com';
    }

    public function getPaymentUrl(): string
    {
        return 'https://pay.ozow.com';
    }

    public function createPaymentRequest(Order $order): array
    {
        $transactionId = $order->order_number;
        $amount = (float) $order->total;
        
        $successUrl = route('checkout.success', $order->order_number);
        $cancelUrl = route('checkout.cancel');
        $notifyUrl = route('payment.notify', ['gateway' => 'ozow']);
        $errorUrl = route('payment.error', ['order' => $order->order_number]);

        $data = [
            'SiteCode' => $this->siteCode,
            'CountryCode' => 'ZA',
            'CurrencyCode' => 'ZAR',
            'Amount' => number_format($amount, 2, '.', ''),
            'TransactionReference' => $transactionId,
            'Customer' => [
                'EmailAddress' => $order->billing_email,
                'CellPhoneNumber' => $order->billing_phone ?? '',
                'FirstName' => explode(' ', $order->billing_name, 2)[0],
                'LastName' => explode(' ', $order->billing_name, 2)[1] ?? '',
            ],
            'IsTest' => $this->testMode,
        ];

        $hashInput = $this->generateHashInput($data);
        $data['HashCheck'] = $this->generateHash($hashInput);

        return [
            'url' => $this->getPaymentUrl(),
            'data' => $data,
            'redirectUrl' => $this->buildRedirectUrl($data, $successUrl, $cancelUrl, $errorUrl, $notifyUrl),
        ];
    }

    protected function generateHashInput(array $data): string
    {
        $parts = [
            $data['SiteCode'] ?? '',
            $data['CountryCode'] ?? '',
            $data['CurrencyCode'] ?? '',
            $data['Amount'] ?? '',
            $data['TransactionReference'] ?? '',
            $data['IsTest'] ? 'true' : 'false',
        ];

        if (isset($data['Customer'])) {
            $parts = array_merge($parts, [
                $data['Customer']['EmailAddress'] ?? '',
                $data['Customer']['CellPhoneNumber'] ?? '',
                $data['Customer']['FirstName'] ?? '',
                $data['Customer']['LastName'] ?? '',
            ]);
        }

        $parts[] = $this->apiKey;

        return implode('', $parts);
    }

    protected function generateHash(string $input): string
    {
        if (empty($this->apiKey)) {
            return hash('sha512', $input);
        }

        return hash('sha512', $input);
    }

    public function buildRedirectUrl(
        array $data,
        string $successUrl,
        string $cancelUrl,
        string $errorUrl,
        string $notifyUrl
    ): string {
        $params = [
            'SiteCode' => $data['SiteCode'],
            'TransactionReference' => $data['TransactionReference'],
            'Amount' => $data['Amount'],
            'SuccessUrl' => $successUrl,
            'CancelUrl' => $cancelUrl,
            'ErrorUrl' => $errorUrl,
            'NotifyUrl' => $notifyUrl,
            'HashCheck' => $data['HashCheck'] ?? '',
            'IsTest' => $this->testMode ? 'true' : 'false',
        ];

        return $this->getPaymentUrl() . '/?' . http_build_query($params);
    }

    public function validateNotification(array $data): bool
    {
        $hashCheck = $data['HashCheck'] ?? '';
        unset($data['HashCheck']);

        $sortedData = [];
        foreach (['SiteCode', 'TransactionId', 'TransactionReference', 'Status', 'StatusMessage', 'CurrencyCode', 'Amount', 'IsTest'] as $key) {
            if (isset($data[$key])) {
                $sortedData[$key] = $data[$key];
            }
        }
        $sortedData['ApiKey'] = $this->apiKey;

        $hashInput = implode('', $sortedData);
        $expectedHash = hash('sha512', $hashInput);

        return hash_equals(strtoupper($expectedHash), strtoupper($hashCheck));
    }

    public function isEnabled(): bool
    {
        return (bool) Setting::get('ozow_enabled', '1');
    }

    public function configureForGateway(\App\Models\PaymentGateway $gateway): void
    {
        $this->testMode = $gateway->sandbox_mode;
        $credential = $gateway->credential;

        if ($credential) {
            if ($credential->merchant_id) {
                $this->siteCode = $credential->merchant_id;
            }
            if ($credential->public_key) {
                $this->apiKey = $credential->public_key;
            }
            if ($credential->secret_key) {
                $this->privateKey = $credential->secret_key;
            }
        }
    }
}
