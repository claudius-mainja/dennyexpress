<x-layouts.app title="Payment Cancelled | Denny Express">
    <div class="min-h-[70vh] flex items-center justify-center py-12 sm:py-16">
        <div class="text-center max-w-md mx-auto px-4">
            <div class="w-16 h-16 mx-auto mb-6 bg-gray-100 rounded-2xl flex items-center justify-center">
                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </div>

            <h1 class="text-2xl font-bold text-gray-900 mb-2">Payment Cancelled</h1>
            <p class="text-gray-500 mb-6">Your payment was not completed. Don't worry, your items are still in your cart!</p>

            <div class="space-y-3">
                <a href="{{ route('cart.index') }}" class="inline-flex items-center justify-center px-6 py-3 bg-primary text-white text-sm font-semibold rounded-xl hover:bg-primary-dark transition-all">
                    Return to Cart
                </a>
                <br>
                <a href="{{ route('shop.index') }}" class="inline-flex items-center justify-center px-6 py-3 bg-white text-gray-700 text-sm font-semibold rounded-xl border border-gray-300 hover:bg-gray-50 transition-all">
                    Continue Shopping
                </a>
            </div>

            <div class="mt-8 bg-gray-50 rounded-xl p-4 text-sm text-gray-600">
                <p class="mb-2 font-medium">Need help?</p>
                <div class="flex items-center justify-center gap-4 flex-wrap">
                    <a href="tel:0743551336" class="flex items-center gap-1 text-primary hover:underline">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        074 355 1336
                    </a>
                    <a href="mailto:info@dennyexpress.co.za" class="flex items-center gap-1 text-primary hover:underline">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        info@dennyexpress.co.za
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
