<!-- SECTION 05: EXPLORE OUR LOAN PRODUCTS (DESKTOP LOCKED + MOBILE EXACT MATCH TO REFERENCE) -->
<section id="loan-products" class="bg-[#F5F9FF]">
    
    <!-- ============================================== -->
    <!-- 1. MOBILE LOAN PRODUCTS (STRICTLY MATCHING REFERENCE) -->
    <!-- ============================================== -->
    <div class="block lg:hidden bg-white pt-3 pb-12 px-4 sm:px-6 relative z-20 border-t border-slate-100/60">
        
        <!-- Header -->
        <div class="text-center mb-6">
            <span class="text-[11px] font-extrabold tracking-wider uppercase text-[#12C878] block mb-1">
                EXPLORE OUR LOAN SOLUTIONS
            </span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-[#062B59] tracking-tight">
                Our Loan Products
            </h2>
            <p class="text-xs sm:text-sm text-slate-500 max-w-xs mx-auto mt-1">
                Choose from a wide range of loan options as per your financial needs.
            </p>
        </div>

        <!-- 2-Column Grid (Per Primary Reference Image) -->
        <div class="grid grid-cols-2 gap-3 sm:gap-4">
            
            <!-- 1. Personal Loan (Soft Mint Gradient + Money Bag) -->
            <div class="bg-gradient-to-br from-[#E6F8F3] to-[#E6F4FF] border border-emerald-100/90 rounded-2xl p-3.5 flex flex-col justify-between shadow-2xs hover:shadow-md transition-all">
                <div>
                    <div class="w-10 h-10 rounded-xl bg-white shadow-2xs flex items-center justify-center text-[#12C878] mb-2.5">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-sm font-extrabold text-[#062B59] leading-tight">Personal Loan</h3>
                    <p class="text-[11px] text-slate-500 leading-snug mt-1 mb-3">Quick funds for your personal needs</p>
                </div>
                <div class="flex justify-end">
                    <a href="{{ route('loans.personal') }}" 
                       aria-label="Personal Loan Details"
                       class="w-7 h-7 rounded-full bg-[#F4511E] text-white flex items-center justify-center hover:bg-[#e64a19] shadow-sm active:scale-90 transition-all">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- 2. Business Loan (Soft Peach Gradient + Storefront) -->
            <div class="bg-gradient-to-br from-[#FFF7ED] to-[#FFEDD5] border border-orange-100/90 rounded-2xl p-3.5 flex flex-col justify-between shadow-2xs hover:shadow-md transition-all">
                <div>
                    <div class="w-10 h-10 rounded-xl bg-white shadow-2xs flex items-center justify-center text-[#F4511E] mb-2.5">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    <h3 class="text-sm font-extrabold text-[#062B59] leading-tight">Business Loan</h3>
                    <p class="text-[11px] text-slate-500 leading-snug mt-1 mb-3">Grow your business with easy loans</p>
                </div>
                <div class="flex justify-end">
                    <a href="{{ route('loans.business') }}" 
                       aria-label="Business Loan Details"
                       class="w-7 h-7 rounded-full bg-[#F4511E] text-white flex items-center justify-center hover:bg-[#e64a19] shadow-sm active:scale-90 transition-all">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- 3. New Car Loan (Soft Blue Gradient + Car) -->
            <div class="bg-gradient-to-br from-[#EFF6FF] to-[#DBEAFE] border border-blue-100/90 rounded-2xl p-3.5 flex flex-col justify-between shadow-2xs hover:shadow-md transition-all">
                <div>
                    <div class="w-10 h-10 rounded-xl bg-white shadow-2xs flex items-center justify-center text-[#1677FF] mb-2.5">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10 M16 8h4l3 3v5h-7V8z"/>
                        </svg>
                    </div>
                    <h3 class="text-sm font-extrabold text-[#062B59] leading-tight">New Car Loan</h3>
                    <p class="text-[11px] text-slate-500 leading-snug mt-1 mb-3">Drive your dream car with low rates</p>
                </div>
                <div class="flex justify-end">
                    <a href="{{ route('loans.new-car') }}" 
                       aria-label="New Car Loan Details"
                       class="w-7 h-7 rounded-full bg-[#F4511E] text-white flex items-center justify-center hover:bg-[#e64a19] shadow-sm active:scale-90 transition-all">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- 4. Used Car Loan (Soft Indigo Gradient + Key) -->
            <div class="bg-gradient-to-br from-[#F5F3FF] to-[#EDE9FE] border border-purple-100/90 rounded-2xl p-3.5 flex flex-col justify-between shadow-2xs hover:shadow-md transition-all">
                <div>
                    <div class="w-10 h-10 rounded-xl bg-white shadow-2xs flex items-center justify-center text-[#8B5CF6] mb-2.5">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                        </svg>
                    </div>
                    <h3 class="text-sm font-extrabold text-[#062B59] leading-tight">Used Car Loan</h3>
                    <p class="text-[11px] text-slate-500 leading-snug mt-1 mb-3">Quality certified pre-owned deals</p>
                </div>
                <div class="flex justify-end">
                    <a href="{{ route('loans.used-car') }}" 
                       aria-label="Used Car Loan Details"
                       class="w-7 h-7 rounded-full bg-[#F4511E] text-white flex items-center justify-center hover:bg-[#e64a19] shadow-sm active:scale-90 transition-all">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- 5. Doctor Loan (Soft Rose Gradient + Stethoscope) -->
            <div class="bg-gradient-to-br from-[#FFF1F2] to-[#FFE4E6] border border-rose-100/90 rounded-2xl p-3.5 flex flex-col justify-between shadow-2xs hover:shadow-md transition-all">
                <div>
                    <div class="w-10 h-10 rounded-xl bg-white shadow-2xs flex items-center justify-center text-[#E11D48] mb-2.5">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z M12 3v4 M10 5h4"/>
                        </svg>
                    </div>
                    <h3 class="text-sm font-extrabold text-[#062B59] leading-tight">Doctor Loan</h3>
                    <p class="text-[11px] text-slate-500 leading-snug mt-1 mb-3">Special credit for medical doctors</p>
                </div>
                <div class="flex justify-end">
                    <a href="{{ route('loans.doctor') }}" 
                       aria-label="Doctor Loan Details"
                       class="w-7 h-7 rounded-full bg-[#F4511E] text-white flex items-center justify-center hover:bg-[#e64a19] shadow-sm active:scale-90 transition-all">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- 6. CA Loan (Soft Slate/Violet Gradient + Calculator) -->
            <div class="bg-gradient-to-br from-[#F8FAFC] to-[#F1F5F9] border border-slate-200/90 rounded-2xl p-3.5 flex flex-col justify-between shadow-2xs hover:shadow-md transition-all">
                <div>
                    <div class="w-10 h-10 rounded-xl bg-white shadow-2xs flex items-center justify-center text-[#062B59] mb-2.5">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                        </svg>
                    </div>
                    <h3 class="text-sm font-extrabold text-[#062B59] leading-tight">CA Loan</h3>
                    <p class="text-[11px] text-slate-500 leading-snug mt-1 mb-3">Exclusive credit for qualified CAs</p>
                </div>
                <div class="flex justify-end">
                    <a href="{{ route('loans.ca') }}" 
                       aria-label="CA Loan Details"
                       class="w-7 h-7 rounded-full bg-[#F4511E] text-white flex items-center justify-center hover:bg-[#e64a19] shadow-sm active:scale-90 transition-all">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>
                </div>
            </div>

        </div>

    </div>

    <!-- ============================================== -->
    <!-- 2. DESKTOP LOAN PRODUCTS (LOCKED & PRESERVED) -->
    <!-- ============================================== -->
    <div class="hidden lg:block max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-24">
        
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-16">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-blue-100/80 text-[#1677FF] text-xs font-bold uppercase tracking-wider mb-3">
                <span>Our Loan Solutions</span>
            </div>
            <h2 class="text-4xl lg:text-5xl font-extrabold text-[#062B59] tracking-tight">
                Explore Our Loan Products
            </h2>
            <p class="mt-4 text-base lg:text-lg text-[#64748B] leading-relaxed">
                A wide range of loan options tailored for your personal, business and professional needs with zero processing fee offers.
            </p>
        </div>

        <!-- 6 Premium Loan Cards Grid (Original Desktop Design) -->
        <div class="grid grid-cols-3 gap-8">
            
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
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7m0 0l-7 7m7-7H3"/></svg>
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
