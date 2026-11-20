@extends('admin.layouts.app')

@section('title', 'Manage Banks & NBFCs')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-extrabold text-[#062B59] font-heading">Banks & NBFC Partners CMS</h1>
            <p class="text-xs text-slate-500 mt-1">Manage all 23+ lending partners, interest rates, approval turnaround, and zero fee waiver highlights</p>
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 text-[11px] font-bold text-slate-500 uppercase tracking-wider">
                        <th class="py-3.5 px-6">Lender Name</th>
                        <th class="py-3.5 px-6">Type</th>
                        <th class="py-3.5 px-6">Min Interest</th>
                        <th class="py-3.5 px-6">Approval Speed</th>
                        <th class="py-3.5 px-6">Processing Fee Waiver</th>
                        <th class="py-3.5 px-6">Status</th>
                        <th class="py-3.5 px-6 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-xs">
                    @forelse($lenders as $lender)
                    <tr class="hover:bg-slate-50/70 transition">
                        <td class="py-4 px-6 font-bold text-[#062B59]">
                            {{ $lender->name }}
                        </td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold {{ $lender->type === 'Bank' ? 'bg-blue-50 text-blue-700' : 'bg-purple-50 text-purple-700' }}">
                                {{ $lender->type }}
                            </span>
                        </td>
                        <td class="py-4 px-6 font-semibold text-slate-700">
                            {{ $lender->min_interest ?: 'Competitive' }}
                        </td>
                        <td class="py-4 px-6 text-slate-600">
                            {{ $lender->approval_speed ?: '24 - 48 Hrs' }}
                        </td>
                        <td class="py-4 px-6 text-emerald-600 font-bold">
                            {{ $lender->processing_fee_waiver ?: 'Zero Fee Offers*' }}
                        </td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold {{ $lender->is_published ? 'bg-emerald-50 text-emerald-700' : 'bg-slate-100 text-slate-500' }}">
                                {{ $lender->is_published ? 'Active' : 'Hidden' }}
                            </span>
                        </td>
                        <td class="py-4 px-6 text-right">
                            <a href="{{ route('admin.cms.lenders.edit', $lender->id) }}" class="inline-flex items-center px-3 py-1 bg-blue-50 text-[#0866E8] hover:bg-blue-100 rounded-lg text-xs font-bold transition">
                                Edit Partner
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="py-12 text-center text-slate-400">No lenders found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
