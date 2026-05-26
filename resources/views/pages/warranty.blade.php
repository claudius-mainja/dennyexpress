<x-layouts.app title="Warranty">
    <x-partials.breadcrumbs :items="[['label' => 'Warranty', 'url' => '#']]" />

    <div class="container-custom pb-12">
        <div class="max-w-3xl mx-auto">
            <h1 class="text-3xl md:text-4xl font-bold text-primary-navy mb-4">Warranty Information</h1>
            <p class="text-medium-gray mb-8">At Denny Express, we stand behind the quality of every product we sell with our comprehensive warranty coverage.</p>

            <div class="space-y-8">
                <div class="card p-6">
                    <h2 class="text-lg font-semibold text-dark-charcoal mb-3">Standard 18-Month Warranty</h2>
                    <p class="text-sm text-medium-gray leading-relaxed mb-4">All products purchased from Denny Express are covered by our standard 18-month warranty against manufacturing defects. This warranty reflects our confidence in the quality of our products and our commitment to your satisfaction.</p>
                    <h3 class="text-sm font-semibold text-dark-charcoal mb-2">Coverage Includes:</h3>
                    <ul class="text-sm text-medium-gray space-y-1.5 list-disc pl-5">
                        <li>Manufacturing defects in materials and workmanship</li>
                        <li>Component failures under normal use</li>
                        <li>Hardware malfunctions not caused by user error</li>
                    </ul>
                </div>

                <div class="card p-6">
                    <h2 class="text-lg font-semibold text-dark-charcoal mb-3">What is Not Covered</h2>
                    <ul class="text-sm text-medium-gray space-y-1.5 list-disc pl-5">
                        <li>Damage caused by accidents, misuse, or improper installation</li>
                        <li>Normal wear and tear</li>
                        <li>Unauthorized modifications or repairs</li>
                        <li>Software or data loss</li>
                        <li>Consumable items (cables, batteries, etc.)</li>
                    </ul>
                </div>

                <div class="card p-6">
                    <h2 class="text-lg font-semibold text-dark-charcoal mb-3">Warranty Claim Process</h2>
                    <ol class="text-sm text-medium-gray space-y-3 list-decimal pl-5">
                        <li>Contact our support team with your order number and a description of the issue</li>
                        <li>Our team will assess your claim and provide return instructions if applicable</li>
                        <li>Ship the product back to us (we may cover return shipping costs)</li>
                        <li>We will inspect, repair, or replace the product within 5-10 business days</li>
                        <li>You will be notified once the process is complete</li>
                    </ol>
                </div>

                <div class="bg-primary-blue/5 rounded-xl p-6 border border-primary-blue/10">
                    <h3 class="text-sm font-semibold text-primary-blue mb-2">Need to make a claim?</h3>
                    <p class="text-sm text-medium-gray mb-4">Contact our warranty team and we'll guide you through the process.</p>
                    <a href="{{ route('pages.contact') }}" class="btn-primary text-sm">Contact Warranty Support</a>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
