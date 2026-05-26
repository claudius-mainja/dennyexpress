<x-layouts.app title="Compare Products">
    <x-partials.breadcrumbs :items="[['label' => 'Compare', 'url' => '#']]" />

    <div class="container-custom pb-12">
        <h1 class="text-2xl md:text-3xl font-bold text-primary-navy mb-8">Compare Products</h1>

        <div class="text-center py-16">
            <svg class="w-16 h-16 mx-auto text-border-gray mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
            </svg>
            <h2 class="text-lg font-semibold text-dark-charcoal mb-2">No products to compare</h2>
            <p class="text-medium-gray text-sm mb-4">Add products to compare their specifications side by side.</p>
            <a href="{{ route('shop.index') }}" class="btn-primary">Browse Products</a>
        </div>
    </div>
</x-layouts.app>
