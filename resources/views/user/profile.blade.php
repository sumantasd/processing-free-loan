@extends('user.layouts.app')

@section('title', 'My Profile & Security')

@section('content')
<div class="space-y-6 max-w-4xl">
    <div>
        <h1 class="text-2xl font-extrabold text-[#062B59] font-heading">My Profile & Security</h1>
        <p class="text-xs text-slate-500 mt-1">Manage personal contact information, view your role assignments, and update your security credentials</p>
    </div>

    <!-- Official Profile Details -->
    <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-xs">
        <h2 class="text-sm font-bold text-[#062B59] uppercase tracking-wider mb-4 pb-2 border-b border-slate-100 flex items-center gap-2">
            <svg class="w-4 h-4 text-[#0866E8]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
            Personal & Official Information
        </h2>

        <form action="{{ route('user.profile.update') }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Full Name</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" required class="w-full px-3.5 py-2.5 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Contact Mobile</label>
                    <input type="text" name="mobile" value="{{ old('mobile', $user->mobile) }}" class="w-full px-3.5 py-2.5 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 pt-2">
                <div>
                    <label class="block text-[11px] font-bold text-slate-400 uppercase">Work Email</label>
                    <div class="text-xs font-semibold text-slate-700 mt-1">{{ $user->email }}</div>
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-slate-400 uppercase">Employee ID</label>
                    <div class="text-xs font-mono font-bold text-[#0866E8] mt-1">{{ $user->employee_id ?: 'EMP-00' . $user->id }}</div>
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-slate-400 uppercase">Department & Role</label>
                    <div class="text-xs font-semibold text-slate-700 mt-1">{{ $user->department ?: 'Operations' }} &bull; {{ $user->roles->pluck('name')->first() ?? 'Staff' }}</div>
                </div>
            </div>

            <div class="flex justify-end pt-2">
                <button type="submit" class="px-5 py-2 bg-[#062B59] hover:bg-[#031B3B] text-white text-xs font-bold rounded-xl transition shadow-xs">
                    Save Profile Changes
                </button>
            </div>
        </form>
    </div>

    <!-- Password Change Card -->
    <div class="bg-white rounded-2xl border border-slate-200/80 p-6 shadow-xs">
        <h2 class="text-sm font-bold text-[#062B59] uppercase tracking-wider mb-4 pb-2 border-b border-slate-100 flex items-center gap-2">
            <svg class="w-4 h-4 text-[#12C878]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
            Change Account Password
        </h2>

        <form action="{{ route('user.profile.password') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">Current Password</label>
                <input type="password" name="current_password" required class="w-full sm:w-80 px-3.5 py-2.5 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">New Password (min 8 characters)</label>
                    <input type="password" name="password" required class="w-full px-3.5 py-2.5 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Confirm New Password</label>
                    <input type="password" name="password_confirmation" required class="w-full px-3.5 py-2.5 text-xs border border-slate-300 rounded-xl focus:ring-2 focus:ring-[#0866E8]">
                </div>
            </div>

            <div class="flex justify-end pt-2">
                <button type="submit" class="px-5 py-2 bg-[#062B59] hover:bg-[#031B3B] text-white text-xs font-bold rounded-xl transition shadow-xs">
                    Update Password
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
