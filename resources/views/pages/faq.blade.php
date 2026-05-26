<x-layouts.app title="FAQ">
    {{-- Hero Section --}}
    <section class="relative bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 py-20 overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 left-10 w-32 h-32 bg-primary rounded-full blur-3xl"></div>
            <div class="absolute bottom-10 right-10 w-48 h-48 bg-accent rounded-full blur-3xl"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Frequently Asked Questions</h1>
                <p class="text-gray-400 text-lg max-w-2xl mx-auto">
                    Find answers to common questions about our products, shipping, and services
                </p>
            </div>
        </div>
    </section>

    {{-- FAQ Content --}}
    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div x-data="{ openPanel: null }" class="space-y-4">
                @php
                    $faqs = [
                        ['q' => 'What payment methods do you accept?', 'a' => 'We accept credit/debit cards (Visa, Mastercard), EFT/bank transfers, and direct deposits. For bulk orders, we also offer invoice-based payment terms for approved businesses. Payments are processed securely through PayFast and Ozow.'],
                        ['q' => 'How long does shipping take?', 'a' => 'We ship nationwide across South Africa. Standard delivery takes 2-5 business days for major metros (Johannesburg, Cape Town, Durban, Pretoria) and 3-7 business days for remote areas. Express shipping with next-day delivery to major metros is available on request.'],
                        ['q' => 'Do you offer free delivery?', 'a' => 'Yes! We offer free delivery on all orders over R5,000 to major metros. For orders under R5,000, a flat shipping fee of R150 applies within major metros. Remote areas may incur additional shipping charges — contact us for a quote.'],
                        ['q' => 'What is your warranty policy?', 'a' => 'All products come with an 18-month warranty covering manufacturing defects. Extended warranty options are available on select products. The warranty does not cover damage from misuse, unauthorized modifications, physical damage, or normal wear and tear. Consumable items like cables and batteries are not covered.'],
                        ['q' => 'Can I return a product?', 'a' => 'Yes, we offer a 30-day hassle-free return policy. Products must be in their original condition and packaging, with all accessories, manuals, and cables included. Please contact our support team to initiate a return. Return shipping is covered by Denny Express for defective items.'],
                        ['q' => 'Do you sell to businesses?', 'a' => 'Absolutely! We cater to businesses of all sizes — from small spaza shops to large retail chains. We offer bulk pricing, B2B invoicing, dedicated account management, and custom quotes for corporate clients. Contact us to discuss your business needs.'],
                        ['q' => 'How do I request a quote?', 'a' => 'You can request a quote through our Quote Request form on the website, or by contacting our sales team directly at info@dennyexpress.co.za or 074 355 1336. Our team will review your requirements and get back to you within 24 hours with a competitive quote.'],
                        ['q' => 'Are your products genuine?', 'a' => 'Yes, all products sold by Denny Express are 100% genuine and sourced from authorized distributors and manufacturers. We work directly with leading POS hardware brands to ensure authenticity and quality. We guarantee authenticity on every purchase.'],
                        ['q' => 'Do you offer technical support?', 'a' => 'Yes, our team of certified engineers provides technical support to help you choose the right products and assist with any technical questions you may have. We offer email support (support@dennyexpress.co.za), phone support (074 355 1336), and WhatsApp support during business hours.'],
                        ['q' => 'Can I cancel or change my order?', 'a' => 'Orders can be cancelled or modified within 1 hour of placement. After that, please contact our support team as soon as possible and we\'ll do our best to accommodate your request. Once an order has been shipped, it cannot be cancelled but may be eligible for return under our 30-day return policy.'],
                        ['q' => 'Do you offer installation services?', 'a' => 'Yes, we offer professional installation services for POS systems, receipt printers, cash drawers, and barcode scanners. Installation is available in major metros and can be arranged at the time of purchase. Contact us for a custom installation quote.'],
                        ['q' => 'What POS software do you recommend?', 'a' => 'We recommend and support several leading POS software solutions including SL3 POS, Argon POS, and others. The best software depends on your business type (retail, restaurant, spaza shop, etc.) and specific requirements. Contact our team for personalized recommendations.'],
                    ];
                @endphp

                @foreach ($faqs as $index => $faq)
                    <div class="bg-gray-50 rounded-2xl border border-gray-100 overflow-hidden hover:border-primary/30 transition-colors">
                        <button
                            @click="openPanel = openPanel === {{ $index }} ? null : {{ $index }}"
                            class="w-full flex items-center justify-between p-5 text-left"
                        >
                            <span class="font-semibold text-gray-900 pr-6">{{ $faq['q'] }}</span>
                            <svg
                                class="w-5 h-5 text-gray-400 shrink-0 transition-transform duration-200"
                                :class="openPanel === {{ $index }} ? 'rotate-180 text-primary' : ''"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div
                            x-show="openPanel === {{ $index }}"
                            x-collapse
                            class="px-5 pb-5"
                        >
                            <div class="pt-2 border-t border-gray-200">
                                <p class="text-gray-600 leading-relaxed">{{ $faq['a'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Still have questions --}}
            <div class="mt-12 bg-primary/5 rounded-2xl p-6 md:p-8 border border-primary/20">
                <div class="text-center">
                    <div class="w-16 h-16 bg-primary/20 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-3">Still have questions?</h2>
                    <p class="text-gray-600 mb-6 max-w-lg mx-auto">
                        If you couldn't find the answer you were looking for, our team is ready to help you.
                    </p>
                    <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                        <a href="{{ route('pages.contact') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-primary text-white font-semibold rounded-xl hover:bg-primary-dark transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            Contact Us
                        </a>
                        <a href="https://wa.me/27743551336" target="_blank" class="inline-flex items-center gap-2 px-6 py-3 bg-success text-white font-semibold rounded-xl hover:bg-green-700 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.653-2.012-.172-.249-.018-.384.13-.506.135-.11.3-.286.449-.429.147-.143.196-.249.296-.415.099-.166.05-.305-.025-.43-.074-.124-.67-1.61-.918-2.205-.242-.578-.489-.498-.67-.506-.172-.009-.37-.013-.568-.013-.197 0-.518.074-.79.371-.273.297-1.04 1.014-1.04 2.467 0 1.453 1.065 2.851 1.213 3.05.149.199 2.092 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                            WhatsApp Us
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>
