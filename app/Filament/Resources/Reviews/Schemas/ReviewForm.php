<?php

namespace App\Filament\Resources\Reviews\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ReviewForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([
                Section::make('Review Details')
                    ->columns(2)
                    ->components([
                        TextInput::make('author_name')
                            ->disabled(),
                        TextInput::make('author_email')
                            ->email()
                            ->disabled(),
                        Select::make('rating')
                            ->options([1 => '1 Star', 2 => '2 Stars', 3 => '3 Stars', 4 => '4 Stars', 5 => '5 Stars'])
                            ->disabled(),
                        TextInput::make('title')
                            ->disabled(),
                        Textarea::make('body')
                            ->disabled()
                            ->columnSpanFull(),
                    ]),
                Section::make('Moderation')
                    ->columns(2)
                    ->components([
                        Toggle::make('is_approved')
                            ->label('Approved')
                            ->default(true),
                        Toggle::make('verified')
                            ->label('Verified Purchase'),
                    ]),
            ]);
    }
}
