@extends('admin.layouts.app')

@section('title', 'Create New Lead')
@section('header_title', 'Create Customer Lead')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <div class="flex items-center gap-2">
        <a href="{{ route('admin.leads.index') }}" class="p-2 rounded-xl bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        </a>
        <h2 class="text-xl sm:text-2xl font-extrabold text-[#062B59] font-heading">
            New Lead Registration
        </h2>
    </div>

    <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-xs">
        <form method="POST" action="{{ route('admin.leads.store') }}" class="space-y-5">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Full Name *</label>
                    <input type="text" name="full_name" value="{{ old('full_name') }}" required
                           class="w-full h-11 px-3.5 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm font-semibold text-[#102B50] focus:bg-white outline-none">
                    @error('full_name') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Mobile Number (10 Digits) *</label>
                    <input type="text" name="mobile" value="{{ old('mobile') }}" placeholder="9876543210" required
                           class="w-full h-11 px-3.5 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm font-semibold text-[#102B50] focus:bg-white outline-none">
                    @error('mobile') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Email Address</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                           class="w-full h-11 px-3.5 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm font-semibold text-[#102B50] focus:bg-white outline-none">
                    @error('email') <p class="text-xs text-red-600 mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Loan Category *</label>
                    <select name="loan_category" required class="w-full h-11 px-3.5 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm font-semibold text-[#102B50] focus:bg-white outline-none">
                        <option value="personal-loan">Personal Loan</option>
                        <option value="business-loan">Business Loan</option>
                        <option value="new-car-loan">New Car Loan</option>
                        <option value="used-car-loan">Used Car Loan</option>
                        <option value="doctor-loan">Doctor Loan</option>
                        <option value="ca-loan">CA Loan</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Required Loan Amount (₹)</label>
                    <input type="number" name="loan_amount" value="{{ old('loan_amount', '500000') }}" min="10000" step="10000"
                           class="w-full h-11 px-3.5 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm font-semibold text-[#102B50] focus:bg-white outline-none">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Monthly Income (₹)</label>
                    <input type="number" name="monthly_income" value="{{ old('monthly_income', '50000') }}" min="0" step="5000"
                           class="w-full h-11 px-3.5 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm font-semibold text-[#102B50] focus:bg-white outline-none">
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Employment Type</label>
                    <select name="employment_type" class="w-full h-11 px-3.5 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm font-semibold text-[#102B50] focus:bg-white outline-none">
                        <option value="salaried">Salaried Employee</option>
                        <option value="business_owner">Business Owner / Self-Employed</option>
                        <option value="doctor">Doctor</option>
                        <option value="chartered_accountant">Chartered Accountant</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">City &amp; PIN</label>
                    <div class="grid grid-cols-2 gap-2">
                        <input type="text" name="city" value="{{ old('city', 'Kolkata') }}" placeholder="City"
                               class="w-full h-11 px-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-[#102B50] focus:bg-white outline-none">
                        <input type="text" name="pincode" value="{{ old('pincode') }}" placeholder="PIN Code"
                               class="w-full h-11 px-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-[#102B50] focus:bg-white outline-none">
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Assign To Staff (Optional)</label>
                    <select name="assigned_to" class="w-full h-11 px-3.5 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm font-semibold text-[#102B50] focus:bg-white outline-none">
                        <option value="">-- Leave Unassigned for now --</option>
                        @foreach($users as $u)
                            <option value="{{ $u->id }}">{{ $u->name }} ({{ $u->designation ?: $u->role }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Internal Remarks / Notes</label>
                    <textarea name="internal_notes" rows="3" placeholder="Add customer requirements or notes..."
                              class="w-full p-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-medium text-[#102B50] focus:bg-white outline-none"></textarea>
                </div>
            </div>

            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
                <a href="{{ route('admin.leads.index') }}" class="px-5 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs transition-colors">
                    Cancel
                </a>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-gradient-to-r from-[#0866E8] to-[#1677FF] text-white font-extrabold text-xs uppercase tracking-wider shadow-md shadow-blue-500/20 active:scale-95 transition-all">
                    Register Lead
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
