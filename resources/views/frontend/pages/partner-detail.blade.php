@extends('frontend.layouts.app')

@section('title', $lender['name'] . ' Loan Options & Zero Processing Fee Schemes | ProcessingFreeLoan.com')
@section('meta_description', $lender['description'])

@section('content')

    <!-- Header Section -->
    <section class="bg-gradient-to-b from-[#031B3B] via-[#062B59] to-[#042045] text-white pt-14 pb-20 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            
            <div class="flex items-center gap-2 text-xs font-semibold text-slate-400 mb-6">
                <a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a>
                <span>/</span>
                <a href="{{ route('partners.index') }}" class="hover:text-white transition-colors">Lending Partners</a>
                <span>/</span>
                <span class="text-[#12C878]">{{ $lender['name'] }}</span>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
                
                <div class="lg:col-span-8 space-y-4">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-extrabold uppercase {{ $lender['type'] === 'Bank' ? 'bg-blue-500/20 text-blue-300' : 'bg-emerald-500/20 text-emerald-300' }}">
                        <span>{{ $lender['type'] }}</span>
                        <span>•</span>
                        <span>Authorized Partner</span>
                    </div>

                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight">
                        {{ $lender['name'] }}
                    </h1>

                    <p class="text-base text-emerald-300 font-semibold">
                        {{ $lender['tagline'] }}
                    </p>

                    <p class="text-sm sm:text-base text-slate-300 max-w-2xl leading-relaxed">
                        {{ $lender['description'] }}
                    </p>

                    <!-- Key stats banner -->
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 pt-3">
                        <div class="p-3.5 rounded-2xl bg-white/10 border border-white/10">
                            <div class="text-[10px] uppercase font-bold text-slate-300">Interest Rates</div>
                            <div class="text-sm font-extrabold text-emerald-300">{{ $lender['interest_range'] }}</div>
                        </div>
                        <div class="p-3.5 rounded-2xl bg-white/10 border border-white/10">
                            <div class="text-[10px] uppercase font-bold text-slate-300">Maximum Tenure</div>
                            <div class="text-sm font-extrabold text-white">{{ $lender['max_tenure'] }}</div>
                        </div>
                        <div class="p-3.5 rounded-2xl bg-white/10 border border-white/10">
                            <div class="text-[10px] uppercase font-bold text-slate-300">Application Mode</div>
                            <div class="text-sm font-extrabold text-white">100% Paperless</div>
                        </div>
                    </div>

                    <div class="pt-3">
                        <button type="button" 
                                @click="openEnquiry('personal-loan', '{{ $lender['name'] }}')"
                                class="px-8 py-3.5 rounded-full font-extrabold text-sm text-white bg-[#12C878] hover:bg-[#0fa863] shadow-lg shadow-emerald-500/25 transition-all">
                            Apply with {{ $lender['name'] }} →
                        </button>
                    </div>
                </div>

                <!-- Right Highlight Box -->
                <div class="lg:col-span-4 bg-white text-[#102B50] rounded-3xl p-6 shadow-2xl border border-slate-100 space-y-4">
                    <h3 class="text-lg font-extrabold text-[#062B59] border-b border-slate-100 pb-3">
                        Special Features & Advantages
                    </h3>
                    <ul class="space-y-3 text-xs sm:text-sm text-slate-700">
                        @foreach($lender['special_features'] as $feat)
                        <li class="flex items-start gap-2.5">
                            <span class="text-[#12C878] font-bold">✓</span>
                            <span>{{ $feat }}</span>
                        </li>
                        @endforeach
                    </ul>
                    <div class="p-3.5 rounded-xl bg-emerald-50 border border-emerald-100 text-xs font-semibold text-emerald-800">
                        <strong>Processing Fee Offer:</strong> {{ $lender['processing_fee_offer'] }}
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- Products Offered by this Lender from Excel Data -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl sm:text-3xl font-extrabold text-[#062B59] mb-8">
                Loan Products Available from {{ $lender['name'] }}
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($lender['products'] as $prodName)
                <div class="p-6 rounded-2xl bg-[#F8FAFC] border border-slate-200/80 hover:border-blue-300 transition-all flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-xs font-bold text-[#1677FF] bg-blue-50 px-2.5 py-0.5 rounded-full">
                                Verified Scheme
                            </span>
                            <span class="text-xs font-bold text-emerald-600">Zero Fee Promo</span>
                        </div>
                        <h4 class="text-lg font-extrabold text-[#062B59] mb-2">
                            {{ $prodName }}
                        </h4>
                        <p class="text-xs text-slate-500 mb-4">
                            Competitive interest rates, instant eligibility check, and minimal documentation with {{ $lender['name'] }}.
                        </p>
                    </div>

                    <button type="button" 
                            @click="openEnquiry('personal-loan', '{{ $lender['name'] }}')"
                            class="w-full py-2.5 rounded-xl font-bold text-xs bg-[#062B59] hover:bg-[#1677FF] text-white transition-colors">
                        Apply for {{ $prodName }} →
                    </button>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Other Partner Lenders -->
    <section class="py-14 bg-[#F5F9FF] border-t border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h3 class="text-xl font-extrabold text-[#062B59] mb-6">
                Compare with Similar Lenders
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                @foreach($relatedLenders as $rel)
                <a href="{{ route('partners.show', $rel['slug']) }}" class="p-5 rounded-2xl bg-white border border-slate-100 hover:border-blue-300 shadow-xs hover:shadow-md transition-all block group">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-xs font-bold text-slate-400">{{ $rel['type'] }}</span>
                        <span class="text-xs font-bold text-emerald-600">{{ explode(' ', $rel['interest_range'])[0] }}</span>
                    </div>
                    <div class="text-base font-extrabold text-[#062B59] group-hover:text-[#1677FF] transition-colors">
                        {{ $rel['name'] }}
                    </div>
                    <p class="text-xs text-slate-500 mt-1 line-clamp-1">{{ $rel['tagline'] }}</p>
                </a>
                @endforeach
            </div>
        </div>
    </section>

@endsection
