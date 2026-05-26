<x-layouts.app title="Request a Quote">
    <x-partials.breadcrumbs :items="[['label' => 'Request Quote', 'url' => '#']]" />

    <div class="container-custom pb-12">
        <div class="max-w-2xl mx-auto">
            <div class="text-center mb-8">
                <h1 class="text-2xl md:text-3xl font-bold text-primary-navy">Request a Quote</h1>
                <p class="text-medium-gray text-sm mt-2">Fill in the form below and our team will get back to you within 24 hours with a competitive quote.</p>
            </div>

            <div class="card p-6 md:p-8">
                <form class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-dark-charcoal mb-1.5">Full Name *</label>
                            <input type="text" class="input-field" placeholder="John Doe">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-dark-charcoal mb-1.5">Company Name</label>
                            <input type="text" class="input-field" placeholder="Your company">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-dark-charcoal mb-1.5">Email Address *</label>
                            <input type="email" class="input-field" placeholder="john@company.com">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-dark-charcoal mb-1.5">Phone Number</label>
                            <input type="tel" class="input-field" placeholder="+27 11 234 5678">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-dark-charcoal mb-1.5">Product(s) Interested In *</label>
                        <textarea rows="4" class="input-field" placeholder="Please list the products you're interested in, including quantities and specifications..."></textarea>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-dark-charcoal mb-1.5">Quantity</label>
                            <input type="number" class="input-field" placeholder="1">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-dark-charcoal mb-1.5">Budget Range</label>
                            <select class="input-field">
                                <option>Not sure / Flexible</option>
                                <option>Under R5,000</option>
                                <option>R5,000 - R15,000</option>
                                <option>R15,000 - R50,000</option>
                                <option>R50,000 - R100,000</option>
                                <option>Over R100,000</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-dark-charcoal mb-1.5">Additional Notes</label>
                        <textarea rows="3" class="input-field" placeholder="Any special requirements or delivery preferences..."></textarea>
                    </div>

                    <button type="submit" class="btn-primary w-full">Submit Quote Request</button>

                    <p class="text-xs text-medium-gray text-center">By submitting, you agree to our <a href="{{ route('pages.privacy') }}" class="text-primary-blue hover:underline">Privacy Policy</a> and <a href="{{ route('pages.terms') }}" class="text-primary-blue hover:underline">Terms of Service</a>.</p>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>
