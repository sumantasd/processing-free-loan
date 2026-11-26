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
            ->where('slug', 'doctor-loan')
            ->update([
                'eligibility' => json_encode([
                    'Qualification: MBBS, MD, MS, BDS, MDS, BHMS, BAMS with valid registration',
                    'Medical Registration: Registered with Medical Council of India (MCI) or State Council',
                    'Post-Qualification Experience: Minimum 2 to 3 years experience',
                    'Age Limit: 25 to 65 years',
                    'Practice: Self-practice clinic, hospital consultant, or Salaried Doctor',
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
            ->where('slug', 'doctor-loan')
            ->update([
                'eligibility' => json_encode([
                    'Qualification: MBBS, MD, MS, BDS, MDS, BHMS, BAMS with valid registration',
                    'Medical Registration: Registered with Medical Council of India (MCI) or State Council',
                    'Post-Qualification Experience: Minimum 2 to 3 years experience',
                    'Age Limit: 25 to 65 years',
                    'Practice: Self-practice clinic, hospital consultant, or nursing home owner',
                ]),
                'updated_at' => now(),
            ]);
    }
};
