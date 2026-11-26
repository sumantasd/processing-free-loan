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
            ->where('slug', 'personal-loan')
            ->update([
                'tenure' => '12 to 108 Months',
                'key_benefits' => json_encode([
                    'Zero processing fee promotional schemes on eligible profiles',
                    '100% paperless digital verification process',
                    'Flexible repayment tenure up to 9 years',
                    'Direct bank disbursement within 24 to 48 hours',
                    'No collateral or physical guarantor required',
                ]),
                'eligibility' => json_encode([
                    'Nationality: Resident Indian Citizen',
                    'Age: 21 to 65 years at loan maturity',
                    'Monthly Net Salary: Min ₹15,000/month',
                    'Salary Credit: Salary must be credited directly to a bank account',
                ]),
                'documents' => json_encode([
                    'Identity Proof: PAN Card (Mandatory), Aadhaar Card',
                    'Address Proof: Aadhaar Card, Recent Utility Bill, etc.',
                    'Income Proof: Latest 3 months salary slips, Form 16 / ITR',
                    'Banking: Last 6 months bank statement showing regular salary credits',
                    'Photographs: 1 Passport size photograph or digital selfie',
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
            ->where('slug', 'personal-loan')
            ->update([
                'tenure' => '12 to 72 Months',
                'key_benefits' => json_encode([
                    'Zero processing fee promotional schemes on eligible profiles',
                    '100% paperless digital verification process',
                    'Flexible repayment tenure up to 6 years',
                    'Direct bank disbursement within 24 to 48 hours',
                    'No collateral or physical guarantor required',
                ]),
                'eligibility' => json_encode([
                    'Nationality: Resident Indian Citizen',
                    'Age: 21 to 58 years at loan maturity',
                    'Monthly Net Salary: Min ₹20,000/month',
                    'Employment: Minimum 1 year continuous work experience',
                    'CIBIL Score: 680+ for fastest zero-fee approval',
                ]),
                'documents' => json_encode([
                    'Identity Proof: PAN Card (Mandatory), Aadhaar Card',
                    'Address Proof: Aadhaar Card, Recent Utility Bill, or Rent Agreement',
                    'Income Proof: Latest 3 months salary slips, Form 16 / ITR',
                    'Banking: Last 6 months bank statement showing regular salary credits',
                    'Photographs: 1 Passport size photograph or digital selfie',
                ]),
                'updated_at' => now(),
            ]);
    }
};
