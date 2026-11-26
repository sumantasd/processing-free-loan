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
        $newDisclaimer = 'Financial Services Disclaimer: ProcessingFreeLoan.com is A Venture of Findeal Financial Services Private Limited, operating as an independent financial technology aggregator and digital loan facilitator in India. We connect consumers with RBI-registered Banks and Non-Banking Financial Companies (NBFCs). We do not directly lend money or disburse loans. All credit underwriting decisions, sanction limits, interest rates, tenure durations, and processing fee waivers are governed entirely by the lending policies and discretionary risk appraisal of the respective Bank or NBFC.';
        $newCopyright = '© 2026 ProcessingFreeLoan.com. All rights reserved. A Venture of Findeal Financial Services Private Limited';

        DB::table('website_settings')
            ->where('key', 'footer_disclaimer')
            ->update([
                'value' => $newDisclaimer,
                'updated_at' => now(),
            ]);

        DB::table('website_settings')
            ->where('key', 'disclaimer')
            ->update([
                'value' => $newDisclaimer,
                'updated_at' => now(),
            ]);

        DB::table('website_settings')
            ->updateOrInsert(
                ['key' => 'copyright'],
                [
                    'value' => $newCopyright,
                    'group' => 'footer',
                    'label' => 'Footer Copyright',
                    'type' => 'text',
                    'updated_at' => now(),
                    'created_at' => now(),
                ]
            );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $oldDisclaimer = 'ProcessingFreeLoan.com (A Venture of Findeal Financial Services Private Limited) is a financial loan aggregator and comparison platform assisting Indian borrowers with loan discovery from RBI-regulated Banks and NBFCs. We are not a direct lender. Processing fee waiver offers are subject to individual lender policies, credit evaluation, and specific promo schemes. Final interest rates and terms are solely determined by the lending institution.';

        DB::table('website_settings')
            ->where('key', 'footer_disclaimer')
            ->update([
                'value' => $oldDisclaimer,
                'updated_at' => now(),
            ]);

        DB::table('website_settings')
            ->where('key', 'disclaimer')
            ->update([
                'value' => $oldDisclaimer,
                'updated_at' => now(),
            ]);
    }
};
