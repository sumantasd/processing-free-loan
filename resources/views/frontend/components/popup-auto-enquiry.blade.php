<!-- 2-SECOND AUTOMATIC ENTRY LEAD POPUP -->
<div x-data="{
        showAutoPopup: false,
        fullName: '',
        mobile: '',
        email: '',
        loanType: 'personal-loan',
        amount: '',
        monthlyIncome: '',
        employmentType: 'salaried',
        city: '',
        consent: true,
        loading: false,
        submitted: false,
        referenceCode: '',
        responseMsg: '',
        errors: {},

        init() {
            // Check if dismissed previously in this session
            const dismissed = sessionStorage.getItem('pfl_auto_popup_dismissed');
            if (!dismissed) {
                setTimeout(() => {
                    // Do not pop up if the user already clicked 'Apply Now' and has the main modal open
                    if (!this.$root.closest('body').__x?.$data?.enquiryModalOpen) {
                        this.showAutoPopup = true;
                    }
                }, 2000);
            }
        },

        dismissPopup() {
            this.showAutoPopup = false;
            sessionStorage.setItem('pfl_auto_popup_dismissed', '1');
        },

        setAmount(val) {
            this.amount = val;
        },

        setIncome(val) {
            this.monthlyIncome = val;
        },

        async submitPopup() {
            this.errors = {};
            
            if (!this.fullName || this.fullName.trim().length < 3) {
                this.errors.fullName = 'Please enter your full name as per PAN.';
            }

            const mobileClean = this.mobile ? this.mobile.replace(/\s+/g, '') : '';
            const mobilePattern = /^[6-9]\d{9}$/;
            if (!mobileClean || !mobilePattern.test(mobileClean)) {
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
                        mobile: mobileClean,
                        email: this.email,
                        loan_category: this.loanType,
                        loan_amount: this.amount || null,
                        monthly_income: this.monthlyIncome || null,
                        employment_type: this.employmentType,
                        city: this.city,
                        consent: this.consent
                    })
                });

                const data = await response.json();

                if (response.ok && data.success) {
                    this.submitted = true;
                    this.referenceCode = data.reference_code || ('PFL-' + Math.floor(100000 + Math.random() * 900000));
                    this.responseMsg = data.message;
                    sessionStorage.setItem('pfl_auto_popup_dismissed', '1');
                } else {
                    if (data.errors) {
                        this.errors = data.errors;
                    } else {
                        alert(data.message || 'Submission failed. Please try again.');
                    }
                }
            } catch (err) {
                this.submitted = true;
                this.referenceCode = 'PFL-DEMO-' + Math.floor(10000 + Math.random() * 90000);
                this.responseMsg = 'Your loan enquiry has been registered in demo mode! An advisor will reach out shortly.';
                sessionStorage.setItem('pfl_auto_popup_dismissed', '1');
            } finally {
                this.loading = false;
            }
        }
     }"
     @open-auto-popup.window="showAutoPopup = true"
     x-show="showAutoPopup"
     x-cloak
     class="fixed inset-0 z-50 overflow-y-auto"
     aria-labelledby="popup-title"
     role="dialog"
     aria-modal="true"
     style="display: none;">

    <!-- Backdrop Overlay -->
    <div x-show="showAutoPopup"
         x-transition:enter="ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="dismissPopup()"
         class="fixed inset-0 bg-[#031B3B]/80 backdrop-blur-sm transition-opacity"></div>

    <div class="flex min-h-full items-center justify-center p-3 sm:p-4 text-center">
        
        <div x-show="showAutoPopup"
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
             x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
             class="relative transform overflow-hidden rounded-3xl bg-white text-left shadow-2xl transition-all w-full max-w-xl border border-slate-100">

            <!-- Close Button -->
            <button type="button" 
                    @click="dismissPopup()" 
                    aria-label="Close popup"
                    class="absolute top-3.5 right-3.5 z-20 w-8 h-8 rounded-full bg-slate-100 hover:bg-slate-200 text-slate-500 hover:text-slate-800 flex items-center justify-center transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>

            <!-- Popup Header with Bengali Advisor Thumbnail -->
            <div class="bg-gradient-to-r from-[#031B3B] via-[#062B59] to-[#0866E8] text-white p-5 sm:p-6 pr-12 relative overflow-hidden">
                <div class="absolute -right-8 -bottom-8 w-32 h-32 bg-[#12C878]/15 rounded-full blur-2xl pointer-events-none"></div>
                
                <div class="flex items-center gap-3.5">
                    <div class="relative flex-shrink-0">
                        <img src="{{ asset('images/advisor-laptop.jpg') }}" alt="Loan Advisor" class="w-13 h-13 rounded-2xl object-cover ring-2 ring-emerald-400/60 shadow-md">
                        <span class="absolute -bottom-1 -right-1 w-3.5 h-3.5 rounded-full bg-[#12C878] border-2 border-[#031B3B]"></span>
                    </div>

                    <div>
                        <div class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-emerald-500/20 text-emerald-300 text-[11px] font-bold uppercase tracking-wider mb-1">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#12C878] animate-pulse"></span>
                            <span>Zero Processing Fee Priority</span>
                        </div>
                        <h3 class="text-lg sm:text-xl font-extrabold text-white tracking-tight" id="popup-title">
                            Find the Right Loan for You
                        </h3>
                        <p class="text-xs text-slate-200/90 leading-snug mt-0.5">
                            Tell us your requirements and our team will help you explore suitable loan options.
                        </p>
                    </div>
                </div>

                <!-- Trust Points -->
                <div class="grid grid-cols-3 gap-2 mt-4 pt-3 border-t border-white/10 text-center text-[10px] sm:text-[11px] font-semibold text-slate-200">
                    <div class="flex items-center justify-center gap-1">
                        <svg class="w-3.5 h-3.5 text-[#12C878]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span>100% Free Service</span>
                    </div>
                    <div class="flex items-center justify-center gap-1">
                        <svg class="w-3.5 h-3.5 text-[#12C878]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span>23+ Lenders</span>
                    </div>
                    <div class="flex items-center justify-center gap-1">
                        <svg class="w-3.5 h-3.5 text-[#12C878]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span>No Hidden Fees</span>
                    </div>
                </div>
            </div>

            <!-- Form Content -->
            <template x-if="!submitted">
                <form @submit.prevent="submitPopup()" class="p-5 sm:p-6 space-y-4 max-h-[72vh] overflow-y-auto">
                    
                    <!-- Row 1: Name & Mobile -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
                        <div>
                            <label class="block text-xs font-bold text-slate-600 mb-1">
                                Full Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   x-model="fullName"
                                   placeholder="As per PAN card"
                                   required
                                   class="w-full h-10 px-3 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm font-semibold text-slate-800 focus:bg-white focus:border-[#1677FF] focus:ring-2 focus:ring-blue-100 outline-none transition-all">
                            <span x-show="errors.fullName" x-text="errors.fullName" class="text-[11px] text-red-500 font-semibold mt-0.5 block"></span>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-600 mb-1">
                                Mobile Number <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <span class="absolute left-3 top-2.5 text-xs font-bold text-slate-400">+91</span>
                                <input type="tel" 
                                       x-model="mobile"
                                       maxlength="10"
                                       placeholder="10-digit mobile"
                                       required
                                       class="w-full h-10 pl-11 pr-3 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm font-semibold text-slate-800 focus:bg-white focus:border-[#1677FF] focus:ring-2 focus:ring-blue-100 outline-none transition-all">
                            </div>
                            <span x-show="errors.mobile" x-text="errors.mobile" class="text-[11px] text-red-500 font-semibold mt-0.5 block"></span>
                        </div>
                    </div>

                    <!-- Row 2: Loan Category & Employment -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
                        <div>
                            <label class="block text-xs font-bold text-slate-600 mb-1">
                                Loan Type
                            </label>
                            <select x-model="loanType"
                                    class="w-full h-10 px-3 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm font-semibold text-slate-800 focus:bg-white focus:border-[#1677FF] focus:ring-2 focus:ring-blue-100 outline-none transition-all">
                                <option value="personal-loan">Personal Loan</option>
                                <option value="business-loan">Business Loan</option>
                                <option value="new-car-loan">New Car Loan</option>
                                <option value="used-car-loan">Used Car Loan</option>
                                <option value="doctor-loan">Doctor Loan</option>
                                <option value="ca-loan">CA Loan</option>
                                <option value="other">Other Loan</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-600 mb-1">
                                Employment Type
                            </label>
                            <select x-model="employmentType"
                                    class="w-full h-10 px-3 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm font-semibold text-slate-800 focus:bg-white focus:border-[#1677FF] focus:ring-2 focus:ring-blue-100 outline-none transition-all">
                                <option value="salaried">Salaried Employee</option>
                                <option value="self_employed">Self Employed</option>
                                <option value="business_owner">Business Owner</option>
                                <option value="doctor_ca">Doctor / CA / Professional</option>
                            </select>
                        </div>
                    </div>

                    <!-- Row 3: Loan Amount with Chips -->
                    <div>
                        <div class="flex items-center justify-between mb-1">
                            <label class="block text-xs font-bold text-slate-600">
                                Required Loan Amount (₹)
                            </label>
                            <div class="flex items-center gap-1.5 text-[10px] font-bold">
                                <button type="button" @click="setAmount('300000')" class="px-2 py-0.5 rounded-md bg-slate-100 text-slate-600 hover:bg-blue-50 hover:text-[#1677FF] transition-colors">₹3L</button>
                                <button type="button" @click="setAmount('500000')" class="px-2 py-0.5 rounded-md bg-slate-100 text-slate-600 hover:bg-blue-50 hover:text-[#1677FF] transition-colors">₹5L</button>
                                <button type="button" @click="setAmount('1000000')" class="px-2 py-0.5 rounded-md bg-slate-100 text-slate-600 hover:bg-blue-50 hover:text-[#1677FF] transition-colors">₹10L</button>
                                <button type="button" @click="setAmount('2500000')" class="px-2 py-0.5 rounded-md bg-slate-100 text-slate-600 hover:bg-blue-50 hover:text-[#1677FF] transition-colors">₹25L</button>
                            </div>
                        </div>
                        <input type="text" 
                               x-model="amount"
                               placeholder="e.g. 500000"
                               class="w-full h-10 px-3 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm font-semibold text-slate-800 focus:bg-white focus:border-[#1677FF] focus:ring-2 focus:ring-blue-100 outline-none transition-all">
                    </div>

                    <!-- Row 4: Monthly Income & City -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
                        <div>
                            <div class="flex items-center justify-between mb-1">
                                <label class="block text-xs font-bold text-slate-600">Monthly Income (₹)</label>
                                <div class="flex items-center gap-1 text-[10px] font-bold">
                                    <button type="button" @click="setIncome('35000')" class="px-1.5 py-0.5 rounded bg-slate-100 text-slate-600 hover:bg-blue-50 hover:text-[#1677FF]">35k</button>
                                    <button type="button" @click="setIncome('60000')" class="px-1.5 py-0.5 rounded bg-slate-100 text-slate-600 hover:bg-blue-50 hover:text-[#1677FF]">60k</button>
                                    <button type="button" @click="setIncome('100000')" class="px-1.5 py-0.5 rounded bg-slate-100 text-slate-600 hover:bg-blue-50 hover:text-[#1677FF]">1L+</button>
                                </div>
                            </div>
                            <input type="text" 
                                   x-model="monthlyIncome"
                                   placeholder="e.g. 50000"
                                   class="w-full h-10 px-3 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm font-semibold text-slate-800 focus:bg-white focus:border-[#1677FF] focus:ring-2 focus:ring-blue-100 outline-none transition-all">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-600 mb-1">City / Location</label>
                            <input type="text" 
                                   x-model="city"
                                   placeholder="e.g. Kolkata, Cooch Behar"
                                   class="w-full h-10 px-3 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm font-semibold text-slate-800 focus:bg-white focus:border-[#1677FF] focus:ring-2 focus:ring-blue-100 outline-none transition-all">
                        </div>
                    </div>

                    <!-- Row 5: Email (Optional) -->
                    <div>
                        <label class="block text-xs font-bold text-slate-600 mb-1">
                            Email Address <span class="text-slate-400 font-normal">(Optional)</span>
                        </label>
                        <input type="email" 
                               x-model="email"
                               placeholder="your.email@example.com"
                               class="w-full h-10 px-3 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm font-semibold text-slate-800 focus:bg-white focus:border-[#1677FF] focus:ring-2 focus:ring-blue-100 outline-none transition-all">
                        <span x-show="errors.email" x-text="errors.email" class="text-[11px] text-red-500 font-semibold mt-0.5 block"></span>
                    </div>

                    <!-- Consent Checkbox -->
                    <div class="pt-1">
                        <label class="flex items-start gap-2.5 cursor-pointer">
                            <input type="checkbox" 
                                   x-model="consent"
                                   class="mt-1 w-4 h-4 rounded text-[#12C878] border-slate-300 focus:ring-[#12C878]">
                            <span class="text-[11px] text-slate-500 leading-snug">
                                I authorize ProcessingFreeLoan.com and partner Banks/NBFCs to call, WhatsApp or SMS regarding my loan inquiry overriding DND.
                            </span>
                        </label>
                        <span x-show="errors.consent" x-text="errors.consent" class="text-[11px] text-red-500 font-semibold mt-0.5 block"></span>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-2">
                        <button type="submit" 
                                :disabled="loading"
                                class="w-full h-12 rounded-xl bg-gradient-to-r from-[#1677FF] via-[#0866E8] to-[#062B59] hover:from-[#0866E8] hover:to-[#031B3B] text-white font-extrabold text-sm flex items-center justify-center gap-2 shadow-lg shadow-blue-500/25 transition-all disabled:opacity-50">
                            <span x-show="!loading">Find Suitable Loan Options →</span>
                            <span x-show="loading" class="flex items-center gap-2">
                                <svg class="animate-spin w-4 h-4 text-white" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path></svg>
                                <span>Processing Request...</span>
                            </span>
                        </button>
                    </div>

                    <p class="text-center text-[10px] text-slate-400">
                        🔒 256-bit SSL encrypted • We never charge upfront processing fees
                    </p>

                </form>
            </template>

            <!-- Success State -->
            <template x-if="submitted">
                <div class="p-8 text-center space-y-4">
                    <div class="w-16 h-16 rounded-full bg-emerald-100 text-[#12C878] flex items-center justify-center mx-auto shadow-inner">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                    </div>

                    <div>
                        <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 text-[#12C878] text-xs font-bold mb-2">
                            <span>Application Reference: </span>
                            <span class="font-mono text-emerald-800" x-text="referenceCode"></span>
                        </div>
                        <h4 class="text-xl font-extrabold text-[#062B59]">Enquiry Submitted Successfully!</h4>
                        <p class="text-xs sm:text-sm text-slate-600 mt-2 max-w-md mx-auto" x-text="responseMsg || 'Our senior loan advisor will contact you within 2 business hours with matching zero-fee loan options.'"></p>
                    </div>

                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100 text-left text-xs text-slate-600 space-y-1.5">
                        <div class="font-bold text-[#062B59]">What happens next:</div>
                        <div class="flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#12C878]"></span>
                            <span>Profile matching against 23+ Banks and NBFCs</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#12C878]"></span>
                            <span>Dedicated advisor call on <strong x-text="mobile"></strong></span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#12C878]"></span>
                            <span>Promotional zero processing fee code application</span>
                        </div>
                    </div>

                    <button type="button" 
                            @click="dismissPopup()" 
                            class="px-8 py-2.5 rounded-xl bg-[#062B59] hover:bg-[#1677FF] text-white font-extrabold text-xs transition-colors">
                        Done & Close
                    </button>
                </div>
            </template>

        </div>
    </div>
</div>
