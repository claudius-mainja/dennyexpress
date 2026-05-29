<?php

namespace App\Filament\Resources\Quotes\Schemas;

use App\Enums\QuoteStatus;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class QuoteForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([
                Section::make('Customer Details')
                    ->columns(2)
                    ->components([
                        TextInput::make('name')
                            ->disabled(),
                        TextInput::make('email')
                            ->email()
                            ->disabled(),
                        TextInput::make('phone')
                            ->disabled(),
                        TextInput::make('company')
                            ->disabled(),
                    ]),
                Section::make('Quote Details')
                    ->columns(2)
                    ->components([
                        TextInput::make('uuid')
                            ->disabled(),
                        Select::make('status')
                            ->options(QuoteStatus::class)
                            ->required(),
                        Textarea::make('message')
                            ->disabled()
                            ->columnSpanFull(),
                    ]),
                Section::make('Admin Notes')
                    ->components([
                        Textarea::make('notes')
                            ->label('Internal Notes')
                            ->columnSpanFull()
                            ->rows(4),
                    ]),
            ]);
    }
}
