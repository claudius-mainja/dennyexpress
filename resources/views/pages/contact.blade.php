<x-layouts.app title="Contact Us">
    <x-partials.breadcrumbs :items="[['label' => 'Contact', 'url' => '#']]" />

    <div class="container-custom pb-12">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <div>
                <h1 class="text-3xl md:text-4xl font-bold text-primary-navy mb-4">Get in Touch</h1>
                <p class="text-medium-gray mb-8">Have a question, need technical assistance, or want a custom quote? We're here to help.</p>

                <div class="space-y-6">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-primary-blue/10 rounded-lg flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 text-primary-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-sm font-semibold text-dark-charcoal">Address</h3>
                            <p class="text-sm text-medium-gray mt-0.5">Johannesburg, Gauteng<br>South Africa</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-primary-blue/10 rounded-lg flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 text-primary-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-sm font-semibold text-dark-charcoal">Email</h3>
                            <p class="text-sm text-medium-gray mt-0.5">info@dennyexpress.co.za</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-primary-blue/10 rounded-lg flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 text-primary-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-sm font-semibold text-dark-charcoal">Phone</h3>
                            <p class="text-sm text-medium-gray mt-0.5">+27 11 234 5678</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-primary-blue/10 rounded-lg flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 text-primary-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-sm font-semibold text-dark-charcoal">Business Hours</h3>
                            <p class="text-sm text-medium-gray mt-0.5">Monday - Friday: 8:00 AM - 5:00 PM<br>Saturday: 9:00 AM - 1:00 PM</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card p-6 md:p-8">
                <h2 class="text-lg font-semibold text-dark-charcoal mb-6">Send Us a Message</h2>
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
                        <label class="block text-sm font-medium text-dark-charcoal mb-1">Subject</label>
                        <input type="text" class="input-field" placeholder="How can we help?">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-dark-charcoal mb-1">Message *</label>
                        <textarea rows="4" class="input-field" placeholder="Tell us more about your enquiry..."></textarea>
                    </div>
                    <button type="submit" class="btn-primary w-full">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>
