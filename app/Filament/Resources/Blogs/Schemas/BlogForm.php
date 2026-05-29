<?php

namespace App\Filament\Resources\Blogs\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BlogForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([
                Section::make('Content')
                    ->columnSpanFull()
                    ->components([
                        TextInput::make('title')
                            ->required()
                            ->columnSpanFull(),
                        TextInput::make('slug')
                            ->helperText('Auto-generated if left empty')
                            ->columnSpan(1),
                        Select::make('categories')
                            ->multiple()
                            ->relationship('categories', 'name')
                            ->preload()
                            ->columnSpan(1),
                        RichEditor::make('content')
                            ->required()
                            ->columnSpanFull(),
                        Textarea::make('excerpt')
                            ->columnSpanFull()
                            ->rows(3),
                    ]),
                Section::make('Featured Image')
                    ->components([
                        FileUpload::make('featured_image')
                            ->image()
                            ->directory('blog'),
                    ]),
                Section::make('Author & Publishing')
                    ->columns(2)
                    ->components([
                        Select::make('author_id')
                            ->relationship('author', 'name'),
                        Toggle::make('is_published')
                            ->live(),
                        DateTimePicker::make('published_at')
                            ->default(now()),
                    ]),
                Section::make('SEO')
                    ->components([
                        TextInput::make('seo_title')
                            ->columnSpanFull(),
                        Textarea::make('seo_description')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
