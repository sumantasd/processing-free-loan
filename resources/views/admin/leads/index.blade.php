@extends('admin.layouts.app')

@section('title', 'Lead Management & Allocation')
@section('header_title', 'All Enquiries & Lead Allocation')

@section('content')
<div class="space-y-6" x-data="{
    selectedLeads: [],
    allocateModalOpen: false,
    bulkMode: false,
    targetLeadId: null,
    targetLeadName: '',
    
    openSingleAllocate(id, name) {
        this.bulkMode = false;
        this.targetLeadId = id;
        this.targetLeadName = name;
        this.selectedLeads = [id];
        this.allocateModalOpen = true;
    },
    openBulkAllocate() {
        if (this.selectedLeads.length === 0) {
            alert('Please select at least one lead from the table to allocate.');
            return;
        }
        this.bulkMode = true;
        this.allocateModalOpen = true;
    },
    toggleSelectAll(e) {
        if (e.target.checked) {
            this.selectedLeads = Array.from(document.querySelectorAll('.lead-checkbox')).map(cb => parseInt(cb.value));
        } else {
            this.selectedLeads = [];
        }
    }
}">

    <!-- Top Action Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-xl sm:text-2xl font-extrabold text-[#062B59] font-heading tracking-tight">
                Customer Loan Enquiries
            </h2>
            <p class="text-xs text-slate-500 mt-0.5">
                Manage, filter and allocate leads to your internal sales &amp; verification team.
            </p>
        </div>
        <div class="flex items-center gap-2">
            <!-- Bulk Allocate Button -->
            <button type="button" @click="openBulkAllocate()"
                    class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl bg-[#062B59] hover:bg-[#031B3B] text-white font-extrabold text-xs shadow-md active:scale-95 transition-all">
                <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                <span>Allocate Selected (<span x-text="selectedLeads.length">0</span>)</span>
            </button>
            <a href="{{ route('admin.leads.create') }}" 
               class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl bg-gradient-to-r from-[#0866E8] to-[#1677FF] text-white font-extrabold text-xs shadow-md shadow-blue-500/20 active:scale-95 transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                <span>Add Lead</span>
            </a>
            <a href="{{ route('admin.leads.export') }}" class="p-2.5 rounded-xl bg-white border border-slate-200 text-slate-600 hover:bg-slate-50" title="Export CSV">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
            </a>
        </div>
    </div>

    <!-- Filters Bar -->
    <div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-2xs">
        <form method="GET" action="{{ route('admin.leads.index') }}" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-3">
            <div>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search name, phone, city, code..."
                       class="w-full h-10 px-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-[#102B50] focus:bg-white outline-none">
            </div>
            <div>
                <select name="status" class="w-full h-10 px-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-[#102B50] focus:bg-white outline-none">
                    <option value="">All Statuses</option>
                    @foreach($statuses as $key => $label)
                        <option value="{{ $key }}" {{ request('status') === $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <select name="loan_category" class="w-full h-10 px-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-[#102B50] focus:bg-white outline-none">
                    <option value="">All Loan Categories</option>
                    <option value="personal-loan" {{ request('loan_category') === 'personal-loan' ? 'selected' : '' }}>Salaried Personal Loan</option>
                    <option value="business-loan" {{ request('loan_category') === 'business-loan' ? 'selected' : '' }}>Business Loan</option>
                    <option value="new-car-loan" {{ request('loan_category') === 'new-car-loan' ? 'selected' : '' }}>New Car Loan</option>
                    <option value="used-car-loan" {{ request('loan_category') === 'used-car-loan' ? 'selected' : '' }}>Used Car Loan</option>
                    <option value="doctor-loan" {{ request('loan_category') === 'doctor-loan' ? 'selected' : '' }}>Doctor Loan</option>
                    <option value="ca-loan" {{ request('loan_category') === 'ca-loan' ? 'selected' : '' }}>CA Loan</option>
                </select>
            </div>
            <div>
                <select name="assigned_to" class="w-full h-10 px-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-[#102B50] focus:bg-white outline-none">
                    <option value="">All Assignees</option>
                    <option value="unassigned" {{ request('assigned_to') === 'unassigned' ? 'selected' : '' }}>Unassigned Only</option>
                    @foreach($users as $u)
                        <option value="{{ $u->id }}" {{ request('assigned_to') == $u->id ? 'selected' : '' }}>{{ $u->name }} ({{ $u->designation ?: 'Staff' }})</option>
                    @endforeach
                </select>
            </div>
            <div class="flex items-center gap-2">
                <button type="submit" class="flex-1 h-10 bg-[#1677FF] hover:bg-[#0866E8] text-white font-bold text-xs rounded-xl shadow-xs transition-colors">
                    Filter
                </button>
                <a href="{{ route('admin.leads.index') }}" class="px-3 h-10 bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold text-xs rounded-xl flex items-center justify-center transition-colors">
                    Reset
                </a>
            </div>
        </form>
    </div>

    <!-- Leads Table Card -->
    <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-50 text-slate-500 font-extrabold uppercase text-[10px] border-b border-slate-200/80">
                    <tr>
                        <th class="p-3.5 pl-5 w-10">
                            <input type="checkbox" @change="toggleSelectAll($event)" class="w-4 h-4 rounded text-[#1677FF] border-slate-300">
                        </th>
                        <th class="p-3.5">Ref Code</th>
                        <th class="p-3.5">Customer Name</th>
                        <th class="p-3.5">Phone &amp; Location</th>
                        <th class="p-3.5">Loan Category</th>
                        <th class="p-3.5">Amount &amp; Income</th>
                        <th class="p-3.5">Status</th>
                        <th class="p-3.5">Assigned To</th>
                        <th class="p-3.5 pr-5 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 font-medium">
                    @forelse($leads as $lead)
                    <tr class="hover:bg-blue-50/40 transition-colors">
                        <td class="p-3.5 pl-5">
                            <input type="checkbox" value="{{ $lead->id }}" 
                                   x-model="selectedLeads"
                                   class="lead-checkbox w-4 h-4 rounded text-[#1677FF] border-slate-300">
                        </td>
                        <td class="p-3.5 font-bold text-[#1677FF]">
                            <a href="{{ route('admin.leads.show', $lead) }}" class="hover:underline">
                                {{ $lead->reference_code }}
                            </a>
                        </td>
                        <td class="p-3.5 font-bold text-[#062B59]">
                            {{ $lead->full_name }}
                            @if($lead->created_at->isToday())
                                <span class="ml-1 px-1.5 py-0.2 rounded text-[9px] bg-emerald-100 text-emerald-800 font-extrabold">NEW</span>
                            @endif
                        </td>
                        <td class="p-3.5">
                            <a href="tel:{{ $lead->mobile }}" class="font-bold text-slate-700 hover:text-[#1677FF]">{{ $lead->mobile }}</a>
                            <div class="text-[11px] text-slate-400 font-normal">{{ $lead->city ?: 'India' }}</div>
                        </td>
                        <td class="p-3.5">
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-slate-100 text-slate-700">
                                {{ $lead->loan_category_label }}
                            </span>
                        </td>
                        <td class="p-3.5">
                            <div class="font-extrabold text-[#062B59]">₹{{ number_format($lead->loan_amount) }}</div>
                            <div class="text-[10px] text-slate-400 font-normal">Income: ₹{{ number_format($lead->monthly_income) }}/mo</div>
                        </td>
                        <td class="p-3.5">
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-extrabold border {{ $lead->status_color }}">
                                {{ $lead->status_label }}
                            </span>
                        </td>
                        <td class="p-3.5">
                            @if($lead->assignedTo)
                                <div class="font-bold text-slate-800">{{ $lead->assignedTo->name }}</div>
                                <div class="text-[10px] text-slate-400 font-normal">{{ $lead->assigned_at ? $lead->assigned_at->diffForHumans() : '' }}</div>
                            @else
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-50 text-amber-700 border border-amber-200">
                                    Unallocated
                                </span>
                            @endif
                        </td>
                        <td class="p-3.5 pr-5 text-right space-x-1">
                            <button type="button" 
                                    @click="openSingleAllocate({{ $lead->id }}, '{{ addslashes($lead->full_name) }}')"
                                    class="px-2.5 py-1 rounded-lg bg-indigo-50 hover:bg-indigo-100 text-indigo-700 font-bold text-[11px] transition-colors"
                                    title="Allocate or reassign lead">
                                Allocate
                            </button>
                            <a href="{{ route('admin.leads.show', $lead) }}" 
                               class="px-2.5 py-1 rounded-lg bg-[#1677FF] hover:bg-[#0866E8] text-white font-bold text-[11px] transition-colors">
                                View
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="p-8 text-center text-slate-400">
                            No loan enquiries found matching your filter criteria.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($leads->hasPages())
        <div class="p-4 border-t border-slate-100 bg-slate-50">
            {{ $leads->links() }}
        </div>
        @endif
    </div>

    <!-- ========================================== -->
    <!-- 2. ALLOCATE LEAD MODAL (SINGLE & BULK) -->
    <!-- ========================================== -->
    <div x-show="allocateModalOpen" 
         class="fixed inset-0 z-50 overflow-y-auto"
         style="display: none;">
        
        <div class="min-h-screen px-4 text-center flex items-center justify-center">
            <div @click="allocateModalOpen = false" class="fixed inset-0 bg-black/50 backdrop-blur-xs transition-opacity"></div>

            <div class="inline-block w-full max-w-md p-6 my-8 text-left bg-white rounded-3xl shadow-2xl transform transition-all relative z-10 border border-slate-100">
                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                    <h3 class="text-base font-extrabold text-[#062B59] font-heading">
                        <span x-show="!bulkMode">Allocate Lead: <span x-text="targetLeadName"></span></span>
                        <span x-show="bulkMode">Bulk Allocate <span x-text="selectedLeads.length"></span> Leads</span>
                    </h3>
                    <button type="button" @click="allocateModalOpen = false" class="text-slate-400 hover:text-slate-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>

                <form method="POST" action="{{ route('admin.leads.allocate') }}" class="space-y-4 mt-4">
                    @csrf
                    
                    <!-- Hidden lead IDs -->
                    <template x-for="id in selectedLeads" :key="id">
                        <input type="hidden" name="lead_ids[]" :value="id">
                    </template>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">
                            Select Employee / Lead Executive *
                        </label>
                        <select name="user_id" required class="w-full h-11 px-3.5 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm font-semibold text-[#102B50] focus:bg-white focus:border-[#1677FF] outline-none">
                            <option value="">-- Choose User --</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">
                                    {{ $user->name }} • {{ $user->designation ?: $user->role }} ({{ $user->department ?: 'General' }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">
                            Allocation Remarks / Instructions (Optional)
                        </label>
                        <textarea name="remarks" rows="3" placeholder="Add priority note, special customer preference, bank preference..."
                                  class="w-full p-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-medium text-[#102B50] focus:bg-white focus:border-[#1677FF] outline-none"></textarea>
                    </div>

                    <div class="flex items-center justify-end gap-2.5 pt-2">
                        <button type="button" @click="allocateModalOpen = false" class="px-4 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs transition-colors">
                            Cancel
                        </button>
                        <button type="submit" class="px-5 py-2.5 rounded-xl bg-gradient-to-r from-[#0866E8] to-[#1677FF] text-white font-extrabold text-xs shadow-md shadow-blue-500/20 active:scale-95 transition-all">
                            Confirm Allocation
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>

</div>
@endsection
