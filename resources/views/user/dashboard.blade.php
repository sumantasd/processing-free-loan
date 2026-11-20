@extends('user.layouts.app')

@section('title', 'My Workspace Dashboard')

@section('content')
<div class="space-y-6">
    <!-- Welcome Header -->
    <div class="bg-gradient-to-r from-[#062B59] to-[#0866E8] rounded-2xl p-6 text-white shadow-md flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 text-xs font-semibold backdrop-blur-xs mb-2">
                <span class="w-2 h-2 rounded-full bg-[#12C878] animate-pulse"></span>
                <span>Active Advisor Workspace</span>
            </div>
            <h1 class="text-2xl font-extrabold font-heading">Welcome back, {{ auth()->user()->name }}!</h1>
            <p class="text-xs text-blue-100 mt-1">Here is your daily loan pipeline overview, follow-up schedule, and customer action items.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('user.leads.index') }}" class="px-4 py-2.5 bg-white text-[#062B59] hover:bg-blue-50 text-xs font-bold rounded-xl transition shadow-xs flex items-center gap-2">
                <svg class="w-4 h-4 text-[#0866E8]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                View My Leads ({{ $myTotalLeads }})
            </a>
        </div>
    </div>

    <!-- Metrics Cards Grid -->
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
        <div class="bg-white rounded-xl p-4 border border-slate-200/80 shadow-xs">
            <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block">Total Assigned</span>
            <div class="text-2xl font-black text-[#062B59] mt-1">{{ $myTotalLeads }}</div>
            <span class="text-[10px] text-slate-400">All-time leads</span>
        </div>

        <div class="bg-white rounded-xl p-4 border border-blue-100 shadow-xs bg-blue-50/20">
            <span class="text-[11px] font-bold text-[#0866E8] uppercase tracking-wider block">New / Uncontacted</span>
            <div class="text-2xl font-black text-[#0866E8] mt-1">{{ $newLeads }}</div>
            <span class="text-[10px] text-[#0866E8]/70">Needs first call</span>
        </div>

        <div class="bg-white rounded-xl p-4 border border-amber-100 shadow-xs bg-amber-50/20">
            <span class="text-[11px] font-bold text-amber-600 uppercase tracking-wider block">Follow-up Due</span>
            <div class="text-2xl font-black text-amber-600 mt-1">{{ $followupRequired }}</div>
            <span class="text-[10px] text-amber-600/70">Scheduled calls</span>
        </div>

        <div class="bg-white rounded-xl p-4 border border-purple-100 shadow-xs bg-purple-50/20">
            <span class="text-[11px] font-bold text-purple-600 uppercase tracking-wider block">Qualified</span>
            <div class="text-2xl font-black text-purple-600 mt-1">{{ $qualifiedLeads }}</div>
            <span class="text-[10px] text-purple-600/70">Eligible profiles</span>
        </div>

        <div class="bg-white rounded-xl p-4 border border-emerald-100 shadow-xs bg-emerald-50/20">
            <span class="text-[11px] font-bold text-emerald-600 uppercase tracking-wider block">Converted</span>
            <div class="text-2xl font-black text-emerald-600 mt-1">{{ $convertedLeads }}</div>
            <span class="text-[10px] text-emerald-600/70">Disbursed loans</span>
        </div>

        <div class="bg-white rounded-xl p-4 border border-slate-200/80 shadow-xs">
            <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider block">Rejected / Lost</span>
            <div class="text-2xl font-black text-slate-400 mt-1">{{ $rejectedLeads }}</div>
            <span class="text-[10px] text-slate-400">Not eligible</span>
        </div>
    </div>

    <!-- Two-column Section: Follow-ups Today + Recent Allocated Leads -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- Left: Follow-ups Action Centre (1 col) -->
        <div class="space-y-6">
            <!-- Overdue Alert (if any) -->
            @if($overdueFollowups->count() > 0)
            <div class="bg-red-50 border border-red-200 rounded-2xl p-4 text-red-800">
                <div class="flex items-center gap-2 font-bold text-xs">
                    <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                    <span>{{ $overdueFollowups->count() }} Overdue Follow-up(s)</span>
                </div>
                <p class="text-[11px] text-red-600 mt-1">Please connect with these customers immediately to prevent lead drop-off.</p>
                <div class="mt-3 space-y-2">
                    @foreach($overdueFollowups->take(3) as $of)
                    <div class="bg-white p-2.5 rounded-xl border border-red-100 flex items-center justify-between text-xs">
                        <div>
                            <div class="font-bold text-[#062B59]">{{ $of->lead->full_name ?? 'Customer' }}</div>
                            <div class="text-[10px] text-red-600 font-semibold">{{ \Carbon\Carbon::parse($of->followup_date)->format('d M') }} &bull; {{ $of->lead->mobile ?? '' }}</div>
                        </div>
                        <a href="{{ route('user.leads.show', $of->lead_id) }}" class="px-2.5 py-1 bg-red-600 text-white font-bold rounded-lg text-[10px]">Call</a>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Today's Follow-ups -->
            <div class="bg-white rounded-2xl border border-slate-200/80 p-5 shadow-xs">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-sm font-bold text-[#062B59] flex items-center gap-2">
                        <svg class="w-4 h-4 text-[#0866E8]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        Today's Follow-up Schedule ({{ $todayFollowups->count() }})
                    </h2>
                    <a href="{{ route('user.followups.index') }}" class="text-[11px] font-bold text-[#0866E8] hover:underline">View All</a>
                </div>

                <div class="space-y-3">
                    @forelse($todayFollowups as $tf)
                    <div class="p-3 rounded-xl border border-slate-100 hover:border-blue-200 bg-slate-50/50 hover:bg-blue-50/30 transition flex items-center justify-between">
                        <div>
                            <div class="text-xs font-bold text-[#062B59]">{{ $tf->lead->full_name ?? 'Lead' }}</div>
                            <div class="text-[10px] text-slate-500 mt-0.5">
                                <span class="font-semibold text-blue-600">{{ $tf->followup_time ? \Carbon\Carbon::parse($tf->followup_time)->format('h:i A') : 'Anytime' }}</span>
                                &bull; {{ $tf->call_outcome ?: 'Scheduled' }}
                            </div>
                        </div>
                        <a href="{{ route('user.leads.show', $tf->lead_id) }}" class="px-3 py-1 bg-[#062B59] text-white hover:bg-[#031B3B] text-[10px] font-bold rounded-lg transition">
                            Open
                        </a>
                    </div>
                    @empty
                    <div class="py-8 text-center text-xs text-slate-400">
                        <svg class="w-8 h-8 mx-auto text-slate-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        No pending follow-ups scheduled for today.
                    </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Right: Recent Assigned Leads (2 cols) -->
        <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-200/80 shadow-xs overflow-hidden">
            <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                <div>
                    <h2 class="text-sm font-bold text-[#062B59]">Recently Assigned Leads</h2>
                    <p class="text-[11px] text-slate-400">Your latest loan applications received from the central allocation queue</p>
                </div>
                <a href="{{ route('user.leads.index') }}" class="text-xs font-bold text-[#0866E8] hover:underline">Full Pipeline &rarr;</a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50/70 border-b border-slate-100 text-[10px] font-bold text-slate-400 uppercase tracking-wider">
                            <th class="py-3 px-5">Customer</th>
                            <th class="py-3 px-5">Loan Type</th>
                            <th class="py-3 px-5">Amount</th>
                            <th class="py-3 px-5">Status</th>
                            <th class="py-3 px-5">Allocated On</th>
                            <th class="py-3 px-5 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-xs">
                        @forelse($recentLeads as $lead)
                        <tr class="hover:bg-slate-50/70 transition">
                            <td class="py-3.5 px-5">
                                <div class="font-bold text-[#062B59]">{{ $lead->full_name }}</div>
                                <div class="text-[11px] text-slate-400">{{ $lead->mobile }} &bull; {{ $lead->city ?: 'India' }}</div>
                            </td>
                            <td class="py-3.5 px-5 font-semibold text-slate-700">
                                {{ $lead->loan_type_label }}
                            </td>
                            <td class="py-3.5 px-5 font-bold text-[#062B59]">
                                {{ $lead->formatted_amount }}
                            </td>
                            <td class="py-3.5 px-5">
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold {{ $lead->status_badge_class }}">
                                    {{ $lead->status_label }}
                                </span>
                            </td>
                            <td class="py-3.5 px-5 text-slate-400 text-[11px]">
                                {{ $lead->assigned_at ? $lead->assigned_at->diffForHumans() : $lead->created_at->diffForHumans() }}
                            </td>
                            <td class="py-3.5 px-5 text-right">
                                <a href="{{ route('user.leads.show', $lead->id) }}" class="inline-flex items-center px-3 py-1 bg-blue-50 text-[#0866E8] hover:bg-blue-100 rounded-lg text-xs font-bold transition">
                                    Process &rarr;
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="py-12 text-center text-slate-400">No leads currently assigned to you.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
