<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Setting;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PayFastService
{
    protected bool $sandbox;
    protected string $merchantId;
    protected string $merchantKey;
    protected string $passPhrase;

    public function __construct()
    {
        $this->sandbox = (bool) Setting::get('payfast_sandbox', '1');
        $this->merchantId = Setting::get('payfast_merchant_id', '10004241');
        $this->merchantKey = Setting::get('payfast_merchant_key', '1s16rqljh9dql');
        $this->passPhrase = Setting::get('payfast_passphrase', 'payfast123');
    }

    public function getPaymentUrl(): string
    {
        return $this->sandbox
            ? 'https://sandbox.payfast.co.za/eng/process'
            : 'https://www.payfast.co.za/eng/process';
    }

    public function getValidateUrl(): string
    {
        return $this->sandbox
            ? 'https://sandbox.payfast.co.za/eng/query/validate'
            : 'https://www.payfast.co.za/eng/query/validate';
    }

    public function createPaymentRequest(Order $order): array
    {
        $returnUrl = route('checkout.success', $order->order_number);
        $cancelUrl = route('checkout.cancel');
        $notifyUrl = route('payment.notify', ['gateway' => 'payfast']);

        $data = [
            'merchant_id' => $this->merchantId,
            'merchant_key' => $this->merchantKey,
            'return_url' => $returnUrl,
            'cancel_url' => $cancelUrl,
            'notify_url' => $notifyUrl,
            'name_first' => explode(' ', $order->billing_name, 2)[0],
            'name_last' => explode(' ', $order->billing_name, 2)[1] ?? '',
            'email_address' => $order->billing_email,
            'cell_number' => $order->billing_phone ?? '',
            'm_payment_id' => $order->order_number,
            'amount' => number_format((float) $order->total, 2, '.', ''),
            'item_name' => 'Order ' . $order->order_number,
            'item_description' => 'Purchase from Denny Express - ' . $order->items->count() . ' items',
            'email_confirmation' => '1',
            'confirmation_address' => $order->billing_email,
        ];

        $data['signature'] = $this->generateSignature($data, $this->passPhrase);

        return [
            'url' => $this->getPaymentUrl(),
            'data' => $data,
        ];
    }

    public function generateSignature(array $data, ?string $passPhrase = null): string
    {
        ksort($data);
        
        $fields = [];
        foreach ($data as $key => $value) {
            if ($key !== 'signature' && $value !== null && $value !== '') {
                $fields[] = $key . '=' . urlencode(trim($value));
            }
        }
        
        $string = implode('&', $fields);
        
        if ($passPhrase) {
            $string .= '&passphrase=' . urlencode(trim($passPhrase));
        }

        return md5($string);
    }

    public function validateSignature(array $data): bool
    {
        $receivedSignature = $data['signature'] ?? '';
        unset($data['signature']);
        
        $expectedSignature = $this->generateSignature($data, $this->passPhrase);

        return hash_equals($expectedSignature, $receivedSignature);
    }

    public function validateServerIp(string $ip): bool
    {
        $validIps = [
            '197.97.145.146',
            '197.97.145.147',
            '197.97.145.148',
            '197.97.145.149',
            '196.26.201.25',
            '196.26.201.26',
        ];

        if ($this->sandbox) {
            return true;
        }

        return in_array($ip, $validIps);
    }

    public function verifyPayment(array $notifyData): array
    {
        $params = [
            'merchant_id' => $this->merchantId,
            'merchant_key' => $this->merchantKey,
        ];

        if (!empty($notifyData['pf_payment_id'])) {
            $params['pf_payment_id'] = $notifyData['pf_payment_id'];
        }

        if (!empty($notifyData['m_payment_id'])) {
            $params['m_payment_id'] = $notifyData['m_payment_id'];
        }

        try {
            $response = Http::asForm()
                ->timeout(10)
                ->post($this->getValidateUrl(), $params);

            $body = $response->body();
            
            return [
                'valid' => trim($body) === 'VALID',
                'response' => $body,
            ];
        } catch (\Exception $e) {
            Log::error('PayFast validation error: ' . $e->getMessage());
            return [
                'valid' => false,
                'error' => $e->getMessage(),
            ];
        }
    }

    public function isEnabled(): bool
    {
        return (bool) Setting::get('payfast_enabled', '1');
    }
}
