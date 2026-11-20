<!-- SECTION 03: PREMIUM HERO SECTION -->
<section class="relative bg-gradient-to-b from-[#031B3B] via-[#062B59] to-[#042045] text-white pt-12 pb-24 md:pt-16 md:pb-32 overflow-hidden">
    
    <!-- Ambient Background Glows & Architectural Lines -->
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        <div class="absolute -top-40 -left-40 w-96 h-96 bg-[#1677FF]/20 rounded-full blur-3xl"></div>
        <div class="absolute top-1/3 -right-20 w-[500px] h-[500px] bg-[#12C878]/15 rounded-full blur-3xl animate-pulse-glow"></div>
        <div class="absolute -bottom-20 left-1/3 w-[600px] h-72 bg-[#0866E8]/20 rounded-full blur-3xl"></div>
        <!-- Decorative Grid Lines -->
        <svg class="absolute inset-0 w-full h-full opacity-[0.03]" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="hero-grid" width="48" height="48" patternUnits="userSpaceOnUse">
                    <path d="M 48 0 L 0 0 0 48" fill="none" stroke="#FFFFFF" stroke-width="1"/>
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#hero-grid)" />
        </svg>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
            
            <!-- Left Column: Hero Content & Value Props -->
            <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                
                <!-- Pill Badge -->
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/15 text-xs sm:text-sm font-semibold tracking-wide text-emerald-300">
                    <span class="w-2 h-2 rounded-full bg-[#12C878] animate-ping"></span>
                    <svg class="w-4 h-4 text-[#12C878]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                    <span>Trusted Loan Partner</span>
                </div>

                <!-- Main Heading -->
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-[56px] font-extrabold tracking-tight text-white leading-[1.15]">
                    Get Your Loan <br class="hidden sm:inline">
                    <span class="text-[#12C878] drop-shadow-[0_2px_15px_rgba(18,200,120,0.35)]">
                        Without Processing Fee
                    </span>
                </h1>

                <!-- Subtitle -->
                <p class="text-base sm:text-lg text-slate-300 max-w-2xl mx-auto lg:mx-0 leading-relaxed font-normal">
                    Compare and explore loan options from leading Banks & NBFCs. Discover suitable loan offers, competitive interest rates and a hassle-free application process — all in one place.
                </p>

                <!-- Value Proposition Badges -->
                <div class="pt-2 flex flex-wrap items-center justify-center lg:justify-start gap-3 sm:gap-4 text-xs sm:text-sm font-medium text-slate-200">
                    
                    <div class="flex items-center gap-2 px-3.5 py-2 rounded-xl bg-white/5 border border-white/10 backdrop-blur-sm">
                        <div class="w-6 h-6 rounded-lg bg-[#12C878]/20 flex items-center justify-center text-[#12C878]">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <span>Quick Approval</span>
                    </div>

                    <div class="flex items-center gap-2 px-3.5 py-2 rounded-xl bg-white/5 border border-white/10 backdrop-blur-sm">
                        <div class="w-6 h-6 rounded-lg bg-[#1677FF]/20 flex items-center justify-center text-[#1677FF]">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <span>Competitive Rates</span>
                    </div>

                    <div class="flex items-center gap-2 px-3.5 py-2 rounded-xl bg-white/5 border border-white/10 backdrop-blur-sm">
                        <div class="w-6 h-6 rounded-lg bg-emerald-500/20 flex items-center justify-center text-emerald-400">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                        <span>Safe & Secure</span>
                    </div>

                </div>

            </div>

            <!-- Right Column: Visual Composition with Customer & Floating Cards -->
            <div class="lg:col-span-5 relative flex justify-center items-center">
                
                <div class="relative w-full max-w-md sm:max-w-lg lg:max-w-none">
                    
                    <!-- Decorative Behind Circle Glow -->
                    <div class="absolute inset-0 bg-gradient-to-tr from-[#0866E8]/30 to-[#12C878]/30 rounded-3xl filter blur-2xl transform scale-95 -rotate-3"></div>

                    <!-- Main Customer Image Container -->
                    <div class="relative rounded-3xl overflow-hidden border border-white/15 bg-gradient-to-b from-white/10 to-transparent shadow-2xl backdrop-blur-sm">
                        <img src="{{ asset('images/hero-man.jpg') }}" 
                             alt="Happy customer with approved loan without processing fee" 
                             class="w-full h-[420px] sm:h-[480px] lg:h-[500px] object-cover object-top filter brightness-95 contrast-105">
                        
                        <!-- Gradient Overlay at bottom for seamless blending -->
                        <div class="absolute inset-0 bg-gradient-to-t from-[#031B3B] via-transparent to-transparent opacity-80"></div>
                    </div>

                    <!-- Floating Card 1: Top Left / Upper Floating Badge -->
                    <div class="absolute -top-5 -left-4 sm:-left-6 bg-white text-[#102B50] rounded-2xl shadow-xl px-4 py-3 border border-slate-100 flex items-center gap-3 animate-float">
                        <div class="w-10 h-10 rounded-xl bg-emerald-100 text-[#12C878] flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="text-xs font-bold text-[#12C878] tracking-wider uppercase">Loan Approved!</div>
                            <div class="text-sm font-extrabold text-[#062B59]">Up to ₹50 Lakhs</div>
                        </div>
                    </div>

                    <!-- Floating Card 2: Bottom Right Floating Feature Checklist Card -->
                    <div class="absolute -bottom-6 -right-4 sm:-right-6 bg-white/95 backdrop-blur-md text-[#102B50] rounded-2xl shadow-2xl p-4 border border-white/50 space-y-2 max-w-[210px] hidden sm:block">
                        <div class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Exclusive Advantage</div>
                        <div class="space-y-1.5 text-xs font-semibold">
                            <div class="flex items-center gap-2 text-slate-800">
                                <span class="w-4 h-4 rounded-full bg-emerald-100 text-[#12C878] flex items-center justify-center flex-shrink-0 text-[10px] font-extrabold">✓</span>
                                <span>No Processing Fee</span>
                            </div>
                            <div class="flex items-center gap-2 text-slate-800">
                                <span class="w-4 h-4 rounded-full bg-blue-100 text-[#1677FF] flex items-center justify-center flex-shrink-0 text-[10px] font-extrabold">✓</span>
                                <span>Multiple Banks & NBFCs</span>
                            </div>
                            <div class="flex items-center gap-2 text-slate-800">
                                <span class="w-4 h-4 rounded-full bg-emerald-100 text-[#12C878] flex items-center justify-center flex-shrink-0 text-[10px] font-extrabold">✓</span>
                                <span>Simple Application</span>
                            </div>
                            <div class="flex items-center gap-2 text-slate-800">
                                <span class="w-4 h-4 rounded-full bg-indigo-100 text-[#0866E8] flex items-center justify-center flex-shrink-0 text-[10px] font-extrabold">✓</span>
                                <span>Expert Guidance</span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
</section>
