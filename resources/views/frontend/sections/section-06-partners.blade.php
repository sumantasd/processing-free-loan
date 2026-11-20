<!-- SECTION 04: BANK & NBFC TEXT CAROUSEL (STRICT TEXT-BASED ONLY - 7-8 PER SLIDE DESKTOP) -->
<section id="lenders-carousel" class="py-14 sm:py-20 bg-white border-y border-slate-100"
         x-data="{
             selectedCategory: 'all',
             currentSlide: 0,
             cardsPerSlide: 7,
             isPaused: false,
             intervalId: null,
             totalItems: {{ count($lenders) }},

             updateCardsPerSlide() {
                 if (window.innerWidth >= 1280) {
                     this.cardsPerSlide = 7;
                 } else if (window.innerWidth >= 1024) {
                     this.cardsPerSlide = 6;
                 } else if (window.innerWidth >= 768) {
                     this.cardsPerSlide = 4;
                 } else {
                     this.cardsPerSlide = 2;
                 }
             },

             get maxSlide() {
                 return Math.max(0, this.totalItems - this.cardsPerSlide);
             },

             next() {
                 if (this.currentSlide >= this.maxSlide) {
                     this.currentSlide = 0;
                 } else {
                     this.currentSlide++;
                 }
             },

             prev() {
                 if (this.currentSlide <= 0) {
                     this.currentSlide = this.maxSlide;
                 } else {
                     this.currentSlide--;
                 }
             },

             init() {
                 this.updateCardsPerSlide();
                 window.addEventListener('resize', () => {
                     this.updateCardsPerSlide();
                     if (this.currentSlide > this.maxSlide) this.currentSlide = this.maxSlide;
                 });

                 // Auto slide every 3.5 seconds
                 this.intervalId = setInterval(() => {
                     if (!this.isPaused) {
                         this.next();
                     }
                 }, 3500);
             }
         }"
         @mouseenter="isPaused = true"
         @mouseleave="isPaused = false">
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="text-center max-w-3xl mx-auto mb-8">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-blue-50 text-[#1677FF] text-xs font-extrabold uppercase tracking-wider mb-2">
                <span>Verified Financial Institutions</span>
            </div>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-[#062B59] tracking-tight">
                Explore Banks & NBFCs
            </h2>
            <p class="mt-2 text-sm sm:text-base text-[#64748B]">
                Explore financial institutions offering different loan solutions from our authorized lender network.
            </p>

            <!-- Excel Product Category Filter Tabs -->
            <div class="mt-6 flex flex-wrap items-center justify-center gap-2">
                <button type="button" 
                        @click="selectedCategory = 'all'; currentSlide = 0"
                        :class="selectedCategory === 'all' ? 'bg-[#062B59] text-white shadow-sm' : 'bg-slate-100 text-slate-700 hover:bg-slate-200'"
                        class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition-all">
                    All Lenders (23)
                </button>
                <button type="button" 
                        @click="selectedCategory = 'Personal'; currentSlide = 0"
                        :class="selectedCategory === 'Personal' ? 'bg-[#062B59] text-white shadow-sm' : 'bg-slate-100 text-slate-700 hover:bg-slate-200'"
                        class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition-all">
                    Personal Loan (16)
                </button>
                <button type="button" 
                        @click="selectedCategory = 'Business'; currentSlide = 0"
                        :class="selectedCategory === 'Business' ? 'bg-[#062B59] text-white shadow-sm' : 'bg-slate-100 text-slate-700 hover:bg-slate-200'"
                        class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition-all">
                    Business Loan (17)
                </button>
                <button type="button" 
                        @click="selectedCategory = 'Doctor'; currentSlide = 0"
                        :class="selectedCategory === 'Doctor' ? 'bg-[#062B59] text-white shadow-sm' : 'bg-slate-100 text-slate-700 hover:bg-slate-200'"
                        class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition-all">
                    Doctor & CA Loan (17)
                </button>
                <button type="button" 
                        @click="selectedCategory = 'Car'; currentSlide = 0"
                        :class="selectedCategory === 'Car' ? 'bg-[#062B59] text-white shadow-sm' : 'bg-slate-100 text-slate-700 hover:bg-slate-200'"
                        class="px-3.5 py-1.5 rounded-xl text-xs font-bold transition-all">
                    Auto / Car Loan (14)
                </button>
            </div>
        </div>

        <!-- Carousel Outer Viewport -->
        <div class="relative overflow-hidden pt-2 pb-4">
            
            <!-- Horizontal Carousel Track (Strict Single Row) -->
            <div class="flex transition-transform duration-500 ease-in-out gap-3 sm:gap-4 flex-nowrap"
                 :style="'transform: translateX(-' + (currentSlide * (100 / cardsPerSlide)) + '%)'">
                
                @foreach($lenders as $lender)
                <div class="flex-shrink-0 flex flex-col justify-between text-center p-4 rounded-2xl bg-[#F8FAFC] hover:bg-white border border-slate-200/90 hover:border-blue-300 hover:shadow-lg transition-all duration-200 cursor-pointer group"
                     style="width: calc((100% - (var(--gap, 16px) * 6)) / 7); min-width: 140px;"
                     :style="'width: calc(100% / ' + cardsPerSlide + ' - 12px)'"
                     @click="window.location.href='{{ route('partners.show', $lender['slug']) }}'">
                    
                    <div>
                        <!-- Type Pill -->
                        <div class="flex items-center justify-between gap-1 mb-2">
                            <span class="text-[9px] font-extrabold uppercase px-2 py-0.5 rounded-md {{ $lender['type'] === 'Bank' ? 'bg-blue-100 text-[#0866E8]' : 'bg-emerald-100 text-[#12C878]' }}">
                                {{ $lender['type'] }}
                            </span>
                            <span class="text-[9px] font-bold text-slate-400">
                                {{ count($lender['products']) }} Loans
                            </span>
                        </div>

                        <!-- Lender Name in Bold Professional Typography (NO LOGOS AS REQUESTED) -->
                        <h4 class="text-sm font-extrabold text-[#062B59] group-hover:text-[#1677FF] transition-colors leading-tight mb-2 py-1">
                            {{ $lender['name'] }}
                        </h4>

                        <!-- Indicative Interest -->
                        <div class="text-[11px] font-bold text-emerald-600 mb-1">
                            From {{ explode(' ', $lender['interest_range'])[0] ?? '10.5%' }}
                        </div>
                    </div>

                    <!-- Subtle Footer Prompt -->
                    <div class="pt-2 border-t border-slate-200/60 text-[10px] font-bold text-[#1677FF] group-hover:underline">
                        View Options →
                    </div>

                </div>
                @endforeach

            </div>

        </div>

        <!-- Carousel Navigation Controls & Indicators -->
        <div class="mt-6 flex items-center justify-between">
            
            <!-- Left: View All Lenders Link -->
            <a href="{{ route('partners.index') }}" class="text-xs font-bold text-[#1677FF] hover:text-[#062B59] transition-colors inline-flex items-center gap-1">
                <span>View All 23 Lenders Details</span>
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>

            <!-- Center: Slide Position Dots -->
            <div class="hidden sm:flex items-center gap-1.5">
                <template x-for="i in Math.min(8, maxSlide + 1)" :key="i">
                    <button type="button" 
                            @click="currentSlide = i - 1"
                            :class="currentSlide === i - 1 ? 'w-6 bg-[#1677FF]' : 'w-2 bg-slate-300'"
                            class="h-1.5 rounded-full transition-all duration-300"></button>
                </template>
            </div>

            <!-- Right: Prev / Next Buttons -->
            <div class="flex items-center gap-2">
                <button type="button" 
                        @click="prev()" 
                        aria-label="Previous Lenders" 
                        class="w-8 h-8 rounded-full bg-slate-100 hover:bg-white hover:shadow border border-slate-200 flex items-center justify-center text-slate-700 transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
                </button>
                <button type="button" 
                        @click="next()" 
                        aria-label="Next Lenders" 
                        class="w-8 h-8 rounded-full bg-slate-100 hover:bg-white hover:shadow border border-slate-200 flex items-center justify-center text-slate-700 transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                </button>
            </div>

        </div>

        <p class="text-center text-[11px] text-slate-400 mt-6">
            Institutional lender names are referenced for customer comparison purposes under authorized aggregatorship. No direct endorsement or official partnership is implied without lender authorization.
        </p>

    </div>
</section>
