<?php

namespace App\Enums;

enum PaymentMethod: string
{
    case PAYFAST = 'payfast';
    case OZOW = 'ozow';
    case PAYJUSTNOW = 'payjustnow';
    case BANK_TRANSFER = 'bank_transfer';
    case CASH_ON_DELIVERY = 'cod';

    public function label(): string
    {
        return match ($this) {
            self::PAYFAST => 'PayFast',
            self::OZOW => 'Ozow',
            self::PAYJUSTNOW => 'PayJustNow',
            self::BANK_TRANSFER => 'Bank Transfer',
            self::CASH_ON_DELIVERY => 'Cash on Delivery',
        };
    }
}
