<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Employee Workspace') | ProcessingFreeLoan.com</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#F5F9FF] font-sans antialiased text-[#102B50] min-h-screen flex" x-data="{ sidebarOpen: false }">
    
    <!-- Mobile Sidebar Backdrop -->
    <div x-show="sidebarOpen" 
         @click="sidebarOpen = false"
         class="fixed inset-0 z-40 bg-black/50 lg:hidden"
         style="display: none;"></div>

    <!-- ========================================== -->
    <!-- 1. SIDEBAR NAVIGATION -->
    <!-- ========================================== -->
    <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
           class="fixed inset-y-0 left-0 z-50 w-64 bg-white text-slate-700 flex flex-col transition-transform duration-300 ease-in-out border-r border-slate-200">
        
        <!-- Brand Header with Logo -->
        <div class="h-20 flex items-center justify-between px-6 border-b border-slate-100 bg-white">
            <a href="{{ route('user.dashboard') }}" class="flex items-center group">
                <img src="{{ asset('images/logo.png') }}" alt="ProcessingFreeLoan.com" class="h-8 w-auto object-contain">
            </a>
            <button @click="sidebarOpen = false" class="lg:hidden text-slate-400 hover:text-slate-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        <!-- Employee Profile Header -->
        <div class="px-6 py-4 bg-slate-50 border-b border-slate-100 flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-[#062B59] text-white flex items-center justify-center font-bold text-sm shadow-xs">
                {{ substr(auth()->user()->name, 0, 2) }}
            </div>
            <div class="min-w-0 flex-1">
                <div class="text-xs font-bold text-[#062B59] truncate">{{ auth()->user()->name }}</div>
                <div class="text-[10px] font-semibold text-slate-400 truncate">{{ auth()->user()->designation ?: 'Loan Officer' }}</div>
            </div>
        </div>

        <!-- Sidebar Navigation Menu -->
        <nav class="flex-1 overflow-y-auto px-4 py-4 space-y-2 text-xs font-semibold">
            
            <a href="{{ route('user.dashboard') }}" 
               class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition-colors {{ request()->routeIs('user.dashboard') ? 'bg-[#062B59] text-white shadow-md' : 'hover:bg-slate-50 text-slate-700' }}">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('user.leads.index') }}" 
               class="flex items-center justify-between px-3.5 py-2.5 rounded-xl transition-colors {{ request()->routeIs('user.leads.*') ? 'bg-[#062B59] text-white shadow-md' : 'hover:bg-slate-50 text-slate-700' }}">
                <div class="flex items-center gap-3">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    <span>My Leads</span>
                </div>
                <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-50 text-[#1677FF]">
                    {{ \App\Models\Lead::where('assigned_to', auth()->id())->count() }}
                </span>
            </a>

            <a href="{{ route('user.followups.index') }}" 
               class="flex items-center justify-between px-3.5 py-2.5 rounded-xl transition-colors {{ request()->routeIs('user.followups.*') ? 'bg-[#062B59] text-white shadow-md' : 'hover:bg-slate-50 text-slate-700' }}">
                <div class="flex items-center gap-3">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <span>Follow-ups</span>
                </div>
                @php $myOverdue = \App\Models\LeadFollowup::where('user_id', auth()->id())->where('status', 'pending')->whereDate('followup_date', '<=', today())->count(); @endphp
                @if($myOverdue > 0)
                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-50 text-amber-700">
                        {{ $myOverdue }}
                    </span>
                @endif
            </a>

            <div class="pt-4 border-t border-slate-100">
                <a href="{{ route('user.profile') }}" 
                   class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl transition-colors {{ request()->routeIs('user.profile') ? 'bg-[#062B59] text-white shadow-md' : 'hover:bg-slate-50 text-slate-700' }}">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    <span>My Profile</span>
                </a>

                <a href="{{ route('home') }}" target="_blank" 
                   class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl hover:bg-slate-50 text-slate-700 transition-colors">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    <span>View Website</span>
                </a>
            </div>

        </nav>

        <!-- Sign Out -->
        <div class="p-4 border-t border-slate-100 bg-slate-50">
            <form method="POST" action="{{ route('user.logout') }}" class="w-full">
                @csrf
                <button type="submit" 
                        class="w-full flex items-center justify-center gap-2 py-2.5 rounded-xl bg-white border border-slate-200 hover:bg-red-50 hover:text-red-600 text-slate-700 font-bold text-xs transition-colors shadow-2xs cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    <span>Logout</span>
                </button>
            </form>
        </div>

    </aside>

    <!-- ========================================== -->
    <!-- 2. MAIN CONTENT WRAPPER -->
    <!-- ========================================== -->
    <div class="flex-1 lg:pl-64 flex flex-col min-h-screen">
        
        <!-- Top App Bar -->
        <header class="h-16 bg-white border-b border-slate-200 px-4 sm:px-6 flex items-center justify-between sticky top-0 z-30 shadow-2xs">
            <div class="flex items-center gap-3">
                <button @click="sidebarOpen = true" class="lg:hidden p-2 rounded-lg text-slate-600 hover:bg-slate-100">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
                <h1 class="text-base sm:text-lg font-extrabold text-[#062B59] font-heading tracking-tight">
                    @yield('header_title', 'Loan Officer Workspace')
                </h1>
            </div>

            <div class="flex items-center gap-3">
                <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#12C878] animate-pulse"></span>
                    <span class="text-xs font-extrabold text-slate-700">{{ auth()->user()->name }}</span>
                    <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-slate-100 text-slate-600">
                        {{ auth()->user()->employee_id }}
                    </span>
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
        <footer class="h-12 border-t border-slate-200 bg-white px-6 flex items-center justify-between text-[11px] text-slate-400">
            <div>ProcessingFreeLoan.com • Employee Lead Management Workspace</div>
            <div class="font-semibold text-slate-500">Unit Of Findeal Financial Private Limited</div>
        </footer>

    </div>

    @stack('scripts')
</body>
</html>
