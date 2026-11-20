<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'mobile',
        'email',
        'loan_category',
        'loan_amount',
        'monthly_income',
        'employment_type',
        'city',
        'pincode',
        'consent',
        'status',
        'preferred_bank',
        'ip_address',
        'source_url',
        'notes',
    ];

    protected $casts = [
        'loan_amount' => 'decimal:2',
        'monthly_income' => 'decimal:2',
        'consent' => 'boolean',
    ];
}
