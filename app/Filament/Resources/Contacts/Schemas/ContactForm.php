<?php

namespace App\Filament\Resources\Contacts\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ContactForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([
                Section::make('Inquiry Details')
                    ->columns(2)
                    ->components([
                        TextInput::make('name')
                            ->required()
                            ->disabled(),
                        TextInput::make('email')
                            ->email()
                            ->required()
                            ->disabled(),
                        TextInput::make('phone')
                            ->disabled(),
                        TextInput::make('subject')
                            ->required()
                            ->disabled()
                            ->columnSpanFull(),
                        Textarea::make('message')
                            ->required()
                            ->disabled()
                            ->columnSpanFull(),
                    ]),
                Section::make('Admin Reply')
                    ->components([
                        Textarea::make('admin_reply')
                            ->label('Your Reply')
                            ->placeholder('Type your reply here...')
                            ->columnSpanFull()
                            ->rows(6),
                    ]),
            ]);
    }
}
