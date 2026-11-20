<!-- SECTION 02: MAIN NAVIGATION -->
<header x-data="{ mobileMenuOpen: false, carDropdown: false, profDropdown: false }"
        class="sticky top-0 z-50 bg-white/95 backdrop-blur-md shadow-sm border-b border-slate-100 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            
            <!-- Logo: Exact supplied brand logo -->
            <div class="flex-shrink-0">
                <a href="{{ route('home') }}" class="flex items-center gap-2 group">
                    <img src="{{ asset('images/logo.png') }}" 
                         alt="ProcessingFreeLoan.com - Loan Without Processing Fee" 
                         class="h-11 sm:h-13 w-auto object-contain transition-transform duration-200 group-hover:scale-102">
                </a>
            </div>

            <!-- Desktop Navigation Links -->
            <nav class="hidden xl:flex items-center space-x-1 lg:space-x-2 text-[15px] font-semibold text-[#102B50]">
                
                <a href="{{ route('home') }}" 
                   class="px-3.5 py-2 rounded-lg transition-colors {{ request()->routeIs('home') ? 'text-[#1677FF] font-bold bg-blue-50/70' : 'hover:text-[#1677FF] hover:bg-slate-50' }}">
                    Home
                </a>

                <a href="{{ route('loans.personal') }}" 
                   class="px-3.5 py-2 rounded-lg transition-colors {{ request()->routeIs('loans.personal') ? 'text-[#1677FF] font-bold bg-blue-50/70' : 'hover:text-[#1677FF] hover:bg-slate-50' }}">
                    Personal Loan
                </a>

                <a href="{{ route('loans.business') }}" 
                   class="px-3.5 py-2 rounded-lg transition-colors {{ request()->routeIs('loans.business') ? 'text-[#1677FF] font-bold bg-blue-50/70' : 'hover:text-[#1677FF] hover:bg-slate-50' }}">
                    Business Loan
                </a>

                <!-- Car Loan Dropdown -->
                <div class="relative" @mouseenter="carDropdown = true" @mouseleave="carDropdown = false">
                    <button type="button" 
                            class="flex items-center gap-1 px-3.5 py-2 rounded-lg transition-colors hover:text-[#1677FF] hover:bg-slate-50 {{ request()->routeIs('loans.new-car', 'loans.used-car') ? 'text-[#1677FF] font-bold bg-blue-50/70' : '' }}">
                        <span>Car Loan</span>
                        <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': carDropdown }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="carDropdown" 
                         x-transition:enter="transition ease-out duration-150"
                         x-transition:enter-start="opacity-0 translate-y-1"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-100"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 translate-y-1"
                         class="absolute left-0 mt-1 w-56 bg-white rounded-xl shadow-xl border border-slate-100 py-2 z-50"
                         style="display: none;">
                        <a href="{{ route('loans.new-car') }}" class="flex items-center gap-2.5 px-4 py-2.5 text-sm hover:bg-blue-50/80 hover:text-[#1677FF] transition-colors">
                            <span class="w-2 h-2 rounded-full bg-[#12C878]"></span>
                            <span>New Car Loan</span>
                        </a>
                        <a href="{{ route('loans.used-car') }}" class="flex items-center gap-2.5 px-4 py-2.5 text-sm hover:bg-blue-50/80 hover:text-[#1677FF] transition-colors">
                            <span class="w-2 h-2 rounded-full bg-[#1677FF]"></span>
                            <span>Used Car Loan</span>
                        </a>
                    </div>
                </div>

                <!-- Professional Loan Dropdown -->
                <div class="relative" @mouseenter="profDropdown = true" @mouseleave="profDropdown = false">
                    <button type="button" 
                            class="flex items-center gap-1 px-3.5 py-2 rounded-lg transition-colors hover:text-[#1677FF] hover:bg-slate-50 {{ request()->routeIs('loans.doctor', 'loans.ca') ? 'text-[#1677FF] font-bold bg-blue-50/70' : '' }}">
                        <span>Professional Loan</span>
                        <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': profDropdown }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="profDropdown" 
                         x-transition:enter="transition ease-out duration-150"
                         x-transition:enter-start="opacity-0 translate-y-1"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-100"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 translate-y-1"
                         class="absolute left-0 mt-1 w-56 bg-white rounded-xl shadow-xl border border-slate-100 py-2 z-50"
                         style="display: none;">
                        <a href="{{ route('loans.doctor') }}" class="flex items-center gap-2.5 px-4 py-2.5 text-sm hover:bg-blue-50/80 hover:text-[#1677FF] transition-colors">
                            <span class="w-2 h-2 rounded-full bg-rose-500"></span>
                            <span>Doctor Loan</span>
                        </a>
                        <a href="{{ route('loans.ca') }}" class="flex items-center gap-2.5 px-4 py-2.5 text-sm hover:bg-blue-50/80 hover:text-[#1677FF] transition-colors">
                            <span class="w-2 h-2 rounded-full bg-violet-600"></span>
                            <span>CA Loan</span>
                        </a>
                    </div>
                </div>

                <a href="{{ route('partners.index') }}" 
                   class="px-3.5 py-2 rounded-lg transition-colors {{ request()->routeIs('partners.*') ? 'text-[#1677FF] font-bold bg-blue-50/70' : 'hover:text-[#1677FF] hover:bg-slate-50' }}">
                    Banks & NBFCs
                </a>

                <a href="{{ route('pages.about') }}" 
                   class="px-3.5 py-2 rounded-lg transition-colors {{ request()->routeIs('pages.about') ? 'text-[#1677FF] font-bold bg-blue-50/70' : 'hover:text-[#1677FF] hover:bg-slate-50' }}">
                    About Us
                </a>

                <a href="{{ route('pages.contact') }}" 
                   class="px-3.5 py-2 rounded-lg transition-colors {{ request()->routeIs('pages.contact') ? 'text-[#1677FF] font-bold bg-blue-50/70' : 'hover:text-[#1677FF] hover:bg-slate-50' }}">
                    Contact
                </a>

            </nav>

            <!-- Right CTA Button -->
            <div class="hidden sm:flex items-center space-x-3">
                <button type="button" 
                        @click="openEnquiry('personal-loan', '', '')"
                        class="relative inline-flex items-center justify-center gap-2 px-6 py-2.5 rounded-full font-bold text-sm text-white bg-gradient-to-r from-[#0866E8] to-[#1677FF] hover:from-[#062B59] hover:to-[#0866E8] shadow-md shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-600/30 transition-all duration-300 transform hover:-translate-y-0.5 active:translate-y-0">
                    <span>Apply Now</span>
                    <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </button>
            </div>

            <!-- Mobile Hamburger Toggle -->
            <div class="flex items-center xl:hidden">
                <button type="button" 
                        @click="mobileMenuOpen = !mobileMenuOpen"
                        aria-label="Toggle navigation menu"
                        class="p-2 rounded-lg text-slate-700 hover:text-[#1677FF] hover:bg-slate-100 transition-colors">
                    <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg x-show="mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

        </div>
    </div>

    <!-- Mobile Drawer Menu -->
    <div x-show="mobileMenuOpen" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         class="xl:hidden bg-white border-b border-slate-200 shadow-xl px-4 pt-3 pb-6 space-y-1"
         style="display: none;">
        
        <a href="{{ route('home') }}" class="block px-3 py-2.5 rounded-lg text-base font-semibold text-slate-800 hover:bg-blue-50 hover:text-[#1677FF]">Home</a>
        <a href="{{ route('loans.personal') }}" class="block px-3 py-2.5 rounded-lg text-base font-semibold text-slate-800 hover:bg-blue-50 hover:text-[#1677FF]">Personal Loan</a>
        <a href="{{ route('loans.business') }}" class="block px-3 py-2.5 rounded-lg text-base font-semibold text-slate-800 hover:bg-blue-50 hover:text-[#1677FF]">Business Loan</a>
        
        <div class="pt-2 pb-1 px-3 text-xs font-bold tracking-wider text-slate-400 uppercase">Car Loans</div>
        <a href="{{ route('loans.new-car') }}" class="block pl-6 pr-3 py-2 rounded-lg text-sm font-medium text-slate-700 hover:bg-blue-50 hover:text-[#1677FF]">New Car Loan</a>
        <a href="{{ route('loans.used-car') }}" class="block pl-6 pr-3 py-2 rounded-lg text-sm font-medium text-slate-700 hover:bg-blue-50 hover:text-[#1677FF]">Used Car Loan</a>

        <div class="pt-2 pb-1 px-3 text-xs font-bold tracking-wider text-slate-400 uppercase">Professional Loans</div>
        <a href="{{ route('loans.doctor') }}" class="block pl-6 pr-3 py-2 rounded-lg text-sm font-medium text-slate-700 hover:bg-blue-50 hover:text-[#1677FF]">Doctor Loan</a>
        <a href="{{ route('loans.ca') }}" class="block pl-6 pr-3 py-2 rounded-lg text-sm font-medium text-slate-700 hover:bg-blue-50 hover:text-[#1677FF]">CA Loan</a>

        <div class="border-t border-slate-100 my-2"></div>
        <a href="{{ route('partners.index') }}" class="block px-3 py-2.5 rounded-lg text-base font-semibold text-slate-800 hover:bg-blue-50 hover:text-[#1677FF]">Banks & NBFCs</a>
        <a href="{{ route('pages.about') }}" class="block px-3 py-2.5 rounded-lg text-base font-semibold text-slate-800 hover:bg-blue-50 hover:text-[#1677FF]">About Us</a>
        <a href="{{ route('pages.contact') }}" class="block px-3 py-2.5 rounded-lg text-base font-semibold text-slate-800 hover:bg-blue-50 hover:text-[#1677FF]">Contact</a>

        <div class="pt-3">
            <button type="button" 
                    @click="mobileMenuOpen = false; openEnquiry('personal-loan')"
                    class="w-full flex items-center justify-center gap-2 py-3 rounded-xl font-bold text-white bg-gradient-to-r from-[#0866E8] to-[#1677FF] shadow-md">
                <span>Apply for Loan Now</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </button>
        </div>
    </div>
</header>
