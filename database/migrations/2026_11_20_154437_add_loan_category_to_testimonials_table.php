<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('testimonials', function (Blueprint $table) {
            if (!Schema::hasColumn('testimonials', 'loan_category')) {
                $table->string('loan_category', 100)->nullable()->after('location');
            }
        });

        $seedData = [
            [
                'customer_name' => 'Subrata Mukherjee',
                'customer_image' => '/images/testimonials/subrata-mukherjee.jpg',
                'role' => 'Senior IT Consultant',
                'location' => 'Kolkata, West Bengal',
                'loan_category' => 'Salaried Personal Loan',
                'review' => 'Got my personal loan approved within 2 days through ProcessingFreeLoan.com. The process was completely hassle-free, and best of all, I saved ₹17,000 in processing fees thanks to their zero fee offer!',
                'rating' => 5,
                'is_verified' => true,
                'is_active' => true,
                'display_order' => 1,
            ],
            [
                'customer_name' => 'Dr. Debolina Banerjee',
                'customer_image' => '/images/testimonials/debolina-banerjee.jpg',
                'role' => 'Consultant Dermatologist',
                'location' => 'Siliguri, West Bengal',
                'loan_category' => 'Doctor Professional Loan',
                'review' => 'Setting up my new diagnostic clinic required immediate capital. The team guided me to an exclusive doctor loan with zero collateral and zero processing charges. Excellent customer support and rapid disbursal!',
                'rating' => 5,
                'is_verified' => true,
                'is_active' => true,
                'display_order' => 2,
            ],
            [
                'customer_name' => 'Anupam Roy',
                'customer_image' => '/images/testimonials/anupam-roy.jpg',
                'role' => 'Retail Business Owner',
                'location' => 'Cooch Behar, West Bengal',
                'loan_category' => 'Unsecured Business Loan',
                'review' => 'Best platform to compare business loan offers. I got quotes from Tata Capital, Bajaj, and Bandhan Bank simultaneously. The transparency, speed, and local West Bengal support saved me both time and money.',
                'rating' => 5,
                'is_verified' => true,
                'is_active' => true,
                'display_order' => 3,
            ],
            [
                'customer_name' => 'Soumen Das, FCA',
                'customer_image' => '/images/testimonials/soumen-das.jpg',
                'role' => 'Chartered Accountant',
                'location' => 'Durgapur, West Bengal',
                'loan_category' => 'CA Professional Loan',
                'review' => 'As a CA, I pay attention to every fine-print deduction. ProcessingFreeLoan.com kept every promise — competitive 10.25% interest rate, zero processing charges, and professional handling.',
                'rating' => 5,
                'is_verified' => true,
                'is_active' => true,
                'display_order' => 4,
            ],
            [
                'customer_name' => 'Rahul Ghosh',
                'customer_image' => '/images/testimonials/rahul-ghosh.jpg',
                'role' => 'Corporate Salaried Manager',
                'location' => 'Howrah, West Bengal',
                'loan_category' => 'New Car Loan',
                'review' => 'Secured 100% on-road funding for my new sedan with zero processing fees. The online guidance was top-notch and the loan was sanctioned without any dealership markups.',
                'rating' => 5,
                'is_verified' => true,
                'is_active' => true,
                'display_order' => 5,
            ],
            [
                'customer_name' => 'Priyanka Sen',
                'customer_image' => '/images/testimonials/priyanka-sen.jpg',
                'role' => 'Senior School Educator',
                'location' => 'Asansol, West Bengal',
                'loan_category' => 'Salaried Personal Loan',
                'review' => 'Very reliable platform for salaried employees. The team explained the entire EMI repayment structure clearly, and I received the funds directly in my account in 36 hours.',
                'rating' => 5,
                'is_verified' => true,
                'is_active' => true,
                'display_order' => 6,
            ],
        ];

        foreach ($seedData as $item) {
            \App\Models\Testimonial::updateOrCreate(
                ['customer_name' => $item['customer_name']],
                $item
            );
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('testimonials', function (Blueprint $table) {
            if (Schema::hasColumn('testimonials', 'loan_category')) {
                $table->dropColumn('loan_category');
            }
        });
    }
};
