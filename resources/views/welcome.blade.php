<x-layouts.app title="Denny Express | POS Systems & Computers Johannesburg">
    {{-- Hero Section - Focus on Store and Products --}}
    <section class="relative bg-dark overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-primary/5 via-transparent to-primary/10"></div>
        <div class="absolute top-0 right-0 w-96 h-96 bg-primary/20 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-primary/10 rounded-full blur-3xl"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24 relative">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
                <div class="max-w-xl">
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-primary/10 border border-primary/20 rounded-full mb-6">
                        <span class="w-2 h-2 bg-primary rounded-full animate-pulse"></span>
                        <span class="text-sm font-medium text-primary">South Africa's Trusted Tech Store</span>
                    </div>
                    
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white leading-tight mb-6">
                        Quality
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-primary-light"> Tech Products</span>
                        at Great Prices
                    </h1>
                    
                    <p class="text-gray-400 text-lg leading-relaxed mb-8">
                        Shop POS systems, computers, printers, monitors and more. 
                        <span class="text-primary font-semibold">Free delivery</span> on orders over R5,000. 
                        <span class="text-primary font-semibold">18-month warranty</span> on all products.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('shop.index') }}" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-primary text-white text-sm font-semibold rounded-xl hover:bg-primary-dark hover:shadow-lg hover:shadow-primary/25 transition-all duration-300">
                            Shop All Products
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                        <a href="https://wa.me/27743551336?text=Hi%21%20I%27m%20interested%20in%20your%20products" 
                           target="_blank" 
                           class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-surface border border-white/10 text-white text-sm font-semibold rounded-xl hover:border-primary/50 transition-all duration-300">
                            <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.012-.172-.249-.018-.384.13-.506.135-.11.3-.286.449-.429.147-.143.196-.249.296-.415.099-.166.05-.305-.025-.43-.074-.124-.67-1.61-.918-2.205-.242-.578-.489-.498-.67-.506-.172-.009-.37-.013-.568-.013-.197 0-.518.074-.79.371-.273.297-1.04 1.014-1.04 2.467 0 1.453 1.065 2.851 1.213 3.05.149.199 2.092 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                            WhatsApp Us
                        </a>
                    </div>
                </div>
                
                <div class="hidden lg:block">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-primary/20 to-transparent rounded-3xl blur-2xl"></div>
                        <div class="relative bg-surface border border-white/5 rounded-3xl p-6 backdrop-blur-sm">
                            <img src="{{ asset('images/products/pos-system-main.jpg') }}" 
                                 alt="POS System" 
                                 class="w-full rounded-2xl"
                                 onerror="this.src='{{ asset('storage/images/products/pos-system-fallback.jpg') }}'>
                            
                            <div class="grid grid-cols-2 gap-4 mt-6">
                                <div class="bg-dark rounded-xl p-4 text-center">
                                    <p class="text-2xl font-bold text-primary">44+</p>
                                    <p class="text-sm text-gray-400">Products</p>
                                </div>
                                <div class="bg-dark rounded-xl p-4 text-center">
                                    <p class="text-2xl font-bold text-primary">Free</p>
                                    <p class="text-sm text-gray-400">Delivery R5,000+</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Trust Bar --}}
    <section class="bg-surface border-y border-white/5 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="flex items-center justify-center gap-3 p-4 bg-dark rounded-2xl border border-white/5">
                    <div class="w-10 h-10 bg-primary/10 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-gray-300">Free Delivery R5,000+</span>
                </div>
                <div class="flex items-center justify-center gap-3 p-4 bg-dark rounded-2xl border border-white/5">
                    <div class="w-10 h-10 bg-primary/10 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 01-18 0 9 9 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-gray-300">18 Month Warranty</span>
                </div>
                <div class="flex items-center justify-center gap-3 p-4 bg-dark rounded-2xl border border-white/5">
                    <div class="w-10 h-10 bg-primary/10 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-gray-300">Free POS Software</span>
                </div>
                <div class="flex items-center justify-center gap-3 p-4 bg-dark rounded-2xl border border-white/5">
                    <div class="w-10 h-10 bg-primary/10 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <span class="text-sm font-medium text-gray-300">Nationwide Delivery</span>
                </div>
            </div>
        </div>
    </section>

    {{-- Categories Section --}}
    @if ($categories && $categories->count() > 0)
    <section class="py-16 bg-dark">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-10">
                <div>
                    <span class="text-xs font-semibold text-primary uppercase tracking-widest">CATEGORIES</span>
                    <h2 class="text-2xl font-bold text-white mt-2">Browse by Category</h2>
                </div>
                <a href="{{ route('shop.index') }}" class="text-sm font-semibold text-primary hover:text-primary-light transition-colors flex items-center gap-1">
                    View All Products
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                @foreach ($categories as $index => $category)
                    @php
                        $catSlug = $category->slug ?? 'all';
                        $productsCount = $category->products_count ?? 0;
                        $colors = ['primary', 'secondary', 'primary', 'secondary', 'primary', 'secondary'];
                        $color = $colors[$index % count($colors)];
                    @endphp
                    <a href="{{ route('shop.index') }}?category={{ $catSlug }}" 
                       class="group bg-surface rounded-2xl p-6 text-center hover:bg-surface-light border border-white/5 hover:border-primary/30 transition-all duration-300">
                        <div class="w-14 h-14 bg-primary/10 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-primary/20 transition-colors">
                            @if (in_array($catSlug, ['pos-systems', 'pos-software', 'computers']))
                                <svg class="w-7 h-7 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            @elseif (in_array($catSlug, ['printers', 'pos-hardware']))
                                <svg class="w-7 h-7 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                                </svg>
                            @elseif ($catSlug === 'monitors')
                                <svg class="w-7 h-7 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            @else
                                <svg class="w-7 h-7 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                </svg>
                            @endif
                        </div>
                        <h3 class="text-sm font-semibold text-white mb-1">{{ $category->name }}</h3>
                        <p class="text-xs text-gray-400">
                            {{ $productsCount > 0 ? $productsCount . ' items' : 'Browse now' }}
                        </p>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- Featured Products --}}
    @if ($featuredProducts && $featuredProducts->count() > 0)
    <section class="py-16 bg-surface">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-10">
                <div>
                    <span class="text-xs font-semibold text-primary uppercase tracking-widest">FEATURED</span>
                    <h2 class="text-2xl font-bold text-white mt-2">Popular Products</h2>
                </div>
                <a href="{{ route('shop.index') }}" class="text-sm font-semibold text-primary hover:text-primary-light transition-colors flex items-center gap-1">
                    View All
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
            
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 md:gap-6">
                @foreach ($featuredProducts as $product)
                    <x-product.card :product="$product" />
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- Why Choose Us --}}
    <section class="py-16 bg-dark">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="text-xs font-semibold text-primary uppercase tracking-widest">WHY CHOOSE US</span>
                <h2 class="text-3xl font-bold text-white mt-2">Shopping Made Easy</h2>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-surface rounded-2xl p-6 border border-white/5 hover:border-primary/20 transition-all duration-300">
                    <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-white mb-2">Free Lifetime Software</h3>
                    <p class="text-sm text-gray-400">POS software included free with all POS systems. No monthly fees.</p>
                </div>
                
                <div class="bg-surface rounded-2xl p-6 border border-white/5 hover:border-primary/20 transition-all duration-300">
                    <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 01-12 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-white mb-2">18 Month Warranty</h3>
                    <p class="text-sm text-gray-400">Every product comes with an 18-month warranty for peace of mind.</p>
                </div>
                
                <div class="bg-surface rounded-2xl p-6 border border-white/5 hover:border-primary/20 transition-all duration-300">
                    <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-white mb-2">Free Nationwide Delivery</h3>
                    <p class="text-sm text-gray-400">Free delivery on all orders over R5,000 across South Africa.</p>
                </div>
                
                <div class="bg-surface rounded-2xl p-6 border border-white/5 hover:border-primary/20 transition-all duration-300">
                    <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-white mb-2">Expert Support</h3>
                    <p class="text-sm text-gray-400">Free training and ongoing support to help your business succeed.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Our Clients --}}
    <section class="py-16 bg-surface">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="text-xs font-semibold text-primary uppercase tracking-widest">TRUSTED BY</span>
                <h2 class="text-2xl font-bold text-white mt-2">Businesses Across South Africa</h2>
            </div>
            
            <div class="bg-dark rounded-3xl p-8 md:p-12 border border-white/5">
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-8 items-center">
                    <div class="flex items-center justify-center p-4 grayscale hover:grayscale-0 transition-all">
                        <img src="{{ asset('images/clients/puma.webp') }}" alt="Puma" class="max-h-12 object-contain">
                    </div>
                    <div class="flex items-center justify-center p-4 grayscale hover:grayscale-0 transition-all">
                        <img src="{{ asset('images/clients/purewater.png') }}" alt="Pure Water" class="max-h-12 object-contain">
                    </div>
                    <div class="flex items-center justify-center p-4 grayscale hover:grayscale-0 transition-all">
                        <img src="{{ asset('images/clients/blinggirl.jpg') }}" alt="Bling Girl" class="max-h-12 object-contain">
                    </div>
                    <div class="flex items-center justify-center p-4 grayscale hover:grayscale-0 transition-all">
                        <img src="{{ asset('images/clients/missmoo.jpg') }}" alt="Miss Moo" class="max-h-12 object-contain">
                    </div>
                    <div class="flex items-center justify-center p-4 grayscale hover:grayscale-0 transition-all">
                        <img src="{{ asset('images/clients/kwazionke.png') }}" alt="Kwazionke" class="max-h-12 object-contain">
                    </div>
                    <div class="flex items-center justify-center p-4 grayscale hover:grayscale-0 transition-all">
                        <img src="{{ asset('images/clients/ecomall.png') }}" alt="Ecomall" class="max-h-12 object-contain">
                    </div>
                </div>
                
                <div class="mt-8 pt-8 border-t border-white/10 text-center">
                    <p class="text-sm text-gray-400">Plus <span class="font-semibold text-primary">500+</span> more businesses across South Africa</p>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-20 bg-dark">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative bg-surface rounded-3xl p-10 md:p-16 text-center border border-white/5 overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-primary/20 rounded-full blur-3xl"></div>
                <div class="absolute bottom-0 left-0 w-64 h-64 bg-primary/10 rounded-full blur-3xl"></div>
                
                <div class="relative">
                    <span class="inline-block text-xs font-semibold text-primary uppercase tracking-widest mb-4">READY TO SHOP</span>
                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                        Quality Tech Products Await
                    </h2>
                    <p class="text-gray-400 text-lg mb-10 max-w-xl mx-auto">
                        Browse our collection of POS systems, computers, printers and more. Free delivery on orders over R5,000.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('shop.index') }}" class="inline-flex items-center justify-center gap-2 px-10 py-4 bg-primary text-white text-sm font-semibold rounded-xl hover:bg-primary-dark hover:shadow-lg hover:shadow-primary/25 transition-all duration-300">
                            Browse Products
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                        <a href="https://wa.me/27743551336?text=Hi%21%20I%27d%20like%20assistance%20with%20your%20products" 
                           target="_blank" 
                           class="inline-flex items-center justify-center gap-2 px-10 py-4 bg-dark border border-white/10 text-white text-sm font-semibold rounded-xl hover:border-primary/30 transition-all duration-300">
                            <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.012-.172-.249-.018-.384.13-.506.135-.11.3-.286.449-.429.147-.143.196-.249.296-.415.099-.166.05-.305-.025-.43-.074-.124-.67-1.61-.918-2.205-.242-.578-.489-.498-.67-.506-.172-.009-.37-.013-.568-.013-.197 0-.518.074-.79.371-.273.297-1.04 1.014-1.04 2.467 0 1.453 1.065 2.851 1.213 3.05.149.199 2.092 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                            Get Assistance
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>
