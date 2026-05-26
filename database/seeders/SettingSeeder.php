<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['key' => 'site_name', 'value' => 'Denny Express', 'group' => 'general'],
            ['key' => 'tagline', 'value' => 'Point of Sale & Computers Johannesburg', 'group' => 'general'],
            ['key' => 'description', 'value' => 'Denny Express has a strong focus on providing cutting-edge solutions to businesses of all sizes, the company offers a comprehensive range of POS systems, hardware, and IT equipment.', 'group' => 'general'],
            ['key' => 'address', 'value' => '187 Alexandra, Halfway House, Midrand, Gauteng, South Africa', 'group' => 'general'],
            ['key' => 'phone_1', 'value' => '+27 74 355 1336', 'group' => 'contact'],
            ['key' => 'phone_2', 'value' => '012 023 3315', 'group' => 'contact'],
            ['key' => 'email_sales', 'value' => 'sales@dennyexpress.co.za', 'group' => 'contact'],
            ['key' => 'email_support', 'value' => 'Support1234@Ecomall.com', 'group' => 'contact'],
            ['key' => 'warranty_standard', 'value' => '18 months', 'group' => 'general'],
            ['key' => 'delivery_min_days', 'value' => '14', 'group' => 'shipping'],
            ['key' => 'delivery_max_days', 'value' => '30', 'group' => 'shipping'],
            ['key' => 'currency', 'value' => 'ZAR', 'group' => 'general'],
            ['key' => 'currency_symbol', 'value' => 'R', 'group' => 'general'],
            ['key' => 'payjustnow_enabled', 'value' => 'true', 'group' => 'payment'],
            ['key' => 'payfast_enabled', 'value' => 'true', 'group' => 'payment'],
            ['key' => 'ozow_enabled', 'value' => 'true', 'group' => 'payment'],
            ['key' => 'paygate_enabled', 'value' => 'true', 'group' => 'payment'],
            ['key' => 'whatsapp_number', 'value' => '+27743551336', 'group' => 'contact'],
            ['key' => 'whatsapp_message', 'value' => 'Hi Denny Express, I have a question about your products.', 'group' => 'contact'],
            ['key' => 'copyright', 'value' => '(c) 2025, Denny Express Group - All Rights Reserved.', 'group' => 'general'],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}
