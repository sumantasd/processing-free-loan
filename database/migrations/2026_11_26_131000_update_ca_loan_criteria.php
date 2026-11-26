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
            ->where('slug', 'ca-loan')
            ->update([
                'eligibility' => json_encode([
                    'Qualification: Fellow Chartered Accountant (FCA) or Associate Chartered Accountant (ACA)',
                    'ICAI Membership: Valid and active Certificate of Practice (COP) or ICAI membership card',
                    'Practice / Salaried Vintage: Minimum 2 years continuous professional practice or corporate employment',
                    'Applicant Age: 23 to 65 years',
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
            ->where('slug', 'ca-loan')
            ->update([
                'eligibility' => json_encode([
                    'Qualification: Fellow Chartered Accountant (FCA) or Associate Chartered Accountant (ACA)',
                    'ICAI Membership: Valid and active Certificate of Practice (COP) or ICAI membership card',
                    'Practice / Salaried Vintage: Minimum 2 years continuous professional practice or corporate employment',
                    'Applicant Age: 23 to 65 years',
                    'Good CIBIL track record (700+)',
                ]),
                'updated_at' => now(),
            ]);
    }
};
