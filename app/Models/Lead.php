<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lead extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'reference_code',
        'full_name',
        'mobile',
        'email',
        'loan_category',
        'loan_amount',
        'monthly_income',
        'employment_type',
        'city',
        'state',
        'pincode',
        'preferred_bank',
        'consent',
        'lead_source',
        'campaign',
        'utm_source',
        'utm_medium',
        'utm_campaign',
        'status',
        'assigned_to',
        'assigned_by',
        'assigned_at',
        'next_followup_at',
        'ip_address',
        'source_url',
        'internal_notes',
    ];

    protected $casts = [
        'loan_amount' => 'decimal:2',
        'monthly_income' => 'decimal:2',
        'consent' => 'boolean',
        'assigned_at' => 'datetime',
        'next_followup_at' => 'datetime',
    ];

    // Status definitions
    public const STATUS_NEW = 'new';
    public const STATUS_ALLOCATED = 'allocated';
    public const STATUS_CONTACTED = 'contacted';
    public const STATUS_FOLLOWUP_REQUIRED = 'followup_required';
    public const STATUS_INTERESTED = 'interested';
    public const STATUS_DOCUMENTS_PENDING = 'documents_pending';
    public const STATUS_APPLICATION_STARTED = 'application_started';
    public const STATUS_QUALIFIED = 'qualified';
    public const STATUS_CONVERTED = 'converted';
    public const STATUS_REJECTED = 'rejected';
    public const STATUS_NOT_INTERESTED = 'not_interested';
    public const STATUS_NO_RESPONSE = 'no_response';
    public const STATUS_DUPLICATE = 'duplicate';

    public static function getStatuses(): array
    {
        return [
            self::STATUS_NEW => 'New',
            self::STATUS_ALLOCATED => 'Allocated',
            self::STATUS_CONTACTED => 'Contacted',
            self::STATUS_FOLLOWUP_REQUIRED => 'Follow-up Required',
            self::STATUS_INTERESTED => 'Interested',
            self::STATUS_DOCUMENTS_PENDING => 'Documents Pending',
            self::STATUS_APPLICATION_STARTED => 'Application Started',
            self::STATUS_QUALIFIED => 'Qualified',
            self::STATUS_CONVERTED => 'Converted',
            self::STATUS_REJECTED => 'Rejected',
            self::STATUS_NOT_INTERESTED => 'Not Interested',
            self::STATUS_NO_RESPONSE => 'No Response',
            self::STATUS_DUPLICATE => 'Duplicate',
        ];
    }

    public function getStatusLabelAttribute(): string
    {
        return self::getStatuses()[$this->status] ?? ucfirst(str_replace('_', ' ', $this->status));
    }

    public function getStatusColorAttribute(): string
    {
        return match ($this->status) {
            'new' => 'bg-blue-50 text-blue-700 border-blue-200',
            'allocated' => 'bg-indigo-50 text-indigo-700 border-indigo-200',
            'contacted' => 'bg-amber-50 text-amber-700 border-amber-200',
            'followup_required' => 'bg-orange-50 text-orange-700 border-orange-200',
            'interested' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
            'documents_pending' => 'bg-purple-50 text-purple-700 border-purple-200',
            'application_started' => 'bg-cyan-50 text-cyan-700 border-cyan-200',
            'qualified' => 'bg-teal-50 text-teal-700 border-teal-200',
            'converted' => 'bg-green-100 text-green-800 border-green-300 font-bold',
            'rejected' => 'bg-red-50 text-red-700 border-red-200',
            'not_interested' => 'bg-slate-100 text-slate-700 border-slate-200',
            'no_response' => 'bg-zinc-100 text-zinc-600 border-zinc-200',
            'duplicate' => 'bg-rose-50 text-rose-600 border-rose-200',
            default => 'bg-slate-50 text-slate-700 border-slate-200',
        };
    }

    public function getLoanCategoryLabelAttribute(): string
    {
        $categories = [
            'personal-loan' => 'Salaried Personal Loan',
            'business-loan' => 'Business Loan',
            'new-car-loan' => 'New Car Loan',
            'used-car-loan' => 'Used Car Loan',
            'doctor-loan' => 'Doctor Loan',
            'ca-loan' => 'CA Loan',
        ];
        return $categories[$this->loan_category] ?? ucwords(str_replace('-', ' ', $this->loan_category));
    }

    // Relationships
    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function assignedBy()
    {
        return $this->belongsTo(User::class, 'assigned_by');
    }

    public function allocations()
    {
        return $this->hasMany(LeadAllocation::class)->latest();
    }

    public function activities()
    {
        return $this->hasMany(LeadActivity::class)->latest();
    }

    public function notes()
    {
        return $this->hasMany(LeadNote::class)->latest();
    }

    public function followups()
    {
        return $this->hasMany(LeadFollowup::class)->latest();
    }

    public function documents()
    {
        return $this->hasMany(LeadDocument::class)->latest();
    }

    // Auto-generate reference code if not set
    protected static function booted()
    {
        static::created(function ($lead) {
            if (!$lead->reference_code) {
                $lead->reference_code = 'PFL-' . str_pad($lead->id, 6, '0', STR_PAD_LEFT);
                $lead->saveQuietly();
            }
        });
    }
}
