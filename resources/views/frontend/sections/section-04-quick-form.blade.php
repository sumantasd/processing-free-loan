<!-- SECTION 04: LOAN ELIGIBILITY QUICK FORM -->

<!-- ============================================== -->
<!-- 1. MOBILE QUICK FORM (ORDER 4, APP-LIKE CARD) -->
<!-- ============================================== -->
<div class="block lg:hidden rounded-t-[32px] sm:rounded-t-[40px] bg-white -mt-6 sm:-mt-8 pt-8 pb-5 px-4 sm:px-6 relative z-20 shadow-[0_-8px_30px_rgba(0,0,0,0.06)]"
     x-data="{
         quickLoanType: 'personal-loan',
         quickAmount: '500000',
         quickIncome: '50000',
         quickEmployment: 'salaried',
         errorMsg: '',
         submitQuickCheck() {
             if (!this.quickAmount || this.quickAmount < 10000) {
                 this.errorMsg = 'Please enter a valid loan amount (min ₹10,000)';
                 return;
             }
             this.errorMsg = '';
             $dispatch('open-modal', {
                 loan: this.quickLoanType,
                 bank: '',
                 amount: this.quickAmount
             });
         }
     }">
    
    <div class="mb-4 text-center">
        <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 text-emerald-600 text-[11px] font-extrabold uppercase tracking-wider mb-2">
            <span class="w-1.5 h-1.5 rounded-full bg-[#12C878] animate-pulse"></span>
            <span>Zero Processing Fee Priority</span>
        </div>
        <h3 class="text-xl sm:text-2xl font-extrabold text-[#062B59] tracking-tight">
            Check Your Loan Eligibility
        </h3>
        <p class="text-xs text-slate-500 font-medium max-w-xs mx-auto mt-1 leading-relaxed">
            Instant indicative quotes from 23+ Banks & NBFCs with zero processing fee offers.
        </p>
    </div>

    <form @submit.prevent="submitQuickCheck()" class="space-y-3 bg-slate-50/80 p-4 rounded-2xl border border-slate-100">
        
        <!-- Field 1: Loan Type -->
        <div>
            <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1">
                Loan Type
            </label>
            <div class="relative">
                <select x-model="quickLoanType" 
                        class="w-full h-11 pl-3 pr-8 bg-white border border-slate-200 rounded-xl text-xs sm:text-sm font-semibold text-[#102B50] focus:border-[#1677FF] outline-none appearance-none">
                    <option value="personal-loan">Personal Loan</option>
                    <option value="business-loan">Business Loan</option>
                    <option value="new-car-loan">New Car Loan</option>
                    <option value="used-car-loan">Used Car Loan</option>
                    <option value="doctor-loan">Doctor Loan</option>
                    <option value="ca-loan">CA Loan</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-slate-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </div>
            </div>
        </div>

        <!-- Field 2 & 3: Loan Amount & Monthly Income (2 Columns) -->
        <div class="grid grid-cols-2 gap-2.5">
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1">
                    Amount (₹)
                </label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-2.5 flex items-center text-xs font-bold text-slate-400 pointer-events-none">₹</span>
                    <input type="number" 
                           x-model="quickAmount" 
                           min="10000" 
                           max="100000000" 
                           step="10000"
                           placeholder="500000" 
                           class="w-full h-11 pl-6 pr-2 bg-white border border-slate-200 rounded-xl text-xs sm:text-sm font-semibold text-[#102B50] focus:border-[#1677FF] outline-none">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1">
                    Income (₹/mo)
                </label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-2.5 flex items-center text-xs font-bold text-slate-400 pointer-events-none">₹</span>
                    <input type="number" 
                           x-model="quickIncome" 
                           min="10000" 
                           max="5000000" 
                           step="5000"
                           placeholder="50000" 
                           class="w-full h-11 pl-6 pr-2 bg-white border border-slate-200 rounded-xl text-xs sm:text-sm font-semibold text-[#102B50] focus:border-[#1677FF] outline-none">
                </div>
            </div>
        </div>

        <!-- Field 4: Employment Type -->
        <div>
            <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1">
                Employment Type
            </label>
            <div class="relative">
                <select x-model="quickEmployment" 
                        class="w-full h-11 pl-3 pr-8 bg-white border border-slate-200 rounded-xl text-xs sm:text-sm font-semibold text-[#102B50] focus:border-[#1677FF] outline-none appearance-none">
                    <option value="salaried">Salaried Employee</option>
                    <option value="self_employed_professional">Professional (Dr/CA)</option>
                    <option value="self_employed_business">Business Owner / MSME</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-slate-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </div>
            </div>
        </div>

        <!-- Action Button -->
        <div class="pt-1">
            <button type="submit" 
                    class="w-full h-11 sm:h-12 rounded-xl font-extrabold text-sm text-white bg-[#12C878] hover:bg-[#0fa863] shadow-lg shadow-emerald-500/25 active:scale-98 transition-all flex items-center justify-center gap-2">
                <span>Check Eligibility Now</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </button>
        </div>

        <template x-if="errorMsg">
            <p class="text-xs text-rose-500 font-semibold" x-text="errorMsg"></p>
        </template>

        <div class="text-center text-[10px] text-slate-400 pt-0.5">
            🔒 Free & No Impact on Credit Score
        </div>

    </form>
</div>

