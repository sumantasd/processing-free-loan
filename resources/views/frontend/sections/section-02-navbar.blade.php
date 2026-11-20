<!-- SECTION 02: MAIN NAVIGATION (DESKTOP SINGLE ROW + MOBILE 3-ICON HEADER) -->
<header x-data="{ mobileMenuOpen: false, carDropdown: false, profDropdown: false }"
        class="sticky top-0 z-50 bg-white/95 backdrop-blur-md shadow-sm border-b border-slate-100 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-18 sm:h-20">
            
            <!-- LEFT: Exact supplied brand logo (Increased mobile size for clear recognition) -->
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ route('home') }}" class="flex items-center group">
                    <img src="{{ asset('images/logo.png') }}" 
                         alt="ProcessingFreeLoan.com - Loan Without Processing Fee" 
                         class="w-[148px] sm:w-[165px] lg:w-[195px] xl:w-[215px] h-auto max-h-12 object-contain transition-transform duration-200 group-hover:scale-102">
                </a>
            </div>

            <!-- CENTER: Desktop Navigation (Single Horizontal Row - No Wrap - Strict) -->
            <nav class="hidden lg:flex desktop-nav-row items-center space-x-0.5 xl:space-x-1.5 text-[13px] xl:text-[14px] font-bold text-[#102B50]">
                
                <a href="{{ route('home') }}" 
                   class="desktop-nav-link px-2.5 xl:px-3 py-1.5 rounded-lg transition-colors {{ request()->routeIs('home') ? 'text-[#1677FF] bg-blue-50/80' : 'hover:text-[#1677FF] hover:bg-slate-50' }}">
                    Home
                </a>

                <a href="{{ route('loans.personal') }}" 
                   class="desktop-nav-link px-2.5 xl:px-3 py-1.5 rounded-lg transition-colors {{ request()->routeIs('loans.personal') ? 'text-[#1677FF] bg-blue-50/80' : 'hover:text-[#1677FF] hover:bg-slate-50' }}">
                    Personal Loan
                </a>

                <a href="{{ route('loans.business') }}" 
                   class="desktop-nav-link px-2.5 xl:px-3 py-1.5 rounded-lg transition-colors {{ request()->routeIs('loans.business') ? 'text-[#1677FF] bg-blue-50/80' : 'hover:text-[#1677FF] hover:bg-slate-50' }}">
                    Business Loan
                </a>

                <!-- Car Loan Dropdown -->
                <div class="relative desktop-nav-link" @mouseenter="carDropdown = true" @mouseleave="carDropdown = false">
                    <button type="button" 
                            class="flex items-center gap-1 px-2.5 xl:px-3 py-1.5 rounded-lg transition-colors hover:text-[#1677FF] hover:bg-slate-50 {{ request()->routeIs('loans.new-car', 'loans.used-car') ? 'text-[#1677FF] bg-blue-50/80' : '' }}">
                        <span class="whitespace-nowrap">Car Loan</span>
                        <svg class="w-3.5 h-3.5 transition-transform duration-200" :class="{ 'rotate-180': carDropdown }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                         class="absolute left-0 mt-1 w-52 bg-white rounded-xl shadow-xl border border-slate-100 py-2 z-50"
                         style="display: none;">
                        <a href="{{ route('loans.new-car') }}" class="flex items-center gap-2.5 px-4 py-2.5 text-xs font-bold hover:bg-blue-50/80 hover:text-[#1677FF] transition-colors">
                            <span class="w-2 h-2 rounded-full bg-[#12C878]"></span>
                            <span>New Car Loan</span>
                        </a>
                        <a href="{{ route('loans.used-car') }}" class="flex items-center gap-2.5 px-4 py-2.5 text-xs font-bold hover:bg-blue-50/80 hover:text-[#1677FF] transition-colors">
                            <span class="w-2 h-2 rounded-full bg-[#1677FF]"></span>
                            <span>Used Car Loan</span>
                        </a>
                    </div>
                </div>

                <!-- Professional Loan Dropdown -->
                <div class="relative desktop-nav-link" @mouseenter="profDropdown = true" @mouseleave="profDropdown = false">
                    <button type="button" 
                            class="flex items-center gap-1 px-2.5 xl:px-3 py-1.5 rounded-lg transition-colors hover:text-[#1677FF] hover:bg-slate-50 {{ request()->routeIs('loans.doctor', 'loans.ca') ? 'text-[#1677FF] bg-blue-50/80' : '' }}">
                        <span class="whitespace-nowrap">Professional Loan</span>
                        <svg class="w-3.5 h-3.5 transition-transform duration-200" :class="{ 'rotate-180': profDropdown }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                         class="absolute left-0 mt-1 w-52 bg-white rounded-xl shadow-xl border border-slate-100 py-2 z-50"
                         style="display: none;">
                        <a href="{{ route('loans.doctor') }}" class="flex items-center gap-2.5 px-4 py-2.5 text-xs font-bold hover:bg-blue-50/80 hover:text-[#1677FF] transition-colors">
                            <span class="w-2 h-2 rounded-full bg-rose-500"></span>
                            <span>Doctor Loan</span>
                        </a>
                        <a href="{{ route('loans.ca') }}" class="flex items-center gap-2.5 px-4 py-2.5 text-xs font-bold hover:bg-blue-50/80 hover:text-[#1677FF] transition-colors">
                            <span class="w-2 h-2 rounded-full bg-violet-600"></span>
                            <span>CA Loan</span>
                        </a>
                    </div>
                </div>

                <a href="{{ route('partners.index') }}" 
                   class="desktop-nav-link px-2.5 xl:px-3 py-1.5 rounded-lg transition-colors {{ request()->routeIs('partners.*') ? 'text-[#1677FF] bg-blue-50/80' : 'hover:text-[#1677FF] hover:bg-slate-50' }}">
                    Our Partners
                </a>

                <a href="{{ route('pages.about') }}" 
                   class="desktop-nav-link px-2.5 xl:px-3 py-1.5 rounded-lg transition-colors {{ request()->routeIs('pages.about') ? 'text-[#1677FF] bg-blue-50/80' : 'hover:text-[#1677FF] hover:bg-slate-50' }}">
                    About Us
                </a>

                <a href="{{ route('pages.contact') }}" 
                   class="desktop-nav-link px-2.5 xl:px-3 py-1.5 rounded-lg transition-colors {{ request()->routeIs('pages.contact') ? 'text-[#1677FF] bg-blue-50/80' : 'hover:text-[#1677FF] hover:bg-slate-50' }}">
                    Contact
                </a>

            </nav>

            <!-- RIGHT DESKTOP: Apply Now CTA -->
            <div class="hidden lg:flex items-center flex-shrink-0 pl-2">
                <button type="button" 
                        @click="openEnquiry('personal-loan', '', '')"
                        class="whitespace-nowrap inline-flex items-center justify-center gap-1.5 px-5 py-2.5 rounded-full font-extrabold text-xs text-white bg-gradient-to-r from-[#0866E8] to-[#1677FF] hover:from-[#062B59] hover:to-[#0866E8] shadow-md shadow-blue-500/20 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5">
                    <span>Apply Now</span>
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </button>
            </div>

            <!-- RIGHT MOBILE: Exactly matching supplied reference screenshot (3 icons in single horizontal row) -->
            <div class="flex items-center space-x-2.5 lg:hidden">
                
                <!-- Icon 1: Phone / Call Icon -->
                <a href="{{ $brand['phone_url'] ?? 'tel:+917074906556' }}" 
                   aria-label="Call Customer Helpline"
                   class="w-9 h-9 rounded-full bg-slate-50 hover:bg-emerald-50 text-slate-700 hover:text-[#12C878] border border-slate-200/80 flex items-center justify-center transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                </a>

                <!-- Icon 2: Lead Form / User Icon -->
                <button type="button" 
                        @click="openEnquiry()"
                        aria-label="Open Loan Enquiry"
                        class="w-9 h-9 rounded-full bg-slate-50 hover:bg-blue-50 text-slate-700 hover:text-[#1677FF] border border-slate-200/80 flex items-center justify-center transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </button>

                <!-- Icon 3: Hamburger Menu Toggle -->
                <button type="button" 
                        @click="mobileMenuOpen = !mobileMenuOpen"
                        aria-label="Toggle Navigation Menu"
                        class="w-9 h-9 rounded-full bg-slate-50 hover:bg-slate-100 text-slate-800 border border-slate-200/80 flex items-center justify-center transition-colors">
                    <svg x-show="!mobileMenuOpen" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg x-show="mobileMenuOpen" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
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
         class="lg:hidden bg-white border-b border-slate-200 shadow-2xl px-5 pt-3 pb-8 space-y-1.5"
         style="display: none;">
        
        <a href="{{ route('home') }}" class="block px-3 py-2 rounded-xl text-sm font-bold text-slate-800 hover:bg-blue-50 hover:text-[#1677FF]">Home</a>
        <a href="{{ route('loans.personal') }}" class="block px-3 py-2 rounded-xl text-sm font-bold text-slate-800 hover:bg-blue-50 hover:text-[#1677FF]">Personal Loan</a>
        <a href="{{ route('loans.business') }}" class="block px-3 py-2 rounded-xl text-sm font-bold text-slate-800 hover:bg-blue-50 hover:text-[#1677FF]">Business Loan</a>
        
        <div class="pt-2 pb-1 px-3 text-[11px] font-extrabold tracking-wider text-slate-400 uppercase">Car Loans</div>
        <a href="{{ route('loans.new-car') }}" class="block pl-6 pr-3 py-1.5 rounded-lg text-xs font-semibold text-slate-700 hover:bg-blue-50 hover:text-[#1677FF]">New Car Loan</a>
        <a href="{{ route('loans.used-car') }}" class="block pl-6 pr-3 py-1.5 rounded-lg text-xs font-semibold text-slate-700 hover:bg-blue-50 hover:text-[#1677FF]">Used Car Loan</a>

        <div class="pt-2 pb-1 px-3 text-[11px] font-extrabold tracking-wider text-slate-400 uppercase">Professional Loans</div>
        <a href="{{ route('loans.doctor') }}" class="block pl-6 pr-3 py-1.5 rounded-lg text-xs font-semibold text-slate-700 hover:bg-blue-50 hover:text-[#1677FF]">Doctor Loan</a>
        <a href="{{ route('loans.ca') }}" class="block pl-6 pr-3 py-1.5 rounded-lg text-xs font-semibold text-slate-700 hover:bg-blue-50 hover:text-[#1677FF]">CA Loan</a>

        <div class="border-t border-slate-100 my-2"></div>
        <a href="{{ route('partners.index') }}" class="block px-3 py-2 rounded-xl text-sm font-bold text-slate-800 hover:bg-blue-50 hover:text-[#1677FF]">Our Partners</a>
        <a href="{{ route('pages.about') }}" class="block px-3 py-2 rounded-xl text-sm font-bold text-slate-800 hover:bg-blue-50 hover:text-[#1677FF]">About Us</a>
        <a href="{{ route('pages.contact') }}" class="block px-3 py-2 rounded-xl text-sm font-bold text-slate-800 hover:bg-blue-50 hover:text-[#1677FF]">Contact</a>

        <div class="pt-3">
            <button type="button" 
                    @click="mobileMenuOpen = false; openEnquiry('personal-loan')"
                    class="w-full flex items-center justify-center gap-2 py-3.5 rounded-xl font-bold text-xs uppercase tracking-wider text-white bg-gradient-to-r from-[#0866E8] to-[#1677FF] shadow-md">
                <span>Apply for Loan Now</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </button>
        </div>
    </div>
</header>
