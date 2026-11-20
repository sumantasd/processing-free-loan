@extends('user.layouts.app')

@section('title', 'My Follow-up Tracker')

@section('content')
<div class="space-y-6" x-data="{ completeModal: false, activeId: '', activeOutcome: '', activeNotes: '' }">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-[#062B59] font-heading">Follow-up Management</h1>
            <p class="text-xs text-slate-500 mt-1">Organize your scheduled applicant callbacks, document follow-ups, and review outcomes</p>
        </div>
    </div>

    <!-- Tabs & Counters -->
    <div class="flex flex-wrap gap-2 border-b border-slate-200 pb-3">
        <a href="{{ route('user.followups.index', ['tab' => 'all']) }}" 
           class="px-4 py-2 rounded-xl text-xs font-bold transition {{ $tab === 'all' ? 'bg-[#062B59] text-white shadow-xs' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200' }}">
            All ({{ $stats['all'] }})
        </a>
        <a href="{{ route('user.followups.index', ['tab' => 'today']) }}" 
           class="px-4 py-2 rounded-xl text-xs font-bold transition {{ $tab === 'today' ? 'bg-[#0866E8] text-white shadow-xs' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200' }}">
            Today ({{ $stats['today'] }})
        </a>
        <a href="{{ route('user.followups.index', ['tab' => 'upcoming']) }}" 
           class="px-4 py-2 rounded-xl text-xs font-bold transition {{ $tab === 'upcoming' ? 'bg-purple-600 text-white shadow-xs' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200' }}">
            Upcoming ({{ $stats['upcoming'] }})
        </a>
        <a href="{{ route('user.followups.index', ['tab' => 'overdue']) }}" 
           class="px-4 py-2 rounded-xl text-xs font-bold transition {{ $tab === 'overdue' ? 'bg-red-600 text-white shadow-xs' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200' }}">
            Overdue ({{ $stats['overdue'] }})
        </a>
    </div>

    <!-- Follow-ups Table -->
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 text-[11px] font-bold text-slate-500 uppercase tracking-wider">
                        <th class="py-3.5 px-6">Scheduled Date & Time</th>
                        <th class="py-3.5 px-6">Customer / Lead</th>
                        <th class="py-3.5 px-6">Mobile Contact</th>
                        <th class="py-3.5 px-6">Call Purpose / Outcome</th>
                        <th class="py-3.5 px-6">Status</th>
                        <th class="py-3.5 px-6 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-xs">
                    @forelse($followups as $item)
                    <tr class="hover:bg-slate-50/70 transition">
                        <td class="py-4 px-6">
                            <div class="font-bold text-[#062B59]">{{ \Carbon\Carbon::parse($item->followup_date)->format('d M Y') }}</div>
                            <div class="text-[11px] text-slate-400">{{ $item->followup_time ? \Carbon\Carbon::parse($item->followup_time)->format('h:i A') : 'Flexible' }}</div>
                        </td>
                        <td class="py-4 px-6">
                            @if($item->lead)
                            <a href="{{ route('user.leads.show', $item->lead_id) }}" class="font-bold text-[#0866E8] hover:underline">
                                {{ $item->lead->full_name }}
                            </a>
                            <div class="text-[11px] text-slate-400">{{ $item->lead->loan_type_label }} &bull; {{ $item->lead->city }}</div>
                            @else
                            <span class="text-slate-400">Lead Removed</span>
                            @endif
                        </td>
                        <td class="py-4 px-6">
                            @if($item->lead)
                            <a href="tel:{{ $item->lead->mobile }}" class="font-semibold text-slate-700 hover:text-emerald-600">
                                {{ $item->lead->mobile }}
                            </a>
                            @else
                            -
                            @endif
                        </td>
                        <td class="py-4 px-6">
                            <div class="font-semibold text-slate-700">{{ $item->call_outcome ?: 'Follow-up' }}</div>
                            @if($item->notes)
                            <div class="text-[11px] text-slate-400 truncate max-w-xs">{{ $item->notes }}</div>
                            @endif
                        </td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold {{ $item->status === 'completed' ? 'bg-emerald-50 text-emerald-700' : ($item->followup_date < date('Y-m-d') ? 'bg-red-50 text-red-700' : 'bg-amber-50 text-amber-700') }}">
                                {{ Str::headline($item->status) }}
                            </span>
                        </td>
                        <td class="py-4 px-6 text-right space-x-2">
                            @if($item->status !== 'completed')
                            <button type="button" @click="activeId = '{{ $item->id }}'; completeModal = true" class="px-3 py-1 bg-emerald-50 text-emerald-700 hover:bg-emerald-100 rounded-lg text-xs font-bold transition">
                                Mark Complete
                            </button>
                            @endif
                            @if($item->lead_id)
                            <a href="{{ route('user.leads.show', $item->lead_id) }}" class="px-3 py-1 bg-slate-100 text-slate-600 hover:bg-slate-200 rounded-lg text-xs font-bold transition">
                                Open Lead
                            </a>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="py-12 text-center text-slate-400">No follow-ups found in this section.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($followups->hasPages())
        <div class="p-4 border-t border-slate-100">
            {{ $followups->links() }}
        </div>
        @endif
    </div>

    <!-- Complete Modal -->
    <div x-show="completeModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 p-4" style="display: none;">
        <div class="bg-white rounded-2xl max-w-md w-full p-6 space-y-4 shadow-xl">
            <h3 class="text-base font-bold text-[#062B59]">Complete Follow-up Call</h3>
            <form :action="'/user/followups/' + activeId + '/complete'" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Call Outcome</label>
                    <input type="text" name="call_outcome" placeholder="Documents Received, Customer Interested" class="w-full px-3.5 py-2 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Discussion Remarks</label>
                    <textarea name="notes" rows="3" placeholder="Summary of discussion with borrower..." class="w-full px-3.5 py-2 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]"></textarea>
                </div>
                <div class="flex justify-end gap-3 pt-2">
                    <button type="button" @click="completeModal = false" class="px-4 py-2 text-xs font-bold text-slate-600 bg-slate-100 rounded-xl hover:bg-slate-200">Cancel</button>
                    <button type="submit" class="px-5 py-2 text-xs font-bold text-white bg-emerald-600 rounded-xl hover:bg-emerald-700">Submit Outcome</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
