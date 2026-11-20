<?php

namespace App\Services;

class FintechDataService
{
    public static function getBrandConfig(): array
    {
        return [
            'name' => 'Processing Free Loan',
            'tagline' => 'LOAN WITHOUT PROCESSING FEE',
            'domain' => 'https://processingfreeloan.com',
            'phone' => '+91 98765 43210',
            'email' => 'info@processingfreeloan.com',
            'support_hours' => 'Mon - Sat: 9:30 AM - 7:00 PM',
            'address' => 'Salt Lake Sector V, Kolkata, West Bengal 700091, India',
            'social' => [
                'facebook' => 'https://facebook.com/processingfreeloan',
                'instagram' => 'https://instagram.com/processingfreeloan',
                'youtube' => 'https://youtube.com/@processingfreeloan',
                'linkedin' => 'https://linkedin.com/company/processingfreeloan',
            ],
            'disclaimer' => 'ProcessingFreeLoan.com is a financial marketplace and loan aggregator assisting consumers in discovering and comparing loan products from RBI-regulated Banks and NBFCs. We are not a direct lender. Processing fee waiver offers are subject to individual lender policies, credit evaluation, and specific promo schemes. Final interest rates and terms are solely determined by the lending institution.'
        ];
    }

    public static function getLoanProducts(): array
    {
        return [
            'personal-loan' => [
                'slug' => 'personal-loan',
                'title' => 'Personal Loan',
                'tagline' => 'For your personal financial needs easily',
                'badge' => 'Instant Approval',
                'icon' => 'user-check',
                'color' => 'blue',
                'bg_gradient' => 'from-blue-50 to-indigo-50/50',
                'amount_range' => '₹50,000 to ₹50 Lakhs',
                'min_amount' => 50000,
                'max_amount' => 5000000,
                'interest_rate' => 'Starting @ 10.49% p.a.',
                'tenure' => '12 to 72 Months',
                'processing_fee' => 'Zero Processing Fee Offers Available*',
                'description' => 'Cover unexpected emergencies, home renovation, travel, or medical expenses with collateral-free personal loans from top Banks and NBFCs at lowest interest rates.',
                'key_benefits' => [
                    'Zero processing fee promotional schemes',
                    'Minimal documentation & 100% paperless digital journey',
                    'Flexible repayment tenure up to 6 years',
                    'Quick disbursement directly to your bank account within 24 hours',
                    'No collateral or guarantor required'
                ],
                'eligibility' => [
                    'Nationality: Resident Indian Citizen',
                    'Age: 21 to 58 years at loan maturity',
                    'Monthly Net Salary: Min ₹25,000 per month (metro) / ₹20,000 (non-metro)',
                    'Employment: Minimum 1 year continuous work experience (6 months with current employer)',
                    'CIBIL Score: 680+ for fastest zero-fee approval'
                ],
                'documents' => [
                    'Identity Proof: PAN Card (Mandatory), Aadhaar Card, Passport or Voter ID',
                    'Address Proof: Aadhaar Card, Utility Bills (Electricity/Water < 2 months old), Rent Agreement',
                    'Income Proof: Latest 3 months salary slips, Form 16 / ITR for salaried',
                    'Banking: Last 6 months bank statement reflecting salary credits',
                    'Photographs: 1 Passport size photograph or selfie verification'
                ],
                'suitable_lenders' => [
                    'HDFC Bank', 'ICICI Bank', 'Axis Bank', 'IndusInd Bank', 'IDFC Bank', 'Bandhan Bank', 'YES Bank',
                    'Bajaj Finance', 'Tata Capital', 'Poonawalla Fincorp', 'Piramal Finance', 'Aditya Birla', 'SMFG India', 'Finnable', 'InCred'
                ]
            ],
            'business-loan' => [
                'slug' => 'business-loan',
                'title' => 'Business Loan',
                'tagline' => 'Fuel your business growth with flexible finance',
                'badge' => 'High Sanction',
                'icon' => 'briefcase',
                'color' => 'emerald',
                'bg_gradient' => 'from-emerald-50 to-teal-50/50',
                'amount_range' => '₹1 Lakh to ₹2 Crore',
                'min_amount' => 100000,
                'max_amount' => 20000000,
                'interest_rate' => 'Starting @ 11.99% p.a.',
                'tenure' => '12 to 60 Months',
                'processing_fee' => 'Special Zero Processing Fee Waivers*',
                'description' => 'Expand working capital, purchase machinery, stock inventory, or manage cash flow seamlessly with unsecured business loans tailored for Indian MSMEs and enterprises.',
                'key_benefits' => [
                    'Unsecured business finance with zero asset mortgaging',
                    'Exclusive processing fee discount & zero-fee lender partnerships',
                    'Overdraft & term loan facilities available',
                    'Speedy sanction based on GST and banking turnover',
                    'Tax benefits on interest paid for business expansion'
                ],
                'eligibility' => [
                    'Business Entity: Sole Proprietorship, Partnership, LLP, Pvt Ltd',
                    'Business Vintage: Minimum 2 to 3 years in continuous operation',
                    'Annual Turnover: Minimum ₹25 Lakhs audited turnover',
                    'Applicant Age: 24 to 65 years',
                    'Credit Health: Business vintage & promoter CIBIL score 700+'
                ],
                'documents' => [
                    'Entity Proof: GST Registration, Trade License, MSME/Udyam Certificate, Partnership Deed/COI',
                    'Financials: Audited Balance Sheet & P&L statements for last 2 years with CA seal',
                    'Tax Documents: Last 12 months GST returns (GSTR-3B) and 2 years ITR with computation',
                    'Bank Statements: Last 12 months primary current account banking statements',
                    'KYC: PAN Card & Aadhaar of all promoters/directors'
                ],
                'suitable_lenders' => [
                    'Bajaj Finance', 'Cholamandalam', 'Tata Capital', 'Poonawalla Fincorp', 'L & T Finance', 'Aditya Birla', 'Piramal Finance', 'Godrej Finance', 'SMFG India', 'Axis Finance', 'HDFC Bank', 'ICICI Bank', 'Axis Bank', 'IndusInd Bank', 'IDFC Bank', 'Bandhan Bank', 'YES Bank'
                ]
            ],
            'new-car-loan' => [
                'slug' => 'new-car-loan',
                'title' => 'New Car Loan',
                'tagline' => 'Drive your dream car with easy EMI options',
                'badge' => 'Up to 100% On-Road',
                'icon' => 'car',
                'color' => 'sky',
                'bg_gradient' => 'from-sky-50 to-blue-50/50',
                'amount_range' => '₹2 Lakhs to ₹1.5 Crore',
                'min_amount' => 200000,
                'max_amount' => 15000000,
                'interest_rate' => 'Starting @ 8.65% p.a.',
                'tenure' => '12 to 84 Months',
                'processing_fee' => 'Zero Processing Fee on Selected Models*',
                'description' => 'Get behind the wheel of your dream vehicle with competitive interest rates, up to 100% on-road funding, and zero processing fee festive promotions.',
                'key_benefits' => [
                    'Up to 100% on-road financing (ex-showroom + insurance + road tax)',
                    'Tie-ups with leading automobile dealerships pan-India',
                    'Extended repayment tenures up to 7 years for lowest monthly EMIs',
                    'Instant in-principle sanction with digital KYC verification',
                    'Pre-approved car loan limits for existing bank account holders'
                ],
                'eligibility' => [
                    'Applicant: Salaried employees, self-employed professionals, businessmen',
                    'Age Limit: 21 to 65 years at loan closure',
                    'Minimum Income: ₹25,000/month (salaried) or ₹3.5 Lakhs annual ITR (business)',
                    'Employment / Business Stability: Minimum 1 year in current profession',
                    'Credit Score: 700+ preferred for best interest rate bands'
                ],
                'documents' => [
                    'Proforma Invoice: Quotation of the chosen car from authorized dealership',
                    'KYC: PAN Card, Aadhaar Card, Driving License or Passport',
                    'Income Verification: Salary slips (3 months) / Form 16 / 2 years ITR with financials',
                    'Bank Records: Last 6 months bank statement showing regular cashflows',
                    'Passport photograph & signed application'
                ],
                'suitable_lenders' => [
                    'HDFC Bank', 'ICICI Bank', 'Axis Bank', 'IDFC Bank', 'YES Bank', 'IndusInd Bank', 'Bandhan Bank',
                    'Cholamandalam', 'HDB Finance', 'Mahindra Finance', 'Tata Capital', 'Poonawalla Fincorp', 'Indostar Capital', 'Muthoot Capital'
                ]
            ],
            'used-car-loan' => [
                'slug' => 'used-car-loan',
                'title' => 'Used Car Loan',
                'tagline' => 'Get the best deals on quality pre-owned cars',
                'badge' => 'Up to 90% Valuation',
                'icon' => 'key',
                'color' => 'amber',
                'bg_gradient' => 'from-amber-50 to-orange-50/50',
                'amount_range' => '₹1.5 Lakhs to ₹50 Lakhs',
                'min_amount' => 150000,
                'max_amount' => 5000000,
                'interest_rate' => 'Starting @ 11.50% p.a.',
                'tenure' => '12 to 60 Months',
                'processing_fee' => 'Discounted / Free Processing Schemes*',
                'description' => 'Own a certified pre-owned hatchback, sedan, or SUV with quick vehicle evaluation, hassle-free RC transfer assistance, and customized loan packages.',
                'key_benefits' => [
                    'Financing up to 90%–100% of fair market vehicle valuation',
                    'Complete assistance with Regional Transport Office (RTO) hypothecation and RC transfer',
                    'Wide coverage across hatchbacks, sedans, luxury cars and SUVs',
                    'Flexible tenure options up to 5 years',
                    'Doorstep vehicle inspection and fast loan disbursement'
                ],
                'eligibility' => [
                    'Applicant Profile: Salaried, Self-Employed, or Commercial Operators',
                    'Age: 21 to 65 years',
                    'Car Age: Not older than 10 years at end of loan repayment',
                    'Income Requirement: Min ₹20,000/month or ₹3 Lakhs annual income',
                    'Valid Driving License: Preferred for primary borrower'
                ],
                'documents' => [
                    'Vehicle Documents: RC Copy, Insurance Certificate, Pollution (PUC), Valuation Report',
                    'Identity & Address Proof: PAN Card, Aadhaar Card / Passport',
                    'Income Documents: 3 months salary slips or 2 years ITR',
                    'Bank Statement: Last 6 months active bank account statements',
                    'Signed loan agreement and RTO transfer forms (Form 29 & 30)'
                ],
                'suitable_lenders' => [
                    'Cholamandalam', 'HDB Finance', 'Mahindra Finance', 'Poonawalla Fincorp', 'Tata Capital', 'Indostar Capital', 'Muthoot Capital',
                    'HDFC Bank', 'ICICI Bank', 'Axis Bank', 'IDFC Bank', 'YES Bank', 'IndusInd Bank', 'Bandhan Bank'
                ]
            ],
            'doctor-loan' => [
                'slug' => 'doctor-loan',
                'title' => 'Doctor Loan',
                'tagline' => 'Specialized financial solutions for medical practitioners',
                'badge' => 'Zero Collateral',
                'icon' => 'stethoscope',
                'color' => 'rose',
                'bg_gradient' => 'from-rose-50 to-pink-50/50',
                'amount_range' => '₹5 Lakhs to ₹75 Lakhs',
                'min_amount' => 500000,
                'max_amount' => 7500000,
                'interest_rate' => 'Starting @ 9.99% p.a.',
                'tenure' => '12 to 84 Months',
                'processing_fee' => '100% Zero Processing Fee for Doctors*',
                'description' => 'Dedicated customized loan solutions for MBBS, MD, MS, BDS, MDS, and specialized doctors to expand clinics, purchase medical equipment, or meet personal milestones.',
                'key_benefits' => [
                    'Preferred doctor interest rates with ZERO processing fee offers',
                    'No collateral or security needed up to ₹75 Lakhs',
                    'High sanction limits based on medical qualification and vintage',
                    'Doorstep service and dedicated relationship manager',
                    'Quick 24-hour turnaround time with minimal documentation'
                ],
                'eligibility' => [
                    'Qualification: MBBS, MD, MS, BDS, MDS, BHMS, BAMS with valid registration',
                    'Medical Registration: Registered with Medical Council of India (MCI) or State Medical Council',
                    'Post-Qualification Experience: Minimum 2 to 3 years experience',
                    'Age Limit: 25 to 65 years',
                    'Practice: Self-practice clinic, hospital consultant, or nursing home owner'
                ],
                'documents' => [
                    'Medical Qualification Certificates: MBBS/MD/BDS degree certificate',
                    'Registration Certificate: State Medical Council registration certificate',
                    'KYC Documents: PAN Card, Aadhaar Card, Passport',
                    'Banking: Last 6 to 12 months primary operative bank account statements',
                    'Financials: Last 2 years ITR with computation of income (if applicable)'
                ],
                'suitable_lenders' => [
                    'Bajaj Finance', 'Tata Capital', 'Poonawalla Fincorp', 'L & T Finance', 'Aditya Birla', 'Piramal Finance', 'Godrej Finance', 'SMFG India', 'Axis Finance', 'HDFC Bank', 'ICICI Bank', 'Axis Bank', 'IndusInd Bank', 'IDFC Bank', 'Bandhan Bank', 'YES Bank'
                ]
            ],
            'ca-loan' => [
                'slug' => 'ca-loan',
                'title' => 'CA Loan',
                'tagline' => 'Exclusive professional finance for Chartered Accountants',
                'badge' => 'Pre-Approved Limits',
                'icon' => 'award',
                'color' => 'violet',
                'bg_gradient' => 'from-violet-50 to-purple-50/50',
                'amount_range' => '₹5 Lakhs to ₹60 Lakhs',
                'min_amount' => 500000,
                'max_amount' => 6000000,
                'interest_rate' => 'Starting @ 10.25% p.a.',
                'tenure' => '12 to 72 Months',
                'processing_fee' => 'Exclusive Zero Processing Fee Privilege*',
                'description' => 'Exclusive professional credit facilities crafted for practicing and salaried Chartered Accountants to set up offices, scale audit firms, or meet personal liquidity needs.',
                'key_benefits' => [
                    'Collateral-free sanctions based on ICAI Certificate of Practice (COP)',
                    'Waiver of standard processing charges on top-rated lender offerings',
                    'Pre-approved credit limits with instant disbursement options',
                    'Customized repayment structures suited to financial seasons',
                    'Dedicated corporate concierge service'
                ],
                'eligibility' => [
                    'Qualification: Fellow Chartered Accountant (FCA) or Associate Chartered Accountant (ACA)',
                    'ICAI Membership: Valid and active Certificate of Practice (COP) or ICAI membership card',
                    'Practice / Salaried Vintage: Minimum 2 years continuous professional practice or corporate employment',
                    'Applicant Age: 23 to 65 years',
                    'Good CIBIL track record (700+)'
                ],
                'documents' => [
                    'ICAI Proof: ICAI Membership Certificate and current Certificate of Practice (COP)',
                    'Identity Proof: PAN Card (Mandatory), Aadhaar Card',
                    'Bank Statements: Last 6 months bank account statements',
                    'Financials: Last 2 years ITR with computation of income (for practicing CAs)',
                    'Salary Slips & Form 16: For CAs employed in corporate sectors'
                ],
                'suitable_lenders' => [
                    'Bajaj Finance', 'Tata Capital', 'Poonawalla Fincorp', 'L & T Finance', 'Aditya Birla', 'Piramal Finance', 'Godrej Finance', 'SMFG India', 'Axis Finance', 'HDFC Bank', 'ICICI Bank', 'Axis Bank', 'IndusInd Bank', 'IDFC Bank', 'Bandhan Bank', 'YES Bank'
                ]
            ]
        ];
    }

