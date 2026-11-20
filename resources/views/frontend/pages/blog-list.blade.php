@extends('frontend.layouts.app')

@section('title', 'Loan Tips, Guides & Financial Insights | ProcessingFreeLoan.com')
@section('meta_description', 'Read guides on loan eligibility improvement, car loan comparisons, reducing-balance EMI calculations, and bank interest updates.')

@section('content')

    <!-- Header Banner -->
    <section class="bg-gradient-to-b from-[#031B3B] via-[#062B59] to-[#042045] text-white pt-16 pb-20 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-bold uppercase tracking-wider mb-4">
                <span class="w-2 h-2 rounded-full bg-[#12C878]"></span>
                <span>Financial Knowledge Hub</span>
            </div>
            <h1 class="text-3xl sm:text-5xl font-extrabold text-white tracking-tight">
                Latest Articles & Loan Updates
            </h1>
            <p class="mt-4 text-base sm:text-lg text-slate-300 max-w-2xl mx-auto">
                Actionable tips, step-by-step guides, and expert advice to help you borrow intelligently and maximize zero-fee offers.
            </p>
        </div>
    </section>

    <!-- Blog Grid -->
    <section class="py-16 sm:py-20 bg-[#F5F9FF]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($articles as $article)
                <article class="group bg-white rounded-3xl overflow-hidden shadow-xs hover:shadow-xl border border-slate-200/80 hover:border-blue-300 transition-all duration-300 flex flex-col justify-between transform hover:-translate-y-1.5">
                    <div>
                        <div class="relative h-52 w-full overflow-hidden bg-slate-100">
                            <img src="{{ $article['image'] }}" alt="{{ $article['title'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm text-[#062B59] px-3 py-1 rounded-full text-xs font-extrabold shadow-sm">
                                {{ $article['category'] }}
                            </div>
                        </div>

                        <div class="p-6">
                            <div class="flex items-center gap-3 text-xs text-slate-400 font-semibold mb-3">
                                <span>{{ $article['date'] }}</span>
                                <span>•</span>
                                <span>{{ $article['read_time'] }}</span>
                            </div>

                            <h2 class="text-xl font-extrabold text-[#062B59] group-hover:text-[#1677FF] transition-colors mb-3 leading-snug">
                                <a href="{{ route('blog.show', $article['slug']) }}">
                                    {{ $article['title'] }}
                                </a>
                            </h2>

                            <p class="text-xs sm:text-sm text-[#64748B] leading-relaxed">
                                {{ $article['excerpt'] }}
                            </p>
                        </div>
                    </div>

                    <div class="px-6 pb-6 pt-3 border-t border-slate-100">
                        <a href="{{ route('blog.show', $article['slug']) }}" class="text-xs font-bold text-[#1677FF] hover:underline inline-flex items-center gap-1">
                            <span>Read Full Article</span>
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>

@endsection
