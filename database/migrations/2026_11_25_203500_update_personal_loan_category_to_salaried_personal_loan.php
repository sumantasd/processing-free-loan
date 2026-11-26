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
        // Update loan_products table
        DB::table('loan_products')
            ->where('slug', 'personal-loan')
            ->update([
                'title' => 'Salaried Personal Loan',
                'updated_at' => now(),
            ]);

        // Update any other occurrences in loan_products where title is 'Personal Loan'
        DB::table('loan_products')
            ->where('title', 'Personal Loan')
            ->update([
                'title' => 'Salaried Personal Loan',
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
                'title' => 'Personal Loan',
                'updated_at' => now(),
            ]);
    }
};
