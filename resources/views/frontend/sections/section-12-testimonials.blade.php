<!-- SECTION 10 / 12: CUSTOMER TESTIMONIALS CAROUSEL (EXACTLY 3 CARDS PER DESKTOP SLIDE) -->
<section id="testimonials" class="py-16 sm:py-20 lg:py-24 bg-[#F5F9FF]"
         x-data="{
             currentSlide: 0,
             cardsPerSlide: 3,
             isPaused: false,
             intervalId: null,
             totalCards: {{ count($testimonials) }},

             updateCardsPerSlide() {
                 if (window.innerWidth >= 1024) {
                     this.cardsPerSlide = 3;
                 } else if (window.innerWidth >= 640) {
                     this.cardsPerSlide = 2;
                 } else {
                     this.cardsPerSlide = 1;
                 }
             },

             get totalSlides() {
                 return Math.ceil(this.totalCards / this.cardsPerSlide);
             },

             next() {
                 this.currentSlide = (this.currentSlide + 1) % this.totalSlides;
             },

             prev() {
                 this.currentSlide = (this.currentSlide - 1 + this.totalSlides) % this.totalSlides;
             },

             init() {
                 this.updateCardsPerSlide();
                 window.addEventListener('resize', () => {
                     this.updateCardsPerSlide();
                     if (this.currentSlide >= this.totalSlides) this.currentSlide = 0;
                 });

                 // Auto slide every 4 seconds
                 this.intervalId = setInterval(() => {
                     if (!this.isPaused) {
                         this.next();
                     }
                 }, 4000);
             }
         }"
         @mouseenter="isPaused = true"
         @mouseleave="isPaused = false">
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="text-center max-w-3xl mx-auto mb-14">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-50 text-emerald-700 text-xs font-bold uppercase tracking-wider mb-3">
                <span class="w-2 h-2 rounded-full bg-[#12C878]"></span>
                <span>Customer Testimonials</span>
            </div>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#062B59] tracking-tight">
                What Our Customers Say
            </h2>
            <p class="mt-3 text-base sm:text-lg text-[#64748B]">
                Real feedback from borrowers across West Bengal and India who secured their loans through our zero processing fee partner offers.
            </p>
        </div>

        <!-- Carousel Viewport -->
        <div class="relative overflow-hidden">
            <div class="flex transition-transform duration-500 ease-in-out gap-6"
                 :style="'transform: translateX(-' + (currentSlide * 100) + '%)'">
                
                @php
                    $chunks = array_chunk($testimonials, 3);
                @endphp

                @foreach($testimonials as $idx => $t)
                <div class="flex-shrink-0 w-full sm:w-[calc(50%-12px)] lg:w-[calc(33.333%-16px)] bg-white rounded-3xl p-7 shadow-sm hover:shadow-xl border border-slate-100 hover:border-blue-200 transition-all duration-300 flex flex-col justify-between transform hover:-translate-y-1">
                    
                    <div>
                        <!-- 5 Star Rating -->
                        <div class="flex items-center gap-1 text-amber-400 mb-4">
                            @for($i = 0; $i < $t['rating']; $i++)
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            @endfor
                        </div>

                        <!-- Review Text -->
                        <p class="text-xs sm:text-sm text-slate-700 leading-relaxed italic mb-6">
                            "{{ $t['quote'] }}"
                        </p>
                    </div>

                    <!-- Customer Info Footer -->
                    <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <img src="{{ str_starts_with($t['avatar'], 'http') ? $t['avatar'] : asset(ltrim($t['avatar'], '/')) }}" 
                                 alt="{{ $t['name'] }}" 
                                 class="w-11 h-11 rounded-full object-cover border-2 border-emerald-400/50"
                                 loading="lazy">
                            <div>
                                <h4 class="text-xs sm:text-sm font-extrabold text-[#062B59]">{{ $t['name'] }}</h4>
                                <p class="text-[11px] text-slate-400 font-medium">{{ $t['city'] }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <span class="text-[9px] font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-full block">
                                {{ $t['loan_type'] }}
                            </span>
                            <span class="text-[11px] font-extrabold text-slate-700 block mt-0.5">
                                {{ $t['amount'] }}
                            </span>
                        </div>
                    </div>

                </div>
                @endforeach

            </div>
        </div>

        <!-- Carousel Navigation Controls -->
        <div class="mt-8 flex items-center justify-center gap-4">
            
            <button type="button" 
                    @click="prev()" 
                    aria-label="Previous Testimonials" 
                    class="p-2.5 rounded-full bg-white hover:bg-slate-50 border border-slate-200 shadow-sm text-slate-700 transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
            </button>

            <!-- Dots Indicator -->
            <div class="flex items-center gap-2">
                <template x-for="i in totalSlides" :key="i">
                    <button type="button" 
                            @click="currentSlide = i - 1"
                            :class="currentSlide === i - 1 ? 'w-6 bg-[#1677FF]' : 'w-2 bg-slate-300'"
                            class="h-2 rounded-full transition-all duration-300"></button>
                </template>
            </div>

            <button type="button" 
                    @click="next()" 
                    aria-label="Next Testimonials" 
                    class="p-2.5 rounded-full bg-white hover:bg-slate-50 border border-slate-200 shadow-sm text-slate-700 transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
            </button>

        </div>

    </div>
</section>
