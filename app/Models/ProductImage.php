<?php

namespace App\Models;

use Database\Factories\ProductImageFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'product_id', 'path', 'alt_text', 'is_primary', 'sort_order',
])]
class ProductImage extends Model
{
    /** @use HasFactory<ProductImageFactory> */
    use HasFactory;

    protected function casts(): array
    {
        return [
            'is_primary' => 'boolean',
        ];
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: function () {
                if (str_starts_with($this->path ?? '', 'http')) {
                    return $this->path;
                }
                
                if ($this->path) {
                    $publicPath = public_path($this->path);
                    if (file_exists($publicPath)) {
                        return asset($this->path);
                    }
                }
                
                $fallbackPath = 'images/products/pos-system-fallback.jpg';
                if (file_exists(public_path($fallbackPath))) {
                    return asset($fallbackPath);
                }
                
                return 'https://placehold.co/400x400/f3f4f6/059669?text=Product';
            }
        );
    }
}