    public static function getAllLenders(): array
    {
        return [
            // NBFCs
            [
                'name' => 'Bajaj Finance',
                'slug' => 'bajaj-finance',
                'type' => 'NBFC',
                'logo_text' => 'BAJAJ FINSERV',
                'accent' => '#005CA9',
                'products' => ['Salaried Personal Loan', 'Business Loan', 'Doctor & CA Loan'],
                'tagline' => 'India\'s largest diversified retail NBFC',
                'description' => 'Bajaj Finance is renowned for its instant paperless approvals, flexible flexi-loan features, and quick digital disbursements across personal, business, and doctor loans.',
                'interest_range' => '10.50% - 16.00% p.a.',
                'max_tenure' => 'Up to 84 months',
                'special_features' => ['Flexi Hybrid EMI Facility', 'Instant digital sanction', 'Minimal documentation'],
                'processing_fee_offer' => 'Zero processing fee campaigns available on specific promo schemes'
            ],
            [
                'name' => 'Cholamandalam',
                'slug' => 'cholamandalam',
                'type' => 'NBFC',
                'logo_text' => 'CHOLA',
                'accent' => '#C41230',
                'products' => ['Salaried Personal Loan', 'Business Loan', 'Doctor & CA Loan', 'New Car Loan', 'Used Car Loan'],
                'tagline' => 'Murugappa Group company empowering Indian dreams',
                'description' => 'Cholamandalam Investment and Finance Company delivers tailored vehicle finance, business capital, and personal funding across urban and semi-urban India.',
                'interest_range' => '11.00% - 17.50% p.a.',
                'max_tenure' => 'Up to 60 months',
                'special_features' => ['High valuation for used cars', 'Extensive branch network', 'Customized MSME solutions'],
                'processing_fee_offer' => 'Special fee waivers for priority customer segments'
            ],
            [
                'name' => 'Tata Capital',
                'slug' => 'tata-capital',
                'type' => 'NBFC',
                'logo_text' => 'TATA CAPITAL',
                'accent' => '#0A5FA4',
                'products' => ['Salaried Personal Loan', 'Business Loan', 'Doctor & CA Loan', 'New Car Loan', 'Used Car Loan'],
                'tagline' => 'Count on Us – Trusted financial arm of the Tata Group',
                'description' => 'Tata Capital provides transparent, customer-centric loan solutions with competitive interest rates and seamless end-to-end digital processing.',
                'interest_range' => '10.49% - 16.50% p.a.',
                'max_tenure' => 'Up to 72 months',
                'special_features' => ['Zero foreclosure charges on select schemes', 'Multipurpose loan options', 'Tata trust factor'],
                'processing_fee_offer' => 'Zero processing fee privileges on select professional products'
            ],
            [
                'name' => 'Poonawalla Fincorp',
                'slug' => 'poonawalla-fincorp',
                'type' => 'NBFC',
                'logo_text' => 'POONAWALLA',
                'accent' => '#E31B23',
                'products' => ['Salaried Personal Loan', 'Business Loan', 'Doctor & CA Loan', 'New Car Loan', 'Used Car Loan'],
                'tagline' => 'Cyrus Poonawalla Group financial services company',
                'description' => 'Poonawalla Fincorp offers digitally-led consumer and MSME financing with 100% transparent terms and fast sanction turnaround times.',
                'interest_range' => '9.99% - 15.50% p.a.',
                'max_tenure' => 'Up to 60 months',
                'special_features' => ['No hidden charges', 'Completely digital loan sanction', 'Doctor-friendly products'],
                'processing_fee_offer' => 'Promotional zero-fee programs for high-credit profile borrowers'
            ],
            [
                'name' => 'Piramal Finance',
                'slug' => 'piramal-finance',
                'type' => 'NBFC',
                'logo_text' => 'PIRAMAL',
                'accent' => '#E85B25',
                'products' => ['Salaried Personal Loan', 'Business Loan', 'Doctor & CA Loan'],
                'tagline' => 'Financial services bridging Bharat and urban India',
                'description' => 'Piramal Finance focuses on delivering credit to salaried and self-employed customers with customized assessment methods and flexible criteria.',
                'interest_range' => '11.50% - 18.00% p.a.',
                'max_tenure' => 'Up to 60 months',
                'special_features' => ['Cashflow-based assessment', 'Support for diverse income types', 'Pan-India presence'],
                'processing_fee_offer' => 'Concessional processing fees available'
            ],
            [
                'name' => 'Aditya Birla',
                'slug' => 'aditya-birla',
                'type' => 'NBFC',
                'logo_text' => 'ADITYA BIRLA',
                'accent' => '#C4161C',
                'products' => ['Salaried Personal Loan', 'Business Loan', 'Doctor & CA Loan'],
                'tagline' => 'Aditya Birla Finance – Universal financial solutions',
                'description' => 'Aditya Birla Finance offers bespoke lending solutions with tailored structures for professionals, business growth, and personal aspirations.',
                'interest_range' => '10.75% - 16.50% p.a.',
                'max_tenure' => 'Up to 72 months',
                'special_features' => ['Flexible tenures', 'Corporate and individual loans', 'Quick digital verification'],
                'processing_fee_offer' => 'Zero fee offers for doctors and chartered accountants'
            ],
            [
                'name' => 'SMFG India',
                'slug' => 'smfg-india',
                'type' => 'NBFC',
                'logo_text' => 'SMFG INDIA',
                'accent' => '#177638',
                'products' => ['Salaried Personal Loan', 'Business Loan', 'Doctor & CA Loan'],
                'tagline' => 'SMFG India Credit (formerly Fullerton India)',
                'description' => 'Backed by Sumitomo Mitsui Financial Group, SMFG India provides dependable retail loans, business credit, and customized financing options.',
                'interest_range' => '11.99% - 19.00% p.a.',
                'max_tenure' => 'Up to 60 months',
                'special_features' => ['Rapid document pickup', 'Self-employed friendly', 'Wide branch footprint'],
                'processing_fee_offer' => 'Zero processing fee during seasonal festivals'
            ],
            [
                'name' => 'Finnable',
                'slug' => 'finnable',
                'type' => 'NBFC',
                'logo_text' => 'FINNABLE',
                'accent' => '#2E3192',
                'products' => ['Salaried Personal Loan'],
                'tagline' => 'Fast digital loans for salaried professionals',
                'description' => 'Finnable focuses on rapid salary-backed personal loans with instant eligibility checks, low turnaround time, and direct bank transfers.',
                'interest_range' => '12.00% - 20.00% p.a.',
                'max_tenure' => 'Up to 48 months',
                'special_features' => ['App-based journey', 'Direct salary link', 'Instant bank disbursal'],
                'processing_fee_offer' => 'Flat fee and zero fee promotional periods'
            ],
            [
                'name' => 'InCred',
                'slug' => 'incred',
                'type' => 'NBFC',
                'logo_text' => 'INCRED',
                'accent' => '#E82449',
                'products' => ['Salaried Personal Loan'],
                'tagline' => 'Borrow with confidence, grow with InCred',
                'description' => 'InCred utilizes modern underwriting algorithms to provide accessible personal finance options for salaried employees across India.',
                'interest_range' => '11.50% - 19.50% p.a.',
                'max_tenure' => 'Up to 60 months',
                'special_features' => ['Quick algorithmic sanction', 'Paperless KYC', 'Custom ticket sizes'],
                'processing_fee_offer' => 'Discounted processing fee schemes'
            ],
            [
                'name' => 'L & T Finance',
                'slug' => 'lt-finance',
                'type' => 'NBFC',
                'logo_text' => 'L&T FINANCE',
                'accent' => '#004B87',
                'products' => ['Business Loan', 'Doctor & CA Loan'],
                'tagline' => 'Larsen & Toubro group financial enterprise',
                'description' => 'L&T Finance delivers strong MSME funding, professional credit lines, and working capital solutions backed by the engineering giant\'s heritage.',
                'interest_range' => '11.25% - 17.00% p.a.',
                'max_tenure' => 'Up to 60 months',
                'special_features' => ['High business limits', 'Transparent schedules', 'CA-friendly packages'],
                'processing_fee_offer' => 'Zero processing fee for professional loans'
            ],
            [
                'name' => 'Godrej Finance',
                'slug' => 'godrej-finance',
                'type' => 'NBFC',
                'logo_text' => 'GODREJ',
                'accent' => '#008542',
                'products' => ['Business Loan', 'Doctor & CA Loan'],
                'tagline' => 'Empowering Indian businesses and professionals',
                'description' => 'Godrej Finance provides transparent credit products tailored to help business owners and professionals scale sustainably.',
                'interest_range' => '11.00% - 16.50% p.a.',
                'max_tenure' => 'Up to 60 months',
                'special_features' => ['Godrej trust', 'Fast collateral-free processing', 'Tailored EMI solutions'],
                'processing_fee_offer' => 'Special zero processing fee schemes'
            ],
            [
                'name' => 'Axis Finance',
                'slug' => 'axis-finance',
                'type' => 'NBFC',
                'logo_text' => 'AXIS FINANCE',
                'accent' => '#97144D',
                'products' => ['Business Loan', 'Doctor & CA Loan'],
                'tagline' => 'Wholly owned subsidiary of Axis Bank',
                'description' => 'Axis Finance provides specialized non-banking credit solutions for business expansion and professional practice growth.',
                'interest_range' => '10.99% - 16.50% p.a.',
                'max_tenure' => 'Up to 60 months',
                'special_features' => ['Flexible structures', 'Dedicated relationship desk', 'High loan quantum'],
                'processing_fee_offer' => 'Zero fee waivers for select high-value customers'
            ],
            [
                'name' => 'HDB Finance',
                'slug' => 'hdb-finance',
                'type' => 'NBFC',
                'logo_text' => 'HDB SERVICES',
                'accent' => '#004C8F',
                'products' => ['New Car Loan', 'Used Car Loan'],
                'tagline' => 'HDB Financial Services – An HDFC Bank company',
                'description' => 'HDB Financial Services specializes in automotive financing with convenient processing for new and pre-owned vehicle purchases.',
                'interest_range' => '11.00% - 16.00% p.a.',
                'max_tenure' => 'Up to 60 months',
                'special_features' => ['Quick vehicle valuation', 'RTO transfer support', 'High loan-to-value ratio'],
                'processing_fee_offer' => 'Discounted fees for pre-owned car financing'
            ],
            [
                'name' => 'Mahindra Finance',
                'slug' => 'mahindra-finance',
                'type' => 'NBFC',
                'logo_text' => 'MAHINDRA',
                'accent' => '#E31837',
                'products' => ['New Car Loan', 'Used Car Loan'],
                'tagline' => 'Leading rural and semi-urban auto financier',
                'description' => 'Mahindra & Mahindra Financial Services is a household name for vehicle financing with unmatched understanding of Indian automotive buyers.',
                'interest_range' => '10.50% - 15.50% p.a.',
                'max_tenure' => 'Up to 72 months',
                'special_features' => ['Deep dealership ties', 'Hassle-free approvals', 'Flexible repayment schedules'],
                'processing_fee_offer' => 'Zero fee offers during auto expo and festive seasons'
            ],
            [
                'name' => 'Indostar Capital',
                'slug' => 'indostar-capital',
                'type' => 'NBFC',
                'logo_text' => 'INDOSTAR',
                'accent' => '#143D69',
                'products' => ['New Car Loan', 'Used Car Loan'],
                'tagline' => 'Commercial and retail vehicle finance experts',
                'description' => 'Indostar Capital provides specialized auto and used vehicle financing with quick valuations and straightforward documentation.',
                'interest_range' => '12.00% - 17.50% p.a.',
                'max_tenure' => 'Up to 60 months',
                'special_features' => ['Used car inspection assistance', 'Flexible documentation', 'Transparent interest calculations'],
                'processing_fee_offer' => 'Zero processing fee campaigns on select car categories'
            ],
            [
                'name' => 'Muthoot Capital',
                'slug' => 'muthoot-capital',
                'type' => 'NBFC',
                'logo_text' => 'MUTHOOT',
                'accent' => '#E31B23',
                'products' => ['New Car Loan', 'Used Car Loan'],
                'tagline' => 'Muthoot Pappachan Group auto finance',
                'description' => 'Muthoot Capital offers accessible vehicle financing solutions for families and individuals looking to purchase new or certified pre-owned cars.',
                'interest_range' => '11.75% - 17.00% p.a.',
                'max_tenure' => 'Up to 60 months',
                'special_features' => ['Quick processing', 'Trusted family brand', 'Customer-friendly terms'],
                'processing_fee_offer' => 'Promotional fee exemptions available'
            ],

            // Banks
            [
                'name' => 'HDFC Bank',
                'slug' => 'hdfc-bank',
                'type' => 'Bank',
                'logo_text' => 'HDFC BANK',
                'accent' => '#004C8F',
                'products' => ['Salaried Personal Loan', 'Business Loan', 'Doctor & CA Loan', 'New Car Loan', 'Used Car Loan'],
                'tagline' => 'India\'s largest private sector bank',
                'description' => 'HDFC Bank is the benchmark for Indian retail banking, offering industry-best interest rates, 10-second instant loan sanctions for existing account holders, and extensive lending options across all categories.',
                'interest_range' => '10.49% - 15.00% p.a.',
                'max_tenure' => 'Up to 84 months',
                'special_features' => ['10-second pre-approved personal loans', 'Industry-lowest auto loan rates', 'Comprehensive digital netbanking ecosystem'],
                'processing_fee_offer' => 'Zero processing fee promotional offers for salary account holders and doctors'
            ],
            [
                'name' => 'ICICI Bank',
                'slug' => 'icici-bank',
                'type' => 'Bank',
                'logo_text' => 'ICICI BANK',
                'accent' => '#B02A30',
                'products' => ['Salaried Personal Loan', 'Business Loan', 'Doctor & CA Loan', 'New Car Loan', 'Used Car Loan'],
                'tagline' => 'Hum Hai Na – Trusted financial partner for millions',
                'description' => 'ICICI Bank delivers cutting-edge digital banking with pre-approved personal loans, paperless business credit, and attractive auto loan financing.',
                'interest_range' => '10.65% - 15.50% p.a.',
                'max_tenure' => 'Up to 84 months',
                'special_features' => ['Instant digital approvals', 'Up to 100% on-road car finance', 'Special privileges for medical and accounting professionals'],
                'processing_fee_offer' => 'Zero processing fee special days and festive schemes'
            ],
            [
                'name' => 'Axis Bank',
                'slug' => 'axis-bank',
                'type' => 'Bank',
                'logo_text' => 'AXIS BANK',
                'accent' => '#97144D',
                'products' => ['Salaried Personal Loan', 'Business Loan', 'Doctor & CA Loan', 'New Car Loan', 'Used Car Loan'],
                'tagline' => 'Badhti Ka Naam Zindagi – Third largest private bank',
                'description' => 'Axis Bank offers flexible credit solutions, tailored professional loans for doctors and CAs, and competitive auto loans with low EMIs.',
                'interest_range' => '10.49% - 15.75% p.a.',
                'max_tenure' => 'Up to 84 months',
                'special_features' => ['Part-payment options', 'Minimal documentation', 'Fast turnaround time'],
                'processing_fee_offer' => 'Promotional zero processing fee waivers on personal and car loans'
            ],
            [
                'name' => 'IndusInd Bank',
                'slug' => 'indusind-bank',
                'type' => 'Bank',
                'logo_text' => 'INDUSIND BANK',
                'accent' => '#832527',
                'products' => ['Salaried Personal Loan', 'Business Loan', 'Doctor & CA Loan', 'New Car Loan', 'Used Car Loan'],
                'tagline' => 'Pioneer in automotive and retail financing',
                'description' => 'IndusInd Bank boasts deep expertise in vehicle and personal financing, with attractive rates and digital on-boarding.',
                'interest_range' => '10.75% - 16.00% p.a.',
                'max_tenure' => 'Up to 60 months',
                'special_features' => ['Market leaders in auto loans', 'Doorstep document assistance', 'Tailored business credit lines'],
                'processing_fee_offer' => 'Special zero processing fee schemes for eligible applicants'
            ],
            [
                'name' => 'IDFC FIRST Bank',
                'slug' => 'idfc-bank',
                'type' => 'Bank',
                'logo_text' => 'IDFC FIRST',
                'accent' => '#9B1C2E',
                'products' => ['Salaried Personal Loan', 'Business Loan', 'Doctor & CA Loan', 'New Car Loan', 'Used Car Loan'],
                'tagline' => 'Always You First – Transparent banking with zero penalties',
                'description' => 'IDFC FIRST Bank is widely acclaimed for its customer-friendly terms, dynamic interest rates, zero foreclosure charges on select loans, and transparent policies.',
                'interest_range' => '10.49% - 15.00% p.a.',
                'max_tenure' => 'Up to 84 months',
                'special_features' => ['Zero foreclosure charges on select products', 'Seamless digital journey', 'Attractive rates for high CIBIL scores'],
                'processing_fee_offer' => 'Exclusive zero processing fee programs on digital applications'
            ],
            [
                'name' => 'Bandhan Bank',
                'slug' => 'bandhan-bank',
                'type' => 'Bank',
                'logo_text' => 'BANDHAN BANK',
                'accent' => '#00529B',
                'products' => ['Salaried Personal Loan', 'Business Loan', 'Doctor & CA Loan', 'New Car Loan', 'Used Car Loan'],
                'tagline' => 'Aapka Bhala, Sabki Bhalai – Comprehensive retail bank',
                'description' => 'Bandhan Bank provides competitive lending options for salaried individuals, growing businesses, and professionals with personalized customer attention.',
                'interest_range' => '10.99% - 16.50% p.a.',
                'max_tenure' => 'Up to 60 months',
                'special_features' => ['Strong presence across Eastern India', 'Friendly customer service', 'Comprehensive product suite'],
                'processing_fee_offer' => 'Competitive fees with zero-fee festive discounts'
            ],
            [
                'name' => 'YES Bank',
                'slug' => 'yes-bank',
                'type' => 'Bank',
                'logo_text' => 'YES BANK',
                'accent' => '#004A8F',
                'products' => ['Salaried Personal Loan', 'Business Loan', 'Doctor & CA Loan', 'New Car Loan', 'Used Car Loan'],
                'tagline' => 'Life Ko Banao Rich – Modern retail and digital banking',
                'description' => 'YES Bank offers rapid digital personal loans, competitive car financing, and working capital loans with simple verification and quick disbursal.',
                'interest_range' => '10.75% - 16.25% p.a.',
                'max_tenure' => 'Up to 60 months',
                'special_features' => ['Digital sanction in minutes', 'Pre-approved car loan programs', 'Dedicated RM assistance'],
                'processing_fee_offer' => 'Zero processing fee offers during quarterly promotions'
            ]
        ];
    }

