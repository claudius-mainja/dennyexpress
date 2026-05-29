<?php

namespace App\Services\Payments;

use App\Models\Order;
use App\Models\PaymentGateway;
use App\Models\Setting;
use Illuminate\Support\Facades\Log;

class CardPaymentService
{
    protected bool $enabled;

    public function __construct()
    {
        $this->enabled = (bool) Setting::get('card_payment_enabled', '1');
    }

    public static function fromGateway(PaymentGateway $gateway): self
    {
        $service = new self;
        $service->enabled = $gateway->is_enabled;

        return $service;
    }

    public function process(Order $order): array
    {
        Log::info('Card payment processing deferred to PayFast', [
            'order' => $order->order_number,
        ]);

        return [
            'redirect' => true,
            'gateway' => 'payfast',
        ];
    }

    public function isEnabled(): bool
    {
        return $this->enabled;
    }
}
