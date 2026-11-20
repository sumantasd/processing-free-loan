<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use App\Models\Lead;
use App\Models\LeadActivity;
use App\Models\LeadFollowup;
use App\Models\LeadNote;
use Illuminate\Http\Request;

class UserLeadController extends Controller
{
    public function index(Request $request)
    {
        $userId = auth()->id();
        $query = Lead::where('assigned_to', $userId);

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('loan_category')) {
            $query->where('loan_category', $request->loan_category);
        }

        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function ($q) use ($s) {
                $q->where('full_name', 'like', "%{$s}%")
                  ->orWhere('mobile', 'like', "%{$s}%")
                  ->orWhere('reference_code', 'like', "%{$s}%")
                  ->orWhere('city', 'like', "%{$s}%");
            });
        }

        $leads = $query->latest()->paginate(15)->withQueryString();
        $statuses = Lead::getStatuses();

        return view('user.leads.index', compact('leads', 'statuses'));
    }

    public function show($id)
    {
        $userId = auth()->id();
        $lead = Lead::with(['activities.updatedBy', 'notes.user', 'followups'])
            ->where('assigned_to', $userId)
            ->findOrFail($id);

        $statuses = Lead::getStatuses();

        return view('user.leads.show', compact('lead', 'statuses'));
    }

    public function updateStatus(Request $request, $id)
    {
        $userId = auth()->id();
        $lead = Lead::where('assigned_to', $userId)->findOrFail($id);

        $request->validate([
            'status' => ['required', 'string'],
            'note' => ['nullable', 'string', 'max:500'],
        ]);

        $prevStatus = $lead->status;
        $newStatus = $request->status;

        $lead->status = $newStatus;
        $lead->save();

        LeadActivity::create([
            'lead_id' => $lead->id,
            'activity_type' => 'status_changed',
            'previous_value' => Lead::getStatuses()[$prevStatus] ?? $prevStatus,
            'new_value' => Lead::getStatuses()[$newStatus] ?? $newStatus,
            'description' => $request->note ? "Status updated by advisor with note: {$request->note}" : "Status updated to {$newStatus} by " . auth()->user()->name,
            'updated_by_user_id' => $userId,
        ]);

        if ($request->note) {
            LeadNote::create([
                'lead_id' => $lead->id,
                'user_id' => $userId,
                'note' => $request->note,
            ]);
        }

        AuditLog::log('lead_status_updated_by_user', 'leads', 'leads', $lead->id, [
            'from' => $prevStatus,
            'to' => $newStatus,
        ]);

        return back()->with('success', "Lead status updated to {$lead->status_label}.");
    }

    public function addNote(Request $request, $id)
    {
        $userId = auth()->id();
        $lead = Lead::where('assigned_to', $userId)->findOrFail($id);

        $request->validate(['note' => ['required', 'string', 'max:2000']]);

        LeadNote::create([
            'lead_id' => $lead->id,
            'user_id' => $userId,
            'note' => $request->note,
        ]);

        LeadActivity::create([
            'lead_id' => $lead->id,
            'activity_type' => 'notes_added',
            'description' => 'Customer interaction note added by ' . auth()->user()->name,
            'updated_by_user_id' => $userId,
        ]);

        return back()->with('success', 'Interaction note recorded successfully.');
    }

    public function scheduleFollowup(Request $request, $id)
    {
        $userId = auth()->id();
        $lead = Lead::where('assigned_to', $userId)->findOrFail($id);

        $request->validate([
            'followup_date' => ['required', 'date'],
            'followup_time' => ['nullable'],
            'call_outcome' => ['nullable', 'string', 'max:80'],
            'notes' => ['nullable', 'string', 'max:1000'],
        ]);

        LeadFollowup::create([
            'lead_id' => $lead->id,
            'user_id' => $userId,
            'followup_date' => $request->followup_date,
            'followup_time' => $request->followup_time,
            'status' => 'pending',
            'call_outcome' => $request->call_outcome ?: 'Follow-up Scheduled',
            'notes' => $request->notes,
        ]);

        $lead->next_followup_at = $request->followup_date . ' ' . ($request->followup_time ?: '10:00:00');
        if ($lead->status === 'allocated') {
            $lead->status = 'followup_required';
        }
        $lead->save();

        LeadActivity::create([
            'lead_id' => $lead->id,
            'activity_type' => 'followup_added',
            'description' => "Follow-up scheduled for {$request->followup_date} at {$request->followup_time}",
            'updated_by_user_id' => $userId,
        ]);

        return back()->with('success', 'Follow-up scheduled successfully.');
    }
}