    public static function getLenderBySlug(string $slug): ?array
    {
        $all = self::getAllLenders();
        foreach ($all as $lender) {
            if ($lender['slug'] === $slug) {
                return $lender;
            }
        }
        return null;
    }

    public static function getStats(): array
    {
        return [
            [
                'label' => 'Happy Customers Assisted',
                'value' => '25,000+',
                'icon' => 'users',
                'desc' => 'Across 120+ Indian cities'
            ],
            [
                'label' => 'Banking & NBFC Partners',
                'value' => '50+',
                'icon' => 'landmark',
                'desc' => 'Leading institutional lenders'
            ],
            [
                'label' => 'Approval Rate Assistance',
                'value' => '95%',
                'icon' => 'check-circle-2',
                'desc' => 'Tailored profile matching'
            ],
            [
                'label' => 'Fast Processing Time',
                'value' => '24–48 Hrs',
                'icon' => 'clock',
                'desc' => 'Swift verification & disbursal'
            ]
        ];
    }

    public static function getWhyChooseUs(): array
    {
        return [
            [
                'title' => 'No Processing Fee Offers',
                'icon' => 'percent',
                'color' => 'emerald',
                'desc' => 'Save thousands on upfront expenses. We curate exclusive zero processing fee and discounted fee promotional offers from leading Banks and NBFCs for eligible borrowers.'
            ],
            [
                'title' => 'Multiple Lending Options',
                'icon' => 'layers',
                'color' => 'blue',
                'desc' => 'Compare loan quotes side-by-side from 23+ premier Banks and top NBFCs in India. Discover competitive interest rates without running from bank to bank.'
            ],
            [
                'title' => 'Dedicated Customer Support',
                'icon' => 'headphones',
                'color' => 'indigo',
                'desc' => 'Our experienced loan advisors guide you at every stage — from document verification to lender submission, query resolution, and final disbursement.'
            ],
            [
                'title' => '100% Transparent Process',
                'icon' => 'shield-check',
                'color' => 'teal',
                'desc' => 'No hidden charges, zero surprises, and clear terms. We maintain complete transparency regarding interest rates, tenures, and lender evaluation criteria.'
            ],
            [
                'title' => 'Application Assistance',
                'icon' => 'zap',
                'color' => 'amber',
                'desc' => 'We help optimize your application to match specific lender underwriting algorithms, significantly increasing the probability of your loan approval.'
            ]
        ];
    }

