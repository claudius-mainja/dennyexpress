<header class="sticky top-0 z-40 bg-dark border-b border-white/5 backdrop-blur-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 lg:h-20">
            <div class="flex items-center gap-6 lg:gap-10">
                <button @click="mobileOpen = !mobileOpen" class="lg:hidden p-2 -ml-2 text-gray-400 hover:text-white transition-colors" aria-label="Menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

                <a href="{{ route('home') }}" class="flex items-center gap-2.5 shrink-0">
                    <img src="{{ asset('images/logos/denny-logo.webp') }}" alt="Denny Express" class="h-10 lg:h-12 object-contain" 
                         onerror="this.src='https://dennyexpress.co.za/wp-content/uploads/2025/05/denny-logo.webp'">
                </a>

                <x-partials.nav-desktop />
            </div>

            <div class="flex items-center gap-2 lg:gap-3">
                <button @click="searchOpen = !searchOpen" class="p-2 text-gray-400 hover:text-white transition-colors" aria-label="Search">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>

                @auth
                    <a href="{{ route('dashboard') }}" class="hidden sm:inline-flex p-2 text-gray-400 hover:text-white transition-colors" aria-label="Account">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </a>
                @else
                    <a href="{{ route('login') }}" class="hidden sm:inline-flex p-2 text-gray-400 hover:text-white transition-colors" aria-label="Sign in">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </a>
                @endauth

                <a href="{{ route('wishlist.index') }}" class="hidden sm:inline-flex p-2 text-gray-400 hover:text-white transition-colors relative" aria-label="Wishlist">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                    @if ($wishlistCount ?? false)
                        <span class="absolute -top-0.5 -right-0.5 w-4 h-4 bg-red-500 text-white text-[10px] font-bold rounded-full flex items-center justify-center">{{ $wishlistCount }}</span>
                    @endif
                </a>

                <button @click="cartOpen = !cartOpen" class="p-2 text-gray-400 hover:text-white transition-colors relative" aria-label="Cart">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    @if (($cartCount ?? 0) > 0)
                        <span class="absolute -top-0.5 -right-0.5 w-4 h-4 bg-primary text-white text-[10px] font-bold rounded-full flex items-center justify-center">{{ $cartCount }}</span>
                    @endif
                </button>
            </div>
        </div>
    </div>
</header>
