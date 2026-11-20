@extends('admin.layouts.app')

@section('title', 'Edit User: ' . $user->name)
@section('header_title', 'Edit Staff Member')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    <div class="flex items-center gap-2">
        <a href="{{ route('admin.users.show', $user) }}" class="p-2 rounded-xl bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        </a>
        <h2 class="text-xl sm:text-2xl font-extrabold text-[#062B59] font-heading">
            Edit User: {{ $user->name }}
        </h2>
    </div>

    <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-xs">
        <form method="POST" action="{{ route('admin.users.update', $user) }}" class="space-y-4">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Full Name *</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                           class="w-full h-11 px-3.5 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm font-semibold text-[#102B50] focus:bg-white outline-none">
                    @error('name') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Email Address *</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                           class="w-full h-11 px-3.5 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm font-semibold text-[#102B50] focus:bg-white outline-none">
                    @error('email') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Mobile Number</label>
                    <input type="text" name="mobile" value="{{ old('mobile', $user->mobile) }}"
                           class="w-full h-11 px-3.5 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm font-semibold text-[#102B50] focus:bg-white outline-none">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Employee ID</label>
                    <input type="text" name="employee_id" value="{{ old('employee_id', $user->employee_id) }}"
                           class="w-full h-11 px-3.5 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm font-semibold text-[#102B50] focus:bg-white outline-none">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Role *</label>
                    <select name="role" required class="w-full h-11 px-3.5 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm font-semibold text-[#102B50] focus:bg-white outline-none">
                        @foreach($roles as $r)
                            <option value="{{ $r->name }}" {{ $user->role === $r->name ? 'selected' : '' }}>{{ $r->label }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Account Status *</label>
                    <select name="account_status" required class="w-full h-11 px-3.5 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm font-semibold text-[#102B50] focus:bg-white outline-none">
                        <option value="active" {{ $user->account_status === 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ $user->account_status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                        <option value="suspended" {{ $user->account_status === 'suspended' ? 'selected' : '' }}>Suspended</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Designation</label>
                    <input type="text" name="designation" value="{{ old('designation', $user->designation) }}"
                           class="w-full h-11 px-3.5 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm font-semibold text-[#102B50] focus:bg-white outline-none">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Department</label>
                    <input type="text" name="department" value="{{ old('department', $user->department) }}"
                           class="w-full h-11 px-3.5 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm font-semibold text-[#102B50] focus:bg-white outline-none">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Joining Date</label>
                    <input type="date" name="joining_date" value="{{ old('joining_date', $user->joining_date ? $user->joining_date->format('Y-m-d') : '') }}"
                           class="w-full h-11 px-3.5 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm font-semibold text-[#102B50] focus:bg-white outline-none">
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">New Password (leave blank to keep unchanged)</label>
                    <input type="password" name="password" minlength="8"
                           class="w-full h-11 px-3.5 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm font-semibold text-[#102B50] focus:bg-white outline-none">
                </div>
            </div>

            <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                <button type="button" 
                        onclick="if(confirm('Are you sure you want to delete/archive this user? Historical lead allocations will be safely preserved.')) { document.getElementById('delete-user-form').submit(); }"
                        class="px-4 py-2.5 rounded-xl bg-red-50 hover:bg-red-100 text-red-600 font-bold text-xs transition-colors">
                    Delete User
                </button>
                <div class="flex items-center gap-3">
                    <a href="{{ route('admin.users.index') }}" class="px-5 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs transition-colors">
                        Cancel
                    </a>
                    <button type="submit" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-[#0866E8] to-[#1677FF] text-white font-extrabold text-xs uppercase tracking-wider shadow-md shadow-blue-500/20 active:scale-95 transition-all">
                        Update User
                    </button>
                </div>
            </div>
        </form>

        <form id="delete-user-form" method="POST" action="{{ route('admin.users.destroy', $user) }}" class="hidden">
            @csrf
            @method('DELETE')
        </form>
    </div>
</div>
@endsection
