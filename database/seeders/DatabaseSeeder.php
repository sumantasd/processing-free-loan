<?php

namespace Database\Seeders;

use App\Models\AuditLog;
use App\Models\BlogPost;
use App\Models\Faq;
use App\Models\HomepageSection;
use App\Models\Lead;
use App\Models\LeadActivity;
use App\Models\LeadAllocation;
use App\Models\LeadFollowup;
use App\Models\LeadNote;
use App\Models\Lender;
use App\Models\LoanProduct;
use App\Models\Notification;
use App\Models\Page;
use App\Models\Permission;
use App\Models\Role;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\WebsiteSetting;
use App\Services\FintechDataService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Roles & Permissions
        $rolesData = [
            'super_admin' => ['label' => 'Super Administrator', 'description' => 'Full unrestricted system access, user management and system settings.'],
            'admin' => ['label' => 'Administrator', 'description' => 'Can manage leads, users, allocation and website content.'],
            'manager' => ['label' => 'Operations Manager', 'description' => 'Can manage team leads, monitor team performance, and allocate leads.'],
            'team_leader' => ['label' => 'Team Leader', 'description' => 'Can oversee assigned lead executives and monitor lead pipelines.'],
            'lead_executive' => ['label' => 'Lead Executive', 'description' => 'Can process allocated leads, update interaction status and schedule follow-ups.'],
            'calling_executive' => ['label' => 'Calling Executive', 'description' => 'Can conduct outbound calls and record verification outcomes.'],
            'support_executive' => ['label' => 'Support Executive', 'description' => 'Can handle customer assistance enquiries and support tickets.'],
        ];

        $roles = [];
        foreach ($rolesData as $name => $info) {
            $roles[$name] = Role::firstOrCreate(['name' => $name], [
                'label' => $info['label'],
                'description' => $info['description'],
            ]);
        }

        // Permissions
        $permissions = [
            'leads.view_all' => ['label' => 'View All Leads', 'group' => 'leads'],
            'leads.view_assigned' => ['label' => 'View Assigned Leads', 'group' => 'leads'],
            'leads.allocate' => ['label' => 'Allocate Leads', 'group' => 'leads'],
            'leads.update' => ['label' => 'Update Lead Status & Notes', 'group' => 'leads'],
            'leads.delete' => ['label' => 'Delete Leads', 'group' => 'leads'],
            'users.manage' => ['label' => 'Manage Users & Employees', 'group' => 'users'],
            'cms.manage' => ['label' => 'Manage Website CMS', 'group' => 'cms'],
            'reports.view' => ['label' => 'View Analytics & Reports', 'group' => 'reports'],
            'settings.manage' => ['label' => 'Manage System Settings', 'group' => 'settings'],
        ];

        foreach ($permissions as $permName => $permInfo) {
            Permission::firstOrCreate(['name' => $permName], [
                'label' => $permInfo['label'],
                'group' => $permInfo['group'],
            ]);
        }

        // 2. Seed Core Users
        $adminUser = User::firstOrCreate(
            ['email' => 'admin@processingfreeloan.com'],
            [
                'name' => 'Super Administrator',
                'mobile' => '7074906556',
                'password' => Hash::make('Password@123'),
                'employee_id' => 'EMP001',
                'designation' => 'System Architect & Chief Administrator',
                'department' => 'Executive Office',
                'role' => 'super_admin',
                'joining_date' => '2024-01-01',
                'account_status' => 'active',
                'email_verified_at' => now(),
            ]
        );

        $managerUser = User::firstOrCreate(
            ['email' => 'manager@processingfreeloan.com'],
            [
                'name' => 'Rajesh Sen',
                'mobile' => '9830112233',
                'password' => Hash::make('Password@123'),
                'employee_id' => 'EMP002',
                'designation' => 'Senior Loan Operations Manager',
                'department' => 'Loan Operations',
                'role' => 'manager',
                'joining_date' => '2024-03-15',
                'account_status' => 'active',
                'email_verified_at' => now(),
            ]
        );

        $executiveUser = User::firstOrCreate(
            ['email' => 'executive@processingfreeloan.com'],
            [
                'name' => 'Pooja Mukherjee',
                'mobile' => '9830445566',
                'password' => Hash::make('Password@123'),
                'employee_id' => 'EMP003',
                'designation' => 'Senior Loan Advisor',
                'department' => 'Customer Acquisition',
                'role' => 'lead_executive',
                'joining_date' => '2024-06-01',
                'account_status' => 'active',
                'email_verified_at' => now(),
            ]
        );

        $callerUser = User::firstOrCreate(
            ['email' => 'caller@processingfreeloan.com'],
            [
                'name' => 'Bikram Das',
                'mobile' => '9830778899',
                'password' => Hash::make('Password@123'),
                'employee_id' => 'EMP004',
                'designation' => 'Telecalling Specialist',
                'department' => 'Outreach',
                'role' => 'calling_executive',
                'joining_date' => '2024-08-10',
                'account_status' => 'active',
                'email_verified_at' => now(),
            ]
        );

        // 3. Seed Website Settings from FintechDataService
        $brandConfig = FintechDataService::getBrandConfig();
        foreach ($brandConfig as $key => $value) {
            $type = is_array($value) ? 'json' : 'text';
            WebsiteSetting::set($key, $value, 'brand', ucwords(str_replace('_', ' ', $key)), $type);
        }

        // Header and Footer specific settings
        WebsiteSetting::set('header_cta_text', 'Apply Now', 'header', 'Header Button Label');
        WebsiteSetting::set('header_cta_url', '#apply-modal', 'header', 'Header Button URL');
        WebsiteSetting::set('footer_disclaimer', $brandConfig['disclaimer'], 'footer', 'Footer Regulatory Disclaimer', 'textarea');
        WebsiteSetting::set('footer_developer_credit', 'Crafted by Tech Googly', 'footer', 'Developer Credit');
        WebsiteSetting::set('footer_developer_url', 'https://techgoogly.com/', 'footer', 'Developer URL');

        // 4. Seed Homepage Sections
        $sections = [
            'hero' => [
                'title' => 'Get Your Loan Without Processing Fee',
                'subtitle' => 'Compare and explore suitable loan options from leading Banks & NBFCs. Discover competitive offers, explore eligibility and get expert assistance throughout your loan journey.',
                'badge' => 'YOUR TRUSTED FINANCIAL PARTNER',
                'image' => 'images/hero-man.jpg',
                'is_active' => true,
                'display_order' => 1,
            ],
            'quick_form' => [
                'title' => 'Check Your Loan Eligibility',
                'subtitle' => 'Instant indicative quotes from 23+ Banks & NBFCs with zero processing fee offers.',
                'badge' => 'Zero Processing Fee Priority',
                'is_active' => true,
                'display_order' => 2,
            ],
            'products' => [
                'title' => 'Our Loan Products',
                'subtitle' => 'Choose from a wide range of loan options as per your financial needs.',
                'badge' => 'EXPLORE OUR LOAN SOLUTIONS',
                'is_active' => true,
                'display_order' => 3,
            ],
            'partners' => [
                'title' => 'Trusted Banks & NBFCs',
                'subtitle' => 'We work with leading Indian Banks and NBFCs to bring you the best zero processing fee offers.',
                'badge' => 'OUR LENDING NETWORK',
                'is_active' => true,
                'display_order' => 4,
            ],
            'how_it_works' => [
                'title' => 'Get Your Loan in 5 Simple Steps',
                'subtitle' => 'A quick, transparent and fully digital process from enquiry to disbursement.',
                'badge' => 'HOW IT WORKS',
                'is_active' => true,
                'display_order' => 5,
            ],
            'emi_calculator' => [
                'title' => 'Advanced EMI Calculator',
                'subtitle' => 'Plan your monthly repayments accurately before applying.',
                'badge' => 'SMART FINANCIAL TOOL',
                'is_active' => true,
                'display_order' => 6,
            ],
            'why_choose' => [
                'title' => 'Why Choose Processing Free Loan?',
                'subtitle' => 'A smarter, faster and more transparent way to get your personal, business, car or professional loan.',
                'badge' => 'OUR VALUE PROPOSITION',
                'is_active' => true,
                'display_order' => 7,
            ],
            'eligibility_docs' => [
                'title' => 'Loan Eligibility & Required Documents',
                'subtitle' => 'Check if you are eligible and keep your documents ready for hassle-free processing.',
                'badge' => 'EASY VERIFICATION',
                'is_active' => true,
                'display_order' => 8,
            ],
            'stats' => [
                'title' => 'Our Track Record & Scale',
                'subtitle' => 'Helping thousands of Indian borrowers achieve their financial goals.',
                'badge' => 'TRUSTED ACROSS INDIA',
                'is_active' => true,
                'display_order' => 9,
            ],
            'testimonials' => [
                'title' => 'What Our Customers Say',
                'subtitle' => 'Real experiences from people who got the right loan without paying hefty processing fees.',
                'badge' => 'CUSTOMER STORIES',
                'is_active' => true,
                'display_order' => 10,
            ],
            'expert_assistance' => [
                'title' => 'Get Expert Loan Assistance',
                'subtitle' => 'Not sure which loan or lender is right for you? Speak to our experienced advisors for customized guidance.',
                'badge' => 'DEDICATED SUPPORT',
                'image' => 'images/support-agent.jpg',
                'is_active' => true,
                'display_order' => 11,
            ],
            'articles' => [
                'title' => 'Latest Articles & Loan Updates',
                'subtitle' => 'Read tips, guides and financial insights to make better borrowing decisions.',
                'badge' => 'FINANCIAL EDUCATION',
                'is_active' => true,
                'display_order' => 12,
            ],
            'faq' => [
                'title' => 'Have Questions? We\'ve Got Answers',
                'subtitle' => 'Find answers to common questions about zero processing fee loans, eligibility and documentation.',
                'badge' => 'FREQUENTLY ASKED QUESTIONS',
                'is_active' => true,
                'display_order' => 13,
            ],
            'final_cta' => [
                'title' => 'Ready to Get Your Loan Without Processing Fee?',
                'subtitle' => 'Quick process • Multiple options • Expert support • 100% data security.',
                'badge' => 'APPLY NOW',
                'is_active' => true,
                'display_order' => 14,
            ],
        ];

        foreach ($sections as $key => $section) {
            HomepageSection::updateOrCreate(['section_key' => $key], $section);
        }

        // 5. Seed Pages
        $pages = [
            'home' => ['title' => 'Home', 'seo_title' => 'Processing Free Loan | Loan Without Processing Fee in India', 'seo_description' => 'Compare and apply for Personal, Business, Car, Doctor & CA Loans with Zero Processing Fee promotional offers.'],
            'about' => ['title' => 'About Us', 'seo_title' => 'About Processing Free Loan | Unit of Findeal Financial Private Limited', 'seo_description' => 'Discover our mission to eliminate processing fees for Indian borrowers across leading Banks and NBFCs.'],
            'contact' => ['title' => 'Contact Us', 'seo_title' => 'Contact Us | Processing Free Loan Customer Care & Branch Office', 'seo_description' => 'Get in touch with our loan advisory team in Cooch Behar and Kolkata, West Bengal.'],
            'partners' => ['title' => 'Our Partners', 'seo_title' => '23+ Banking & NBFC Partners | Processing Free Loan', 'seo_description' => 'Explore RBI-regulated banks and NBFCs offering zero processing fee promotional loans.'],
            'privacy-policy' => ['title' => 'Privacy Policy', 'seo_title' => 'Privacy Policy | ProcessingFreeLoan.com', 'seo_description' => 'We safeguard your financial and personal data under Indian IT and RBI digital lending standards.'],
            'terms-conditions' => ['title' => 'Terms & Conditions', 'seo_title' => 'Terms & Conditions | ProcessingFreeLoan.com', 'seo_description' => 'Official terms of service governing loan comparisons, enquiries and financial aggregation.'],
            'disclaimer' => ['title' => 'Financial Services Disclaimer', 'seo_title' => 'Regulatory Disclaimer | ProcessingFreeLoan.com', 'seo_description' => 'Important disclosures regarding loan approval authority, RBI compliance and zero fee promotions.'],
        ];

        foreach ($pages as $slug => $data) {
            Page::updateOrCreate(['slug' => $slug], $data);
        }

        // 6. Seed Loan Products
        $loanProducts = FintechDataService::getLoanProducts();
        $order = 1;
        foreach ($loanProducts as $slug => $p) {
            LoanProduct::updateOrCreate(['slug' => $slug], [
                'title' => $p['title'],
                'tagline' => $p['tagline'] ?? null,
                'badge' => $p['badge'] ?? null,
                'icon' => $p['icon'] ?? null,
                'color' => $p['color'] ?? 'blue',
                'bg_gradient' => $p['bg_gradient'] ?? 'from-blue-50 to-indigo-50/50',
                'amount_range' => $p['amount_range'] ?? null,
                'min_amount' => $p['min_amount'] ?? 50000,
                'max_amount' => $p['max_amount'] ?? 5000000,
                'interest_rate' => $p['interest_rate'] ?? null,
                'tenure' => $p['tenure'] ?? null,
                'processing_fee' => $p['processing_fee'] ?? null,
                'description' => $p['description'] ?? null,
                'key_benefits' => $p['key_benefits'] ?? [],
                'eligibility' => $p['eligibility'] ?? [],
                'documents' => $p['documents'] ?? [],
                'suitable_lenders' => $p['suitable_lenders'] ?? [],
                'is_published' => true,
                'display_order' => $order++,
            ]);
        }

        // 7. Seed Lenders
        $allLenders = FintechDataService::getAllLenders();
        $lOrder = 1;
        foreach ($allLenders as $l) {
            Lender::updateOrCreate(['slug' => $l['slug']], [
                'name' => $l['name'],
                'type' => $l['type'],
                'logo' => $l['logo'] ?? null,
                'rating' => $l['rating'] ?? 4.8,
                'approval_speed' => $l['approval_speed'] ?? '24-48 Hours',
                'min_interest' => $l['min_interest'] ?? '10.49% p.a.',
                'max_tenure' => $l['max_tenure'] ?? '7 Years',
                'processing_fee_waiver' => $l['processing_fee_waiver'] ?? 'Zero Fee Promo Available*',
                'features' => $l['features'] ?? [],
                'description' => $l['description'] ?? null,
                'products' => $l['products'] ?? [],
                'is_published' => true,
                'display_order' => $lOrder++,
            ]);
        }

        // 8. Seed FAQs
        $faqs = FintechDataService::getFaqs();
        $fOrder = 1;
        foreach ($faqs as $f) {
            Faq::updateOrCreate(['question' => $f['question']], [
                'answer' => $f['answer'],
                'category' => $f['category'] ?? 'General',
                'is_active' => true,
                'display_order' => $fOrder++,
            ]);
        }

        // 9. Seed Testimonials
        $testimonials = [
            [
                'name' => 'Subrata Mukherjee',
                'location' => 'Kolkata, West Bengal',
                'role' => 'Senior IT Consultant',
                'avatar' => '/images/testimonials/subrata-mukherjee.jpg',
                'loan_type' => 'Salaried Personal Loan',
                'rating' => 5,
                'quote' => 'Got my personal loan approved within 2 days through ProcessingFreeLoan.com. The process was completely hassle-free, and best of all, I saved ₹17,000 in processing fees thanks to their zero fee offer!'
            ],
            [
                'name' => 'Dr. Debolina Banerjee',
                'location' => 'Siliguri, West Bengal',
                'role' => 'Consultant Dermatologist',
                'avatar' => '/images/testimonials/debolina-banerjee.jpg',
                'loan_type' => 'Doctor Professional Loan',
                'rating' => 5,
                'quote' => 'Setting up my new diagnostic clinic required immediate capital. The team guided me to an exclusive doctor loan with zero collateral and zero processing charges. Excellent customer support and rapid disbursal!'
            ],
            [
                'name' => 'Anupam Roy',
                'location' => 'Cooch Behar, West Bengal',
                'role' => 'Retail Business Owner',
                'avatar' => '/images/testimonials/anupam-roy.jpg',
                'loan_type' => 'Unsecured Business Loan',
                'rating' => 5,
                'quote' => 'Best platform to compare business loan offers. I got quotes from Tata Capital, Bajaj, and Bandhan Bank simultaneously. The transparency, speed, and local West Bengal support saved me both time and money.'
            ],
            [
                'name' => 'Soumen Das, FCA',
                'location' => 'Durgapur, West Bengal',
                'role' => 'Chartered Accountant',
                'avatar' => '/images/testimonials/soumen-das.jpg',
                'loan_type' => 'CA Professional Loan',
                'rating' => 5,
                'quote' => 'As a CA, I pay attention to every fine-print deduction. ProcessingFreeLoan.com kept every promise — competitive 10.25% interest rate, zero processing charges, and professional handling.'
            ],
            [
                'name' => 'Rahul Ghosh',
                'location' => 'Howrah, West Bengal',
                'role' => 'Corporate Salaried Manager',
                'avatar' => '/images/testimonials/rahul-ghosh.jpg',
                'loan_type' => 'New Car Loan',
                'rating' => 5,
                'quote' => 'Secured 100% on-road funding for my new sedan with zero processing fees. The online guidance was top-notch and the loan was sanctioned without any dealership markups.'
            ],
            [
                'name' => 'Priyanka Sen',
                'location' => 'Asansol, West Bengal',
                'role' => 'Senior School Educator',
                'avatar' => '/images/testimonials/priyanka-sen.jpg',
                'loan_type' => 'Salaried Personal Loan',
                'rating' => 5,
                'quote' => 'Very reliable platform for salaried employees. The team explained the entire EMI repayment structure clearly, and I received the funds directly in my account in 36 hours.'
            ]
        ];

        $tOrder = 1;
        foreach ($testimonials as $t) {
            Testimonial::updateOrCreate(['customer_name' => $t['name']], [
                'customer_image' => $t['avatar'] ?? null,
                'role' => $t['role'] ?? 'Verified Customer',
                'location' => $t['location'] ?? 'West Bengal',
                'loan_category' => $t['loan_type'] ?? 'Personal Loan',
                'review' => $t['quote'] ?? 'Excellent zero processing fee loan service.',
                'rating' => $t['rating'] ?? 5,
                'is_verified' => true,
                'is_active' => true,
                'display_order' => $tOrder++,
            ]);
        }

        // 10. Seed Blog Posts
        $articles = FintechDataService::getArticles();
        foreach ($articles as $a) {
            BlogPost::updateOrCreate(['slug' => $a['slug']], [
                'title' => $a['title'],
                'category' => $a['category'] ?? 'Loan Guides',
                'excerpt' => $a['excerpt'] ?? null,
                'content' => $a['content'] ?? $a['excerpt'] ?? null,
                'featured_image' => $a['image'] ?? null,
                'author' => $a['author'] ?? 'Fintech Editorial',
                'read_time' => $a['read_time'] ?? '4 min read',
                'is_published' => true,
                'published_at' => now(),
            ]);
        }

        // 11. Seed Sample Leads (including the 5 original SQLite leads + active workflow leads)
        $initialLeads = [
            [
                'reference_code' => 'PFL-000001',
                'full_name' => 'Rahul Sharma',
                'mobile' => '9876543210',
                'email' => 'rahul.sharma@example.com',
                'loan_category' => 'personal-loan',
                'loan_amount' => 500000,
                'monthly_income' => 65000,
                'employment_type' => 'salaried',
                'city' => 'Kolkata',
                'state' => 'West Bengal',
                'pincode' => '700091',
                'status' => 'allocated',
                'assigned_to' => $executiveUser->id,
                'assigned_by' => $adminUser->id,
                'assigned_at' => now()->subDays(2),
                'next_followup_at' => now()->addDays(1)->setTime(11, 0),
                'internal_notes' => 'Salaried at IT firm in Salt Lake Sector V. Needs 5L loan for house renovation.',
            ],
            [
                'reference_code' => 'PFL-000002',
                'full_name' => 'Debasish Mukherjee',
                'mobile' => '9876543211',
                'email' => 'debasish@example.com',
                'loan_category' => 'business-loan',
                'loan_amount' => 1200000,
                'monthly_income' => 85000,
                'employment_type' => 'business_owner',
                'city' => 'Cooch Behar',
                'state' => 'West Bengal',
                'pincode' => '736171',
                'status' => 'contacted',
                'assigned_to' => $executiveUser->id,
                'assigned_by' => $managerUser->id,
                'assigned_at' => now()->subDay(),
                'next_followup_at' => now()->addHours(3),
                'internal_notes' => 'Hardware store owner. GST verified. Looking for Bajaj Finserv or Tata Capital.',
            ],
            [
                'reference_code' => 'PFL-000003',
                'full_name' => 'Amitava Roy',
                'mobile' => '9830123456',
                'email' => 'amitava@example.com',
                'loan_category' => 'personal-loan',
                'loan_amount' => 450000,
                'monthly_income' => 55000,
                'employment_type' => 'salaried',
                'city' => 'Kolkata',
                'state' => 'West Bengal',
                'pincode' => '700020',
                'status' => 'new',
                'assigned_to' => null,
                'internal_notes' => 'Direct website submission.',
            ],
            [
                'reference_code' => 'PFL-000004',
                'full_name' => 'Dr. Arindam Das',
                'mobile' => '9830998877',
                'email' => 'arindam.das@hospital.org',
                'loan_category' => 'doctor-loan',
                'loan_amount' => 2500000,
                'monthly_income' => 180000,
                'employment_type' => 'self_employed_professional',
                'city' => 'Siliguri',
                'state' => 'West Bengal',
                'pincode' => '734001',
                'status' => 'interested',
                'assigned_to' => $callerUser->id,
                'assigned_by' => $adminUser->id,
                'assigned_at' => now()->subDays(1),
                'next_followup_at' => now()->addDays(2)->setTime(16, 30),
                'internal_notes' => 'Expanding diagnostic clinic. Demanded zero processing fee.',
            ],
            [
                'reference_code' => 'PFL-000005',
                'full_name' => 'Subhashree Paul',
                'mobile' => '9876500112',
                'email' => 'subhashree@example.com',
                'loan_category' => 'new-car-loan',
                'loan_amount' => 850000,
                'monthly_income' => 70000,
                'employment_type' => 'salaried',
                'city' => 'Durgapur',
                'state' => 'West Bengal',
                'pincode' => '713216',
                'status' => 'converted',
                'assigned_to' => $executiveUser->id,
                'assigned_by' => $managerUser->id,
                'assigned_at' => now()->subDays(5),
                'internal_notes' => 'Tata Nexon purchase. 100% on-road funding approved via HDFC Bank with zero processing fee!',
            ],
            [
                'reference_code' => 'PFL-000006',
                'full_name' => 'Sourav Ganguly',
                'mobile' => '9831002233',
                'email' => 'sourav.g@finance.in',
                'loan_category' => 'ca-loan',
                'loan_amount' => 1500000,
                'monthly_income' => 120000,
                'employment_type' => 'chartered_accountant',
                'city' => 'Kolkata',
                'state' => 'West Bengal',
                'pincode' => '700001',
                'status' => 'followup_required',
                'assigned_to' => $executiveUser->id,
                'assigned_by' => $adminUser->id,
                'assigned_at' => now()->subHours(4),
                'next_followup_at' => now()->addHours(2),
                'internal_notes' => 'FCA practising for 8 years. Office expansion in BBD Bagh.',
            ],
            [
                'reference_code' => 'PFL-000007',
                'full_name' => 'Manoj Mondal',
                'mobile' => '9832114455',
                'email' => 'manoj@example.com',
                'loan_category' => 'used-car-loan',
                'loan_amount' => 400000,
                'monthly_income' => 45000,
                'employment_type' => 'salaried',
                'city' => 'Malda',
                'state' => 'West Bengal',
                'pincode' => '732101',
                'status' => 'new',
                'assigned_to' => null,
                'internal_notes' => 'Unallocated lead from website.',
            ],
        ];

        foreach ($initialLeads as $leadData) {
            $lead = Lead::updateOrCreate(['mobile' => $leadData['mobile']], $leadData);

            // Record initial activity
            LeadActivity::create([
                'lead_id' => $lead->id,
                'activity_type' => 'lead_created',
                'previous_value' => null,
                'new_value' => $lead->status,
                'description' => 'Lead created via website form submission.',
                'updated_by_user_id' => $adminUser->id,
                'created_at' => $lead->created_at ?? now(),
            ]);

            // If allocated, record allocation and note
            if ($lead->assigned_to) {
                LeadAllocation::create([
                    'lead_id' => $lead->id,
                    'previous_user_id' => null,
                    'assigned_user_id' => $lead->assigned_to,
                    'allocated_by_user_id' => $lead->assigned_by ?? $adminUser->id,
                    'remarks' => 'Initial lead allocation by administrator.',
                    'created_at' => $lead->assigned_at ?? now(),
                ]);

                LeadActivity::create([
                    'lead_id' => $lead->id,
                    'activity_type' => 'lead_allocated',
                    'previous_value' => 'Unallocated',
                    'new_value' => User::find($lead->assigned_to)->name ?? 'Assigned',
                    'description' => 'Lead allocated to employee.',
                    'updated_by_user_id' => $lead->assigned_by ?? $adminUser->id,
                    'created_at' => $lead->assigned_at ?? now(),
                ]);

                LeadNote::create([
                    'lead_id' => $lead->id,
                    'user_id' => $lead->assigned_to,
                    'note' => $lead->internal_notes ?? 'Lead initialized in CRM.',
                    'created_at' => now(),
                ]);

                // Add follow-up if applicable
                if ($lead->next_followup_at) {
                    LeadFollowup::create([
                        'lead_id' => $lead->id,
                        'user_id' => $lead->assigned_to,
                        'followup_date' => $lead->next_followup_at->toDateString(),
                        'followup_time' => $lead->next_followup_at->format('H:i:s'),
                        'reminder_at' => $lead->next_followup_at,
                        'status' => 'pending',
                        'call_outcome' => 'Scheduled Call',
                        'notes' => 'Follow up on documentation and bank interest quotes.',
                        'created_at' => now(),
                    ]);
                }

                // Add in-app notification for the user
                Notification::create([
                    'user_id' => $lead->assigned_to,
                    'title' => 'New Lead Allocated: ' . $lead->full_name,
                    'message' => "You have been assigned {$lead->loan_category_label} for ₹" . number_format($lead->loan_amount) . " in {$lead->city}.",
                    'type' => 'lead_assigned',
                    'link' => '/user/leads/' . $lead->id,
                    'is_read' => false,
                    'created_at' => now(),
                ]);
            }
        }

        // 12. Initial Audit Log
        AuditLog::log('database_seeded', 'system', 'system', 1, [
            'message' => 'Complete enterprise CMS and Lead CRM database seeded successfully with MySQL persistence.',
        ]);
    }
}
