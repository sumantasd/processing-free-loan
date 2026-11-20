<!-- SECTION 09: WHY CHOOSE PROCESSING FREE LOAN -->
<section id="why-choose-us" class="py-16 sm:py-20 lg:py-24 bg-[#F5F9FF]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-16">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-50 text-emerald-700 text-xs font-bold uppercase tracking-wider mb-3">
                <span class="w-2 h-2 rounded-full bg-[#12C878]"></span>
                <span>Why Choose Us</span>
            </div>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#062B59] tracking-tight">
                Why Choose <span class="text-[#1677FF]">Processing Free Loan?</span>
            </h2>
            <p class="mt-4 text-base sm:text-lg text-[#64748B]">
                A smarter, faster and more transparent way to compare and secure your loan from India's top Banks & NBFCs.
            </p>
        </div>

        <!-- 5 Feature Blocks in 2-Row / 3-Row Balanced Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            @php
                $featureIcons = [
                    'No Processing Fee Offers' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
                    'Multiple Lending Options' => 'M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10',
                    'Dedicated Customer Support' => 'M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z',
                    '100% Transparent Process' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
                    'Application Assistance' => 'M13 10V3L4 14h7v7l9-11h-7z',
                ];
            @endphp

            @foreach($whyChoose as $feature)
            <div class="group bg-white rounded-3xl p-8 shadow-xs hover:shadow-xl border border-slate-100 hover:border-emerald-200 transition-all duration-300 flex flex-col justify-between transform hover:-translate-y-1.5">
                <div>
                    <!-- Icon container -->
                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-tr from-emerald-500/10 to-blue-500/10 text-[#12C878] group-hover:bg-[#12C878] group-hover:text-white transition-all duration-300 flex items-center justify-center mb-6 shadow-xs">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $featureIcons[$feature['title']] ?? 'M12 6v6m0 0v6m0-6h6m-6 0H6' }}"/>
                        </svg>
                    </div>

                    <h3 class="text-xl font-extrabold text-[#062B59] group-hover:text-[#1677FF] transition-colors mb-3">
                        {{ $feature['title'] }}
                    </h3>

                    <p class="text-sm text-[#64748B] leading-relaxed">
                        {{ $feature['desc'] }}
                    </p>
                </div>

                <div class="mt-6 pt-4 border-t border-slate-50 flex items-center gap-2 text-xs font-bold text-[#12C878]">
                    <span>Verified Customer Advantage</span>
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                </div>
            </div>
            @endforeach

            <!-- 6th Special Box: Higher Approval Chance -->
            <div class="bg-gradient-to-br from-[#062B59] to-[#031B3B] text-white rounded-3xl p-8 shadow-xl flex flex-col justify-between">
                <div>
                    <div class="w-14 h-14 rounded-2xl bg-white/10 text-[#12C878] flex items-center justify-center mb-6">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>

                    <h3 class="text-xl font-extrabold text-white mb-3">
                        Higher Approval Probability
                    </h3>

                    <p class="text-sm text-slate-300 leading-relaxed">
                        Rather than randomly applying at multiple banks, our intelligent algorithm pre-qualifies your profile with lenders whose credit criteria you match perfectly.
                    </p>
                </div>

                <div class="mt-6 pt-4 border-t border-white/10">
                    <button type="button" 
                            @click="openEnquiry()"
                            class="w-full py-2.5 rounded-xl font-bold text-xs bg-[#1677FF] hover:bg-[#0866E8] text-white transition-all text-center">
                        Find My Best Lender Match
                    </button>
                </div>
            </div>

        </div>

        <!-- Compliance & Regulatory Disclaimer Note -->
        <div class="mt-12 p-4 rounded-2xl bg-blue-50/60 border border-blue-100 flex items-start gap-3 max-w-4xl mx-auto">
            <svg class="w-5 h-5 text-[#1677FF] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <p class="text-xs text-slate-600 leading-relaxed">
                <span class="font-bold text-[#062B59]">Important Notice:</span> Processing fee waiver offers are subject to individual lender eligibility criteria, CIBIL score bands, loan ticket sizes, and applicable promotional schemes. We do not claim that every lender or product has zero fees, but we proactively connect you to eligible zero-fee options.
            </p>
        </div>

    </div>
</section>
