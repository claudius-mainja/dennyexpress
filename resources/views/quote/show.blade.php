<x-layouts.app title="Quote Request Received">
    <x-partials.breadcrumbs :items="[['label' => 'Quote', 'url' => '#']]" />

    <div class="container-custom pb-12">
        <div class="max-w-lg mx-auto text-center py-12">
            <div class="w-16 h-16 bg-success/10 rounded-2xl flex items-center justify-center mx-auto mb-6">
                <svg class="w-8 h-8 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <h1 class="text-2xl md:text-3xl font-bold text-primary-navy mb-3">Quote Request Received!</h1>
            <p class="text-medium-gray text-sm mb-6">Thank you for your enquiry. Our team will review your request and get back to you within 24 hours with a competitive quote.</p>
            <div class="card p-4 mb-6 inline-block">
                <p class="text-sm text-medium-gray">Reference: <span class="font-semibold text-dark-charcoal">DENNY-Q-2024-0001</span></p>
            </div>
            <div class="space-y-3">
                <a href="{{ route('shop.index') }}" class="btn-primary">Continue Shopping</a>
                <br>
                <a href="{{ route('dashboard') }}" class="btn-secondary mt-2 inline-block">Go to Dashboard</a>
            </div>
        </div>
    </div>
</x-layouts.app>
