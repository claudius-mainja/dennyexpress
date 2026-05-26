@props(['title' => 'Featured Products', 'subtitle' => '', 'products' => []])

<section {{ $attributes->merge(['class' => 'py-section']) }}>
    <div class="container-custom">
        <div class="flex items-end justify-between mb-8">
            <div>
                <h2 class="section-heading">{{ $title }}</h2>
                @if ($subtitle)
                    <p class="section-subheading">{{ $subtitle }}</p>
                @endif
            </div>
            <a href="{{ route('shop.index') }}" class="hidden sm:inline-flex items-center gap-1.5 text-sm font-medium text-primary-blue hover:text-accent-blue transition-colors">
                View All
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
        <x-product.grid :products="$products" />
        <div class="mt-6 text-center sm:hidden">
            <a href="{{ route('shop.index') }}" class="btn-secondary">
                View All Products
            </a>
        </div>
    </div>
</section>
