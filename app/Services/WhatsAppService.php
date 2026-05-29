<?php

namespace App\Services;

use App\Models\Setting;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WhatsAppService
{
    protected string $phoneNumberId;
    protected string $accessToken;
    protected string $fromNumber;

    public function __construct()
    {
        $this->phoneNumberId = Setting::get('whatsapp_phone_number_id', '');
        $this->accessToken = Setting::get('whatsapp_access_token', '');
        $this->fromNumber = Setting::get('whatsapp_from_number', '');
    }

    public function send(string $to, string $message): bool
    {
        if (empty($this->phoneNumberId) || empty($this->accessToken)) {
            Log::warning('WhatsApp: Not configured, skipping message', ['to' => $to]);
            return false;
        }

        $url = "https://graph.facebook.com/v21.0/{$this->phoneNumberId}/messages";

        try {
            $response = Http::withToken($this->accessToken)
                ->timeout(15)
                ->post($url, [
                    'messaging_product' => 'whatsapp',
                    'recipient_type' => 'individual',
                    'to' => $this->normalizeNumber($to),
                    'type' => 'text',
                    'text' => [
                        'preview_url' => false,
                        'body' => $message,
                    ],
                ]);

            if (!$response->successful()) {
                Log::error('WhatsApp: Send failed', [
                    'response' => $response->body(),
                    'to' => $to,
                ]);
                return false;
            }

            return true;
        } catch (\Exception $e) {
            Log::error('WhatsApp: Exception', ['error' => $e->getMessage()]);
            return false;
        }
    }

    protected function normalizeNumber(string $number): string
    {
        $number = preg_replace('/[^0-9]/', '', $number);

        if (strlen($number) === 10 && !str_starts_with($number, '27')) {
            $number = '27' . $number;
        }

        if (str_starts_with($number, '0') && strlen($number) === 11) {
            $number = '27' . substr($number, 1);
        }

        return $number;
    }

    public function isEnabled(): bool
    {
        return !empty($this->phoneNumberId) && !empty($this->accessToken);
    }
}