<!-- ============================================== -->
<!-- 2. DESKTOP FLOATING FORM (LOCKED EXACTLY) -->
<!-- ============================================== -->
<div class="hidden lg:block relative z-30 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-16 mb-16">
    <div class="bg-white rounded-3xl shadow-2xl p-8 lg:p-10 border border-slate-100"
         x-data="{
             quickLoanType: 'personal-loan',
             quickAmount: '500000',
             quickIncome: '50000',
             quickEmployment: 'salaried',
             errorMsg: '',
             submitQuickCheck() {
                 if (!this.quickAmount || this.quickAmount < 10000) {
                     this.errorMsg = 'Please enter a valid loan amount (min ₹10,000)';
                     return;
                 }
                 this.errorMsg = '';
                 // Open lead enquiry modal pre-filled
                 $dispatch('open-modal', {
                     loan: this.quickLoanType,
                     bank: '',
                     amount: this.quickAmount
                 });
             }
         }">
        
        <div class="mb-6 flex flex-col md:flex-row md:items-center justify-between gap-2 border-b border-slate-100 pb-4">
            <div>
                <h3 class="text-xl sm:text-2xl font-extrabold text-[#062B59]">
                    Check Your Loan Eligibility
                </h3>
                <p class="text-sm text-slate-500 font-medium mt-0.5">
                    Instant indicative quotes from 23+ Banks & NBFCs with Zero Processing Fee offers
                </p>
            </div>
            <div class="inline-flex items-center gap-2 text-xs font-semibold text-emerald-600 bg-emerald-50 px-3 py-1.5 rounded-full self-start md:self-auto">
                <span class="w-2 h-2 rounded-full bg-[#12C878]"></span>
                <span>Free & No Impact on Credit Score</span>
            </div>
        </div>

        <form @submit.prevent="submitQuickCheck()" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 lg:gap-5 items-end">
            
            <!-- Field 1: Loan Type -->
            <div class="space-y-1.5">
                <label for="quickLoanType" class="block text-xs font-bold uppercase tracking-wider text-slate-500">
                    Loan Type
                </label>
                <div class="relative">
                    <select id="quickLoanType" 
                            x-model="quickLoanType" 
                            class="w-full h-12 pl-3.5 pr-8 bg-slate-50 hover:bg-slate-100/80 focus:bg-white text-sm font-semibold text-[#102B50] rounded-xl border border-slate-200 focus:border-[#1677FF] focus:ring-2 focus:ring-blue-100 transition-all outline-none appearance-none cursor-pointer">
                        <option value="personal-loan">Personal Loan</option>
                        <option value="business-loan">Business Loan</option>
                        <option value="new-car-loan">New Car Loan</option>
                        <option value="used-car-loan">Used Car Loan</option>
                        <option value="doctor-loan">Doctor Loan</option>
                        <option value="ca-loan">CA Loan</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </div>
                </div>
            </div>

            <!-- Field 2: Required Loan Amount -->
            <div class="space-y-1.5">
                <label for="quickAmount" class="block text-xs font-bold uppercase tracking-wider text-slate-500">
                    Required Loan Amount
                </label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-400 text-sm font-bold">₹</span>
                    <input type="number" 
                           id="quickAmount" 
                           x-model="quickAmount" 
                           min="10000" 
                           max="100000000" 
                           step="10000"
                           placeholder="500000"
                           class="w-full h-12 pl-8 pr-3.5 bg-slate-50 hover:bg-slate-100/80 focus:bg-white text-sm font-semibold text-[#102B50] rounded-xl border border-slate-200 focus:border-[#1677FF] focus:ring-2 focus:ring-blue-100 transition-all outline-none">
                </div>
            </div>

            <!-- Field 3: Monthly Net Income -->
            <div class="space-y-1.5">
                <label for="quickIncome" class="block text-xs font-bold uppercase tracking-wider text-slate-500">
                    Monthly Net Income
                </label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-400 text-sm font-bold">₹</span>
                    <input type="number" 
                           id="quickIncome" 
                           x-model="quickIncome" 
                           min="10000" 
                           max="5000000" 
                           step="5000"
                           placeholder="50000"
                           class="w-full h-12 pl-8 pr-3.5 bg-slate-50 hover:bg-slate-100/80 focus:bg-white text-sm font-semibold text-[#102B50] rounded-xl border border-slate-200 focus:border-[#1677FF] focus:ring-2 focus:ring-blue-100 transition-all outline-none">
                </div>
            </div>

            <!-- Field 4: Employment Type -->
            <div class="space-y-1.5">
                <label for="quickEmployment" class="block text-xs font-bold uppercase tracking-wider text-slate-500">
                    Employment Type
                </label>
                <div class="relative">
                    <select id="quickEmployment" 
                            x-model="quickEmployment" 
                            class="w-full h-12 pl-3.5 pr-8 bg-slate-50 hover:bg-slate-100/80 focus:bg-white text-sm font-semibold text-[#102B50] rounded-xl border border-slate-200 focus:border-[#1677FF] focus:ring-2 focus:ring-blue-100 transition-all outline-none appearance-none cursor-pointer">
                        <option value="salaried">Salaried Employee</option>
                        <option value="self_employed_professional">Self-Employed Professional (Dr/CA)</option>
                        <option value="self_employed_business">Business Owner / MSME</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </div>
                </div>
            </div>

            <!-- Field 5: Action Button -->
            <div>
                <button type="submit" 
                        class="w-full h-12 px-6 rounded-xl font-extrabold text-sm text-white bg-[#12C878] hover:bg-[#0fa863] shadow-lg shadow-emerald-500/25 hover:shadow-xl hover:shadow-emerald-500/35 transition-all duration-300 flex items-center justify-center gap-2 transform active:scale-98">
                    <span>Check Eligibility</span>
                    <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </button>
            </div>

        </form>

        <template x-if="errorMsg">
            <p class="text-xs text-rose-500 font-semibold mt-2.5" x-text="errorMsg"></p>
        </template>

    </div>
</div>
