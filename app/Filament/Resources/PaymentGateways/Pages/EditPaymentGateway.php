<?php

namespace App\Filament\Resources\PaymentGateways\Pages;

use App\Filament\Resources\PaymentGateways\PaymentGatewayResource;
use App\Models\PaymentGateway;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Cache;

class EditPaymentGateway extends EditRecord
{
    protected static string $resource = PaymentGatewayResource::class;

    protected function afterSave(): void
    {
        Cache::forget('payment_gateways');
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('test_connection')
                ->label('Test Connection')
                ->icon('heroicon-o-signal')
                ->color('gray')
                ->action(function () {
                    $gateway = $this->record;

                    try {
                        $testResult = $this->testGatewayConnection($gateway);

                        if ($testResult) {
                            Notification::make()
                                ->title('Connection successful')
                                ->body("{$gateway->name} credentials are valid.")
                                ->success()
                                ->send();
                        } else {
                            Notification::make()
                                ->title('Connection failed')
                                ->body("Could not verify {$gateway->name} credentials. Check your settings.")
                                ->danger()
                                ->send();
                        }
                    } catch (\Throwable $e) {
                        Notification::make()
                            ->title('Connection test failed')
                            ->body($e->getMessage())
                            ->danger()
                            ->send();
                    }
                }),
        ];
    }

    protected function testGatewayConnection(PaymentGateway $gateway): bool
    {
        return match ($gateway->slug) {
            'ozow' => $this->testOzowConnection($gateway),
            'payfast' => $this->testPayFastConnection($gateway),
            'payflex' => $this->testPayFlexConnection($gateway),
            'payjustnow' => $this->testPayJustNowConnection($gateway),
            default => true,
        };
    }

    protected function testOzowConnection(PaymentGateway $gateway): bool
    {
        $service = \App\Services\OzowService::fromGateway($gateway);
        $credential = $gateway->credential;
        return $credential && !empty($credential->public_key) && !empty($service->getApiUrl());
    }

    protected function testPayFastConnection(PaymentGateway $gateway): bool
    {
        $credential = $gateway->credential;
        return $credential && !empty($credential->merchant_id) && !empty($credential->secret_key);
    }

    protected function testPayFlexConnection(PaymentGateway $gateway): bool
    {
        $credential = $gateway->credential;
        return $credential && !empty($credential->merchant_id) && !empty($credential->secret_key);
    }

    protected function testPayJustNowConnection(PaymentGateway $gateway): bool
    {
        $credential = $gateway->credential;
        return $credential && !empty($credential->merchant_id) && !empty($credential->secret_key);
    }
}
