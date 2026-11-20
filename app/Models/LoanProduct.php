<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'tagline',
        'badge',
        'icon',
        'color',
        'bg_gradient',
        'amount_range',
        'min_amount',
        'max_amount',
        'interest_rate',
        'tenure',
        'processing_fee',
        'description',
        'key_benefits',
        'eligibility',
        'documents',
        'suitable_lenders',
        'featured_image',
        'banner_image',
        'seo_title',
        'seo_description',
        'is_published',
        'display_order',
    ];

    protected $casts = [
        'min_amount' => 'decimal:2',
        'max_amount' => 'decimal:2',
        'key_benefits' => 'array',
        'eligibility' => 'array',
        'documents' => 'array',
        'suitable_lenders' => 'array',
        'is_published' => 'boolean',
    ];

    public function scopePublished($query)
    {
        return $query->where('is_published', true)->orderBy('display_order');
    }
}
