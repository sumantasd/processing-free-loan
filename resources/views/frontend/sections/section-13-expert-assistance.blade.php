<!-- SECTION 11 / 13: EXPERT LOAN ASSISTANCE -->
<section id="expert-assistance" class="py-12 sm:py-16 bg-[#F5F9FF]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="bg-gradient-to-r from-[#031B3B] via-[#062B59] to-[#0866E8] text-white rounded-3xl p-8 sm:p-12 lg:p-14 shadow-2xl relative overflow-hidden">
            
            <div class="absolute -top-32 -right-32 w-80 h-80 bg-[#12C878]/20 rounded-full blur-3xl pointer-events-none"></div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center relative z-10">
                
                <!-- Female Bengali/Indian Support Advisor Photo (Col 4) -->
                <div class="lg:col-span-4 flex justify-center lg:justify-start">
                    <div class="relative w-44 h-44 sm:w-56 sm:h-56 lg:w-64 lg:h-64 rounded-3xl overflow-hidden border-4 border-white/20 shadow-2xl">
                        <img src="{{ asset('images/support-agent.jpg') }}" 
                             alt="Professional Indian customer support loan advisor" 
                             loading="lazy"
                             class="w-full h-full object-cover object-top">
                        <div class="absolute bottom-2 left-2 right-2 bg-black/60 backdrop-blur-sm rounded-xl py-1 text-center text-[11px] font-bold text-emerald-400">
                            ● Senior Loan Expert Online
                        </div>
                    </div>
                </div>

                <!-- Assistance Text & Action CTAs (Col 8) -->
                <div class="lg:col-span-8 space-y-4 text-center lg:text-left">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-bold uppercase tracking-wider">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                        <span>Free Personalized Guidance</span>
                    </div>

                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-white tracking-tight">
                        Need Help Choosing the Right Loan?
                    </h2>

                    <p class="text-sm sm:text-base text-slate-200 max-w-2xl leading-relaxed">
                        Our team is ready to help you explore suitable loan options and guide you through the enquiry process.
                    </p>

                    <div class="pt-4 flex flex-wrap items-center justify-center lg:justify-start gap-3 sm:gap-4">
                        <button type="button" 
                                @click="openEnquiry()"
                                class="px-7 py-3.5 rounded-full font-bold text-sm text-[#062B59] bg-[#12C878] hover:bg-[#0fa863] hover:text-white shadow-lg shadow-emerald-500/30 transition-all transform hover:-translate-y-0.5">
                            Talk to an Expert →
                        </button>

                        <a href="{{ $brand['phone_primary_url'] ?? $brand['phone_url'] ?? 'tel:+919800210503' }}" 
                           class="inline-flex items-center gap-2 px-5 py-3.5 rounded-full font-bold text-sm text-white bg-white/10 hover:bg-white/20 border border-white/20 backdrop-blur-sm transition-all"
                           title="Call Primary Helpline">
                            <svg class="w-4 h-4 text-[#12C878]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <span>Call: {{ $brand['phone_primary'] ?? $brand['phone'] ?? '+91 98002 10503' }}</span>
                        </a>

                        <a href="{{ $brand['phone_secondary_url'] ?? 'tel:+917679096826' }}" 
                           class="inline-flex items-center gap-2 px-5 py-3.5 rounded-full font-bold text-sm text-white bg-white/10 hover:bg-white/20 border border-white/20 backdrop-blur-sm transition-all"
                           title="Call Secondary Helpline">
                            <svg class="w-4 h-4 text-[#1677FF]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <span>Call: {{ $brand['phone_secondary'] ?? '+91 76790 96826' }}</span>
                        </a>
                    </div>

                    <div class="pt-2 text-xs text-slate-300">
                        Operating Hours: {{ $brand['support_hours'] ?? 'Mon - Sat: 9:30 AM - 7:00 PM' }}
                    </div>
                </div>

            </div>

        </div>

    </div>
</section>
