@props(['price' => 0, 'originalPrice' => null, 'size' => 'md', 'currency' => 'R'])

@php
    $sizes = [
        'sm' => 'text-sm',
        'md' => 'text-lg',
        'lg' => 'text-2xl',
        'xl' => 'text-3xl',
    ];

    $formatPrice = fn($amount) => $currency . number_format((float) $amount, 2, '.', ',');
    $hasSale = $originalPrice && $originalPrice > $price;
    $discountPercent = $hasSale ? round((($originalPrice - $price) / $originalPrice) * 100) : 0;
@endphp

<div {{ $attributes->merge(['class' => 'flex items-baseline gap-2']) }}>
    <span class="{{ $sizes[$size] }} font-bold text-dark-charcoal">{{ $formatPrice($price) }}</span>
    @if ($hasSale)
        <span class="{{ $sizes[$size] === 'text-sm' ? 'text-xs' : 'text-sm' }} text-medium-gray line-through">{{ $formatPrice($originalPrice) }}</span>
        <span class="text-xs font-semibold text-sale-red bg-sale-red/10 px-1.5 py-0.5 rounded">-{{ $discountPercent }}%</span>
    @endif
</div>
