<div x-show="searchOpen"
     x-transition:enter="transition ease-out duration-200"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-150"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     class="fixed inset-0 z-50"
     x-cloak>
    <div @click="searchOpen = false" class="absolute inset-0 bg-black/50 backdrop-blur-sm"></div>
    <div class="absolute top-0 left-0 right-0 bg-white shadow-modal border-b border-border-gray">
        <div class="container-custom py-4">
            <form action="{{ route('shop.index') }}" method="GET" class="relative">
                <div class="flex items-center gap-3 bg-light-gray rounded-xl px-4 focus-within:ring-2 focus-within:ring-accent-blue transition-all">
                    <svg class="w-5 h-5 text-medium-gray shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <input x-ref="searchInput"
                           type="text"
                           name="q"
                           placeholder="Search products, categories, brands..."
                           class="w-full bg-transparent border-0 py-3 text-sm text-dark-charcoal placeholder:text-medium-gray focus:outline-none focus:ring-0">
                    <button type="button" @click="searchOpen = false; $el.closest('form').querySelector('input').value = ''" class="p-1 text-medium-gray hover:text-dark-charcoal transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </form>
            <div class="mt-3 flex items-center gap-2 text-xs text-medium-gray">
                <span class="font-medium">Popular:</span>
                <a href="#" class="px-2 py-1 bg-light-gray rounded-md hover:bg-border-gray transition-colors">Switches</a>
                <a href="#" class="px-2 py-1 bg-light-gray rounded-md hover:bg-border-gray transition-colors">Cisco</a>
                <a href="#" class="px-2 py-1 bg-light-gray rounded-md hover:bg-border-gray transition-colors">Server Racks</a>
                <a href="#" class="px-2 py-1 bg-light-gray rounded-md hover:bg-border-gray transition-colors">Fiber Cables</a>
            </div>
        </div>
    </div>
</div>
