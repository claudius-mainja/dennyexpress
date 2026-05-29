<?php

namespace App\Filament\Resources\PaymentGateways\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PaymentGatewayForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([
                Section::make('Gateway Settings')
                    ->columns(2)
                    ->components([
                        TextInput::make('name')
                            ->label('Gateway Name')
                            ->required()
                            ->columnSpanFull(),
                        TextInput::make('slug')
                            ->label('Gateway Slug')
                            ->required()
                            ->helperText('Unique identifier used in code. Cannot be changed after creation.')
                            ->disabled(),
                        Textarea::make('description')
                            ->columnSpanFull()
                            ->rows(2)
                            ->helperText('Brief description shown to customers during checkout.'),
                        Toggle::make('is_enabled')
                            ->label('Enable Gateway')
                            ->helperText('When disabled, this payment method will not appear on the checkout page.')
                            ->live(),
                        Toggle::make('sandbox_mode')
                            ->label('Sandbox / Test Mode')
                            ->helperText('When enabled, transactions will be processed in test/sandbox mode.')
                            ->live(),
                        TextInput::make('sort_order')
                            ->label('Sort Order')
                            ->numeric()
                            ->default(0)
                            ->helperText('Lower values appear first in the checkout payment method list.'),
                        FileUpload::make('logo')
                            ->label('Gateway Logo')
                            ->image()
                            ->directory('payment-logos')
                            ->columnSpanFull(),
                    ]),
                Section::make('API Credentials')
                    ->description('Enter your payment gateway credentials. Sensitive fields are encrypted at rest.')
                    ->relationship('credential')
                    ->columns(2)
                    ->components([
                        TextInput::make('merchant_id')
                            ->label('Merchant ID / Site Code')
                            ->helperText('Your merchant identifier provided by the payment gateway.')
                            ->columnSpanFull(),
                        TextInput::make('merchant_key')
                            ->label('Merchant Key')
                            ->password()
                            ->revealable()
                            ->helperText('Your merchant key for API authentication.')
                            ->columnSpanFull(),
                        TextInput::make('public_key')
                            ->label('Public Key / API Key')
                            ->password()
                            ->revealable()
                            ->helperText('Your public API key for initiating transactions.')
                            ->columnSpanFull(),
                        TextInput::make('secret_key')
                            ->label('Secret Key / Encryption Key')
                            ->password()
                            ->revealable()
                            ->helperText('Your secret/encryption key for request signing. Keep this secure.')
                            ->columnSpanFull(),
                        TextInput::make('passphrase')
                            ->label('Passphrase')
                            ->password()
                            ->revealable()
                            ->helperText('Additional passphrase if required by the gateway.')
                            ->columnSpanFull(),
                        TextInput::make('webhook_secret')
                            ->label('Webhook Secret')
                            ->password()
                            ->revealable()
                            ->helperText('Secret used to verify incoming webhook notifications.')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
