<?php

namespace App\Filament\Resources\PaymentLogs;

use App\Filament\Resources\PaymentLogs\Pages\ListPaymentLogs;
use App\Filament\Resources\PaymentLogs\Tables\PaymentLogsTable;
use App\Models\PaymentLog;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class PaymentLogResource extends Resource
{
    protected static ?string $model = PaymentLog::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedClipboardDocumentList;

    protected static string|UnitEnum|null $navigationGroup = 'Payments';

    protected static ?string $recordTitleAttribute = 'gateway';

    protected static ?int $navigationSort = 2;

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()?->canManagePayments() ?? false;
    }

    public static function canViewAny(): bool
    {
        return auth()->user()?->canManagePayments() ?? false;
    }

    public static function table(Table $table): Table
    {
        return PaymentLogsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPaymentLogs::route('/'),
        ];
    }
}
