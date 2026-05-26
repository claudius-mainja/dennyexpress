<x-layouts.app title="Category">
    <x-partials.breadcrumbs :items="[['label' => 'Shop', 'url' => route('shop.index')], ['label' => 'Networking', 'url' => '#']]" />

    <div class="container-custom pb-12">
        <div class="mb-8">
            <h1 class="text-2xl md:text-3xl font-bold text-primary-navy">Networking</h1>
            <p class="text-medium-gray text-sm mt-1">Switches, routers, access points, and networking accessories</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <aside class="lg:col-span-1">
                <div class="card p-5 sticky top-24">
                    <h3 class="text-sm font-semibold text-dark-charcoal mb-3">Subcategories</h3>
                    <ul class="space-y-1">
                        <li><a href="#" class="block p-2 text-sm text-primary-blue bg-primary-blue/5 rounded-lg font-medium">All Networking</a></li>
                        <li><a href="#" class="block p-2 text-sm text-medium-gray hover:text-primary-navy hover:bg-light-gray rounded-lg transition-colors">Switches</a></li>
                        <li><a href="#" class="block p-2 text-sm text-medium-gray hover:text-primary-navy hover:bg-light-gray rounded-lg transition-colors">Routers</a></li>
                        <li><a href="#" class="block p-2 text-sm text-medium-gray hover:text-primary-navy hover:bg-light-gray rounded-lg transition-colors">Access Points</a></li>
                        <li><a href="#" class="block p-2 text-sm text-medium-gray hover:text-primary-navy hover:bg-light-gray rounded-lg transition-colors">Firewalls</a></li>
                        <li><a href="#" class="block p-2 text-sm text-medium-gray hover:text-primary-navy hover:bg-light-gray rounded-lg transition-colors">Network Cards</a></li>
                        <li><a href="#" class="block p-2 text-sm text-medium-gray hover:text-primary-navy hover:bg-light-gray rounded-lg transition-colors">Transceivers</a></li>
                    </ul>
                </div>
            </aside>

            <div class="lg:col-span-3">
                <x-product.grid :products="[]" />
            </div>
        </div>
    </div>
</x-layouts.app>
