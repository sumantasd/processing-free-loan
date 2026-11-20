<?php

namespace App\Services;

class FintechDataService
{
    public static function getBrandConfig(): array
    {
        return [
            'name' => 'Processing Free Loan',
            'tagline' => 'LOAN WITHOUT PROCESSING FEE',
            'domain' => 'ProcessingFreeLoan.com',
            'website_url' => 'https://processingfreeloan.com/',
            'company_identity' => 'Unit Of Findeal Financial Private Limited',
            'registered_office' => 'Khata No. 3429, Premer Danga, Near PDB High School, Khattimari, Cooch Behar, West Bengal – 736171, India.',
            'google_maps_url' => 'https://maps.google.com/?q=Premer+Danga+Khattimari+Cooch+Behar+West+Bengal+736171',
            'phone' => '+91 7074906556',
            'phone_url' => 'tel:+917074906556',
            'email' => 'support@processingfreeloan.com',
            'email_url' => 'mailto:support@processingfreeloan.com',
            'support_hours' => 'Mon - Sat: 9:30 AM - 7:00 PM',
            'developer_name' => 'Tech Googly',
            'developer_url' => 'https://techgoogly.com/',
            'social' => [
                'facebook' => 'https://facebook.com/processingfreeloan',
                'instagram' => 'https://instagram.com/processingfreeloan',
                'youtube' => 'https://youtube.com/@processingfreeloan',
                'linkedin' => 'https://linkedin.com/company/processingfreeloan',
            ],
            'disclaimer' => 'ProcessingFreeLoan.com (Unit Of Findeal Financial Private Limited) is a financial loan aggregator and comparison platform assisting Indian borrowers with loan discovery from RBI-regulated Banks and NBFCs. We are not a direct lender. Processing fee waiver offers are subject to individual lender policies, credit evaluation, and specific promo schemes. Final interest rates and terms are solely determined by the lending institution.'
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
                'description' => 'Cover medical expenses, family milestones, travel, or home upgrades with collateral-free personal loans from leading Banks and NBFCs at competitive interest rates.',
                'key_benefits' => [
                    'Zero processing fee promotional schemes on eligible profiles',
                    '100% paperless digital verification process',
                    'Flexible repayment tenure up to 6 years',
                    'Direct bank disbursement within 24 to 48 hours',
                    'No collateral or physical guarantor required'
                ],
                'eligibility' => [
                    'Nationality: Resident Indian Citizen',
                    'Age: 21 to 58 years at loan maturity',
                    'Monthly Net Salary: Min ₹20,000/month',
                    'Employment: Minimum 1 year continuous work experience',
                    'CIBIL Score: 680+ for fastest zero-fee approval'
                ],
                'documents' => [
                    'Identity Proof: PAN Card (Mandatory), Aadhaar Card',
                    'Address Proof: Aadhaar Card, Recent Utility Bill, or Rent Agreement',
                    'Income Proof: Latest 3 months salary slips, Form 16 / ITR',
                    'Banking: Last 6 months bank statement showing regular salary credits',
                    'Photographs: 1 Passport size photograph or digital selfie'
                ],
                'suitable_lenders' => [
                    'Bajaj Finance', 'Cholamandalam', 'Tata Capital', 'Poonawalla Fincorp', 'Piramal Finance', 'Aditya Birla', 'SMFG India', 'Finnable', 'InCred',
                    'HDFC Bank', 'ICICI Bank', 'Axis Bank', 'IndusInd Bank', 'IDFC Bank', 'Bandhan Bank', 'YES Bank'
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
                'description' => 'Expand working capital, purchase machinery, stock inventory, or manage cash flow seamlessly with unsecured business finance tailored for Indian MSMEs.',
                'key_benefits' => [
                    'Collateral-free business credit with no property mortgage',
                    'Exclusive processing fee discount & zero-fee lender partnerships',
                    'Overdraft and term loan options available',
                    'Fast sanction based on GST and banking turnover',
                    'Tax deductible interest under business operational expenses'
                ],
                'eligibility' => [
                    'Business Entity: Sole Proprietorship, Partnership, LLP, Pvt Ltd',
                    'Business Vintage: Minimum 2 to 3 years in continuous operation',
                    'Annual Turnover: Minimum ₹20 Lakhs audited turnover',
                    'Applicant Age: 24 to 65 years',
                    'Credit Health: Business vintage & promoter CIBIL score 700+'
                ],
                'documents' => [
                    'Entity Proof: GST Registration, Trade License, MSME/Udyam Certificate',
                    'Financials: Audited Balance Sheet & P&L statements for last 2 years with CA seal',
                    'Tax Documents: Last 12 months GST returns (GSTR-3B) and 2 years ITR',
                    'Bank Statements: Last 12 months primary operative current account statements',
                    'KYC: PAN Card & Aadhaar of all promoters/directors'
                ],
                'suitable_lenders' => [
                    'Bajaj Finance', 'Cholamandalam', 'Tata Capital', 'Poonawalla Fincorp', 'L & T Finance', 'Aditya Birla', 'Piramal Finance', 'Godrej Finance', 'SMFG India', 'Axis Finance',
                    'HDFC Bank', 'ICICI Bank', 'Axis Bank', 'IndusInd Bank', 'IDFC Bank', 'Bandhan Bank', 'YES Bank'
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
                'description' => 'Drive your dream hatchback, sedan, or SUV with competitive interest rates, up to 100% on-road funding, and zero processing fee festive promotions.',
                'key_benefits' => [
                    'Up to 100% on-road financing (ex-showroom + insurance + road tax)',
                    'Tie-ups with leading automobile dealerships pan-India',
                    'Extended repayment tenures up to 7 years for low monthly EMIs',
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
                    'Cholamandalam', 'HDB Finance', 'Mahindra Finance', 'Poonawalla Fincorp', 'Tata Capital', 'Indostar Capital', 'Muthoot Capital',
                    'Axis Bank', 'HDFC Bank', 'ICICI Bank', 'IDFC Bank', 'YES Bank', 'IndusInd Bank', 'Bandhan Bank'
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
                'description' => 'Own a certified pre-owned car with quick vehicle valuation, RC transfer assistance, and customized loan packages with zero processing fee offers.',
                'key_benefits' => [
                    'Financing up to 90%–100% of fair market vehicle valuation',
                    'Assistance with Regional Transport Office (RTO) transfer & hypothecation',
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
                    'Axis Bank', 'HDFC Bank', 'ICICI Bank', 'IDFC Bank', 'YES Bank', 'IndusInd Bank', 'Bandhan Bank'
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
                    'Medical Registration: Registered with Medical Council of India (MCI) or State Council',
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
                    'Bajaj Finance', 'Cholamandalam', 'Tata Capital', 'Poonawalla Fincorp', 'L & T Finance', 'Aditya Birla', 'Piramal Finance', 'Godrej Finance', 'SMFG India', 'Axis Finance',
                    'HDFC Bank', 'ICICI Bank', 'Axis Bank', 'IndusInd Bank', 'IDFC Bank', 'Bandhan Bank', 'YES Bank'
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
                    'Bajaj Finance', 'Cholamandalam', 'Tata Capital', 'Poonawalla Fincorp', 'L & T Finance', 'Aditya Birla', 'Piramal Finance', 'Godrej Finance', 'SMFG India', 'Axis Finance',
                    'HDFC Bank', 'ICICI Bank', 'Axis Bank', 'IndusInd Bank', 'IDFC Bank', 'Bandhan Bank', 'YES Bank'
                ]
            ]
        ];
    }

    public static function getAllLenders(): array
    {
        // Strictly the 16 NBFCs and 7 Banks from the provided Excel database
        return [
            // 16 NBFCs
            [
                'name' => 'Bajaj Finance',
                'slug' => 'bajaj-finance',
                'type' => 'NBFC',
                'accent' => '#005CA9',
                'products' => ['Salaried Personal Loan', 'Business Loan', 'Doctor & CA Loan'],
                'tagline' => 'India\'s largest diversified retail NBFC',
                'description' => 'Bajaj Finance offers paperless approvals, flexible flexi-loan features, and quick digital disbursements across personal, business, and doctor loans.',
                'interest_range' => '10.50% - 16.00% p.a.',
                'max_tenure' => 'Up to 84 months',
                'special_features' => ['Flexi Hybrid EMI Facility', 'Instant digital sanction', 'Minimal documentation'],
                'processing_fee_offer' => 'Zero processing fee campaigns available on specific promo schemes'
            ],
            [
                'name' => 'Cholamandalam',
                'slug' => 'cholamandalam',
                'type' => 'NBFC',
                'accent' => '#C41230',
                'products' => ['Salaried Personal Loan', 'Business Loan', 'Doctor & CA Loan', 'New Car Loan', 'Used Car Loan'],
                'tagline' => 'Murugappa Group company empowering Indian dreams',
                'description' => 'Cholamandalam Investment and Finance Company delivers tailored vehicle finance, business capital, and personal funding across India.',
                'interest_range' => '11.00% - 17.50% p.a.',
                'max_tenure' => 'Up to 60 months',
                'special_features' => ['High valuation for used cars', 'Extensive branch network', 'Customized MSME solutions'],
                'processing_fee_offer' => 'Special fee waivers for priority customer segments'
            ],
            [
                'name' => 'Tata Capital',
                'slug' => 'tata-capital',
                'type' => 'NBFC',
                'accent' => '#0A5FA4',
                'products' => ['Salaried Personal Loan', 'Business Loan', 'Doctor & CA Loan', 'New Car Loan', 'Used Car Loan'],
                'tagline' => 'Trusted financial arm of the Tata Group',
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
                'accent' => '#E31B23',
                'products' => ['New Car Loan', 'Used Car Loan'],
                'tagline' => 'Muthoot Pappachan Group auto finance',
                'description' => 'Muthoot Capital offers accessible vehicle financing solutions for families and individuals looking to purchase new or certified pre-owned cars.',
                'interest_range' => '11.75% - 17.00% p.a.',
                'max_tenure' => 'Up to 60 months',
                'special_features' => ['Quick processing', 'Trusted family brand', 'Customer-friendly terms'],
                'processing_fee_offer' => 'Promotional fee exemptions available'
            ],

            // 7 Banks
            [
                'name' => 'HDFC Bank',
                'slug' => 'hdfc-bank',
                'type' => 'Bank',
                'accent' => '#004C8F',
                'products' => ['Salaried Personal Loan', 'Business Loan', 'Doctor & CA Loan', 'New Car Loan', 'Used Car Loan'],
                'tagline' => 'India\'s largest private sector bank',
                'description' => 'HDFC Bank offers industry-leading interest rates, 10-second instant loan sanctions for account holders, and extensive lending options across all categories.',
                'interest_range' => '10.49% - 15.00% p.a.',
                'max_tenure' => 'Up to 84 months',
                'special_features' => ['10-second pre-approved personal loans', 'Industry-lowest auto loan rates', 'Comprehensive digital netbanking ecosystem'],
                'processing_fee_offer' => 'Zero processing fee promotional offers for salary account holders and doctors'
            ],
            [
                'name' => 'ICICI Bank',
                'slug' => 'icici-bank',
                'type' => 'Bank',
                'accent' => '#B02A30',
                'products' => ['Salaried Personal Loan', 'Business Loan', 'Doctor & CA Loan', 'New Car Loan', 'Used Car Loan'],
                'tagline' => 'Trusted financial partner for millions',
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
                'accent' => '#97144D',
                'products' => ['Salaried Personal Loan', 'Business Loan', 'Doctor & CA Loan', 'New Car Loan', 'Used Car Loan'],
                'tagline' => 'Leading private bank in personal and retail finance',
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
                'name' => 'IDFC Bank',
                'slug' => 'idfc-bank',
                'type' => 'Bank',
                'accent' => '#9B1C2E',
                'products' => ['Salaried Personal Loan', 'Business Loan', 'Doctor & CA Loan', 'New Car Loan', 'Used Car Loan'],
                'tagline' => 'Transparent banking with customer-first policies',
                'description' => 'IDFC Bank (IDFC FIRST Bank) is widely acclaimed for its customer-friendly terms, dynamic interest rates, zero foreclosure charges on select loans, and transparent policies.',
                'interest_range' => '10.49% - 15.00% p.a.',
                'max_tenure' => 'Up to 84 months',
                'special_features' => ['Zero foreclosure charges on select products', 'Seamless digital journey', 'Attractive rates for high CIBIL scores'],
                'processing_fee_offer' => 'Exclusive zero processing fee programs on digital applications'
            ],
            [
                'name' => 'Bandhan Bank',
                'slug' => 'bandhan-bank',
                'type' => 'Bank',
                'accent' => '#00529B',
                'products' => ['Salaried Personal Loan', 'Business Loan', 'Doctor & CA Loan', 'New Car Loan', 'Used Car Loan'],
                'tagline' => 'Empowering Eastern India and nationwide retail banking',
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
                'accent' => '#004A8F',
                'products' => ['Salaried Personal Loan', 'Business Loan', 'Doctor & CA Loan', 'New Car Loan', 'Used Car Loan'],
                'tagline' => 'Modern retail and digital banking solutions',
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
                'label' => 'Customers Assisted',
                'value' => '25,000+',
                'icon' => 'users',
                'desc' => 'Across West Bengal & India'
            ],
            [
                'label' => 'Lending Institutions',
                'value' => '23+',
                'icon' => 'landmark',
                'desc' => 'Verified Banks & NBFCs'
            ],
            [
                'label' => 'Applications Assisted',
                'value' => '95%',
                'icon' => 'check-circle-2',
                'desc' => 'Pre-qualified matching'
            ],
            [
                'label' => 'Customer Support',
                'value' => '24/7 Desk',
                'icon' => 'headphones',
                'desc' => 'Dedicated loan assistance'
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
                'title' => 'Multiple Loan Options',
                'icon' => 'layers',
                'color' => 'blue',
                'desc' => 'Compare loan quotes side-by-side from 23+ premier Banks and top NBFCs in India. Discover competitive interest rates without running from bank to bank.'
            ],
            [
                'title' => 'Dedicated Support',
                'icon' => 'headphones',
                'color' => 'indigo',
                'desc' => 'Our experienced loan advisors guide you at every stage — from document verification to lender submission, query resolution, and final disbursement.'
            ],
            [
                'title' => 'Transparent Process',
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
                'name' => 'Subrata Mukherjee',
                'city' => 'Kolkata, West Bengal',
                'role' => 'Senior IT Consultant',
                'avatar' => '/images/testimonials/subrata-mukherjee.jpg',
                'loan_type' => 'Salaried Personal Loan',
                'amount' => '₹8,50,000',
                'rating' => 5,
                'quote' => 'Got my personal loan approved within 2 days through ProcessingFreeLoan.com. The process was completely hassle-free, and best of all, I saved ₹17,000 in processing fees thanks to their zero fee offer!'
            ],
            [
                'name' => 'Dr. Debolina Banerjee',
                'city' => 'Siliguri, West Bengal',
                'role' => 'Consultant Dermatologist',
                'avatar' => '/images/testimonials/debolina-banerjee.jpg',
                'loan_type' => 'Doctor Professional Loan',
                'amount' => '₹25,00,000',
                'rating' => 5,
                'quote' => 'Setting up my new diagnostic clinic required immediate capital. The team guided me to an exclusive doctor loan with zero collateral and zero processing charges. Excellent customer support and rapid disbursal!'
            ],
            [
                'name' => 'Anupam Roy',
                'city' => 'Cooch Behar, West Bengal',
                'role' => 'Retail Business Owner',
                'avatar' => '/images/testimonials/anupam-roy.jpg',
                'loan_type' => 'Unsecured Business Loan',
                'amount' => '₹40,00,000',
                'rating' => 5,
                'quote' => 'Best platform to compare business loan offers. I got quotes from Tata Capital, Bajaj, and Bandhan Bank simultaneously. The transparency, speed, and local West Bengal support saved me both time and money.'
            ],
            [
                'name' => 'Soumen Das, FCA',
                'city' => 'Durgapur, West Bengal',
                'role' => 'Chartered Accountant',
                'avatar' => '/images/testimonials/soumen-das.jpg',
                'loan_type' => 'CA Professional Loan',
                'amount' => '₹18,00,000',
                'rating' => 5,
                'quote' => 'As a CA, I pay attention to every fine-print deduction. ProcessingFreeLoan.com kept every promise — competitive 10.25% interest rate, zero processing charges, and professional handling.'
            ],
            [
                'name' => 'Rahul Ghosh',
                'city' => 'Howrah, West Bengal',
                'role' => 'Corporate Salaried Manager',
                'avatar' => '/images/testimonials/rahul-ghosh.jpg',
                'loan_type' => 'New Car Loan',
                'amount' => '₹12,00,000',
                'rating' => 5,
                'quote' => 'Secured 100% on-road funding for my new sedan with zero processing fees. The online guidance was top-notch and the loan was sanctioned without any dealership markups.'
            ],
            [
                'name' => 'Priyanka Sen',
                'city' => 'Asansol, West Bengal',
                'role' => 'Senior School Educator',
                'avatar' => '/images/testimonials/priyanka-sen.jpg',
                'loan_type' => 'Salaried Personal Loan',
                'amount' => '₹5,00,000',
                'rating' => 5,
                'quote' => 'Very reliable platform for salaried employees. The team explained the entire EMI repayment structure clearly, and I received the funds directly in my account in 36 hours.'
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
                'question' => 'How long does loan approval take?',
                'answer' => 'Pre-approved and digital applications can receive in-principle sanction in as little as 10 to 30 minutes. Once document verification is complete, loan disbursement into your bank account typically occurs within 24 to 48 working hours.'
            ],
            [
                'question' => 'Which banks and NBFCs offer loan options?',
                'answer' => 'We assist customers with 23+ leading institutions including HDFC Bank, ICICI Bank, Axis Bank, IDFC Bank, IndusInd Bank, YES Bank, Bandhan Bank, Bajaj Finance, Tata Capital, Cholamandalam, Poonawalla Fincorp, Piramal Finance, Aditya Birla, SMFG India, L & T Finance, Godrej Finance, Axis Finance, HDB Finance, Mahindra Finance, Indostar Capital, Muthoot Capital, Finnable, and InCred.'
            ],
            [
                'question' => 'What documents are required?',
                'answer' => 'Basic documents include: PAN Card, Aadhaar Card, Last 3 months Salary Slips / Form 16 (for salaried) or 2 years ITR with Financials (for self-employed), and Last 6 months bank account statements. Doctors and CAs provide their respective registration and practice certificates.'
            ],
            [
                'question' => 'Can self-employed individuals apply?',
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
                'title' => 'How to Improve Your Loan Eligibility in 2026',
                'category' => 'Loan Tips & Guides',
                'read_time' => '4 min read',
                'date' => 'Jan 15, 2026',
                'image' => 'https://images.unsplash.com/photo-1579621970563-ebec7560ff3e?w=800&auto=format&fit=crop&q=80',
                'excerpt' => 'Discover key steps to boost your CIBIL score, maintain an optimal debt-to-income ratio, and secure zero-processing-fee loan approvals.',
                'content' => 'Applying for a loan in India requires strategic preparation. Lenders scrutinize credit scores, bank statements, and debt obligations before sanctioning credit. Key strategies include maintaining credit card utilization below 30%, clearing overdue debts, avoiding multiple simultaneous loan applications, and keeping bank balances stable over 6 months.'
            ],
            [
                'slug' => 'new-car-loan-vs-used-car-loan',
                'title' => 'New Car Loan vs Used Car Loan: Which is Better for You?',
                'category' => 'Auto Financing',
                'read_time' => '5 min read',
                'date' => 'Jan 10, 2026',
                'image' => 'https://images.unsplash.com/photo-1549399542-7e3f8b79c341?w=800&auto=format&fit=crop&q=80',
                'excerpt' => 'A comprehensive comparison of interest rates, insurance costs, depreciation, and EMI structures for new vs pre-owned vehicle purchases.',
                'content' => 'Choosing between a new car and a pre-owned vehicle involves more than just sticker price. While new car loans offer lower interest rates (starting ~8.65% p.a.) and longer tenures up to 7 years, pre-owned cars offer superior value with lower initial depreciation. We analyze the total cost of ownership across major Indian lenders.'
            ],
            [
                'slug' => 'how-emi-is-calculated-complete-guide',
                'title' => 'How EMI is Calculated: A Complete Guide for Borrowers',
                'category' => 'Financial Literacy',
                'read_time' => '6 min read',
                'date' => 'Jan 05, 2026',
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
