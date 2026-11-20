@extends('admin.layouts.app')

@section('title', 'User Profile: ' . $user->name)
@section('header_title', 'Staff Member: ' . $user->name)

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-2">
            <a href="{{ route('admin.users.index') }}" class="p-2 rounded-xl bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            </a>
            <div>
                <h2 class="text-xl sm:text-2xl font-extrabold text-[#062B59] font-heading">{{ $user->name }}</h2>
                <p class="text-xs text-slate-400 mt-0.5">{{ $user->designation ?: 'Staff Member' }} • Employee ID: <strong class="text-slate-600">{{ $user->employee_id }}</strong></p>
            </div>
        </div>

        <div class="flex items-center gap-2">
            <a href="{{ route('admin.users.edit', $user) }}" class="px-4 py-2 rounded-xl bg-blue-50 hover:bg-blue-100 text-[#1677FF] font-extrabold text-xs transition-colors">
                Edit User
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
        <!-- Profile Details (Col 4) -->
        <div class="lg:col-span-4 space-y-6">
            <div class="bg-white rounded-3xl p-6 border border-slate-200/80 shadow-xs text-center">
                <div class="w-20 h-20 rounded-full bg-[#062B59] text-white flex items-center justify-center font-bold text-2xl mx-auto shadow-md">
                    {{ substr($user->name, 0, 2) }}
                </div>
                <h3 class="text-base font-extrabold text-[#062B59] mt-4 font-heading">{{ $user->name }}</h3>
                <span class="px-3 py-1 rounded-full text-xs font-extrabold bg-blue-50 text-[#1677FF] border border-blue-100 inline-block mt-1 capitalize">
                    {{ str_replace('_', ' ', $user->role) }}
                </span>

                <div class="mt-6 text-left space-y-3 text-xs border-t border-slate-100 pt-5">
                    <div>
                        <span class="text-slate-400 uppercase text-[10px] font-bold block">Email</span>
                        <span class="font-bold text-slate-800">{{ $user->email }}</span>
                    </div>
                    <div>
                        <span class="text-slate-400 uppercase text-[10px] font-bold block">Mobile</span>
                        <span class="font-bold text-slate-800">{{ $user->mobile ?: 'Not provided' }}</span>
                    </div>
                    <div>
                        <span class="text-slate-400 uppercase text-[10px] font-bold block">Department</span>
                        <span class="font-bold text-slate-800">{{ $user->department ?: 'Operations' }}</span>
                    </div>
                    <div>
                        <span class="text-slate-400 uppercase text-[10px] font-bold block">Joining Date</span>
                        <span class="font-bold text-slate-800">{{ $user->joining_date ? $user->joining_date->format('d M Y') : 'N/A' }}</span>
                    </div>
                    <div>
                        <span class="text-slate-400 uppercase text-[10px] font-bold block">Account Status</span>
                        <span class="font-bold {{ $user->account_status === 'active' ? 'text-emerald-600' : 'text-red-600' }} uppercase text-[11px]">{{ $user->account_status }}</span>
                    </div>
                </div>
            </div>

            <!-- Reset Password Card -->
            <div class="bg-white rounded-3xl p-6 border border-slate-200/80 shadow-xs">
                <h4 class="text-xs font-extrabold uppercase tracking-wider text-[#062B59] mb-3">Reset Password</h4>
                <form method="POST" action="{{ route('admin.users.reset-password', $user) }}" class="space-y-3">
                    @csrf
                    <input type="password" name="new_password" placeholder="New Password (min 8 chars)" required minlength="8"
                           class="w-full h-10 px-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-[#102B50] focus:bg-white outline-none">
                    <button type="submit" class="w-full h-10 bg-slate-800 hover:bg-black text-white font-extrabold text-xs uppercase tracking-wider rounded-xl transition-colors">
                        Save New Password
                    </button>
                </form>
            </div>
        </div>

        <!-- Assigned Leads Table (Col 8) -->
        <div class="lg:col-span-8 bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden">
            <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                <div>
                    <h3 class="text-sm font-extrabold text-[#062B59] uppercase tracking-wider">Assigned Customer Leads</h3>
                    <p class="text-xs text-slate-400 mt-0.5">Total assigned: {{ $user->assigned_leads_count }} • Converted: {{ $user->converted_leads_count }}</p>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead class="bg-slate-50 text-slate-500 font-extrabold uppercase text-[10px] border-b border-slate-100">
                        <tr>
                            <th class="p-3.5 pl-5">Lead</th>
                            <th class="p-3.5">Category</th>
                            <th class="p-3.5">Amount</th>
                            <th class="p-3.5">Status</th>
                            <th class="p-3.5 pr-5 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 font-medium">
                        @forelse($user->assignedLeads as $l)
                        <tr class="hover:bg-blue-50/40 transition-colors">
                            <td class="p-3.5 pl-5">
                                <div class="font-bold text-[#062B59]">{{ $l->full_name }}</div>
                                <div class="text-[11px] text-slate-400 font-normal">{{ $l->mobile }} • {{ $l->city }}</div>
                            </td>
                            <td class="p-3.5 font-semibold text-slate-700">
                                {{ $l->loan_category_label }}
                            </td>
                            <td class="p-3.5 font-bold text-[#102B50]">
                                ₹{{ number_format($l->loan_amount) }}
                            </td>
                            <td class="p-3.5">
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-extrabold border {{ $l->status_color }}">
                                    {{ $l->status_label }}
                                </span>
                            </td>
                            <td class="p-3.5 pr-5 text-right">
                                <a href="{{ route('admin.leads.show', $l) }}" class="px-2.5 py-1 rounded-lg bg-slate-100 hover:bg-[#1677FF] hover:text-white font-bold text-[11px] transition-colors">
                                    Manage
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="p-6 text-center text-slate-400">No leads assigned to this staff member yet.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
