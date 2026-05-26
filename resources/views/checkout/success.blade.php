<x-layouts.app title="Order Confirmed | Denny Express">
    <x-partials.breadcrumbs :items="[['label' => 'Checkout', 'url' => route('checkout.index')], ['label' => 'Success', 'url' => '#']]" />

    <div class="container-custom pb-12">
        <div class="max-w-lg mx-auto text-center py-12">
            <div class="w-16 h-16 bg-success/10 rounded-2xl flex items-center justify-center mx-auto mb-6">
                <svg class="w-8 h-8 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <h1 class="text-2xl md:text-3xl font-bold text-primary-navy mb-3">Order Confirmed!</h1>
            <p class="text-medium-gray text-sm mb-2">Thank you for your purchase. Your order has been received and is being processed.</p>
            <div class="card p-4 mb-6 inline-block">
                <p class="text-sm text-medium-gray">Order Number: <span class="font-semibold text-dark-charcoal">{{ $order->order_number }}</span></p>
                <p class="text-sm text-medium-gray mt-1">Total: <span class="font-semibold text-primary-green">R {{ number_format($order->total, 2) }}</span></p>
                <p class="text-sm text-medium-gray mt-1">Payment Method: <span class="font-semibold text-dark-charcoal">{{ ucwords(str_replace('_', ' ', $order->payment_method)) }}</span></p>
            </div>
            <p class="text-xs text-medium-gray mb-6">You will receive an email confirmation shortly with your order details.</p>
            <div class="space-y-3">
                <a href="{{ route('shop.index') }}" class="btn-primary">Continue Shopping</a>
                <br>
                <a href="{{ route('home') }}" class="btn-secondary mt-2 inline-block">Back to Home</a>
            </div>
        </div>
    </div>
</x-layouts.app>
