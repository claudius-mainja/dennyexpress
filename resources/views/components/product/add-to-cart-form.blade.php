@props(['product' => null, 'showQuantity' => true])

<form {{ $attributes->merge(['class' => 'space-y-4']) }}>
    @csrf
    <input type="hidden" name="product_id" value="{{ $product['id'] ?? '' }}">

    @if ($showQuantity)
        <div x-data="quantityInput" class="flex items-center gap-3">
            <span class="text-sm font-medium text-dark-charcoal">Quantity:</span>
            <div class="flex items-center border border-border-gray rounded-lg overflow-hidden">
                <button type="button" @click="decrement" class="px-3 py-2 text-medium-gray hover:text-dark-charcoal hover:bg-light-gray transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                    </svg>
                </button>
                <input type="number" name="quantity" x-model="qty" min="1" class="w-14 text-center border-x border-border-gray py-2 text-sm font-medium text-dark-charcoal bg-transparent focus:outline-none [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none">
                <button type="button" @click="increment" class="px-3 py-2 text-medium-gray hover:text-dark-charcoal hover:bg-light-gray transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </button>
            </div>
        </div>
    @endif

    <div class="flex items-center gap-3">
        <button type="submit" class="btn-primary flex-1">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
            </svg>
            Add to Cart
        </button>
        <button type="button" class="btn-secondary px-4" title="Add to Wishlist">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
            </svg>
        </button>
    </div>
</form>
