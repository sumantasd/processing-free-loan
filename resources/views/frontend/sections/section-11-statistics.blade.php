<!-- SECTION 11: STATISTICS / TRUST SECTION -->
<section class="py-16 sm:py-20 bg-gradient-to-r from-[#031B3B] via-[#062B59] to-[#042045] text-white relative overflow-hidden">
    
    <!-- Background glowing aesthetics -->
    <div class="absolute inset-0 pointer-events-none opacity-20">
        <div class="absolute -top-24 left-1/4 w-96 h-96 bg-[#1677FF] rounded-full blur-3xl"></div>
        <div class="absolute -bottom-24 right-1/4 w-96 h-96 bg-[#12C878] rounded-full blur-3xl"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12 text-center divide-y lg:divide-y-0 lg:divide-x divide-white/10">
            
            @php
                $statIcons = [
                    'Happy Customers Assisted' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z',
                    'Banking & NBFC Partners' => 'M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z',
                    'Approval Rate Assistance' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
                    'Fast Processing Time' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'
                ];
            @endphp

            @foreach($stats as $stat)
            <div class="pt-6 lg:pt-0 px-4 space-y-2 group">
                <div class="w-12 h-12 mx-auto rounded-2xl bg-white/10 text-[#12C878] flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $statIcons[$stat['label']] ?? 'M13 10V3L4 14h7v7l9-11h-7z' }}"/>
                    </svg>
                </div>
                <div class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight">
                    {{ $stat['value'] }}
                </div>
                <div class="text-xs sm:text-sm font-bold text-slate-200">
                    {{ $stat['label'] }}
                </div>
                <div class="text-[11px] text-slate-400 font-medium">
                    {{ $stat['desc'] }}
                </div>
            </div>
            @endforeach

        </div>

    </div>
</section>
