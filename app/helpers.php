<?php

if (!function_exists('price_format')) {
    function price_format(float $amount, string $symbol = 'R'): string
    {
        return $symbol . ' ' . number_format($amount, 2, '.', ',');
    }
}

if (!function_exists('price_with_vat')) {
    function price_with_vat(float $amount, float $rate = 0.15): float
    {
        return round($amount * (1 + $rate), 2);
    }
}

if (!function_exists('price_without_vat')) {
    function price_without_vat(float $amount, float $rate = 0.15): float
    {
        return round($amount / (1 + $rate), 2);
    }
}

if (!function_exists('discount_amount')) {
    function discount_amount(float $original, ?float $sale): float
    {
        if ($sale === null || $sale >= $original) {
            return 0;
        }

        return round($original - $sale, 2);
    }
}

if (!function_exists('discount_percentage')) {
    function discount_percentage(float $original, ?float $sale): int
    {
        if ($sale === null || $sale >= $original || $original <= 0) {
            return 0;
        }

        return (int) round((1 - $sale / $original) * 100);
    }
}
