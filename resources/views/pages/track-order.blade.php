<x-layouts.app title="Track Your Order">
    <section class="relative bg-gradient-to-br from-gray-900 via-primary-dark to-gray-900 py-20 overflow-hidden">
        <div class="absolute inset-0">
            <div class="absolute top-10 left-10 w-72 h-72 bg-primary/20 rounded-full blur-[100px]"></div>
            <div class="absolute bottom-10 right-10 w-96 h-96 bg-accent/10 rounded-full blur-[120px]"></div>
            <div class="absolute inset-0 opacity-[0.03]" style="background-image: repeating-linear-gradient(0deg, transparent, transparent 40px, rgba(255,255,255,.1) 40px, rgba(255,255,255,.1) 41px), repeating-linear-gradient(90deg, transparent, transparent 40px, rgba(255,255,255,.1) 40px, rgba(255,255,255,.1) 41px);"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center">
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-white/10 rounded-full text-white/70 text-xs font-semibold tracking-wider uppercase mb-4 border border-white/10">
                    <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                    Real-Time Tracking
                </div>
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Track Your Order</h1>
                <p class="text-white/70 text-lg max-w-2xl mx-auto">
                    Enter your order number or email to track your delivery in real-time
                </p>
            </div>
        </div>
    </section>

    <section class="py-16 bg-gray-50">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            @if (session('error'))
                <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl flex items-start gap-3">
                    <svg class="w-5 h-5 text-red-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <p class="text-sm text-red-700">{{ session('error') }}</p>
                </div>
            @endif

            <div class="bg-white rounded-3xl p-8 md:p-10 border border-gray-200 shadow-sm">
                <form method="POST" action="{{ route('pages.track-order.search') }}" class="space-y-6">
                    @csrf
                    <div>
                        <label class="block text-sm font-semibold text-gray-900 mb-2">Order Number or Email</label>
                        <div class="flex gap-3">
                            <input type="text"
                                   name="query"
                                   value="{{ old('query', $query ?? '') }}"
                                   placeholder="Enter your order number (e.g., DEN-...) or email"
                                   class="flex-1 px-4 py-3 bg-white border border-gray-300 rounded-xl text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all"
                                   required>
                            <button type="submit"
                                    class="px-6 py-3 bg-primary text-white font-semibold rounded-xl hover:bg-primary-dark transition-all duration-300 flex items-center gap-2 shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                                Track
                            </button>
                        </div>
                        @error('query')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </form>

                @isset($order)
                    <div class="mt-10 space-y-8">
                        <div class="bg-gradient-to-br from-gray-50 to-white rounded-2xl p-6 border border-gray-200">
                            <div class="flex flex-wrap items-center justify-between gap-4">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center">
                                        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Order Number</p>
                                        <p class="text-xl font-bold text-gray-900">{{ $order->order_number }}</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm text-gray-500">Order Date</p>
                                    <p class="text-base font-semibold text-gray-900">{{ $order->created_at->format('d M Y, H:i') }}</p>
                                </div>
                            </div>

                            <div class="flex flex-wrap items-center justify-between gap-4 mt-6 pt-6 border-t border-gray-200">
                                <div>
                                    <p class="text-sm text-gray-500">Customer</p>
                                    <p class="text-base font-semibold text-gray-900">{{ $order->billing_name }}</p>
                                    <p class="text-sm text-gray-500">{{ $order->billing_email }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm text-gray-500">Order Total</p>
                                    <p class="text-2xl font-bold text-primary">R{{ number_format($order->total, 2) }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="relative">
                            @foreach ($timeline as $index => $step)
                                <div class="flex gap-4 {{ !$loop->last ? 'mb-6' : '' }}">
                                    <div class="flex flex-col items-center">
                                        <div class="w-10 h-10 rounded-full flex items-center justify-center shrink-0 text-sm font-bold transition-all duration-300
                                            {{ $step['completed'] ? 'bg-green-500 text-white shadow-lg shadow-green-200' : ($step['current'] ? 'bg-primary text-white shadow-lg shadow-primary/30 animate-pulse' : 'bg-gray-100 text-gray-400 border-2 border-gray-200') }}">
                                            @if ($step['completed'])
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                                                </svg>
                                            @elseif ($step['current'])
                                                <span class="w-3 h-3 bg-white rounded-full"></span>
                                            @else
                                                {{ $index + 1 }}
                                            @endif
                                        </div>
                                        @if (!$loop->last)
                                            <div class="w-0.5 flex-1 min-h-[24px] {{ $step['completed'] ? 'bg-green-400' : 'bg-gray-200' }}"></div>
                                        @endif
                                    </div>
                                    <div class="flex-1 {{ !$loop->last ? 'pb-6' : '' }}">
                                        <h4 class="font-semibold {{ $step['current'] ? 'text-primary' : ($step['completed'] ? 'text-green-600' : 'text-gray-400') }}">
                                            {{ $step['title'] }}
                                        </h4>
                                        <p class="text-sm text-gray-500 mt-0.5">{{ $step['description'] }}</p>
                                        @if ($step['date'])
                                            <p class="text-xs text-gray-400 mt-1">{{ $step['date'] }}</p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        @if (in_array($order->status->value, ['cancelled', 'refunded']))
                            <div class="p-4 bg-red-50 border border-red-200 rounded-xl">
                                <div class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-red-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z" />
                                    </svg>
                                    <div>
                                        <p class="text-sm font-semibold text-red-800">
                                            This order has been {{ $order->status->label() }}
                                        </p>
                                        <p class="text-sm text-red-600 mt-1">Please contact us for more information about this order.</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="p-4 bg-amber-50 border border-amber-200 rounded-xl">
                            <div class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-amber-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <div>
                                    <p class="text-sm font-semibold text-gray-900">Need help with your order?</p>
                                    <p class="text-sm text-gray-600 mt-1">
                                        Contact us on WhatsApp at <strong>074 355 1336</strong> or email <strong>sales@dennyexpress.co.za</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endisset
            </div>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-8 text-center">Frequently Asked Questions</h2>
            <div class="space-y-4" x-data="{ open: 0 }">
                <div class="bg-gray-50 rounded-xl border border-gray-200 overflow-hidden">
                    <button class="w-full px-6 py-4 text-left flex items-center justify-between" @click="open = open === 1 ? 0 : 1">
                        <span class="font-semibold text-gray-900">How long does delivery take?</span>
                        <svg class="w-5 h-5 text-gray-400 transition-transform" :class="{ 'rotate-180': open === 1 }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open === 1" class="px-6 pb-4 text-sm text-gray-600">
                        Standard delivery takes 2-5 business days across South Africa. Express delivery is available for major cities within 1-2 business days.
                    </div>
                </div>
                <div class="bg-gray-50 rounded-xl border border-gray-200 overflow-hidden">
                    <button class="w-full px-6 py-4 text-left flex items-center justify-between" @click="open = open === 2 ? 0 : 2">
                        <span class="font-semibold text-gray-900">Where can I find my order number?</span>
                        <svg class="w-5 h-5 text-gray-400 transition-transform" :class="{ 'rotate-180': open === 2 }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open === 2" class="px-6 pb-4 text-sm text-gray-600">
                        Your order number was sent to your email when you placed the order. It starts with 'DEN-' followed by numbers and letters. You can also use your email address to track.
                    </div>
                </div>
                <div class="bg-gray-50 rounded-xl border border-gray-200 overflow-hidden">
                    <button class="w-full px-6 py-4 text-left flex items-center justify-between" @click="open = open === 3 ? 0 : 3">
                        <span class="font-semibold text-gray-900">What if my order is delayed?</span>
                        <svg class="w-5 h-5 text-gray-400 transition-transform" :class="{ 'rotate-180': open === 3 }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open === 3" class="px-6 pb-4 text-sm text-gray-600">
                        If your order is delayed beyond the estimated delivery time, please contact us on WhatsApp at 074 355 1336 and we'll investigate immediately.
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>
