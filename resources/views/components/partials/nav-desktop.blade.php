<nav class="hidden lg:flex items-center" x-data="{ dropdown: null }">
    <ul class="flex items-center gap-1">
        <li>
            <a href="{{ route('home') }}" class="text-sm text-gray-600 hover:text-primary font-medium px-3 py-2 transition-colors {{ request()->routeIs('home') ? 'text-primary' : '' }}">
                Home
            </a>
        </li>
        <li>
            <a href="{{ route('shop.index') }}" class="text-sm text-gray-600 hover:text-primary font-medium px-4 py-2 bg-primary/5 rounded-lg transition-colors {{ request()->routeIs('shop.*') ? 'text-primary bg-primary/10' : '' }}">
                <span class="inline-flex items-center gap-1.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                    All Products
                </span>
            </a>
        </li>
        <li @mouseenter="dropdown = 'pos'" @mouseleave="dropdown = null" class="relative">
            <button class="text-sm text-gray-600 hover:text-primary font-medium px-3 py-2 inline-flex items-center gap-1 transition-colors">
                POS Systems
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div x-show="dropdown === 'pos'" 
                 x-transition:enter="transition ease-out duration-200" 
                 x-transition:enter-start="opacity-0 translate-y-1" 
                 x-transition:enter-end="opacity-100 translate-y-0" 
                 x-transition:leave="transition ease-in duration-150" 
                 x-transition:leave-start="opacity-100 translate-y-0" 
                 x-transition:leave-end="opacity-0 translate-y-1" 
                 class="absolute top-full left-0 mt-1 w-60 bg-white rounded-xl shadow-lg border border-gray-100 p-2 z-50" 
                 @click.outside="dropdown = null">
                <a href="{{ route('shop.index') }}?category=pos-systems" class="flex items-center gap-3 px-4 py-3 text-sm text-gray-600 hover:text-gray-900 hover:bg-gray-50 rounded-lg transition-colors">
                    <div class="w-8 h-8 bg-primary/10 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="font-medium text-gray-900">All POS Systems</p>
                        <p class="text-xs text-gray-500">Complete bundles & combos</p>
                    </div>
                </a>
                <a href="{{ route('shop.index') }}?category=pos-software" class="flex items-center gap-3 px-4 py-3 text-sm text-gray-600 hover:text-gray-900 hover:bg-gray-50 rounded-lg transition-colors">
                    <div class="w-8 h-8 bg-accent/10 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                        </svg>
                    </div>
                    <div>
                        <p class="font-medium text-gray-900">POS Software</p>
                        <p class="text-xs text-gray-500">Free lifetime license</p>
                    </div>
                </a>
            </div>
        </li>
        <li @mouseenter="dropdown = 'hardware'" @mouseleave="dropdown = null" class="relative">
            <button class="text-sm text-gray-600 hover:text-primary font-medium px-3 py-2 inline-flex items-center gap-1 transition-colors">
                Hardware
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div x-show="dropdown === 'hardware'" 
                 x-transition:enter="transition ease-out duration-200" 
                 x-transition:enter-start="opacity-0 translate-y-1" 
                 x-transition:enter-end="opacity-100 translate-y-0" 
                 x-transition:leave="transition ease-in duration-150" 
                 x-transition:leave-start="opacity-100 translate-y-0" 
                 x-transition:leave-end="opacity-0 translate-y-1" 
                 class="absolute top-full left-0 mt-1 w-64 bg-white rounded-xl shadow-lg border border-gray-100 p-2 z-50" 
                 @click.outside="dropdown = null">
                <div class="grid grid-cols-2 gap-1">
                    <a href="{{ route('shop.index') }}?category=printers" class="flex flex-col items-center gap-2 px-3 py-4 text-center text-sm hover:bg-gray-50 rounded-lg transition-colors">
                        <div class="w-10 h-10 bg-primary/10 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                            </svg>
                        </div>
                        <span class="font-medium text-gray-900">Printers</span>
                    </a>
                    <a href="{{ route('shop.index') }}?category=pos-hardware" class="flex flex-col items-center gap-2 px-3 py-4 text-center text-sm hover:bg-gray-50 rounded-lg transition-colors">
                        <div class="w-10 h-10 bg-accent/10 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
                            </svg>
                        </div>
                        <span class="font-medium text-gray-900">Scanners</span>
                    </a>
                    <a href="{{ route('shop.index') }}?category=computers" class="flex flex-col items-center gap-2 px-3 py-4 text-center text-sm hover:bg-gray-50 rounded-lg transition-colors">
                        <div class="w-10 h-10 bg-primary/10 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <span class="font-medium text-gray-900">Computers</span>
                    </a>
                    <a href="{{ route('shop.index') }}?category=monitors" class="flex flex-col items-center gap-2 px-3 py-4 text-center text-sm hover:bg-gray-50 rounded-lg transition-colors">
                        <div class="w-10 h-10 bg-accent/10 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <span class="font-medium text-gray-900">Monitors</span>
                    </a>
                </div>
            </div>
        </li>
        <li>
            <a href="{{ route('shop.index') }}?category=packaging-stickers" class="text-sm text-gray-600 hover:text-primary font-medium px-3 py-2 transition-colors">
                Packaging
            </a>
        </li>
        <li>
            <a href="{{ route('pages.services') }}" class="text-sm text-gray-600 hover:text-primary font-medium px-3 py-2 transition-colors">
                Services
            </a>
        </li>
    </ul>
</nav>
