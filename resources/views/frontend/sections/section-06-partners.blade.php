<!-- SECTION 06: BANKING & NBFC PARTNERS -->
<section id="partners-showcase" class="py-16 sm:py-20 bg-white border-y border-slate-100"
         x-data="{ activeTab: 'all' }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="text-center max-w-3xl mx-auto mb-10">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-50 text-emerald-700 text-xs font-bold uppercase tracking-wider mb-3">
                <span class="w-2 h-2 rounded-full bg-[#12C878]"></span>
                <span>Our Lending Partners</span>
            </div>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-[#062B59] tracking-tight">
                Trusted Banks & NBFCs
            </h2>
            <p class="mt-3 text-base text-[#64748B]">
                We work with leading lending institutions across India to help customers explore suitable loan options with exclusive zero processing fee offers.
            </p>

            <!-- Filter Tabs -->
            <div class="mt-8 inline-flex p-1.5 rounded-2xl bg-slate-100/90 border border-slate-200">
                <button type="button" 
                        @click="activeTab = 'all'"
                        :class="activeTab === 'all' ? 'bg-white text-[#062B59] shadow-sm font-bold' : 'text-slate-600 font-medium hover:text-slate-900'"
                        class="px-5 py-2 rounded-xl text-xs sm:text-sm transition-all duration-200">
                    All Partners (23+)
                </button>
                <button type="button" 
                        @click="activeTab = 'banks'"
                        :class="activeTab === 'banks' ? 'bg-white text-[#062B59] shadow-sm font-bold' : 'text-slate-600 font-medium hover:text-slate-900'"
                        class="px-5 py-2 rounded-xl text-xs sm:text-sm transition-all duration-200">
                    Top Banks (7)
                </button>
                <button type="button" 
                        @click="activeTab = 'nbfcs'"
                        :class="activeTab === 'nbfcs' ? 'bg-white text-[#062B59] shadow-sm font-bold' : 'text-slate-600 font-medium hover:text-slate-900'"
                        class="px-5 py-2 rounded-xl text-xs sm:text-sm transition-all duration-200">
                    Leading NBFCs (16)
                </button>
            </div>
        </div>

        <!-- Dynamic Grid of Partner Logos -->
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4 sm:gap-6">
            @foreach($lenders as $lender)
            <div x-show="activeTab === 'all' || (activeTab === 'banks' && '{{ $lender['type'] }}' === 'Bank') || (activeTab === 'nbfcs' && '{{ $lender['type'] }}' === 'NBFC')"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 class="group relative bg-[#F8FAFC] hover:bg-white rounded-2xl p-4 sm:p-5 border border-slate-200/80 hover:border-blue-300 shadow-xs hover:shadow-lg transition-all duration-300 flex flex-col justify-between text-center cursor-pointer"
                 @click="window.location.href='{{ route('partners.show', $lender['slug']) }}'">
                
                <!-- Type Badge -->
                <div class="flex justify-between items-center mb-3">
                    <span class="text-[10px] font-extrabold uppercase px-2 py-0.5 rounded-full {{ $lender['type'] === 'Bank' ? 'bg-blue-100/80 text-[#0866E8]' : 'bg-emerald-100/80 text-[#12C878]' }}">
                        {{ $lender['type'] }}
                    </span>
                    <span class="text-[10px] text-slate-400 font-semibold">
                        {{ count($lender['products']) }} Loans
                    </span>
                </div>

                <!-- Branded Typography / Logo Representation -->
                <div class="py-4 flex flex-col items-center justify-center">
                    <div class="h-10 flex items-center justify-center font-extrabold text-base sm:text-lg tracking-tight transition-transform duration-200 group-hover:scale-105"
                         style="color: {{ $lender['accent'] ?? '#062B59' }}">
                        {{ $lender['logo_text'] ?? $lender['name'] }}
                    </div>
                    <div class="text-[11px] font-semibold text-slate-500 mt-1 truncate max-w-full">
                        {{ $lender['name'] }}
                    </div>
                </div>

                <!-- Footer with Interest Starting Rate -->
                <div class="mt-2 pt-2 border-t border-slate-200/60 flex items-center justify-between text-[11px]">
                    <span class="text-slate-400 font-medium">From</span>
                    <span class="font-bold text-[#102B50] group-hover:text-[#1677FF] transition-colors">
                        {{ explode(' ', $lender['interest_range'])[0] ?? '10.50%' }}
                    </span>
                </div>

            </div>
            @endforeach
        </div>

        <!-- View All Partners CTA -->
        <div class="mt-12 text-center flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="{{ route('partners.index') }}" 
               class="inline-flex items-center gap-2 px-6 py-3 rounded-xl font-bold text-sm text-[#062B59] bg-slate-100 hover:bg-slate-200 hover:text-[#1677FF] transition-all">
                <span>Explore All Banks & NBFC Details</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
            <button type="button" 
                    @click="openEnquiry()"
                    class="inline-flex items-center gap-2 px-6 py-3 rounded-xl font-bold text-sm text-white bg-[#1677FF] hover:bg-[#0866E8] shadow-md shadow-blue-500/20 transition-all">
                <span>Check Best Lender Match</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </button>
        </div>

        <p class="text-center text-xs text-slate-400 mt-6 max-w-2xl mx-auto">
            Logos, brand names and trademarks belong to their respective Banks and NBFCs. ProcessingFreeLoan.com facilitates credit matching as an authorized loan channel aggregator.
        </p>

    </div>
</section>
