<x-layouts.app title="Dashboard">
    <div class="container-custom py-8">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-2xl font-bold text-primary-navy">Dashboard</h1>
                <p class="text-medium-gray text-sm mt-1">Welcome back, {{ Auth::user()->name }}</p>
            </div>
            <span class="text-xs text-medium-gray bg-light-gray px-3 py-1.5 rounded-full">Member since {{ Auth::user()->created_at->format('M Y') }}</span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
            <div class="card p-5">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-primary-blue/10 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-primary-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-primary-navy">0</p>
                        <p class="text-xs text-medium-gray">Orders</p>
                    </div>
                </div>
            </div>
            <div class="card p-5">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-success/10 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-primary-navy">{{ $wishlistCount ?? 0 }}</p>
                        <p class="text-xs text-medium-gray">Wishlist</p>
                    </div>
                </div>
            </div>
            <div class="card p-5">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-warning/10 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-warning" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-primary-navy">0</p>
                        <p class="text-xs text-medium-gray">Quotes</p>
                    </div>
                </div>
            </div>
            <div class="card p-5">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-accent-blue/10 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-accent-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-primary-navy">1</p>
                        <p class="text-xs text-medium-gray">Profile</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2">
                <div class="card p-6">
                    <h2 class="text-lg font-semibold text-primary-navy mb-4">Recent Orders</h2>
                    <div class="text-center py-8">
                        <svg class="w-12 h-12 mx-auto text-border-gray mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        <p class="text-medium-gray text-sm">No orders yet</p>
                        <a href="{{ route('shop.index') }}" class="text-primary-blue text-sm font-medium hover:text-accent-blue transition-colors mt-2 inline-block">Start Shopping</a>
                    </div>
                </div>
            </div>
            <div>
                <div class="card p-6">
                    <h2 class="text-lg font-semibold text-primary-navy mb-4">Quick Links</h2>
                    <ul class="space-y-2">
                        <li><a href="{{ route('profile.edit') }}" class="flex items-center gap-2 p-2 text-sm text-medium-gray hover:text-primary-navy hover:bg-light-gray rounded-lg transition-colors"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg> Profile Settings</a></li>
                        <li><a href="{{ route('wishlist.index') }}" class="flex items-center gap-2 p-2 text-sm text-medium-gray hover:text-primary-navy hover:bg-light-gray rounded-lg transition-colors"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg> Wishlist</a></li>
                        <li><a href="{{ route('quote.create') }}" class="flex items-center gap-2 p-2 text-sm text-medium-gray hover:text-primary-navy hover:bg-light-gray rounded-lg transition-colors"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg> Request Quote</a></li>
                        <li><a href="{{ route('pages.faq') }}" class="flex items-center gap-2 p-2 text-sm text-medium-gray hover:text-primary-navy hover:bg-light-gray rounded-lg transition-colors"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg> FAQ</a></li>
                        <li><a href="{{ route('pages.contact') }}" class="flex items-center gap-2 p-2 text-sm text-medium-gray hover:text-primary-navy hover:bg-light-gray rounded-lg transition-colors"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg> Contact Support</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
