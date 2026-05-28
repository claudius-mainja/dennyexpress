<?php

namespace App\Enums;

enum PaymentMethod: string
{
    case CARD = 'card';
    case OZOW = 'ozow';
    case PAYJUSTNOW = 'payjustnow';
    case BANK_TRANSFER = 'bank_transfer';

    public function label(): string
    {
        return match ($this) {
            self::CARD => 'Credit / Debit Card',
            self::OZOW => 'Ozow',
            self::PAYJUSTNOW => 'PayJustNow',
            self::BANK_TRANSFER => 'Bank Transfer',
        };
    }
}
