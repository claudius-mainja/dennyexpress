<x-layouts.app title="Terms & Conditions">
    <section class="relative min-h-[40dvh] flex items-center overflow-hidden" style="background: linear-gradient(135deg, #020617 0%, #1e293b 40%, #334155 70%, #1e293b 100%);">
        <div class="absolute inset-0 opacity-30">
            <div class="absolute top-0 right-0 w-48 sm:w-96 h-48 sm:h-96 bg-primary rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-48 sm:w-72 h-48 sm:h-72 bg-accent rounded-full blur-3xl"></div>
        </div>
        <div class="absolute inset-0 opacity-10">
            <div class="w-full h-full" style="background-image: linear-gradient(rgba(255,255,255,0.1) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.1) 1px, transparent 1px); background-size: 50px 50px;"></div>
        </div>
        <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="text-center">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-primary/20 backdrop-blur-sm border border-primary/30 rounded-full mb-4">
                    <span class="w-2 h-2 bg-accent rounded-full animate-pulse"></span>
                    <span class="text-xs sm:text-sm font-medium text-white">Legal</span>
                </div>
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white mb-4 uppercase tracking-tight">Terms &amp; Conditions</h1>
                <p class="text-gray-400 text-sm sm:text-lg max-w-2xl mx-auto font-medium">
                    Please read these terms carefully before using our website or purchasing our products.
                </p>
            </div>
        </div>
    </section>

    <section class="py-10 sm:py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-4 sm:mb-6">
                <p class="text-xs sm:text-sm text-gray-500">Last updated: January 2025</p>
            </div>

            <div class="space-y-6 sm:space-y-8">
                <div class="p-4 sm:p-6 bg-white rounded-2xl border border-gray-200 hover:shadow-lg transition-all">
                    <h2 class="text-lg sm:text-2xl font-black text-gray-900 uppercase mb-3 sm:mb-4">1. Introduction</h2>
                    <p class="text-sm sm:text-base text-gray-600 leading-relaxed mb-3">Welcome to Denny Express. These terms and conditions govern your use of our website and the purchase of products from us. By using our website and purchasing our products, you agree to be bound by these terms and conditions.</p>
                    <p class="text-sm sm:text-base text-gray-600 leading-relaxed">Denny Express is a registered business in South Africa specializing in POS systems, IT hardware, and related services.</p>
                </div>

                <div class="p-4 sm:p-6 bg-white rounded-2xl border border-gray-200 hover:shadow-lg transition-all">
                    <h2 class="text-lg sm:text-2xl font-black text-gray-900 uppercase mb-3 sm:mb-4">2. Products &amp; Pricing</h2>
                    <p class="text-sm sm:text-base text-gray-600 leading-relaxed mb-3">All product prices are listed in South African Rand (ZAR) and include VAT where applicable. Prices are subject to change without prior notice. We reserve the right to modify or discontinue products at any time.</p>
                    <p class="text-sm sm:text-base text-gray-600 leading-relaxed">Product images are for illustration purposes only. While we strive for accuracy, actual products may vary slightly from images shown.</p>
                </div>

                <div class="p-4 sm:p-6 bg-white rounded-2xl border border-gray-200 hover:shadow-lg transition-all">
                    <h2 class="text-lg sm:text-2xl font-black text-gray-900 uppercase mb-3 sm:mb-4">3. Orders &amp; Payment</h2>
                    <p class="text-sm sm:text-base text-gray-600 leading-relaxed mb-3">By placing an order, you agree to provide accurate and complete information. We accept various payment methods including EFT, credit/debit cards, and cash deposits. Payment must be received in full before products are dispatched.</p>
                    <p class="text-sm sm:text-base text-gray-600 leading-relaxed">We reserve the right to cancel any order if fraudulent activity is suspected or if product availability issues arise.</p>
                </div>

                <div class="p-4 sm:p-6 bg-white rounded-2xl border border-gray-200 hover:shadow-lg transition-all">
                    <h2 class="text-lg sm:text-2xl font-black text-gray-900 uppercase mb-3 sm:mb-4">4. Shipping &amp; Delivery</h2>
                    <p class="text-sm sm:text-base text-gray-600 leading-relaxed mb-3">Delivery times are estimates and not guaranteed. We are not responsible for delays caused by third-party couriers or circumstances beyond our control. Risk of loss passes to you upon delivery.</p>
                    <p class="text-sm sm:text-base text-gray-600 leading-relaxed">Please refer to our <a href="{{ route('pages.shipping') }}" class="text-primary hover:text-primary-dark underline font-semibold">Shipping Policy</a> for detailed information.</p>
                </div>

                <div class="p-4 sm:p-6 bg-white rounded-2xl border border-gray-200 hover:shadow-lg transition-all">
                    <h2 class="text-lg sm:text-2xl font-black text-gray-900 uppercase mb-3 sm:mb-4">5. Returns &amp; Refunds</h2>
                    <p class="text-sm sm:text-base text-gray-600 leading-relaxed mb-3">Our returns policy is outlined in our <a href="{{ route('pages.returns') }}" class="text-primary hover:text-primary-dark underline font-semibold">Returns Policy</a>. We encourage you to review this before making a purchase.</p>
                    <p class="text-sm sm:text-base text-gray-600 leading-relaxed">All return requests must be initiated within 14 days of delivery, subject to our eligibility criteria.</p>
                </div>

                <div class="p-4 sm:p-6 bg-white rounded-2xl border border-gray-200 hover:shadow-lg transition-all">
                    <h2 class="text-lg sm:text-2xl font-black text-gray-900 uppercase mb-3 sm:mb-4">6. Warranty</h2>
                    <p class="text-sm sm:text-base text-gray-600 leading-relaxed">All hardware products come with an 18-month warranty as detailed in our <a href="{{ route('pages.warranty') }}" class="text-primary hover:text-primary-dark underline font-semibold">Warranty Policy</a>. This warranty covers manufacturing defects under normal use conditions.</p>
                </div>

                <div class="p-4 sm:p-6 bg-white rounded-2xl border border-gray-200 hover:shadow-lg transition-all">
                    <h2 class="text-lg sm:text-2xl font-black text-gray-900 uppercase mb-3 sm:mb-4">7. Limitation of Liability</h2>
                    <p class="text-sm sm:text-base text-gray-600 leading-relaxed">Denny Express shall not be liable for any indirect, incidental, or consequential damages arising from the use or inability to use our products. Our total liability shall not exceed the purchase price of the product in question.</p>
                </div>

                <div class="p-4 sm:p-6 bg-white rounded-2xl border border-gray-200 hover:shadow-lg transition-all">
                    <h2 class="text-lg sm:text-2xl font-black text-gray-900 uppercase mb-3 sm:mb-4">8. Intellectual Property</h2>
                    <p class="text-sm sm:text-base text-gray-600 leading-relaxed">All content on this website, including text, graphics, logos, and images, is the property of Denny Express and is protected by applicable intellectual property laws.</p>
                </div>

                <div class="p-4 sm:p-6 bg-white rounded-2xl border border-gray-200 hover:shadow-lg transition-all">
                    <h2 class="text-lg sm:text-2xl font-black text-gray-900 uppercase mb-3 sm:mb-4">9. Contact Information</h2>
                    <p class="text-sm sm:text-base text-gray-600 leading-relaxed">If you have any questions about these terms, please contact us at:</p>
                    <ul class="mt-3 space-y-2 text-sm sm:text-base text-gray-600">
                        <li><strong>Email:</strong> sales@dennyexpress.co.za</li>
                        <li><strong>Phone:</strong> 074 355 1336</li>
                        <li><strong>WhatsApp:</strong> 074 355 1336</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>