<x-layouts.app title="Wishlist">
    <x-partials.breadcrumbs :items="[['label' => 'Wishlist', 'url' => '#']]" />

    <div class="container-custom pb-12">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-primary-navy">My Wishlist</h1>
                <p class="text-medium-gray text-sm mt-1">{{ $wishlistCount ?? 0 }} items saved</p>
            </div>
            <a href="{{ route('shop.index') }}" class="btn-secondary text-sm">Continue Shopping</a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="col-span-full text-center py-16">
                <svg class="w-16 h-16 mx-auto text-border-gray mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
                <h2 class="text-lg font-semibold text-dark-charcoal mb-2">Your wishlist is empty</h2>
                <p class="text-medium-gray text-sm mb-4">Save your favourite products to your wishlist and come back to them later.</p>
                <a href="{{ route('shop.index') }}" class="btn-primary">Browse Products</a>
            </div>
        </div>
    </div>
</x-layouts.app>
