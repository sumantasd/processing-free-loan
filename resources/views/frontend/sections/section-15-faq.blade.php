<!-- SECTION 15: FAQ SECTION -->
<section id="faqs" class="py-16 sm:py-20 lg:py-24 bg-[#F5F9FF]"
         x-data="{ activeFaq: 0 }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="text-center max-w-3xl mx-auto mb-16">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-50 text-emerald-700 text-xs font-bold uppercase tracking-wider mb-3">
                <span class="w-2 h-2 rounded-full bg-[#12C878]"></span>
                <span>Frequently Asked Questions</span>
            </div>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#062B59] tracking-tight">
                Have Questions? <span class="text-[#1677FF]">We've Got Answers</span>
            </h2>
            <p class="mt-4 text-base sm:text-lg text-[#64748B]">
                Find clear, straightforward answers to the most common questions regarding loan applications and zero processing fee schemes.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
            
            <!-- Left: 3D Illustration & Support Box (Col 4) -->
            <div class="lg:col-span-4 space-y-6">
                
                <div class="bg-white rounded-3xl p-8 border border-slate-200/80 shadow-md text-center">
                    <img src="{{ asset('images/faq-illustration.svg') }}" 
                         alt="Frequently Asked Questions Support" 
                         class="w-full max-w-[240px] h-auto mx-auto object-contain mb-6">
                    
                    <h3 class="text-lg font-extrabold text-[#062B59] mb-2">
                        Still have questions?
                    </h3>
                    <p class="text-xs text-slate-500 mb-6 leading-relaxed">
                        Can't find the answer you're looking for? Our loan advisory team is available to help clarify any doubts.
                    </p>

                    <button type="button" 
                            @click="openEnquiry()"
                            class="w-full py-3 rounded-xl font-bold text-xs text-white bg-gradient-to-r from-[#0866E8] to-[#1677FF] hover:from-[#062B59] hover:to-[#0866E8] shadow-md shadow-blue-500/20 transition-all">
                        Ask a Loan Specialist
                    </button>
                </div>

                <div class="p-5 rounded-2xl bg-blue-50/70 border border-blue-100 flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-blue-100 text-[#1677FF] flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="text-[11px] font-bold text-slate-500 uppercase">Direct Helpline</div>
                        <div class="text-sm font-extrabold text-[#062B59]">{{ $brand['phone'] ?? '+91 98765 43210' }}</div>
                    </div>
                </div>

            </div>

            <!-- Right: Interactive Accordion (Col 8) -->
            <div class="lg:col-span-8 space-y-3.5">
                @foreach($faqs as $index => $faq)
                <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs overflow-hidden transition-all duration-200"
                     :class="{ 'border-blue-400 shadow-md ring-1 ring-blue-100': activeFaq === {{ $index }} }">
                    
                    <button type="button" 
                            @click="activeFaq = (activeFaq === {{ $index }} ? null : {{ $index }})"
                            class="w-full px-6 py-4.5 text-left flex items-center justify-between gap-4 font-bold text-sm sm:text-base transition-colors"
                            :class="activeFaq === {{ $index }} ? 'text-[#1677FF]' : 'text-[#062B59] hover:text-[#1677FF]'">
                        <span>{{ $faq['question'] }}</span>
                        
                        <div class="w-7 h-7 rounded-full flex items-center justify-center flex-shrink-0 transition-transform duration-200"
                             :class="activeFaq === {{ $index }} ? 'bg-blue-50 text-[#1677FF] rotate-180' : 'bg-slate-100 text-slate-400'">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </button>

                    <div x-show="activeFaq === {{ $index }}" 
                         x-transition:enter="transition ease-out duration-150"
                         x-transition:enter-start="opacity-0 -translate-y-1"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-100"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 -translate-y-1"
                         class="px-6 pb-5 pt-1 text-xs sm:text-sm text-[#64748B] leading-relaxed border-t border-slate-50"
                         style="display: none;">
                        {{ $faq['answer'] }}
                    </div>

                </div>
                @endforeach
            </div>

        </div>

    </div>
</section>
