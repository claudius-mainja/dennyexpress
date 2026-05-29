<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([
                Section::make('Basic Information')
                    ->columns(2)
                    ->components([
                        TextInput::make('name')
                            ->required()
                            ->columnSpanFull(),
                        TextInput::make('slug')
                            ->required()
                            ->helperText('Auto-generated if left empty'),
                        TextInput::make('sku')
                            ->label('SKU'),
                        TextInput::make('brand'),
                        Select::make('categories')
                            ->multiple()
                            ->relationship('categories', 'name')
                            ->preload(),
                    ]),
                Section::make('Pricing')
                    ->columns(2)
                    ->components([
                        TextInput::make('price')
                            ->required()
                            ->numeric()
                            ->prefix('R'),
                        TextInput::make('sale_price')
                            ->numeric()
                            ->prefix('R'),
                        TextInput::make('discount_percentage')
                            ->numeric()
                            ->suffix('%'),
                        Toggle::make('on_sale'),
                    ]),
                Section::make('Description')
                    ->components([
                        Textarea::make('short_description')
                            ->columnSpanFull(),
                        RichEditor::make('description')
                            ->columnSpanFull(),
                    ]),
                Section::make('Inventory')
                    ->columns(2)
                    ->components([
                        Select::make('stock_status')
                            ->required()
                            ->default('in_stock')
                            ->options([
                                'in_stock' => 'In Stock',
                                'out_of_stock' => 'Out of Stock',
                                'backorder' => 'Backorder',
                                'discontinued' => 'Discontinued',
                            ]),
                        TextInput::make('stock_quantity')
                            ->numeric()
                            ->default(0),
                    ]),
                Section::make('Images')
                    ->components([
                        FileUpload::make('image_url')
                            ->label('Primary Image')
                            ->image()
                            ->directory('products'),
                    ]),
                Section::make('Details')
                    ->columns(2)
                    ->components([
                        TextInput::make('weight')
                            ->numeric(),
                        TextInput::make('weight_unit')
                            ->default('kg'),
                        TextInput::make('warranty_months')
                            ->numeric()
                            ->default(18),
                        TextInput::make('delivery_estimate_days_min')
                            ->numeric()
                            ->default(14),
                        TextInput::make('delivery_estimate_days_max')
                            ->numeric()
                            ->default(30),
                        Textarea::make('specifications')
                            ->columnSpanFull(),
                        Textarea::make('what_included')
                            ->columnSpanFull(),
                    ]),
                Section::make('Status')
                    ->columns(3)
                    ->components([
                        Toggle::make('featured'),
                        Toggle::make('is_active'),
                        Toggle::make('new_arrival'),
                    ]),
                Section::make('SEO')
                    ->components([
                        TextInput::make('meta_title')
                            ->columnSpanFull(),
                        Textarea::make('meta_description')
                            ->columnSpanFull(),
                        Textarea::make('tags')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
