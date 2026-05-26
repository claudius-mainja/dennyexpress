<x-layouts.app title="Shopping Cart">
    {{-- Breadcrumb --}}
    <div class="bg-gray-50 border-b border-gray-200 py-3">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center gap-2 text-xs text-gray-500">
                <a href="{{ route('home') }}" class="hover:text-primary transition-colors">Home</a>
                <svg class="w-3 h-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                <span class="text-gray-800 font-medium">Shopping Cart</span>
            </div>
        </div>
    </div>

    {{-- Main Content --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-2xl md:text-3xl font-semibold text-gray-900 mb-8">Shopping Cart</h1>

        @php
            $cartService = app(\App\Services\CartService::class);
            $items = $cartService->content();
            $subtotal = $cartService->subtotal();
            $tax = $cartService->taxAmount();
            $total = $cartService->totalWithTax();
            $count = $cartService->count();
        @endphp

        @if ($count > 0)
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                {{-- Cart Items --}}
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl border border-gray-200">
                        @foreach ($items as $item)
                            <x-cart.item :model="$item" class="px-6" />
                        @endforeach
                        
                        {{-- Clear Cart --}}
                        <div class="px-6 py-4 border-t border-gray-200">
                            <form action="{{ route('cart.clear') }}" method="POST" onsubmit="return confirm('Clear your entire cart?')">
                                @csrf
                                <button type="submit" class="text-sm text-gray-500 hover:text-red-500 transition-colors flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Clear Cart
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- Order Summary --}}
                <div>
                    <x-cart.summary 
                        :subtotal="$subtotal"
                        :shipping="0"
                        :tax="$tax"
                        :total="$total"
                    />
                </div>
            </div>
        @else
            {{-- Empty Cart --}}
            <div class="text-center py-16">
                <svg class="w-20 h-20 mx-auto text-gray-300 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Your cart is empty</h3>
                <p class="text-sm text-gray-500 mb-8 max-w-md mx-auto">
                    Looks like you haven't added any products to your cart yet. Browse our products to get started.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('shop.index') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-primary text-white text-base font-medium rounded-lg hover:bg-primary-dark transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                        </svg>
                        Browse Products
                    </a>
                    <a href="{{ route('home') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-white text-gray-700 text-base font-medium rounded-lg border border-gray-300 hover:bg-gray-50 hover:border-gray-400 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Back to Home
                    </a>
                </div>
            </div>
        @endif
    </div>
</x-layouts.app>
