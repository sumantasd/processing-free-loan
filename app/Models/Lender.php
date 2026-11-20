<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lender extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'name',
        'type',
        'logo',
        'rating',
        'approval_speed',
        'min_interest',
        'max_tenure',
        'processing_fee_waiver',
        'features',
        'description',
        'products',
        'is_published',
        'display_order',
    ];

    protected $casts = [
        'rating' => 'decimal:1',
        'features' => 'array',
        'products' => 'array',
        'is_published' => 'boolean',
    ];

    public function scopePublished($query)
    {
        return $query->where('is_published', true)->orderBy('display_order');
    }
}
