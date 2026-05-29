<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PaymentGatewayCredential extends Model
{
    protected $table = 'payment_gateway_credentials';

    protected function casts(): array
    {
        return [
            'merchant_key' => 'encrypted',
            'public_key' => 'encrypted',
            'secret_key' => 'encrypted',
            'passphrase' => 'encrypted',
            'webhook_secret' => 'encrypted',
            'additional_config' => 'encrypted:array',
        ];
    }

    public function gateway(): BelongsTo
    {
        return $this->belongsTo(PaymentGateway::class, 'payment_gateway_id');
    }
}
