<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'customer_image',
        'role',
        'location',
        'loan_category',
        'review',
        'rating',
        'is_verified',
        'is_active',
        'display_order',
    ];

    protected $casts = [
        'is_verified' => 'boolean',
        'is_active' => 'boolean',
        'rating' => 'integer',
        'display_order' => 'integer',
    ];

    protected $appends = [
        'avatar_url',
        'initials',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('display_order');
    }

    /**
     * Resolve profile image URL from storage, public images or external link.
     */
    public function getAvatarUrlAttribute(): ?string
    {
        if (empty($this->customer_image)) {
            return null;
        }

        $img = trim($this->customer_image);

        if (str_starts_with($img, 'http://') || str_starts_with($img, 'https://')) {
            return $img;
        }

        if (str_starts_with($img, '/images/') || str_starts_with($img, 'images/')) {
            return asset(ltrim($img, '/'));
        }

        if (str_starts_with($img, 'storage/') || str_starts_with($img, '/storage/')) {
            return asset(ltrim($img, '/'));
        }

        return asset('storage/' . ltrim($img, '/'));
    }

    /**
     * Alias for avatar_url for backward compatibility.
     */
    public function getAvatarAttribute(): ?string
    {
        return $this->avatar_url;
    }

    /**
     * Generate graceful 2-letter initials for avatar fallback.
     */
    public function getInitialsAttribute(): string
    {
        $name = trim($this->customer_name ?? 'Borrower');
        // Clean prefixes like Dr., Mr., etc.
        $clean = preg_replace('/^(dr\.|mr\.|mrs\.|ms\.|ca\.)\s+/i', '', $name);
        $words = preg_split('/\s+/', trim($clean));
        $initials = '';

        if (!empty($words[0])) {
            $initials .= strtoupper(substr($words[0], 0, 1));
        }
        if (!empty($words[1])) {
            $initials .= strtoupper(substr($words[1], 0, 1));
        }

        return $initials ?: 'PF';
    }
}
