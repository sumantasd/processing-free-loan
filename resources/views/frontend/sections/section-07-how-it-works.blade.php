<!-- SECTION 07: HOW IT WORKS -->
<section id="how-it-works" class="py-16 sm:py-20 lg:py-24 bg-[#F5F9FF] relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-16">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-blue-100 text-[#1677FF] text-xs font-bold uppercase tracking-wider mb-3">
                <span>How It Works</span>
            </div>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#062B59] tracking-tight">
                Get Your Loan in 5 <span class="text-[#1677FF]">Simple Steps</span>
            </h2>
            <p class="mt-4 text-base sm:text-lg text-[#64748B]">
                A quick, transparent and 100% digital process to get funds disbursed without processing fee hurdles.
            </p>
        </div>

        <!-- 5 Steps Process Cards & Connecting Arrows -->
        <div class="relative">
            
            <!-- Connecting Line on Desktop -->
            <div class="hidden lg:block absolute top-1/2 left-10 right-10 h-0.5 bg-gradient-to-r from-blue-200 via-emerald-200 to-blue-200 -translate-y-12 z-0"></div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-3.5 sm:gap-4 lg:gap-6 relative z-10">
                @php
                    $stepIcons = [
                        '01' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
                        '02' => 'M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z',
                        '03' => 'M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12',
                        '04' => 'M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z',
                        '05' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
                    ];
                @endphp

                @foreach($howItWorks as $step)
                <div class="group bg-white rounded-2xl p-4 sm:p-5 lg:p-6 shadow-sm hover:shadow-xl border border-slate-100 hover:border-emerald-200 transition-all duration-300 flex flex-col justify-between text-center transform hover:-translate-y-1.5 sm:hover:-translate-y-2">
                    
                    <div>
                        <!-- Step Number Badge (Compact on mobile, full size on desktop) -->
                        <div class="w-10 h-10 sm:w-12 sm:h-12 lg:w-14 lg:h-14 mx-auto rounded-xl sm:rounded-2xl bg-gradient-to-tr from-[#062B59] to-[#1677FF] text-white flex items-center justify-center font-extrabold text-sm sm:text-base lg:text-lg shadow-md group-hover:from-[#12C878] group-hover:to-[#0fa863] transition-all duration-300 mb-3 sm:mb-4 lg:mb-5">
                            {{ $step['step'] }}
                        </div>

                        <!-- Icon Container -->
                        <div class="w-8 h-8 sm:w-9 sm:h-9 lg:w-10 lg:h-10 mx-auto rounded-lg sm:rounded-xl bg-blue-50 text-[#1677FF] group-hover:bg-emerald-50 group-hover:text-[#12C878] transition-colors duration-300 flex items-center justify-center mb-2 sm:mb-3 lg:mb-4">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $stepIcons[$step['step']] ?? 'M12 6v6m0 0v6m0-6h6m-6 0H6' }}"/>
                            </svg>
                        </div>

                        <!-- Step Title -->
                        <h3 class="text-sm sm:text-base font-extrabold text-[#062B59] group-hover:text-[#1677FF] transition-colors mb-1.5 sm:mb-2 leading-snug">
                            {{ $step['title'] }}
                        </h3>

                        <!-- Step Description -->
                        <p class="text-xs text-[#64748B] leading-relaxed">
                            {{ $step['desc'] }}
                        </p>
                    </div>

                    <!-- Micro indicator -->
                    <div class="mt-3 pt-2.5 sm:mt-4 sm:pt-3 border-t border-slate-100 flex items-center justify-center gap-1 text-[10px] sm:text-[11px] font-bold text-slate-400 group-hover:text-[#12C878] transition-colors">
                        <span>Step {{ $step['step'] }}</span>
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </div>

                </div>
                @endforeach

            </div>

        </div>

        <!-- Call to Action Banner inside Section -->
        <div class="mt-14 p-6 sm:p-8 rounded-3xl bg-gradient-to-r from-[#031B3B] to-[#0866E8] text-white flex flex-col md:flex-row items-center justify-between gap-6 shadow-xl">
            <div class="space-y-1 text-center md:text-left">
                <h4 class="text-xl sm:text-2xl font-extrabold">Ready to start your digital application?</h4>
                <p class="text-xs sm:text-sm text-blue-100">Takes less than 2 minutes. 100% paperless loan approval assistance.</p>
            </div>
            <button type="button" 
                    @click="openEnquiry()"
                    class="px-8 py-3.5 rounded-full font-bold text-sm bg-[#12C878] text-white hover:bg-[#0fa863] shadow-lg shadow-emerald-500/25 transition-all transform hover:scale-105 active:scale-95 flex-shrink-0">
                Start Loan Enquiry Now
            </button>
        </div>

    </div>
</section>
