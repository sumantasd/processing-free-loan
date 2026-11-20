@extends('user.layouts.app')

@section('title', 'Lead #' . ($lead->reference_code ?: $lead->id) . ' - ' . $lead->full_name)

@section('content')
<div class="space-y-6">
    <!-- Top Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <div class="flex items-center gap-3">
                <a href="{{ route('user.leads.index') }}" class="text-slate-400 hover:text-slate-600 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                </a>
                <h1 class="text-2xl font-extrabold text-[#062B59] font-heading">{{ $lead->full_name }}</h1>
                <span class="px-2.5 py-1 rounded-full text-xs font-bold {{ $lead->status_badge_class }}">
                    {{ $lead->status_label }}
                </span>
            </div>
            <p class="text-xs text-slate-500 mt-1 pl-8">Ref: <span class="font-mono font-bold text-[#0866E8]">{{ $lead->reference_code ?: '#L-' . $lead->id }}</span> &bull; Allocated: {{ $lead->assigned_at ? $lead->assigned_at->format('d M Y, h:i A') : 'N/A' }}</p>
        </div>

        <div class="flex items-center gap-2">
            <a href="tel:{{ $lead->mobile }}" class="px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold rounded-xl shadow-xs transition flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                Call Customer ({{ $lead->mobile }})
            </a>
            @if($lead->email)
            <a href="mailto:{{ $lead->email }}" class="px-4 py-2 bg-blue-50 text-[#0866E8] hover:bg-blue-100 text-xs font-bold rounded-xl transition flex items-center gap-2">
                Email
            </a>
            @endif
        </div>
    </div>

    <!-- Main 3-column Layout -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- Column 1 & 2: Customer Details + Status Update + Interaction Notes (2 cols) -->
        <div class="lg:col-span-2 space-y-6">

            <!-- Customer & Loan Profile Card -->
            <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-xs">
                <h2 class="text-sm font-bold text-[#062B59] uppercase tracking-wider mb-4 border-b border-slate-100 pb-3 flex items-center gap-2">
                    <svg class="w-4 h-4 text-[#0866E8]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    Borrower Profile & Financial Requirements
                </h2>

                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 text-xs">
                    <div>
                        <span class="text-slate-400 block text-[10px] uppercase font-bold">Requested Loan</span>
                        <span class="font-bold text-[#062B59] text-sm">{{ $lead->loan_type_label }}</span>
                    </div>
                    <div>
                        <span class="text-slate-400 block text-[10px] uppercase font-bold">Loan Amount</span>
                        <span class="font-extrabold text-[#0866E8] text-sm">{{ $lead->formatted_amount }}</span>
                    </div>
                    <div>
                        <span class="text-slate-400 block text-[10px] uppercase font-bold">Preferred Tenure</span>
                        <span class="font-semibold text-slate-700">{{ $lead->tenure_months ? $lead->tenure_months . ' Months' : 'Flexible' }}</span>
                    </div>

                    <div>
                        <span class="text-slate-400 block text-[10px] uppercase font-bold">Monthly Income</span>
                        <span class="font-bold text-slate-700">₹{{ number_format($lead->monthly_income) }}</span>
                    </div>
                    <div>
                        <span class="text-slate-400 block text-[10px] uppercase font-bold">Employment</span>
                        <span class="font-semibold text-slate-700">{{ $lead->employment_type_label }}</span>
                    </div>
                    <div>
                        <span class="text-slate-400 block text-[10px] uppercase font-bold">City / Location</span>
                        <span class="font-semibold text-slate-700">{{ $lead->city ?: 'N/A' }} {{ $lead->pincode ? '(' . $lead->pincode . ')' : '' }}</span>
                    </div>

                    <div>
                        <span class="text-slate-400 block text-[10px] uppercase font-bold">PAN Number</span>
                        <span class="font-mono font-bold text-slate-700">{{ $lead->pan_number ?: 'Not provided' }}</span>
                    </div>
                    <div>
                        <span class="text-slate-400 block text-[10px] uppercase font-bold">CIBIL Score</span>
                        <span class="font-bold {{ $lead->cibil_score >= 750 ? 'text-emerald-600' : 'text-slate-700' }}">{{ $lead->cibil_score ?: 'To be fetched' }}</span>
                    </div>
                    <div>
                        <span class="text-slate-400 block text-[10px] uppercase font-bold">Lead Source</span>
                        <span class="font-semibold text-slate-700">{{ Str::headline($lead->lead_source) }}</span>
                    </div>
                </div>
            </div>

            <!-- Quick Status Transition Box -->
            <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-xs">
                <h2 class="text-sm font-bold text-[#062B59] uppercase tracking-wider mb-3">Update Lead Pipeline Stage</h2>
                <form action="{{ route('user.leads.status', $lead->id) }}" method="POST" class="space-y-4">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Select New Status</label>
                            <select name="status" class="w-full px-3.5 py-2.5 text-xs font-bold border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
                                @foreach($statuses as $code => $label)
                                <option value="{{ $code }}" {{ $lead->status === $code ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Status Note (Optional)</label>
                            <input type="text" name="note" placeholder="Reason or update context..." class="w-full px-3.5 py-2.5 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="px-5 py-2.5 bg-[#062B59] hover:bg-[#031B3B] text-white text-xs font-bold rounded-xl shadow-xs transition">
                            Save Stage Transition
                        </button>
                    </div>
                </form>
            </div>

            <!-- Interaction Notes History & New Note Form -->
            <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-xs space-y-4">
                <h2 class="text-sm font-bold text-[#062B59] uppercase tracking-wider">Interaction Notes & Call Logs</h2>

                <form action="{{ route('user.leads.note', $lead->id) }}" method="POST" class="space-y-3">
                    @csrf
                    <div>
                        <textarea name="note" rows="3" required placeholder="Record notes from your discussion with the customer, requirements, bank preferences, document status..." class="w-full px-3.5 py-2.5 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]"></textarea>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="px-4 py-2 bg-[#0866E8] hover:bg-blue-600 text-white text-xs font-bold rounded-xl transition">
                            Post Note
                        </button>
                    </div>
                </form>

                <div class="pt-4 border-t border-slate-100 space-y-3">
                    @forelse($lead->notes as $note)
                    <div class="p-3 bg-slate-50 rounded-xl text-xs space-y-1">
                        <div class="flex items-center justify-between text-[11px] text-slate-400">
                            <span class="font-bold text-[#062B59]">{{ $note->user->name ?? 'Advisor' }}</span>
                            <span>{{ $note->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="text-slate-700 leading-relaxed">{{ $note->note }}</p>
                    </div>
                    @empty
                    <p class="text-xs text-slate-400 italic py-2">No interaction notes recorded yet.</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Column 3: Follow-up Scheduler + Audit Timeline (1 col) -->
        <div class="space-y-6">

            <!-- Schedule Follow-up Card -->
            <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-xs">
                <h2 class="text-sm font-bold text-[#062B59] uppercase tracking-wider mb-4 flex items-center gap-2">
                    <svg class="w-4 h-4 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Schedule Next Follow-up
                </h2>

                <form action="{{ route('user.leads.followup', $lead->id) }}" method="POST" class="space-y-3">
                    @csrf
                    <div>
                        <label class="block text-[11px] font-bold text-slate-700 mb-1">Follow-up Date <span class="text-red-500">*</span></label>
                        <input type="date" name="followup_date" required min="{{ date('Y-m-d') }}" value="{{ date('Y-m-d', strtotime('+1 day')) }}" class="w-full px-3 py-2 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
                    </div>

                    <div>
                        <label class="block text-[11px] font-bold text-slate-700 mb-1">Preferred Time</label>
                        <input type="time" name="followup_time" value="11:00" class="w-full px-3 py-2 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
                    </div>

                    <div>
                        <label class="block text-[11px] font-bold text-slate-700 mb-1">Call Purpose / Outcome</label>
                        <input type="text" name="call_outcome" placeholder="Document Collection, Bank Option Selection" class="w-full px-3 py-2 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
                    </div>

                    <div>
                        <label class="block text-[11px] font-bold text-slate-700 mb-1">Specific Instructions</label>
                        <textarea name="notes" rows="2" placeholder="Customer asked to call after 3 PM..." class="w-full px-3 py-2 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]"></textarea>
                    </div>

                    <button type="submit" class="w-full py-2.5 bg-[#062B59] hover:bg-[#031B3B] text-white text-xs font-bold rounded-xl transition shadow-xs">
                        Set Follow-up Reminder
                    </button>
                </form>
            </div>

            <!-- Lead Activity Timeline -->
            <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-xs">
                <h2 class="text-sm font-bold text-[#062B59] uppercase tracking-wider mb-4">Activity Timeline</h2>

                <div class="relative pl-6 space-y-4 before:absolute before:left-2 before:top-2 before:bottom-2 before:w-0.5 before:bg-slate-200">
                    @forelse($lead->activities as $activity)
                    <div class="relative">
                        <div class="absolute -left-6 top-1 w-2.5 h-2.5 rounded-full bg-[#0866E8] ring-4 ring-white"></div>
                        <div class="text-xs font-bold text-[#062B59]">{{ Str::headline($activity->activity_type) }}</div>
                        <p class="text-[11px] text-slate-600 mt-0.5">{{ $activity->description }}</p>
                        <span class="text-[10px] text-slate-400 mt-1 block">{{ $activity->created_at->diffForHumans() }}</span>
                    </div>
                    @empty
                    <p class="text-xs text-slate-400 italic">No activity recorded yet.</p>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
