<!-- MOBILE BOTTOM STICKY ACTION BAR (Matches Mobile Screenshot Reference) -->
<aside class="fixed bottom-0 inset-x-0 z-40 lg:hidden bg-white/95 backdrop-blur-md border-t border-slate-200/90 shadow-[0_-4px_20px_rgba(0,0,0,0.08)] px-3 py-2.5"
       aria-label="Quick mobile loan actions"
       style="padding-bottom: max(0.625rem, env(safe-area-inset-bottom));">
    <div class="max-w-md mx-auto flex items-center gap-2">
        
        <!-- Call Button -->
        <a href="{{ $brand['phone_url'] ?? 'tel:+917074906556' }}" 
           class="w-12 h-11 rounded-xl bg-white border border-slate-200 text-[#062B59] hover:bg-slate-50 flex items-center justify-center flex-shrink-0 shadow-xs transition-colors"
           aria-label="Call Customer Helpline">
            <svg class="w-5 h-5 text-[#F4511E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
            </svg>
        </a>

        <!-- Compare Loans Button (Deep Navy #062B59) -->
        <a href="{{ request()->routeIs('home') ? '#lenders-carousel' : route('partners.index') }}" 
           class="flex-1 h-11 rounded-xl bg-[#062B59] hover:bg-[#031B3B] active:scale-[0.98] text-white font-extrabold text-xs sm:text-sm flex items-center justify-center gap-1.5 shadow-sm transition-all text-center">
            <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
            </svg>
            <span class="whitespace-nowrap">Compare Loans</span>
        </a>

        <!-- Apply Now Button (Accent Orange #F4511E) -->
        <button type="button" 
                @click="$dispatch('open-modal', { loan: 'personal-loan' })"
                class="flex-1 h-11 rounded-xl bg-[#F4511E] hover:bg-[#d63b0a] active:scale-[0.98] text-white font-extrabold text-xs sm:text-sm flex items-center justify-center gap-1.5 shadow-md shadow-orange-500/25 transition-all text-center">
            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
            </svg>
            <span class="whitespace-nowrap">Apply Now</span>
        </button>

    </div>
</aside>
