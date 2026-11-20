<!-- SECTION 12: CUSTOMER TESTIMONIALS -->
<section id="testimonials" class="py-16 sm:py-20 lg:py-24 bg-[#F5F9FF]"
         x-data="{
             activeSlide: 0,
             testimonialsCount: {{ count($testimonials) }},
             next() {
                 this.activeSlide = (this.activeSlide + 1) % this.testimonialsCount;
             },
             prev() {
                 this.activeSlide = (this.activeSlide - 1 + this.testimonialsCount) % this.testimonialsCount;
             }
         }">
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
                Real feedback from borrowers across India who secured their loans through our zero processing fee partner offers.
            </p>
        </div>

        <!-- Desktop Grid / Mobile Responsive Carousel -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($testimonials as $index => $t)
            <div class="bg-white rounded-3xl p-8 shadow-sm hover:shadow-xl border border-slate-100 hover:border-blue-200 transition-all duration-300 flex flex-col justify-between transform hover:-translate-y-1.5"
                 :class="{ 'hidden md:flex': activeSlide !== {{ $index }}, 'flex': activeSlide === {{ $index }} }">
                
                <div>
                    <!-- Star Rating -->
                    <div class="flex items-center gap-1 text-amber-400 mb-4">
                        @for($i = 0; $i < $t['rating']; $i++)
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        @endfor
                    </div>

                    <!-- Quote Text -->
                    <p class="text-sm text-slate-700 leading-relaxed italic mb-6">
                        "{{ $t['quote'] }}"
                    </p>
                </div>

                <!-- Customer Info -->
                <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <img src="{{ $t['avatar'] }}" 
                             alt="{{ $t['name'] }}" 
                             class="w-12 h-12 rounded-full object-cover border-2 border-emerald-400/50">
                        <div>
                            <h4 class="text-sm font-extrabold text-[#062B59]">{{ $t['name'] }}</h4>
                            <p class="text-xs text-slate-400 font-medium">{{ $t['city'] }}</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <span class="text-[10px] font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-full block">
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

        <!-- Mobile Carousel Navigation Dots & Controls -->
        <div class="mt-8 flex md:hidden items-center justify-center gap-4">
            <button type="button" @click="prev()" aria-label="Previous Testimonial" class="p-2 rounded-full bg-white border border-slate-200 text-slate-700">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            </button>
            <div class="flex items-center gap-2">
                @foreach($testimonials as $idx => $t)
                <button type="button" @click="activeSlide = {{ $idx }}" 
                        :class="activeSlide === {{ $idx }} ? 'w-6 bg-[#1677FF]' : 'w-2 bg-slate-300'"
                        class="h-2 rounded-full transition-all duration-300"></button>
                @endforeach
            </div>
            <button type="button" @click="next()" aria-label="Next Testimonial" class="p-2 rounded-full bg-white border border-slate-200 text-slate-700">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </button>
        </div>

    </div>
</section>