    public static function getHowItWorks(): array
    {
        return [
            [
                'step' => '01',
                'title' => 'Submit Your Enquiry',
                'desc' => 'Fill out our quick 2-minute loan enquiry form with your basic personal, employment, and loan requirement details.',
                'icon' => 'file-text'
            ],
            [
                'step' => '02',
                'title' => 'Check Eligibility',
                'desc' => 'Our smart matching engine evaluates your profile against multiple Banks & NBFC criteria to surface your best loan options.',
                'icon' => 'search'
            ],
            [
                'step' => '03',
                'title' => 'Upload Documents',
                'desc' => 'Submit your KYC, bank statements, and income proofs through our 100% secure, encrypted digital document portal.',
                'icon' => 'upload-cloud'
            ],
            [
                'step' => '04',
                'title' => 'Bank/NBFC Processing',
                'desc' => 'We coordinate directly with our partner lenders to expedite credit appraisal, verification, and sanction with zero processing fee offers.',
                'icon' => 'landmark'
            ],
            [
                'step' => '05',
                'title' => 'Loan Decision & Disbursement',
                'desc' => 'Sign the loan agreement digitally and receive approved funds credited directly into your verified bank account.',
                'icon' => 'badge-check'
            ]
        ];
    }

    public static function getTestimonials(): array
    {
        return [
            [
                'name' => 'Rahul Sharma',
                'city' => 'Mumbai, Maharashtra',
                'role' => 'Senior IT Consultant',
                'avatar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&auto=format&fit=crop&q=80',
                'loan_type' => 'Salaried Personal Loan',
                'amount' => '₹8,50,000',
                'rating' => 5,
                'quote' => 'Got my personal loan approved within 2 days through ProcessingFreeLoan.com. The process was completely hassle-free, and best of all, I saved ₹15,000 in processing fees thanks to their zero fee offer!'
            ],
            [
                'name' => 'Dr. Priya Sen',
                'city' => 'Kolkata, West Bengal',
                'role' => 'Consultant Dermatologist',
                'avatar' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=150&auto=format&fit=crop&q=80',
                'loan_type' => 'Doctor Professional Loan',
                'amount' => '₹25,00,000',
                'rating' => 5,
                'quote' => 'Setting up my new clinic required immediate capital. The team guided me to an exclusive doctor loan with zero collateral and zero processing charges. Excellent customer support and rapid disbursal!'
            ],
            [
                'name' => 'Amit Verma',
                'city' => 'Bengaluru, Karnataka',
                'role' => 'Business Owner & Director',
                'avatar' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=150&auto=format&fit=crop&q=80',
                'loan_type' => 'Unsecured Business Loan',
                'amount' => '₹40,00,000',
                'rating' => 5,
                'quote' => 'Best platform to compare business loan offers in India. I got quotes from Tata Capital, Bajaj, and HDFC Bank simultaneously. The transparency, speed, and loan advice saved me both time and money.'
            ],
            [
                'name' => 'Vikram Singhania',
                'city' => 'New Delhi',
                'role' => 'Chartered Accountant',
                'avatar' => 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?w=150&auto=format&fit=crop&q=80',
                'loan_type' => 'CA Professional Loan',
                'amount' => '₹18,00,000',
                'rating' => 5,
                'quote' => 'As a CA, I pay attention to every line of charges. ProcessingFreeLoan.com kept every promise — competitive 10.25% interest rate, no processing charges, and professional handling.'
            ]
        ];
    }

