<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'mobile',
        'password',
        'employee_id',
        'designation',
        'department',
        'role',
        'joining_date',
        'account_status',
        'profile_photo',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'joining_date' => 'date',
            'password' => 'hashed',
        ];
    }

    // Role helpers
    public function isSuperAdmin(): bool
    {
        return $this->role === 'super_admin';
    }

    public function isAdmin(): bool
    {
        return in_array($this->role, ['super_admin', 'admin']);
    }

    public function isManager(): bool
    {
        return in_array($this->role, ['super_admin', 'admin', 'manager']);
    }

    public function hasRole(string|array $roles): bool
    {
        if ($this->isSuperAdmin()) return true;
        $roles = (array) $roles;
        return in_array($this->role, $roles);
    }

    public function canManageLeads(): bool
    {
        return in_array($this->role, ['super_admin', 'admin', 'manager', 'team_leader', 'lead_executive', 'calling_executive']);
    }

    public function canAllocateLeads(): bool
    {
        return in_array($this->role, ['super_admin', 'admin', 'manager', 'team_leader']);
    }

    public function canManageCms(): bool
    {
        return in_array($this->role, ['super_admin', 'admin']);
    }

    public function canManageUsers(): bool
    {
        return in_array($this->role, ['super_admin', 'admin']);
    }

    // Relationships
    public function assignedLeads()
    {
        return $this->hasMany(Lead::class, 'assigned_to');
    }

    public function allocatedLeads()
    {
        return $this->hasMany(Lead::class, 'assigned_by');
    }

    public function leadAllocations()
    {
        return $this->hasMany(LeadAllocation::class, 'assigned_user_id');
    }

    public function leadActivities()
    {
        return $this->hasMany(LeadActivity::class, 'updated_by_user_id');
    }

    public function followups()
    {
        return $this->hasMany(LeadFollowup::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class)->latest();
    }

    public function unreadNotifications()
    {
        return $this->hasMany(Notification::class)->where('is_read', false)->latest();
    }

    public function auditLogs()
    {
        return $this->hasMany(AuditLog::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
