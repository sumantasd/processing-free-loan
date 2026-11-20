@extends('frontend.layouts.app')

@section('title', $title . ' | ProcessingFreeLoan.com')

@section('content')

    <!-- Header Banner -->
    <section class="bg-gradient-to-b from-[#031B3B] to-[#062B59] text-white pt-16 pb-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight">
                {{ $title }}
            </h1>
            <p class="text-xs sm:text-sm text-slate-300 mt-2">
                Last updated: {{ $updated_at }} • ProcessingFreeLoan.com
            </p>
        </div>
    </section>

    <!-- Legal Prose Content -->
    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-slate-700 text-sm sm:text-base leading-relaxed space-y-8">
            
            @if(!empty($custom_content))
                <div class="prose max-w-none text-slate-700 leading-relaxed">
                    {!! $custom_content !!}
                </div>
            @elseif($type === 'privacy')
                <div>
                    <h2 class="text-xl font-bold text-[#062B59] mb-3">1. Information Collection</h2>
                    <p>ProcessingFreeLoan.com collects information you voluntarily provide when submitting a loan enquiry, including your name, contact phone number, email address, loan requirement, income details, and residential city. We also log standard technical data such as IP address and browser type for fraud prevention.</p>
                </div>

                <div>
                    <h2 class="text-xl font-bold text-[#062B59] mb-3">2. Use of Information</h2>
                    <p>We use your information solely to assess loan eligibility, connect you with authorized Banks and NBFCs, facilitate zero-processing-fee promotional loan options, and communicate updates regarding your application status via phone call, SMS, or WhatsApp.</p>
                </div>

                <div>
                    <h2 class="text-xl font-bold text-[#062B59] mb-3">3. Data Sharing & Security</h2>
                    <p>We do not sell, rent, or trade your personal information to third-party telemarketers. Information is shared strictly with RBI-regulated lending partners chosen based on your loan eligibility. All data transmitted through our portal is protected using 256-bit SSL encryption.</p>
                </div>

                <div>
                    <h2 class="text-xl font-bold text-[#062B59] mb-3">4. Cookies & Analytics</h2>
                    <p>Our website utilizes cookies and anonymous analytics to understand user behavior, optimize navigation performance, and measure marketing campaign effectiveness.</p>
                </div>

            @elseif($type === 'terms')
                <div>
                    <h2 class="text-xl font-bold text-[#062B59] mb-3">1. Acceptance of Terms</h2>
                    <p>By accessing or using ProcessingFreeLoan.com, you agree to comply with and be bound by these Terms and Conditions. If you disagree with any part of these terms, please refrain from using our website.</p>
                </div>

                <div>
                    <h2 class="text-xl font-bold text-[#062B59] mb-3">2. Scope of Services</h2>
                    <p>ProcessingFreeLoan.com acts as an independent loan referral platform and aggregator connecting prospective borrowers with Banks and NBFCs in India. We do not issue loans directly, determine interest rates, or guarantee loan approval.</p>
                </div>

                <div>
                    <h2 class="text-xl font-bold text-[#062B59] mb-3">3. User Representation & Authorization</h2>
                    <p>You confirm that all information provided in your loan enquiry is genuine, accurate, and up-to-date. By submitting an application, you grant express consent to ProcessingFreeLoan.com and partner lenders to contact you overriding National Do Not Call (NDNC) registration.</p>
                </div>

                <div>
                    <h2 class="text-xl font-bold text-[#062B59] mb-3">4. Limitation of Liability</h2>
                    <p>ProcessingFreeLoan.com is not liable for any delays, loan rejections, interest rate changes, or disputes arising between the borrower and the respective lending institution.</p>
                </div>

            @else
                <div>
                    <h2 class="text-xl font-bold text-[#062B59] mb-3">1. Non-Lender Disclaimer</h2>
                    <p>ProcessingFreeLoan.com is not a bank, non-banking financial company (NBFC), or money lender. We are a digital fintech aggregator providing comparison and loan assistance services. All loans are disbursed directly by Reserve Bank of India (RBI) regulated entities.</p>
                </div>

                <div>
                    <h2 class="text-xl font-bold text-[#062B59] mb-3">2. Zero Processing Fee Disclaimer</h2>
                    <p>Processing fee waiver offers displayed on this website are promotional schemes extended by select partner institutions for specific borrower profiles, credit score tiers, and festive windows. Final fee policies are governed solely by the lender’s sanction letter.</p>
                </div>

                <div>
                    <h2 class="text-xl font-bold text-[#062B59] mb-3">3. Credit Assessment & Approval</h2>
                    <p>Loan approval, final interest rates, credit limit sanction, and repayment tenures are at the sole discretion of the lending partner following internal credit appraisal, risk analysis, and KYC verification.</p>
                </div>
            @endif

        </div>
    </section>

@endsection
