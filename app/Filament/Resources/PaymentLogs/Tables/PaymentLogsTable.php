<?php

namespace App\Filament\Resources\PaymentLogs\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PaymentLogsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('#')
                    ->sortable(),
                TextColumn::make('gateway')
                    ->label('Gateway')
                    ->badge()
                    ->searchable(),
                TextColumn::make('event_type')
                    ->label('Event')
                    ->badge()
                    ->color('gray')
                    ->searchable(),
                TextColumn::make('order.order_number')
                    ->label('Order')
                    ->searchable(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'completed' => 'success',
                        'failed' => 'danger',
                        'processing' => 'warning',
                        default => 'gray',
                    }),
                TextColumn::make('created_at')
                    ->label('Date/Time')
                    ->dateTime('Y-m-d H:i:s')
                    ->sortable(),
            ])
            ->filters([])
            ->defaultSort('created_at', 'desc')
            ->recordActions([])
            ->toolbarActions([]);
    }
}
