<!-- MOBILE BOTTOM STICKY ACTION BAR (Strictly Matching Primary Reference Image) -->
<aside class="fixed bottom-0 inset-x-0 z-40 lg:hidden bg-white/98 backdrop-blur-md border-t border-slate-200/90 shadow-[0_-4px_25px_rgba(0,0,0,0.08)] px-3 py-2.5"
       aria-label="Quick mobile loan actions"
       style="padding-bottom: max(0.625rem, env(safe-area-inset-bottom));">
    <div class="max-w-md mx-auto flex items-center gap-2">
        
        <!-- Call Button: White with Orange Phone Icon + Call Popover (Both Numbers) -->
        <div class="relative flex-shrink-0" x-data="{ callMenu: false }" @click.away="callMenu = false">
            <button type="button" 
                    @click="callMenu = !callMenu"
                    class="h-11 px-3 sm:px-4 rounded-xl bg-white border border-slate-200/90 text-[#062B59] hover:bg-slate-50 flex items-center justify-center gap-1.5 shadow-2xs active:scale-95 transition-all cursor-pointer"
                    aria-label="Call Customer Helpline">
                <svg class="w-4 h-4 text-[#F4511E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                </svg>
                <span class="text-xs font-extrabold text-[#062B59]">Call</span>
            </button>

            <!-- Call Options Popover -->
            <div x-show="callMenu" 
                 x-transition:enter="transition ease-out duration-150"
                 x-transition:enter-start="opacity-0 translate-y-2 scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                 x-transition:leave="transition ease-in duration-100"
                 x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                 x-transition:leave-end="opacity-0 translate-y-2 scale-95"
                 class="absolute bottom-14 left-0 w-56 bg-white rounded-2xl shadow-2xl border border-slate-200 p-2 z-50 space-y-1.5"
                 style="display: none;">
                <div class="px-2 py-1 text-[10px] font-extrabold uppercase tracking-wider text-slate-400">
                    Select Helpline
                </div>
                <a href="{{ $brand['phone_primary_url'] ?? $brand['phone_url'] ?? 'tel:+919800210503' }}" 
                   class="flex items-center gap-2.5 px-3 py-2 rounded-xl bg-emerald-50 text-emerald-800 hover:bg-emerald-100 text-xs font-bold transition-colors">
                    <div class="w-6 h-6 rounded-full bg-[#12C878] text-white flex items-center justify-center flex-shrink-0">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    </div>
                    <div>
                        <div class="text-[11px] leading-tight font-extrabold">{{ $brand['phone_primary'] ?? $brand['phone'] ?? '+91 98002 10503' }}</div>
                        <div class="text-[9px] text-emerald-600 font-medium">Primary Helpline</div>
                    </div>
                </a>
                <a href="{{ $brand['phone_secondary_url'] ?? 'tel:+917679096826' }}" 
                   class="flex items-center gap-2.5 px-3 py-2 rounded-xl bg-blue-50 text-blue-800 hover:bg-blue-100 text-xs font-bold transition-colors">
                    <div class="w-6 h-6 rounded-full bg-[#1677FF] text-white flex items-center justify-center flex-shrink-0">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    </div>
                    <div>
                        <div class="text-[11px] leading-tight font-extrabold">{{ $brand['phone_secondary'] ?? '+91 76790 96826' }}</div>
                        <div class="text-[9px] text-blue-600 font-medium">Secondary Helpline</div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Compare Loans Button (Deep Navy #062B59 + Scale Icon - Per Reference) -->
        <a href="{{ request()->routeIs('home') ? '#loan-products' : route('partners.index') }}" 
           class="flex-1 h-11 rounded-xl bg-[#062B59] hover:bg-[#031B3B] active:scale-[0.98] text-white font-extrabold text-xs sm:text-sm flex items-center justify-center gap-1.5 shadow-sm transition-all text-center">
            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"/>
            </svg>
            <span class="whitespace-nowrap">Compare Loans</span>
        </a>

        <!-- Apply Now Button (Accent Orange #F4511E + Sparkles Icon - Per Reference) -->
        <button type="button" 
                @click="$dispatch('open-modal', { loan: 'personal-loan' })"
                class="flex-1 h-11 rounded-xl bg-gradient-to-r from-[#F4511E] to-[#e64a19] hover:from-[#e64a19] hover:to-[#d84315] active:scale-[0.98] text-white font-extrabold text-xs sm:text-sm flex items-center justify-center gap-1.5 shadow-md shadow-orange-500/25 transition-all text-center">
            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2l2.4 7.2L22 12l-7.6 2.8L12 22l-2.4-7.2L2 12l7.6-2.8L12 2z"/>
            </svg>
            <span class="whitespace-nowrap">Apply Now</span>
        </button>

    </div>
</aside>
