<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadFollowup extends Model
{
    use HasFactory;

    protected $fillable = [
        'lead_id',
        'user_id',
        'followup_date',
        'followup_time',
        'reminder_at',
        'status',
        'call_outcome',
        'notes',
        'completed_at',
    ];

    protected $casts = [
        'followup_date' => 'date',
        'reminder_at' => 'datetime',
        'completed_at' => 'datetime',
    ];

    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeToday($query)
    {
        return $query->whereDate('followup_date', today());
    }

    public function scopeUpcoming($query)
    {
        return $query->whereDate('followup_date', '>', today());
    }

    public function scopeOverdue($query)
    {
        return $query->where('status', 'pending')->whereDate('followup_date', '<', today());
    }
}
