<x-layouts.app title="Checkout">
    @push('scripts')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('cardForm', () => ({
                    payment_method: 'card',
                    cardNumber: '',
                    cardName: '',
                    cardExpiry: '',
                    cardCvv: '',
                    brand: null,
                    
                    get brands() {
                        return {
                            visa: { name: 'Visa', pattern: /^4/, icon: '{{ asset('images/payments/visa.svg') }}' },
                            mastercard: { name: 'Mastercard', pattern: /^5[1-5]/, icon: '{{ asset('images/payments/mastercard.svg') }}' },
                            amex: { name: 'American Express', pattern: /^3[47]/, icon: '' },
                            discover: { name: 'Discover', pattern: /^6(?:011|5)/, icon: '' },
                        };
                    },
                    
                    get detectedBrand() {
                        const num = this.cardNumber.replace(/\s/g, '');
                        if (!num) return null;
                        if (/^4/.test(num)) return { ...this.brands.visa };
                        if (/^5[1-5]/.test(num)) return { ...this.brands.mastercard };
                        if (/^3[47]/.test(num)) return { ...this.brands.amex };
                        if (/^6(?:011|5)/.test(num)) return { ...this.brands.discover };
                        return { name: 'Card', icon: '' };
                    },
                    
                    get formattedNumber() {
                        const num = this.cardNumber.replace(/\D/g, '').substring(0, 16);
                        return num.replace(/(\d{4})(?=\d)/g, '$1 ');
                    },
                    
                    get expiryFormatted() {
                        const val = this.cardExpiry.replace(/\D/g, '').substring(0, 4);
                        if (val.length > 2) return val.substring(0, 2) + ' / ' + val.substring(2);
                        return val;
                    },
                    
                    get cardTypeName() {
                        return this.detectedBrand?.name || 'Card';
                    }
                }));
            });
        </script>
    @endpush
    {{-- Breadcrumb --}}
    <div class="bg-gray-50 border-b border-gray-200 py-3">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center gap-2 text-xs text-gray-500">
                <a href="{{ route('home') }}" class="hover:text-primary transition-colors">Home</a>
                <svg class="w-3 h-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                <a href="{{ route('cart.index') }}" class="hover:text-primary transition-colors">Cart</a>
                <svg class="w-3 h-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                <span class="text-gray-800 font-medium">Checkout</span>
            </div>
        </div>
    </div>

    {{-- Main Content --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-2xl md:text-3xl font-semibold text-gray-900 mb-8">Checkout</h1>

        @php
            $cartService = app(\App\Services\CartService::class);
            $items = $cartService->content();
            $count = $cartService->count();
            $subtotal = $cartService->subtotal();
            $tax = $cartService->taxAmount();
            $total = $cartService->totalWithTax();
        @endphp

        @if ($count > 0)
            <form action="{{ route('checkout.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <div class="lg:col-span-2 space-y-6">
                        <div class="bg-white rounded-xl border border-gray-200 p-6">
                            <h2 class="text-lg font-semibold text-gray-900 mb-4">Contact Information</h2>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Full Name *</label>
                                    <input type="text"
                                           name="billing_name"
                                           value="{{ old('billing_name') }}"
                                           required
                                           class="w-full px-4 py-2.5 text-sm bg-white border border-gray-300 rounded-lg placeholder:text-gray-400 focus:border-primary focus:ring-1 focus:ring-primary hover:border-gray-400 transition-all"
                                           placeholder="John Doe">
                                    <x-input-error :messages="$errors->get('billing_name')" class="mt-1" />
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Email *</label>
                                    <input type="email"
                                           name="billing_email"
                                           value="{{ old('billing_email') }}"
                                           required
                                           class="w-full px-4 py-2.5 text-sm bg-white border border-gray-300 rounded-lg placeholder:text-gray-400 focus:border-primary focus:ring-1 focus:ring-primary hover:border-gray-400 transition-all"
                                           placeholder="john@example.com">
                                    <x-input-error :messages="$errors->get('billing_email')" class="mt-1" />
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Phone *</label>
                                    <input type="tel"
                                           name="billing_phone"
                                           value="{{ old('billing_phone') }}"
                                           required
                                           class="w-full px-4 py-2.5 text-sm bg-white border border-gray-300 rounded-lg placeholder:text-gray-400 focus:border-primary focus:ring-1 focus:ring-primary hover:border-gray-400 transition-all"
                                           placeholder="+27 11 234 5678">
                                    <x-input-error :messages="$errors->get('billing_phone')" class="mt-1" />
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-xl border border-gray-200 p-6">
                            <h2 class="text-lg font-semibold text-gray-900 mb-4">Billing Address</h2>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Address *</label>
                                    <input type="text"
                                           name="billing_address"
                                           value="{{ old('billing_address') }}"
                                           required
                                           class="w-full px-4 py-2.5 text-sm bg-white border border-gray-300 rounded-lg placeholder:text-gray-400 focus:border-primary focus:ring-1 focus:ring-primary hover:border-gray-400 transition-all"
                                           placeholder="Street address">
                                    <x-input-error :messages="$errors->get('billing_address')" class="mt-1" />
                                </div>
                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1.5">City *</label>
                                        <input type="text"
                                               name="billing_city"
                                               value="{{ old('billing_city') }}"
                                               required
                                               class="w-full px-4 py-2.5 text-sm bg-white border border-gray-300 rounded-lg placeholder:text-gray-400 focus:border-primary focus:ring-1 focus:ring-primary hover:border-gray-400 transition-all"
                                               placeholder="Johannesburg">
                                        <x-input-error :messages="$errors->get('billing_city')" class="mt-1" />
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Province *</label>
                                        <select name="billing_state"
                                                required
                                                class="w-full px-4 py-2.5 text-sm bg-white border border-gray-300 rounded-lg focus:border-primary focus:ring-1 focus:ring-primary hover:border-gray-400 transition-all">
                                            <option value="">Select Province</option>
                                            <option value="Gauteng">Gauteng</option>
                                            <option value="Western Cape">Western Cape</option>
                                            <option value="KwaZulu-Natal">KwaZulu-Natal</option>
                                            <option value="Eastern Cape">Eastern Cape</option>
                                            <option value="Free State">Free State</option>
                                            <option value="Limpopo">Limpopo</option>
                                            <option value="Mpumalanga">Mpumalanga</option>
                                            <option value="North West">North West</option>
                                            <option value="Northern Cape">Northern Cape</option>
                                        </select>
                                        <x-input-error :messages="$errors->get('billing_state')" class="mt-1" />
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Postcode *</label>
                                        <input type="text"
                                               name="billing_zip"
                                               value="{{ old('billing_zip') }}"
                                               required
                                               class="w-full px-4 py-2.5 text-sm bg-white border border-gray-300 rounded-lg placeholder:text-gray-400 focus:border-primary focus:ring-1 focus:ring-primary hover:border-gray-400 transition-all"
                                               placeholder="2000">
                                        <x-input-error :messages="$errors->get('billing_zip')" class="mt-1" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Payment Method --}}
                        <div class="bg-white rounded-xl border border-gray-200 p-6"
                             x-data="cardForm()"
                             x-init="$watch('payment_method', val => { if (val !== 'card') { cardNumber = ''; cardName = ''; cardExpiry = ''; cardCvv = ''; } })">
                            <h2 class="text-lg font-semibold text-gray-900 mb-4">Payment Method</h2>

                            {{-- Hidden input for the actual payment_method value --}}
                            <input type="hidden" name="payment_method" x-model="payment_method">

                            <div class="space-y-3">
                                {{-- Credit / Debit Card (on-site entry) --}}
                                <div class="rounded-lg border transition-all duration-200"
                                     :class="payment_method === 'card' ? 'border-primary ring-1 ring-primary' : 'border-gray-200'">
                                    <label class="flex items-start gap-3 p-4 cursor-pointer">
                                        <input type="radio"
                                               value="card"
                                               class="mt-1 text-primary focus:ring-primary"
                                               x-model="payment_method">
                                        <div class="flex-1">
                                            <div class="flex items-center gap-2 flex-wrap">
                                                <span class="text-sm font-medium text-gray-900">Credit / Debit Card</span>
                                                <span class="text-xs px-2 py-0.5 bg-blue-100 text-blue-700 rounded font-medium">
                                                    <span x-text="cardTypeName"></span>
                                                </span>
                                            </div>
                                            <p class="text-xs text-gray-500 mt-1">Enter your card details below to pay securely</p>
                                        </div>
                                    </label>

                                    <div x-show="payment_method === 'card'"
                                         x-collapse.duration.200ms
                                         class="px-4 pb-4 border-t border-gray-100 pt-4">
                                        <div class="space-y-3">
                                            {{-- Cardholder Name --}}
                                            <div>
                                                <label class="block text-xs font-medium text-gray-600 mb-1">Cardholder Name</label>
                                                <input type="text"
                                                       x-model="cardName"
                                                       placeholder="John Doe"
                                                       class="w-full px-3 py-2 text-sm bg-white border border-gray-300 rounded-lg placeholder:text-gray-400 focus:border-primary focus:ring-1 focus:ring-primary transition-all">
                                            </div>

                                            {{-- Card Number with brand detection --}}
                                            <div>
                                                <label class="block text-xs font-medium text-gray-600 mb-1">Card Number</label>
                                                <div class="relative">
                                                    <input type="text"
                                                           x-model="formattedNumber"
                                                           x-on:input="cardNumber = $event.target.value.replace(/\s/g, '')"
                                                           placeholder="1234 5678 9012 3456"
                                                           maxlength="19"
                                                           class="w-full px-3 py-2 text-sm bg-white border border-gray-300 rounded-lg placeholder:text-gray-400 focus:border-primary focus:ring-1 focus:ring-primary transition-all pr-10 font-mono tracking-wider">
                                                    <div class="absolute right-3 top-1/2 -translate-y-1/2 flex items-center gap-1">
                                                        <template x-if="detectedBrand?.icon">
                                                            <img :src="detectedBrand.icon" :alt="detectedBrand.name" class="h-5 object-contain">
                                                        </template>
                                                        <template x-if="detectedBrand && !detectedBrand.icon">
                                                            <span class="text-[10px] font-bold text-gray-400 uppercase" x-text="detectedBrand.name.substring(0, 4)"></span>
                                                        </template>
                                                    </div>
                                                </div>
                                                <div class="flex items-center gap-2 mt-1.5">
                                                    <img src="{{ asset('images/payments/visa.svg') }}" alt="Visa" class="h-4 object-contain opacity-40"
                                                         :class="{ 'opacity-100': detectedBrand?.name === 'Visa', 'opacity-40': detectedBrand && detectedBrand.name !== 'Visa' }">
                                                    <img src="{{ asset('images/payments/mastercard.svg') }}" alt="Mastercard" class="h-4 object-contain opacity-40"
                                                         :class="{ 'opacity-100': detectedBrand?.name === 'Mastercard', 'opacity-40': detectedBrand && detectedBrand.name !== 'Mastercard' }">
                                                    <span class="text-[10px] text-gray-400 opacity-40"
                                                          :class="{ 'opacity-100 font-bold text-gray-700': detectedBrand?.name === 'American Express', 'opacity-40': detectedBrand && detectedBrand.name !== 'American Express' }">AMEX</span>
                                                    <span class="text-[10px] text-gray-400 opacity-40"
                                                          :class="{ 'opacity-100 font-bold text-gray-700': detectedBrand?.name === 'Discover', 'opacity-40': detectedBrand && detectedBrand.name !== 'Discover' }">DISC</span>
                                                </div>
                                            </div>

                                            {{-- Expiry + CVV --}}
                                            <div class="grid grid-cols-2 gap-3">
                                                <div>
                                                    <label class="block text-xs font-medium text-gray-600 mb-1">Expiry Date</label>
                                                    <input type="text"
                                                           x-model="expiryFormatted"
                                                           x-on:input="cardExpiry = $event.target.value.replace(/\D/g, '')"
                                                           placeholder="MM / YY"
                                                           maxlength="7"
                                                           class="w-full px-3 py-2 text-sm bg-white border border-gray-300 rounded-lg placeholder:text-gray-400 focus:border-primary focus:ring-1 focus:ring-primary transition-all font-mono">
                                                </div>
                                                <div>
                                                    <label class="block text-xs font-medium text-gray-600 mb-1">CVV</label>
                                                    <input type="text"
                                                           x-model="cardCvv"
                                                           x-on:input="cardCvv = $event.target.value.replace(/\D/g, '').substring(0, 4)"
                                                           placeholder="123"
                                                           maxlength="4"
                                                           class="w-full px-3 py-2 text-sm bg-white border border-gray-300 rounded-lg placeholder:text-gray-400 focus:border-primary focus:ring-1 focus:ring-primary transition-all font-mono">
                                                </div>
                                            </div>

                                            <p class="text-[10px] text-gray-400 flex items-center gap-1">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                                </svg>
                                                Your card details are encrypted and processed securely
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                {{-- Ozow --}}
                                <label class="flex items-start gap-3 p-4 rounded-lg border transition-all duration-200 cursor-pointer bg-white"
                                       :class="payment_method === 'ozow' ? 'border-primary ring-1 ring-primary' : 'border-gray-200 hover:border-gray-300'">
                                    <input type="radio"
                                           value="ozow"
                                           class="mt-1 text-primary focus:ring-primary"
                                           x-model="payment_method">
                                    <div class="flex-1">
                                        <div class="flex items-center gap-2">
                                            <span class="text-sm font-medium text-gray-900">Instant EFT</span>
                                            <span class="text-xs px-2 py-0.5 bg-blue-100 text-blue-700 rounded font-medium">Ozow</span>
                                        </div>
                                        <p class="text-xs text-gray-500 mt-1">Pay instantly from your bank account — no card details needed</p>
                                        <div class="flex items-center gap-2 mt-2">
                                            <img src="{{ asset('images/payments/ozow.svg') }}" alt="Ozow" class="h-5 object-contain opacity-60">
                                        </div>
                                    </div>
                                </label>

                                {{-- PayJustNow --}}
                                <label class="flex items-start gap-3 p-4 rounded-lg border transition-all duration-200 cursor-pointer bg-white"
                                       :class="payment_method === 'payjustnow' ? 'border-primary ring-1 ring-primary' : 'border-gray-200 hover:border-gray-300'">
                                    <input type="radio"
                                           value="payjustnow"
                                           class="mt-1 text-primary focus:ring-primary"
                                           x-model="payment_method">
                                    <div class="flex-1">
                                        <div class="flex items-center gap-2">
                                            <span class="text-sm font-medium text-gray-900">Pay in 3 Installments</span>
                                            <span class="text-xs px-2 py-0.5 bg-orange-100 text-orange-700 rounded font-medium">PayJustNow</span>
                                        </div>
                                        <p class="text-xs text-gray-500 mt-1">Split your payment into 3 interest-free installments of <strong>R{{ number_format($total / 3, 2) }}</strong></p>
                                    </div>
                                </label>

                                {{-- Bank Transfer --}}
                                <label class="flex items-start gap-3 p-4 rounded-lg border transition-all duration-200 cursor-pointer bg-white"
                                       :class="payment_method === 'bank_transfer' ? 'border-primary ring-1 ring-primary' : 'border-gray-200 hover:border-gray-300'">
                                    <input type="radio"
                                           value="bank_transfer"
                                           class="mt-1 text-primary focus:ring-primary"
                                           x-model="payment_method">
                                    <div class="flex-1">
                                        <div class="flex items-center gap-2">
                                            <span class="text-sm font-medium text-gray-900">EFT / Bank Transfer</span>
                                            <span class="text-xs px-2 py-0.5 bg-purple-100 text-purple-700 rounded font-medium">Manual EFT</span>
                                        </div>
                                        <p class="text-xs text-gray-500 mt-1">Pay directly into our bank account. Order will be processed once payment clears.</p>
                                        <div class="flex items-center gap-2 mt-2">
                                            <img src="{{ asset('images/payments/eft.svg') }}" alt="EFT" class="h-5 object-contain opacity-60">
                                        </div>
                                    </div>
                                </label>


                            </div>
                            <x-input-error :messages="$errors->get('payment_method')" class="mt-3" />
                        </div>

                        {{-- Order Notes --}}
                        <div class="bg-white rounded-xl border border-gray-200 p-6">
                            <h2 class="text-lg font-semibold text-gray-900 mb-4">Order Notes</h2>
                            <textarea name="notes"
                                      rows="3"
                                      class="w-full px-4 py-2.5 text-sm bg-white border border-gray-300 rounded-lg placeholder:text-gray-400 focus:border-primary focus:ring-1 focus:ring-primary hover:border-gray-400 transition-all"
                                      placeholder="Special instructions or notes for your order (optional)">{{ old('notes') }}</textarea>
                        </div>

                        <div class="flex flex-col sm:flex-row gap-4">
                            <a href="{{ route('cart.index') }}" 
                               class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-white text-gray-700 text-base font-medium rounded-lg border border-gray-300 hover:bg-gray-50 hover:border-gray-400 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>
                                Back to Cart
                            </a>
                            <button type="submit" 
                                    class="inline-flex items-center justify-center gap-2 px-8 py-3 bg-primary text-white text-base font-medium rounded-lg hover:bg-primary-dark transition-colors flex-1 sm:flex-none">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                                Place Order - R{{ number_format($total, 2) }}
                            </button>
                        </div>
                    </div>

                    {{-- Order Summary --}}
                    <div>
                        <div class="bg-gray-50 rounded-xl border border-gray-200 p-6 space-y-4 sticky top-24">
                            <h3 class="text-lg font-semibold text-gray-900">Order Summary</h3>
                            
                            {{-- Cart Items Preview --}}
                            <div class="space-y-3 max-h-60 overflow-y-auto">
                                @foreach ($items as $item)
                                    <div class="flex items-center gap-3">
                                        <div class="w-12 h-12 rounded-lg bg-gray-100 overflow-hidden shrink-0 border border-gray-200">
                                            <img src="{{ $item->product?->primaryImage?->image_url ?? asset('storage/images/products/pos-system-fallback.jpg') }}"
                                                 alt="{{ $item->product?->name }}"
                                                 class="w-full h-full object-cover"
                                                 onerror="this.src='{{ asset('storage/images/products/pos-system-fallback.jpg') }}'">
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm text-gray-900 truncate">{{ $item->product?->name ?? 'Product' }}</p>
                                            <p class="text-xs text-gray-500">Qty: {{ $item->quantity }}</p>
                                        </div>
                                        <p class="text-sm font-medium text-gray-900">R{{ number_format((float)($item->price * $item->quantity), 2) }}</p>
                                    </div>
                                @endforeach
                            </div>

                            {{-- Totals --}}
                            <div class="border-t border-gray-200 pt-4 space-y-3 text-sm">
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-500">Subtotal</span>
                                    <span class="font-medium text-gray-900">R{{ number_format($subtotal, 2) }}</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-500">Shipping</span>
                                    <span class="font-medium text-green-600">Free</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-gray-500">Tax (15% VAT)</span>
                                    <span class="font-medium text-gray-900">R{{ number_format($tax, 2) }}</span>
                                </div>
                            </div>

                            <div class="border-t border-gray-200 pt-4">
                                <div class="flex items-center justify-between">
                                    <span class="text-base font-semibold text-gray-900">Total</span>
                                    <span class="text-xl font-bold text-primary">R{{ number_format($total, 2) }}</span>
                                </div>
                            </div>

                            {{-- Payment Icons --}}
                            <div class="flex items-center justify-center gap-3 pt-2 border-t border-gray-200">
                                <img src="{{ asset('images/payments/visa.svg') }}" alt="Visa" class="h-7 object-contain">
                                <img src="{{ asset('images/payments/mastercard.svg') }}" alt="Mastercard" class="h-7 object-contain">
                                <img src="{{ asset('images/payments/ozow.svg') }}" alt="Ozow" class="h-7 object-contain">
                                <img src="{{ asset('images/payments/eft.svg') }}" alt="EFT" class="h-7 object-contain">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        @else
            {{-- Empty Cart --}}
            <div class="text-center py-16">
                <svg class="w-20 h-20 mx-auto text-gray-300 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Your cart is empty</h3>
                <p class="text-sm text-gray-500 mb-8 max-w-md mx-auto">
                    You need to add products to your cart before you can checkout.
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