    public static function getFaqs(): array
    {
        return [
            [
                'question' => 'Is there any processing fee for a loan?',
                'answer' => 'We actively partner with leading Banks & NBFCs to offer promotional loan schemes featuring Zero Processing Fee for eligible salaried, business, doctor, and CA profiles. However, standard processing fee policies vary by individual lending institution and credit risk category. When applicable, all fees are disclosed upfront with zero hidden charges.'
            ],
            [
                'question' => 'What is the minimum and maximum loan amount?',
                'answer' => 'Loan amounts range from ₹50,000 up to ₹50 Lakhs for personal loans, and up to ₹2 Crore or more for collateral-free business loans, subject to your monthly income, turnover, repayment capacity, and credit score.'
            ],
            [
                'question' => 'How long does loan approval and disbursal take?',
                'answer' => 'Pre-approved and digital applications can receive in-principle sanction in as little as 10 to 30 minutes. Once document verification is complete, loan disbursement into your bank account typically occurs within 24 to 48 working hours.'
            ],
            [
                'question' => 'Which banks and NBFCs do you work with?',
                'answer' => 'We assist customers with 23+ leading institutions including HDFC Bank, ICICI Bank, Axis Bank, IDFC FIRST Bank, IndusInd Bank, YES Bank, Bandhan Bank, Bajaj Finance, Tata Capital, Cholamandalam, Poonawalla Fincorp, Piramal Finance, Aditya Birla, SMFG India, L&T Finance, and others.'
            ],
            [
                'question' => 'What documents are required to apply for a loan?',
                'answer' => 'Basic documents include: PAN Card, Aadhaar Card, Last 3 months Salary Slips / Form 16 (for salaried) or 2 years ITR with Financials (for self-employed), and Last 6 months bank account statements. Doctors and CAs provide their respective registration and practice certificates.'
            ],
            [
                'question' => 'Can self-employed individuals and business owners apply?',
                'answer' => 'Yes, absolutely! We offer tailored Business Loans, Doctor Loans, CA Loans, and Used/New Car Loans specifically designed for self-employed individuals, proprietorships, partnerships, and private limited firms.'
            ],
            [
                'question' => 'How can I check my loan eligibility?',
                'answer' => 'You can check your eligibility instantly using our Quick Loan Eligibility Tool or by submitting your basic details on our enquiry form. Our algorithms calculate your debt-to-income ratio and identify the lenders most likely to approve your loan.'
            ],
            [
                'question' => 'Is loan approval guaranteed?',
                'answer' => 'Final loan sanction and disbursement are subject to the independent underwriting, risk evaluation, and KYC verification conducted by the respective RBI-regulated Bank or NBFC. We assist you in finding the most suitable lender match to maximize approval chances.'
            ]
        ];
    }

