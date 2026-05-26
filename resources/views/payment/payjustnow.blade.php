<x-layouts.app title="Pay with PayJustNow | Denny Express">
    <div class="min-h-[70vh] py-section">
        <div class="container-custom">
            <div class="max-w-2xl mx-auto">
                <div class="text-center mb-8">
                    <div class="w-16 h-16 mx-auto mb-4 bg-accent-orange/10 rounded-full flex items-center justify-center">
                        <svg class="w-8 h-8 text-accent-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h1 class="text-3xl font-bold text-dark-charcoal">Pay with PayJustNow</h1>
                    <p class="text-medium-gray mt-2">Split your payment into 3 easy installments</p>
                </div>

                <div class="card p-6 mb-6">
                    <h2 class="text-lg font-semibold text-dark-charcoal mb-4">Order Summary</h2>
                    <div class="flex items-center justify-between py-3 border-b border-border-gray">
                        <span class="text-medium-gray">Order Number</span>
                        <span class="font-medium">{{ $order->order_number }}</span>
                    </div>
                    <div class="flex items-center justify-between py-3 border-b border-border-gray">
                        <span class="text-medium-gray">Items</span>
                        <span class="font-medium">{{ $order->items->count() }} items</span>
                    </div>
                    <div class="flex items-center justify-between py-4 text-lg font-bold">
                        <span class="text-dark-charcoal">Total</span>
                        <span class="text-primary-green">R {{ number_format($order->total, 2) }}</span>
                    </div>
                </div>

                <div class="bg-light-gray rounded-xl p-6 mb-6">
                    <h3 class="font-semibold text-dark-charcoal mb-3">How it works</h3>
                    <div class="space-y-3">
                        <div class="flex items-start gap-3">
                            <div class="w-6 h-6 bg-primary-green text-white rounded-full flex items-center justify-center text-xs font-bold shrink-0">1</div>
                            <p class="text-sm text-medium-gray">Pay R {{ number_format($order->total / 3, 2) }} today</p>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="w-6 h-6 bg-primary-green text-white rounded-full flex items-center justify-center text-xs font-bold shrink-0">2</div>
                            <p class="text-sm text-medium-gray">Pay R {{ number_format($order->total / 3, 2) }} in 30 days</p>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="w-6 h-6 bg-primary-green text-white rounded-full flex items-center justify-center text-xs font-bold shrink-0">3</div>
                            <p class="text-sm text-medium-gray">Pay R {{ number_format($order->total / 3, 2) }} in 60 days</p>
                        </div>
                    </div>
                    <p class="text-xs text-medium-gray mt-4">0% interest. No extra fees.</p>
                </div>

                <div class="text-center">
                    <div class="inline-block bg-light-gray rounded-lg px-6 py-3 mb-4">
                        <p class="text-sm text-medium-gray">PayJustNow setup required</p>
                        <p class="text-xs text-medium-gray mt-1">Add your PayJustNow credentials in settings</p>
                    </div>
                    
                    <div class="flex gap-3">
                        <a href="{{ route('checkout.success', $order->order_number) }}" class="btn-primary flex-1">
                            Continue as Demo
                        </a>
                        <a href="{{ route('checkout.index') }}" class="btn-secondary flex-1">
                            Back to Checkout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
