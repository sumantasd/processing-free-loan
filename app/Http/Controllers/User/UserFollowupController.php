<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\LeadFollowup;
use Illuminate\Http\Request;

class UserFollowupController extends Controller
{
    public function index(Request $request)
    {
        $userId = auth()->id();
        $tab = $request->get('tab', 'all');

        $query = LeadFollowup::with('lead')->where('user_id', $userId);

        if ($tab === 'today') {
            $query->whereDate('followup_date', today());
        } elseif ($tab === 'upcoming') {
            $query->whereDate('followup_date', '>', today());
        } elseif ($tab === 'overdue') {
            $query->where('status', 'pending')->whereDate('followup_date', '<', today());
        }

        $followups = $query->orderBy('followup_date', 'asc')->paginate(15)->withQueryString();

        $stats = [
            'today' => LeadFollowup::where('user_id', $userId)->whereDate('followup_date', today())->count(),
            'upcoming' => LeadFollowup::where('user_id', $userId)->whereDate('followup_date', '>', today())->count(),
            'overdue' => LeadFollowup::where('user_id', $userId)->where('status', 'pending')->whereDate('followup_date', '<', today())->count(),
            'all' => LeadFollowup::where('user_id', $userId)->count(),
        ];

        return view('user.followups.index', compact('followups', 'stats', 'tab'));
    }

    public function complete(Request $request, $id)
    {
        $userId = auth()->id();
        $followup = LeadFollowup::where('user_id', $userId)->findOrFail($id);

        $followup->status = 'completed';
        $followup->completed_at = now();
        $followup->call_outcome = $request->call_outcome ?: 'Completed';
        if ($request->notes) {
            $followup->notes .= "\nCompletion Note: " . $request->notes;
        }
        $followup->save();

        return back()->with('success', 'Follow-up marked as completed.');
    }
}
