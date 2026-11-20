<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use App\Models\Lead;
use App\Models\LeadAllocation;
use App\Models\LeadFollowup;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // 1. Comprehensive Dynamic Lead Statistics
        $totalLeads = Lead::count();
        $newLeads = Lead::where('status', 'new')->count();
        $allocatedLeads = Lead::whereNotNull('assigned_to')->count();
        $pendingLeads = Lead::whereIn('status', ['new', 'allocated', 'documents_pending'])->count();
        $contactedLeads = Lead::where('status', 'contacted')->count();
        $followupRequired = Lead::where('status', 'followup_required')->count();
        $qualifiedLeads = Lead::where('status', 'qualified')->count();
        $convertedLeads = Lead::where('status', 'converted')->count();
        $rejectedLeads = Lead::where('status', 'rejected')->count();

        // 2. User Statistics
        $totalUsers = User::count();
        $activeUsers = User::where('account_status', 'active')->count();
        $inactiveUsers = User::where('account_status', '!=', 'active')->count();

        // 3. Today's Metrics
        $leadsToday = Lead::whereDate('created_at', today())->count();
        $allocationsToday = LeadAllocation::whereDate('created_at', today())->count();
        $followupsToday = LeadFollowup::whereDate('followup_date', today())->count();
        $overdueFollowups = LeadFollowup::where('status', 'pending')->whereDate('followup_date', '<', today())->count();

        // 4. Monthly Lead Statistics (Last 6 Months)
        $monthlyStats = Lead::select(
            DB::raw("DATE_FORMAT(created_at, '%Y-%m') as month"),
            DB::raw("DATE_FORMAT(created_at, '%b %Y') as month_label"),
            DB::raw('count(*) as count')
        )
        ->groupBy('month', 'month_label')
        ->orderBy('month', 'desc')
        ->take(6)
        ->get()
        ->reverse()
        ->values();

        // 5. Daily Lead Generation (Last 7 Days)
        $dailyStats = Lead::select(
            DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d') as day"),
            DB::raw("DATE_FORMAT(created_at, '%d %b') as day_label"),
            DB::raw('count(*) as count')
        )
        ->where('created_at', '>=', now()->subDays(6)->startOfDay())
        ->groupBy('day', 'day_label')
        ->orderBy('day', 'asc')
        ->get();

        // 6. Lead Status Distribution
        $statusDistribution = Lead::select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item->status => $item->count];
            });

        // 7. Lead Category Distribution
        $categoryDistribution = Lead::select('loan_category', DB::raw('count(*) as count'))
            ->groupBy('loan_category')
            ->get();

        // 8. User-wise Lead Performance
        $userPerformance = User::where('account_status', 'active')
            ->withCount([
                'assignedLeads as total_assigned',
                'assignedLeads as converted_count' => function ($q) {
                    $q->where('status', 'converted');
                },
                'assignedLeads as pending_count' => function ($q) {
                    $q->whereIn('status', ['allocated', 'contacted', 'followup_required']);
                }
            ])
            ->orderBy('total_assigned', 'desc')
            ->take(8)
            ->get();

        // 9. Recent Leads
        $recentLeads = Lead::with('assignedTo')->latest()->take(6)->get();

        // 10. Recent Audit Activities
        $recentLogs = AuditLog::with('user')->latest()->take(6)->get();

        return view('admin.dashboard', compact(
            'totalLeads',
            'newLeads',
            'allocatedLeads',
            'pendingLeads',
            'contactedLeads',
            'followupRequired',
            'qualifiedLeads',
            'convertedLeads',
            'rejectedLeads',
            'totalUsers',
            'activeUsers',
            'inactiveUsers',
            'leadsToday',
            'allocationsToday',
            'followupsToday',
            'overdueFollowups',
            'monthlyStats',
            'dailyStats',
            'statusDistribution',
            'categoryDistribution',
            'userPerformance',
            'recentLeads',
            'recentLogs'
        ));
    }
}
