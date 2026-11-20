<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\LeadFollowup;
use App\Models\Notification;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {
        $userId = auth()->id();

        // 1. My Leads Dynamic Stats
        $myTotalLeads = Lead::where('assigned_to', $userId)->count();
        $newLeads = Lead::where('assigned_to', $userId)->where('status', 'allocated')->count();
        $contactedLeads = Lead::where('assigned_to', $userId)->where('status', 'contacted')->count();
        $followupRequired = Lead::where('assigned_to', $userId)->where('status', 'followup_required')->count();
        $interestedLeads = Lead::where('assigned_to', $userId)->where('status', 'interested')->count();
        $qualifiedLeads = Lead::where('assigned_to', $userId)->where('status', 'qualified')->count();
        $convertedLeads = Lead::where('assigned_to', $userId)->where('status', 'converted')->count();
        $rejectedLeads = Lead::where('assigned_to', $userId)->where('status', 'rejected')->count();
        $pendingActions = Lead::where('assigned_to', $userId)->whereIn('status', ['allocated', 'contacted', 'followup_required', 'documents_pending'])->count();

        // 2. Follow-ups for this user
        $todayFollowups = LeadFollowup::with('lead')
            ->where('user_id', $userId)
            ->whereDate('followup_date', today())
            ->orderBy('followup_time')
            ->get();

        $overdueFollowups = LeadFollowup::with('lead')
            ->where('user_id', $userId)
            ->where('status', 'pending')
            ->whereDate('followup_date', '<', today())
            ->orderBy('followup_date', 'asc')
            ->get();

        $upcomingFollowups = LeadFollowup::with('lead')
            ->where('user_id', $userId)
            ->whereDate('followup_date', '>', today())
            ->orderBy('followup_date', 'asc')
            ->take(5)
            ->get();

        // 3. Recent allocated leads
        $recentLeads = Lead::where('assigned_to', $userId)->latest()->take(6)->get();

        // 4. Notifications
        $notifications = Notification::where('user_id', $userId)->latest()->take(5)->get();

        return view('user.dashboard', compact(
            'myTotalLeads',
            'newLeads',
            'contactedLeads',
            'followupRequired',
            'interestedLeads',
            'qualifiedLeads',
            'convertedLeads',
            'rejectedLeads',
            'pendingActions',
            'todayFollowups',
            'overdueFollowups',
            'upcomingFollowups',
            'recentLeads',
            'notifications'
        ));
    }
}
