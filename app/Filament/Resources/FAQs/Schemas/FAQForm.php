<?php

namespace App\Filament\Resources\FAQs\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class FAQForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([
                Section::make('FAQ Details')
                    ->columns(2)
                    ->components([
                        Textarea::make('question')
                            ->required()
                            ->columnSpanFull(),
                        Textarea::make('answer')
                            ->required()
                            ->columnSpanFull(),
                        TextInput::make('category')
                            ->placeholder('e.g. Shipping, Returns'),
                        Toggle::make('is_active')
                            ->default(true),
                        TextInput::make('sort_order')
                            ->numeric()
                            ->default(0),
                    ]),
            ]);
    }
}
