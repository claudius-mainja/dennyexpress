<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

#[Fillable([
    'name', 'slug', 'description', 'is_enabled', 'sandbox_mode',
    'sort_order', 'logo',
])]
class PaymentGateway extends Model
{
    protected function casts(): array
    {
        return [
            'is_enabled' => 'boolean',
            'sandbox_mode' => 'boolean',
        ];
    }

    public function credential(): HasOne
    {
        return $this->hasOne(PaymentGatewayCredential::class);
    }

    public function logs(): HasMany
    {
        return $this->hasMany(PaymentLog::class, 'gateway', 'slug');
    }

    public function getLogoUrlAttribute(): ?string
    {
        if ($this->logo && Storage::disk('public')->exists($this->logo)) {
            return Storage::url($this->logo);
        }

        return asset("images/payments/{$this->slug}.svg");
    }

    public function getDisplayNameAttribute(): string
    {
        return $this->name;
    }

    public function isLive(): bool
    {
        return !$this->sandbox_mode;
    }

    public function scopeEnabled($query)
    {
        return $query->where('is_enabled', true);
    }

    protected static function booted(): void
    {
        static::saved(fn() => Cache::forget('payment_gateways'));
        static::deleted(fn() => Cache::forget('payment_gateways'));
    }
}
