<?php

namespace App\Enums;

enum QuoteStatus: string
{
    case PENDING = 'pending';
    case REVIEWED = 'reviewed';
    case CONTACTED = 'contacted';
    case CONVERTED = 'converted';
    case REJECTED = 'rejected';

    public function label(): string
    {
        return match ($this) {
            self::PENDING => 'Pending',
            self::REVIEWED => 'Reviewed',
            self::CONTACTED => 'Contacted',
            self::CONVERTED => 'Converted',
            self::REJECTED => 'Rejected',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::PENDING => 'yellow',
            self::REVIEWED => 'blue',
            self::CONTACTED => 'indigo',
            self::CONVERTED => 'green',
            self::REJECTED => 'red',
        };
    }
}
