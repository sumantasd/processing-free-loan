@extends('admin.layouts.app')

@section('title', 'Lead Details: ' . $lead->reference_code)
@section('header_title', 'Lead #' . $lead->reference_code)

@section('content')
<div class="space-y-6">
    
    <!-- Top Action Breadcrumb -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div class="flex items-center gap-2">
            <a href="{{ route('admin.leads.index') }}" class="p-2 rounded-xl bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            </a>
            <div>
                <div class="flex items-center gap-2">
                    <h2 class="text-xl sm:text-2xl font-extrabold text-[#062B59] font-heading">
                        {{ $lead->full_name }}
                    </h2>
                    <span class="px-2.5 py-0.5 rounded-full text-xs font-extrabold border {{ $lead->status_color }}">
                        {{ $lead->status_label }}
                    </span>
                </div>
                <p class="text-xs text-slate-400 mt-0.5">Reference: <strong class="text-[#1677FF]">{{ $lead->reference_code }}</strong> • Submitted {{ $lead->created_at->format('d M Y, h:i A') }}</p>
            </div>
        </div>

        <div class="flex items-center gap-2">
            <a href="tel:{{ $lead->mobile }}" class="px-4 py-2 rounded-xl bg-emerald-50 text-emerald-700 hover:bg-emerald-100 font-extrabold text-xs flex items-center gap-1.5 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                <span>Call Client</span>
            </a>
            @if($lead->email)
            <a href="mailto:{{ $lead->email }}" class="px-4 py-2 rounded-xl bg-blue-50 text-blue-700 hover:bg-blue-100 font-extrabold text-xs flex items-center gap-1.5 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                <span>Email</span>
            </a>
            @endif
        </div>
    </div>

    <!-- Main Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
        
        <!-- Left Column: Customer & Loan Details (Col 8) -->
        <div class="lg:col-span-8 space-y-6">
            
            <!-- Customer & Loan Profile Card -->
            <div class="bg-white rounded-3xl p-6 border border-slate-200/80 shadow-xs">
                <h3 class="text-sm font-extrabold text-[#062B59] uppercase tracking-wider mb-4 border-b border-slate-100 pb-3">
                    Loan Application Data
                </h3>

                <div class="grid grid-cols-2 sm:grid-cols-3 gap-5 text-xs">
                    <div>
                        <span class="text-slate-400 font-bold uppercase text-[10px] block">Loan Category</span>
                        <span class="font-extrabold text-[#062B59] text-sm mt-0.5 block">{{ $lead->loan_category_label }}</span>
                    </div>

                    <div>
                        <span class="text-slate-400 font-bold uppercase text-[10px] block">Requested Amount</span>
                        <span class="font-extrabold text-emerald-600 text-sm mt-0.5 block">₹{{ number_format($lead->loan_amount) }}</span>
                    </div>

                    <div>
                        <span class="text-slate-400 font-bold uppercase text-[10px] block">Monthly Income</span>
                        <span class="font-extrabold text-[#062B59] text-sm mt-0.5 block">₹{{ number_format($lead->monthly_income) }}/mo</span>
                    </div>

                    <div>
                        <span class="text-slate-400 font-bold uppercase text-[10px] block">Employment</span>
                        <span class="font-semibold text-slate-700 mt-0.5 block capitalize">{{ str_replace('_', ' ', $lead->employment_type ?: 'Not Specified') }}</span>
                    </div>

                    <div>
                        <span class="text-slate-400 font-bold uppercase text-[10px] block">City / PIN</span>
                        <span class="font-semibold text-slate-700 mt-0.5 block">{{ $lead->city ?: 'N/A' }} {{ $lead->pincode ? "({$lead->pincode})" : '' }}</span>
                    </div>

                    <div>
                        <span class="text-slate-400 font-bold uppercase text-[10px] block">Preferred Bank</span>
                        <span class="font-semibold text-slate-700 mt-0.5 block">{{ $lead->preferred_bank ?: 'Any Top Bank' }}</span>
                    </div>

                    <div>
                        <span class="text-slate-400 font-bold uppercase text-[10px] block">Consent Status</span>
                        <span class="font-bold text-emerald-600 mt-0.5 block">Authorized &amp; Verified</span>
                    </div>

                    <div>
                        <span class="text-slate-400 font-bold uppercase text-[10px] block">Lead Source</span>
                        <span class="font-semibold text-slate-700 mt-0.5 block">{{ $lead->lead_source }}</span>
                    </div>

                    <div>
                        <span class="text-slate-400 font-bold uppercase text-[10px] block">IP Address</span>
                        <span class="font-mono text-slate-500 mt-0.5 block">{{ $lead->ip_address ?: '127.0.0.1' }}</span>
                    </div>
                </div>

                @if($lead->internal_notes)
                <div class="mt-5 p-3.5 rounded-2xl bg-slate-50 border border-slate-100 text-xs">
                    <span class="font-bold text-slate-500 uppercase text-[10px] block mb-1">Initial Application Note</span>
                    <p class="text-slate-700 leading-relaxed">{{ $lead->internal_notes }}</p>
                </div>
                @endif
            </div>

            <!-- Lead Activity Timeline Card -->
            <div class="bg-white rounded-3xl p-6 border border-slate-200/80 shadow-xs">
                <h3 class="text-sm font-extrabold text-[#062B59] uppercase tracking-wider mb-4 border-b border-slate-100 pb-3 flex items-center justify-between">
                    <span>Audit &amp; Activity Timeline</span>
                    <span class="text-xs font-semibold text-slate-400">{{ $lead->activities->count() }} activities</span>
                </h3>

                <div class="space-y-4">
                    @forelse($lead->activities as $activity)
                    <div class="flex items-start gap-3 text-xs">
                        <div class="w-8 h-8 rounded-full bg-blue-50 text-[#1677FF] flex items-center justify-center flex-shrink-0 mt-0.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <div class="min-w-0 flex-1">
                            <div class="flex items-center justify-between">
                                <span class="font-bold text-[#062B59] capitalize">{{ str_replace('_', ' ', $activity->activity_type) }}</span>
                                <span class="text-[10px] text-slate-400">{{ $activity->created_at->format('d M Y, h:i A') }}</span>
                            </div>
                            <p class="text-slate-600 mt-0.5 leading-relaxed">{{ $activity->description }}</p>
                            @if($activity->updatedBy)
                                <span class="text-[10px] font-bold text-slate-400">By {{ $activity->updatedBy->name }}</span>
                            @endif
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-4 text-xs text-slate-400">No activity recorded yet.</div>
                    @endforelse
                </div>
            </div>

            <!-- Allocation History Card -->
            <div class="bg-white rounded-3xl p-6 border border-slate-200/80 shadow-xs">
                <h3 class="text-sm font-extrabold text-[#062B59] uppercase tracking-wider mb-4 border-b border-slate-100 pb-3">
                    Allocation &amp; Ownership History
                </h3>

                <div class="space-y-3">
                    @forelse($lead->allocations as $alloc)
                    <div class="p-3 rounded-2xl bg-slate-50 border border-slate-100 text-xs flex items-center justify-between">
                        <div>
                            <div class="font-bold text-[#062B59]">
                                Allocated to <span class="text-[#1677FF]">{{ $alloc->assignedUser->name ?? 'Staff' }}</span>
                                @if($alloc->previousUser)
                                    <span class="text-slate-400 font-normal">(Reassigned from {{ $alloc->previousUser->name }})</span>
                                @endif
                            </div>
                            <div class="text-[11px] text-slate-500 mt-0.5">{{ $alloc->remarks ?: 'No remarks' }}</div>
                        </div>
                        <div class="text-right text-[10px] text-slate-400">
                            <div>{{ $alloc->created_at->format('d M Y, h:i A') }}</div>
                            @if($alloc->allocatedByUser)
                                <div>By {{ $alloc->allocatedByUser->name }}</div>
                            @endif
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-4 text-xs text-slate-400">This lead has not been allocated yet.</div>
                    @endforelse
                </div>
            </div>

        </div>

        <!-- Right Column: Actions, Assign, Notes, Followup (Col 4) -->
        <div class="lg:col-span-4 space-y-6">
            
            <!-- Quick Allocation Card -->
            <div class="bg-white rounded-3xl p-6 border border-slate-200/80 shadow-xs">
                <h3 class="text-sm font-extrabold text-[#062B59] uppercase tracking-wider mb-3">
                    Assigned Ownership
                </h3>

                <div class="p-3.5 rounded-2xl bg-blue-50/70 border border-blue-100 mb-4 flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-[#1677FF] text-white flex items-center justify-center font-bold text-sm">
                        {{ substr($lead->assignedTo->name ?? 'U', 0, 1) }}
                    </div>
                    <div>
                        <div class="text-xs font-bold text-[#062B59]">
                            {{ $lead->assignedTo->name ?? 'Unallocated' }}
                        </div>
                        <div class="text-[10px] text-slate-500">
                            {{ $lead->assignedTo->designation ?? 'Not assigned to any executive' }}
                        </div>
                    </div>
                </div>

                <form method="POST" action="{{ route('admin.leads.allocate') }}" class="space-y-3">
                    @csrf
                    <input type="hidden" name="lead_ids[]" value="{{ $lead->id }}">

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1">
                            Reassign To
                        </label>
                        <select name="user_id" required class="w-full h-10 px-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-[#102B50] focus:bg-white outline-none">
                            <option value="">-- Choose User --</option>
                            @foreach($users as $u)
                                <option value="{{ $u->id }}" {{ $lead->assigned_to == $u->id ? 'selected' : '' }}>
                                    {{ $u->name }} ({{ $u->designation ?: 'Staff' }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <input type="text" name="remarks" placeholder="Optional allocation note..."
                               class="w-full h-10 px-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-medium text-[#102B50] focus:bg-white outline-none">
                    </div>

                    <button type="submit" class="w-full h-10 bg-[#062B59] hover:bg-[#031B3B] text-white font-extrabold text-xs uppercase tracking-wider rounded-xl shadow-xs transition-colors">
                        Update Allocation
                    </button>
                </form>
            </div>

            <!-- Status Updater Card -->
            <div class="bg-white rounded-3xl p-6 border border-slate-200/80 shadow-xs">
                <h3 class="text-sm font-extrabold text-[#062B59] uppercase tracking-wider mb-3">
                    Update Pipeline Status
                </h3>

                <form method="POST" action="{{ route('admin.leads.status', $lead) }}" class="space-y-3">
                    @csrf
                    <div>
                        <select name="status" required class="w-full h-10 px-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-[#102B50] focus:bg-white outline-none">
                            @foreach($statuses as $k => $lbl)
                                <option value="{{ $k }}" {{ $lead->status === $k ? 'selected' : '' }}>{{ $lbl }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <input type="text" name="note" placeholder="Reason for status change..."
                               class="w-full h-10 px-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-medium text-[#102B50] focus:bg-white outline-none">
                    </div>

                    <button type="submit" class="w-full h-10 bg-[#1677FF] hover:bg-[#0866E8] text-white font-extrabold text-xs uppercase tracking-wider rounded-xl shadow-xs transition-colors">
                        Save Status
                    </button>
                </form>
            </div>

            <!-- Schedule Follow-up Card -->
            <div class="bg-white rounded-3xl p-6 border border-slate-200/80 shadow-xs">
                <h3 class="text-sm font-extrabold text-[#062B59] uppercase tracking-wider mb-3">
                    Schedule Follow-up
                </h3>

                <form method="POST" action="{{ route('admin.leads.followup', $lead) }}" class="space-y-3">
                    @csrf
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <label class="block text-[10px] font-bold uppercase text-slate-400 mb-1">Date</label>
                            <input type="date" name="followup_date" min="{{ date('Y-m-d') }}" required
                                   class="w-full h-10 px-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-[#102B50] focus:bg-white outline-none">
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold uppercase text-slate-400 mb-1">Time</label>
                            <input type="time" name="followup_time" value="11:00"
                                   class="w-full h-10 px-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-[#102B50] focus:bg-white outline-none">
                        </div>
                    </div>

                    <div>
                        <input type="text" name="call_outcome" placeholder="Reason (e.g. Call for document collection)"
                               class="w-full h-10 px-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-medium text-[#102B50] focus:bg-white outline-none">
                    </div>

                    <button type="submit" class="w-full h-10 bg-emerald-600 hover:bg-emerald-700 text-white font-extrabold text-xs uppercase tracking-wider rounded-xl shadow-xs transition-colors">
                        Set Follow-up
                    </button>
                </form>
            </div>

            <!-- Internal Notes Card -->
            <div class="bg-white rounded-3xl p-6 border border-slate-200/80 shadow-xs">
                <h3 class="text-sm font-extrabold text-[#062B59] uppercase tracking-wider mb-3">
                    Interaction Notes
                </h3>

                <form method="POST" action="{{ route('admin.leads.note', $lead) }}" class="space-y-3 mb-4">
                    @csrf
                    <textarea name="note" rows="3" required placeholder="Record customer call feedback or internal remarks..."
                              class="w-full p-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-medium text-[#102B50] focus:bg-white outline-none"></textarea>
                    <button type="submit" class="w-full h-9 bg-slate-800 hover:bg-black text-white font-extrabold text-xs uppercase tracking-wider rounded-xl transition-colors">
                        Add Note
                    </button>
                </form>

                <div class="space-y-2 max-h-48 overflow-y-auto pr-1">
                    @forelse($lead->notes as $note)
                    <div class="p-3 rounded-xl bg-slate-50 border border-slate-100 text-xs">
                        <p class="text-slate-700 leading-snug">{{ $note->note }}</p>
                        <div class="text-[10px] text-slate-400 mt-1 flex justify-between">
                            <span>{{ $note->user->name ?? 'Staff' }}</span>
                            <span>{{ $note->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-2 text-xs text-slate-400">No notes added yet.</div>
                    @endforelse
                </div>
            </div>

        </div>

    </div>

</div>
@endsection
