@extends('admin.layouts.app')

@section('title', 'User & Employee Management')
@section('header_title', 'Internal Staff & Role Allocation')

@section('content')
<div class="space-y-6">
    
    <!-- Top Action Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-xl sm:text-2xl font-extrabold text-[#062B59] font-heading tracking-tight">
                Staff &amp; Role-Based Access Control
            </h2>
            <p class="text-xs text-slate-500 mt-0.5">
                Manage employees, roles, departmental assignments and lead permissions.
            </p>
        </div>
        <div>
            <a href="{{ route('admin.users.create') }}" 
               class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl bg-gradient-to-r from-[#0866E8] to-[#1677FF] text-white font-extrabold text-xs shadow-md shadow-blue-500/20 active:scale-95 transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                <span>Create New User</span>
            </a>
        </div>
    </div>

    <!-- Filters Bar -->
    <div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-2xs">
        <form method="GET" action="{{ route('admin.users.index') }}" class="grid grid-cols-1 sm:grid-cols-3 gap-3">
            <div>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search name, email, employee ID..."
                       class="w-full h-10 px-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-[#102B50] focus:bg-white outline-none">
            </div>
            <div>
                <select name="role" class="w-full h-10 px-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-[#102B50] focus:bg-white outline-none">
                    <option value="">All Roles</option>
                    @foreach($roles as $r)
                        <option value="{{ $r->name }}" {{ request('role') === $r->name ? 'selected' : '' }}>{{ $r->label }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex items-center gap-2">
                <button type="submit" class="flex-1 h-10 bg-[#1677FF] hover:bg-[#0866E8] text-white font-bold text-xs rounded-xl shadow-xs transition-colors">
                    Filter
                </button>
                <a href="{{ route('admin.users.index') }}" class="px-3 h-10 bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold text-xs rounded-xl flex items-center justify-center transition-colors">
                    Reset
                </a>
            </div>
        </form>
    </div>

    <!-- Users Table -->
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-50 text-slate-500 font-extrabold uppercase text-[10px] border-b border-slate-200/80">
                    <tr>
                        <th class="p-3.5 pl-5">Staff Member</th>
                        <th class="p-3.5">Employee ID</th>
                        <th class="p-3.5">Role</th>
                        <th class="p-3.5">Department</th>
                        <th class="p-3.5">Assigned Leads</th>
                        <th class="p-3.5">Status</th>
                        <th class="p-3.5 pr-5 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 font-medium">
                    @forelse($users as $user)
                    <tr class="hover:bg-blue-50/40 transition-colors">
                        <td class="p-3.5 pl-5">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-full bg-[#062B59] text-white flex items-center justify-center font-bold text-xs">
                                    {{ substr($user->name, 0, 2) }}
                                </div>
                                <div>
                                    <div class="font-bold text-[#062B59]">{{ $user->name }}</div>
                                    <div class="text-[11px] text-slate-400 font-normal">{{ $user->email }} • {{ $user->mobile ?: 'No phone' }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="p-3.5 font-mono font-bold text-slate-600">
                            {{ $user->employee_id ?: 'EMP-GEN' }}
                        </td>
                        <td class="p-3.5">
                            <span class="px-2.5 py-0.5 rounded-full text-[10px] font-extrabold bg-blue-50 text-[#1677FF] border border-blue-100 capitalize">
                                {{ str_replace('_', ' ', $user->role) }}
                            </span>
                        </td>
                        <td class="p-3.5 text-slate-600">
                            {{ $user->department ?: 'Operations' }}
                        </td>
                        <td class="p-3.5">
                            <span class="font-extrabold text-[#062B59]">{{ $user->assigned_leads_count }}</span>
                            <span class="text-slate-400 text-[10px] block">leads active</span>
                        </td>
                        <td class="p-3.5">
                            @if($user->account_status === 'active')
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-extrabold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                    Active
                                </span>
                            @else
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-extrabold bg-red-50 text-red-700 border border-red-200">
                                    {{ ucfirst($user->account_status) }}
                                </span>
                            @endif
                        </td>
                        <td class="p-3.5 pr-5 text-right space-x-1">
                            <a href="{{ route('admin.users.show', $user) }}" class="px-2.5 py-1 rounded-lg bg-slate-100 hover:bg-slate-200 font-bold text-[11px] text-slate-700 transition-colors">
                                View
                            </a>
                            <a href="{{ route('admin.users.edit', $user) }}" class="px-2.5 py-1 rounded-lg bg-blue-50 hover:bg-blue-100 font-bold text-[11px] text-[#1677FF] transition-colors">
                                Edit
                            </a>
                            <form method="POST" action="{{ route('admin.users.toggle-status', $user) }}" class="inline-block">
                                @csrf
                                <button type="submit" class="px-2.5 py-1 rounded-lg {{ $user->account_status === 'active' ? 'bg-amber-50 text-amber-700 hover:bg-amber-100' : 'bg-emerald-50 text-emerald-700 hover:bg-emerald-100' }} font-bold text-[11px] transition-colors">
                                    {{ $user->account_status === 'active' ? 'Deactivate' : 'Activate' }}
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="p-8 text-center text-slate-400">No staff members found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($users->hasPages())
        <div class="p-4 border-t border-slate-100 bg-slate-50">
            {{ $users->links() }}
        </div>
        @endif
    </div>

</div>
@endsection
