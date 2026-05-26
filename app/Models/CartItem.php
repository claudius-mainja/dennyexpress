<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id', 'product_id', 'quantity', 'price', 'tax_rate',
    ];

    protected function casts(): array
    {
        return [
            'quantity' => 'integer',
            'price' => 'decimal:2',
            'tax_rate' => 'decimal:2',
        ];
    }

    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function getSubtotalAttribute(): float
    {
        return round($this->price * $this->quantity, 2);
    }

    public function getTaxAmountAttribute(): float
    {
        return round($this->subtotal * ($this->tax_rate / 100), 2);
    }

    public function getTotalAttribute(): float
    {
        return round($this->subtotal + $this->tax_amount, 2);
    }
}
