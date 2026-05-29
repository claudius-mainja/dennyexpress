<?php

namespace App\Filament\Resources\Orders\Schemas;

use App\Enums\OrderStatus;
use App\Enums\PaymentMethod;
use App\Enums\PaymentStatus;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([
                Section::make('Order Status')
                    ->columns(2)
                    ->components([
                        TextInput::make('order_number')
                            ->required()
                            ->disabled(),
                        Select::make('status')
                            ->options(OrderStatus::class)
                            ->required(),
                        Select::make('payment_status')
                            ->options(PaymentStatus::class)
                            ->required(),
                        Select::make('payment_method')
                            ->options(PaymentMethod::class),
                        TextInput::make('tracking_number'),
                        TextInput::make('transaction_id'),
                        DateTimePicker::make('paid_at'),
                    ]),
                Section::make('Financials')
                    ->columns(2)
                    ->components([
                        TextInput::make('subtotal')
                            ->required()
                            ->numeric()
                            ->prefix('R'),
                        TextInput::make('shipping')
                            ->numeric()
                            ->prefix('R'),
                        TextInput::make('tax')
                            ->required()
                            ->numeric()
                            ->prefix('R'),
                        TextInput::make('discount')
                            ->numeric()
                            ->prefix('R'),
                        TextInput::make('total')
                            ->required()
                            ->numeric()
                            ->prefix('R'),
                        TextInput::make('currency')
                            ->default('ZAR'),
                    ]),
                Section::make('Customer Information')
                    ->columns(2)
                    ->components([
                        TextInput::make('billing_name'),
                        TextInput::make('billing_email')
                            ->email(),
                        TextInput::make('billing_phone')
                            ->tel(),
                        Textarea::make('billing_address')
                            ->columnSpanFull(),
                        TextInput::make('billing_city'),
                        TextInput::make('billing_state'),
                        TextInput::make('billing_zip'),
                        TextInput::make('billing_country'),
                    ]),
                Section::make('Shipping Information')
                    ->columns(2)
                    ->components([
                        TextInput::make('shipping_name'),
                        TextInput::make('shipping_email')
                            ->email(),
                        TextInput::make('shipping_phone')
                            ->tel(),
                        Textarea::make('shipping_address')
                            ->columnSpanFull(),
                        TextInput::make('shipping_city'),
                        TextInput::make('shipping_state'),
                        TextInput::make('shipping_zip'),
                        TextInput::make('shipping_country'),
                        TextInput::make('shipping_province'),
                    ]),
                Section::make('Notes')
                    ->components([
                        Textarea::make('notes')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
