<!-- SECTION 15 / 17: COMPLETE PREMIUM FOOTER -->
<footer class="bg-[#031B3B] text-slate-300 pt-16 pb-12 border-t border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- 5 Columns Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-8 lg:gap-10 pb-12 border-b border-slate-800/80">
            
            <!-- Column 1: Brand & Logo (Col 4) -->
            <div class="lg:col-span-4 space-y-4">
                <a href="{{ route('home') }}" class="inline-block group" aria-label="ProcessingFreeLoan.com Home">
                    <div class="logo-footer-wrapper p-2 sm:p-2.5 shadow-sm">
                        <img src="{{ asset('images/logo.png') }}" 
                             alt="ProcessingFreeLoan.com - Loan Without Processing Fee" 
                             class="h-9 sm:h-11 w-auto max-w-[200px] object-contain">
                    </div>
                </a>

                <p class="text-xs sm:text-sm text-slate-400 leading-relaxed max-w-sm">
                    ProcessingFreeLoan.com is a specialized digital loan aggregator in India helping salaried employees, businesses, doctors, and chartered accountants secure the right credit from 23+ leading Banks & NBFCs — with exclusive zero processing fee promotional offers.
                </p>

                <div class="text-xs text-slate-400 font-semibold">
                    A Unit Of <strong class="text-white">{{ $brand['company_identity'] ?? 'Unit Of Findeal Financial Private Limited' }}</strong>
                </div>

                <!-- Social Channels -->
                <div class="flex items-center space-x-3 pt-1">
                    <a href="{{ $brand['social']['facebook'] ?? '#' }}" target="_blank" rel="noopener" aria-label="Facebook" class="w-8 h-8 rounded-full bg-slate-800/80 hover:bg-[#1677FF] text-slate-300 hover:text-white flex items-center justify-center transition-all">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg>
                    </a>
                    <a href="{{ $brand['social']['instagram'] ?? '#' }}" target="_blank" rel="noopener" aria-label="Instagram" class="w-8 h-8 rounded-full bg-slate-800/80 hover:bg-pink-600 text-slate-300 hover:text-white flex items-center justify-center transition-all">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                    <a href="{{ $brand['social']['youtube'] ?? '#' }}" target="_blank" rel="noopener" aria-label="YouTube" class="w-8 h-8 rounded-full bg-slate-800/80 hover:bg-red-600 text-slate-300 hover:text-white flex items-center justify-center transition-all">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                    </a>
                    <a href="{{ $brand['social']['linkedin'] ?? '#' }}" target="_blank" rel="noopener" aria-label="LinkedIn" class="w-8 h-8 rounded-full bg-slate-800/80 hover:bg-[#0077B5] text-slate-300 hover:text-white flex items-center justify-center transition-all">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                    </a>
                </div>
            </div>

            <!-- Column 2: Loan Products (Col 2) -->
            <div class="lg:col-span-2 space-y-4">
                <h4 class="text-sm font-extrabold text-white uppercase tracking-wider">
                    Loan Products
                </h4>
                <ul class="space-y-2.5 text-xs sm:text-sm font-medium">
                    <li><a href="{{ route('loans.personal') }}" class="hover:text-[#12C878] transition-colors">Personal Loan</a></li>
                    <li><a href="{{ route('loans.business') }}" class="hover:text-[#12C878] transition-colors">Business Loan</a></li>
                    <li><a href="{{ route('loans.new-car') }}" class="hover:text-[#12C878] transition-colors">New Car Loan</a></li>
                    <li><a href="{{ route('loans.used-car') }}" class="hover:text-[#12C878] transition-colors">Used Car Loan</a></li>
                    <li><a href="{{ route('loans.doctor') }}" class="hover:text-[#12C878] transition-colors">Doctor Loan</a></li>
                    <li><a href="{{ route('loans.ca') }}" class="hover:text-[#12C878] transition-colors">CA Loan</a></li>
                </ul>
            </div>

            <!-- Column 3: Quick Links (Col 2) -->
            <div class="lg:col-span-2 space-y-4">
                <h4 class="text-sm font-extrabold text-white uppercase tracking-wider">
                    Quick Links
                </h4>
                <ul class="space-y-2.5 text-xs sm:text-sm font-medium">
                    <li><a href="{{ route('home') }}" class="hover:text-[#12C878] transition-colors">Home</a></li>
                    <li><a href="{{ route('pages.about') }}" class="hover:text-[#12C878] transition-colors">About Us</a></li>
                    <li><a href="{{ route('partners.index') }}" class="hover:text-[#12C878] transition-colors">Our Partners</a></li>
                    <li><a href="{{ route('pages.contact') }}" class="hover:text-[#12C878] transition-colors">Contact Us</a></li>
                    <li><a href="{{ route('home') }}#faqs" class="hover:text-[#12C878] transition-colors">FAQ</a></li>
                    <li><a href="{{ route('blog.index') }}" class="hover:text-[#12C878] transition-colors">Blog</a></li>
                </ul>
            </div>

            <!-- Column 4: Official Contact Information (Col 2) -->
            <div class="lg:col-span-2 space-y-4">
                <h4 class="text-sm font-extrabold text-white uppercase tracking-wider">
                    Contact Information
                </h4>
                <div class="space-y-3 text-xs sm:text-sm text-slate-400">
                    
                    <div>
                        <strong class="text-slate-200 block text-[11px] uppercase tracking-wider mb-0.5">REGISTERED OFFICE:</strong>
                        <p class="leading-relaxed text-slate-400 text-xs break-words">
                            {{ $brand['registered_office'] ?? 'Khata No. 3429, Premer Danga, Near PDB High School, Khattimari, Cooch Behar, West Bengal – 736171, India.' }}
                        </p>
                        <a href="{{ $brand['google_maps_url'] ?? 'https://maps.google.com/?q=Premer+Danga+Khattimari+Cooch+Behar+West+Bengal+736171' }}" 
                           target="_blank" 
                           rel="noopener"
                           class="inline-flex items-center gap-1.5 text-xs font-bold text-[#12C878] hover:underline mt-1.5">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <span>Get Directions</span>
                        </a>
                    </div>

                    <div class="pt-1">
                        <strong class="text-slate-200 block text-[11px] uppercase tracking-wider mb-0.5">Helpline:</strong>
                        <a href="{{ $brand['phone_url'] ?? 'tel:+917074906556' }}" class="text-white hover:text-[#12C878] transition-colors font-bold text-xs flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 text-[#12C878]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <span>{{ $brand['phone'] ?? '+91 7074906556' }}</span>
                        </a>
                    </div>

                    <div>
                        <strong class="text-slate-200 block text-[11px] uppercase tracking-wider mb-0.5">Email Us:</strong>
                        <a href="{{ $brand['email_url'] ?? 'mailto:support@processingfreeloan.com' }}" class="text-slate-300 hover:text-white transition-colors text-xs break-all sm:break-normal block">
                            {{ $brand['email'] ?? 'support@processingfreeloan.com' }}
                        </a>
                    </div>

                </div>
            </div>

            <!-- Column 5: Newsletter Form (Col 2) -->
            <div class="lg:col-span-2 space-y-4"
                 x-data="{ email: '', subscribed: false, subscribe() { if (this.email) { this.subscribed = true; } } }">
                <h4 class="text-sm font-extrabold text-white uppercase tracking-wider">
                    Get Loan Updates
                </h4>
                <p class="text-xs text-slate-400">
                    Subscribe to receive latest bank rate cuts, festival offers and zero-fee alerts.
                </p>

                <template x-if="!subscribed">
                    <form @submit.prevent="subscribe()" class="space-y-2">
                        <input type="email" 
                               x-model="email" 
                               required 
                               placeholder="Enter your email" 
                               class="w-full px-3.5 py-2.5 rounded-xl bg-slate-800/90 text-white placeholder-slate-500 text-xs border border-slate-700 focus:border-[#12C878] outline-none">
                        <button type="submit" 
                                class="w-full py-2.5 rounded-xl bg-[#12C878] hover:bg-[#0fa863] text-white text-xs font-bold transition-all flex items-center justify-center gap-1.5 shadow-md">
                            <span>Subscribe</span>
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </button>
                    </form>
                </template>

                <template x-if="subscribed">
                    <div class="p-3 rounded-xl bg-emerald-950/80 border border-emerald-700/60 text-emerald-300 text-xs font-semibold">
                        ✓ Subscribed! You will receive priority zero-fee loan alerts.
                    </div>
                </template>
            </div>

        </div>

        <!-- Financial Services Mandatory Legal Disclaimer -->
        <div class="py-6 text-[11px] text-slate-400 leading-relaxed border-b border-slate-800/80 space-y-2">
            <p>
                <strong class="text-slate-300">Financial Services Disclaimer:</strong> ProcessingFreeLoan.com is a unit of Findeal Financial Private Limited, operating as an independent financial technology aggregator and digital loan facilitator in India. We connect consumers with RBI-registered Banks and Non-Banking Financial Companies (NBFCs). We do not directly lend money or disburse loans. All credit underwriting decisions, sanction limits, interest rates, tenure durations, and processing fee waivers are governed entirely by the lending policies and discretionary risk appraisal of the respective Bank or NBFC.
            </p>
        </div>

        <!-- Bottom Copyright & Developer Credit (Strict Horizontal Row on Desktop) -->
        <div class="pt-6 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-400">
            
            <!-- LEFT: Copyright & Company Identity -->
            <div class="text-center sm:text-left">
                <span>© 2026 ProcessingFreeLoan.com. All rights reserved.</span>
                <span class="block sm:inline sm:ml-1 text-slate-500 font-medium">Unit Of Findeal Financial Private Limited</span>
            </div>

            <!-- CENTER: Legal Links -->
            <div class="flex items-center space-x-4 font-medium">
                <a href="{{ route('legal.privacy') }}" class="hover:text-white transition-colors">Privacy Policy</a>
                <span>•</span>
                <a href="{{ route('legal.terms') }}" class="hover:text-white transition-colors">Terms & Conditions</a>
                <span>•</span>
                <a href="{{ route('legal.disclaimer') }}" class="hover:text-white transition-colors">Disclaimer</a>
            </div>

            <!-- RIGHT: Developed By Tech Googly Credit -->
            <div class="text-center sm:text-right font-medium">
                <span>Developed By </span>
                <a href="https://techgoogly.com/" target="_blank" rel="noopener" class="text-white font-bold hover:text-[#12C878] transition-colors underline decoration-slate-600 hover:decoration-[#12C878]">
                    Tech Googly
                </a>
            </div>

        </div>

    </div>
</footer>
