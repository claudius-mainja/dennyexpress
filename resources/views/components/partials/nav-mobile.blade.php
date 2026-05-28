<div x-show="mobileOpen"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     class="fixed inset-0 z-50 lg:hidden"
     x-cloak>
    <div @click="mobileOpen = false" class="absolute inset-0 bg-black/50 backdrop-blur-sm"></div>
    <div x-show="mobileOpen"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="-translate-x-full"
         x-transition:enter-end="translate-x-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="translate-x-0"
         x-transition:leave-end="-translate-x-full"
         class="absolute inset-y-0 left-0 w-80 max-w-[85vw] bg-white shadow-xl flex flex-col">
        <div class="flex items-center justify-between p-4 border-b border-gray-200">
            <a href="/" class="flex items-center gap-2">
                <img src="https://dennyexpress.co.za/wp-content/uploads/2025/05/denny-logo.webp" alt="Denny Express" class="h-8 object-contain">
            </a>
            <button @click="mobileOpen = false" class="p-2 text-gray-500 hover:text-gray-900 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <nav class="flex-1 overflow-y-auto p-4">
            <ul class="space-y-1">
                <li>
                    <a href="{{ route('home') }}" class="block px-3 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-50 rounded-lg transition-colors" @click="mobileOpen = false">
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{ route('shop.index') }}" class="block px-3 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-50 rounded-lg transition-colors" @click="mobileOpen = false">
                        Our Shop
                    </a>
                </li>
                <li x-data="{ open: false }">
                    <button @click="open = !open" class="w-full flex items-center justify-between px-3 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-50 rounded-lg transition-colors">
                        POS Systems
                        <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <ul x-show="open" x-collapse class="ml-4 mt-1 space-y-1">
                        <li><a href="{{ route('shop.index') }}?category=pos-systems" class="block px-3 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg transition-colors" @click="mobileOpen = false">All POS Systems</a></li>
                        <li><a href="{{ route('shop.index') }}?category=pos-software" class="block px-3 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg transition-colors" @click="mobileOpen = false">POS Software</a></li>
                    </ul>
                </li>
                <li x-data="{ open: false }">
                    <button @click="open = !open" class="w-full flex items-center justify-between px-3 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-50 rounded-lg transition-colors">
                        POS Hardware
                        <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <ul x-show="open" x-collapse class="ml-4 mt-1 space-y-1">
                        <li><a href="{{ route('shop.index') }}?category=printers" class="block px-3 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg transition-colors" @click="mobileOpen = false">Printers</a></li>
                        <li><a href="{{ route('shop.index') }}?category=pos-hardware" class="block px-3 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg transition-colors" @click="mobileOpen = false">Scanners & Cash Drawers</a></li>
                    </ul>
                </li>
                <li x-data="{ open: false }">
                    <button @click="open = !open" class="w-full flex items-center justify-between px-3 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-50 rounded-lg transition-colors">
                        Computers
                        <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <ul x-show="open" x-collapse class="ml-4 mt-1 space-y-1">
                        <li><a href="{{ route('shop.index') }}?category=computers" class="block px-3 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg transition-colors" @click="mobileOpen = false">Desktops</a></li>
                        <li><a href="{{ route('shop.index') }}?category=monitors" class="block px-3 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg transition-colors" @click="mobileOpen = false">Monitors</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('shop.index') }}?category=printers" class="block px-3 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-50 rounded-lg transition-colors" @click="mobileOpen = false">
                        Printers
                    </a>
                </li>
                <li>
                    <a href="{{ route('shop.index') }}?category=packaging-stickers" class="block px-3 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-50 rounded-lg transition-colors" @click="mobileOpen = false">
                        Packaging & Stickers
                    </a>
                </li>
            </ul>
            <div class="mt-6 pt-6 border-t border-gray-200 space-y-2">
                <a href="{{ route('cart.index') }}" class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-50 rounded-lg transition-colors" @click="mobileOpen = false">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    Cart
                    @if (($cartCount ?? 0) > 0)
                        <span class="ml-auto bg-primary text-white text-xs px-2 py-0.5 rounded-full">{{ $cartCount }}</span>
                    @endif
                </a>
                @auth
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-50 rounded-lg transition-colors" @click="mobileOpen = false">
                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        My Account
                    </a>
                    <a href="{{ route('wishlist.index') }}" class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-50 rounded-lg transition-colors" @click="mobileOpen = false">
                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                        Wishlist
                        <span x-show="wishlistCount > 0" class="ml-auto bg-red-500 text-white text-xs px-2 py-0.5 rounded-full" x-text="wishlistCount"></span>
                    </a>
                @else
                    <a href="{{ route('login') }}" class="flex items-center gap-3 px-3 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-50 rounded-lg transition-colors" @click="mobileOpen = false">
                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                        </svg>
                        Sign In
                    </a>
                @endauth
            </div>
        </nav>
    </div>
</div>
