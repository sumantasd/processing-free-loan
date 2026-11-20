@extends('frontend.layouts.app')

@section('title', 'All Banking & NBFC Partners | ProcessingFreeLoan.com')
@section('meta_description', 'Browse and compare 23+ leading Banks and NBFCs offering loans with Zero Processing Fee promotional schemes across India.')

@section('content')

    <!-- Header Banner -->
    <section class="bg-gradient-to-b from-[#031B3B] via-[#062B59] to-[#042045] text-white pt-14 pb-20 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-bold uppercase tracking-wider mb-4">
                <span class="w-2 h-2 rounded-full bg-[#12C878]"></span>
                <span>Authorized Lending Marketplace</span>
            </div>

            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight">
                Our Banking & NBFC Partners
            </h1>
            
            <p class="mt-4 text-base sm:text-lg text-slate-300 max-w-2xl mx-auto">
                Discover the best loan offers from India's top institutional lenders. Compare interest rates, loan eligibility and promotional zero-processing-fee schemes.
            </p>

            <!-- Filter Controls -->
            <div class="mt-10 flex flex-wrap items-center justify-center gap-3">
                <a href="{{ route('partners.index') }}" 
                   class="px-5 py-2.5 rounded-xl text-xs sm:text-sm font-bold transition-all {{ !$selectedType && !$selectedProduct ? 'bg-[#12C878] text-white shadow-md' : 'bg-white/10 text-slate-200 hover:bg-white/20' }}">
                    All Lenders (23+)
                </a>
                <a href="{{ route('partners.index', ['type' => 'Bank']) }}" 
                   class="px-5 py-2.5 rounded-xl text-xs sm:text-sm font-bold transition-all {{ $selectedType === 'Bank' ? 'bg-[#12C878] text-white shadow-md' : 'bg-white/10 text-slate-200 hover:bg-white/20' }}">
                    Top Banks (7)
                </a>
                <a href="{{ route('partners.index', ['type' => 'NBFC']) }}" 
                   class="px-5 py-2.5 rounded-xl text-xs sm:text-sm font-bold transition-all {{ $selectedType === 'NBFC' ? 'bg-[#12C878] text-white shadow-md' : 'bg-white/10 text-slate-200 hover:bg-white/20' }}">
                    Leading NBFCs (16)
                </a>
            </div>

        </div>
    </section>

    <!-- Partners Grid -->
    <section class="py-16 bg-[#F5F9FF]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="flex items-center justify-between mb-8 pb-4 border-b border-slate-200">
                <div class="text-sm font-extrabold text-[#062B59]">
                    Showing {{ count($lenders) }} Institutional Lenders
                </div>
                <div class="text-xs text-slate-500 font-medium">
                    Updated with authentic Excel lender registry
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($lenders as $lender)
                <div class="group bg-white rounded-3xl p-7 shadow-xs hover:shadow-xl border border-slate-200/80 hover:border-blue-300 transition-all duration-300 flex flex-col justify-between transform hover:-translate-y-1">
                    
                    <div>
                        <!-- Header Bar -->
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-xs font-extrabold uppercase px-3 py-1 rounded-full {{ $lender['type'] === 'Bank' ? 'bg-blue-50 text-[#0866E8] border border-blue-200' : 'bg-emerald-50 text-[#12C878] border border-emerald-200' }}">
                                {{ $lender['type'] }}
                            </span>
                            <span class="text-xs font-extrabold text-slate-700">
                                {{ $lender['interest_range'] }}
                            </span>
                        </div>

                        <!-- Brand Logo Heading -->
                        <h3 class="text-xl font-extrabold text-[#062B59] group-hover:text-[#1677FF] transition-colors mb-1">
                            {{ $lender['name'] }}
                        </h3>

                        <p class="text-xs font-semibold text-emerald-600 mb-3">
                            {{ $lender['tagline'] }}
                        </p>

                        <p class="text-xs sm:text-sm text-[#64748B] leading-relaxed mb-5">
                            {{ $lender['description'] }}
                        </p>

                        <!-- Products Offered Tags from Excel -->
                        <div class="space-y-1.5 mb-5">
                            <div class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Products Offered:</div>
                            <div class="flex flex-wrap gap-1.5">
                                @foreach($lender['products'] as $prod)
                                <span class="px-2.5 py-1 rounded-lg bg-slate-100 text-slate-700 text-[11px] font-semibold">
                                    {{ $prod }}
                                </span>
                                @endforeach
                            </div>
                        </div>

                        <!-- Zero fee offer highlight -->
                        <div class="p-3 rounded-xl bg-emerald-50/70 border border-emerald-100 text-[11px] text-emerald-800 font-semibold mb-2">
                            🎁 {{ $lender['processing_fee_offer'] }}
                        </div>
                    </div>

                    <!-- Footer Action Buttons -->
                    <div class="pt-5 border-t border-slate-100 flex items-center justify-between gap-3">
                        <a href="{{ route('partners.show', $lender['slug']) }}" 
                           class="text-xs font-bold text-[#1677FF] hover:text-[#062B59] transition-colors inline-flex items-center gap-1">
                            <span>View Profile & Rates</span>
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>

                        <button type="button" 
                                @click="openEnquiry('personal-loan', '{{ $lender['name'] }}')"
                                class="px-4 py-2 rounded-xl text-xs font-bold text-white bg-[#062B59] hover:bg-[#1677FF] transition-colors shadow-xs">
                            Apply with {{ explode(' ', $lender['name'])[0] }}
                        </button>
                    </div>

                </div>
                @endforeach
            </div>

        </div>
    </section>

@endsection
