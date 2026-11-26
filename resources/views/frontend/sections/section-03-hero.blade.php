<!-- SECTION 03: PREMIUM RESPONSIVE HERO SECTION (DESKTOP IMAGE 1 & MOBILE IMAGE 2 EXACT MATCH) -->
<section class="relative bg-gradient-to-b from-[#021838] via-[#04244E] to-[#021838] text-white pt-5 pb-10 sm:pt-8 sm:pb-14 lg:pt-10 lg:pb-20 overflow-hidden w-full">
    
    <!-- Ambient Background Glows & Architectural Dynamic Neon Ribbon Accents -->
    <div class="absolute inset-0 pointer-events-none overflow-hidden max-w-full">
        <!-- Ambient radial glow spots -->
        <div class="absolute -top-32 -left-24 w-80 sm:w-[480px] h-80 sm:h-[480px] bg-[#1677FF]/20 rounded-full blur-3xl"></div>
        <div class="absolute top-1/4 right-0 w-80 sm:w-[550px] h-80 sm:h-[550px] bg-[#12D878]/15 rounded-full blur-3xl animate-pulse-glow"></div>
        <div class="absolute -bottom-24 left-1/4 w-80 sm:w-[600px] h-60 sm:h-[400px] bg-[#0866E8]/20 rounded-full blur-3xl"></div>
        
        <!-- Subtle Vector Grid -->
        <svg class="absolute inset-0 w-full h-full opacity-[0.035]" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="hero-grid" width="48" height="48" patternUnits="userSpaceOnUse">
                    <path d="M 48 0 L 0 0 0 48" fill="none" stroke="#FFFFFF" stroke-width="1"/>
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#hero-grid)" />
        </svg>

        <!-- Dynamic Neon-Green & Cyan Curved Ribbons (Matching Desktop Reference 1 & Mobile Reference 2) -->
        <svg class="absolute inset-0 w-full h-full" viewBox="0 0 1440 560" fill="none" preserveAspectRatio="none">
            <defs>
                <linearGradient id="greenRibbonTop" x1="0%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0%" stop-color="#12D878" stop-opacity="0.9"/>
                    <stop offset="50%" stop-color="#2DF590" stop-opacity="0.6"/>
                    <stop offset="100%" stop-color="#00D2FF" stop-opacity="0"/>
                </linearGradient>
                <linearGradient id="greenRibbonBottom" x1="100%" y1="100%" x2="0%" y2="0%">
                    <stop offset="0%" stop-color="#12D878" stop-opacity="0.85"/>
                    <stop offset="60%" stop-color="#22E58B" stop-opacity="0.4"/>
                    <stop offset="100%" stop-color="#0866E8" stop-opacity="0"/>
                </linearGradient>
                <linearGradient id="cyanRibbonLeft" x1="0%" y1="100%" x2="100%" y2="0%">
                    <stop offset="0%" stop-color="#00D2FF" stop-opacity="0.7"/>
                    <stop offset="100%" stop-color="#0866E8" stop-opacity="0"/>
                </linearGradient>
                <filter id="ribbonGlow" x="-20%" y="-20%" width="140%" height="140%">
                    <feGaussianBlur stdDeviation="30"/>
                </filter>
            </defs>

            <!-- Top-Right Neon Green Sweeping Ribbon -->
            <path d="M 920 -40 C 1180 80, 1420 240, 1320 460" stroke="url(#greenRibbonTop)" stroke-width="70" stroke-linecap="round" filter="url(#ribbonGlow)" opacity="0.5"/>
            <path d="M 940 -20 C 1190 90, 1400 230, 1330 440" stroke="#12D878" stroke-width="4" stroke-linecap="round" opacity="0.75"/>

            <!-- Bottom-Right Neon Green Swoop wrapping underneath family & card -->
            <path d="M 1460 360 C 1280 470, 1080 510, 820 450" stroke="url(#greenRibbonBottom)" stroke-width="60" stroke-linecap="round" filter="url(#ribbonGlow)" opacity="0.6"/>
            <path d="M 1440 370 C 1270 475, 1070 515, 830 455" stroke="#2DF590" stroke-width="3.5" stroke-linecap="round" opacity="0.8"/>

            <!-- Bottom-Left Electric Cyan Accent Ribbon -->
            <path d="M -40 500 C 140 470, 320 440, 480 490" stroke="url(#cyanRibbonLeft)" stroke-width="50" stroke-linecap="round" filter="url(#ribbonGlow)" opacity="0.45"/>
            <path d="M -30 500 C 140 470, 310 445, 470 490" stroke="#00D2FF" stroke-width="3" stroke-linecap="round" opacity="0.6"/>
        </svg>
    </div>

    @php
        $heroSec = $homepageSections['hero'] ?? ($homepageSections['hero_banner'] ?? null);
        $heroBadge = $heroSec->badge ?? 'Your Trusted Financial Partner';
        if (strtoupper(trim($heroBadge)) === 'YOUR TRUSTED FINANCIAL PARTNER') {
            $heroBadge = 'Your Trusted Financial Partner';
        }
        $heroSubtitle = $heroSec->subtitle ?? 'Compare and apply for the best loan options from leading Banks & NBFCs. Get competitive offers, quick approval and expert support — all in one place.';
    @endphp

    <!-- ============================================================== -->
    <!-- 1. MOBILE HERO VIEW (STRICTLY MATCHING MOBILE REFERENCE IMAGE 2) -->
    <!-- ============================================================== -->
    <div class="block lg:hidden px-4 sm:px-6 relative z-10 w-full max-w-md mx-auto text-center">
        
        <!-- Top Badge: Your Trusted Financial Partner -->
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#03234b]/80 border border-cyan-400/40 text-white text-[11px] sm:text-xs font-semibold shadow-xs mb-3 backdrop-blur-sm">
            <span class="w-4 h-4 rounded-md bg-[#12D878] text-white flex items-center justify-center flex-shrink-0 shadow-xs">
                <svg class="w-2.5 h-2.5" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2L4 5v6.09c0 5.05 3.41 9.76 8 10.91 4.59-1.15 8-5.86 8-10.91V5l-8-3zm-1 14.5l-3.5-3.5 1.41-1.41L11 13.67l5.59-5.59 1.41 1.41L11 16.5z"/>
                </svg>
            </span>
            <span class="tracking-wide">{{ $heroBadge }}</span>
        </div>

        <!-- Main Heading (Centered with Neon Green Gradient & Curved Underline) -->
        <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight text-white leading-[1.18] text-center">
            @if(isset($heroSec) && $heroSec->title && str_contains($heroSec->title, 'Without Processing Fee'))
                {{ trim(str_replace('Without Processing Fee', '', $heroSec->title)) }} <br>
                <span class="relative inline-block mt-1">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#12D878] via-[#22E58B] to-[#2DF590] drop-shadow-[0_2px_15px_rgba(18,216,120,0.4)]">
                        Without Processing Fee
                    </span>
                    <!-- Curved green accent underline -->
                    <svg class="w-full h-2.5 sm:h-3 text-[#12D878] mt-0.5" viewBox="0 0 240 12" fill="none" preserveAspectRatio="none">
                        <path d="M2 9C70 2 170 2 238 9" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
                    </svg>
                </span>
            @elseif(isset($heroSec) && $heroSec->title)
                {!! $heroSec->title !!}
            @else
                Get Your Loan <br>
                <span class="relative inline-block mt-1">
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#12D878] via-[#22E58B] to-[#2DF590] drop-shadow-[0_2px_15px_rgba(18,216,120,0.4)]">
                        Without Processing Fee
                    </span>
                    <!-- Curved green accent underline -->
                    <svg class="w-full h-2.5 sm:h-3 text-[#12D878] mt-0.5" viewBox="0 0 240 12" fill="none" preserveAspectRatio="none">
                        <path d="M2 9C70 2 170 2 238 9" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
                    </svg>
                </span>
            @endif
        </h1>

        <!-- Subtitle Description Paragraph -->
        <p class="text-slate-200 text-xs sm:text-sm leading-relaxed max-w-sm mx-auto text-center mt-3 mb-4 font-normal">
            {{ $heroSubtitle }}
        </p>

        <!-- 3 Feature Chips (Horizontal single-row with dividers per Reference Image 2) -->
        <div class="inline-flex items-center justify-center gap-2 sm:gap-2.5 py-2 px-3 rounded-xl bg-white/5 border border-white/10 backdrop-blur-sm text-[11px] font-bold text-white mb-4 shadow-sm">
            <!-- Chip 1: Quick Approval -->
            <div class="flex items-center gap-1.5">
                <div class="w-5.5 h-5.5 rounded bg-[#12D878] text-white flex items-center justify-center flex-shrink-0 shadow-xs">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <span class="leading-tight text-left">Quick<br class="hidden sm:inline"> Approval</span>
            </div>

            <div class="h-4 w-px bg-white/20"></div>

            <!-- Chip 2: Competitive Interest Rates -->
            <div class="flex items-center gap-1.5">
                <div class="w-5.5 h-5.5 rounded bg-[#12D878] text-white flex items-center justify-center flex-shrink-0 font-extrabold text-xs shadow-xs">
                    %
                </div>
                <span class="leading-tight text-left">Competitive<br class="hidden sm:inline"> Rates</span>
            </div>

            <div class="h-4 w-px bg-white/20"></div>

            <!-- Chip 3: Safe & Secure Process -->
            <div class="flex items-center gap-1.5">
                <div class="w-5.5 h-5.5 rounded bg-[#12D878] text-white flex items-center justify-center flex-shrink-0 shadow-xs">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <span class="leading-tight text-left">Safe & Secure<br class="hidden sm:inline"> Process</span>
            </div>
        </div>

        <!-- Hero CTA Button: Neon Green Pill Button -->
        <div class="mb-5">
            <button type="button" 
                    @click="openEnquiry('personal-loan')"
                    class="w-full max-w-xs mx-auto flex items-center justify-center gap-2 px-6 py-3.5 rounded-full bg-gradient-to-r from-[#12D878] via-[#20E584] to-[#2BF08B] text-[#031B3B] font-extrabold text-sm sm:text-base shadow-[0_6px_25px_rgba(18,216,120,0.45)] hover:shadow-[0_8px_30px_rgba(18,216,120,0.6)] active:scale-95 transition-all cursor-pointer">
                <span>Apply for a Loan Now</span>
                <svg class="w-4.5 h-4.5 text-[#031B3B]" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
            </button>
        </div>

        <!-- Floating Status Badge: Loan Approved! Up to ₹50 Lakhs -->
        <div class="relative inline-flex items-center gap-2 px-4 py-2 bg-white rounded-2xl shadow-xl border border-white/90 mb-1 z-20">
            <div class="w-7 h-7 rounded-full bg-[#12D878] text-white flex items-center justify-center text-xs font-black flex-shrink-0 shadow-xs">✓</div>
            <div class="text-left">
                <div class="text-xs font-extrabold text-[#031B3B] leading-none">Loan Approved!</div>
                <div class="text-[10px] font-semibold text-slate-600 mt-0.5 leading-none">Up to ₹50 Lakhs</div>
            </div>
            <!-- 3 Curved accent strokes to the top-right matching reference -->
            <div class="absolute -top-3 -right-3 flex items-center pointer-events-none">
                <svg class="w-6 h-6 text-[#12D878]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round">
                    <path d="M14 3C16.5 5 17 8 16 11"/>
                    <path d="M18 5C20.5 7 21 11 19.5 14"/>
                    <path d="M21 8C23 10 23.5 14 22 17"/>
                </svg>
            </div>
        </div>

        <!-- Mobile Family Image: Crisp Naturally Blended Family Photo -->
        <div class="relative max-w-sm mx-auto -mt-2 z-10">
            <img src="{{ asset('images/hero-family.png') }}" 
                 alt="Happy Indian family smiling after loan approval" 
                 class="w-full h-auto object-contain object-bottom drop-shadow-2xl">
        </div>

        <!-- Bottom Benefits Dock: 4-Column Translucent Glass Dock -->
        <div class="w-full max-w-md mx-auto -mt-6 relative z-20 rounded-2xl bg-gradient-to-r from-[#031E44]/95 via-[#062B59]/95 to-[#031E44]/95 backdrop-blur-md border border-cyan-400/40 shadow-2xl p-2.5 sm:p-3">
            <div class="grid grid-cols-4 gap-1 text-center divide-x divide-white/10">
                <!-- Item 1: No Processing Fee -->
                <div class="px-1 flex flex-col items-center">
                    <div class="w-4.5 h-4.5 rounded-full bg-[#12D878] text-white flex items-center justify-center text-[10px] font-black mb-1 shadow-xs">✓</div>
                    <div class="text-[10px] sm:text-[11px] font-bold text-white leading-tight">No<br>Processing Fee</div>
                </div>

                <!-- Item 2: Multiple Banks & NBFCs -->
                <div class="px-1 flex flex-col items-center">
                    <div class="w-4.5 h-4.5 rounded-full bg-[#12D878] text-white flex items-center justify-center text-[10px] font-black mb-1 shadow-xs">✓</div>
                    <div class="text-[10px] sm:text-[11px] font-bold text-white leading-tight">Multiple<br>Banks & NBFCs</div>
                </div>

                <!-- Item 3: Simple Application -->
                <div class="px-1 flex flex-col items-center">
                    <div class="w-4.5 h-4.5 rounded-full bg-[#12D878] text-white flex items-center justify-center text-[10px] font-black mb-1 shadow-xs">✓</div>
                    <div class="text-[10px] sm:text-[11px] font-bold text-white leading-tight">Simple<br>Application</div>
                </div>

                <!-- Item 4: Expert Guidance -->
                <div class="px-1 flex flex-col items-center">
                    <div class="w-4.5 h-4.5 rounded-full bg-[#12D878] text-white flex items-center justify-center text-[10px] font-black mb-1 shadow-xs">✓</div>
                    <div class="text-[10px] sm:text-[11px] font-bold text-white leading-tight">Expert<br>Guidance</div>
                </div>
            </div>
        </div>

    </div>

    <!-- ================================================================ -->
    <!-- 2. DESKTOP HERO VIEW (STRICTLY MATCHING DESKTOP REFERENCE IMAGE 1) -->
    <!-- ================================================================ -->
    <div class="hidden lg:block max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full pt-4 pb-8">
        <div class="grid grid-cols-12 gap-6 lg:gap-8 items-center min-h-[480px]">
            
            <!-- Left Column: Content & Value Propositions (~55% width) -->
            <div class="col-span-12 lg:col-span-7 xl:col-span-7 space-y-6 text-left pr-2 xl:pr-6">
                
                <!-- Glass Pill Badge -->
                <div class="inline-flex items-center gap-2.5 px-4 py-1.5 rounded-full bg-[#03234d]/80 backdrop-blur-md border border-cyan-400/40 shadow-sm">
                    <span class="w-5 h-5 rounded-md bg-[#12D878] flex items-center justify-center text-white flex-shrink-0 shadow-xs">
                        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2L4 5v6.09c0 5.05 3.41 9.76 8 10.91 4.59-1.15 8-5.86 8-10.91V5l-8-3zm-1 14.5l-3.5-3.5 1.41-1.41L11 13.67l5.59-5.59 1.41 1.41L11 16.5z"/>
                        </svg>
                    </span>
                    <span class="text-white text-xs lg:text-sm font-semibold tracking-wide">
                        {{ $heroBadge }}
                    </span>
                </div>

                <!-- Main Heading (White + Vibrant Green Gradient + Curved Accent Underline) -->
                <h1 class="text-4xl sm:text-5xl lg:text-[52px] xl:text-[54px] font-extrabold tracking-tight text-white leading-[1.12]">
                    @if(isset($heroSec) && $heroSec->title && str_contains($heroSec->title, 'Without Processing Fee'))
                        {{ trim(str_replace('Without Processing Fee', '', $heroSec->title)) }} <br>
                        <span class="relative inline-block mt-1">
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#12D878] via-[#22E58B] to-[#2DF590] drop-shadow-[0_2px_15px_rgba(18,216,120,0.4)]">
                                Without Processing Fee
                            </span>
                            <!-- Curved green accent underline -->
                            <svg class="w-full h-3 lg:h-3.5 text-[#12D878] -mt-0.5" viewBox="0 0 280 14" fill="none" preserveAspectRatio="none">
                                <path d="M3 10C80 2 200 2 277 10" stroke="currentColor" stroke-width="3.5" stroke-linecap="round"/>
                            </svg>
                        </span>
                    @elseif(isset($heroSec) && $heroSec->title)
                        {!! $heroSec->title !!}
                    @else
                        Get Your Loan <br>
                        <span class="relative inline-block mt-1">
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#12D878] via-[#22E58B] to-[#2DF590] drop-shadow-[0_2px_15px_rgba(18,216,120,0.4)]">
                                Without Processing Fee
                            </span>
                            <!-- Curved green accent underline -->
                            <svg class="w-full h-3 lg:h-3.5 text-[#12D878] -mt-0.5" viewBox="0 0 280 14" fill="none" preserveAspectRatio="none">
                                <path d="M3 10C80 2 200 2 277 10" stroke="currentColor" stroke-width="3.5" stroke-linecap="round"/>
                            </svg>
                        </span>
                    @endif
                </h1>

                <!-- Description Paragraph -->
                <p class="text-slate-200 text-base lg:text-[17px] font-normal max-w-xl leading-relaxed">
                    {{ $heroSubtitle }}
                </p>

                <!-- 3 Feature Badges (Side-by-side matching Reference Image 1) -->
                <div class="flex items-center gap-5 lg:gap-7 pt-2">
                    
                    <!-- Feature 1: Quick Approval -->
                    <div class="flex items-center gap-2.5">
                        <div class="w-8 h-8 rounded-lg bg-[#12D878] text-white flex items-center justify-center flex-shrink-0 shadow-sm shadow-[#12D878]/30">
                            <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <div class="text-xs font-bold text-white leading-tight">
                            Quick<br><span class="font-medium text-slate-300">Approval</span>
                        </div>
                    </div>

                    <!-- Feature 2: Competitive Interest Rates -->
                    <div class="flex items-center gap-2.5">
                        <div class="w-8 h-8 rounded-lg bg-[#12D878] text-white flex items-center justify-center flex-shrink-0 font-extrabold text-sm shadow-sm shadow-[#12D878]/30">
                            %
                        </div>
                        <div class="text-xs font-bold text-white leading-tight">
                            Competitive<br><span class="font-medium text-slate-300">Interest Rates</span>
                        </div>
                    </div>

                    <!-- Feature 3: Safe & Secure Process -->
                    <div class="flex items-center gap-2.5">
                        <div class="w-8 h-8 rounded-lg bg-[#12D878] text-white flex items-center justify-center flex-shrink-0 shadow-sm shadow-[#12D878]/30">
                            <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                        <div class="text-xs font-bold text-white leading-tight">
                            Safe & Secure<br><span class="font-medium text-slate-300">Process</span>
                        </div>
                    </div>

                </div>

                <!-- Glowing CTA Button (Neon Green Pill) -->
                <div class="pt-2">
                    <button type="button" 
                            @click="openEnquiry('personal-loan')"
                            class="inline-flex items-center gap-3 px-8 py-3.5 rounded-full bg-gradient-to-r from-[#12D878] via-[#20E584] to-[#2BF08B] text-[#031B3B] font-extrabold text-base shadow-[0_6px_25px_rgba(18,216,120,0.45)] hover:shadow-[0_8px_32px_rgba(18,216,120,0.65)] hover:scale-105 active:scale-95 transition-all duration-200 cursor-pointer">
                        <span>Apply for a Loan Now</span>
                        <svg class="w-5 h-5 text-[#031B3B]" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </button>
                </div>

            </div>

            <!-- Right Column: Visual Composition with Family & Floating Badges (~45% width) -->
            <div class="col-span-12 lg:col-span-5 xl:col-span-5 relative flex items-center justify-center lg:justify-end">
                
                <div class="relative w-full max-w-[520px]">
                    
                    <!-- Ambient Backlight Glow behind family -->
                    <div class="absolute inset-0 bg-gradient-to-tr from-[#0866E8]/25 via-transparent to-[#12D878]/25 rounded-3xl filter blur-3xl transform scale-95 pointer-events-none"></div>

                    <!-- Floating Badge 1: Top Left above Father's head (Loan Approved! Up to ₹50 Lakhs) -->
                    <div class="absolute -top-3 left-4 xl:left-2 z-20 bg-white text-[#031B3B] rounded-2xl shadow-2xl py-2 px-3.5 flex items-center gap-2.5 border border-white animate-float">
                        <div class="w-7 h-7 rounded-full bg-[#12D878] text-white flex items-center justify-center font-black text-xs flex-shrink-0 shadow-xs">✓</div>
                        <div>
                            <div class="text-xs font-extrabold text-[#031B3B] leading-none">Loan Approved!</div>
                            <div class="text-[11px] font-semibold text-slate-600 mt-0.5 leading-none">Up to ₹50 Lakhs</div>
                        </div>
                        <!-- 3 Curved accent strokes to the top-right matching reference -->
                        <div class="absolute -top-3 -right-3 flex items-center pointer-events-none">
                            <svg class="w-6 h-6 text-[#12D878]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round">
                                <path d="M14 3C16.5 5 17 8 16 11"/>
                                <path d="M18 5C20.5 7 21 11 19.5 14"/>
                                <path d="M21 8C23 10 23.5 14 22 17"/>
                            </svg>
                        </div>
                    </div>

                    <!-- Main Family Image: Crisp, Naturally Blended into Background -->
                    <div class="relative z-10 w-full max-w-[440px] xl:max-w-[480px] mx-auto">
                        <img src="{{ asset('images/hero-family.png') }}" 
                             alt="Happy Indian family smiling after loan approval" 
                             class="w-full h-auto object-contain object-bottom drop-shadow-[0_15px_35px_rgba(0,0,0,0.5)]">
                    </div>

                    <!-- Floating Badge 2: Right-side Benefits Glass Panel -->
                    <div class="absolute top-6 -right-2 xl:-right-6 z-20 bg-gradient-to-b from-[#062957]/85 to-[#021838]/90 backdrop-blur-md border border-cyan-400/40 rounded-2xl shadow-[0_12px_40px_rgba(0,0,0,0.45)] p-4 space-y-3.5 min-w-[215px]">
                        
                        <!-- Benefit 1: No Processing Fee -->
                        <div class="flex items-center gap-2.5 text-xs xl:text-[13px] font-bold text-white">
                            <div class="w-5.5 h-5.5 rounded-full bg-[#12D878] text-white flex items-center justify-center text-xs font-black flex-shrink-0 shadow-xs">✓</div>
                            <span>No Processing Fee</span>
                        </div>

                        <!-- Benefit 2: Multiple Banks & NBFCs -->
                        <div class="flex items-center gap-2.5 text-xs xl:text-[13px] font-bold text-white">
                            <div class="w-5.5 h-5.5 rounded-full bg-[#12D878] text-white flex items-center justify-center text-xs font-black flex-shrink-0 shadow-xs">✓</div>
                            <span>Multiple Banks & NBFCs</span>
                        </div>

                        <!-- Benefit 3: Simple Application -->
                        <div class="flex items-center gap-2.5 text-xs xl:text-[13px] font-bold text-white">
                            <div class="w-5.5 h-5.5 rounded-full bg-[#12D878] text-white flex items-center justify-center text-xs font-black flex-shrink-0 shadow-xs">✓</div>
                            <span>Simple Application</span>
                        </div>

                        <!-- Benefit 4: Expert Guidance -->
                        <div class="flex items-center gap-2.5 text-xs xl:text-[13px] font-bold text-white">
                            <div class="w-5.5 h-5.5 rounded-full bg-[#12D878] text-white flex items-center justify-center text-xs font-black flex-shrink-0 shadow-xs">✓</div>
                            <span>Expert Guidance</span>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>
</section>
