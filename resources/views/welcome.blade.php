<x-layouts.app title="Denny Express | POS Systems & IT Hardware">
    {{-- Hero Section - 100vh height, dark gradient --}}
    <section class="relative min-h-screen flex items-center overflow-hidden" style="background: linear-gradient(135deg, #020617 0%, #1e293b 40%, #334155 70%, #1e293b 100%);">
        <div class="absolute inset-0 opacity-30">
            <div class="absolute top-0 right-0 w-96 h-96 bg-primary rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-72 h-72 bg-accent rounded-full blur-3xl"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-primary/5 rounded-full blur-3xl"></div>
        </div>
        
        {{-- Grid Pattern Overlay --}}
        <div class="absolute inset-0 opacity-10">
            <div class="w-full h-full" style="background-image: linear-gradient(rgba(255,255,255,0.1) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.1) 1px, transparent 1px); background-size: 50px 50px;"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative py-12 md:py-0">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="max-w-xl">
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-primary/20 backdrop-blur-sm border border-primary/30 rounded-full mb-6">
                        <span class="w-2 h-2 bg-accent rounded-full animate-pulse"></span>
                        <span class="text-sm font-medium text-white">Free POS Software Included</span>
                    </div>
                    
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white leading-tight mb-6 tracking-tight">
                        Premium
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-light to-accent"> POS Hardware</span>
                        for Your Business
                    </h1>
                    
                    <p class="text-gray-300 text-lg leading-relaxed mb-8">
                        Complete POS systems with touch terminals, receipt printers, barcode scanners, cash drawers, and scales. 
                        <span class="text-white font-semibold">Free lifetime POS software included</span> — no monthly fees, ever.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('shop.index') }}?category=pos-systems" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-gradient-to-r from-primary to-primary-light text-white text-sm font-bold rounded-xl hover:from-primary-dark hover:to-primary transition-all duration-300 shadow-lg shadow-primary/25">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                            Shop POS Systems
                        </a>
                        <a href="https://wa.me/27743551336?text=Hi%21%20I%27m%20interested%20in%20POS%20systems" 
                           target="_blank" 
                           class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-white/5 backdrop-blur-sm border border-white/20 text-white text-sm font-semibold rounded-xl hover:bg-white/10 hover:border-white/30 transition-all duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.012-.172-.249-.018-.384.13-.506.135-.11.3-.286.449-.429.147-.143.196-.249.296-.415.099-.166.05-.305-.025-.43-.074-.124-.67-1.61-.918-2.205-.242-.578-.489-.498-.67-.506-.172-.009-.37-.013-.568-.013-.197 0-.518.074-.79.371-.273.297-1.04 1.014-1.04 2.467 0 1.453 1.065 2.851 1.213 3.05.149.199 2.092 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                            Get Free Quote
                        </a>
                    </div>
                    
                    <div class="grid grid-cols-3 gap-4 mt-8 pt-8 border-t border-white/10">
                        <div class="text-center">
                            <p class="text-2xl font-extrabold text-primary">Free</p>
                            <p class="text-sm text-gray-400">Lifetime Software</p>
                        </div>
                        <div class="text-center">
                            <p class="text-2xl font-extrabold text-primary">18</p>
                            <p class="text-sm text-gray-400">Month Warranty</p>
                        </div>
                        <div class="text-center">
                            <p class="text-2xl font-extrabold text-primary">R5k+</p>
                            <p class="text-sm text-gray-400">Free Delivery</p>
                        </div>
                    </div>
                </div>
                
                <div class="hidden lg:block">
                    <div class="relative">
                        <div class="absolute inset-0 bg-primary/30 rounded-3xl blur-3xl"></div>
                        <img src="{{ asset('images/hero1.png') }}" 
                             alt="POS Systems & IT Hardware" 
                             class="relative w-full h-auto rounded-3xl shadow-2xl border border-white/10">
                    </div>
                </div>
            </div>
        </div>

        {{-- Scroll indicator --}}
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
            <svg class="w-6 h-6 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </div>
    </section>

    {{-- Search Section - Live Search --}}
    <section class="py-8 border-b border-white/5" style="background: linear-gradient(135deg, #020617 0%, #1e293b 50%, #020617 100%);">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div x-data="{ 
                search: '', 
                results: [], 
                showDropdown: false,
                searching: false,
                searchUrl: '{{ route('products.search') }}',
                shopUrl: '{{ route('shop.index') }}'
            }" 
                 x-init="$watch('search', value => {
                     if (value.length >= 2) {
                         searching = true;
                         const controller = new AbortController();
                         const timeout = setTimeout(async () => {
                             try {
                                 const response = await fetch(`${searchUrl}?q=${encodeURIComponent(value)}`, {
                                     signal: controller.signal
                                 });
                                 const data = await response.json();
                                 results = data.products;
                                 showDropdown = results.length > 0;
                             } catch (e) {
                                 if (e.name !== 'AbortError') {
                                     console.error('Search failed:', e);
                                 }
                             } finally {
                                 searching = false;
                             }
                         }, 300);
                         return () => clearTimeout(timeout);
                     } else {
                         showDropdown = false;
                         results = [];
                     }
                 })"
                 class="relative">
                <div class="relative">
                    <input 
                        type="text" 
                        x-model="search"
                        @focus="if (results.length > 0) showDropdown = true"
                        @click.outside="showDropdown = false"
                        placeholder="Search for POS systems, printers, scanners, computers..."
                        class="w-full pl-12 pr-4 py-4 bg-white/5 border border-white/10 rounded-2xl text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all text-lg"
                    >
                    <div class="absolute left-4 top-1/2 -translate-y-1/2">
                        <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <div x-show="searching" class="absolute right-4 top-1/2 -translate-y-1/2">
                        <svg class="w-5 h-5 text-primary animate-spin" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </div>
                </div>

                <div x-show="showDropdown" 
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 -translate-y-2"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     x-transition:leave="transition ease-in duration-150"
                     x-transition:leave-start="opacity-100 translate-y-0"
                     x-transition:leave-end="opacity-0 -translate-y-2"
                     class="absolute top-full left-0 right-0 mt-2 bg-gray-800 border border-white/10 rounded-2xl shadow-2xl overflow-hidden z-50 max-h-[400px] overflow-y-auto">
                    
                    <template x-for="(product, index) in results" :key="product.id">
                        <a :href="product.url" class="flex items-center gap-4 p-4 hover:bg-white/5 transition-colors border-b border-white/5 last:border-0">
                            <div class="w-16 h-16 bg-white/5 rounded-xl flex items-center justify-center shrink-0 overflow-hidden">
                                <img x-show="product.image" :src="product.image" :alt="product.name" class="w-full h-full object-cover">
                                <svg x-show="!product.image" class="w-8 h-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-white font-medium truncate" x-text="product.name"></p>
                                <p class="text-primary font-bold text-lg" x-text="product.formatted_price"></p>
                            </div>
                            <svg class="w-5 h-5 text-gray-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </template>

                    <div class="p-3 bg-white/5 border-t border-white/5">
                        <a :href="`${shopUrl}?search=${encodeURIComponent(search)}`" 
                           class="flex items-center justify-center gap-2 w-full py-2 text-sm text-primary hover:text-accent font-medium transition-colors">
                            View all results for "<span x-text="search" class="truncate max-w-[200px]"></span>"
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-center gap-2 mt-4 flex-wrap">
                <span class="text-xs text-gray-500">Popular:</span>
                <a href="{{ route('shop.index') }}?search=POS+System" class="text-xs text-primary hover:text-accent transition-colors">POS System</a>
                <span class="text-gray-600">•</span>
                <a href="{{ route('shop.index') }}?search=printer" class="text-xs text-primary hover:text-accent transition-colors">Printer</a>
                <span class="text-gray-600">•</span>
                <a href="{{ route('shop.index') }}?search=scanner" class="text-xs text-primary hover:text-accent transition-colors">Scanner</a>
                <span class="text-gray-600">•</span>
                <a href="{{ route('shop.index') }}?search=computer" class="text-xs text-primary hover:text-accent transition-colors">Computer</a>
            </div>
        </div>
    </section>

    {{-- Trust Bar - Dark Background --}}
    <section class="py-8 border-b border-white/5" style="background: linear-gradient(135deg, #020617 0%, #1e293b 50%, #020617 100%);">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="flex items-center justify-center gap-3 p-4 bg-white/5 rounded-2xl border border-white/5">
                    <div class="w-10 h-10 bg-primary/20 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-white">Free Delivery</p>
                        <p class="text-xs text-gray-500">Orders over R5,000</p>
                    </div>
                </div>
                <div class="flex items-center justify-center gap-3 p-4 bg-white/5 rounded-2xl border border-white/5">
                    <div class="w-10 h-10 bg-accent/20 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-white">18 Month Warranty</p>
                        <p class="text-xs text-gray-500">On all products</p>
                    </div>
                </div>
                <div class="flex items-center justify-center gap-3 p-4 bg-white/5 rounded-2xl border border-white/5">
                    <div class="w-10 h-10 bg-primary/20 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-white">Free POS Software</p>
                        <p class="text-xs text-gray-500">Lifetime license</p>
                    </div>
                </div>
                <div class="flex items-center justify-center gap-3 p-4 bg-white/5 rounded-2xl border border-white/5">
                    <div class="w-10 h-10 bg-accent/20 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-white">Nationwide Delivery</p>
                        <p class="text-xs text-gray-500">All over SA</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Popular Products - Slate-200 Light Background --}}
    @if ($featuredProducts && $featuredProducts->count() > 0)
    <section class="py-16 bg-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-10 gap-4">
                <div>
                    <span class="text-xs font-bold text-primary uppercase tracking-widest">OUR PRODUCTS</span>
                    <h2 class="text-3xl font-extrabold text-gray-900 mt-2">Popular POS Systems</h2>
                </div>
                <a href="{{ route('shop.index') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-primary text-white text-sm font-bold rounded-xl hover:bg-primary-dark transition-colors">
                    View All Products
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

    {{-- Futuristic POS Software Section with Animated Graphs --}}
    <section class="py-20 relative overflow-hidden" style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 40%, #0f172a 100%);">
        <div class="absolute inset-0">
            <div class="absolute inset-0 opacity-5">
                <div class="w-full h-full" style="background-image: radial-gradient(circle at 2px 2px, rgba(101, 163, 13, 0.3) 1px, transparent 0); background-size: 30px 30px;"></div>
            </div>
            <div class="absolute top-1/4 right-0 w-96 h-96 bg-primary/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-1/4 left-0 w-96 h-96 bg-accent/10 rounded-full blur-3xl"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div class="order-2 lg:order-1">
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-primary/20 to-accent/20 border border-primary/30 rounded-full mb-6">
                        <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        <span class="text-sm font-bold text-primary">NEXT-GEN TECHNOLOGY</span>
                    </div>
                    
                    <h2 class="text-3xl md:text-5xl font-extrabold text-white leading-tight mb-6 tracking-tight">
                        Free POS Software
                        <span class="block text-transparent bg-clip-text bg-gradient-to-r from-primary-light to-accent mt-2">Included Forever</span>
                    </h2>
                    
                    <p class="text-gray-400 text-lg mb-8 leading-relaxed">
                        Get powerful, enterprise-grade POS software for free with any hardware purchase. No subscriptions, no hidden fees, no expiration — just a complete retail management system that grows with your business.
                    </p>
                    
                    <div class="space-y-4 mb-10">
                        <div class="flex items-center gap-4 p-4 bg-white/5 rounded-xl border border-white/5 hover:border-primary/30 transition-all">
                            <div class="w-12 h-12 bg-gradient-to-br from-primary to-primary-light rounded-xl flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-white">Real-Time Inventory</h3>
                                <p class="text-sm text-gray-500">Track stock levels instantly with automated alerts</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-4 p-4 bg-white/5 rounded-xl border border-white/5 hover:border-accent/30 transition-all">
                            <div class="w-12 h-12 bg-gradient-to-br from-accent to-yellow-500 rounded-xl flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-white">AI-Powered Analytics</h3>
                                <p class="text-sm text-gray-500">Smart insights to boost your sales and profits</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-4 p-4 bg-white/5 rounded-xl border border-white/5 hover:border-primary/30 transition-all">
                            <div class="w-12 h-12 bg-gradient-to-br from-primary to-primary-light rounded-xl flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-white">Customer Loyalty</h3>
                                <p class="text-sm text-gray-500">Build lasting relationships with rewards programs</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-4 p-4 bg-white/5 rounded-xl border border-white/5 hover:border-accent/30 transition-all">
                            <div class="w-12 h-12 bg-gradient-to-br from-accent to-yellow-500 rounded-xl flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-white">Lifetime Updates</h3>
                                <p class="text-sm text-gray-500">Free upgrades and new features forever</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('shop.index') }}?category=pos-systems" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-gradient-to-r from-primary to-primary-light text-white font-bold rounded-xl hover:from-primary-dark hover:to-primary transition-all shadow-lg shadow-primary/25">
                            Get POS System
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </a>
                        <a href="https://wa.me/27743551336?text=Hi%21%20Tell%20me%20more%20about%20the%20free%20POS%20software" target="_blank" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-white/5 border border-white/20 text-white font-semibold rounded-xl hover:bg-white/10 transition-all">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.012-.172-.249-.018-.384.13-.506.135-.11.3-.286.449-.429.147-.143.196-.249.296-.415.099-.166.05-.305-.025-.43-.074-.124-.67-1.61-.918-2.205-.242-.578-.489-.498-.67-.506-.172-.009-.37-.013-.568-.013-.197 0-.518.074-.79.371-.273.297-1.04 1.014-1.04 2.467 0 1.453 1.065 2.851 1.213 3.05.149.199 2.092 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                            Chat Now
                        </a>
                    </div>
                </div>
                
                {{-- Animated Dashboard with Graphs --}}
                <div class="order-1 lg:order-2 relative" x-data="animatedDashboard()">
                    <div class="absolute -inset-4 bg-gradient-to-r from-primary/20 to-accent/20 rounded-3xl blur-2xl"></div>
                    <div class="relative bg-gradient-to-br from-white/5 to-white/0 backdrop-blur-sm border border-white/10 rounded-3xl p-6 overflow-hidden">
                        <div class="absolute top-4 right-4 flex items-center gap-2 px-3 py-1.5 bg-green-500/20 rounded-full">
                            <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                            <span class="text-xs text-green-400 font-bold">Live Dashboard</span>
                        </div>
                        
                        {{-- Stats Row --}}
                        <div class="grid grid-cols-3 gap-4 mb-6 mt-8">
                            <div class="bg-white/5 rounded-xl p-3 text-center border border-white/5">
                                <p class="text-xl font-extrabold text-primary" x-text="formatCurrency(salesData[0])"></p>
                                <p class="text-xs text-gray-500">Today's Sales</p>
                            </div>
                            <div class="bg-white/5 rounded-xl p-3 text-center border border-white/5">
                                <p class="text-xl font-extrabold text-accent" x-text="transactionsCount"></p>
                                <p class="text-xs text-gray-500">Transactions</p>
                            </div>
                            <div class="bg-white/5 rounded-xl p-3 text-center border border-white/5">
                                <p class="text-xl font-extrabold text-green-400" x-text="'+' + growthPercent + '%'"></p>
                                <p class="text-xs text-gray-500">vs Yesterday</p>
                            </div>
                        </div>
                        
                        {{-- Bar Chart --}}
                        <div class="bg-white/5 rounded-xl p-4 mb-4 border border-white/5">
                            <div class="flex items-center justify-between mb-3">
                                <p class="text-sm font-bold text-white">Sales Overview</p>
                                <div class="flex items-center gap-2">
                                    <span class="w-2 h-2 bg-primary rounded-full"></span>
                                    <span class="text-xs text-gray-500">Last 7 days</span>
                                </div>
                            </div>
                            <div class="flex items-end justify-between gap-2 h-32">
                                <template x-for="(value, index) in barChartData" :key="index">
                                    <div class="flex-1 flex flex-col items-center gap-1">
                                        <div class="w-full bg-white/10 rounded-t-lg relative overflow-hidden transition-all duration-500" 
                                             :style="{ height: (value / Math.max(...barChartData) * 100) + '%' }">
                                            <div class="absolute inset-0 bg-gradient-to-t from-primary to-primary-light animate-[pulse_2s_ease-in-out_infinite]"
                                                 :style="{ animationDelay: (index * 0.1) + 's' }"></div>
                                        </div>
                                        <span class="text-xs text-gray-500" x-text="barChartLabels[index]"></span>
                                    </div>
                                </template>
                            </div>
                        </div>
                        
                        {{-- Line Chart --}}
                        <div class="bg-white/5 rounded-xl p-4 border border-white/5">
                            <div class="flex items-center justify-between mb-3">
                                <p class="text-sm font-bold text-white">Real-Time Activity</p>
                                <span class="text-xs text-accent animate-pulse">● Live</span>
                            </div>
                            <div class="relative h-24 overflow-hidden">
                                <svg class="w-full h-full" viewBox="0 0 300 80" preserveAspectRatio="none">
                                    <defs>
                                        <linearGradient id="lineGradient" x1="0%" y1="0%" x2="100%" y2="0%">
                                            <stop offset="0%" style="stop-color:#eab308;stop-opacity:1" />
                                            <stop offset="100%" style="stop-color:#65a30d;stop-opacity:1" />
                                        </linearGradient>
                                        <linearGradient id="areaGradient" x1="0%" y1="0%" x2="0%" y2="100%">
                                            <stop offset="0%" style="stop-color:#65a30d;stop-opacity:0.3" />
                                            <stop offset="100%" style="stop-color:#65a30d;stop-opacity:0" />
                                        </linearGradient>
                                    </defs>
                                    <path fill="url(#areaGradient)" :d="areaPath" />
                                    <path fill="none" stroke="url(#lineGradient)" stroke-width="2" :d="linePath" />
                                    <template x-for="(point, i) in lineChartData" :key="i">
                                        <circle :cx="(i * 300) / (lineChartData.length - 1)" :cy="point" r="3" fill="#65a30d" class="animate-pulse" :style="{ animationDelay: (i * 0.2) + 's' }" />
                                    </template>
                                </svg>
                            </div>
                            <div class="flex items-center justify-between mt-2">
                                <span class="text-xs text-gray-500">00:00</span>
                                <span class="text-xs text-gray-500">Now</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Industries We Serve - Lime/Green Background --}}
    <section class="py-16 bg-gradient-to-br from-primary/10 via-primary/5 to-transparent border-y border-primary/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="text-xs font-bold text-primary uppercase tracking-widest">INDUSTRIES</span>
                <h2 class="text-3xl font-extrabold text-gray-900 mt-2">Industries We Serve</h2>
                <p class="text-gray-600 mt-4 max-w-2xl mx-auto">
                    Our POS solutions are tailored for various business types across South Africa
                </p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                <div class="group bg-white rounded-2xl p-6 text-center hover:shadow-lg transition-all duration-300 border border-primary/10 hover:border-primary/50">
                    <div class="w-16 h-16 bg-primary/20 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-primary/30 transition-colors">
                        <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 text-sm">Retail Stores</h3>
                </div>
                
                <div class="group bg-white rounded-2xl p-6 text-center hover:shadow-lg transition-all duration-300 border border-primary/10 hover:border-primary/50">
                    <div class="w-16 h-16 bg-primary/20 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-primary/30 transition-colors">
                        <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 text-sm">Spaza Shops</h3>
                </div>
                
                <div class="group bg-white rounded-2xl p-6 text-center hover:shadow-lg transition-all duration-300 border border-primary/10 hover:border-primary/50">
                    <div class="w-16 h-16 bg-primary/20 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-primary/30 transition-colors">
                        <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0A1.5 1.5 0 003 15.546V7.5a3 3 0 013-3h12a3 3 0 013 3v8.046z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 text-sm">Supermarkets</h3>
                </div>
                
                <div class="group bg-white rounded-2xl p-6 text-center hover:shadow-lg transition-all duration-300 border border-primary/10 hover:border-primary/50">
                    <div class="w-16 h-16 bg-primary/20 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-primary/30 transition-colors">
                        <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 text-sm">Restaurants</h3>
                </div>
                
                <div class="group bg-white rounded-2xl p-6 text-center hover:shadow-lg transition-all duration-300 border border-primary/10 hover:border-primary/50">
                    <div class="w-16 h-16 bg-primary/20 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-primary/30 transition-colors">
                        <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 text-sm">Bars & Cafes</h3>
                </div>
                
                <div class="group bg-white rounded-2xl p-6 text-center hover:shadow-lg transition-all duration-300 border border-primary/10 hover:border-primary/50">
                    <div class="w-16 h-16 bg-primary/20 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-primary/30 transition-colors">
                        <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 text-sm">Boutiques</h3>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section - Matching hero dark gradient --}}
    <section class="py-20 relative overflow-hidden" style="background: linear-gradient(135deg, #020617 0%, #1e293b 40%, #334155 70%, #1e293b 100%);">
        <div class="absolute inset-0 opacity-30">
            <div class="absolute top-0 right-0 w-96 h-96 bg-primary rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-72 h-72 bg-accent rounded-full blur-3xl"></div>
        </div>
        
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative">
            <h2 class="text-3xl md:text-5xl font-extrabold text-white mb-4 tracking-tight">
                Ready to Upgrade Your Business?
            </h2>
            <p class="text-gray-400 text-lg mb-8 max-w-2xl mx-auto">
                Get a complete POS system with free lifetime software. No monthly fees, ever. Contact us today for a free consultation.
            </p>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('shop.index') }}?category=pos-systems" class="inline-flex items-center justify-center gap-2 px-10 py-4 bg-gradient-to-r from-primary to-primary-light text-white font-bold rounded-xl hover:from-primary-dark hover:to-primary transition-all duration-300 shadow-lg shadow-primary/25">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    Shop POS Systems
                </a>
                <a href="https://wa.me/27743551336?text=Hi%21%20I%27d%20like%20a%20quote%20for%20a%20POS%20system" 
                   target="_blank" 
                   class="inline-flex items-center justify-center gap-2 px-10 py-4 bg-white/5 backdrop-blur-sm border border-white/20 text-white font-semibold rounded-xl hover:bg-white/10 hover:border-white/30 transition-all duration-300">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.012-.172-.249-.018-.384.13-.506.135-.11.3-.286.449-.429.147-.143.196-.249.296-.415.099-.166.05-.305-.025-.43-.074-.124-.67-1.61-.918-2.205-.242-.578-.489-.498-.67-.506-.172-.009-.37-.013-.568-.013-.197 0-.518.074-.79.371-.273.297-1.04 1.014-1.04 2.467 0 1.453 1.065 2.851 1.213 3.05.149.199 2.092 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                    Get Free Quote
                </a>
            </div>
        </div>
    </section>

    {{-- Animated Dashboard Script --}}
    <script>
        function animatedDashboard() {
            return {
                salesData: [45200, 38150, 52300, 41800, 48900, 55200, 62100],
                barChartData: [12, 19, 15, 25, 22, 30, 28],
                barChartLabels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                lineChartData: Array.from({ length: 10 }, () => Math.floor(Math.random() * 40) + 30),
                transactionsCount: 0,
                growthPercent: 0,
                baseSales: 45200,
                
                get linePath() {
                    const points = this.lineChartData.map((y, i) => {
                        const x = (i * 300) / (this.lineChartData.length - 1);
                        const normalizedY = 80 - ((y - 20) / 50) * 60;
                        return `${x},${normalizedY}`;
                    });
                    return `M${points.join(' L')}`;
                },
                
                get areaPath() {
                    const points = this.lineChartData.map((y, i) => {
                        const x = (i * 300) / (this.lineChartData.length - 1);
                        const normalizedY = 80 - ((y - 20) / 50) * 60;
                        return `${x},${normalizedY}`;
                    });
                    return `M0,80 L${points.join(' L')} L300,80 Z`;
                },
                
                init() {
                    this.transactionsCount = Math.floor(Math.random() * 50) + 100;
                    this.growthPercent = Math.floor(Math.random() * 15) + 10;
                    
                    setInterval(() => {
                        this.lineChartData = [...this.lineChartData.slice(1), Math.floor(Math.random() * 40) + 30];
                        this.transactionsCount += Math.floor(Math.random() * 3);
                        const change = Math.floor(Math.random() * 1000) - 300;
                        this.salesData[0] = Math.max(30000, this.salesData[0] + change);
                    }, 3000);
                },
                
                formatCurrency(value) {
                    return 'R' + (value / 1000).toFixed(1) + 'K';
                }
            }
        }
    </script>
</x-layouts.app>
