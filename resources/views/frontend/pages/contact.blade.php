@extends('frontend.layouts.app')

@section('title', 'Contact Us | ProcessingFreeLoan.com Customer Support Desk')
@section('meta_description', 'Contact ProcessingFreeLoan.com for loan assistance, eligibility verification, bank tie-up queries, or zero-fee loan application follow-ups.')

@section('content')

    <!-- Header Banner -->
    <section class="bg-gradient-to-b from-[#031B3B] via-[#062B59] to-[#042045] text-white pt-16 pb-20 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-bold uppercase tracking-wider mb-4">
                <span class="w-2 h-2 rounded-full bg-[#12C878]"></span>
                <span>Customer Care & Loan Desk</span>
            </div>
            <h1 class="text-3xl sm:text-5xl font-extrabold text-white tracking-tight">
                Get in Touch With Us
            </h1>
            <p class="mt-4 text-base sm:text-lg text-slate-300 max-w-2xl mx-auto">
                Have a question about loan schemes, documents or eligibility? Our senior loan advisors are here to help.
            </p>
        </div>
    </section>

    <!-- Contact Grid -->
    <section class="py-16 sm:py-20 bg-[#F5F9FF]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
                
                <!-- Contact Information Column (Col 5) -->
                <div class="lg:col-span-5 space-y-6">
                    <div class="bg-white rounded-3xl p-8 border border-slate-200/80 shadow-md space-y-6">
                        <h2 class="text-2xl font-extrabold text-[#062B59]">
                            Direct Communication
                        </h2>
                        
                        <div class="space-y-4 text-sm text-slate-700">
                            
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-xl bg-blue-50 text-[#1677FF] flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                </div>
                                <div>
                                    <strong class="text-[#062B59] block">{{ $brand['office_label'] ?? 'Corporate Office' }}</strong>
                                    <span class="text-xs text-slate-600 leading-relaxed block whitespace-pre-line">{{ $brand['corporate_office'] ?? $brand['registered_office'] ?? "1st Floor, Spencer Plaza,\nBurdwan Road, Siliguri – 734001,\nWest Bengal, India." }}</span>
                                    <a href="{{ $brand['google_maps_url'] ?? 'https://www.google.com/maps/search/?api=1&query=1st+Floor%2C+Spencer+Plaza%2C+Burdwan+Road%2C+Siliguri+734001%2C+West+Bengal%2C+India' }}" 
                                       target="_blank" 
                                       rel="noopener noreferrer" 
                                       class="inline-flex items-center gap-1.5 mt-2 px-3 py-1.5 rounded-lg bg-blue-50 text-[#1677FF] hover:bg-blue-100 text-xs font-bold transition-colors">
                                        <span>Get Directions</span>
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                    </a>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-xl bg-emerald-50 text-[#12C878] flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                </div>
                                <div class="space-y-2">
                                    <strong class="text-[#062B59] block">Customer Helplines</strong>
                                    <div class="flex flex-wrap gap-2 pt-0.5">
                                        <a href="{{ $brand['phone_primary_url'] ?? $brand['phone_url'] ?? 'tel:+919800210503' }}" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-emerald-50 text-emerald-700 hover:bg-emerald-100 border border-emerald-200/80 text-xs font-bold transition-all shadow-2xs">
                                            <svg class="w-3.5 h-3.5 text-[#12C878]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                            <span>Call 98002 10503</span>
                                        </a>
                                        <a href="{{ $brand['phone_secondary_url'] ?? 'tel:+917679096826' }}" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl bg-blue-50 text-[#1677FF] hover:bg-blue-100 border border-blue-200/80 text-xs font-bold transition-all shadow-2xs">
                                            <svg class="w-3.5 h-3.5 text-[#1677FF]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                            <span>Call 76790 96826</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-xl bg-blue-50 text-[#1677FF] flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                </div>
                                <div>
                                    <strong class="text-[#062B59] block">Support Email</strong>
                                    <a href="{{ $brand['email_url'] ?? 'mailto:support@processingfreeloan.com' }}" class="text-xs text-[#1677FF] font-semibold hover:underline block">
                                        {{ $brand['email'] ?? 'support@processingfreeloan.com' }}
                                    </a>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-xl bg-slate-100 text-slate-700 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                </div>
                                <div>
                                    <strong class="text-[#062B59] block">Operating Hours</strong>
                                    <span class="text-xs text-slate-500">{{ $brand['support_hours'] ?? 'Mon - Sat: 9:30 AM - 7:00 PM' }}</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Contact Message Form (Col 7) -->
                <div class="lg:col-span-7 bg-white rounded-3xl p-8 sm:p-10 border border-slate-200/80 shadow-md">
                    <h2 class="text-2xl font-extrabold text-[#062B59] mb-2">
                        Send Us an Enquiry Message
                    </h2>
                    <p class="text-xs text-slate-500 mb-6">
                        We respond to all customer enquiries within 2 business hours.
                    </p>

                    <form @submit.prevent="openEnquiry()" class="space-y-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-500 uppercase mb-1">Your Full Name</label>
                                <input type="text" required placeholder="e.g. Rahul Sharma" class="w-full h-11 px-3.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold outline-none focus:border-[#1677FF]">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-500 uppercase mb-1">Mobile Number</label>
                                <input type="tel" required maxlength="10" placeholder="10-digit number" class="w-full h-11 px-3.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold outline-none focus:border-[#1677FF]">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-500 uppercase mb-1">Email Address</label>
                                <input type="email" placeholder="name@example.com" class="w-full h-11 px-3.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold outline-none focus:border-[#1677FF]">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-500 uppercase mb-1">Subject</label>
                                <select class="w-full h-11 px-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold outline-none focus:border-[#1677FF]">
                                    <option>Zero Fee Loan Enquiry</option>
                                    <option>Eligibility Verification</option>
                                    <option>Lender Channel Partner Inquiry</option>
                                    <option>Existing Application Follow-Up</option>
                                    <option>General Feedback</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase mb-1">Your Message or Query</label>
                            <textarea rows="4" placeholder="How can we assist you with your loan requirements today?" class="w-full p-3.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold outline-none focus:border-[#1677FF]"></textarea>
                        </div>

                        <button type="submit" class="w-full py-3.5 rounded-xl bg-[#062B59] hover:bg-[#1677FF] text-white font-extrabold text-sm transition-colors shadow-md">
                            Submit Enquiry Message →
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </section>

@push('scripts')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "FinancialService",
  "name": "Processing Free Loan",
  "url": "{{ url('/') }}",
  "logo": "{{ asset('images/logo.png') }}",
  "description": "Zero processing fee loan aggregator platform in India.",
  "telephone": ["+91 98002 10503", "+91 76790 96826"],
  "address": {
    "@@type": "PostalAddress",
    "streetAddress": "1st Floor, Spencer Plaza, Burdwan Road",
    "addressLocality": "Siliguri",
    "postalCode": "734001",
    "addressRegion": "West Bengal",
    "addressCountry": "IN"
  },
  "hasMap": "https://www.google.com/maps/search/?api=1&query=1st+Floor%2C+Spencer+Plaza%2C+Burdwan+Road%2C+Siliguri+734001%2C+West+Bengal%2C+India"
}
</script>
@endpush

@endsection
