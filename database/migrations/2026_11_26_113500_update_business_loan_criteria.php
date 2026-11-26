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
            ->where('slug', 'business-loan')
            ->update([
                'eligibility' => json_encode([
                    'Business Entity: Sole Proprietorship, Partnership, LLP, Pvt Ltd',
                    'Business Vintage: Minimum 2 to 3 years in continuous operation',
                    'Applicant Age: 21 to 65 years',
                ]),
                'documents' => json_encode([
                    'Entity Proof: Trade License, MSME/Udyam Certificate (If Available), GST Registration (If Available)',
                    'Bank Statements: Last 12 months primary operative current account statements',
                    'KYC: PAN Card & Aadhaar of all authorized persons',
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
            ->where('slug', 'business-loan')
            ->update([
                'eligibility' => json_encode([
                    'Business Entity: Sole Proprietorship, Partnership, LLP, Pvt Ltd',
                    'Business Vintage: Minimum 2 to 3 years in continuous operation',
                    'Annual Turnover: Minimum ₹20 Lakhs audited turnover',
                    'Applicant Age: 24 to 65 years',
                    'Credit Health: Business vintage & promoter CIBIL score 700+',
                ]),
                'documents' => json_encode([
                    'Entity Proof: GST Registration, Trade License, MSME/Udyam Certificate',
                    'Financials: Audited Balance Sheet & P&L statements for last 2 years with CA seal',
                    'Tax Documents: Last 12 months GST returns (GSTR-3B) and 2 years ITR',
                    'Bank Statements: Last 12 months primary operative current account statements',
                    'KYC: PAN Card & Aadhaar of all promoters/directors',
                ]),
                'updated_at' => now(),
            ]);
    }
};
