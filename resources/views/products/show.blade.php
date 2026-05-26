<x-layouts.app title="Product Detail">
    <x-partials.breadcrumbs :items="[['label' => 'Shop', 'url' => route('shop.index')], ['label' => 'Category', 'url' => '#'], ['label' => 'Product Name', 'url' => '#']]" />

    <div class="container-custom pb-12">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 mb-12">
            <x-product.gallery :images="[]" />

            <div class="space-y-6">
                <div>
                    @if (isset($product))
                        <x-badge type="new" size="sm">New Arrival</x-badge>
                    @endif
                    <h1 class="text-2xl md:text-3xl font-bold text-primary-navy mt-2">Cisco Catalyst 9200 48-Port Switch</h1>
                    <p class="text-sm text-medium-gray mt-1">SKU: C9200-48P | Brand: Cisco</p>
                </div>

                <div class="flex items-center gap-3">
                    <div class="flex items-center gap-0.5">
                        @for ($i = 1; $i <= 5; $i++)
                            <svg class="w-4 h-4 {{ $i <= 5 ? 'text-warning' : 'text-border-gray' }}" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        @endfor
                    </div>
                    <span class="text-sm text-medium-gray">(12 reviews)</span>
                </div>

                <x-price-tag price="12999.00" originalPrice="15999.00" size="lg" />

                <p class="text-sm text-medium-gray leading-relaxed">
                    Enterprise-grade 48-port Gigabit Ethernet switch with PoE+ support. Ideal for business networks requiring high-performance switching with advanced security features.
                </p>

                <div class="flex items-center gap-2 text-sm">
                    <span class="flex items-center gap-1.5 text-success">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        In Stock
                    </span>
                    <span class="text-medium-gray">|</span>
                    <span class="text-medium-gray">Free delivery over R5,000</span>
                </div>

                <x-product.add-to-cart-form />

                <div class="border-t border-border-gray pt-6 space-y-3">
                    <div class="flex items-center gap-2 text-sm text-medium-gray">
                        <svg class="w-4 h-4 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                        18 Month Warranty
                    </div>
                    <div class="flex items-center gap-2 text-sm text-medium-gray">
                        <svg class="w-4 h-4 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Fast nationwide delivery
                    </div>
                    <div class="flex items-center gap-2 text-sm text-medium-gray">
                        <svg class="w-4 h-4 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                        30-day hassle-free returns
                    </div>
                </div>
            </div>
        </div>

        <div x-data="tabGroup" class="mb-12">
            <div class="border-b border-border-gray mb-6">
                <nav class="flex gap-6">
                    <button @click="setTab(0)" class="pb-3 text-sm font-medium transition-colors duration-200" :class="activeTab === 0 ? 'text-primary-blue border-b-2 border-primary-blue' : 'text-medium-gray hover:text-dark-charcoal'">Description</button>
                    <button @click="setTab(1)" class="pb-3 text-sm font-medium transition-colors duration-200" :class="activeTab === 1 ? 'text-primary-blue border-b-2 border-primary-blue' : 'text-medium-gray hover:text-dark-charcoal'">Specifications</button>
                    <button @click="setTab(2)" class="pb-3 text-sm font-medium transition-colors duration-200" :class="activeTab === 2 ? 'text-primary-blue border-b-2 border-primary-blue' : 'text-medium-gray hover:text-dark-charcoal'">Reviews (12)</button>
                </nav>
            </div>

            <div x-show="activeTab === 0" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                <div class="text-sm text-medium-gray space-y-3 leading-relaxed">
                    <p>The Cisco Catalyst 9200 Series is the next generation of the industry's most widely deployed enterprise-class access switches. Built on the foundation of the Catalyst 9000 Series, the Catalyst 9200 Series extends the benefits of intent-based networking to a broader set of customers.</p>
                    <p class="font-medium text-dark-charcoal">Key features include:</p>
                    <ul class="list-disc pl-5 space-y-1">
                        <li>48 Gigabit Ethernet ports with PoE+</li>
                        <li>Advanced security with Cisco TrustSec</li>
                        <li>StackWise-160 for high-availability stacking</li>
                        <li>Full IEEE 802.1X, ACL, and QoS support</li>
                        <li>Energy-efficient design with Cisco EnergyWise</li>
                    </ul>
                </div>
            </div>

            <div x-show="activeTab === 1" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-cloak>
                <x-product.specs-table :specs="[
                    ['label' => 'Ports', 'value' => '48 x Gigabit Ethernet PoE+'],
                    ['label' => 'Switching Capacity', 'value' => '176 Gbps'],
                    ['label' => 'PoE Budget', 'value' => '740W'],
                    ['label' => 'Stacking', 'value' => 'StackWise-160'],
                    ['label' => 'VLANs', 'value' => '1024'],
                    ['label' => 'MAC Address Table', 'value' => '32,000'],
                    ['label' => 'Dimensions', 'value' => '44 x 36 x 4.4 cm'],
                    ['label' => 'Weight', 'value' => '6.2 kg'],
                    ['label' => 'Warranty', 'value' => '18 Months'],
                ]" />
            </div>

            <div x-show="activeTab === 2" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-cloak>
                <div class="space-y-4">
                    <x-product.review-card :review="[
                        'author' => 'John D.',
                        'date' => '1 week ago',
                        'rating' => 5,
                        'title' => 'Excellent switch for enterprise',
                        'content' => 'Deployed these across our office network. Rock-solid performance, easy to configure through CLI. Highly recommend for any business network upgrade.',
                        'verified' => true,
                    ]" />
                    <x-product.review-card :review="[
                        'author' => 'Peter M.',
                        'date' => '2 weeks ago',
                        'rating' => 4,
                        'title' => 'Great value for enterprise gear',
                        'content' => 'Good performance and feature set for the price. PoE budget is generous. Took a star off because the documentation could be better.',
                        'verified' => true,
                    ]" />
                </div>
            </div>
        </div>

        <x-product.featured-section
            title="Related Products"
            subtitle="Customers also bought"
            :products="[]"
        />
    </div>
</x-layouts.app>
