<x-layouts.app title="Category">
    <x-partials.breadcrumbs :items="[['label' => 'Shop', 'url' => route('shop.index')], ['label' => 'Networking', 'url' => '#']]" />

    <div class="container-custom pb-8 sm:pb-12">
        <div class="mb-6 sm:mb-8">
            <span class="text-[10px] sm:text-xs font-black text-primary uppercase tracking-widest">CATEGORY</span>
            <h1 class="text-2xl sm:text-3xl font-black text-gray-900 uppercase mt-1">Networking</h1>
            <p class="text-gray-500 text-xs sm:text-sm mt-1 font-medium">Switches, routers, access points, and networking accessories</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 sm:gap-8">
            <aside class="lg:col-span-1">
                <div class="bg-white rounded-2xl border border-gray-200 p-4 sm:p-5 sticky top-24">
                    <h3 class="text-xs sm:text-sm font-black text-gray-900 uppercase mb-3">Subcategories</h3>
                    <ul class="space-y-1">
                        <li><a href="#" class="block px-3 py-2 text-xs sm:text-sm font-semibold text-primary bg-primary/5 rounded-xl">All Networking</a></li>
                        <li><a href="#" class="block px-3 py-2 text-xs sm:text-sm text-gray-500 hover:text-gray-900 hover:bg-gray-50 rounded-xl transition-colors">Switches</a></li>
                        <li><a href="#" class="block px-3 py-2 text-xs sm:text-sm text-gray-500 hover:text-gray-900 hover:bg-gray-50 rounded-xl transition-colors">Routers</a></li>
                        <li><a href="#" class="block px-3 py-2 text-xs sm:text-sm text-gray-500 hover:text-gray-900 hover:bg-gray-50 rounded-xl transition-colors">Access Points</a></li>
                        <li><a href="#" class="block px-3 py-2 text-xs sm:text-sm text-gray-500 hover:text-gray-900 hover:bg-gray-50 rounded-xl transition-colors">Firewalls</a></li>
                        <li><a href="#" class="block px-3 py-2 text-xs sm:text-sm text-gray-500 hover:text-gray-900 hover:bg-gray-50 rounded-xl transition-colors">Network Cards</a></li>
                        <li><a href="#" class="block px-3 py-2 text-xs sm:text-sm text-gray-500 hover:text-gray-900 hover:bg-gray-50 rounded-xl transition-colors">Transceivers</a></li>
                    </ul>
                </div>
            </aside>

            <div class="lg:col-span-3">
                <x-product.grid :products="[]" />
            </div>
        </div>
    </div>
</x-layouts.app>