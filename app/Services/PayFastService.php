<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PayFastService
{
    protected string $paygateId;
    protected string $encryptionKey;
    protected bool $testMode;

    public function __construct()
    {
        $this->paygateId = Setting::get('payfast_terminal_id', '23700449');
        $this->encryptionKey = Setting::get('payfast_encryption_key', '');
        $this->testMode = (bool) Setting::get('payfast_test_mode', '1');
    }

    public static function fromGateway(\App\Models\PaymentGateway $gateway): self
    {
        $service = new self;
        $credential = $gateway->credential;

        if ($credential) {
            $service->paygateId = $credential->merchant_id ?? $service->paygateId;
            $service->encryptionKey = $credential->secret_key ?? $service->encryptionKey;
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
                $this->paygateId = $credential->merchant_id;
            }
            if ($credential->secret_key) {
                $this->encryptionKey = $credential->secret_key;
            }
        }
    }

    public function initiateTransaction(Order $order): array
    {
        $returnUrl = route('checkout.success', $order->order_number);
        $notifyUrl = route('payment.notify', ['gateway' => 'payfast']);

        $fields = [
            'PAYGATE_ID' => $this->paygateId,
            'REFERENCE' => $order->order_number,
            'AMOUNT' => (int) round($order->total * 100),
            'CURRENCY' => 'ZAR',
            'RETURN_URL' => $returnUrl,
            'TRANSACTION_DATE' => now()->format('Y-m-d H:i:s'),
            'LOCALE' => 'en-za',
            'COUNTRY' => 'ZAF',
            'EMAIL' => $order->billing_email,
            'NOTIFY_URL' => $notifyUrl,
        ];

        $fields['CHECKSUM'] = $this->generateChecksum($fields);

        $url = 'https://secure.paygate.co.za/payweb3/process.trans';

        try {
            $response = Http::asForm()->timeout(30)->post($url, $fields);
            $body = $response->body();

            parse_str($body, $result);

            if (!isset($result['PROCESS_KEY'])) {
                Log::error('PayWeb: Initiation failed', ['response' => $body, 'order' => $order->order_number]);
                throw new \RuntimeException('Failed to initiate payment');
            }

            $redirectUrl = 'https://secure.paygate.co.za/payweb3/process?PROCESS_KEY=' . urlencode($result['PROCESS_KEY']);

            return [
                'redirect_url' => $redirectUrl,
                'pay_request_id' => $result['PAY_REQUEST_ID'] ?? null,
                'process_key' => $result['PROCESS_KEY'],
            ];
        } catch (\Exception $e) {
            Log::error('PayWeb: HTTP error', ['error' => $e->getMessage(), 'order' => $order->order_number]);
            throw $e;
        }
    }

    public function handleItn(Request $request): array
    {
        $checksum = $request->input('CHECKSUM');
        $expectedChecksum = $this->generateItnChecksum($request);

        if (!hash_equals($expectedChecksum, $checksum)) {
            Log::warning('PayWeb: Invalid ITN checksum', $request->all());
            throw new \RuntimeException('Invalid checksum');
        }

        return [
            'order_number' => $request->input('REFERENCE'),
            'pay_request_id' => $request->input('PAY_REQUEST_ID'),
            'transaction_id' => $request->input('TRANSACTION_ID'),
            'result_code' => $request->input('RESULT_CODE'),
            'auth_code' => $request->input('AUTH_CODE'),
            'amount' => (int) $request->input('AMOUNT', 0) / 100,
            'currency' => $request->input('CURRENCY', 'ZAR'),
        ];
    }

    public function isSuccess(array $itnData): bool
    {
        return ($itnData['result_code'] ?? '') === '00';
    }

    protected function generateChecksum(array $data): string
    {
        $fields = ['PAYGATE_ID', 'REFERENCE', 'AMOUNT', 'CURRENCY', 'RETURN_URL', 'TRANSACTION_DATE', 'LOCALE', 'COUNTRY', 'EMAIL', 'NOTIFY_URL'];
        $concatenated = '';
        foreach ($fields as $field) {
            $concatenated .= $data[$field] ?? '';
        }
        $concatenated .= $this->encryptionKey;
        return md5($concatenated);
    }

    protected function generateItnChecksum(Request $request): string
    {
        $fields = ['PAYGATE_ID', 'PAY_REQUEST_ID', 'REFERENCE', 'TRANSACTION_ID', 'RESULT_CODE', 'AUTH_CODE', 'AMOUNT', 'CURRENCY'];
        $concatenated = '';
        foreach ($fields as $field) {
            $concatenated .= $request->input($field, '');
        }
        $concatenated .= $this->encryptionKey;
        return md5($concatenated);
    }

    public function isEnabled(): bool
    {
        return (bool) Setting::get('payfast_enabled', '1');
    }
}
