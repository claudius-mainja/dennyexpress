<x-layouts.app title="Support">
    <x-partials.breadcrumbs :items="[['label' => 'Support', 'url' => '#']]" />

    <div class="container-custom pb-12">
        <div class="max-w-3xl mx-auto">
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-primary-navy mb-4">Technical Support</h1>
                <p class="text-medium-gray">Our team of certified engineers is here to help you with product selection, configuration, and troubleshooting.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
                <div class="card p-6 text-center">
                    <div class="w-12 h-12 bg-primary-blue/10 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-primary-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-sm font-semibold text-dark-charcoal mb-1">Email Support</h3>
                    <p class="text-xs text-medium-gray mb-3">Get answers within 24 hours</p>
                    <a href="mailto:support@dennyexpress.co.za" class="text-sm text-primary-blue hover:text-accent-blue font-medium">support@dennyexpress.co.za</a>
                </div>
                <div class="card p-6 text-center">
                    <div class="w-12 h-12 bg-primary-blue/10 rounded-xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6 text-primary-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                    </div>
                    <h3 class="text-sm font-semibold text-dark-charcoal mb-1">Phone Support</h3>
                    <p class="text-xs text-medium-gray mb-3">Mon-Fri, 8AM-5PM</p>
                    <a href="tel:+27112345678" class="text-sm text-primary-blue hover:text-accent-blue font-medium">+27 11 234 5678</a>
                </div>
            </div>

            <div class="card p-6">
                <h2 class="text-lg font-semibold text-dark-charcoal mb-4">Support Request Form</h2>
                <form class="space-y-4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-dark-charcoal mb-1">Name *</label>
                            <input type="text" class="input-field" placeholder="Your name">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-dark-charcoal mb-1">Email *</label>
                            <input type="email" class="input-field" placeholder="your@email.com">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-dark-charcoal mb-1">Order Number</label>
                        <input type="text" class="input-field" placeholder="DENNY-2024-...">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-dark-charcoal mb-1">Subject *</label>
                        <select class="input-field">
                            <option>Product Inquiry</option>
                            <option>Technical Support</option>
                            <option>Warranty Claim</option>
                            <option>Order Issue</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-dark-charcoal mb-1">Message *</label>
                        <textarea rows="4" class="input-field" placeholder="Describe your issue in detail..."></textarea>
                    </div>
                    <button type="submit" class="btn-primary w-full">Submit Request</button>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>
