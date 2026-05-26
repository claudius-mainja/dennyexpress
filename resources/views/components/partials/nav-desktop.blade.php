<nav class="hidden lg:flex items-center" x-data="{ dropdown: null }">
    <ul class="flex items-center gap-1">
        <li>
            <a href="{{ route('home') }}" class="text-sm text-gray-600 hover:text-gray-900 font-medium px-3 py-2 transition-colors {{ request()->routeIs('home') ? 'text-primary' : '' }}">
                Home
            </a>
        </li>
        <li @mouseenter="dropdown = 'pos'" @mouseleave="dropdown = null" class="relative">
            <button class="text-sm text-gray-600 hover:text-gray-900 font-medium px-3 py-2 inline-flex items-center gap-1 transition-colors">
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
                 class="absolute top-full left-0 mt-1 w-60 bg-white rounded-xl shadow-lg border border-gray-200 p-2 z-50" 
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
                <a href="{{ route('shop.index') }}?category=pos-systems" class="flex items-center gap-3 px-4 py-3 text-sm text-gray-600 hover:text-gray-900 hover:bg-gray-50 rounded-lg transition-colors">
                    <div class="w-8 h-8 bg-green-500/10 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="font-medium text-gray-900">All-in-One Terminals</p>
                        <p class="text-xs text-gray-500">Touch screen POS terminals</p>
                    </div>
                </a>
                <a href="{{ route('shop.index') }}?category=pos-software" class="flex items-center gap-3 px-4 py-3 text-sm text-gray-600 hover:text-gray-900 hover:bg-gray-50 rounded-lg transition-colors">
                    <div class="w-8 h-8 bg-orange-500/10 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                        </svg>
                    </div>
                    <div>
                        <p class="font-medium text-gray-900">POS Software</p>
                        <p class="text-xs text-gray-500">Retail & restaurant solutions</p>
                    </div>
                </a>
            </div>
        </li>
        <li @mouseenter="dropdown = 'hardware'" @mouseleave="dropdown = null" class="relative">
            <button class="text-sm text-gray-600 hover:text-gray-900 font-medium px-3 py-2 inline-flex items-center gap-1 transition-colors">
                POS Hardware
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
                 class="absolute top-full left-0 mt-1 w-64 bg-white rounded-xl shadow-lg border border-gray-200 p-2 z-50" 
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
                        <div class="w-10 h-10 bg-green-500/10 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
                            </svg>
                        </div>
                        <span class="font-medium text-gray-900">Scanners</span>
                    </a>
                    <a href="{{ route('shop.index') }}?category=pos-hardware" class="flex flex-col items-center gap-2 px-3 py-4 text-center text-sm hover:bg-gray-50 rounded-lg transition-colors">
                        <div class="w-10 h-10 bg-orange-500/10 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 00-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 00-1-1v-6z" />
                            </svg>
                        </div>
                        <span class="font-medium text-gray-900">Cash Drawers</span>
                    </a>
                    <a href="{{ route('shop.index') }}?category=pos-hardware" class="flex flex-col items-center gap-2 px-3 py-4 text-center text-sm hover:bg-gray-50 rounded-lg transition-colors">
                        <div class="w-10 h-10 bg-green-500/10 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                            </svg>
                        </div>
                        <span class="font-medium text-gray-900">Scales</span>
                    </a>
                </div>
            </div>
        </li>
        <li @mouseenter="dropdown = 'computers'" @mouseleave="dropdown = null" class="relative">
            <button class="text-sm text-gray-600 hover:text-gray-900 font-medium px-3 py-2 inline-flex items-center gap-1 transition-colors">
                Computers
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div x-show="dropdown === 'computers'" 
                 x-transition:enter="transition ease-out duration-200" 
                 x-transition:enter-start="opacity-0 translate-y-1" 
                 x-transition:enter-end="opacity-100 translate-y-0" 
                 x-transition:leave="transition ease-in duration-150" 
                 x-transition:leave-start="opacity-100 translate-y-0" 
                 x-transition:leave-end="opacity-0 translate-y-1" 
                 class="absolute top-full left-0 mt-1 w-56 bg-white rounded-xl shadow-lg border border-gray-200 p-2 z-50" 
                 @click.outside="dropdown = null">
                <a href="{{ route('shop.index') }}?category=computers" class="flex items-center gap-3 px-4 py-3 text-sm text-gray-600 hover:text-gray-900 hover:bg-gray-50 rounded-lg transition-colors">
                    <div class="w-8 h-8 bg-primary/10 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="font-medium text-gray-900">Desktops</p>
                        <p class="text-xs text-gray-500">Complete sets & towers</p>
                    </div>
                </a>
                <a href="{{ route('shop.index') }}?category=monitors" class="flex items-center gap-3 px-4 py-3 text-sm text-gray-600 hover:text-gray-900 hover:bg-gray-50 rounded-lg transition-colors">
                    <div class="w-8 h-8 bg-green-500/10 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="font-medium text-gray-900">Monitors</p>
                        <p class="text-xs text-gray-500">Touch & standard</p>
                    </div>
                </a>
            </div>
        </li>
        <li>
            <a href="{{ route('shop.index') }}?category=printers" class="text-sm text-gray-600 hover:text-gray-900 font-medium px-3 py-2 transition-colors">
                Printers
            </a>
        </li>
        <li>
            <a href="{{ route('shop.index') }}?category=packaging-stickers" class="text-sm text-gray-600 hover:text-gray-900 font-medium px-3 py-2 transition-colors">
                Packaging
            </a>
        </li>
    </ul>
</nav>
