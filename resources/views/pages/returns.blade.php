<x-layouts.app title="Returns & Exchanges">
    {{-- Hero Section --}}
    <section class="relative bg-gradient-to-br from-primary-dark via-primary to-primary-light py-20 overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-10 left-10 w-32 h-32 bg-white rounded-full blur-3xl"></div>
            <div class="absolute bottom-10 right-10 w-48 h-48 bg-accent rounded-full blur-3xl"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Returns &amp; Exchanges</h1>
                <p class="text-white/80 text-lg max-w-2xl mx-auto">
                    We want you to be completely satisfied with your purchase. If something isn't right, we're here to help.
                </p>
            </div>
        </div>
    </section>

    {{-- Returns Policy Cards --}}
    <section class="py-12 bg-white">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <div class="bg-success/5 border-2 border-success/20 rounded-2xl p-6 text-center">
                    <div class="w-16 h-16 bg-success/10 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">30 Days</h3>
                    <p class="text-sm text-gray-600">Hassle-free return period</p>
                </div>
                <div class="bg-primary/5 border-2 border-primary/20 rounded-2xl p-6 text-center">
                    <div class="w-16 h-16 bg-primary/10 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Easy Returns</h3>
                    <p class="text-sm text-gray-600">Simple online return process</p>
                </div>
                <div class="bg-accent/5 border-2 border-accent/20 rounded-2xl p-6 text-center">
                    <div class="w-16 h-16 bg-accent/10 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Full Refund</h3>
                    <p class="text-sm text-gray-600">Or exchange for another product</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Returns Content --}}
    <section class="py-8 bg-gray-50">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="space-y-6">
                    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
                        <h2 class="text-xl font-bold text-gray-900 mb-4">Return Requirements</h2>
                        <ul class="space-y-3">
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-success mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="text-gray-600 text-sm">Product must be in its original packaging</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-success mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="text-gray-600 text-sm">All accessories, manuals, and cables must be included</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-success mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="text-gray-600 text-sm">Product must be in like-new condition (no signs of use or damage)</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-success mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="text-gray-600 text-sm">Proof of purchase (order number) is required</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-success mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="text-gray-600 text-sm">Return shipping costs are covered by Denny Express for defective items</span>
                            </li>
                        </ul>
                    </div>

                    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
                        <h2 class="text-xl font-bold text-gray-900 mb-4">Refund Timeline</h2>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                                <div>
                                    <h4 class="font-semibold text-gray-900 text-sm">Credit/Debit Card</h4>
                                    <p class="text-xs text-gray-500">After we receive the return</p>
                                </div>
                                <span class="text-sm font-bold text-gray-900 bg-white px-3 py-1.5 rounded-lg border border-gray-200">5-10 days</span>
                            </div>
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                                <div>
                                    <h4 class="font-semibold text-gray-900 text-sm">EFT/Bank Transfer</h4>
                                    <p class="text-xs text-gray-500">After we receive the return</p>
                                </div>
                                <span class="text-sm font-bold text-gray-900 bg-white px-3 py-1.5 rounded-lg border border-gray-200">3-5 days</span>
                            </div>
                            <div class="flex items-center justify-between p-4 bg-primary/5 rounded-xl border border-primary/20">
                                <div>
                                    <h4 class="font-semibold text-gray-900 text-sm">Store Credit</h4>
                                    <p class="text-xs text-gray-500">Upon inspection approval</p>
                                </div>
                                <span class="text-sm font-bold text-primary bg-white px-3 py-1.5 rounded-lg border border-primary/30">Immediate</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
                        <h2 class="text-xl font-bold text-gray-900 mb-6">How to Initiate a Return</h2>
                        <div class="space-y-6">
                            <div class="flex gap-4">
                                <div class="w-10 h-10 bg-primary text-white text-sm font-bold rounded-xl flex items-center justify-center shrink-0">1</div>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-gray-900 text-sm mb-1">Contact Our Returns Team</h4>
                                    <p class="text-sm text-gray-600">Email returns@dennyexpress.co.za with your order number and reason for return</p>
                                </div>
                            </div>

                            <div class="w-full border-t border-dashed border-gray-200 ml-5"></div>

                            <div class="flex gap-4">
                                <div class="w-10 h-10 bg-primary text-white text-sm font-bold rounded-xl flex items-center justify-center shrink-0">2</div>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-gray-900 text-sm mb-1">Get Your RMA Number</h4>
                                    <p class="text-sm text-gray-600">Our team will provide you with a Return Merchandise Authorization (RMA) number</p>
                                </div>
                            </div>

                            <div class="w-full border-t border-dashed border-gray-200 ml-5"></div>

                            <div class="flex gap-4">
                                <div class="w-10 h-10 bg-primary text-white text-sm font-bold rounded-xl flex items-center justify-center shrink-0">3</div>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-gray-900 text-sm mb-1">Pack Securely</h4>
                                    <p class="text-sm text-gray-600">Pack the product securely in its original packaging with all accessories</p>
                                </div>
                            </div>

                            <div class="w-full border-t border-dashed border-gray-200 ml-5"></div>

                            <div class="flex gap-4">
                                <div class="w-10 h-10 bg-primary text-white text-sm font-bold rounded-xl flex items-center justify-center shrink-0">4</div>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-gray-900 text-sm mb-1">Ship It Back</h4>
                                    <p class="text-sm text-gray-600">Ship the product to the address provided by our returns team</p>
                                </div>
                            </div>

                            <div class="w-full border-t border-dashed border-gray-200 ml-5"></div>

                            <div class="flex gap-4">
                                <div class="w-10 h-10 bg-success text-white text-sm font-bold rounded-xl flex items-center justify-center shrink-0">5</div>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-gray-900 text-sm mb-1">Receive Refund or Exchange</h4>
                                    <p class="text-sm text-gray-600">Once received and inspected, your refund or exchange will be processed</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-primary/5 rounded-2xl p-6 border border-primary/20">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-primary/20 rounded-xl flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-bold text-gray-900 mb-2">Need to start a return?</h3>
                                <p class="text-sm text-gray-600 mb-4">Contact our returns team and we'll guide you through every step.</p>
                                <div class="flex flex-col sm:flex-row gap-3">
                                    <a href="{{ route('pages.contact') }}" class="inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-primary text-white font-semibold rounded-xl hover:bg-primary-dark transition-colors text-sm">
                                        Start a Return
                                    </a>
                                    <a href="mailto:returns@dennyexpress.co.za" class="inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-white text-gray-900 font-semibold rounded-xl hover:bg-gray-50 transition-colors text-sm border border-gray-200">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                        returns@dennyexpress.co.za
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>
