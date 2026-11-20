<!-- SECTION 08: ADVANCED EMI CALCULATOR -->
<section id="emi-calculator" class="py-16 sm:py-20 lg:py-24 bg-white border-y border-slate-100"
         x-data="{
             amount: 500000,
             rate: 10.5,
             tenureYears: 5,
             
             formatINR(num) {
                 if (isNaN(num)) return '0';
                 let x = Math.round(num).toString();
                 let lastThree = x.substring(x.length - 3);
                 let otherNumbers = x.substring(0, x.length - 3);
                 if (otherNumbers != '') lastThree = ',' + lastThree;
                 return otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ',') + lastThree;
             },

             get monthlyRate() {
                 return (this.rate / 12) / 100;
             },

             get totalMonths() {
                 return this.tenureYears * 12;
             },

             get emi() {
                 let P = parseFloat(this.amount) || 0;
                 let r = this.monthlyRate;
                 let n = this.totalMonths;
                 if (P <= 0 || r <= 0 || n <= 0) return 0;
                 let top = P * r * Math.pow(1 + r, n);
                 let bottom = Math.pow(1 + r, n) - 1;
                 return bottom > 0 ? Math.round(top / bottom) : 0;
             },

             get totalPayment() {
                 return this.emi * this.totalMonths;
             },

             get totalInterest() {
                 return Math.max(0, this.totalPayment - (parseFloat(this.amount) || 0));
             },

             get principalPercent() {
                 if (this.totalPayment <= 0) return 100;
                 return Math.round(((parseFloat(this.amount) || 0) / this.totalPayment) * 100);
             },

             get interestPercent() {
                 return 100 - this.principalPercent;
             },

             resetDefaults() {
                 this.amount = 500000;
                 this.rate = 10.5;
                 this.tenureYears = 5;
             }
         }">
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="text-center max-w-3xl mx-auto mb-14">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-50 text-emerald-700 text-xs font-bold uppercase tracking-wider mb-3">
                <span class="w-2 h-2 rounded-full bg-[#12C878]"></span>
                <span>Financial Planning Tool</span>
            </div>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-[#062B59] tracking-tight">
                Advanced EMI Calculator
            </h2>
            <p class="mt-3 text-base sm:text-lg text-[#64748B]">
                Plan your loan better with our live interactive reducing-balance EMI calculator. Accurate, fast and 100% free.
            </p>
        </div>

        <!-- Calculator Container Card -->
        <div class="bg-gradient-to-br from-[#F5F9FF] to-white rounded-3xl p-6 sm:p-10 lg:p-12 shadow-xl border border-slate-200/80">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
                
                <!-- Left: Controls & Sliders (Col 5) -->
                <div class="lg:col-span-5 space-y-6">
                    
                    <!-- Slider 1: Loan Amount -->
                    <div class="bg-white p-5 rounded-2xl shadow-xs border border-slate-100 space-y-3">
                        <div class="flex items-center justify-between">
                            <label for="emiAmountInput" class="text-xs font-bold uppercase tracking-wider text-slate-500">
                                Loan Amount (₹)
                            </label>
                            <div class="relative">
                                <span class="text-xs font-bold text-slate-400 absolute left-2 top-2">₹</span>
                                <input type="number" 
                                       id="emiAmountInput"
                                       x-model="amount" 
                                       min="50000" 
                                       max="20000000" 
                                       step="10000"
                                       class="w-32 py-1 pl-5 pr-2 text-right font-extrabold text-sm text-[#062B59] bg-slate-50 border border-slate-200 rounded-lg focus:border-[#1677FF] outline-none">
                            </div>
                        </div>
                        <input type="range" 
                               min="50000" 
                               max="10000000" 
                               step="25000" 
                               x-model="amount" 
                               aria-label="Loan Amount Slider"
                               class="w-full h-2 bg-slate-200 rounded-lg appearance-none cursor-pointer">
                        <div class="flex justify-between text-[11px] font-semibold text-slate-400">
                            <span>₹50 K</span>
                            <span>₹50 Lakhs</span>
                            <span>₹1 Crore</span>
                        </div>
                    </div>

                    <!-- Slider 2: Interest Rate -->
                    <div class="bg-white p-5 rounded-2xl shadow-xs border border-slate-100 space-y-3">
                        <div class="flex items-center justify-between">
                            <label for="emiRateInput" class="text-xs font-bold uppercase tracking-wider text-slate-500">
                                Interest Rate (% p.a.)
                            </label>
                            <div class="relative">
                                <input type="number" 
                                       id="emiRateInput"
                                       x-model="rate" 
                                       min="8.0" 
                                       max="28.0" 
                                       step="0.1"
                                       class="w-24 py-1 px-2 text-right font-extrabold text-sm text-[#062B59] bg-slate-50 border border-slate-200 rounded-lg focus:border-[#1677FF] outline-none">
                                <span class="text-xs font-bold text-slate-400 ml-1">%</span>
                            </div>
                        </div>
                        <input type="range" 
                               min="8.0" 
                               max="24.0" 
                               step="0.25" 
                               x-model="rate" 
                               aria-label="Interest Rate Slider"
                               class="w-full h-2 bg-slate-200 rounded-lg appearance-none cursor-pointer">
                        <div class="flex justify-between text-[11px] font-semibold text-slate-400">
                            <span>8.0%</span>
                            <span>15.0%</span>
                            <span>24.0%</span>
                        </div>
                    </div>

                    <!-- Slider 3: Loan Tenure -->
                    <div class="bg-white p-5 rounded-2xl shadow-xs border border-slate-100 space-y-3">
                        <div class="flex items-center justify-between">
                            <label for="emiTenureInput" class="text-xs font-bold uppercase tracking-wider text-slate-500">
                                Loan Tenure (Years)
                            </label>
                            <div class="flex items-center gap-1">
                                <input type="number" 
                                       id="emiTenureInput"
                                       x-model="tenureYears" 
                                       min="1" 
                                       max="10" 
                                       step="1"
                                       class="w-20 py-1 px-2 text-right font-extrabold text-sm text-[#062B59] bg-slate-50 border border-slate-200 rounded-lg focus:border-[#1677FF] outline-none">
                                <span class="text-xs font-bold text-slate-400">Yrs</span>
                            </div>
                        </div>
                        <input type="range" 
                               min="1" 
                               max="8" 
                               step="1" 
                               x-model="tenureYears" 
                               aria-label="Loan Tenure Slider"
                               class="w-full h-2 bg-slate-200 rounded-lg appearance-none cursor-pointer">
                        <div class="flex justify-between text-[11px] font-semibold text-slate-400">
                            <span>1 Year (12 Mo)</span>
                            <span>4 Years</span>
                            <span>8 Years (96 Mo)</span>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center gap-3 pt-2">
                        <button type="button" 
                                @click="resetDefaults()" 
                                class="px-5 py-2.5 rounded-xl border border-slate-200 text-xs font-bold text-slate-600 hover:bg-slate-100 transition-colors">
                            Reset Values
                        </button>
                        <button type="button" 
                                @click="openEnquiry('personal-loan', '', amount)" 
                                class="flex-1 px-5 py-2.5 rounded-xl bg-[#12C878] hover:bg-[#0fa863] text-white text-xs font-bold shadow-md shadow-emerald-500/20 transition-all text-center">
                            Apply with this EMI →
                        </button>
                    </div>

                </div>

                <!-- Center: EMI Output Card (Col 4) -->
                <div class="lg:col-span-4 bg-gradient-to-b from-[#031B3B] to-[#062B59] text-white rounded-3xl p-6 sm:p-8 shadow-2xl relative overflow-hidden flex flex-col justify-between">
                    
                    <!-- Glow orb -->
                    <div class="absolute -top-20 -right-20 w-44 h-44 bg-[#12C878]/20 rounded-full blur-2xl"></div>

                    <div>
                        <!-- Monthly EMI Hero Number -->
                        <div class="text-center pb-6 border-b border-white/10">
                            <span class="text-xs font-bold tracking-widest uppercase text-emerald-400 block mb-1">
                                Your Monthly EMI
                            </span>
                            <div class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight flex items-center justify-center gap-1">
                                <span>₹</span>
                                <span x-text="formatINR(emi)">10,624</span>
                            </div>
                            <span class="text-[11px] text-slate-300 font-medium block mt-1">
                                For <span x-text="tenureYears">5</span> Years (<span x-text="totalMonths">60</span> monthly installments)
                            </span>
                        </div>

                        <!-- Breakdown Metrics -->
                        <div class="py-5 space-y-3.5 text-xs">
                            <div class="flex items-center justify-between text-slate-300">
                                <span class="flex items-center gap-2">
                                    <span class="w-2.5 h-2.5 rounded-full bg-[#1677FF]"></span>
                                    <span>Principal Amount</span>
                                </span>
                                <span class="font-extrabold text-white">₹ <span x-text="formatINR(amount)">5,00,000</span></span>
                            </div>

                            <div class="flex items-center justify-between text-slate-300">
                                <span class="flex items-center gap-2">
                                    <span class="w-2.5 h-2.5 rounded-full bg-[#12C878]"></span>
                                    <span>Total Interest</span>
                                </span>
                                <span class="font-extrabold text-emerald-300">₹ <span x-text="formatINR(totalInterest)">1,37,420</span></span>
                            </div>

                            <div class="flex items-center justify-between text-slate-300 pt-2 border-t border-white/10 font-bold">
                                <span>Total Amount Payable</span>
                                <span class="text-sm font-extrabold text-white">₹ <span x-text="formatINR(totalPayment)">6,37,420</span></span>
                            </div>
                        </div>

                        <!-- Visual Ratio Bar -->
                        <div class="space-y-1.5 pt-2">
                            <div class="h-2.5 w-full bg-slate-700 rounded-full overflow-hidden flex">
                                <div class="bg-[#1677FF] h-full transition-all duration-300" :style="'width: ' + principalPercent + '%'"></div>
                                <div class="bg-[#12C878] h-full transition-all duration-300" :style="'width: ' + interestPercent + '%'"></div>
                            </div>
                            <div class="flex justify-between text-[10px] text-slate-300 font-medium">
                                <span>Principal: <span x-text="principalPercent">78</span>%</span>
                                <span>Interest: <span x-text="interestPercent">22</span>%</span>
                            </div>
                        </div>
                    </div>

                    <!-- Instant Apply Button in EMI Card -->
                    <div class="mt-6 pt-4 border-t border-white/10">
                        <button type="button" 
                                @click="openEnquiry('personal-loan', '', amount)"
                                class="w-full py-3 rounded-xl font-extrabold text-xs text-white bg-gradient-to-r from-[#12C878] to-[#0fa863] hover:from-[#0fa863] hover:to-[#0c8e54] shadow-md shadow-emerald-500/30 transition-all flex items-center justify-center gap-2">
                            <span>Get Loan Without Fee</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </button>
                    </div>

                </div>

                <!-- Right: Financial Illustration (Col 3) -->
                <div class="lg:col-span-3 flex flex-col items-center justify-center text-center">
                    <img src="{{ asset('images/emi-illustration.svg') }}" 
                         alt="Financial loan EMI calculation illustration" 
                         class="w-full max-w-[280px] h-auto object-contain drop-shadow-md">
                    
                    <div class="mt-4 p-3 rounded-2xl bg-white border border-slate-100 shadow-xs max-w-[260px]">
                        <div class="text-[11px] font-bold text-[#062B59]">Zero Processing Fee Impact</div>
                        <div class="text-[10px] text-emerald-600 font-semibold mt-0.5">
                            Saves you an extra ₹5,000 to ₹35,000+ compared to conventional bank loans!
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>
