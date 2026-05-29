<?php

namespace Database\Seeders;

use App\Models\PaymentGateway;
use Illuminate\Database\Seeder;

class PaymentGatewaySeeder extends Seeder
{
    public function run(): void
    {
        $gateways = [
            [
                'name' => 'Credit / Debit Card',
                'slug' => 'card',
                'description' => 'Accept credit and debit card payments via PayFast.',
                'is_enabled' => true,
                'sandbox_mode' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'PayFast',
                'slug' => 'payfast',
                'description' => 'South Africa\'s leading online payment gateway.',
                'is_enabled' => false,
                'sandbox_mode' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Ozow',
                'slug' => 'ozow',
                'description' => 'Instant EFT payments directly from any South African bank account.',
                'is_enabled' => true,
                'sandbox_mode' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Payflex',
                'slug' => 'payflex',
                'description' => 'Buy now, pay later in 4 interest-free installments.',
                'is_enabled' => true,
                'sandbox_mode' => true,
                'sort_order' => 4,
            ],
            [
                'name' => 'PayJustNow',
                'slug' => 'payjustnow',
                'description' => 'Split your payment into 3 interest-free installments.',
                'is_enabled' => false,
                'sandbox_mode' => true,
                'sort_order' => 5,
            ],
            [
                'name' => 'Bank Transfer',
                'slug' => 'bank_transfer',
                'description' => 'Pay directly into our bank account via EFT.',
                'is_enabled' => true,
                'sandbox_mode' => false,
                'sort_order' => 6,
            ],
        ];

        foreach ($gateways as $gateway) {
            PaymentGateway::updateOrCreate(
                ['slug' => $gateway['slug']],
                $gateway
            );
        }
    }
}
