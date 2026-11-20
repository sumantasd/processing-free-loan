@extends('frontend.layouts.app')

@section('title', 'About Us | ProcessingFreeLoan.com – Revolutionizing Indian Loan Aggregation')
@section('meta_description', 'Learn about ProcessingFreeLoan.com, our mission to eliminate unnecessary loan processing fees and connect Indian borrowers with top Banks and NBFCs.')

@section('content')

    <!-- Hero Banner -->
    <section class="bg-gradient-to-b from-[#031B3B] via-[#062B59] to-[#042045] text-white pt-16 pb-24 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-bold uppercase tracking-wider mb-4">
                <span class="w-2 h-2 rounded-full bg-[#12C878]"></span>
                <span>Our Purpose & Mission</span>
            </div>

            <h1 class="text-3xl sm:text-5xl font-extrabold text-white tracking-tight max-w-4xl mx-auto leading-tight">
                Empowering Indians to Borrow Smarter, <br>
                <span class="text-[#12C878]">Without Unfair Processing Fees</span>
            </h1>

            <p class="mt-4 text-base sm:text-lg text-slate-300 max-w-2xl mx-auto leading-relaxed">
                We believe that borrowers shouldn't be penalized with high upfront processing deductions when seeking essential financial credit.
            </p>
        </div>
    </section>

    <!-- Company Story & Mission -->
    <section class="py-16 sm:py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                <div class="lg:col-span-6 space-y-5 text-sm sm:text-base text-slate-700 leading-relaxed">
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-[#062B59] tracking-tight">
                        Built for Transparent, Digital-First Fintech Borrowing
                    </h2>

                    <p>
                        ProcessingFreeLoan.com was established with a singular vision: to bring complete transparency, zero friction, and maximum financial relief to Indian retail and MSME loan seekers. Traditional bank loan journeys are plagued by confusing rate structures and heavy administrative processing fees that take thousands out of approved funds.
                    </p>

                    <p>
                        By aggregating 23+ premier Banks and leading NBFCs on a unified algorithmic architecture, we empower customers to compare interest rates, match lender risk appetites, and secure zero-processing-fee promotional allocations.
                    </p>

                    <div class="pt-4 grid grid-cols-2 gap-4">
                        <div class="p-4 rounded-2xl bg-[#F5F9FF] border border-blue-100">
                            <div class="text-2xl font-extrabold text-[#1677FF]">100%</div>
                            <div class="text-xs font-bold text-slate-600 mt-1">Free Customer Service</div>
                        </div>
                        <div class="p-4 rounded-2xl bg-emerald-50/70 border border-emerald-100">
                            <div class="text-2xl font-extrabold text-[#12C878]">23+</div>
                            <div class="text-xs font-bold text-slate-600 mt-1">Banks & NBFC Partners</div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-6">
                    <div class="relative rounded-3xl overflow-hidden shadow-2xl border border-slate-200">
                        <img src="{{ asset('images/advisor-laptop.jpg') }}" alt="Fintech team collaborating" class="w-full h-[420px] object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#031B3B]/80 via-transparent to-transparent"></div>
                        <div class="absolute bottom-6 left-6 right-6 text-white text-xs font-semibold">
                            Registered Office: Khata No. 3429, Premer Danga, Near PDB High School, Khattimari, Cooch Behar, West Bengal – 736171, India.
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Core Values -->
    <section class="py-16 bg-[#F5F9FF] border-y border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-14">
                <h2 class="text-3xl font-extrabold text-[#062B59]">Our Core Principles</h2>
                <p class="mt-2 text-slate-500 text-sm">How we conduct our operations every day</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="p-8 rounded-3xl bg-white border border-slate-100 shadow-sm space-y-3">
                    <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-[#12C878] flex items-center justify-center font-bold text-lg">01</div>
                    <h3 class="text-lg font-extrabold text-[#062B59]">Zero Hidden Charges</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                        We never charge any consultation, processing, or application fee to borrowers. Every loan quote highlights all terms transparently.
                    </p>
                </div>

                <div class="p-8 rounded-3xl bg-white border border-slate-100 shadow-sm space-y-3">
                    <div class="w-12 h-12 rounded-2xl bg-blue-100 text-[#1677FF] flex items-center justify-center font-bold text-lg">02</div>
                    <h3 class="text-lg font-extrabold text-[#062B59]">Data Privacy & Security</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                        Your KYC documents and income proofs are protected with 256-bit bank-grade encryption and shared only with your approved lender.
                    </p>
                </div>

                <div class="p-8 rounded-3xl bg-white border border-slate-100 shadow-sm space-y-3">
                    <div class="w-12 h-12 rounded-2xl bg-indigo-100 text-[#0866E8] flex items-center justify-center font-bold text-lg">03</div>
                    <h3 class="text-lg font-extrabold text-[#062B59]">Unbiased Matching</h3>
                    <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                        We recommend loan products strictly based on which bank or NBFC provides you the lowest interest rate and highest approval likelihood.
                    </p>
                </div>
            </div>
        </div>
    </section>

@endsection
