<!-- SECTION 14: LATEST ARTICLES & LOAN UPDATES -->
<section id="loan-guides" class="py-16 sm:py-20 lg:py-24 bg-white border-y border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-14 gap-4">
            <div>
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-blue-100 text-[#1677FF] text-xs font-bold uppercase tracking-wider mb-3">
                    <span>Loan Tips & Guides</span>
                </div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-[#062B59] tracking-tight">
                    Latest Articles & Loan Updates
                </h2>
                <p class="mt-2 text-base text-[#64748B]">
                    Read expert tips, eligibility insights and financial guides to make smarter borrowing decisions.
                </p>
            </div>
            
            <a href="{{ route('blog.index') }}" 
               class="inline-flex items-center gap-2 text-sm font-bold text-[#1677FF] hover:text-[#062B59] transition-colors self-start md:self-auto">
                <span>View All Articles</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>

        <!-- 3 Articles Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($articles as $article)
            <article class="group bg-white rounded-3xl overflow-hidden shadow-xs hover:shadow-xl border border-slate-100 hover:border-blue-200 transition-all duration-300 flex flex-col justify-between transform hover:-translate-y-1.5">
                
                <div>
                    <!-- Image -->
                    <div class="relative h-48 w-full overflow-hidden bg-slate-100">
                        <img src="{{ $article['image'] }}" 
                             alt="{{ $article['title'] }}" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm text-[#062B59] px-3 py-1 rounded-full text-xs font-extrabold shadow-sm">
                            {{ $article['category'] }}
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-6">
                        <div class="flex items-center gap-3 text-xs text-slate-400 font-semibold mb-3">
                            <span>{{ $article['date'] }}</span>
                            <span>•</span>
                            <span>{{ $article['read_time'] }}</span>
                        </div>

                        <h3 class="text-lg font-extrabold text-[#062B59] group-hover:text-[#1677FF] transition-colors mb-3 leading-snug">
                            <a href="{{ route('blog.show', $article['slug']) }}">
                                {{ $article['title'] }}
                            </a>
                        </h3>

                        <p class="text-xs sm:text-sm text-[#64748B] leading-relaxed line-clamp-3">
                            {{ $article['excerpt'] }}
                        </p>
                    </div>
                </div>

                <!-- Footer Link -->
                <div class="px-6 pb-6 pt-2 border-t border-slate-50">
                    <a href="{{ route('blog.show', $article['slug']) }}" 
                       class="inline-flex items-center gap-1.5 text-xs font-bold text-[#1677FF] group-hover:text-[#062B59] transition-colors">
                        <span>Read Full Guide</span>
                        <svg class="w-3.5 h-3.5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>

            </article>
            @endforeach
        </div>

    </div>
</section>
