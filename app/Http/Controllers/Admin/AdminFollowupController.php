<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LeadFollowup;
use App\Models\User;
use Illuminate\Http\Request;

class AdminFollowupController extends Controller
{
    public function index(Request $request)
    {
        $query = LeadFollowup::with(['lead', 'user']);

        $tab = $request->get('tab', 'all');

        if ($tab === 'today') {
            $query->whereDate('followup_date', today());
        } elseif ($tab === 'upcoming') {
            $query->whereDate('followup_date', '>', today());
        } elseif ($tab === 'overdue') {
            $query->where('status', 'pending')->whereDate('followup_date', '<', today());
        }

        if ($request->filled('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $followups = $query->orderBy('followup_date', 'asc')->paginate(15)->withQueryString();
        $users = User::where('account_status', 'active')->orderBy('name')->get();

        $stats = [
            'today' => LeadFollowup::whereDate('followup_date', today())->count(),
            'upcoming' => LeadFollowup::whereDate('followup_date', '>', today())->count(),
            'overdue' => LeadFollowup::where('status', 'pending')->whereDate('followup_date', '<', today())->count(),
            'all' => LeadFollowup::count(),
        ];

        return view('admin.followups.index', compact('followups', 'users', 'stats', 'tab'));
    }
}
