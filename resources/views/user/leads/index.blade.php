@extends('user.layouts.app')

@section('title', 'My Assigned Leads')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-[#062B59] font-heading">My Assigned Leads</h1>
            <p class="text-xs text-slate-500 mt-1">Review applicant profiles, initiate calls, schedule follow-ups, and update stage status</p>
        </div>
    </div>

    <!-- Filters Bar -->
    <div class="bg-white rounded-2xl border border-slate-200/80 p-4 shadow-xs">
        <form method="GET" action="{{ route('user.leads.index') }}" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-3">
            <div>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name, mobile, ref code..." class="w-full px-3.5 py-2 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
            </div>

            <div>
                <select name="status" class="w-full px-3.5 py-2 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
                    <option value="">All Pipeline Statuses</option>
                    @foreach($statuses as $key => $label)
                    <option value="{{ $key }}" {{ request('status') === $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <select name="loan_category" class="w-full px-3.5 py-2 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
                    <option value="">All Loan Types</option>
                    <option value="personal_loan" {{ request('loan_category') === 'personal_loan' ? 'selected' : '' }}>Personal Loan</option>
                    <option value="business_loan" {{ request('loan_category') === 'business_loan' ? 'selected' : '' }}>Business Loan</option>
                    <option value="home_loan" {{ request('loan_category') === 'home_loan' ? 'selected' : '' }}>Home Loan</option>
                    <option value="car_loan" {{ request('loan_category') === 'car_loan' ? 'selected' : '' }}>Car Loan</option>
                    <option value="loan_against_property" {{ request('loan_category') === 'loan_against_property' ? 'selected' : '' }}>Loan Against Property</option>
                </select>
            </div>

            <div class="flex gap-2">
                <button type="submit" class="flex-1 px-4 py-2 bg-[#062B59] hover:bg-[#031B3B] text-white text-xs font-bold rounded-xl transition">
                    Filter Leads
                </button>
                <a href="{{ route('user.leads.index') }}" class="px-3 py-2 bg-slate-100 hover:bg-slate-200 text-slate-600 text-xs font-bold rounded-xl transition">
                    Reset
                </a>
            </div>
        </form>
    </div>

    <!-- Leads Table -->
    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 text-[11px] font-bold text-slate-500 uppercase tracking-wider">
                        <th class="py-3.5 px-6">Reference ID</th>
                        <th class="py-3.5 px-6">Customer Name & City</th>
                        <th class="py-3.5 px-6">Mobile Contact</th>
                        <th class="py-3.5 px-6">Loan Type & Amount</th>
                        <th class="py-3.5 px-6">Pipeline Status</th>
                        <th class="py-3.5 px-6">Next Follow-up</th>
                        <th class="py-3.5 px-6 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-xs">
                    @forelse($leads as $lead)
                    <tr class="hover:bg-slate-50/70 transition">
                        <td class="py-4 px-6 font-mono font-bold text-[#0866E8]">
                            {{ $lead->reference_code ?: '#L-' . $lead->id }}
                        </td>
                        <td class="py-4 px-6">
                            <div class="font-bold text-[#062B59]">{{ $lead->full_name }}</div>
                            <div class="text-[11px] text-slate-400">{{ $lead->city ?: 'India' }} &bull; {{ $lead->employment_type_label }}</div>
                        </td>
                        <td class="py-4 px-6">
                            <a href="tel:{{ $lead->mobile }}" class="inline-flex items-center gap-1.5 font-bold text-[#0866E8] hover:underline">
                                <svg class="w-3.5 h-3.5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                {{ $lead->mobile }}
                            </a>
                        </td>
                        <td class="py-4 px-6">
                            <div class="font-semibold text-slate-700">{{ $lead->loan_type_label }}</div>
                            <div class="font-bold text-[#062B59] text-[11px]">{{ $lead->formatted_amount }}</div>
                        </td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold {{ $lead->status_badge_class }}">
                                {{ $lead->status_label }}
                            </span>
                        </td>
                        <td class="py-4 px-6 text-slate-500">
                            @if($lead->next_followup_at)
                            <div class="font-semibold text-[#062B59]">{{ $lead->next_followup_at->format('d M Y, h:i A') }}</div>
                            <div class="text-[10px] {{ $lead->next_followup_at->isPast() ? 'text-red-500 font-bold' : 'text-slate-400' }}">{{ $lead->next_followup_at->diffForHumans() }}</div>
                            @else
                            <span class="text-slate-400 italic">Not set</span>
                            @endif
                        </td>
                        <td class="py-4 px-6 text-right">
                            <a href="{{ route('user.leads.show', $lead->id) }}" class="inline-flex items-center px-3.5 py-1.5 bg-[#062B59] hover:bg-[#031B3B] text-white rounded-lg text-xs font-bold transition">
                                Manage &rarr;
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="py-12 text-center text-slate-400">No leads matching the criteria.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($leads->hasPages())
        <div class="p-4 border-t border-slate-100">
            {{ $leads->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
