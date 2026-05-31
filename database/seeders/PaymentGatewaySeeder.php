<?php

namespace Database\Seeders;

use App\Models\PaymentGateway;
use App\Models\PaymentGatewayCredential;
use Illuminate\Database\Seeder;

class PaymentGatewaySeeder extends Seeder
{
    public function run(): void
    {
        // Only seed gateways that have real API credentials
        $gateways = [
            [
                'name' => 'Ozow',
                'slug' => 'ozow',
                'description' => 'Instant EFT payments directly from any South African bank account.',
                'is_enabled' => true,
                'sandbox_mode' => false,
                'sort_order' => 1,
                'credential' => [
                    'merchant_id' => 'DEN-DEN-011',
                    'public_key' => 'yFlqS2hIhXYgQ40VFFiy4P1twE2HilEQ',
                    'secret_key' => 'yFlqS2hIhXYgQ40VFFiy4P1twE2HilEQ',
                ],
            ],
            [
                'name' => 'Payflex',
                'slug' => 'payflex',
                'description' => 'Buy now, pay later in 4 interest-free installments.',
                'is_enabled' => true,
                'sandbox_mode' => false,
                'sort_order' => 2,
                'credential' => [
                    'merchant_id' => 'fyjqxGzOj2Ec2ZydpfBGyHsoZFkXrMZy',
                    'secret_key' => 'DU6IDii6w91XIfH9aP8Sl19G2IqFBZrRifdz9FKjlYOHtI6zYPjj2Y5RfFN9bWbr',
                ],
            ],
            [
                'name' => 'PayJustNow',
                'slug' => 'payjustnow',
                'description' => 'Split your payment into 3 interest-free installments.',
                'is_enabled' => true,
                'sandbox_mode' => false,
                'sort_order' => 3,
                'credential' => [
                    'merchant_id' => '3825',
                    'public_key' => 'f0d5f51f78f514e8101591c6d668d32012e5b6117e801882281443f86e2d02fd',
                ],
            ],
        ];

        foreach ($gateways as $data) {
            $credentialData = $data['credential'] ?? [];
            unset($data['credential']);

            $gateway = PaymentGateway::updateOrCreate(
                ['slug' => $data['slug']],
                $data
            );

            if (!empty($credentialData)) {
                $gateway->credential()->updateOrCreate(
                    ['payment_gateway_id' => $gateway->id],
                    $credentialData
                );
            }
        }

        // Disable gateways that don't have API credentials configured
        $disabledSlugs = ['card', 'payfast', 'bank_transfer'];
        PaymentGateway::whereIn('slug', $disabledSlugs)->update(['is_enabled' => false]);
    }
}