    public static function getArticles(): array
    {
        return [
            [
                'slug' => 'how-to-improve-loan-eligibility',
                'title' => 'How to Improve Your Loan Eligibility in 2025',
                'category' => 'Loan Tips & Guides',
                'read_time' => '4 min read',
                'date' => 'Nov 15, 2025',
                'image' => 'https://images.unsplash.com/photo-1579621970563-ebec7560ff3e?w=800&auto=format&fit=crop&q=80',
                'excerpt' => 'Discover key steps to boost your CIBIL score, maintain an optimal debt-to-income ratio, and secure zero-processing-fee loan approvals.',
                'content' => 'Applying for a loan in India requires strategic preparation. Lenders scrutinize credit scores, bank statements, and debt obligations before sanctioning credit. Key strategies include maintaining credit card utilization below 30%, clearing overdue debts, avoiding multiple simultaneous loan applications, and keeping bank balances stable over 6 months.'
            ],
            [
                'slug' => 'new-car-loan-vs-used-car-loan',
                'title' => 'New Car Loan vs Used Car Loan: Which is Better for You?',
                'category' => 'Auto Financing',
                'read_time' => '5 min read',
                'date' => 'Nov 12, 2025',
                'image' => 'https://images.unsplash.com/photo-1549399542-7e3f8b79c341?w=800&auto=format&fit=crop&q=80',
                'excerpt' => 'A comprehensive comparison of interest rates, insurance costs, depreciation, and EMI structures for new vs pre-owned vehicle purchases.',
                'content' => 'Choosing between a new car and a pre-owned vehicle involves more than just sticker price. While new car loans offer lower interest rates (starting ~8.65% p.a.) and longer tenures up to 7 years, pre-owned cars offer superior value with lower initial depreciation. We analyze the total cost of ownership across major Indian lenders.'
            ],
            [
                'slug' => 'how-emi-is-calculated-complete-guide',
                'title' => 'How EMI is Calculated: A Complete Guide for Borrowers',
                'category' => 'Financial Literacy',
                'read_time' => '6 min read',
                'date' => 'Nov 08, 2025',
                'image' => 'https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?w=800&auto=format&fit=crop&q=80',
                'excerpt' => 'Understand the mathematics behind reducing-balance EMI calculations, amortization schedules, and prepayments that save you lakhs in interest.',
                'content' => 'Equated Monthly Installment (EMI) consists of both principal repayment and interest payout. Using the reducing balance formula [P x R x (1+R)^N] / [(1+R)^N - 1], borrowers pay higher interest in early installments. Making part-prepayments during the initial third of your loan tenure drastically slashes total interest.'
            ]
        ];
    }

    public static function getArticleBySlug(string $slug): ?array
    {
        $all = self::getArticles();
        foreach ($all as $article) {
            if ($article['slug'] === $slug) {
                return $article;
            }
        }
        return null;
    }
}
