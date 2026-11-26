<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations to update official contact numbers globally.
     */
    public function up(): void
    {
        // 1. Update existing website settings containing the old phone number
        DB::table('website_settings')
            ->where('value', 'like', '%7074906556%')
            ->update([
                'value' => DB::raw("REPLACE(value, '7074906556', '9800210503')"),
                'updated_at' => now(),
            ]);

        // 2. Ensure all primary and secondary phone keys exist in website_settings
        $settings = [
            [
                'group' => 'brand',
                'key' => 'phone',
                'value' => '+91 98002 10503',
                'label' => 'Primary Phone',
                'type' => 'text',
            ],
            [
                'group' => 'brand',
                'key' => 'phone_url',
                'value' => 'tel:+919800210503',
                'label' => 'Primary Phone Url',
                'type' => 'text',
            ],
            [
                'group' => 'brand',
                'key' => 'phone_primary',
                'value' => '+91 98002 10503',
                'label' => 'Primary Phone',
                'type' => 'text',
            ],
            [
                'group' => 'brand',
                'key' => 'phone_primary_url',
                'value' => 'tel:+919800210503',
                'label' => 'Primary Phone Url',
                'type' => 'text',
            ],
            [
                'group' => 'brand',
                'key' => 'phone_secondary',
                'value' => '+91 76790 96826',
                'label' => 'Secondary Phone',
                'type' => 'text',
            ],
            [
                'group' => 'brand',
                'key' => 'phone_secondary_url',
                'value' => 'tel:+917679096826',
                'label' => 'Secondary Phone Url',
                'type' => 'text',
            ],
            [
                'group' => 'header',
                'key' => 'header_phone',
                'value' => '+91 98002 10503',
                'label' => 'Header Support Phone',
                'type' => 'text',
            ],
            [
                'group' => 'header',
                'key' => 'header_phone_secondary',
                'value' => '+91 76790 96826',
                'label' => 'Secondary Header Phone',
                'type' => 'text',
            ],
        ];

        foreach ($settings as $setting) {
            $exists = DB::table('website_settings')->where('key', $setting['key'])->exists();
            if ($exists) {
                DB::table('website_settings')
                    ->where('key', $setting['key'])
                    ->update([
                        'value' => $setting['value'],
                        'updated_at' => now(),
                    ]);
            } else {
                DB::table('website_settings')->insert(array_merge($setting, [
                    'created_at' => now(),
                    'updated_at' => now(),
                ]));
            }
        }

        // 3. Update Super Admin default mobile if set to old number
        DB::table('users')
            ->where('mobile', '7074906556')
            ->update([
                'mobile' => '9800210503',
                'updated_at' => now(),
            ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('website_settings')
            ->where('key', 'phone')
            ->update(['value' => '+91 7074906556', 'updated_at' => now()]);

        DB::table('website_settings')
            ->where('key', 'phone_url')
            ->update(['value' => 'tel:+917074906556', 'updated_at' => now()]);

        DB::table('website_settings')
            ->where('key', 'header_phone')
            ->update(['value' => '+91 7074906556', 'updated_at' => now()]);

        DB::table('users')
            ->where('email', 'admin@processingfreeloan.com')
            ->where('mobile', '9800210503')
            ->update(['mobile' => '7074906556', 'updated_at' => now()]);
    }
};
