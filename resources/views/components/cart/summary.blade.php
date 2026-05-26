@props(['subtotal' => 0, 'shipping' => null, 'tax' => 0, 'total' => 0, 'freeShippingThreshold' => 5000])

<div {{ $attributes->merge(['class' => 'bg-gray-50 rounded-xl border border-gray-200 p-6 space-y-4']) }}>
    <h3 class="text-lg font-semibold text-gray-900">Order Summary</h3>

    @if ($subtotal > 0 && $subtotal < $freeShippingThreshold)
        <div class="bg-amber-50 rounded-lg p-3 text-sm">
            <p class="text-amber-600 font-medium">Add R{{ number_format($freeShippingThreshold - $subtotal, 2) }} more for free delivery!</p>
        </div>
    @elseif ($subtotal >= $freeShippingThreshold)
        <div class="bg-green-50 rounded-lg p-3 text-sm">
            <p class="text-green-600 font-medium flex items-center gap-1.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                You qualify for free delivery!
            </p>
        </div>
    @endif

    <div class="space-y-3 text-sm">
        <div class="flex items-center justify-between">
            <span class="text-gray-500">Subtotal</span>
            <span class="font-medium text-gray-900">R{{ number_format((float)$subtotal, 2) }}</span>
        </div>
        <div class="flex items-center justify-between">
            <span class="text-gray-500">Shipping</span>
            <span class="font-medium text-gray-900">
                @if ($shipping === null)
                    <span class="text-gray-500">Calculated at next step</span>
                @elseif ($shipping === 0 || (is_numeric($shipping) && $shipping == 0))
                    <span class="text-green-600">Free</span>
                @else
                    R{{ number_format((float)$shipping, 2) }}
                @endif
            </span>
        </div>
        <div class="flex items-center justify-between">
            <span class="text-gray-500">Tax (15% VAT)</span>
            <span class="font-medium text-gray-900">R{{ number_format((float)$tax, 2) }}</span>
        </div>
    </div>

    <div class="border-t border-gray-200 pt-4">
        <div class="flex items-center justify-between">
            <span class="text-base font-semibold text-gray-900">Total</span>
            <span class="text-xl font-bold text-primary">R{{ number_format((float)$total, 2) }}</span>
        </div>
    </div>

    <div class="pt-2 space-y-3">
        <a href="{{ route('checkout.index') }}" class="w-full inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-primary text-white text-sm font-medium rounded-lg hover:bg-primary-dark transition-colors">
            Proceed to Checkout
        </a>
        <a href="{{ route('shop.index') }}" class="w-full inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-white text-gray-700 text-sm font-medium rounded-lg border border-gray-300 hover:bg-gray-50 hover:border-gray-400 transition-colors text-center">
            Continue Shopping
        </a>
    </div>

    <div class="flex items-center justify-center gap-3 pt-2">
        <img src="{{ asset('images/payments/visa.svg') }}" alt="Visa" class="h-6 object-contain">
        <img src="{{ asset('images/payments/mastercard.svg') }}" alt="Mastercard" class="h-6 object-contain">
        <img src="{{ asset('images/payments/payfast.svg') }}" alt="PayFast" class="h-6 object-contain">
        <img src="{{ asset('images/payments/ozow.svg') }}" alt="Ozow" class="h-6 object-contain">
    </div>
</div>
