<?php

namespace App\Models;

use Database\Factories\FAQFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'question', 'answer', 'sort_order', 'is_active', 'category',
])]
class FAQ extends Model
{
    /** @use HasFactory<FAQFactory> */
    use HasFactory;

    protected $table = 'faqs';

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }
}
