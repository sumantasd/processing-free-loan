@extends('admin.layouts.app')

@section('title', 'Admin Dashboard')
@section('header_title', 'Real-Time Lead & CMS Dashboard')

@section('content')
<div class="space-y-8">
    
    <!-- Top Action Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-xl sm:text-2xl font-extrabold text-[#062B59] font-heading tracking-tight">
                Fintech Platform Performance
            </h2>
            <p class="text-xs text-slate-500 mt-1">
                All statistics calculated dynamically from MySQL database records.
            </p>
        </div>
        <div class="flex items-center gap-2.5">
            <a href="{{ route('admin.leads.create') }}" 
               class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl bg-gradient-to-r from-[#0866E8] to-[#1677FF] hover:from-[#062B59] hover:to-[#0866E8] text-white font-extrabold text-xs shadow-md shadow-blue-500/20 active:scale-95 transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                <span>Add New Lead</span>
            </a>
            <a href="{{ route('admin.leads.export') }}" 
               class="inline-flex items-center gap-1.5 px-3.5 py-2.5 rounded-xl bg-white border border-slate-200 text-[#062B59] hover:bg-slate-50 font-extrabold text-xs shadow-2xs active:scale-95 transition-all">
                <svg class="w-4 h-4 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                <span>Export CSV</span>
            </a>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- 1. STATS METRICS GRID -->
    <!-- ========================================== -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 sm:gap-5">
        
        <!-- Total Leads -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-[11px] font-extrabold uppercase tracking-wider text-slate-400 block mb-1">Total Leads</span>
                <span class="text-2xl sm:text-3xl font-extrabold text-[#062B59] font-heading">{{ number_format($totalLeads) }}</span>
                <span class="text-[10px] font-bold text-emerald-600 block mt-1">+{{ $leadsToday }} created today</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-blue-50 text-[#1677FF] flex items-center justify-center flex-shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
            </div>
        </div>

        <!-- New / Unallocated -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-[11px] font-extrabold uppercase tracking-wider text-slate-400 block mb-1">New / Unallocated</span>
                <span class="text-2xl sm:text-3xl font-extrabold text-amber-600 font-heading">{{ number_format($newLeads) }}</span>
                <a href="{{ route('admin.leads.index', ['assigned_to' => 'unassigned']) }}" class="text-[10px] font-bold text-[#1677FF] hover:underline block mt-1">Assign now &rarr;</a>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center flex-shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
            </div>
        </div>

        <!-- Allocated / In Progress -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-[11px] font-extrabold uppercase tracking-wider text-slate-400 block mb-1">Allocated Leads</span>
                <span class="text-2xl sm:text-3xl font-extrabold text-indigo-600 font-heading">{{ number_format($allocatedLeads) }}</span>
                <span class="text-[10px] font-bold text-slate-500 block mt-1">{{ $allocationsToday }} assigned today</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center flex-shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/></svg>
            </div>
        </div>

        <!-- Converted Loans -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
            <div>
                <span class="text-[11px] font-extrabold uppercase tracking-wider text-slate-400 block mb-1">Converted Leads</span>
                <span class="text-2xl sm:text-3xl font-extrabold text-emerald-600 font-heading">{{ number_format($convertedLeads) }}</span>
                <span class="text-[10px] font-bold text-emerald-600 block mt-1">Disbursed with Zero Fee</span>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center flex-shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
        </div>

    </div>

    <!-- Secondary Metric Bar -->
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 bg-white p-4 rounded-2xl border border-slate-200/80 shadow-2xs">
        <div class="text-center p-2 border-r border-slate-100 last:border-0">
            <span class="text-[10px] font-extrabold text-slate-400 uppercase">Contacted</span>
            <div class="text-lg font-extrabold text-slate-700 mt-0.5">{{ $contactedLeads }}</div>
        </div>
        <div class="text-center p-2 border-r border-slate-100 last:border-0">
            <span class="text-[10px] font-extrabold text-slate-400 uppercase">Follow-up Required</span>
            <div class="text-lg font-extrabold text-orange-600 mt-0.5">{{ $followupRequired }}</div>
        </div>
        <div class="text-center p-2 border-r border-slate-100 last:border-0">
            <span class="text-[10px] font-extrabold text-slate-400 uppercase">Active Staff</span>
            <div class="text-lg font-extrabold text-[#1677FF] mt-0.5">{{ $activeUsers }} <span class="text-xs text-slate-400 font-normal">/ {{ $totalUsers }}</span></div>
        </div>
        <div class="text-center p-2">
            <span class="text-[10px] font-extrabold text-slate-400 uppercase">Overdue Follow-ups</span>
            <div class="text-lg font-extrabold {{ $overdueFollowups > 0 ? 'text-red-600' : 'text-slate-700' }} mt-0.5">{{ $overdueFollowups }}</div>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- 2. DYNAMIC CHARTS (CHART.JS) -->
    <!-- ========================================== -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
        
        <!-- Daily Trend (7 Days) -->
        <div class="lg:col-span-8 bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h3 class="text-sm font-extrabold text-[#062B59] uppercase tracking-wider">
                        Daily Lead Generation Trend (7 Days)
                    </h3>
                    <p class="text-xs text-slate-400 mt-0.5">Real-time daily incoming customer applications</p>
                </div>
            </div>
            <div class="h-64 w-full">
                <canvas id="dailyLeadsChart"></canvas>
            </div>
        </div>

        <!-- Status Distribution Doughnut -->
        <div class="lg:col-span-4 bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs flex flex-col justify-between">
            <div>
                <h3 class="text-sm font-extrabold text-[#062B59] uppercase tracking-wider mb-1">
                    Lead Status Distribution
                </h3>
                <p class="text-xs text-slate-400 mb-4">Pipeline stages across all active enquiries</p>
            </div>
            <div class="h-56 relative flex items-center justify-center">
                <canvas id="statusDoughnutChart"></canvas>
            </div>
        </div>

    </div>

    <!-- ========================================== -->
    <!-- 3. STAFF PERFORMANCE & RECENT LEADS -->
    <!-- ========================================== -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
        
        <!-- Recent Leads Table -->
        <div class="lg:col-span-7 bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden">
            <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                <div>
                    <h3 class="text-sm font-extrabold text-[#062B59] uppercase tracking-wider">Recent Inbound Leads</h3>
                    <p class="text-xs text-slate-400 mt-0.5">Latest client applications submitted via website</p>
                </div>
                <a href="{{ route('admin.leads.index') }}" class="text-xs font-bold text-[#1677FF] hover:underline">
                    View All Leads &rarr;
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead class="bg-slate-50 text-slate-500 font-extrabold uppercase text-[10px] border-b border-slate-100">
                        <tr>
                            <th class="p-3.5 pl-5">Lead</th>
                            <th class="p-3.5">Category</th>
                            <th class="p-3.5">Amount</th>
                            <th class="p-3.5">Status</th>
                            <th class="p-3.5">Assigned To</th>
                            <th class="p-3.5 pr-5 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 font-medium">
                        @forelse($recentLeads as $l)
                        <tr class="hover:bg-blue-50/40 transition-colors">
                            <td class="p-3.5 pl-5">
                                <div class="font-bold text-[#062B59]">{{ $l->full_name }}</div>
                                <div class="text-[11px] text-slate-400 font-normal">{{ $l->mobile }} • {{ $l->city }}</div>
                            </td>
                            <td class="p-3.5">
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-slate-100 text-slate-700">
                                    {{ $l->loan_category_label }}
                                </span>
                            </td>
                            <td class="p-3.5 font-bold text-[#102B50]">
                                ₹{{ number_format($l->loan_amount) }}
                            </td>
                            <td class="p-3.5">
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-extrabold border {{ $l->status_color }}">
                                    {{ $l->status_label }}
                                </span>
                            </td>
                            <td class="p-3.5">
                                @if($l->assignedTo)
                                    <span class="text-[11px] font-bold text-[#062B59]">{{ $l->assignedTo->name }}</span>
                                @else
                                    <span class="text-[11px] font-bold text-amber-600 bg-amber-50 px-2 py-0.5 rounded-full">Unassigned</span>
                                @endif
                            </td>
                            <td class="p-3.5 pr-5 text-right">
                                <a href="{{ route('admin.leads.show', $l) }}" class="px-2.5 py-1 rounded-lg bg-slate-100 hover:bg-[#1677FF] hover:text-white font-bold text-[11px] transition-colors">
                                    Manage
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="p-6 text-center text-slate-400">No leads recorded yet.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Staff Performance Table -->
        <div class="lg:col-span-5 bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden">
            <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                <div>
                    <h3 class="text-sm font-extrabold text-[#062B59] uppercase tracking-wider">Employee Performance</h3>
                    <p class="text-xs text-slate-400 mt-0.5">User-wise lead allocation and conversion rates</p>
                </div>
                <a href="{{ route('admin.users.index') }}" class="text-xs font-bold text-[#1677FF] hover:underline">
                    Staff &rarr;
                </a>
            </div>

            <div class="p-4 space-y-3">
                @forelse($userPerformance as $u)
                <div class="p-3 rounded-2xl bg-slate-50/80 border border-slate-100 flex items-center justify-between">
                    <div class="flex items-center gap-3 min-w-0">
                        <div class="w-8 h-8 rounded-full bg-[#062B59] text-white flex items-center justify-center font-bold text-xs flex-shrink-0">
                            {{ substr($u->name, 0, 1) }}
                        </div>
                        <div class="min-w-0">
                            <div class="text-xs font-bold text-[#062B59] truncate">{{ $u->name }}</div>
                            <div class="text-[10px] text-slate-400 truncate">{{ $u->designation ?: 'Staff' }}</div>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 flex-shrink-0 text-right">
                        <div>
                            <span class="text-[10px] font-bold text-slate-400 uppercase block">Assigned</span>
                            <span class="text-xs font-extrabold text-[#1677FF]">{{ $u->total_assigned }}</span>
                        </div>
                        <div>
                            <span class="text-[10px] font-bold text-slate-400 uppercase block">Converted</span>
                            <span class="text-xs font-extrabold text-emerald-600">{{ $u->converted_count }}</span>
                        </div>
                    </div>
                </div>
                @empty
                <div class="text-center py-6 text-xs text-slate-400">No active staff members found.</div>
                @endforelse
            </div>
        </div>

    </div>

</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    // 1. Daily Trend Chart
    const dailyCtx = document.getElementById('dailyLeadsChart');
    if (dailyCtx) {
        new Chart(dailyCtx, {
            type: 'line',
            data: {
                labels: {!! json_encode($dailyStats->pluck('day_label')) !!},
                datasets: [{
                    label: 'Leads Received',
                    data: {!! json_encode($dailyStats->pluck('count')) !!},
                    borderColor: '#1677FF',
                    backgroundColor: 'rgba(22, 119, 255, 0.08)',
                    borderWidth: 2.5,
                    fill: true,
                    tension: 0.35,
                    pointBackgroundColor: '#1677FF',
                    pointRadius: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { beginAtZero: true, ticks: { precision: 0, font: { size: 10 } } },
                    x: { ticks: { font: { size: 10 } } }
                }
            }
        });
    }

    // 2. Status Distribution Doughnut Chart
    const statusCtx = document.getElementById('statusDoughnutChart');
    if (statusCtx) {
        new Chart(statusCtx, {
            type: 'doughnut',
            data: {
                labels: {!! json_encode(array_keys($statusDistribution->toArray())) !!}.map(s => s.replace('_', ' ').toUpperCase()),
                datasets: [{
                    data: {!! json_encode(array_values($statusDistribution->toArray())) !!},
                    backgroundColor: ['#1677FF', '#F59E0B', '#10B981', '#8B5CF6', '#EC4899', '#EF4444', '#64748B'],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { position: 'bottom', labels: { boxWidth: 10, font: { size: 10 } } }
                },
                cutout: '68%'
            }
        });
    }
});
</script>
@endpush
