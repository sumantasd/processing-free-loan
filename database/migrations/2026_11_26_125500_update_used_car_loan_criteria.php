<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('loan_products')
            ->where('slug', 'used-car-loan')
            ->update([
                'eligibility' => json_encode([
                    'Applicant Profile: Salaried, Self-Employed, or Commercial Operators',
                    'Age: 21 to 65 years',
                    'Car Age: Not older than 15 years at end of loan repayment',
                    'Income Requirement: Min ₹20,000/month or ₹3 Lakhs annual income',
                    'Valid Driving License: Preferred for primary borrower',
                ]),
                'documents' => json_encode([
                    'Vehicle Documents: RC Copy, Insurance Certificate, Pollution (PUC)',
                    'Identity & Address Proof: PAN Card, Aadhaar Card / Passport',
                    'Income Documents: 3 months salary slips or 2 years ITR',
                    'Bank Statement: Last 6 months active bank account statements',
                ]),
                'updated_at' => now(),
            ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('loan_products')
            ->where('slug', 'used-car-loan')
            ->update([
                'eligibility' => json_encode([
                    'Applicant Profile: Salaried, Self-Employed, or Commercial Operators',
                    'Age: 21 to 65 years',
                    'Car Age: Not older than 10 years at end of loan repayment',
                    'Income Requirement: Min ₹20,000/month or ₹3 Lakhs annual income',
                    'Valid Driving License: Preferred for primary borrower',
                ]),
                'documents' => json_encode([
                    'Vehicle Documents: RC Copy, Insurance Certificate, Pollution (PUC), Valuation Report',
                    'Identity & Address Proof: PAN Card, Aadhaar Card / Passport',
                    'Income Documents: 3 months salary slips or 2 years ITR',
                    'Bank Statement: Last 6 months active bank account statements',
                    'Signed loan agreement and RTO transfer forms (Form 29 & 30)',
                ]),
                'updated_at' => now(),
            ]);
    }
};
