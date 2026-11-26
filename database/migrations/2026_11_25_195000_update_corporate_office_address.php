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
        $corporateAddress = '1st Floor, Spencer Plaza, Burdwan Road, Siliguri – 734001, West Bengal, India.';
        $mapsUrl = 'https://www.google.com/maps/search/?api=1&query=1st+Floor%2C+Spencer+Plaza%2C+Burdwan+Road%2C+Siliguri+734001%2C+West+Bengal%2C+India';

        // 1. Update or create registered_office / corporate_office in website_settings
        DB::table('website_settings')->updateOrInsert(
            ['key' => 'registered_office'],
            [
                'value' => $corporateAddress,
                'group' => 'brand',
                'label' => 'Corporate Office',
                'type' => 'textarea',
                'updated_at' => now(),
            ]
        );

        DB::table('website_settings')->updateOrInsert(
            ['key' => 'corporate_office'],
            [
                'value' => $corporateAddress,
                'group' => 'brand',
                'label' => 'Corporate Office',
                'type' => 'textarea',
                'updated_at' => now(),
            ]
        );

        DB::table('website_settings')->updateOrInsert(
            ['key' => 'footer_address'],
            [
                'value' => $corporateAddress,
                'group' => 'footer',
                'label' => 'Corporate Office Address',
                'type' => 'textarea',
                'updated_at' => now(),
            ]
        );

        DB::table('website_settings')->updateOrInsert(
            ['key' => 'google_maps_url'],
            [
                'value' => $mapsUrl,
                'group' => 'brand',
                'label' => 'Google Maps Url',
                'type' => 'text',
                'updated_at' => now(),
            ]
        );

        // 2. Update contact page SEO description if present
        $contactPage = DB::table('pages')->where('slug', 'contact')->first();
        if ($contactPage && strpos($contactPage->seo_description, 'Cooch Behar') !== false) {
            DB::table('pages')->where('slug', 'contact')->update([
                'seo_description' => 'Get in touch with our loan advisory team in Siliguri and Kolkata, West Bengal.',
                'updated_at' => now(),
            ]);
        }

        // 3. Clear all caches
        Cache::flush();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $oldAddress = 'Khata No. 3429, Premer Danga, Near PDB High School, Khattimari, Cooch Behar, West Bengal – 736171, India.';
        $oldMaps = 'https://maps.google.com/?q=Premer+Danga+Khattimari+Cooch+Behar+West+Bengal+736171';

        DB::table('website_settings')->where('key', 'registered_office')->update([
            'value' => $oldAddress,
            'label' => 'Registered Office',
            'updated_at' => now(),
        ]);

        DB::table('website_settings')->where('key', 'google_maps_url')->update([
            'value' => $oldMaps,
            'updated_at' => now(),
        ]);

        Cache::flush();
    }
};
