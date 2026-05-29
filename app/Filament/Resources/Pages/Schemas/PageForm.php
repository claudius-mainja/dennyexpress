<?php

namespace App\Filament\Resources\Pages\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([
                Section::make('Page Content')
                    ->columns(2)
                    ->components([
                        TextInput::make('title')
                            ->required(),
                        TextInput::make('slug')
                            ->required()
                            ->helperText('URL slug'),
                        Select::make('parent_id')
                            ->relationship('parent', 'title'),
                        Select::make('template'),
                        RichEditor::make('content')
                            ->columnSpanFull(),
                    ]),
                Section::make('SEO')
                    ->components([
                        TextInput::make('meta_title')
                            ->columnSpanFull(),
                        Textarea::make('meta_description')
                            ->columnSpanFull(),
                    ]),
                Section::make('Settings')
                    ->columns(2)
                    ->components([
                        Toggle::make('is_active'),
                        TextInput::make('sort_order')
                            ->numeric()
                            ->default(0),
                    ]),
            ]);
    }
}
