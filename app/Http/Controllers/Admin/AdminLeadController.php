<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use App\Models\Lead;
use App\Models\LeadActivity;
use App\Models\LeadAllocation;
use App\Models\LeadFollowup;
use App\Models\LeadNote;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminLeadController extends Controller
{
    public function index(Request $request)
    {
        $query = Lead::with(['assignedTo', 'assignedBy']);

        // Filters
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('loan_category')) {
            $query->where('loan_category', $request->loan_category);
        }

        if ($request->filled('assigned_to')) {
            if ($request->assigned_to === 'unassigned') {
                $query->whereNull('assigned_to');
            } else {
                $query->where('assigned_to', $request->assigned_to);
            }
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                  ->orWhere('mobile', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('reference_code', 'like', "%{$search}%")
                  ->orWhere('city', 'like', "%{$search}%");
            });
        }

        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        $leads = $query->latest()->paginate(15)->withQueryString();

        // Get active staff for allocation modal
        $users = User::where('account_status', 'active')->orderBy('name')->get();
        $statuses = Lead::getStatuses();

        return view('admin.leads.index', compact('leads', 'users', 'statuses'));
    }

    public function create()
    {
        $users = User::where('account_status', 'active')->orderBy('name')->get();
        return view('admin.leads.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => ['required', 'string', 'max:120'],
            'mobile' => ['required', 'regex:/^[6-9]\d{9}$/'],
            'email' => ['nullable', 'email', 'max:150'],
            'loan_category' => ['required', 'string'],
            'loan_amount' => ['nullable', 'numeric', 'min:10000'],
            'monthly_income' => ['nullable', 'numeric', 'min:0'],
            'employment_type' => ['nullable', 'string'],
            'city' => ['nullable', 'string'],
            'state' => ['nullable', 'string'],
            'pincode' => ['nullable', 'regex:/^\d{6}$/'],
            'preferred_bank' => ['nullable', 'string'],
            'assigned_to' => ['nullable', 'exists:users,id'],
            'internal_notes' => ['nullable', 'string'],
        ]);

        $lead = DB::transaction(function () use ($validated, $request) {
            $data = $validated;
            $data['status'] = !empty($validated['assigned_to']) ? 'allocated' : 'new';
            $data['lead_source'] = 'Admin Portal';
            $data['ip_address'] = $request->ip();

            if (!empty($validated['assigned_to'])) {
                $data['assigned_by'] = auth()->id();
                $data['assigned_at'] = now();
            }

            $lead = Lead::create($data);

            LeadActivity::create([
                'lead_id' => $lead->id,
                'activity_type' => 'lead_created',
                'description' => 'Lead created manually by administrator ' . auth()->user()->name,
                'updated_by_user_id' => auth()->id(),
            ]);

            if ($lead->assigned_to) {
                LeadAllocation::create([
                    'lead_id' => $lead->id,
                    'previous_user_id' => null,
                    'assigned_user_id' => $lead->assigned_to,
                    'allocated_by_user_id' => auth()->id(),
                    'remarks' => 'Assigned upon creation.',
                ]);

                Notification::create([
                    'user_id' => $lead->assigned_to,
                    'title' => 'New Lead Assigned: ' . $lead->full_name,
                    'message' => "Admin assigned {$lead->loan_category_label} for ₹" . number_format($lead->loan_amount) . " to you.",
                    'type' => 'lead_assigned',
                    'link' => '/user/leads/' . $lead->id,
                ]);
            }

            AuditLog::log('lead_created', 'leads', 'leads', $lead->id, [
                'name' => $lead->full_name,
                'category' => $lead->loan_category,
            ]);

            return $lead;
        });

        return redirect()->route('admin.leads.show', $lead)->with('success', "Lead {$lead->reference_code} created successfully!");
    }

    public function show($id)
    {
        $lead = Lead::with([
            'assignedTo',
            'assignedBy',
            'allocations.assignedUser',
            'allocations.previousUser',
            'allocations.allocatedByUser',
            'activities.updatedBy',
            'notes.user',
            'followups.user',
            'documents.uploader'
        ])->findOrFail($id);

        $users = User::where('account_status', 'active')->orderBy('name')->get();
        $statuses = Lead::getStatuses();

        return view('admin.leads.show', compact('lead', 'users', 'statuses'));
    }

    public function allocate(Request $request)
    {
        $userId = $request->user_id ?: $request->assigned_to;
        $request->merge(['user_id' => $userId]);

        $request->validate([
            'lead_ids' => ['required', 'array'],
            'lead_ids.*' => ['exists:leads,id'],
            'user_id' => ['required', 'exists:users,id'],
            'remarks' => ['nullable', 'string', 'max:500'],
        ]);

        $assignee = User::findOrFail($request->user_id);
        $remarks = $request->remarks ?: 'Allocated by administrator ' . auth()->user()->name;
        $count = count($request->lead_ids);

        DB::transaction(function () use ($request, $assignee, $remarks) {
            foreach ($request->lead_ids as $leadId) {
                $lead = Lead::lockForUpdate()->findOrFail($leadId);
                $previousUserId = $lead->assigned_to;

                // Update lead
                $lead->assigned_to = $assignee->id;
                $lead->assigned_by = auth()->id();
                $lead->assigned_at = now();
                if ($lead->status === 'new') {
                    $lead->status = 'allocated';
                }
                $lead->save();

                // 1. Record allocation history
                LeadAllocation::create([
                    'lead_id' => $lead->id,
                    'previous_user_id' => $previousUserId,
                    'assigned_user_id' => $assignee->id,
                    'allocated_by_user_id' => auth()->id(),
                    'remarks' => $remarks,
                    'created_at' => now(),
                ]);

                // 2. Record activity timeline
                LeadActivity::create([
                    'lead_id' => $lead->id,
                    'activity_type' => $previousUserId ? 'lead_reassigned' : 'lead_allocated',
                    'previous_value' => $previousUserId ? (User::find($previousUserId)->name ?? 'User #' . $previousUserId) : 'Unassigned',
                    'new_value' => $assignee->name,
                    'description' => "Lead allocated to {$assignee->name}. Remarks: {$remarks}",
                    'updated_by_user_id' => auth()->id(),
                    'created_at' => now(),
                ]);

                // 3. User In-App Notification
                Notification::create([
                    'user_id' => $assignee->id,
                    'title' => 'Lead Allocated: ' . $lead->full_name,
                    'message' => "You have been allocated {$lead->loan_category_label} (#{$lead->reference_code}) in {$lead->city}.",
                    'type' => 'lead_assigned',
                    'link' => '/user/leads/' . $lead->id,
                    'is_read' => false,
                    'created_at' => now(),
                ]);
            }

            AuditLog::log('leads_allocated', 'leads', 'users', $assignee->id, [
                'count' => count($request->lead_ids),
                'assignee' => $assignee->name,
                'lead_ids' => $request->lead_ids,
            ]);
        });

        return back()->with('success', "Successfully allocated {$count} lead(s) to {$assignee->name}.");
    }

    public function updateStatus(Request $request, $id)
    {
        $lead = Lead::findOrFail($id);
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
            'description' => $request->note ? "Status changed with note: {$request->note}" : "Status changed to {$newStatus}",
            'updated_by_user_id' => auth()->id(),
        ]);

        if ($request->note) {
            LeadNote::create([
                'lead_id' => $lead->id,
                'user_id' => auth()->id(),
                'note' => $request->note,
            ]);
        }

        AuditLog::log('lead_status_updated', 'leads', 'leads', $lead->id, [
            'from' => $prevStatus,
            'to' => $newStatus,
        ]);

        return back()->with('success', "Lead status updated to {$lead->status_label}.");
    }

    public function addNote(Request $request, $id)
    {
        $lead = Lead::findOrFail($id);
        $request->validate(['note' => ['required', 'string', 'max:2000']]);

        LeadNote::create([
            'lead_id' => $lead->id,
            'user_id' => auth()->id(),
            'note' => $request->note,
        ]);

        LeadActivity::create([
            'lead_id' => $lead->id,
            'activity_type' => 'notes_added',
            'description' => 'Note added by ' . auth()->user()->name,
            'updated_by_user_id' => auth()->id(),
        ]);

        return back()->with('success', 'Customer interaction note saved.');
    }

    public function addFollowup(Request $request, $id)
    {
        $lead = Lead::findOrFail($id);
        $request->validate([
            'followup_date' => ['required', 'date'],
            'followup_time' => ['nullable'],
            'call_outcome' => ['nullable', 'string', 'max:80'],
            'notes' => ['nullable', 'string', 'max:1000'],
        ]);

        $followup = LeadFollowup::create([
            'lead_id' => $lead->id,
            'user_id' => $lead->assigned_to ?: auth()->id(),
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
            'updated_by_user_id' => auth()->id(),
        ]);

        return back()->with('success', 'Follow-up successfully scheduled.');
    }

    public function export(Request $request)
    {
        // Safe export with audit logging
        AuditLog::log('leads_exported', 'leads', 'leads', null, ['ip' => $request->ip()]);

        $leads = Lead::with('assignedTo')->latest()->get();
        $csvHeader = ['Reference Code', 'Full Name', 'Mobile', 'Email', 'Loan Category', 'Loan Amount', 'Monthly Income', 'City', 'Status', 'Assigned To', 'Created Date'];

        $callback = function () use ($leads, $csvHeader) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $csvHeader);
            foreach ($leads as $l) {
                fputcsv($file, [
                    $l->reference_code,
                    $l->full_name,
                    $l->mobile,
                    $l->email,
                    $l->loan_category_label,
                    $l->loan_amount,
                    $l->monthly_income,
                    $l->city,
                    $l->status_label,
                    $l->assignedTo->name ?? 'Unassigned',
                    $l->created_at->format('Y-m-d H:i:s'),
                ]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="leads_' . date('Ymd_His') . '.csv"',
        ]);
    }
}

