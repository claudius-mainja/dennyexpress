@props(['product' => null, 'showQuantity' => true])

@php
    $productId = null;
    if ($product) {
        $productId = is_object($product) ? $product->id : ($product['id'] ?? null);
    } elseif (isset($product)) {
        $productId = is_object($product) ? $product->id : ($product['id'] ?? null);
    }
@endphp

<form action="{{ route('cart.add') }}" method="POST" {{ $attributes->merge(['class' => 'space-y-4']) }}>
    @csrf
    <input type="hidden" name="product_id" value="{{ $productId }}">

    @if ($showQuantity && $productId)
        <div x-data="quantityInput" class="flex items-center gap-3">
            <span class="text-sm font-semibold text-gray-700">Quantity:</span>
            <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden">
                <button type="button" @click="decrement" class="px-3 py-2 text-gray-500 hover:text-gray-800 hover:bg-gray-50 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                    </svg>
                </button>
                <input type="number" name="quantity" x-model="qty" min="1" class="w-14 text-center border-x border-gray-300 py-2 text-sm font-semibold text-gray-900 bg-transparent focus:outline-none [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none">
                <button type="button" @click="increment" class="px-3 py-2 text-gray-500 hover:text-gray-800 hover:bg-gray-50 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </button>
            </div>
        </div>
    @endif

    @if ($productId)
        <div class="flex items-center gap-3">
            <button type="submit" class="flex-1 inline-flex items-center justify-center gap-2 px-5 py-3.5 bg-primary text-white text-sm font-bold rounded-xl hover:bg-primary-dark hover:shadow-lg hover:shadow-primary/25 active:scale-[0.98] transition-all duration-300">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
                Add to Cart
            </button>
            <button type="button"
                    data-product-id="{{ $productId }}"
                    x-data="wishlistBtn"
                    @click="toggle"
                    :class="{ 'bg-red-50 border-red-300': isWishlisted }"
                    class="inline-flex items-center justify-center px-4 py-3.5 bg-white text-gray-700 text-sm font-semibold rounded-xl border-2 border-gray-200 hover:bg-gray-50 hover:border-gray-300 transition-all duration-300"
                    :title="isWishlisted ? 'Remove from Wishlist' : 'Add to Wishlist'">
                <svg x-show="!isWishlisted" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
                <svg x-show="isWishlisted" class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
            </button>
        </div>
    @else
        <div class="flex items-center gap-3">
            <button type="button" disabled class="flex-1 inline-flex items-center justify-center gap-2 px-5 py-3.5 bg-gray-200 text-gray-500 text-sm font-bold rounded-xl cursor-not-allowed">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
                Select a Product
            </button>
        </div>
    @endif
</form>