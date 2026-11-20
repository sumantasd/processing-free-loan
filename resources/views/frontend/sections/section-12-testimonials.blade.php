<!-- SECTION 12: PREMIUM CUSTOMER TESTIMONIALS CAROUSEL -->
<section id="testimonials" class="py-16 sm:py-20 lg:py-24 bg-[#F4F8FF] overflow-hidden w-full relative"
         x-data="{
             currentSlide: 0,
             cardsPerView: 3,
             totalCards: {{ count($testimonials) }},
             touchStartX: 0,
             touchEndX: 0,
             isPaused: false,
             intervalId: null,

             updateCardsPerView() {
                 if (window.innerWidth >= 1024) {
                     this.cardsPerView = 3;
                 } else if (window.innerWidth >= 768) {
                     this.cardsPerView = 2;
                 } else {
                     this.cardsPerView = 1;
                 }
             },

             get maxSlide() {
                 return Math.max(0, this.totalCards - this.cardsPerView);
             },

             get totalPages() {
                 return Math.ceil(this.totalCards / this.cardsPerView);
             },

             get currentPage() {
                 return Math.min(Math.floor(this.currentSlide / this.cardsPerView), this.totalPages - 1);
             },

             next() {
                 if (this.currentSlide >= this.maxSlide) {
                     this.currentSlide = 0;
                 } else {
                     this.currentSlide = Math.min(this.currentSlide + 1, this.maxSlide);
                 }
             },

             prev() {
                 if (this.currentSlide <= 0) {
                     this.currentSlide = this.maxSlide;
                 } else {
                     this.currentSlide = Math.max(this.currentSlide - 1, 0);
                 }
             },

             goToPage(pageIndex) {
                 this.currentSlide = Math.min(pageIndex * this.cardsPerView, this.maxSlide);
             },

             handleTouchStart(e) {
                 this.touchStartX = e.touches[0].clientX;
                 this.isPaused = true;
             },

             handleTouchEnd(e) {
                 this.touchEndX = e.changedTouches[0].clientX;
                 const diff = this.touchStartX - this.touchEndX;
                 if (Math.abs(diff) > 40) {
                     if (diff > 0) {
                         this.next();
                     } else {
                         this.prev();
                     }
                 }
                 setTimeout(() => { this.isPaused = false; }, 2500);
             },

             init() {
                 this.updateCardsPerView();
                 window.addEventListener('resize', () => {
                     this.updateCardsPerView();
                     if (this.currentSlide > this.maxSlide) {
                         this.currentSlide = this.maxSlide;
                     }
                 });

                 // Gentle auto-sliding that pauses on user interaction
                 this.intervalId = setInterval(() => {
                     if (!this.isPaused) {
                         this.next();
                     }
                 }, 5000);
             }
         }"
         @mouseenter="isPaused = true"
         @mouseleave="isPaused = false">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-12 sm:mb-14">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-50 text-emerald-700 text-xs font-bold uppercase tracking-wider mb-3.5 border border-emerald-200/60 shadow-xs">
                <span class="w-2 h-2 rounded-full bg-[#12D878] animate-pulse"></span>
                <span>Verified Customer Reviews</span>
            </div>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#062B59] tracking-tight">
                What Our Customers Say
            </h2>
            <p class="mt-3.5 text-sm sm:text-base text-[#64748B] leading-relaxed max-w-2xl mx-auto font-normal">
                Real experiences from borrowers across West Bengal and India who discovered and secured zero processing fee loan offers through our platform.
            </p>
        </div>

        <!-- Carousel Viewport & Touch Area -->
        <div class="relative overflow-hidden w-full pb-2"
             @touchstart="handleTouchStart($event)"
             @touchend="handleTouchEnd($event)">
            
            <!-- Sliding Track -->
            <div class="flex transition-transform duration-500 ease-out -mx-2 sm:-mx-3"
                 :style="'transform: translateX(-' + (currentSlide * (100 / cardsPerView)) + '%)'">
                
                @foreach($testimonials as $idx => $t)
                <!-- Testimonial Slide Item: 1 col on mobile, 2 col on tablet, 3 col on desktop -->
                <div class="flex-shrink-0 w-full md:w-1/2 lg:w-1/3 px-2 sm:px-3 box-border">
                    
                    <!-- Premium Fintech Card (White, 20-24px rounded corners, soft shadow, thin light-blue border) -->
                    <div class="h-full bg-white rounded-2xl sm:rounded-3xl p-6 sm:p-7 shadow-sm hover:shadow-md border border-[#DCE8F8] transition-all duration-300 flex flex-col justify-between">
                        
                        <div>
                            <!-- Top Card Row: Star Rating & Loan Category Badge -->
                            <div class="flex items-center justify-between gap-2 mb-4">
                                <!-- Five-Star Rating in Golden Yellow -->
                                <div class="flex items-center gap-1 text-[#F59E0B]">
                                    @for($i = 0; $i < ($t['rating'] ?? 5); $i++)
                                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                    @endfor
                                </div>

                                <!-- Loan Category Badge (Ensures zero overlap with customer name) -->
                                @if(!empty($t['loan_type']))
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[11px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200/60 flex-shrink-0">
                                        <svg class="w-3 h-3 text-[#12D878]" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                        <span>{{ $t['loan_type'] }}</span>
                                    </span>
                                @endif
                            </div>

                            <!-- Full Customer Review Quote (Comfortable Line-Height, Natural Wrapping, No Clipping) -->
                            <div class="my-4">
                                <p class="text-xs sm:text-sm text-slate-700 leading-relaxed font-normal">
                                    "{{ $t['quote'] }}"
                                </p>
                            </div>
                        </div>

                        <!-- Customer Profile Info Footer -->
                        <div class="pt-4 border-t border-[#EDF4FD] flex items-center gap-3.5 mt-2">
                            <!-- Circular Avatar with Graceful Initials Fallback & Verified Check -->
                            <div class="w-12 h-12 rounded-full flex-shrink-0 relative ring-2 ring-[#12D878]/30 bg-blue-50 overflow-hidden flex items-center justify-center">
                                @if(!empty($t['avatar']))
                                    <img src="{{ $t['avatar'] }}" 
                                         alt="{{ $t['name'] }}" 
                                         class="w-full h-full object-cover rounded-full"
                                         onerror="this.style.display='none'; if(this.nextElementSibling) this.nextElementSibling.style.display='flex';"
                                         loading="lazy">
                                    <div class="w-full h-full rounded-full bg-gradient-to-tr from-[#062B59] to-[#0866E8] text-white font-extrabold text-sm flex items-center justify-center select-none" style="display: none;">
                                        <span>{{ $t['initials'] ?? 'PF' }}</span>
                                    </div>
                                @else
                                    <div class="w-full h-full rounded-full bg-gradient-to-tr from-[#062B59] to-[#0866E8] text-white font-extrabold text-sm flex items-center justify-center select-none">
                                        <span>{{ $t['initials'] ?? 'PF' }}</span>
                                    </div>
                                @endif
                                
                                <!-- Small Green Verified Checkmark -->
                                <div class="absolute -bottom-0.5 -right-0.5 w-4 h-4 rounded-full bg-[#12D878] text-white flex items-center justify-center text-[9px] font-black border-2 border-white shadow-xs">
                                    ✓
                                </div>
                            </div>

                            <!-- Customer Name, Role & Location -->
                            <div class="min-w-0 flex-1">
                                <h4 class="text-xs sm:text-sm font-extrabold text-[#062B59] leading-tight truncate">
                                    {{ $t['name'] }}
                                </h4>
                                @if(!empty($t['role']))
                                    <p class="text-[11px] font-semibold text-slate-500 leading-tight mt-0.5 truncate">
                                        {{ $t['role'] }}
                                    </p>
                                @endif
                                <p class="text-[11px] text-slate-400 font-medium flex items-center gap-1 mt-0.5 truncate">
                                    <svg class="w-3 h-3 text-slate-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    <span>{{ $t['city'] }}</span>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
                @endforeach

            </div>
        </div>

        <!-- Carousel Navigation Controls (Arrows + Active Page Dots) -->
        <div class="mt-8 sm:mt-10 flex items-center justify-center gap-4">
            
            <!-- Previous Button -->
            <button type="button" 
                    @click="prev()" 
                    aria-label="Previous Testimonials" 
                    class="w-10 h-10 rounded-full bg-white hover:bg-slate-50 border border-slate-200 shadow-sm text-slate-700 hover:text-[#0866E8] hover:border-blue-300 transition-all flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-[#0866E8]/40 active:scale-95 cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
            </button>

            <!-- Dots Indicator -->
            <div class="flex items-center gap-2">
                <template x-for="p in totalPages" :key="p">
                    <button type="button" 
                            @click="goToPage(p - 1)"
                            :aria-label="'Go to slide ' + p"
                            :class="currentPage === (p - 1) ? 'w-7 bg-[#1677FF]' : 'w-2.5 bg-slate-300 hover:bg-slate-400'"
                            class="h-2 rounded-full transition-all duration-300 focus:outline-none cursor-pointer"></button>
                </template>
            </div>

            <!-- Next Button -->
            <button type="button" 
                    @click="next()" 
                    aria-label="Next Testimonials" 
                    class="w-10 h-10 rounded-full bg-white hover:bg-slate-50 border border-slate-200 shadow-sm text-slate-700 hover:text-[#0866E8] hover:border-blue-300 transition-all flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-[#0866E8]/40 active:scale-95 cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
            </button>

        </div>

    </div>
</section>
