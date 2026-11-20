@extends('frontend.layouts.app')

@section('title', $product['title'] . ' Without Processing Fee | ProcessingFreeLoan.com')
@section('meta_description', $product['description'])

@section('content')

    <!-- Inner Hero Section -->
    <section class="bg-gradient-to-b from-[#031B3B] via-[#062B59] to-[#042045] text-white pt-14 pb-20 relative overflow-hidden">
        <div class="absolute inset-0 pointer-events-none opacity-20">
            <div class="absolute -top-20 left-1/3 w-96 h-96 bg-[#1677FF] rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 right-10 w-80 h-80 bg-[#12C878] rounded-full blur-3xl"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            
            <!-- Breadcrumbs -->
            <div class="flex items-center gap-2 text-xs font-semibold text-slate-400 mb-6">
                <a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a>
                <span>/</span>
                <span class="text-slate-300">Loan Products</span>
                <span>/</span>
                <span class="text-[#12C878]">{{ $product['title'] }}</span>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
                
                <div class="lg:col-span-8 space-y-5">
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-bold uppercase tracking-wider">
                        <span class="w-2 h-2 rounded-full bg-[#12C878]"></span>
                        <span>{{ $product['badge'] }}</span>
                    </div>

                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight leading-tight">
                        {{ $product['title'] }} <br>
                        <span class="text-[#12C878]">Without Processing Fee</span>
                    </h1>

                    <p class="text-base sm:text-lg text-slate-300 leading-relaxed max-w-2xl">
                        {{ $product['description'] }}
                    </p>

                    <!-- Fast Facts Banner -->
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 pt-2">
                        <div class="bg-white/10 rounded-2xl p-3 border border-white/10">
                            <div class="text-[10px] uppercase font-bold text-slate-300">Loan Amount</div>
                            <div class="text-sm font-extrabold text-white">{{ $product['amount_range'] }}</div>
                        </div>
                        <div class="bg-white/10 rounded-2xl p-3 border border-white/10">
                            <div class="text-[10px] uppercase font-bold text-slate-300">Interest Rate</div>
                            <div class="text-sm font-extrabold text-emerald-300">{{ $product['interest_rate'] }}</div>
                        </div>
                        <div class="bg-white/10 rounded-2xl p-3 border border-white/10">
                            <div class="text-[10px] uppercase font-bold text-slate-300">Tenure</div>
                            <div class="text-sm font-extrabold text-white">{{ $product['tenure'] }}</div>
                        </div>
                        <div class="bg-white/10 rounded-2xl p-3 border border-white/10">
                            <div class="text-[10px] uppercase font-bold text-slate-300">Fee Scheme</div>
                            <div class="text-sm font-extrabold text-emerald-300">Zero Fee Promo*</div>
                        </div>
                    </div>

                    <div class="pt-4 flex flex-wrap gap-4">
                        <button type="button" 
                                @click="openEnquiry('{{ $product['slug'] }}')"
                                class="px-8 py-3.5 rounded-full font-extrabold text-sm text-white bg-[#12C878] hover:bg-[#0fa863] shadow-lg shadow-emerald-500/25 transition-all">
                            Apply for {{ $product['title'] }} Now →
                        </button>
                        <a href="#eligible-lenders" 
                           class="px-6 py-3.5 rounded-full font-bold text-sm text-white bg-white/10 hover:bg-white/20 border border-white/20 transition-all">
                            View Matching Lenders
                        </a>
                    </div>
                </div>

                <!-- Right Quick Lead Form on Hero -->
                <div class="lg:col-span-4 bg-white text-[#102B50] rounded-3xl p-6 shadow-2xl border border-slate-100">
                    <div class="text-center pb-4 border-b border-slate-100 mb-4">
                        <h3 class="text-lg font-extrabold text-[#062B59]">Instant Eligibility Check</h3>
                        <p class="text-xs text-slate-500">Get pre-approved without fee</p>
                    </div>

                    <div class="space-y-3">
                        <div>
                            <label class="block text-[11px] font-bold text-slate-500 uppercase">Selected Loan</label>
                            <input type="text" readonly value="{{ $product['title'] }}" class="w-full h-10 px-3 bg-slate-100 rounded-xl text-xs font-bold text-[#062B59] outline-none">
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold text-slate-500 uppercase">Loan Amount Needed (₹)</label>
                            <input type="number" placeholder="500000" class="w-full h-10 px-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold outline-none focus:border-[#1677FF]">
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold text-slate-500 uppercase">Mobile Number</label>
                            <input type="tel" placeholder="10-digit mobile" maxlength="10" class="w-full h-10 px-3 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold outline-none focus:border-[#1677FF]">
                        </div>
                        <button type="button" 
                                @click="openEnquiry('{{ $product['slug'] }}')"
                                class="w-full py-3 rounded-xl bg-gradient-to-r from-[#0866E8] to-[#1677FF] text-white font-extrabold text-xs shadow-md transition-all mt-2">
                            Check Zero Fee Sanction →
                        </button>
                        <div class="text-[10px] text-center text-slate-400">🔒 100% Confidential • No credit score impact</div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Key Benefits & Features -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-12">
                <h2 class="text-3xl font-extrabold text-[#062B59]">
                    Key Benefits of Our {{ $product['title'] }}
                </h2>
                <p class="mt-2 text-slate-500 text-sm">
                    Why thousands of customers choose ProcessingFreeLoan.com for their financing needs.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($product['key_benefits'] as $idx => $benefit)
                <div class="p-6 rounded-2xl bg-[#F8FAFC] border border-slate-100 flex items-start gap-3">
                    <span class="w-6 h-6 rounded-full bg-emerald-100 text-[#12C878] flex items-center justify-center text-xs font-bold flex-shrink-0 mt-0.5">✓</span>
                    <p class="text-sm font-semibold text-slate-800 leading-relaxed">{{ $benefit }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Eligibility Criteria & Documents Required -->
    <section class="py-16 bg-[#F5F9FF] border-y border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                
                <!-- Eligibility Box -->
                <div class="bg-white rounded-3xl p-8 shadow-xs border border-slate-100 space-y-5">
                    <div class="flex items-center gap-3 pb-3 border-b border-slate-100">
                        <div class="w-10 h-10 rounded-xl bg-emerald-100 text-[#12C878] flex items-center justify-center font-bold">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <h3 class="text-xl font-extrabold text-[#062B59]">Eligibility Criteria</h3>
                    </div>

                    <ul class="space-y-3.5 text-xs sm:text-sm text-slate-700">
                        @foreach($product['eligibility'] as $item)
                        <li class="flex items-start gap-2.5">
                            <span class="text-[#12C878] font-bold">●</span>
                            <span>{{ $item }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Documents Box -->
                <div class="bg-white rounded-3xl p-8 shadow-xs border border-slate-100 space-y-5">
                    <div class="flex items-center gap-3 pb-3 border-b border-slate-100">
                        <div class="w-10 h-10 rounded-xl bg-blue-100 text-[#1677FF] flex items-center justify-center font-bold">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        </div>
                        <h3 class="text-xl font-extrabold text-[#062B59]">Required Documents</h3>
                    </div>

                    <ul class="space-y-3.5 text-xs sm:text-sm text-slate-700">
                        @foreach($product['documents'] as $doc)
                        <li class="flex items-start gap-2.5">
                            <span class="text-[#1677FF] font-bold">●</span>
                            <span>{{ $doc }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    </section>

    <!-- Matching Lenders from Excel Data -->
    <section id="eligible-lenders" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-12">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-100 text-[#1677FF] text-xs font-bold uppercase tracking-wider mb-2">
                    <span>Lender Network</span>
                </div>
                <h2 class="text-3xl font-extrabold text-[#062B59]">
                    Top Banks & NBFCs Offering {{ $product['title'] }}
                </h2>
                <p class="mt-2 text-slate-500 text-sm">
                    Verified institutions configured in our platform based on authentic lending criteria.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($matchingLenders as $lender)
                <div class="p-6 rounded-2xl bg-[#F8FAFC] border border-slate-200/80 hover:border-blue-300 hover:shadow-lg transition-all flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-[10px] font-extrabold uppercase px-2 py-0.5 rounded-full {{ $lender['type'] === 'Bank' ? 'bg-blue-100 text-[#0866E8]' : 'bg-emerald-100 text-[#12C878]' }}">
                                {{ $lender['type'] }}
                            </span>
                            <span class="text-xs font-bold text-emerald-600">
                                {{ explode(' ', $lender['interest_range'])[0] ?? '10.50%' }}
                            </span>
                        </div>
                        <h4 class="text-lg font-extrabold text-[#062B59] mb-1">
                            {{ $lender['name'] }}
                        </h4>
                        <p class="text-xs text-slate-500 mb-4 line-clamp-2">
                            {{ $lender['tagline'] }}
                        </p>
                    </div>

                    <div class="pt-4 border-t border-slate-200 flex items-center justify-between">
                        <a href="{{ route('partners.show', $lender['slug']) }}" class="text-xs font-bold text-[#1677FF] hover:underline">
                            View Offer Details →
                        </a>
                        <button type="button" 
                                @click="openEnquiry('{{ $product['slug'] }}', '{{ $lender['name'] }}')"
                                class="px-3.5 py-1.5 rounded-lg text-xs font-bold text-white bg-[#062B59] hover:bg-[#1677FF] transition-colors">
                            Apply
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Related Loan Products -->
    <section class="py-14 bg-[#F5F9FF] border-t border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h3 class="text-xl font-extrabold text-[#062B59] mb-6">
                Explore Other Loan Categories
            </h3>
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4">
                @foreach($allProducts as $pKey => $otherProd)
                @if($pKey !== $product['slug'])
                <a href="{{ route('loans.' . str_replace(['-loan', 'loan'], '', $pKey)) }}" 
                   class="p-4 rounded-2xl bg-white border border-slate-100 hover:border-blue-300 shadow-xs hover:shadow-md transition-all text-center block group">
                    <div class="text-xs font-bold text-[#062B59] group-hover:text-[#1677FF] transition-colors">
                        {{ $otherProd['title'] }}
                    </div>
                    <div class="text-[11px] text-emerald-600 font-semibold mt-1">
                        {{ $otherProd['badge'] }}
                    </div>
                </a>
                @endif
                @endforeach
            </div>
        </div>
    </section>

@endsection
