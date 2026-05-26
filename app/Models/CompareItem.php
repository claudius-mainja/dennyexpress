<?php

namespace App\Models;

use Database\Factories\CompareItemFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'compare_list_id', 'product_id',
])]
class CompareItem extends Model
{
    /** @use HasFactory<CompareItemFactory> */
    use HasFactory;

    public function compareList(): BelongsTo
    {
        return $this->belongsTo(CompareList::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
