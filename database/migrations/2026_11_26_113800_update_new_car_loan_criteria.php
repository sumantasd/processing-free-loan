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
            ->where('slug', 'new-car-loan')
            ->update([
                'eligibility' => json_encode([
                    'Applicant: Salaried employees, self-employed professionals, businessmen',
                    'Age Limit: 21 to 65 years at loan closure',
                    'Employment / Business Stability: Minimum 1 year in current profession',
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
            ->where('slug', 'new-car-loan')
            ->update([
                'eligibility' => json_encode([
                    'Applicant: Salaried employees, self-employed professionals, businessmen',
                    'Age Limit: 21 to 65 years at loan closure',
                    'Minimum Income: ₹25,000/month (salaried) or ₹3.5 Lakhs annual ITR (business)',
                    'Employment / Business Stability: Minimum 1 year in current profession',
                    'Credit Score: 700+ preferred for best interest rate bands',
                ]),
                'updated_at' => now(),
            ]);
    }
};
