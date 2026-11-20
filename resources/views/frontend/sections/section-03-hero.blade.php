<!-- SECTION 03: PREMIUM HERO SECTION (DESKTOP LOCKED + MOBILE EXACT MATCH TO REFERENCE) -->
<section class="relative bg-gradient-to-b from-[#031B3B] via-[#062B59] to-[#042045] text-white pt-6 pb-12 sm:pt-10 sm:pb-16 lg:pt-12 lg:pb-28 overflow-hidden w-full">
    
    <!-- Ambient Background Glows & Architectural Lines -->
    <div class="absolute inset-0 pointer-events-none overflow-hidden max-w-full">
        <div class="absolute -top-40 -left-40 w-72 sm:w-96 h-72 sm:h-96 bg-[#1677FF]/20 rounded-full blur-3xl"></div>
        <div class="absolute top-1/3 -right-20 w-80 sm:w-[500px] h-80 sm:h-[500px] bg-[#12C878]/15 rounded-full blur-3xl animate-pulse-glow"></div>
        <div class="absolute -bottom-20 left-1/3 w-80 sm:w-[600px] h-60 sm:h-72 bg-[#0866E8]/20 rounded-full blur-3xl"></div>
        <svg class="absolute inset-0 w-full h-full opacity-[0.03]" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="hero-grid" width="48" height="48" patternUnits="userSpaceOnUse">
                    <path d="M 48 0 L 0 0 0 48" fill="none" stroke="#FFFFFF" stroke-width="1"/>
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#hero-grid)" />
        </svg>
    </div>

    <!-- ========================================== -->
    <!-- 1. MOBILE HERO (STRICTLY MATCHING REFERENCE) -->
    <!-- ========================================== -->
    <div class="block lg:hidden px-4 sm:px-6 relative z-10 w-full max-w-lg mx-auto text-center">
        
        <!-- Top Badge -->
        <div class="inline-flex items-center justify-center px-4 py-1.5 rounded-full bg-[#12C878]/15 border border-[#12C878]/30 text-[11px] font-extrabold tracking-wider uppercase text-[#12C878] mb-4 shadow-xs">
            <span>YOUR TRUSTED FINANCIAL PARTNER</span>
        </div>

        <!-- Main Heading (Centered, Green Highlight, Curved Accent Underline) -->
        <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight text-white leading-[1.2] text-center">
            Get Your Loan <span class="text-[#12C878]">Without</span><br>
            <span class="text-[#12C878] relative inline-block mt-0.5">
                Processing Fee
                <svg class="w-full h-2 text-[#12C878] -mt-0.5" viewBox="0 0 200 12" fill="none" preserveAspectRatio="none">
                    <path d="M2 9C55 2 145 2 198 9" stroke="currentColor" stroke-width="3.5" stroke-linecap="round"/>
                </svg>
            </span>
        </h1>

        <!-- Subtitle / Description Paragraph -->
        <p class="text-slate-200 text-xs sm:text-sm leading-relaxed max-w-sm mx-auto text-center mt-3.5 mb-6 font-normal">
            Compare and explore suitable loan options from leading Banks &amp; NBFCs. Discover competitive offers, explore eligibility and get expert assistance throughout your loan journey.
        </p>

        <!-- 4 Translucent Feature Cards (2x2 Grid per Reference) -->
        <div class="grid grid-cols-2 gap-2.5 sm:gap-3 my-6 text-left">
            
            <!-- Card 1: Multiple Lenders (Blue Icon Circle + Wallet/Bank) -->
            <div class="bg-white/10 backdrop-blur-md border border-white/15 rounded-2xl p-3 flex items-center gap-2.5 shadow-sm">
                <div class="w-9 h-9 rounded-full bg-[#0866E8] text-white flex items-center justify-center flex-shrink-0 shadow-sm">
                    <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                    </svg>
                </div>
                <div class="min-w-0">
                    <div class="text-xs font-extrabold text-white leading-tight">Multiple<br>Lenders</div>
                </div>
            </div>

            <!-- Card 2: Simple Process (Green Icon Circle + Zap) -->
            <div class="bg-white/10 backdrop-blur-md border border-white/15 rounded-2xl p-3 flex items-center gap-2.5 shadow-sm">
                <div class="w-9 h-9 rounded-full bg-[#12C878] text-white flex items-center justify-center flex-shrink-0 shadow-sm">
                    <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <div class="min-w-0">
                    <div class="text-xs font-extrabold text-white leading-tight">Simple<br>Process</div>
                </div>
            </div>

            <!-- Card 3: Expert Guidance (Purple Icon Circle + Headset) -->
            <div class="bg-white/10 backdrop-blur-md border border-white/15 rounded-2xl p-3 flex items-center gap-2.5 shadow-sm">
                <div class="w-9 h-9 rounded-full bg-[#8B5CF6] text-white flex items-center justify-center flex-shrink-0 shadow-sm">
                    <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
                <div class="min-w-0">
                    <div class="text-xs font-extrabold text-white leading-tight">Expert<br>Guidance</div>
                </div>
            </div>

            <!-- Card 4: Secure Application (Teal/Emerald Icon Circle + Shield Check) -->
            <div class="bg-white/10 backdrop-blur-md border border-white/15 rounded-2xl p-3 flex items-center gap-2.5 shadow-sm">
                <div class="w-9 h-9 rounded-full bg-[#10B981] text-white flex items-center justify-center flex-shrink-0 shadow-sm">
                    <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <div class="min-w-0">
                    <div class="text-xs font-extrabold text-white leading-tight">Secure<br>Application</div>
                </div>
            </div>

        </div>

        <!-- Hero Dual CTA Buttons (Orange Apply Now + White Compare Loans) -->
        <div class="flex items-center justify-center gap-3 mt-6 mb-2">
            
            <!-- Primary Action: Apply Now (Orange #F4511E) -->
            <button type="button" 
                    @click="openEnquiry('personal-loan')"
                    class="flex-1 h-12 rounded-2xl bg-gradient-to-r from-[#F4511E] to-[#e64a19] text-white font-extrabold text-sm flex items-center justify-center gap-1.5 shadow-lg shadow-orange-500/30 active:scale-95 transition-all text-center">
                <span>Apply Now</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
            </button>

            <!-- Secondary Action: Compare Loans (White Button with Navy text & Scale Icon) -->
            <a href="#loan-products" 
               class="flex-1 h-12 rounded-2xl bg-white text-[#062B59] font-extrabold text-sm flex items-center justify-center gap-1.5 shadow-md active:scale-95 transition-all text-center">
                <svg class="w-4 h-4 text-[#062B59]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"/>
                </svg>
                <span>Compare Loans</span>
            </a>

        </div>

        <!-- Mobile Hero Customer Image Container (Appears on Mobile & Matches Desktop Customer Asset) -->
        <div class="relative mt-6 mb-2 max-w-xs sm:max-w-sm mx-auto">
            <!-- Ambient Glow behind image -->
            <div class="absolute inset-0 bg-gradient-to-tr from-[#0866E8]/30 to-[#12C878]/25 rounded-3xl filter blur-xl transform scale-95 pointer-events-none"></div>

            <div class="relative rounded-3xl overflow-hidden border border-white/20 bg-gradient-to-b from-white/10 to-transparent shadow-2xl">
                <img src="{{ asset('images/hero-man.jpg') }}" 
                     alt="Indian professional holding smartphone exploring loan offers" 
                     class="w-full h-64 sm:h-72 object-cover object-top filter brightness-95 contrast-105">
                <div class="absolute inset-0 bg-gradient-to-t from-[#031B3B]/90 via-[#031B3B]/20 to-transparent"></div>
                
                <!-- Floating Mobile Status Badge on Image -->
                <div class="absolute bottom-3 left-3 right-3 bg-white/95 backdrop-blur-md rounded-2xl p-2.5 shadow-lg flex items-center justify-between border border-white/40">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#12C878] animate-pulse"></span>
                        <div class="text-left">
                            <div class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Status</div>
                            <div class="text-xs font-extrabold text-[#062B59]">Loan Approved</div>
                        </div>
                    </div>
                    <div class="text-right">
                        <div class="text-[10px] font-bold text-[#12C878] uppercase">Zero Fee Priority</div>
                        <div class="text-xs font-extrabold text-[#1677FF]">Up to ₹50 Lakhs</div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- ========================================== -->
    <!-- 2. DESKTOP HERO (LOCKED & PRESERVED EXACTLY) -->
    <!-- ========================================== -->
    <div class="hidden lg:block max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
        <div class="grid grid-cols-12 gap-8 items-center">
            
            <!-- Left Column: Hero Content & Value Props -->
            <div class="col-span-7 space-y-6 text-left">
                
                <!-- Pill Badge -->
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/15 text-xs sm:text-sm font-bold tracking-wider uppercase text-emerald-300">
                    <span class="w-2 h-2 rounded-full bg-[#12C878] animate-ping"></span>
                    <span>YOUR TRUSTED FINANCIAL PARTNER</span>
                </div>

                <!-- Main Heading -->
                <h1 class="text-4xl md:text-5xl lg:text-[54px] font-extrabold tracking-tight text-white leading-[1.15]">
                    Get Your Loan <br>
                    <span class="text-[#12C878] drop-shadow-[0_2px_15px_rgba(18,200,120,0.35)]">
                        Without Processing Fee
                    </span>
                </h1>

                <!-- Description -->
                <p class="text-base sm:text-lg text-slate-300 max-w-2xl leading-relaxed font-normal">
                    Compare and explore suitable loan options from leading Banks &amp; NBFCs. Discover competitive offers, explore eligibility and get expert assistance throughout your loan journey.
                </p>

                <!-- 4 Feature Badges (Matching Original Desktop Specification) -->
                <div class="pt-2 grid grid-cols-4 gap-3 text-xs font-semibold text-slate-200">
                    
                    <div class="flex items-center gap-2 p-2.5 rounded-xl bg-white/5 border border-white/10 backdrop-blur-sm">
                        <div class="w-6 h-6 rounded-lg bg-[#1677FF]/20 flex items-center justify-center text-[#1677FF] flex-shrink-0">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                        </div>
                        <span class="truncate">Multiple Lenders</span>
                    </div>

                    <div class="flex items-center gap-2 p-2.5 rounded-xl bg-white/5 border border-white/10 backdrop-blur-sm">
                        <div class="w-6 h-6 rounded-lg bg-[#12C878]/20 flex items-center justify-center text-[#12C878] flex-shrink-0">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        </div>
                        <span class="truncate">Simple Process</span>
                    </div>

                    <div class="flex items-center gap-2 p-2.5 rounded-xl bg-white/5 border border-white/10 backdrop-blur-sm">
                        <div class="w-6 h-6 rounded-lg bg-indigo-500/20 flex items-center justify-center text-indigo-400 flex-shrink-0">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                        </div>
                        <span class="truncate">Expert Guidance</span>
                    </div>

                    <div class="flex items-center gap-2 p-2.5 rounded-xl bg-white/5 border border-white/10 backdrop-blur-sm">
                        <div class="w-6 h-6 rounded-lg bg-emerald-500/20 flex items-center justify-center text-emerald-400 flex-shrink-0">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        </div>
                        <span class="truncate">Secure Application</span>
                    </div>

                </div>

            </div>

            <!-- Right Column: Visual Composition with Customer & Floating Cards -->
            <div class="col-span-5 relative flex justify-center items-center">
                
                <div class="relative w-full">
                    
                    <!-- Decorative Behind Circle Glow -->
                    <div class="absolute inset-0 bg-gradient-to-tr from-[#0866E8]/30 to-[#12C878]/30 rounded-3xl filter blur-2xl transform scale-95 -rotate-3"></div>

                    <!-- Main Customer Image Container -->
                    <div class="relative rounded-3xl overflow-hidden border border-white/15 bg-gradient-to-b from-white/10 to-transparent shadow-2xl backdrop-blur-sm">
                        <img src="{{ asset('images/hero-man.jpg') }}" 
                             alt="Indian professional holding smartphone exploring loan offers" 
                             class="w-full h-[490px] object-cover object-top filter brightness-95 contrast-105">
                        
                        <div class="absolute inset-0 bg-gradient-to-t from-[#031B3B] via-transparent to-transparent opacity-75"></div>
                    </div>

                    <!-- Floating Card 1: Top Left / Upper Floating Badge -->
                    <div class="absolute -top-4 -left-6 bg-white text-[#102B50] rounded-2xl shadow-xl px-4 py-3 border border-slate-100 flex items-center gap-3 animate-float">
                        <div class="w-10 h-10 rounded-xl bg-emerald-100 text-[#12C878] flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="text-[10px] font-extrabold text-[#12C878] tracking-wider uppercase">Multiple Lenders</div>
                            <div class="text-sm font-extrabold text-[#062B59]">Up to ₹50 Lakhs</div>
                        </div>
                    </div>

                    <!-- Floating Card 2: Bottom Right Floating Feature Checklist Card -->
                    <div class="absolute -bottom-5 -right-6 bg-white/95 backdrop-blur-md text-[#102B50] rounded-2xl shadow-2xl p-4 border border-white/50 space-y-2 max-w-[210px]">
                        <div class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Trusted Advantages</div>
                        <div class="space-y-1.5 text-xs font-semibold">
                            <div class="flex items-center gap-2 text-slate-800">
                                <span class="w-4 h-4 rounded-full bg-emerald-100 text-[#12C878] flex items-center justify-center flex-shrink-0 text-[10px] font-extrabold">✓</span>
                                <span>No Processing Fee</span>
                            </div>
                            <div class="flex items-center gap-2 text-slate-800">
                                <span class="w-4 h-4 rounded-full bg-blue-100 text-[#1677FF] flex items-center justify-center flex-shrink-0 text-[10px] font-extrabold">✓</span>
                                <span>Simple Process</span>
                            </div>
                            <div class="flex items-center gap-2 text-slate-800">
                                <span class="w-4 h-4 rounded-full bg-indigo-100 text-[#0866E8] flex items-center justify-center flex-shrink-0 text-[10px] font-extrabold">✓</span>
                                <span>Expert Guidance</span>
                            </div>
                            <div class="flex items-center gap-2 text-slate-800">
                                <span class="w-4 h-4 rounded-full bg-emerald-100 text-[#12C878] flex items-center justify-center flex-shrink-0 text-[10px] font-extrabold">✓</span>
                                <span>Secure Application</span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</section>
