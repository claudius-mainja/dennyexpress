<x-layouts.app title="Denny Express | POS Systems & IT Hardware">
    {{-- Hero Section - Full responsive height --}}
    <section class="relative min-h-[80dvh] flex items-center overflow-hidden py-8 sm:py-12 lg:py-0" style="background: linear-gradient(135deg, #020617 0%, #1e293b 40%, #334155 70%, #1e293b 100%);">
        <div class="absolute inset-0 opacity-30">
            <div class="absolute top-0 right-0 w-48 sm:w-96 h-48 sm:h-96 bg-primary rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-48 sm:w-72 h-48 sm:h-72 bg-accent rounded-full blur-3xl"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[300px] sm:w-[600px] h-[300px] sm:h-[600px] bg-primary/5 rounded-full blur-3xl"></div>
        </div>
        
        <div class="absolute inset-0 opacity-10">
            <div class="w-full h-full" style="background-image: linear-gradient(rgba(255,255,255,0.1) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.1) 1px, transparent 1px); background-size: 50px 50px;"></div>
        </div>
        
        <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative py-6 md:py-0">
            <div class="grid lg:grid-cols-2 gap-6 lg:gap-12 items-center">
                 <div class="max-w-xl w-full">
                     <div class="inline-flex items-center gap-2 px-3 sm:px-4 py-1.5 sm:py-2 bg-primary/20 backdrop-blur-sm border border-primary/30 rounded-full mb-2 mt-2 sm:mt-6">
                         <span class="w-1.5 sm:w-2 h-1.5 sm:h-2 bg-accent rounded-full animate-pulse"></span>
                         <span class="text-xs sm:text-sm font-medium text-white">Denny Express Group Brings:</span>
                     </div>
                    
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl xl:text-6xl font-black text-white mb-4 sm:mb-6 tracking-tight uppercase leading-tight">
                        Premium
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-light to-accent"> POS Hardware</span>
                        for Your Business
                    </h1>
                    
                    <p class="text-gray-300 text-sm sm:text-base lg:text-lg leading-relaxed mb-4 sm:mb-8">
                        Complete POS ( Point of Sale) systems with touch terminals, receipt printers, barcode scanners, cash drawers, and butcher weighing scales. 
                        <span class="text-white font-semibold">DennyPOS locally-installed software</span> — works offline, your data stays on-premises.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-3 sm:gap-4">
                        <a href="{{ route('shop.index') }}?category=pos-systems" class="inline-flex items-center justify-center gap-2 px-6 sm:px-8 py-3 sm:py-4 bg-gradient-to-r from-primary to-primary-light text-white text-xs sm:text-sm font-bold rounded-xl hover:from-primary-dark hover:to-primary transition-all duration-300 shadow-lg shadow-primary/25">
                            <svg class="w-4 sm:w-5 h-4 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                            Shop POS Systems
                        </a>
                        <a href="https://wa.me/27743551336?text=Hi%21%20I%27m%20interested%20in%20POS%20systems" 
                           target="_blank" 
                           class="inline-flex items-center justify-center gap-2 px-6 sm:px-8 py-3 sm:py-4 bg-white/5 backdrop-blur-sm border border-white/20 text-white text-xs sm:text-sm font-semibold rounded-xl hover:bg-white/10 hover:border-white/30 transition-all duration-300">
                            <svg class="w-4 sm:w-5 h-4 sm:h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.012-.172-.249-.018-.384.13-.506.135-.11.3-.286.449-.429.147-.143.196-.249.296-.415.099-.166.05-.305-.025-.43-.074-.124-.67-1.61-.918-2.205-.242-.578-.489-.498-.67-.506-.172-.009-.37-.013-.568-.013-.197 0-.518.074-.79.371-.273.297-1.04 1.014-1.04 2.467 0 1.453 1.065 2.851 1.213 3.05.149.199 2.092 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                            Get Free Quote
                        </a>
                    </div>
                    
                    <div class="grid grid-cols-3 gap-3 sm:gap-4 mt-8 sm:mt-12 pt-4 border-t border-white/10">
                        <div class="text-center">
                            <p class="text-lg sm:text-2xl font-black text-primary">DennyPOS</p>
                            <p class="text-xs sm:text-sm text-gray-400">Locally Installed</p>
                        </div>
                        <div class="text-center">
                            <p class="text-lg sm:text-2xl font-black text-primary">With</p>
                            <p class="text-xs sm:text-sm text-gray-400">Monthly Warranty</p>
                        </div>
                        <div class="text-center">
                            <p class="text-lg sm:text-2xl font-black text-primary">Delivery</p>
                            <p class="text-xs sm:text-sm text-gray-400">Nationwide</p>
                        </div>
                    </div>
                </div>
                
                 <div class="hidden lg:block">
                     <div class="relative h-full flex items-center justify-end">
                         <div class="absolute inset-0 bg-primary/20 rounded-2xl blur-2xl"></div>
                         <img src="{{ asset('images/hero1.png') }}" 
                              alt="POS Systems & IT Hardware" 
                              class="relative w-full h-auto max-h-[60vh] object-contain object-right rounded-2xl shadow-xl border border-white/10">
                     </div>
                 </div>
            </div>
        </div>
    </section>

    {{-- Sale Products Scrolling Loop --}}
    @if ($saleProducts && $saleProducts->count() > 0)
    <section class="py-12 overflow-hidden border-y border-white/5" style="background: linear-gradient(135deg, #020617 0%, #1e293b 50%, #020617 100%);">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-8">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <div class="relative">
                        <span class="px-4 py-2 bg-error text-white text-sm font-bold rounded-lg animate-pulse">
                            🔥 SALE
                        </span>
                    </div>
                    <div>
                        <span class="text-xs font-bold text-accent uppercase tracking-widest">LIMITED TIME OFFERS</span>
                        <h2 class="text-2xl font-black text-white uppercase">Hot Deals</h2>
                    </div>
                </div>
                <a href="{{ route('shop.index') }}?on_sale=1" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-error to-red-600 text-white text-sm font-bold rounded-xl hover:from-red-600 hover:to-red-700 transition-all shadow-lg shadow-red-500/25">
                    View All Deals
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>

        <div class="relative">
            <div class="flex gap-6 animate-[scroll_35s_linear_infinite] hover:pause" 
                 style="animation-duration: 35s;">
                @foreach ($saleProducts->merge($saleProducts) as $product)
                <div class="flex-shrink-0 w-[220px] group">
                    <div class="relative bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl p-4 hover:border-primary/50 hover:bg-white/10 transition-all duration-300">
                        @php
                            $originalPrice = $product->price ?? 0;
                            $salePrice = $product->sale_price ?? $originalPrice;
                            $hasDiscount = $salePrice < $originalPrice;
                            $discountPercent = $hasDiscount ? round((($originalPrice - $salePrice) / $originalPrice) * 100) : 0;
                        @endphp
                        
                        @if ($hasDiscount || $product->on_sale)
                        <div class="absolute top-3 left-3 z-10">
                            <span class="px-2 py-1 bg-error text-white text-xs font-black rounded-lg">
                                -{{ max($discountPercent, ($product->discount_percentage ?? 10)) }}%
                            </span>
                        </div>
                        @endif

                        <div class="relative h-36 mb-3 bg-white/5 rounded-xl flex items-center justify-center overflow-hidden">
                            <img src="{{ $product->primaryImage?->image_url ?? asset('images/logos/denny-logo.webp') }}" 
                                 alt="{{ $product->name }}"
                                 class="w-full h-full object-contain p-2 group-hover:scale-110 transition-transform duration-500">
                        </div>

                        <div>
                            <h3 class="text-sm font-semibold text-white line-clamp-2 mb-2 group-hover:text-primary transition-colors">
                                {{ $product->name }}
                            </h3>
                            <div class="flex items-center gap-2">
                                @if ($hasDiscount)
                                <span class="text-xs text-gray-500 line-through">R{{ number_format($originalPrice, 2) }}</span>
                                <span class="text-lg font-black text-accent">R{{ number_format($salePrice, 2) }}</span>
                                @else
                                <span class="text-lg font-black text-primary">R{{ number_format($originalPrice, 2) }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- Search Section - Live Search --}}
    <section class="py-6 sm:py-8 border-b border-white/5" style="background: linear-gradient(135deg, #020617 0%, #1e293b 50%, #020617 100%);">
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
    <section class="py-6 sm:py-8 border-b border-white/5" style="background: linear-gradient(135deg, #020617 0%, #1e293b 50%, #020617 100%);">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-6">
                <div class="flex items-center gap-3 p-3 sm:p-4 bg-white/5 rounded-2xl border border-white/5">
                    <div class="w-8 sm:w-10 h-8 sm:h-10 bg-primary/20 rounded-xl flex items-center justify-center shrink-0">
                        <svg class="w-4 sm:w-5 h-4 sm:h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <div class="min-w-0">
                        <p class="text-xs sm:text-sm font-bold text-white truncate">Free Delivery</p>
                        <p class="text-[10px] sm:text-xs text-gray-500 truncate">Orders over R5,000</p>
                    </div>
                </div>
                <div class="flex items-center gap-3 p-3 sm:p-4 bg-white/5 rounded-2xl border border-white/5">
                    <div class="w-8 sm:w-10 h-8 sm:h-10 bg-accent/20 rounded-xl flex items-center justify-center shrink-0">
                        <svg class="w-4 sm:w-5 h-4 sm:h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <div class="min-w-0">
                        <p class="text-xs sm:text-sm font-bold text-white truncate">18 Month Warranty</p>
                        <p class="text-[10px] sm:text-xs text-gray-500 truncate">On all products</p>
                    </div>
                </div>
                <div class="flex items-center gap-3 p-3 sm:p-4 bg-white/5 rounded-2xl border border-white/5">
                    <div class="w-8 sm:w-10 h-8 sm:h-10 bg-primary/20 rounded-xl flex items-center justify-center shrink-0">
                        <svg class="w-4 sm:w-5 h-4 sm:h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                        </svg>
                    </div>
                    <div class="min-w-0">
                        <p class="text-xs sm:text-sm font-bold text-white truncate">Free POS Software</p>
                        <p class="text-[10px] sm:text-xs text-gray-500 truncate">Lifetime license</p>
                    </div>
                </div>
                <div class="flex items-center gap-3 p-3 sm:p-4 bg-white/5 rounded-2xl border border-white/5">
                    <div class="w-8 sm:w-10 h-8 sm:h-10 bg-accent/20 rounded-xl flex items-center justify-center shrink-0">
                        <svg class="w-4 sm:w-5 h-4 sm:h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <div class="min-w-0">
                        <p class="text-xs sm:text-sm font-bold text-white truncate">Nationwide Delivery</p>
                        <p class="text-[10px] sm:text-xs text-gray-500 truncate">All over SA</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Popular Products - Slate-200 Light Background --}}
    @if ($featuredProducts && $featuredProducts->count() > 0)
    <section class="py-10 sm:py-16 bg-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-6 sm:mb-10 gap-4">
                 <div>
                     <span class="text-[10px] sm:text-xs font-bold text-primary uppercase tracking-widest">OUR PRODUCTS</span>
                     <h2 class="text-2xl sm:text-3xl font-black text-gray-900 mt-1 sm:mt-2 uppercase">Popular POS Systems</h2>
                 </div>
                <a href="{{ route('shop.index') }}" class="inline-flex items-center gap-2 px-5 sm:px-6 py-2.5 sm:py-3 bg-primary text-white text-xs sm:text-sm font-bold rounded-xl hover:bg-primary-dark transition-colors">
                    View All Products
                    <svg class="w-3 sm:w-4 h-3 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
            
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-3 sm:gap-4 md:gap-6">
                @foreach ($featuredProducts as $product)
                    <x-product.card :product="$product" />
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- POS Software Section with Animated Graphs --}}
    <section class="py-12 sm:py-20 relative overflow-hidden" style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 40%, #0f172a 100%);">
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
                        <span class="text-sm font-bold text-primary">DENNY POS System Software</span>
                    </div>
                    
                      <h2 class="text-3xl md:text-5xl font-black text-white mb-6 tracking-tight uppercase">
                          It's Time to Get
                          <span class="block text-transparent bg-clip-text bg-gradient-to-r from-primary-light to-accent mt-2 uppercase">Full Control On-Premises</span>
                      </h2>
                     
                     <p class="text-gray-400 text-lg mb-8 leading-relaxed">
                         DennyPOS is a powerful, locally-installed Point of Sale system that puts you in complete control of your business operations. Unlike cloud-based solutions, your data stays on your premises, ensuring maximum security, reliability, and performance — even when the internet is down.
                     </p>
                    
                    <div class="space-y-4 mb-10">
                        <div class="flex items-center gap-4 p-4 bg-white/5 rounded-xl border border-white/5 hover:border-primary/30 transition-all">
                            <div class="w-12 h-12 bg-gradient-to-br from-primary to-primary-light rounded-xl flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                </svg>
                            </div>
                             <div>
                                 <h3 class="font-black text-white uppercase">Real-Time Inventory</h3>
                                 <p class="text-sm text-gray-500 font-medium">Track stock levels instantly with automated alerts</p>
                             </div>
                        </div>
                        
                        <div class="flex items-center gap-4 p-4 bg-white/5 rounded-xl border border-white/5 hover:border-accent/30 transition-all">
                            <div class="w-12 h-12 bg-gradient-to-br from-accent to-yellow-500 rounded-xl flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                            </div>
                             <div>
                                 <h3 class="font-black text-white uppercase">AI-Powered Analytics</h3>
                                 <p class="text-sm text-gray-500 font-medium">Smart insights to boost your sales and profits</p>
                             </div>
                        </div>
                        
                        <div class="flex items-center gap-4 p-4 bg-white/5 rounded-xl border border-white/5 hover:border-primary/30 transition-all">
                            <div class="w-12 h-12 bg-gradient-to-br from-primary to-primary-light rounded-xl flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                             <div>
                                 <h3 class="font-black text-white uppercase">Customer Loyalty</h3>
                                 <p class="text-sm text-gray-500 font-medium">Build lasting relationships with rewards programs</p>
                             </div>
                        </div>
                        
                        <div class="flex items-center gap-4 p-4 bg-white/5 rounded-xl border border-white/5 hover:border-accent/30 transition-all">
                            <div class="w-12 h-12 bg-gradient-to-br from-accent to-yellow-500 rounded-xl flex items-center justify-center shrink-0">
                                <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>
                            </div>
                             <div>
                                 <h3 class="font-black text-white uppercase">Lifetime Updates</h3>
                                 <p class="text-sm text-gray-500 font-medium">Free upgrades and new features forever</p>
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
                         <a href="https://wa.me/27743551336?text=Hi%21%20Tell%20me%20more%20about%20DennyPOS%20software" target="_blank" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-white/5 border border-white/20 text-white font-semibold rounded-xl hover:bg-white/10 transition-all">
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
    <section class="py-10 sm:py-16 bg-gradient-to-br from-primary/10 via-primary/5 to-transparent border-y border-primary/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
             <div class="text-center mb-8 sm:mb-12">
                 <span class="text-[10px] sm:text-xs font-bold text-primary uppercase tracking-widest">INDUSTRIES</span>
                 <h2 class="text-2xl sm:text-3xl font-black text-gray-900 mt-1 sm:mt-2 uppercase">Industries We Serve</h2>
                 <p class="text-gray-600 mt-2 sm:mt-4 max-w-2xl mx-auto text-sm sm:text-base font-medium">
                     Our POS solutions are tailored for various business types across South Africa
                 </p>
             </div>
            
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-3 sm:gap-4">
                <div class="group bg-white rounded-xl sm:rounded-2xl p-4 sm:p-6 text-center hover:shadow-lg transition-all duration-300 border border-primary/10 hover:border-primary/50">
                    <div class="w-12 sm:w-16 h-12 sm:h-16 bg-primary/20 rounded-xl sm:rounded-2xl flex items-center justify-center mx-auto mb-3 sm:mb-4 group-hover:bg-primary/30 transition-colors">
                        <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                     <h3 class="font-black text-gray-900 text-sm uppercase">Retail Stores</h3>
                </div>
                
                <div class="group bg-white rounded-2xl p-6 text-center hover:shadow-lg transition-all duration-300 border border-primary/10 hover:border-primary/50">
                    <div class="w-16 h-16 bg-primary/20 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-primary/30 transition-colors">
                        <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                     <h3 class="font-black text-gray-900 text-sm uppercase">Spaza Shops</h3>
                </div>
                
                <div class="group bg-white rounded-2xl p-6 text-center hover:shadow-lg transition-all duration-300 border border-primary/10 hover:border-primary/50">
                    <div class="w-16 h-16 bg-primary/20 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-primary/30 transition-colors">
                        <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0A1.5 1.5 0 003 15.546V7.5a3 3 0 013-3h12a3 3 0 013 3v8.046z" />
                        </svg>
                    </div>
                     <h3 class="font-black text-gray-900 text-sm uppercase">Supermarkets</h3>
                </div>
                
                <div class="group bg-white rounded-2xl p-6 text-center hover:shadow-lg transition-all duration-300 border border-primary/10 hover:border-primary/50">
                    <div class="w-16 h-16 bg-primary/20 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-primary/30 transition-colors">
                        <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                    </div>
                     <h3 class="font-black text-gray-900 text-sm uppercase">Restaurants</h3>
                </div>
                
                <div class="group bg-white rounded-2xl p-6 text-center hover:shadow-lg transition-all duration-300 border border-primary/10 hover:border-primary/50">
                    <div class="w-16 h-16 bg-primary/20 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-primary/30 transition-colors">
                        <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                        </svg>
                    </div>
                     <h3 class="font-black text-gray-900 text-sm uppercase">Bars & Cafes</h3>
                </div>
                
                <div class="group bg-white rounded-2xl p-6 text-center hover:shadow-lg transition-all duration-300 border border-primary/10 hover:border-primary/50">
                    <div class="w-16 h-16 bg-primary/20 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-primary/30 transition-colors">
                        <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                    </div>
                     <h3 class="font-black text-gray-900 text-sm uppercase">Boutiques</h3>
                </div>
            </div>
         </div>
     </section>

    {{-- Why Choose Us Section --}}
    <section class="relative py-16 sm:py-24 overflow-hidden bg-gradient-to-br from-gray-950 via-gray-900 to-gray-950">
        <div class="absolute inset-0 opacity-[0.04]" style="background-image: repeating-linear-gradient(0deg, transparent, transparent 50px, rgba(255,255,255,.12) 50px, rgba(255,255,255,.12) 51px), repeating-linear-gradient(90deg, transparent, transparent 50px, rgba(255,255,255,.12) 50px, rgba(255,255,255,.12) 51px);"></div>
        <div class="absolute top-20 left-1/4 w-96 h-96 bg-primary/10 rounded-full blur-[150px]"></div>
        <div class="absolute bottom-20 right-1/4 w-80 h-80 bg-accent/5 rounded-full blur-[120px]"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-12 sm:mb-16">
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-primary/10 rounded-full border border-primary/20 text-primary text-xs font-semibold tracking-wider uppercase mb-4">
                    <span class="w-1.5 h-1.5 bg-primary rounded-full animate-pulse"></span>
                    Why Denny Express
                </div>
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-black text-white uppercase tracking-tight">
                    Built Different.<br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-accent">Built for You.</span>
                </h2>
                <p class="text-gray-400 mt-4 max-w-2xl mx-auto text-sm sm:text-base font-medium">
                    We're not just another hardware supplier. We're your technology partner for long-term success.
                </p>
            </div>

            <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 items-center">
                <div class="relative group">
                    <div class="absolute -inset-1 bg-gradient-to-r from-primary via-accent to-primary rounded-3xl blur-xl opacity-50 group-hover:opacity-75 transition-opacity duration-500"></div>
                    <div class="relative bg-gray-800/80 backdrop-blur-sm rounded-2xl overflow-hidden border border-gray-700/50">
                        <div class="absolute top-4 left-4 flex items-center gap-1.5">
                            <span class="w-3 h-3 rounded-full bg-red-500"></span>
                            <span class="w-3 h-3 rounded-full bg-yellow-500"></span>
                            <span class="w-3 h-3 rounded-full bg-green-500"></span>
                        </div>
                        <img src="{{ asset('images/whyus.png') }}"
                             alt="Why Denny Express"
                             class="w-full h-auto object-cover"
                             loading="lazy"
                             onerror="this.parentElement.innerHTML = '<div class=\'flex items-center justify-center h-96 text-gray-500\'><svg class=\'w-16 h-16 mb-4 opacity-50\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'1.5\' d=\'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z\' /></svg><p class=\'text-sm\'>Image unavailable</p></div>'">
                    </div>
                    <div class="absolute -bottom-4 -right-4 w-24 h-24 border border-primary/30 rounded-full flex items-center justify-center animate-pulse hidden lg:flex">
                        <div class="w-16 h-16 border border-accent/40 rounded-full flex items-center justify-center">
                            <div class="w-8 h-8 bg-primary/20 rounded-full"></div>
                        </div>
                    </div>
                </div>

                <div class="space-y-5">
                    @php
                        $whyChoose = [
                            [
                                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />',
                                'title' => 'On-Premises Data Control',
                                'desc' => 'DennyPOS keeps your data local — no cloud dependency, no downtime when internet fails, complete ownership of your business information.',
                            ],
                            [
                                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />',
                                'title' => 'Same-Day Support',
                                'desc' => 'Our certified engineers respond within hours, not days. Remote support and on-site installation available in major metros across South Africa.',
                            ],
                            [
                                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />',
                                'title' => 'Local R&D & Customization',
                                'desc' => 'DennyPOS is developed in South Africa for South African businesses. We understand VAT, UIF, local regulations — and we can customize features for your needs.',
                            ],
                            [
                                'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />',
                                'title' => 'No Recurring Fees',
                                'desc' => 'One-time purchase, lifetime use. No monthly subscriptions, no per-register fees, no hidden charges. Your investment keeps working for you forever.',
                            ],
                        ];
                    @endphp

                    @foreach ($whyChoose as $item)
                    <div class="group relative bg-gray-800/40 backdrop-blur-sm rounded-xl p-5 border border-gray-700/50 hover:border-primary/40 transition-all duration-300 cursor-default">
                        <div class="absolute inset-0 bg-gradient-to-r from-primary/5 to-transparent rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="relative flex items-start gap-4">
                            <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-primary/20 to-accent/20 border border-primary/20 flex items-center justify-center shrink-0 group-hover:scale-110 group-hover:shadow-lg group-hover:shadow-primary/20 transition-all duration-300">
                                <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    {!! $item['icon'] !!}
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-base font-bold text-white group-hover:text-primary transition-colors">
                                    {{ $item['title'] }}
                                </h3>
                                <p class="text-sm text-gray-400 mt-1 leading-relaxed group-hover:text-gray-300 transition-colors">
                                    {{ $item['desc'] }}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
     </section>

    {{-- Our Clients & Partners Section --}}
    <section class="py-10 sm:py-16 bg-gray-50 border-y border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8 sm:mb-12">
                <span class="text-[10px] sm:text-xs font-black text-primary uppercase tracking-widest">TRUSTED BY</span>
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-black text-gray-900 mt-2 sm:mt-3 uppercase">Our Clients & Partners</h2>
                <p class="text-gray-600 mt-2 sm:mt-4 max-w-2xl mx-auto text-sm sm:text-base font-medium">
                    Over 5000+ businesses across South Africa trust Denny Express for their POS needs.
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 sm:gap-8 items-center">
                @php
                    $clientLogos = [
                        ['name' => 'Puma', 'url' => 'https://dennyexpress.co.za/wp-content/uploads/2026/02/puma.webp'],
                        ['name' => 'Pure Water', 'url' => 'https://dennyexpress.co.za/wp-content/uploads/2026/02/PureWater5-04RcOQZDkdjdzoPm6uWyWA.png'],
                        ['name' => 'Kwazionke', 'url' => 'https://dennyexpress.co.za/wp-content/uploads/2026/02/kwazionke.png'],
                        ['name' => 'Bomma', 'url' => 'https://dennyexpress.co.za/wp-content/uploads/2026/02/bomma-logo-e1666314818771.png'],
                        ['name' => 'Bling Girl', 'url' => 'https://dennyexpress.co.za/wp-content/uploads/2026/02/bling-girl-official_logo.jpg'],
                        ['name' => 'Miss Moo Nail', 'url' => 'https://dennyexpress.co.za/wp-content/uploads/2026/02/miss-moo-nail-1.jpg'],
                        ['name' => 'SCC', 'url' => 'https://dennyexpress.co.za/wp-content/uploads/2026/02/SCC-Logo-Label.jpg'],
                        ['name' => 'PIT', 'url' => 'https://dennyexpress.co.za/wp-content/uploads/2026/02/PIT-Logo-Full-ColourSmall.png']
                    ];
                @endphp

                @foreach ($clientLogos as $logo)
                <div class="flex items-center justify-center p-4 sm:p-6 bg-white rounded-xl sm:rounded-2xl border border-gray-200 hover:border-primary/30 hover:shadow-lg transition-all duration-300 group">
                    <img src="{{ $logo['url'] }}" 
                         alt="{{ $logo['name'] }}" 
                         class="h-10 sm:h-14 max-w-[100px] sm:max-w-[140px] object-contain opacity-90 group-hover:opacity-100 transition-opacity"
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <div class="hidden items-center justify-center w-full h-10 sm:h-14">
                        <span class="text-xs sm:text-sm font-black text-gray-400 uppercase">{{ $logo['name'] }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Testimonials Section --}}
    <section class="py-12 sm:py-20 relative overflow-hidden" style="background: linear-gradient(135deg, #020617 0%, #1e293b 40%, #020617 100%);">
        <div class="absolute inset-0">
            <div class="absolute top-0 left-0 w-48 sm:w-96 h-48 sm:h-96 bg-primary/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 right-0 w-48 sm:w-96 h-48 sm:h-96 bg-accent/10 rounded-full blur-3xl"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="text-center mb-8 sm:mb-16">
                <span class="text-[10px] sm:text-xs font-black text-accent uppercase tracking-widest">TESTIMONIALS</span>
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-black text-white mt-2 sm:mt-3 uppercase">What Our Clients Say</h2>
                <p class="text-gray-400 mt-2 sm:mt-4 max-w-2xl mx-auto text-sm sm:text-base font-medium">
                    Based on 183+ reviews — hear from businesses that trust Denny Express
                </p>
            </div>

            <div x-data="{ activeSlide: 0 }" class="relative">
                <div class="grid md:grid-cols-3 gap-4 sm:gap-8">
                    @php
                        $testimonials = [
                            [
                                'name' => 'Kabelo Mbuli',
                                'location' => 'Morokweng, North West',
                                'text' => 'Good service, I bought for my bottle store everything new and system is working fine thank you Denny Express, my stock is always balanced.',
                                'rating' => 5,
                                'date' => '2026-01-20'
                            ],
                            [
                                'name' => 'Danielle Mailosi',
                                'location' => 'Gqeberha',
                                'text' => 'Thanks to Denny Express they delivered our POS in Gqeberha and their POS is user friendly.',
                                'rating' => 5,
                                'date' => '2026-01-10'
                            ],
                            [
                                'name' => 'Zenande Ngomane',
                                'location' => 'South Africa',
                                'text' => 'Thank you Denny Express I am no longer paying monthly, you saved me guys!',
                                'rating' => 5,
                                'date' => '2026-01-09'
                            ],
                            [
                                'name' => 'Themko Bhomu',
                                'location' => 'Tonga',
                                'text' => 'The service was good at Tonga and product quality is excellent.',
                                'rating' => 5,
                                'date' => '2026-01-09'
                            ],
                            [
                                'name' => 'Asamiru Mavalani',
                                'location' => 'Great Giyani',
                                'text' => 'Denny Express Group is reliable and a company to trust. They delivered my POS very early in Great Giyani.',
                                'rating' => 5,
                                'date' => '2026-01-05'
                            ],
                            [
                                'name' => 'Nombuso Nxumalo',
                                'location' => 'South Africa',
                                'text' => 'Excellent service! They are good at making you understand what they are doing, and the person who gives you the practice is so patient.',
                                'rating' => 5,
                                'date' => '2025-12-27'
                            ]
                        ];
                    @endphp

                    @foreach ($testimonials as $t)
                    <div class="bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl sm:rounded-2xl p-5 sm:p-8 hover:border-primary/30 transition-all">
                        <div class="flex items-center gap-2 mb-3 sm:mb-4 flex-wrap">
                            <div class="flex items-center gap-1">
                                @for ($i = 0; $i < $t['rating']; $i++)
                                <svg class="w-4 sm:w-5 h-4 sm:h-5 text-accent" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                @endfor
                            </div>
                            <div class="flex items-center gap-1 ml-auto">
                                <svg class="w-4 sm:w-5 h-4 sm:h-5" viewBox="0 0 24 24" fill="none">
                                    <rect width="24" height="24" rx="4" fill="#4285F4"/>
                                    <text x="50%" y="50%" dominant-baseline="central" text-anchor="middle" fill="white" font-size="14" font-weight="bold">G</text>
                                </svg>
                                <span class="text-[10px] sm:text-xs text-gray-500 font-medium">Google</span>
                            </div>
                        </div>

                        <p class="text-gray-300 text-sm sm:text-base font-medium leading-relaxed mb-4 sm:mb-6">
                            "{{ $t['text'] }}"
                        </p>

                        <div class="flex items-center gap-3 sm:gap-4">
                            <div class="w-10 sm:w-12 h-10 sm:h-12 bg-gradient-to-br from-primary to-accent rounded-full flex items-center justify-center shrink-0">
                                <span class="text-white font-black text-xs sm:text-sm">{{ substr($t['name'], 0, 1) }}{{ substr(explode(' ', $t['name'])[1] ?? '', 0, 1) }}</span>
                            </div>
                            <div class="min-w-0">
                                <p class="text-white font-black text-xs sm:text-sm truncate">{{ $t['name'] }}</p>
                                <p class="text-gray-500 text-[10px] sm:text-xs font-medium truncate">{{ $t['location'] }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="text-center mt-8 sm:mt-12">
                <a href="https://search.google.com/local/reviews?placeid=DENNY_EXPRESS" target="_blank" class="inline-flex items-center gap-2 px-6 sm:px-8 py-3 sm:py-4 bg-white/5 backdrop-blur-sm border border-white/20 text-white text-xs sm:text-sm font-semibold rounded-xl hover:bg-white/10 hover:border-white/30 transition-all duration-300">
                    <svg class="w-4 sm:w-5 h-4 sm:h-5" viewBox="0 0 24 24" fill="none">
                        <rect width="24" height="24" rx="4" fill="#4285F4"/>
                        <text x="50%" y="50%" dominant-baseline="central" text-anchor="middle" fill="white" font-size="14" font-weight="bold">G</text>
                    </svg>
                    Read All Reviews on Google
                    <svg class="w-4 sm:w-5 h-4 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    {{-- FAQ Section --}}
    <section class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-xs font-black text-primary uppercase tracking-widest">FAQ</span>
                <h2 class="text-3xl md:text-4xl font-black text-gray-900 mt-3 uppercase">Frequently Asked Questions</h2>
                <p class="text-gray-600 mt-4 max-w-2xl mx-auto font-medium">
                    Quick answers to the questions we get asked most often.
                </p>
            </div>

            <div x-data="{ openPanel: 0 }" class="space-y-4">
                @php
                    $faqs = [
                        [
                            'q' => 'How do I place an order on Denny Express?',
                            'a' => 'Placing an order is easy! Just follow these steps: Browse our collection and select the gadget you\'d like to buy. Click "Add to Cart" on the product page. Once you\'re done shopping, click the cart icon at the top right of the page. Click "Checkout" and fill in your shipping details. Choose your preferred payment method and confirm your order. You\'ll receive an order confirmation email with the details of your order.'
                        ],
                        [
                            'q' => 'How can I track my order?',
                            'a' => 'Once your order is shipped, you\'ll receive a tracking number via email. You can use this number on our courier partner\'s website to monitor your shipment\'s progress. You can also track your order directly on our website using the Track Order feature.'
                        ],
                        [
                            'q' => 'Do your gadgets come with a warranty?',
                            'a' => 'Yes, all our products come with a manufacturer\'s warranty. The duration and terms vary by product; please refer to the product page for specific details. Standard warranty is 18 months on most products.'
                        ],
                        [
                            'q' => 'How can I contact customer service?',
                            'a' => 'You can reach us through our contact form on the website, by emailing sales@dennyexpress.co.za, or by calling our customer service hotline at 074 355 1336. We also offer WhatsApp support for quick inquiries.'
                        ],
                        [
                            'q' => 'Is DennyPOS cloud-based or locally installed?',
                            'a' => 'DennyPOS is locally installed on your premises. Unlike cloud solutions, your data never leaves your store. This means zero downtime when your internet is down, complete data ownership, and maximum security. Perfect for businesses dealing with load shedding or unreliable connectivity.'
                        ],
                        [
                            'q' => 'Do I pay monthly fees for DennyPOS?',
                            'a' => 'No. DennyPOS is a one-time purchase with lifetime use. There are no monthly subscriptions, no per-register fees, no hidden charges. You buy it once, you own it forever. Optional paid updates and extended support are available but never required.'
                        ],
                        [
                            'q' => 'What kind of support do you offer?',
                            'a' => 'We offer multiple support channels: WhatsApp (074 355 1336), email, phone, and remote desktop support during business hours. For clients in major metros, on-site installation and training are available. Emergency after-hours support is also provided for critical system issues.'
                        ],
                        [
                            'q' => 'Can DennyPOS handle load shedding?',
                            'a' => 'Absolutely. Since DennyPOS runs locally on your computer or server, it works perfectly with inverters and UPS systems. Even if your internet goes down during load shedding, you can still process sales, track inventory, and manage your business without interruption.'
                        ],
                        [
                            'q' => 'Is DennyPOS compliant with South African regulations?',
                            'a' => 'Yes. DennyPOS was specifically developed for the South African market. It includes full VAT management, compliant invoice generation, stock control features required for liquor license renewals, and reporting formats that align with local accounting standards and tax requirements.'
                        ],
                        [
                            'q' => 'Do you offer training for my staff?',
                            'a' => 'Yes. Every DennyPOS purchase includes free training. We offer on-site training in major metros and remote training nationwide. Our training covers everything from basic sales processing to advanced reporting, inventory management, and administrator functions. Refresher training is also available.'
                        ]
                    ];
                @endphp

                @foreach ($faqs as $index => $faq)
                <div class="bg-gray-50 rounded-2xl border border-gray-200 overflow-hidden hover:border-primary/30 transition-colors">
                    <button
                        @click="openPanel = openPanel === {{ $index }} ? null : {{ $index }}"
                        class="w-full flex items-center justify-between p-6 text-left"
                    >
                        <span class="font-black text-gray-900 pr-8">{{ $faq['q'] }}</span>
                        <div class="w-10 h-10 bg-primary/10 rounded-xl flex items-center justify-center shrink-0 transition-colors" :class="openPanel === {{ $index }} ? 'bg-primary text-white' : ''">
                            <svg
                                class="w-5 h-5 text-primary transition-all duration-200"
                                :class="openPanel === {{ $index }} ? 'rotate-180 text-white' : ''"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </button>
                    <div
                        x-show="openPanel === {{ $index }}"
                        x-collapse
                        class="px-6 pb-6"
                    >
                        <div class="pt-2 border-t border-gray-200">
                            <p class="text-gray-600 font-medium leading-relaxed">{{ $faq['a'] }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Still have questions CTA --}}
            <div class="mt-8 sm:mt-12 bg-gradient-to-br from-primary/5 to-accent/5 rounded-xl sm:rounded-2xl p-6 sm:p-8 md:p-10 border border-primary/20 text-center">
                <div class="w-16 h-16 bg-gradient-to-br from-primary to-accent rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-black text-gray-900 mb-3 uppercase">Still Have Questions?</h3>
                <p class="text-gray-600 mb-8 max-w-lg mx-auto font-medium">
                    Our team is ready to help you find the perfect POS solution for your business.
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="{{ route('pages.contact') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-primary text-white font-black rounded-xl hover:bg-primary-dark transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        Contact Us
                    </a>
                    <a href="https://wa.me/27743551336" target="_blank" class="inline-flex items-center gap-2 px-8 py-4 bg-green-500 text-white font-black rounded-xl hover:bg-green-600 transition-all">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.012-.172-.249-.018-.384.13-.506.135-.11.3-.286.449-.429.147-.143.196-.249.296-.415.099-.166.05-.305-.025-.43-.074-.124-.67-1.61-.918-2.205-.242-.578-.489-.498-.67-.506-.172-.009-.37-.013-.568-.013-.197 0-.518.074-.79.371-.273.297-1.04 1.014-1.04 2.467 0 1.453 1.065 2.851 1.213 3.05.149.199 2.092 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                        WhatsApp Us
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section - Matching hero dark gradient --}}
    <section class="py-12 sm:py-20 relative overflow-hidden" style="background: linear-gradient(135deg, #020617 0%, #1e293b 40%, #334155 70%, #1e293b 100%);">
        <div class="absolute inset-0 opacity-30">
            <div class="absolute top-0 right-0 w-48 sm:w-96 h-48 sm:h-96 bg-primary rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-48 sm:w-72 h-48 sm:h-72 bg-accent rounded-full blur-3xl"></div>
        </div>
        
         <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative">
               <h2 class="text-2xl sm:text-3xl md:text-5xl font-black text-white mb-3 sm:mb-4 tracking-tight uppercase">
                   Ready to Upgrade Your Business?
               </h2>
              <p class="text-gray-400 text-sm sm:text-base lg:text-lg mb-6 sm:mb-8 max-w-2xl mx-auto">
                  Get a complete POS system with DennyPOS — powerful locally-installed software with your data stays on your premises. No monthly fees, maximum security. Contact us today for a free consultation.
              </p>
            
            <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 justify-center">
                <a href="{{ route('shop.index') }}?category=pos-systems" class="inline-flex items-center justify-center gap-2 px-6 sm:px-10 py-3 sm:py-4 bg-gradient-to-r from-primary to-primary-light text-white font-bold rounded-xl hover:from-primary-dark hover:to-primary transition-all duration-300 shadow-lg shadow-primary/25">
                    <svg class="w-4 sm:w-5 h-4 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    Shop POS Systems
                </a>
                <a href="https://wa.me/27743551336?text=Hi%21%20I%27d%20like%20a%20quote%20for%20a%20POS%20system" 
                   target="_blank" 
                   class="inline-flex items-center justify-center gap-2 px-6 sm:px-10 py-3 sm:py-4 bg-white/5 backdrop-blur-sm border border-white/20 text-white font-semibold rounded-xl hover:bg-white/10 hover:border-white/30 transition-all duration-300">
                    <svg class="w-4 sm:w-5 h-4 sm:h-5" fill="currentColor" viewBox="0 0 24 24">
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
