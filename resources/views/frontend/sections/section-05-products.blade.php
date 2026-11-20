<!-- SECTION 05: EXPLORE OUR LOAN PRODUCTS -->
<section id="loan-products" class="py-16 sm:py-20 lg:py-24 bg-[#F5F9FF]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-14 sm:mb-16">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-blue-100/80 text-[#1677FF] text-xs font-bold uppercase tracking-wider mb-3">
                <span>Our Loan Solutions</span>
            </div>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#062B59] tracking-tight">
                Explore Our Loan Products
            </h2>
            <p class="mt-4 text-base sm:text-lg text-[#64748B] leading-relaxed">
                A wide range of loan options tailored for your personal, business and professional needs with zero processing fee offers.
            </p>
        </div>

        <!-- 6 Premium Loan Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            @php
                $cardImages = [
                    'personal-loan' => asset('images/salaried-man.jpg'),
                    'business-loan' => asset('images/business-store.jpg'),
                    'new-car-loan' => asset('images/new-car.jpg'),
                    'used-car-loan' => asset('images/used-car.jpg'),
                    'doctor-loan' => asset('images/doctor.jpg'),
                    'ca-loan' => asset('images/ca-professional.jpg'),
                ];
                $cardIcons = [
                    'personal-loan' => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z',
                    'business-loan' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4',
                    'new-car-loan' => 'M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10 M16 8h4l3 3v5h-7V8z',
                    'used-car-loan' => 'M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z',
                    'doctor-loan' => 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z M12 3v4 M10 5h4',
                    'ca-loan' => 'M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z'
                ];
            @endphp

            @foreach($products as $key => $p)
            <div class="group bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl border border-slate-100 hover:border-blue-200 transition-all duration-300 flex flex-col justify-between transform hover:-translate-y-1.5">
                
                <div>
                    <!-- Visual Image Header -->
                    <div class="relative h-48 w-full overflow-hidden bg-slate-100">
                        <img src="{{ $cardImages[$key] ?? asset('images/salaried-man.jpg') }}" 
                             alt="{{ $p['title'] }}" 
                             class="w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#062B59]/80 via-[#062B59]/20 to-transparent"></div>
                        
                        <!-- Floating Category Pill -->
                        <div class="absolute top-4 left-4 inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-white/90 backdrop-blur-sm text-xs font-extrabold text-[#062B59] shadow-sm">
                            <span class="w-2 h-2 rounded-full bg-[#12C878]"></span>
                            <span>{{ $p['badge'] }}</span>
                        </div>

                        <!-- Amount range pill -->
                        <div class="absolute bottom-3 left-4 right-4 flex items-center justify-between text-white text-xs">
                            <span class="font-bold tracking-wide">{{ $p['amount_range'] }}</span>
                            <span class="text-emerald-300 font-semibold text-[11px]">{{ $p['interest_rate'] }}</span>
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="p-6">
                        
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-10 h-10 rounded-xl bg-blue-50 text-[#1677FF] group-hover:bg-[#1677FF] group-hover:text-white transition-colors duration-300 flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $cardIcons[$key] ?? 'M12 6v6m0 0v6m0-6h6m-6 0H6' }}"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-extrabold text-[#062B59] group-hover:text-[#1677FF] transition-colors">
                                {{ $p['title'] }}
                            </h3>
                        </div>

                        <p class="text-xs font-semibold text-emerald-600 mb-2">
                            {{ $p['tagline'] }}
                        </p>

                        <p class="text-sm text-[#64748B] leading-relaxed line-clamp-2 mb-4">
                            {{ $p['description'] }}
                        </p>

                        <!-- Key perk bullet points -->
                        <div class="space-y-1.5 text-xs text-slate-600 font-medium mb-4">
                            <div class="flex items-center gap-2">
                                <span class="w-4 h-4 rounded-full bg-emerald-50 text-[#12C878] flex items-center justify-center text-[10px] font-bold">✓</span>
                                <span class="truncate">{{ $p['processing_fee'] }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="w-4 h-4 rounded-full bg-blue-50 text-[#1677FF] flex items-center justify-center text-[10px] font-bold">✓</span>
                                <span>Tenure: {{ $p['tenure'] }}</span>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Card Actions -->
                <div class="px-6 pb-6 pt-2 border-t border-slate-50 flex items-center justify-between gap-3">
                    <a href="{{ route('loans.' . str_replace(['-loan', 'loan'], '', $key)) }}" 
                       class="text-xs font-bold text-[#1677FF] hover:text-[#062B59] transition-colors inline-flex items-center gap-1">
                        <span>Learn More</span>
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                    
                    <button type="button" 
                            @click="openEnquiry('{{ $p['slug'] }}')"
                            class="px-4 py-2 rounded-xl text-xs font-bold text-white bg-gradient-to-r from-[#0866E8] to-[#1677FF] hover:from-[#062B59] hover:to-[#0866E8] shadow-sm hover:shadow transition-all duration-200">
                        Apply Now
                    </button>
                </div>

            </div>
            @endforeach

        </div>

        <!-- Bottom Assistance Callout -->
        <div class="mt-14 text-center">
            <p class="text-sm text-slate-500 font-medium">
                Unsure which loan product fits your financial profile?
                <a href="#how-it-works" class="text-[#1677FF] font-bold underline hover:text-[#062B59] ml-1">
                    See How It Works
                </a>
                or
                <button type="button" @click="openEnquiry()" class="text-[#12C878] font-bold underline hover:text-emerald-700 ml-1">
                    Talk to our Loan Advisor
                </button>
            </p>
        </div>

    </div>
</section>
