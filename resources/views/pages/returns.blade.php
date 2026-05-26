<x-layouts.app title="Returns & Exchanges">
    <x-partials.breadcrumbs :items="[['label' => 'Returns', 'url' => '#']]" />

    <div class="container-custom pb-12">
        <div class="max-w-3xl mx-auto">
            <h1 class="text-3xl md:text-4xl font-bold text-primary-navy mb-4">Returns &amp; Exchanges</h1>
            <p class="text-medium-gray mb-8">We want you to be completely satisfied with your purchase. If something isn't right, we're here to help.</p>

            <div class="space-y-6">
                <div class="card p-6">
                    <h2 class="text-lg font-semibold text-dark-charcoal mb-3">30-Day Return Policy</h2>
                    <p class="text-sm text-medium-gray leading-relaxed">You have 30 days from the date of delivery to return any product in its original condition for a full refund or exchange. We believe in making things right — no questions asked.</p>
                </div>

                <div class="card p-6">
                    <h2 class="text-lg font-semibold text-dark-charcoal mb-3">Return Requirements</h2>
                    <ul class="text-sm text-medium-gray space-y-2 list-disc pl-5">
                        <li>Product must be in its original packaging</li>
                        <li>All accessories, manuals, and cables must be included</li>
                        <li>Product must be in like-new condition (no signs of use or damage)</li>
                        <li>Proof of purchase (order number) is required</li>
                        <li>Return shipping costs are covered by Denny Express for defective items</li>
                    </ul>
                </div>

                <div class="card p-6">
                    <h2 class="text-lg font-semibold text-dark-charcoal mb-3">How to Initiate a Return</h2>
                    <ol class="text-sm text-medium-gray space-y-3 list-decimal pl-5">
                        <li>Contact our support team at <a href="mailto:returns@dennyexpress.co.za" class="text-primary-blue hover:underline">returns@dennyexpress.co.za</a> with your order number</li>
                        <li>Our team will provide you with a Return Merchandise Authorization (RMA) number</li>
                        <li>Pack the product securely in its original packaging</li>
                        <li>Ship the product to the address provided by our team</li>
                        <li>Once received and inspected, your refund will be processed within 5-10 business days</li>
                    </ol>
                </div>

                <div class="card p-6">
                    <h2 class="text-lg font-semibold text-dark-charcoal mb-3">Refund Timeline</h2>
                    <ul class="text-sm text-medium-gray space-y-2 list-disc pl-5">
                        <li><strong>Credit/Debit Card:</strong> 5-10 business days after we receive the return</li>
                        <li><strong>EFT/Bank Transfer:</strong> 3-5 business days after we receive the return</li>
                        <li><strong>Store Credit:</strong> Issued immediately upon inspection approval</li>
                    </ul>
                </div>

                <div class="bg-primary-blue/5 rounded-xl p-6 border border-primary-blue/10">
                    <h3 class="text-sm font-semibold text-primary-blue mb-2">Need to start a return?</h3>
                    <p class="text-sm text-medium-gray mb-4">Contact our returns team and we'll guide you through the process.</p>
                    <a href="{{ route('pages.contact') }}" class="btn-primary text-sm">Start a Return</a>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
