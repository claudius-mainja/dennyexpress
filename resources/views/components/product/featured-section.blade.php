@props(['title' => 'Featured Products', 'subtitle' => '', 'products' => []])

<section {{ $attributes->merge(['class' => 'py-8 sm:py-12']) }}>
    <div class="container-custom">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-2 sm:gap-0 mb-6 sm:mb-8">
            <div>
                <span class="text-[10px] sm:text-xs font-black text-primary uppercase tracking-widest">{{ $title }}</span>
                @if ($subtitle)
                    <p class="text-xs sm:text-sm text-gray-500 mt-0.5 sm:mt-1">{{ $subtitle }}</p>
                @endif
            </div>
            <a href="{{ route('shop.index') }}" class="inline-flex items-center gap-1.5 text-xs sm:text-sm font-semibold text-primary hover:text-primary-dark transition-colors">
                View All
                <svg class="w-3.5 sm:w-4 h-3.5 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
            </a>
        </div>
        <x-product.grid :products="$products" />
        <div class="mt-6 text-center sm:hidden">
            <a href="{{ route('shop.index') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-white text-gray-700 text-sm font-semibold rounded-xl border-2 border-gray-200 hover:bg-gray-50 hover:border-gray-300 transition-all duration-300">
                View All Products
            </a>
        </div>
    </div>
</section>
