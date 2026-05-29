<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // General
            ['key' => 'site_name', 'value' => 'Denny Express', 'group' => 'general'],
            ['key' => 'tagline', 'value' => 'Point of Sale & Computers Johannesburg', 'group' => 'general'],
            ['key' => 'description', 'value' => 'Denny Express has a strong focus on providing cutting-edge solutions to businesses of all sizes, the company offers a comprehensive range of POS systems, hardware, and IT equipment.', 'group' => 'general'],
            ['key' => 'address', 'value' => '187 Alexandra, Halfway House, Midrand, Gauteng, South Africa', 'group' => 'general'],
            ['key' => 'copyright', 'value' => '(c) 2025, Denny Express Group - All Rights Reserved.', 'group' => 'general'],
            ['key' => 'warranty_standard', 'value' => '18 months', 'group' => 'general'],

            // Contact
            ['key' => 'phone_1', 'value' => '+27 74 355 1336', 'group' => 'contact'],
            ['key' => 'phone_2', 'value' => '012 023 3315', 'group' => 'contact'],
            ['key' => 'email_sales', 'value' => 'sales@dennyexpress.co.za', 'group' => 'contact'],
            ['key' => 'email_support', 'value' => 'Support1234@Ecomall.com', 'group' => 'contact'],
            ['key' => 'whatsapp_number', 'value' => '+27743551336', 'group' => 'contact'],
            ['key' => 'whatsapp_message', 'value' => 'Hi Denny Express, I have a question about your products.', 'group' => 'contact'],

            // Shipping
            ['key' => 'delivery_min_days', 'value' => '14', 'group' => 'shipping'],
            ['key' => 'delivery_max_days', 'value' => '30', 'group' => 'shipping'],

            // Currency
            ['key' => 'currency', 'value' => 'ZAR', 'group' => 'general'],
            ['key' => 'currency_symbol', 'value' => 'R', 'group' => 'general'],

            // Payment Gateway Toggles
            ['key' => 'ozow_enabled', 'value' => 'true', 'group' => 'payment'],
            ['key' => 'payfast_enabled', 'value' => 'true', 'group' => 'payment'],
            ['key' => 'payflex_enabled', 'value' => 'true', 'group' => 'payment'],
            ['key' => 'payjustnow_enabled', 'value' => 'true', 'group' => 'payment'],

            // Ozow
            ['key' => 'ozow_site_code', 'value' => 'DENNYEXPR001', 'group' => 'payment'],
            ['key' => 'ozow_api_key', 'value' => '', 'group' => 'payment'],
            ['key' => 'ozow_private_key', 'value' => '', 'group' => 'payment'],

            // PayFast (PayWeb)
            ['key' => 'payfast_terminal_id', 'value' => '23700449', 'group' => 'payment'],
            ['key' => 'payfast_encryption_key', 'value' => 'qxnakp0mjjuay', 'group' => 'payment'],
            ['key' => 'payfast_test_mode', 'value' => '1', 'group' => 'payment'],

            // Payflex
            ['key' => 'payflex_client_id', 'value' => '', 'group' => 'payment'],
            ['key' => 'payflex_client_secret', 'value' => '', 'group' => 'payment'],
            ['key' => 'payflex_test_mode', 'value' => '1', 'group' => 'payment'],

            // WhatsApp Cloud API
            ['key' => 'whatsapp_phone_number_id', 'value' => '', 'group' => 'notification'],
            ['key' => 'whatsapp_access_token', 'value' => '', 'group' => 'notification'],
            ['key' => 'whatsapp_from_number', 'value' => '+27645048259', 'group' => 'notification'],

            // Google (placeholders — update when IDs are obtained)
            ['key' => 'google_analytics_id', 'value' => 'G-XXXXXXXXXX', 'group' => 'analytics'],
            ['key' => 'google_tag_manager_id', 'value' => 'GTM-XXXXXXX', 'group' => 'analytics'],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}
