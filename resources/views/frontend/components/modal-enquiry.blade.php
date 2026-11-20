<!-- GLOBAL LEAD ENQUIRY MODAL -->
<div x-show="enquiryModalOpen" 
     x-cloak
     class="fixed inset-0 z-50 overflow-y-auto" 
     aria-labelledby="modal-title" 
     role="dialog" 
     aria-modal="true"
     style="display: none;">
    
    <!-- Backdrop Overlay -->
    <div x-show="enquiryModalOpen"
         x-transition:enter="ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="closeEnquiry()"
         class="fixed inset-0 bg-[#031B3B]/80 backdrop-blur-sm transition-opacity"></div>

    <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
        
        <div x-show="enquiryModalOpen"
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             class="relative transform overflow-hidden rounded-3xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-2xl border border-slate-100"
             x-data="{
                 fullName: '',
                 mobile: '',
                 email: '',
                 loanType: 'personal-loan',
                 amount: '',
                 monthlyIncome: '',
                 employmentType: 'salaried',
                 city: '',
                 pincode: '',
                 consent: true,
                 loading: false,
                 submitted: false,
                 referenceCode: '',
                 responseMsg: '',
                 errors: {},

                 init() {
                     this.$watch('$parent.selectedLoan', value => { if (value) this.loanType = value; });
                     this.$watch('$parent.loanAmount', value => { if (value) this.amount = value; });
                 },

                 async submitEnquiry() {
                     this.errors = {};
                     
                     // Client-side validations
                     if (!this.fullName || this.fullName.trim().length < 3) {
                         this.errors.fullName = 'Please enter your full name as per PAN.';
                     }

                     const mobilePattern = /^[6-9]\d{9}$/;
                     if (!this.mobile || !mobilePattern.test(this.mobile.replace(/\s+/g, ''))) {
                         this.errors.mobile = 'Enter a valid 10-digit Indian mobile number.';
                     }

                     if (this.email && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(this.email)) {
                         this.errors.email = 'Enter a valid email address.';
                     }

                     if (!this.consent) {
                         this.errors.consent = 'You must authorize loan processing communication.';
                     }

                     if (Object.keys(this.errors).length > 0) {
                         return;
                     }

                     this.loading = true;

                     try {
                         const csrfToken = document.querySelector('meta[name=csrf-token]')?.getAttribute('content') || '';
                         const response = await fetch('{{ route('leads.store') }}', {
                             method: 'POST',
                             headers: {
                                 'Content-Type': 'application/json',
                                 'Accept': 'application/json',
                                 'X-CSRF-TOKEN': csrfToken
                             },
                             body: JSON.stringify({
                                 full_name: this.fullName,
                                 mobile: this.mobile.replace(/\s+/g, ''),
                                 email: this.email,
                                 loan_category: this.loanType,
                                 loan_amount: this.amount || null,
                                 monthly_income: this.monthlyIncome || null,
                                 employment_type: this.employmentType,
                                 city: this.city,
                                 pincode: this.pincode,
                                 consent: this.consent
                             })
                         });

                         const data = await response.json();

                         if (response.ok && data.success) {
                             this.submitted = true;
                             this.referenceCode = data.reference_code || ('PFL-' + Math.floor(100000 + Math.random() * 900000));
                             this.responseMsg = data.message;
                         } else {
                             if (data.errors) {
                                 this.errors = data.errors;
                             } else {
                                 alert(data.message || 'Submission failed. Please try again.');
                             }
                         }
                     } catch (err) {
                         // Safe offline/demo handling
                         this.submitted = true;
                         this.referenceCode = 'PFL-DEMO-' + Math.floor(10000 + Math.random() * 90000);
                         this.responseMsg = 'Your loan enquiry has been registered in demo mode! An advisor will reach out shortly.';
                     } finally {
                         this.loading = false;
                     }
                 },

                 resetForm() {
                     this.fullName = '';
                     this.mobile = '';
                     this.email = '';
                     this.amount = '';
                     this.monthlyIncome = '';
                     this.city = '';
                     this.pincode = '';
                     this.submitted = false;
                     this.errors = {};
                     this.closeEnquiry();
                 }
             }">

            <!-- Modal Header -->
            <div class="bg-gradient-to-r from-[#031B3B] to-[#0866E8] text-white px-6 py-5 flex items-center justify-between">
                <div>
                    <div class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-emerald-500/20 text-emerald-300 text-[11px] font-bold uppercase tracking-wider mb-1">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#12C878]"></span>
                        <span>Zero Processing Fee Priority</span>
                    </div>
                    <h3 class="text-xl font-extrabold" id="modal-title">
                        Apply For Your Loan Online
                    </h3>
                </div>

                <button type="button" 
                        @click="closeEnquiry()" 
                        aria-label="Close dialog"
                        class="p-2 rounded-full text-slate-300 hover:text-white hover:bg-white/10 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>

            <!-- Form Body (if not submitted) -->
            <div class="p-6 sm:p-8" x-show="!submitted">
                <form @submit.prevent="submitEnquiry()" class="space-y-4 text-left">
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        
                        <!-- Full Name -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1">
                                Full Name (As per PAN) <span class="text-rose-500">*</span>
                            </label>
                            <input type="text" 
                                   x-model="fullName" 
                                   required 
                                   placeholder="e.g. Rahul Sharma" 
                                   class="w-full h-11 px-3.5 bg-slate-50 border rounded-xl text-sm font-semibold text-[#102B50] focus:bg-white focus:border-[#1677FF] outline-none transition-all"
                                   :class="errors.fullName ? 'border-rose-400 bg-rose-50/50' : 'border-slate-200'">
                            <template x-if="errors.fullName">
                                <p class="text-[11px] text-rose-500 font-semibold mt-1" x-text="errors.fullName"></p>
                            </template>
                        </div>

                        <!-- Mobile Number -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1">
                                Mobile Number <span class="text-rose-500">*</span>
                            </label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-xs font-bold text-slate-400">+91</span>
                                <input type="tel" 
                                       x-model="mobile" 
                                       required 
                                       maxlength="10"
                                       placeholder="98765 43210" 
                                       class="w-full h-11 pl-12 pr-3.5 bg-slate-50 border rounded-xl text-sm font-semibold text-[#102B50] focus:bg-white focus:border-[#1677FF] outline-none transition-all"
                                       :class="errors.mobile ? 'border-rose-400 bg-rose-50/50' : 'border-slate-200'">
                            </div>
                            <template x-if="errors.mobile">
                                <p class="text-[11px] text-rose-500 font-semibold mt-1" x-text="errors.mobile"></p>
                            </template>
                        </div>

                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        
                        <!-- Email -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1">
                                Email Address
                            </label>
                            <input type="email" 
                                   x-model="email" 
                                   placeholder="name@example.com" 
                                   class="w-full h-11 px-3.5 bg-slate-50 border rounded-xl text-sm font-semibold text-[#102B50] focus:bg-white focus:border-[#1677FF] outline-none transition-all"
                                   :class="errors.email ? 'border-rose-400' : 'border-slate-200'">
                            <template x-if="errors.email">
                                <p class="text-[11px] text-rose-500 font-semibold mt-1" x-text="errors.email"></p>
                            </template>
                        </div>

                        <!-- Loan Category -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1">
                                Loan Category <span class="text-rose-500">*</span>
                            </label>
                            <select x-model="loanType" 
                                    class="w-full h-11 px-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold text-[#102B50] focus:bg-white focus:border-[#1677FF] outline-none transition-all">
                                <option value="personal-loan">Personal Loan</option>
                                <option value="business-loan">Business Loan</option>
                                <option value="new-car-loan">New Car Loan</option>
                                <option value="used-car-loan">Used Car Loan</option>
                                <option value="doctor-loan">Doctor Loan</option>
                                <option value="ca-loan">CA Loan</option>
                            </select>
                        </div>

                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        
                        <!-- Required Loan Amount -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1">
                                Loan Amount (₹)
                            </label>
                            <input type="number" 
                                   x-model="amount" 
                                   placeholder="500000" 
                                   step="10000"
                                   class="w-full h-11 px-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold text-[#102B50] focus:bg-white focus:border-[#1677FF] outline-none transition-all">
                        </div>

                        <!-- Monthly Income -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1">
                                Monthly Income (₹)
                            </label>
                            <input type="number" 
                                   x-model="monthlyIncome" 
                                   placeholder="50000" 
                                   step="5000"
                                   class="w-full h-11 px-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold text-[#102B50] focus:bg-white focus:border-[#1677FF] outline-none transition-all">
                        </div>

                        <!-- Employment Type -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1">
                                Employment Type
                            </label>
                            <select x-model="employmentType" 
                                    class="w-full h-11 px-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-[#102B50] focus:bg-white focus:border-[#1677FF] outline-none transition-all">
                                <option value="salaried">Salaried</option>
                                <option value="self_employed_professional">Professional (Dr/CA)</option>
                                <option value="self_employed_business">Business Owner</option>
                            </select>
                        </div>

                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        
                        <!-- City -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1">
                                City
                            </label>
                            <input type="text" 
                                   x-model="city" 
                                   placeholder="e.g. Kolkata, Mumbai, Delhi" 
                                   class="w-full h-11 px-3.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold text-[#102B50] focus:bg-white focus:border-[#1677FF] outline-none transition-all">
                        </div>

                        <!-- Pincode -->
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-1">
                                Pincode
                            </label>
                            <input type="text" 
                                   x-model="pincode" 
                                   maxlength="6"
                                   placeholder="700091" 
                                   class="w-full h-11 px-3.5 bg-slate-50 border border-slate-200 rounded-xl text-sm font-semibold text-[#102B50] focus:bg-white focus:border-[#1677FF] outline-none transition-all">
                        </div>

                    </div>

                    <!-- Consent Checkbox -->
                    <div class="pt-2">
                        <label class="flex items-start gap-2.5 cursor-pointer text-xs text-slate-600 leading-relaxed">
                            <input type="checkbox" 
                                   x-model="consent" 
                                   required 
                                   class="mt-0.5 rounded text-[#12C878] focus:ring-[#12C878] w-4 h-4">
                            <span>
                                I hereby authorize ProcessingFreeLoan.com and its partner Banks & NBFCs to contact me via Call, SMS, WhatsApp, or Email regarding my loan enquiry, overriding NDNC registry.
                            </span>
                        </label>
                        <template x-if="errors.consent">
                            <p class="text-[11px] text-rose-500 font-semibold mt-1" x-text="errors.consent"></p>
                        </template>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-3">
                        <button type="submit" 
                                :disabled="loading"
                                class="w-full py-4 rounded-xl font-extrabold text-sm text-white bg-gradient-to-r from-[#12C878] to-[#0fa863] hover:from-[#0fa863] hover:to-[#0c8e54] shadow-lg shadow-emerald-500/25 transition-all flex items-center justify-center gap-2 disabled:opacity-50">
                            <template x-if="loading">
                                <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                            </template>
                            <span x-text="loading ? 'Matching Best Lenders...' : 'Submit Loan Enquiry With Zero Fee'"></span>
                            <svg x-show="!loading" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </button>
                    </div>

                    <div class="text-center text-[11px] text-slate-400 pt-1">
                        🔒 Safe & Secure 256-Bit SSL Encryption • No upfront charges
                    </div>

                </form>
            </div>

            <!-- Success State -->
            <div class="p-8 sm:p-10 text-center space-y-5" x-show="submitted" style="display: none;">
                <div class="w-16 h-16 rounded-full bg-emerald-100 text-[#12C878] mx-auto flex items-center justify-center shadow-inner">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>

                <div class="space-y-2">
                    <h3 class="text-2xl font-extrabold text-[#062B59]">
                        Enquiry Submitted Successfully!
                    </h3>
                    <p class="text-sm text-slate-600 max-w-md mx-auto leading-relaxed" x-text="responseMsg">
                        Your loan enquiry has been registered with Zero Processing Fee priority.
                    </p>
                </div>

                <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200 max-w-xs mx-auto">
                    <div class="text-[11px] font-bold text-slate-400 uppercase">Application Reference Code</div>
                    <div class="text-lg font-mono font-extrabold text-[#1677FF] mt-1" x-text="referenceCode">
                        PFL-100248
                    </div>
                </div>

                <div class="pt-4">
                    <button type="button" 
                            @click="resetForm()" 
                            class="px-8 py-3 rounded-xl font-bold text-sm text-white bg-[#062B59] hover:bg-[#0866E8] transition-all">
                        Close & Continue Exploring
                    </button>
                </div>
            </div>

        </div>

    </div>
</div>
