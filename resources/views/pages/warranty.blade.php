<x-layouts.app title="Warranty">
    {{-- Hero Section --}}
    <section class="relative bg-gradient-to-br from-primary-dark via-primary to-primary-light py-20 overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-10 left-10 w-32 h-32 bg-white rounded-full blur-3xl"></div>
            <div class="absolute bottom-10 right-10 w-48 h-48 bg-accent rounded-full blur-3xl"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Warranty Information</h1>
                <p class="text-white/80 text-lg max-w-2xl mx-auto">
                    At Denny Express, we stand behind the quality of every product we sell with our comprehensive warranty coverage
                </p>
            </div>
        </div>
    </section>

    {{-- Warranty Highlights --}}
    <section class="py-16 bg-white">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <div class="bg-primary/5 border-2 border-primary/20 rounded-2xl p-6 text-center">
                    <div class="w-16 h-16 bg-primary/10 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">18 Months</h3>
                    <p class="text-sm text-gray-600">Standard warranty coverage</p>
                </div>
                <div class="bg-accent/5 border-2 border-accent/20 rounded-2xl p-6 text-center">
                    <div class="w-16 h-16 bg-accent/10 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Quality Guaranteed</h3>
                    <p class="text-sm text-gray-600">All genuine products</p>
                </div>
                <div class="bg-success/5 border-2 border-success/20 rounded-2xl p-6 text-center">
                    <div class="w-16 h-16 bg-success/10 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">Hassle-Free</h3>
                    <p class="text-sm text-gray-600">Simple claims process</p>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="space-y-6">
                    <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100">
                        <h2 class="text-xl font-bold text-gray-900 mb-4">Standard 18-Month Warranty</h2>
                        <p class="text-gray-600 leading-relaxed mb-4">
                            All products purchased from Denny Express are covered by our standard 18-month warranty against manufacturing defects. This warranty reflects our confidence in the quality of our products and our commitment to your satisfaction.
                        </p>
                        <h3 class="font-semibold text-gray-900 mb-3">Coverage Includes:</h3>
                        <ul class="space-y-2">
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-success mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="text-gray-600 text-sm">Manufacturing defects in materials and workmanship</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-success mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="text-gray-600 text-sm">Component failures under normal use</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-success mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="text-gray-600 text-sm">Hardware malfunctions not caused by user error</span>
                            </li>
                        </ul>
                    </div>

                    <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100">
                        <h2 class="text-xl font-bold text-gray-900 mb-4">What is Not Covered</h2>
                        <ul class="space-y-2.5">
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-red-500 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                <span class="text-gray-600 text-sm">Damage caused by accidents, misuse, or improper installation</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-red-500 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                <span class="text-gray-600 text-sm">Normal wear and tear</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-red-500 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                <span class="text-gray-600 text-sm">Unauthorized modifications or repairs</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-red-500 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                <span class="text-gray-600 text-sm">Software or data loss</span>
                            </li>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-red-500 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                <span class="text-gray-600 text-sm">Consumable items (cables, batteries, etc.)</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm">
                        <h2 class="text-xl font-bold text-gray-900 mb-6">Warranty Claim Process</h2>
                        <div class="space-y-6">
                            <div class="flex gap-4">
                                <div class="w-10 h-10 bg-primary text-white text-sm font-bold rounded-xl flex items-center justify-center shrink-0">1</div>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-gray-900 text-sm mb-1">Contact Support</h4>
                                    <p class="text-sm text-gray-600">Reach out to our support team with your order number and a detailed description of the issue</p>
                                </div>
                            </div>

                            <div class="w-full border-t border-dashed border-gray-200 ml-5"></div>

                            <div class="flex gap-4">
                                <div class="w-10 h-10 bg-primary text-white text-sm font-bold rounded-xl flex items-center justify-center shrink-0">2</div>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-gray-900 text-sm mb-1">Claim Assessment</h4>
                                    <p class="text-sm text-gray-600">Our team will assess your claim and may request additional information, photos, or troubleshooting steps</p>
                                </div>
                            </div>

                            <div class="w-full border-t border-dashed border-gray-200 ml-5"></div>

                            <div class="flex gap-4">
                                <div class="w-10 h-10 bg-primary text-white text-sm font-bold rounded-xl flex items-center justify-center shrink-0">3</div>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-gray-900 text-sm mb-1">Return Instructions</h4>
                                    <p class="text-sm text-gray-600">If applicable, we'll provide return instructions and may cover return shipping costs for defective items</p>
                                </div>
                            </div>

                            <div class="w-full border-t border-dashed border-gray-200 ml-5"></div>

                            <div class="flex gap-4">
                                <div class="w-10 h-10 bg-primary text-white text-sm font-bold rounded-xl flex items-center justify-center shrink-0">4</div>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-gray-900 text-sm mb-1">Inspection &amp; Resolution</h4>
                                    <p class="text-sm text-gray-600">We'll inspect, repair, or replace the product within 5-10 business days of receiving it</p>
                                </div>
                            </div>

                            <div class="w-full border-t border-dashed border-gray-200 ml-5"></div>

                            <div class="flex gap-4">
                                <div class="w-10 h-10 bg-success text-white text-sm font-bold rounded-xl flex items-center justify-center shrink-0">5</div>
                                <div class="flex-1">
                                    <h4 class="font-semibold text-gray-900 text-sm mb-1">Resolution Complete</h4>
                                    <p class="text-sm text-gray-600">You'll be notified once the process is complete with tracking for your replacement or repaired item</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-primary/5 rounded-2xl p-6 border border-primary/20">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-primary/20 rounded-xl flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-bold text-gray-900 mb-2">Need to make a warranty claim?</h3>
                                <p class="text-sm text-gray-600 mb-4">Contact our warranty support team and we'll guide you through every step of the process.</p>
                                <div class="flex flex-col sm:flex-row gap-3">
                                    <a href="{{ route('pages.contact') }}" class="inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-primary text-white font-semibold rounded-xl hover:bg-primary-dark transition-colors text-sm">
                                        Contact Support
                                    </a>
                                    <a href="tel:0743551336" class="inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-white text-gray-900 font-semibold rounded-xl hover:bg-gray-50 transition-colors text-sm border border-gray-200">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>
                                        074 355 1336
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
