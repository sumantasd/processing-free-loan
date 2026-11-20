<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard') | ProcessingFreeLoan.com</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Chart.js for dynamic analytics -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#F5F9FF] font-sans antialiased text-[#102B50] min-h-screen flex" x-data="{ sidebarOpen: false }">
    
    <!-- Mobile Sidebar Backdrop -->
    <div x-show="sidebarOpen" 
         @click="sidebarOpen = false"
         x-transition:enter="transition-opacity ease-linear duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity ease-linear duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-40 bg-black/50 lg:hidden"
         style="display: none;"></div>

    <!-- ========================================== -->
    <!-- 1. SIDEBAR NAVIGATION -->
    <!-- ========================================== -->
    <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
           class="fixed inset-y-0 left-0 z-50 w-64 bg-[#031B3B] text-slate-300 flex flex-col transition-transform duration-300 ease-in-out border-r border-slate-800">
        
        <!-- Brand Header with Logo -->
        <div class="h-20 flex items-center justify-between px-6 border-b border-slate-800/80 bg-[#02132B]">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center group">
                <div class="logo-footer-wrapper p-1.5 bg-white rounded-lg shadow-sm">
                    <img src="{{ asset('images/logo.png') }}" alt="ProcessingFreeLoan.com" class="h-8 w-auto object-contain">
                </div>
            </a>
            <button @click="sidebarOpen = false" class="lg:hidden text-slate-400 hover:text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <!-- Current User Role Pill -->
        <div class="px-6 py-3 bg-[#062B59]/40 border-b border-slate-800/60 flex items-center gap-3">
            <div class="w-9 h-9 rounded-full bg-[#1677FF] text-white flex items-center justify-center font-bold text-xs uppercase shadow-sm">
                {{ substr(auth()->user()->name, 0, 2) }}
            </div>
            <div class="min-w-0 flex-1">
                <div class="text-xs font-bold text-white truncate">{{ auth()->user()->name }}</div>
                <div class="text-[10px] font-semibold text-[#12C878] uppercase tracking-wider truncate">
                    {{ ucfirst(str_replace('_', ' ', auth()->user()->role)) }}
                </div>
            </div>
        </div>

        <!-- Sidebar Navigation Menu -->
        <nav class="flex-1 overflow-y-auto px-4 py-4 space-y-6 text-xs font-medium custom-scrollbar">
            
            <!-- Group: Overview -->
            <div>
                <div class="px-3 text-[10px] font-extrabold uppercase tracking-wider text-slate-400 mb-2">Overview</div>
                <div class="space-y-1">
                    <a href="{{ route('admin.dashboard') }}" 
                       class="flex items-center gap-3 px-3 py-2 rounded-xl transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-[#1677FF] text-white font-bold shadow-md shadow-blue-500/20' : 'hover:bg-white/5 hover:text-white' }}">
                        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                        <span>Dashboard</span>
                    </a>
                </div>
            </div>

            <!-- Group: Lead CRM & Allocation -->
            <div>
                <div class="px-3 text-[10px] font-extrabold uppercase tracking-wider text-slate-400 mb-2">Lead CRM</div>
                <div class="space-y-1">
                    <a href="{{ route('admin.leads.index') }}" 
                       class="flex items-center justify-between px-3 py-2 rounded-xl transition-colors {{ request()->routeIs('admin.leads.*') ? 'bg-[#1677FF] text-white font-bold shadow-md shadow-blue-500/20' : 'hover:bg-white/5 hover:text-white' }}">
                        <div class="flex items-center gap-3">
                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                            <span>All Leads</span>
                        </div>
                        <span class="px-1.5 py-0.5 rounded-full text-[10px] font-bold bg-[#12C878]/20 text-[#12C878]">
                            {{ \App\Models\Lead::count() }}
                        </span>
                    </a>

                    <a href="{{ route('admin.followups.index') }}" 
                       class="flex items-center justify-between px-3 py-2 rounded-xl transition-colors {{ request()->routeIs('admin.followups.*') ? 'bg-[#1677FF] text-white font-bold shadow-md shadow-blue-500/20' : 'hover:bg-white/5 hover:text-white' }}">
                        <div class="flex items-center gap-3">
                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <span>Follow-ups</span>
                        </div>
                        @php $overdue = \App\Models\LeadFollowup::where('status', 'pending')->whereDate('followup_date', '<', today())->count(); @endphp
                        @if($overdue > 0)
                            <span class="px-1.5 py-0.5 rounded-full text-[10px] font-bold bg-rose-500/20 text-rose-300">
                                {{ $overdue }}
                            </span>
                        @endif
                    </a>
                </div>
            </div>

            <!-- Group: Staff & Users (Super Admin & Admin Only) -->
            @if(auth()->user()->isAdmin())
            <div>
                <div class="px-3 text-[10px] font-extrabold uppercase tracking-wider text-slate-400 mb-2">User Management</div>
                <div class="space-y-1">
                    <a href="{{ route('admin.users.index') }}" 
                       class="flex items-center justify-between px-3 py-2 rounded-xl transition-colors {{ request()->routeIs('admin.users.*') ? 'bg-[#1677FF] text-white font-bold shadow-md shadow-blue-500/20' : 'hover:bg-white/5 hover:text-white' }}">
                        <div class="flex items-center gap-3">
                            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                            <span>Internal Staff</span>
                        </div>
                        <span class="px-1.5 py-0.5 rounded-full text-[10px] font-bold bg-blue-500/20 text-blue-300">
                            {{ \App\Models\User::count() }}
                        </span>
                    </a>
                </div>
            </div>
            @endif

            <!-- Group: Dynamic Website CMS -->
            @if(auth()->user()->isAdmin())
            <div>
                <div class="px-3 text-[10px] font-extrabold uppercase tracking-wider text-slate-400 mb-2">Website CMS</div>
                <div class="space-y-1">
                    <a href="{{ route('admin.cms.homepage') }}" 
                       class="flex items-center gap-3 px-3 py-2 rounded-xl transition-colors {{ request()->routeIs('admin.cms.homepage') ? 'bg-[#1677FF] text-white font-bold shadow-md shadow-blue-500/20' : 'hover:bg-white/5 hover:text-white' }}">
                        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                        <span>Homepage Sections</span>
                    </a>

                    <a href="{{ route('admin.cms.header-footer') }}" 
                       class="flex items-center gap-3 px-3 py-2 rounded-xl transition-colors {{ request()->routeIs('admin.cms.header-footer') ? 'bg-[#1677FF] text-white font-bold shadow-md shadow-blue-500/20' : 'hover:bg-white/5 hover:text-white' }}">
                        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/></svg>
                        <span>Header & Footer</span>
                    </a>

                    <a href="{{ route('admin.cms.pages') }}" 
                       class="flex items-center gap-3 px-3 py-2 rounded-xl transition-colors {{ request()->routeIs('admin.cms.pages*') ? 'bg-[#1677FF] text-white font-bold shadow-md shadow-blue-500/20' : 'hover:bg-white/5 hover:text-white' }}">
                        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        <span>Pages Management</span>
                    </a>

                    <a href="{{ route('admin.cms.products') }}" 
                       class="flex items-center gap-3 px-3 py-2 rounded-xl transition-colors {{ request()->routeIs('admin.cms.products*') ? 'bg-[#1677FF] text-white font-bold shadow-md shadow-blue-500/20' : 'hover:bg-white/5 hover:text-white' }}">
                        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span>Loan Products</span>
                    </a>

                    <a href="{{ route('admin.cms.lenders') }}" 
                       class="flex items-center gap-3 px-3 py-2 rounded-xl transition-colors {{ request()->routeIs('admin.cms.lenders*') ? 'bg-[#1677FF] text-white font-bold shadow-md shadow-blue-500/20' : 'hover:bg-white/5 hover:text-white' }}">
                        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                        <span>Banks &amp; NBFCs</span>
                    </a>

                    <a href="{{ route('admin.cms.blogs') }}" 
                       class="flex items-center gap-3 px-3 py-2 rounded-xl transition-colors {{ request()->routeIs('admin.cms.blogs*') ? 'bg-[#1677FF] text-white font-bold shadow-md shadow-blue-500/20' : 'hover:bg-white/5 hover:text-white' }}">
                        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                        <span>Articles / Blog</span>
                    </a>

                    <a href="{{ route('admin.cms.faqs') }}" 
                       class="flex items-center gap-3 px-3 py-2 rounded-xl transition-colors {{ request()->routeIs('admin.cms.faqs*') ? 'bg-[#1677FF] text-white font-bold shadow-md shadow-blue-500/20' : 'hover:bg-white/5 hover:text-white' }}">
                        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span>FAQ Management</span>
                    </a>

                    <a href="{{ route('admin.cms.testimonials') }}" 
                       class="flex items-center gap-3 px-3 py-2 rounded-xl transition-colors {{ request()->routeIs('admin.cms.testimonials*') ? 'bg-[#1677FF] text-white font-bold shadow-md shadow-blue-500/20' : 'hover:bg-white/5 hover:text-white' }}">
                        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
                        <span>Testimonials</span>
                    </a>

                    <a href="{{ route('admin.cms.media') }}" 
                       class="flex items-center gap-3 px-3 py-2 rounded-xl transition-colors {{ request()->routeIs('admin.cms.media*') ? 'bg-[#1677FF] text-white font-bold shadow-md shadow-blue-500/20' : 'hover:bg-white/5 hover:text-white' }}">
                        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <span>Media Library</span>
                    </a>
                </div>
            </div>
            @endif

            <!-- Group: Security & Audit -->
            <div>
                <div class="px-3 text-[10px] font-extrabold uppercase tracking-wider text-slate-400 mb-2">System</div>
                <div class="space-y-1">
                    <a href="{{ route('admin.audit-logs.index') }}" 
                       class="flex items-center gap-3 px-3 py-2 rounded-xl transition-colors {{ request()->routeIs('admin.audit-logs.*') ? 'bg-[#1677FF] text-white font-bold shadow-md shadow-blue-500/20' : 'hover:bg-white/5 hover:text-white' }}">
                        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        <span>Audit Logs</span>
                    </a>

                    <a href="{{ route('home') }}" target="_blank" 
                       class="flex items-center gap-3 px-3 py-2 rounded-xl hover:bg-white/5 hover:text-white transition-colors">
                        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        <span>View Live Website</span>
                    </a>
                </div>
            </div>

        </nav>

        <!-- Footer / Logout -->
        <div class="p-4 border-t border-slate-800/80 bg-[#02132B]">
            <form method="POST" action="{{ route('admin.logout') }}" class="w-full">
                @csrf
                <button type="submit" 
                        class="w-full flex items-center justify-center gap-2 py-2.5 rounded-xl bg-red-500/10 hover:bg-red-500/20 text-red-400 font-bold text-xs transition-colors cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    <span>Sign Out Securely</span>
                </button>
            </form>
        </div>

    </aside>

    <!-- ========================================== -->
    <!-- 2. MAIN CONTENT WRAPPER -->
    <!-- ========================================== -->
    <div class="flex-1 lg:pl-64 flex flex-col min-h-screen">
        
        <!-- Top App Bar -->
        <header class="h-16 bg-white border-b border-slate-200/80 px-4 sm:px-6 flex items-center justify-between sticky top-0 z-30 shadow-2xs">
            <div class="flex items-center gap-3">
                <button @click="sidebarOpen = true" class="lg:hidden p-2 rounded-lg text-slate-600 hover:bg-slate-100">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
                <h1 class="text-lg font-extrabold text-[#062B59] font-heading tracking-tight">
                    @yield('header_title', 'Processing Free Loan Administration')
                </h1>
            </div>

            <div class="flex items-center gap-3">
                <!-- Notifications icon -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="w-9 h-9 rounded-full bg-slate-50 hover:bg-slate-100 text-slate-600 flex items-center justify-center relative transition-colors">
                        <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                        <span class="absolute top-1 right-1 w-2 h-2 rounded-full bg-[#12C878] animate-pulse"></span>
                    </button>
                    <div x-show="open" @click.outside="open = false" 
                         class="absolute right-0 mt-2 w-80 bg-white rounded-2xl shadow-2xl border border-slate-100 p-3 z-50 text-xs"
                         style="display: none;">
                        <div class="font-extrabold text-[#062B59] px-2 py-1 border-b border-slate-100">Live Notifications</div>
                        <div class="py-2 space-y-2">
                            <div class="p-2 rounded-xl bg-blue-50/80 text-slate-700">
                                <span class="font-bold text-[#1677FF] block">Lead CRM Active</span>
                                MySQL database synced with 100% persistence.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- User profile badge -->
                <div class="hidden sm:flex items-center gap-2 pl-2 border-l border-slate-200">
                    <div class="w-8 h-8 rounded-full bg-[#062B59] text-white flex items-center justify-center text-xs font-bold">
                        {{ substr(auth()->user()->name, 0, 1) }}
                    </div>
                    <span class="text-xs font-bold text-slate-700">{{ auth()->user()->name }}</span>
                </div>
            </div>
        </header>

        <!-- Flash Messages -->
        @if(session('success'))
            <div class="m-4 sm:m-6 mb-0 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-xs font-semibold text-emerald-800 flex items-center gap-3 shadow-xs">
                <svg class="w-5 h-5 text-emerald-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="m-4 sm:m-6 mb-0 p-4 rounded-2xl bg-red-50 border border-red-200 text-xs font-semibold text-red-800 flex items-center gap-3 shadow-xs">
                <svg class="w-5 h-5 text-red-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        <!-- Main Body Content -->
        <main class="flex-1 p-4 sm:p-6 lg:p-8">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="h-12 border-t border-slate-200/80 bg-white px-6 flex items-center justify-between text-[11px] text-slate-400">
            <div>ProcessingFreeLoan.com CRM &copy; {{ date('Y') }} • Unit Of Findeal Financial Private Limited</div>
            <div class="font-semibold text-slate-500">Khattimari, Cooch Behar, West Bengal</div>
        </footer>

    </div>

    @stack('scripts')
</body>
</html>
