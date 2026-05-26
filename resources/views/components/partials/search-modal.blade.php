<div x-show="searchOpen"
     x-transition:enter="transition ease-out duration-200"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-150"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     class="fixed inset-0 z-50"
     x-cloak>
    <div @click="searchOpen = false" class="absolute inset-0 bg-black/70 backdrop-blur-sm"></div>
    <div class="absolute top-0 left-0 right-0 bg-surface shadow-2xl border-b border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <form action="{{ route('shop.index') }}" method="GET" class="relative">
                <div class="flex items-center gap-3 bg-dark rounded-xl px-4 focus-within:ring-2 focus-within:ring-primary transition-all border border-white/10">
                    <svg class="w-5 h-5 text-gray-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <input x-ref="searchInput"
                           type="text"
                           name="q"
                           placeholder="Search products, categories, brands..."
                           class="w-full bg-transparent border-0 py-3 text-sm text-white placeholder:text-gray-500 focus:outline-none focus:ring-0">
                    <button type="button" @click="searchOpen = false; $el.closest('form').querySelector('input').value = ''" class="p-1 text-gray-500 hover:text-white transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </form>
            <div class="mt-3 flex flex-wrap items-center gap-2 text-xs text-gray-500">
                <span class="font-medium">Popular:</span>
                <a href="{{ route('shop.index') }}?q=pos" class="px-2 py-1 bg-dark rounded-md hover:bg-surface-light hover:text-white transition-colors border border-white/10">POS Systems</a>
                <a href="{{ route('shop.index') }}?q=printer" class="px-2 py-1 bg-dark rounded-md hover:bg-surface-light hover:text-white transition-colors border border-white/10">Printers</a>
                <a href="{{ route('shop.index') }}?q=monitor" class="px-2 py-1 bg-dark rounded-md hover:bg-surface-light hover:text-white transition-colors border border-white/10">Monitors</a>
                <a href="{{ route('shop.index') }}?q=scanner" class="px-2 py-1 bg-dark rounded-md hover:bg-surface-light hover:text-white transition-colors border border-white/10">Scanners</a>
            </div>
        </div>
    </div>
</div>
