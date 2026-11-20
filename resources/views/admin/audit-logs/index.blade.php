@extends('admin.layouts.app')

@section('title', 'System Audit Trail')
@section('header_title', 'Security Audit Trail & Activity Logs')

@section('content')
<div class="space-y-6">
    <div>
        <h2 class="text-xl sm:text-2xl font-extrabold text-[#062B59] font-heading tracking-tight">
            Security &amp; Operational Audit Trail
        </h2>
        <p class="text-xs text-slate-500 mt-0.5">
            Immutable log recording administrative actions, staff logins, lead allocations, and content modifications.
        </p>
    </div>

    <!-- Filters -->
    <div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-2xs">
        <form method="GET" action="{{ route('admin.audit-logs.index') }}" class="grid grid-cols-1 sm:grid-cols-4 gap-3">
            <div>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search action..."
                       class="w-full h-10 px-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-[#102B50] focus:bg-white outline-none">
            </div>
            <div>
                <select name="module" class="w-full h-10 px-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-[#102B50] focus:bg-white outline-none">
                    <option value="">All Modules</option>
                    <option value="auth" {{ request('module') === 'auth' ? 'selected' : '' }}>Authentication</option>
                    <option value="leads" {{ request('module') === 'leads' ? 'selected' : '' }}>Leads &amp; Allocation</option>
                    <option value="users" {{ request('module') === 'users' ? 'selected' : '' }}>User Management</option>
                    <option value="cms" {{ request('module') === 'cms' ? 'selected' : '' }}>Website CMS</option>
                    <option value="system" {{ request('module') === 'system' ? 'selected' : '' }}>System</option>
                </select>
            </div>
            <div>
                <select name="user_id" class="w-full h-10 px-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-[#102B50] focus:bg-white outline-none">
                    <option value="">All Actors</option>
                    @foreach($users as $u)
                        <option value="{{ $u->id }}" {{ request('user_id') == $u->id ? 'selected' : '' }}>{{ $u->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex items-center gap-2">
                <button type="submit" class="flex-1 h-10 bg-[#1677FF] hover:bg-[#0866E8] text-white font-bold text-xs rounded-xl shadow-xs transition-colors">
                    Filter Logs
                </button>
                <a href="{{ route('admin.audit-logs.index') }}" class="px-3 h-10 bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold text-xs rounded-xl flex items-center justify-center transition-colors">
                    Reset
                </a>
            </div>
        </form>
    </div>

    <!-- Logs Table -->
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-50 text-slate-500 font-extrabold uppercase text-[10px] border-b border-slate-200/80">
                    <tr>
                        <th class="p-3.5 pl-5">Timestamp</th>
                        <th class="p-3.5">Actor</th>
                        <th class="p-3.5">Action</th>
                        <th class="p-3.5">Module</th>
                        <th class="p-3.5">IP Address</th>
                        <th class="p-3.5 pr-5">Change Details</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 font-medium">
                    @forelse($logs as $log)
                    <tr class="hover:bg-blue-50/40 transition-colors">
                        <td class="p-3.5 pl-5 font-mono text-slate-500 text-[11px] whitespace-nowrap">
                            {{ $log->created_at->format('Y-m-d H:i:s') }}
                        </td>
                        <td class="p-3.5">
                            @if($log->user)
                                <span class="font-bold text-[#062B59]">{{ $log->user->name }}</span>
                                <span class="text-[10px] text-slate-400 block">{{ $log->user->role }}</span>
                            @else
                                <span class="text-slate-400">System / Guest</span>
                            @endif
                        </td>
                        <td class="p-3.5 font-bold text-[#1677FF] font-mono text-[11px]">
                            {{ $log->action }}
                        </td>
                        <td class="p-3.5">
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-slate-100 text-slate-700 capitalize">
                                {{ $log->module }}
                            </span>
                        </td>
                        <td class="p-3.5 font-mono text-slate-400 text-[11px]">
                            {{ $log->ip_address ?: '127.0.0.1' }}
                        </td>
                        <td class="p-3.5 pr-5 text-slate-600 max-w-sm truncate text-[11px]">
                            @if($log->details)
                                <code class="text-[10px] bg-slate-50 p-1 rounded text-slate-700">{{ json_encode($log->details) }}</code>
                            @else
                                <span class="text-slate-400">No additional payload</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="p-8 text-center text-slate-400">No audit logs recorded matching your search.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($logs->hasPages())
        <div class="p-4 border-t border-slate-100 bg-slate-50">
            {{ $logs->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
