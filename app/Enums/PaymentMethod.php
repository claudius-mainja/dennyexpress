<?php

namespace App\Enums;

enum PaymentMethod: string
{
    case CARD = 'card';
    case OZOW = 'ozow';
    case PAYFAST = 'payfast';
    case PAYJUSTNOW = 'payjustnow';
    case PAYFLEX = 'payflex';
    case BANK_TRANSFER = 'bank_transfer';

    public function label(): string
    {
        return match ($this) {
            self::CARD => 'Credit / Debit Card',
            self::OZOW => 'Ozow',
            self::PAYFAST => 'PayFast',
            self::PAYJUSTNOW => 'PayJustNow',
            self::PAYFLEX => 'Payflex',
            self::BANK_TRANSFER => 'Bank Transfer',
        };
    }
}
