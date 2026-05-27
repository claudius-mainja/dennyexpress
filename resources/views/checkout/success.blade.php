<x-layouts.app title="Order Confirmed | Denny Express">
    <x-partials.breadcrumbs :items="[['label' => 'Checkout', 'url' => route('checkout.index')], ['label' => 'Success', 'url' => '#']]" />

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
        <div class="max-w-lg mx-auto text-center py-12">
            <div class="w-16 h-16 bg-green-100 rounded-2xl flex items-center justify-center mx-auto mb-6">
                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-3">Order Confirmed!</h1>
            <p class="text-gray-500 text-sm mb-2">Thank you for your purchase. Your order has been received and is being processed.</p>
            <div class="bg-white rounded-xl border border-gray-200 p-4 mb-6 inline-block text-left">
                <p class="text-sm text-gray-500">Order Number: <span class="font-semibold text-gray-900">{{ $order->order_number }}</span></p>
                <p class="text-sm text-gray-500 mt-1">Total: <span class="font-semibold text-primary">R {{ number_format($order->total, 2) }}</span></p>
                <p class="text-sm text-gray-500 mt-1">Payment Method: <span class="font-semibold text-gray-900">{{ ucwords(str_replace('_', ' ', $order->payment_method)) }}</span></p>
            </div>
            <p class="text-xs text-gray-400 mb-6">You will receive an email confirmation shortly with your order details.</p>
            <div class="space-y-3">
                <a href="{{ route('shop.index') }}" class="inline-flex items-center justify-center px-6 py-3 bg-primary text-white text-sm font-semibold rounded-xl hover:bg-primary-dark transition-all">Continue Shopping</a>
                <br>
                <a href="{{ route('home') }}" class="inline-flex items-center justify-center px-6 py-3 bg-white text-gray-700 text-sm font-semibold rounded-xl border border-gray-300 hover:bg-gray-50 transition-all mt-2">Back to Home</a>
            </div>
        </div>
    </div>
</x-layouts.app>
