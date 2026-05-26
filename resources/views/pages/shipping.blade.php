<x-layouts.app title="Shipping Information">
    <x-partials.breadcrumbs :items="[['label' => 'Shipping', 'url' => '#']]" />

    <div class="container-custom pb-12">
        <div class="max-w-3xl mx-auto">
            <h1 class="text-3xl md:text-4xl font-bold text-primary-navy mb-4">Shipping Information</h1>
            <p class="text-medium-gray mb-8">We deliver across South Africa with fast, reliable shipping options.</p>

            <div class="space-y-6">
                <div class="card p-6">
                    <h2 class="text-lg font-semibold text-dark-charcoal mb-3">Delivery Options</h2>
                    <div class="space-y-4">
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 bg-success/10 rounded-lg flex items-center justify-center shrink-0 mt-0.5">
                                <svg class="w-4 h-4 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-sm font-semibold text-dark-charcoal">Free Delivery</h3>
                                <p class="text-sm text-medium-gray">On all orders over R5,000. Delivery within 2-5 business days to major metros.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 bg-primary-blue/10 rounded-lg flex items-center justify-center shrink-0 mt-0.5">
                                <svg class="w-4 h-4 text-primary-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-sm font-semibold text-dark-charcoal">Standard Delivery</h3>
                                <p class="text-sm text-medium-gray">R150 flat rate for orders under R5,000. Delivery within 3-7 business days.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 bg-warning/10 rounded-lg flex items-center justify-center shrink-0 mt-0.5">
                                <svg class="w-4 h-4 text-warning" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-sm font-semibold text-dark-charcoal">Express Delivery</h3>
                                <p class="text-sm text-medium-gray">Available on request. Next-day delivery to major metros. Contact us for a quote.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card p-6">
                    <h2 class="text-lg font-semibold text-dark-charcoal mb-3">Shipping Policy</h2>
                    <ul class="text-sm text-medium-gray space-y-2 list-disc pl-5">
                        <li>Orders are processed within 1-2 business days after payment confirmation</li>
                        <li>We ship to all provinces in South Africa</li>
                        <li>Tracking information is provided via email once your order ships</li>
                        <li>Signature may be required on delivery for orders over R2,000</li>
                        <li>International shipping is not currently available</li>
                    </ul>
                </div>

                <div class="bg-primary-blue/5 rounded-xl p-6 border border-primary-blue/10">
                    <h3 class="text-sm font-semibold text-primary-blue mb-2">Have questions about shipping?</h3>
                    <p class="text-sm text-medium-gray mb-4">Contact our team for more information about delivery options and timelines.</p>
                    <a href="{{ route('pages.contact') }}" class="btn-primary text-sm">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
