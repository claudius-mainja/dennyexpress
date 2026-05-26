@props(['type' => 'default', 'size' => 'sm'])

@php
    $sizes = [
        'sm' => 'px-2 py-0.5 text-[10px]',
        'md' => 'px-2.5 py-1 text-xs',
        'lg' => 'px-3 py-1 text-sm',
    ];

    $types = [
        'sale' => 'bg-sale-red/10 text-sale-red',
        'new' => 'bg-success/10 text-success',
        'featured' => 'bg-warning/10 text-warning',
        'limited' => 'bg-error/10 text-error',
        'default' => 'bg-light-gray text-medium-gray',
        'premium' => 'bg-primary-navy/10 text-primary-navy',
    ];
@endphp

<span {{ $attributes->merge(['class' => 'inline-flex items-center font-semibold rounded-full ' . $sizes[$size] . ' ' . $types[$type]]) }}>
    {{ $slot }}
</span>
