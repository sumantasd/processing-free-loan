@extends('admin.layouts.app')

@section('title', 'Follow-up Management')
@section('header_title', 'Customer Follow-ups & Reminders')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-xl sm:text-2xl font-extrabold text-[#062B59] font-heading tracking-tight">
                Scheduled Call Outcomes &amp; Follow-ups
            </h2>
            <p class="text-xs text-slate-500 mt-0.5">
                Monitor team follow-up pipelines, overdue verification calls and pending customer reminders.
            </p>
        </div>
    </div>

    <!-- Tabs -->
    <div class="flex items-center gap-2 border-b border-slate-200/80 pb-3 overflow-x-auto text-xs font-bold">
        <a href="{{ route('admin.followups.index', ['tab' => 'all']) }}" 
           class="px-4 py-2 rounded-xl transition-colors {{ $tab === 'all' ? 'bg-[#062B59] text-white shadow-xs' : 'bg-white text-slate-600 hover:bg-slate-50' }}">
            All ({{ $stats['all'] }})
        </a>
        <a href="{{ route('admin.followups.index', ['tab' => 'today']) }}" 
           class="px-4 py-2 rounded-xl transition-colors {{ $tab === 'today' ? 'bg-[#062B59] text-white shadow-xs' : 'bg-white text-slate-600 hover:bg-slate-50' }}">
            Today's Calls ({{ $stats['today'] }})
        </a>
        <a href="{{ route('admin.followups.index', ['tab' => 'upcoming']) }}" 
           class="px-4 py-2 rounded-xl transition-colors {{ $tab === 'upcoming' ? 'bg-[#062B59] text-white shadow-xs' : 'bg-white text-slate-600 hover:bg-slate-50' }}">
            Upcoming ({{ $stats['upcoming'] }})
        </a>
        <a href="{{ route('admin.followups.index', ['tab' => 'overdue']) }}" 
           class="px-4 py-2 rounded-xl transition-colors {{ $tab === 'overdue' ? 'bg-red-600 text-white shadow-xs' : 'bg-white text-red-600 hover:bg-red-50' }}">
            Overdue Reminders ({{ $stats['overdue'] }})
        </a>
    </div>

    <!-- Followups Table -->
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-50 text-slate-500 font-extrabold uppercase text-[10px] border-b border-slate-200/80">
                    <tr>
                        <th class="p-3.5 pl-5">Lead / Client</th>
                        <th class="p-3.5">Category</th>
                        <th class="p-3.5">Follow-up Date &amp; Time</th>
                        <th class="p-3.5">Assigned Officer</th>
                        <th class="p-3.5">Status</th>
                        <th class="p-3.5">Reason / Outcome</th>
                        <th class="p-3.5 pr-5 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 font-medium">
                    @forelse($followups as $f)
                    <tr class="hover:bg-blue-50/40 transition-colors">
                        <td class="p-3.5 pl-5">
                            <div class="font-bold text-[#062B59]">{{ $f->lead->full_name ?? 'Lead #' . $f->lead_id }}</div>
                            <div class="text-[11px] text-slate-400 font-normal">{{ $f->lead->mobile ?? '' }}</div>
                        </td>
                        <td class="p-3.5">
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-slate-100 text-slate-700">
                                {{ $f->lead->loan_category_label ?? 'Loan' }}
                            </span>
                        </td>
                        <td class="p-3.5 font-semibold text-[#102B50]">
                            <div>{{ $f->followup_date->format('d M Y') }}</div>
                            <div class="text-[10px] text-slate-400">{{ $f->followup_time ?: '10:00 AM' }}</div>
                        </td>
                        <td class="p-3.5">
                            <span class="font-bold text-slate-800">{{ $f->user->name ?? 'Staff' }}</span>
                        </td>
                        <td class="p-3.5">
                            @if($f->status === 'completed')
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-extrabold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                    Completed
                                </span>
                            @elseif($f->followup_date < today() && $f->status === 'pending')
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-extrabold bg-red-50 text-red-700 border border-red-200">
                                    Overdue
                                </span>
                            @else
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-extrabold bg-amber-50 text-amber-700 border border-amber-200">
                                    Pending
                                </span>
                            @endif
                        </td>
                        <td class="p-3.5 text-slate-600 max-w-xs truncate">
                            {{ $f->call_outcome ?: ($f->notes ?: 'Scheduled Followup') }}
                        </td>
                        <td class="p-3.5 pr-5 text-right">
                            @if($f->lead)
                            <a href="{{ route('admin.leads.show', $f->lead) }}" class="px-2.5 py-1 rounded-lg bg-[#1677FF] hover:bg-[#0866E8] text-white font-bold text-[11px] transition-colors">
                                View Lead
                            </a>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="p-8 text-center text-slate-400">No follow-ups found under this tab.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($followups->hasPages())
        <div class="p-4 border-t border-slate-100 bg-slate-50">
            {{ $followups->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
