@props([
    'variant' => 'primary',
    'size' => 'md',
    'type' => 'button',
    'href' => null,
    'disabled' => false,
])

@php
    $base = 'inline-flex items-center justify-center gap-2 font-medium rounded-lg transition-all duration-200 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-accent-blue';

    $sizes = [
        'sm' => 'px-3 py-1.5 text-xs',
        'md' => 'px-5 py-2.5 text-sm',
        'lg' => 'px-6 py-3 text-sm',
        'xl' => 'px-8 py-4 text-base',
    ];

    $variants = [
        'primary' => 'bg-primary-blue text-white hover:bg-accent-blue disabled:opacity-50 disabled:cursor-not-allowed shadow-soft hover:shadow-card',
        'secondary' => 'bg-white text-dark-charcoal border border-border-gray hover:bg-light-gray hover:border-medium-gray disabled:opacity-50 disabled:cursor-not-allowed',
        'danger' => 'bg-error text-white hover:bg-sale-red disabled:opacity-50 disabled:cursor-not-allowed',
        'ghost' => 'text-medium-gray hover:text-dark-charcoal hover:bg-light-gray disabled:opacity-50 disabled:cursor-not-allowed',
        'outline-blue' => 'bg-transparent text-primary-blue border border-primary-blue hover:bg-primary-blue hover:text-white disabled:opacity-50 disabled:cursor-not-allowed',
    ];

    $classes = trim("{$base} {$sizes[$size]} {$variants[$variant]}");
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $disabled ? 'disabled' : '' }} {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
