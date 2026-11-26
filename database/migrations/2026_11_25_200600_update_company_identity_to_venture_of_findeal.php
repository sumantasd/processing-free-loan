<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $newIdentity = 'A Venture of Findeal Financial Services Private Limited';
        $newDisclaimer = 'ProcessingFreeLoan.com (A Venture of Findeal Financial Services Private Limited) is a financial loan aggregator and comparison platform assisting Indian borrowers with loan discovery from RBI-regulated Banks and NBFCs. We are not a direct lender. Processing fee waiver offers are subject to individual lender policies, credit evaluation, and specific promo schemes. Final interest rates and terms are solely determined by the lending institution.';

        // 1. Update website_settings
        DB::table('website_settings')->updateOrInsert(
            ['key' => 'company_identity'],
            [
                'value' => $newIdentity,
                'group' => 'brand',
                'label' => 'Parent Company Identity',
                'type' => 'text',
                'updated_at' => now(),
            ]
        );

        DB::table('website_settings')->where('key', 'disclaimer')->update([
            'value' => $newDisclaimer,
            'updated_at' => now(),
        ]);

        DB::table('website_settings')->where('key', 'footer_disclaimer')->update([
            'value' => $newDisclaimer,
            'updated_at' => now(),
        ]);

        // 2. Update pages table (about page seo_title)
        $aboutPage = DB::table('pages')->where('slug', 'about')->first();
        if ($aboutPage && (strpos($aboutPage->seo_title, 'Unit of Findeal') !== false || strpos($aboutPage->seo_title, 'Findeal Financial Private') !== false)) {
            DB::table('pages')->where('slug', 'about')->update([
                'seo_title' => 'About Processing Free Loan | A Venture of Findeal Financial Services Private Limited',
                'updated_at' => now(),
            ]);
        }

        // 3. Clear cache
        Cache::flush();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $oldIdentity = 'Unit Of Findeal Financial Private Limited';
        $oldDisclaimer = 'ProcessingFreeLoan.com (Unit Of Findeal Financial Private Limited) is a financial loan aggregator and comparison platform assisting Indian borrowers with loan discovery from RBI-regulated Banks and NBFCs. We are not a direct lender. Processing fee waiver offers are subject to individual lender policies, credit evaluation, and specific promo schemes. Final interest rates and terms are solely determined by the lending institution.';

        DB::table('website_settings')->where('key', 'company_identity')->update([
            'value' => $oldIdentity,
            'updated_at' => now(),
        ]);

        DB::table('website_settings')->where('key', 'disclaimer')->update([
            'value' => $oldDisclaimer,
            'updated_at' => now(),
        ]);

        DB::table('website_settings')->where('key', 'footer_disclaimer')->update([
            'value' => $oldDisclaimer,
            'updated_at' => now(),
        ]);

        DB::table('pages')->where('slug', 'about')->update([
            'seo_title' => 'About Processing Free Loan | Unit of Findeal Financial Private Limited',
            'updated_at' => now(),
        ]);

        Cache::flush();
    }
};
