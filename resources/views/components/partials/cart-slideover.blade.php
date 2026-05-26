<div x-show="cartOpen"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     class="fixed inset-0 z-50"
     x-cloak>
    <div @click="cartOpen = false" class="absolute inset-0 bg-black/70 backdrop-blur-sm"></div>
    <div x-show="cartOpen"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="translate-x-full"
         x-transition:enter-end="translate-x-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="translate-x-0"
         x-transition:leave-end="translate-x-full"
         class="absolute inset-y-0 right-0 w-full max-w-md bg-surface shadow-2xl flex flex-col border-l border-white/5">
        
        @php
            $cartService = app(\App\Services\CartService::class);
            $items = $cartService->content();
            $count = $cartService->count();
            $subtotal = $cartService->subtotal();
            $tax = $cartService->taxAmount();
            $total = $cartService->totalWithTax();
        @endphp

        <div class="flex items-center justify-between p-4 border-b border-white/10">
            <h2 class="text-lg font-semibold text-white">Shopping Cart ({{ $count }})</h2>
            <button @click="cartOpen = false" class="p-2 text-gray-400 hover:text-white transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        
        <div class="flex-1 overflow-y-auto p-4">
            @if ($count > 0)
                <div class="space-y-4">
                    @foreach ($items as $item)
                        <div class="flex items-start gap-3 pb-4 border-b border-white/5">
                            <div class="w-16 h-16 rounded-lg bg-dark overflow-hidden shrink-0 border border-white/10">
                                <img src="{{ $item->product?->primaryImage?->image_url ?? asset('storage/images/products/pos-system-fallback.jpg') }}"
                                     alt="{{ $item->product?->name }}"
                                     class="w-full h-full object-cover"
                                     onerror="this.src='{{ asset('storage/images/products/pos-system-fallback.jpg') }}'">
                            </div>
                            <div class="flex-1 min-w-0">
                                <h3 class="text-sm font-medium text-white line-clamp-2">
                                    {{ $item->product?->name ?? 'Product' }}
                                </h3>
                                <p class="text-sm text-gray-400 mt-0.5">Qty: {{ $item->quantity }}</p>
                                <p class="text-sm font-semibold text-white mt-1">
                                    R{{ number_format((float)($item->price * $item->quantity), 2) }}
                                </p>
                            </div>
                            @if ($item->id)
                                <form action="{{ route('cart.remove', $item->id) }}" method="POST" onsubmit="return confirm('Remove this item?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-1 text-gray-500 hover:text-red-400 transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            @endif
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <svg class="w-16 h-16 mx-auto text-gray-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <p class="text-gray-500 text-sm">Your cart is empty</p>
                </div>
            @endif
        </div>
        
        @if ($count > 0)
            <div class="border-t border-white/10 p-4 space-y-3">
                <div class="space-y-2 text-sm">
                    <div class="flex items-center justify-between">
                        <span class="text-gray-400">Subtotal</span>
                        <span class="font-medium text-white">R{{ number_format($subtotal, 2) }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-400">Shipping</span>
                        <span class="font-medium text-primary">Free</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-400">Tax (15%)</span>
                        <span class="font-medium text-white">R{{ number_format($tax, 2) }}</span>
                    </div>
                </div>
                
                <div class="border-t border-white/10 pt-3">
                    <div class="flex items-center justify-between">
                        <span class="text-base font-semibold text-white">Total</span>
                        <span class="text-xl font-bold text-primary">R{{ number_format($total, 2) }}</span>
                    </div>
                </div>
                
                <a href="{{ route('checkout.index') }}" 
                   class="w-full inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-primary text-white text-sm font-medium rounded-lg hover:bg-primary-dark transition-colors">
                    Checkout
                </a>
                <button @click="cartOpen = false" 
                        class="w-full inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-dark text-gray-300 text-sm font-medium rounded-lg border border-white/10 hover:bg-surface-light hover:border-white/20 transition-colors">
                    Continue Shopping
                </button>
            </div>
        @endif
    </div>
</div>
