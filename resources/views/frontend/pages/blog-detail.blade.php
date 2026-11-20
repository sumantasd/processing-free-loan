@extends('frontend.layouts.app')

@section('title', $article['title'] . ' | ProcessingFreeLoan.com')
@section('meta_description', $article['excerpt'])

@section('content')

    <!-- Article Header -->
    <section class="bg-gradient-to-b from-[#031B3B] via-[#062B59] to-[#042045] text-white pt-14 pb-20 relative overflow-hidden">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            
            <div class="flex items-center justify-center gap-2 text-xs font-semibold text-slate-400 mb-6">
                <a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a>
                <span>/</span>
                <a href="{{ route('blog.index') }}" class="hover:text-white transition-colors">Blog</a>
                <span>/</span>
                <span class="text-[#12C878]">{{ $article['category'] }}</span>
            </div>

            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-500/20 text-blue-300 text-xs font-bold uppercase tracking-wider mb-4">
                <span>{{ $article['category'] }}</span>
                <span>•</span>
                <span>{{ $article['read_time'] }}</span>
            </div>

            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight leading-tight">
                {{ $article['title'] }}
            </h1>

            <div class="mt-4 text-xs sm:text-sm text-slate-300">
                Published on {{ $article['date'] }} by ProcessingFreeLoan Research Desk
            </div>

        </div>
    </section>

    <!-- Article Body & Sidebar -->
    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Featured Image -->
            <div class="rounded-3xl overflow-hidden shadow-xl mb-10 -mt-16 relative z-20 border border-slate-100">
                <img src="{{ $article['image'] }}" alt="{{ $article['title'] }}" class="w-full h-80 sm:h-96 object-cover">
            </div>

            <!-- Content Prose -->
            <div class="prose prose-lg max-w-none text-slate-700 leading-relaxed space-y-6">
                <p class="text-lg font-medium text-slate-900 border-l-4 border-[#12C878] pl-4 italic">
                    {{ $article['excerpt'] }}
                </p>

                <p>
                    {{ $article['content'] }}
                </p>

                <h3 class="text-2xl font-extrabold text-[#062B59] pt-4">
                    Why Processing Fees Matter More Than You Think
                </h3>

                <p>
                    When calculating loan cost, most borrowers focus solely on interest rates. However, upfront processing charges of 1% to 3% can easily drain ₹15,000 to ₹60,000 from your disbursed funds immediately upon sanction. At ProcessingFreeLoan.com, our mission is to negotiate and curate exclusive promotional allocations that waive this fee entirely.
                </p>

                <div class="p-6 rounded-2xl bg-[#F5F9FF] border border-blue-100 my-6">
                    <h4 class="text-base font-extrabold text-[#062B59] mb-2">Key Takeaways for Indian Borrowers:</h4>
                    <ul class="text-xs sm:text-sm text-slate-700 space-y-2 list-disc pl-5">
                        <li>Maintain a CIBIL score of 700+ to qualify for zero-processing-fee tiers.</li>
                        <li>Do not submit multiple hard inquiries across multiple banks simultaneously.</li>
                        <li>Leverage festive and quarterly promotional lender tie-ups.</li>
                        <li>Consider total cost of credit rather than nominal interest alone.</li>
                    </ul>
                </div>
            </div>

            <!-- Call to Action Banner Inside Article -->
            <div class="mt-14 p-8 rounded-3xl bg-gradient-to-r from-[#031B3B] to-[#0866E8] text-white flex flex-col sm:flex-row items-center justify-between gap-6 shadow-xl">
                <div>
                    <h4 class="text-xl font-extrabold">Ready to compare zero-fee loan offers?</h4>
                    <p class="text-xs sm:text-sm text-blue-100 mt-1">Check pre-qualified rates from 23+ Banks & NBFCs in 2 minutes.</p>
                </div>
                <button type="button" 
                        @click="openEnquiry()"
                        class="px-8 py-3.5 rounded-full font-bold text-xs bg-[#12C878] text-white hover:bg-[#0fa863] transition-all flex-shrink-0">
                    Apply Now →
                </button>
            </div>

        </div>
    </section>

@endsection
