<x-layouts.app title="Shipping Information">
    {{-- Hero Section --}}
    <section class="relative bg-gradient-to-br from-primary-dark via-primary to-primary-light py-20 overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-10 left-10 w-32 h-32 bg-white rounded-full blur-3xl"></div>
            <div class="absolute bottom-10 right-10 w-48 h-48 bg-accent rounded-full blur-3xl"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Shipping Information</h1>
                <p class="text-white/80 text-lg max-w-2xl mx-auto">
                    Fast, reliable delivery across South Africa for all your POS hardware and software
                </p>
            </div>
        </div>
    </section>

    {{-- Shipping Content --}}
    <section class="py-16 bg-white">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <div class="bg-gray-50 rounded-2xl p-6 text-center border border-gray-100">
                    <div class="w-16 h-16 bg-success/10 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Free Delivery</h3>
                    <p class="text-sm text-gray-600">Orders over R5,000</p>
                </div>
                <div class="bg-gray-50 rounded-2xl p-6 text-center border border-gray-100">
                    <div class="w-16 h-16 bg-primary/10 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Fast Delivery</h3>
                    <p class="text-sm text-gray-600">2-5 business days</p>
                </div>
                <div class="bg-gray-50 rounded-2xl p-6 text-center border border-gray-100">
                    <div class="w-16 h-16 bg-accent/10 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 mb-2">Track Order</h3>
                    <p class="text-sm text-gray-600">Real-time tracking</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="space-y-6">
                    <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100">
                        <h2 class="text-xl font-bold text-gray-900 mb-6">Delivery Options</h2>
                        <div class="space-y-5">
                            <div class="flex items-start gap-4 pb-5 border-b border-gray-200">
                                <div class="w-12 h-12 bg-success/10 rounded-xl flex items-center justify-center shrink-0">
                                    <svg class="w-6 h-6 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center justify-between gap-4">
                                        <h3 class="font-bold text-gray-900">Free Delivery</h3>
                                        <span class="text-sm font-bold text-success bg-success/10 px-2.5 py-1 rounded-lg">FREE</span>
                                    </div>
                                    <p class="text-sm text-gray-600 mt-1">2-5 business days to major metros</p>
                                    <p class="text-sm text-gray-500 mt-0.5">Available on orders over R5,000</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4 pb-5 border-b border-gray-200">
                                <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center shrink-0">
                                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center justify-between gap-4">
                                        <h3 class="font-bold text-gray-900">Standard Delivery</h3>
                                        <span class="text-sm font-bold text-gray-900">R150</span>
                                    </div>
                                    <p class="text-sm text-gray-600 mt-1">3-7 business days</p>
                                    <p class="text-sm text-gray-500 mt-0.5">Flat rate for orders under R5,000</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 bg-accent/10 rounded-xl flex items-center justify-center shrink-0">
                                    <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center justify-between gap-4">
                                        <h3 class="font-bold text-gray-900">Express Delivery</h3>
                                        <span class="text-sm font-bold text-gray-600">Quote</span>
                                    </div>
                                    <p class="text-sm text-gray-600 mt-1">Next-day delivery to major metros</p>
                                    <p class="text-sm text-gray-500 mt-0.5">Available on request. Contact us for a quote.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100">
                        <h2 class="text-xl font-bold text-gray-900 mb-4">Shipping Policy</h2>
                        <ul class="space-y-3">
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-primary mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="text-sm text-gray-600">Orders processed within 1-2 business days after payment confirmation</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-primary mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="text-sm text-gray-600">We ship to all provinces in South Africa</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-primary mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="text-sm text-gray-600">Tracking information sent via email once your order ships</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-primary mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="text-sm text-gray-600">Signature required on delivery for orders over R2,000</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-primary mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="text-sm text-gray-600">International shipping is not currently available</span>
                            </li>
                        </ul>
                    </div>

                    <div class="bg-primary/5 rounded-2xl p-6 border border-primary/20">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-primary/20 rounded-xl flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-bold text-gray-900 mb-2">Have questions about shipping?</h3>
                                <p class="text-sm text-gray-600 mb-4">Contact our team for more information about delivery options and timelines.</p>
                                <a href="{{ route('pages.contact') }}" class="inline-flex items-center gap-2 px-4 py-2.5 bg-primary text-white font-semibold rounded-xl hover:bg-primary-dark transition-colors text-sm">
                                    Contact Us
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>
