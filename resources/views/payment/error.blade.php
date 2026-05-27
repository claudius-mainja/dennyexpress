<x-layouts.app title="Payment Error | Denny Express">
    <div class="min-h-[70vh] flex items-center justify-center py-12 sm:py-16">
        <div class="text-center max-w-md mx-auto px-4">
            <div class="w-16 h-16 mx-auto mb-6 bg-red-100 rounded-2xl flex items-center justify-center">
                <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z" />
                </svg>
            </div>

            <h1 class="text-2xl font-bold text-gray-900 mb-2">Payment Error</h1>
            <p class="text-gray-500 mb-2">Sorry, there was an issue processing your payment.</p>
            @isset($orderModel)
                <p class="text-sm text-gray-400 mb-6">Order: {{ $orderModel->order_number }}</p>
            @else
                <p class="text-sm text-gray-400 mb-6">Please try again or contact support.</p>
            @endisset

            <div class="space-y-3">
                <a href="{{ route('checkout.index') }}" class="inline-flex items-center justify-center px-6 py-3 bg-primary text-white text-sm font-semibold rounded-xl hover:bg-primary-dark transition-all">
                    Try Again
                </a>
                <br>
                <a href="{{ route('cart.index') }}" class="inline-flex items-center justify-center px-6 py-3 bg-white text-gray-700 text-sm font-semibold rounded-xl border border-gray-300 hover:bg-gray-50 transition-all">
                    Return to Cart
                </a>
            </div>

            <div class="mt-8 bg-gray-50 rounded-xl p-4 text-sm text-gray-600">
                <p class="font-medium mb-1">Need help?</p>
                <p>Contact us at <a href="tel:0743551336" class="text-primary hover:underline">074 355 1336</a> or <a href="mailto:sales@dennyexpress.co.za" class="text-primary hover:underline">sales@dennyexpress.co.za</a></p>
            </div>
        </div>
    </div>
</x-layouts.app>
