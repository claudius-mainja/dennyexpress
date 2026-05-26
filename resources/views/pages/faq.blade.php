<x-layouts.app title="FAQ">
    <x-partials.breadcrumbs :items="[['label' => 'FAQ', 'url' => '#']]" />

    <div class="container-custom pb-12">
        <div class="max-w-3xl mx-auto">
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-primary-navy mb-4">Frequently Asked Questions</h1>
                <p class="text-medium-gray">Find answers to common questions about our products, shipping, and services.</p>
            </div>

            <div x-data="accordion" class="space-y-3">
                @php
                    $faqs = [
                        ['q' => 'What payment methods do you accept?', 'a' => 'We accept credit/debit cards (Visa, Mastercard), EFT/bank transfers, and direct deposits. For bulk orders, we also offer invoice-based payment terms for approved businesses.'],
                        ['q' => 'How long does shipping take?', 'a' => 'We ship nationwide across South Africa. Standard delivery takes 2-5 business days for major metros and 3-7 business days for remote areas. Express shipping is available on request.'],
                        ['q' => 'Do you offer free delivery?', 'a' => 'Yes! We offer free delivery on all orders over R5,000. For orders under R5,000, a flat shipping fee of R150 applies within major metros.'],
                        ['q' => 'What is your warranty policy?', 'a' => 'All products come with an 18-month warranty covering manufacturing defects. Extended warranty options are available on select products. The warranty does not cover damage from misuse, unauthorized modifications, or normal wear and tear.'],
                        ['q' => 'Can I return a product?', 'a' => 'Yes, we offer a 30-day hassle-free return policy. Products must be in their original condition and packaging. Please contact our support team to initiate a return.'],
                        ['q' => 'Do you sell to businesses?', 'a' => 'Absolutely! We cater to businesses of all sizes. We offer bulk pricing, B2B invoicing, and dedicated account management for corporate clients.'],
                        ['q' => 'How do I request a quote?', 'a' => 'You can request a quote through our Quote Request form on the website. Our team will review your requirements and get back to you within 24 hours with a competitive quote.'],
                        ['q' => 'Are your products genuine?', 'a' => 'Yes, all products sold by Denny Express are 100% genuine and sourced from authorized distributors and manufacturers. We guarantee authenticity on every purchase.'],
                        ['q' => 'Do you offer technical support?', 'a' => 'Yes, our team of certified engineers provides technical support to help you choose the right products and assist with any technical questions you may have.'],
                        ['q' => 'Can I cancel or change my order?', 'a' => 'Orders can be cancelled or modified within 1 hour of placement. After that, please contact our support team as soon as possible and we\'ll do our best to accommodate your request.'],
                    ];
                @endphp

                @foreach ($faqs as $index => $faq)
                    <div class="card overflow-hidden">
                        <button @click="toggle({{ $index }})" class="w-full flex items-center justify-between p-4 md:p-5 text-left" :class="activePanel === {{ $index }} ? 'bg-light-gray/50' : ''">
                            <span class="text-sm font-medium text-dark-charcoal pr-4">{{ $faq['q'] }}</span>
                            <svg class="w-4 h-4 text-medium-gray shrink-0 transition-transform duration-200" :class="activePanel === {{ $index }} ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="activePanel === {{ $index }}" x-collapse>
                            <div class="px-4 md:px-5 pb-4 md:pb-5">
                                <p class="text-sm text-medium-gray leading-relaxed">{{ $faq['a'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layouts.app>
