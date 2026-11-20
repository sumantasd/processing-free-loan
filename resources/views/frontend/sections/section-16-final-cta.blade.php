<!-- SECTION 16: FINAL CALL TO ACTION -->
<section class="py-16 sm:py-24 bg-gradient-to-r from-[#031B3B] via-[#062B59] to-[#0866E8] text-white relative overflow-hidden">
    
    <!-- Background Glows -->
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        <div class="absolute top-1/2 left-10 -translate-y-1/2 w-96 h-96 bg-[#1677FF]/30 rounded-full blur-3xl"></div>
        <div class="absolute -top-20 right-10 w-[450px] h-[450px] bg-[#12C878]/25 rounded-full blur-3xl animate-pulse-glow"></div>
    </div>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10 space-y-8">
        
        <!-- Tag -->
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-xs sm:text-sm font-semibold tracking-wide text-emerald-300">
            <span class="w-2 h-2 rounded-full bg-[#12C878]"></span>
            <span>Zero Processing Fee Promotional Window Open</span>
        </div>

        <!-- Heading -->
        <h2 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-extrabold text-white tracking-tight leading-tight">
            Ready to Get Your Loan <br class="hidden sm:inline">
            <span class="text-[#12C878] drop-shadow-[0_2px_15px_rgba(18,200,120,0.4)]">
                Without Processing Fee?
            </span>
        </h2>

        <p class="text-base sm:text-lg text-slate-200 max-w-2xl mx-auto leading-relaxed">
            Join thousands of satisfied borrowers across India. Compare instant offers from 23+ premier Banks & NBFCs and get approved with minimal documentation.
        </p>

        <!-- Feature Pills -->
        <div class="flex flex-wrap items-center justify-center gap-4 text-xs sm:text-sm font-semibold text-slate-200">
            <span class="flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10">
                <span class="text-[#12C878]">✓</span> Quick Digital Process
            </span>
            <span class="flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10">
                <span class="text-[#1677FF]">✓</span> 23+ Banks & NBFCs
            </span>
            <span class="flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10">
                <span class="text-[#12C878]">✓</span> Dedicated Loan Advisor
            </span>
        </div>

        <!-- Big Apply Now Button -->
        <div class="pt-4 flex flex-col sm:flex-row items-center justify-center gap-4">
            <button type="button" 
                    @click="openEnquiry()"
                    class="w-full sm:w-auto px-10 py-4.5 rounded-full font-extrabold text-base text-white bg-[#12C878] hover:bg-[#0fa863] shadow-xl shadow-emerald-500/35 transition-all transform hover:scale-105 active:scale-95 flex items-center justify-center gap-2.5">
                <span>Apply for Loan Now</span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
            </button>
            
            <a href="tel:{{ str_replace(' ', '', $brand['phone'] ?? '+919876543210') }}" 
               class="w-full sm:w-auto px-8 py-4 rounded-full font-bold text-sm text-white bg-white/10 hover:bg-white/20 border border-white/20 transition-all flex items-center justify-center gap-2">
                <span>Call Advisor: {{ $brand['phone'] ?? '+91 98765 43210' }}</span>
            </a>
        </div>

    </div>
</section>
