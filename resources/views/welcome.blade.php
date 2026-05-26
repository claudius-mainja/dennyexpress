<x-layouts.app title="Denny Express | POS Systems & IT Hardware">
    {{-- Hero Section - Selling POS Hardware --}}
    <section class="relative bg-gradient-to-br from-primary-dark via-primary to-primary-light py-16 md:py-24 overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-96 h-96 bg-accent rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-72 h-72 bg-white rounded-full blur-3xl"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="max-w-xl">
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur-sm border border-white/20 rounded-full mb-6">
                        <span class="w-2 h-2 bg-accent rounded-full animate-pulse"></span>
                        <span class="text-sm font-medium text-white">Free POS Software Included</span>
                    </div>
                    
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white leading-tight mb-6">
                        Premium
                        <span class="text-accent"> POS Hardware</span>
                        for Your Business
                    </h1>
                    
                    <p class="text-white/80 text-lg leading-relaxed mb-8">
                        Complete POS systems with touch terminals, receipt printers, barcode scanners, cash drawers, and scales. 
                        <span class="text-white font-semibold">Free lifetime POS software included</span> — no monthly fees, ever.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('shop.index') }}?category=pos-systems" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-accent text-gray-900 text-sm font-bold rounded-xl hover:bg-accent-light hover:shadow-lg hover:shadow-accent/25 transition-all duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                            Shop POS Systems
                        </a>
                        <a href="https://wa.me/27743551336?text=Hi%21%20I%27m%20interested%20in%20POS%20systems" 
                           target="_blank" 
                           class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-white/10 backdrop-blur-sm border border-white/30 text-white text-sm font-semibold rounded-xl hover:bg-white/20 transition-all duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.012-.172-.249-.018-.384.13-.506.135-.11.3-.286.449-.429.147-.143.196-.249.296-.415.099-.166.05-.305-.025-.43-.074-.124-.67-1.61-.918-2.205-.242-.578-.489-.498-.67-.506-.172-.009-.37-.013-.568-.013-.197 0-.518.074-.79.371-.273.297-1.04 1.014-1.04 2.467 0 1.453 1.065 2.851 1.213 3.05.149.199 2.092 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                            Get Free Quote
                        </a>
                    </div>
                    
                    <div class="grid grid-cols-3 gap-4 mt-8 pt-8 border-t border-white/20">
                        <div class="text-center">
                            <p class="text-2xl font-bold text-accent">Free</p>
                            <p class="text-sm text-white/60">Lifetime Software</p>
                        </div>
                        <div class="text-center">
                            <p class="text-2xl font-bold text-accent">18</p>
                            <p class="text-sm text-white/60">Month Warranty</p>
                        </div>
                        <div class="text-center">
                            <p class="text-2xl font-bold text-accent">R5k+</p>
                            <p class="text-sm text-white/60">Free Delivery</p>
                        </div>
                    </div>
                </div>
                
                <div class="hidden lg:block">
                    <div class="relative">
                        <div class="absolute inset-0 bg-accent/20 rounded-3xl blur-3xl"></div>
                        <div class="relative bg-white/10 backdrop-blur-sm border border-white/20 rounded-3xl p-6">
                            <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?auto=format&fit=crop&q=80&w=600&h=500" 
                                 alt="Woman using POS system in store" 
                                 class="w-full h-96 object-cover rounded-2xl">
                            
                            <div class="grid grid-cols-2 gap-4 mt-6">
                                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 text-center border border-white/10">
                                    <svg class="w-8 h-8 mx-auto text-accent mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    <p class="text-white font-semibold">Touch Terminals</p>
                                </div>
                                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 text-center border border-white/10">
                                    <svg class="w-8 h-8 mx-auto text-accent mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                                    </svg>
                                    <p class="text-white font-semibold">Receipt Printers</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Trust Bar - White Background --}}
    <section class="bg-white py-8 border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="flex items-center justify-center gap-3 p-4 bg-gray-50 rounded-2xl">
                    <div class="w-10 h-10 bg-primary/10 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-900">Free Delivery</p>
                        <p class="text-xs text-gray-500">Orders over R5,000</p>
                    </div>
                </div>
                <div class="flex items-center justify-center gap-3 p-4 bg-gray-50 rounded-2xl">
                    <div class="w-10 h-10 bg-accent/10 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-900">18 Month Warranty</p>
                        <p class="text-xs text-gray-500">On all products</p>
                    </div>
                </div>
                <div class="flex items-center justify-center gap-3 p-4 bg-gray-50 rounded-2xl">
                    <div class="w-10 h-10 bg-primary/10 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-900">Free POS Software</p>
                        <p class="text-xs text-gray-500">Lifetime license</p>
                    </div>
                </div>
                <div class="flex items-center justify-center gap-3 p-4 bg-gray-50 rounded-2xl">
                    <div class="w-10 h-10 bg-accent/10 rounded-xl flex items-center justify-center">
                        <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-900">Nationwide Delivery</p>
                        <p class="text-xs text-gray-500">All over SA</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Popular Products --}}
    @if ($featuredProducts && $featuredProducts->count() > 0)
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-10 gap-4">
                <div>
                    <span class="text-xs font-semibold text-primary uppercase tracking-widest">OUR PRODUCTS</span>
                    <h2 class="text-3xl font-bold text-gray-900 mt-2">Popular POS Systems</h2>
                </div>
                <a href="{{ route('shop.index') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-primary text-white text-sm font-semibold rounded-xl hover:bg-primary-dark transition-colors">
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

    {{-- POS Software Info Section --}}
    <section class="py-16 bg-white relative overflow-hidden">
        <div class="absolute top-0 right-0 w-96 h-96 bg-primary/5 rounded-full blur-3xl"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <span class="inline-flex items-center gap-2 px-4 py-2 bg-accent/10 text-accent text-sm font-semibold rounded-full mb-6">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                        </svg>
                        FREE SOFTWARE
                    </span>
                    
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">
                        Free POS Software
                        <span class="text-primary"> Included</span>
                    </h2>
                    
                    <p class="text-gray-600 text-lg mb-8">
                        Get powerful POS software for free with any hardware purchase. No monthly fees, no subscriptions — just a complete retail management system for your business.
                    </p>
                    
                    <div class="grid sm:grid-cols-2 gap-6 mb-8">
                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 bg-primary/10 rounded-lg flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900">Inventory Management</h3>
                                <p class="text-sm text-gray-500 mt-1">Track stock levels in real-time</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 bg-accent/10 rounded-lg flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900">Sales Reporting</h3>
                                <p class="text-sm text-gray-500 mt-1">Detailed analytics & insights</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 bg-primary/10 rounded-lg flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900">Customer Management</h3>
                                <p class="text-sm text-gray-500 mt-1">Build customer loyalty</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 bg-accent/10 rounded-lg flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900">Free Updates</h3>
                                <p class="text-sm text-gray-500 mt-1">Lifetime software updates</p>
                            </div>
                        </div>
                    </div>
                    
                    <a href="{{ route('shop.index') }}?category=pos-systems" class="inline-flex items-center gap-2 px-8 py-4 bg-primary text-white font-semibold rounded-xl hover:bg-primary-dark transition-all">
                        Get POS System
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </a>
                </div>
                
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&q=80&w=600&h=500" 
                         alt="POS software dashboard" 
                         class="w-full rounded-2xl shadow-2xl">
                </div>
            </div>
        </div>
    </section>

    {{-- Industries We Serve --}}
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="text-xs font-semibold text-accent uppercase tracking-widest">INDUSTRIES</span>
                <h2 class="text-3xl font-bold text-gray-900 mt-2">Industries We Serve</h2>
                <p class="text-gray-600 mt-4 max-w-2xl mx-auto">
                    Our POS solutions are tailored for various business types across South Africa
                </p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                <div class="group bg-white rounded-2xl p-6 text-center hover:shadow-lg transition-all duration-300 border border-gray-100 hover:border-primary/30">
                    <div class="w-16 h-16 bg-primary/10 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-primary/20 transition-colors">
                        <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-900">Retail Stores</h3>
                </div>
                
                <div class="group bg-white rounded-2xl p-6 text-center hover:shadow-lg transition-all duration-300 border border-gray-100 hover:border-accent/30">
                    <div class="w-16 h-16 bg-accent/10 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-accent/20 transition-colors">
                        <svg class="w-8 h-8 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-900">Spaza Shops</h3>
                </div>
                
                <div class="group bg-white rounded-2xl p-6 text-center hover:shadow-lg transition-all duration-300 border border-gray-100 hover:border-primary/30">
                    <div class="w-16 h-16 bg-primary/10 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-primary/20 transition-colors">
                        <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0A1.5 1.5 0 003 15.546V7.5a3 3 0 013-3h12a3 3 0 013 3v8.046z" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-900">Supermarkets</h3>
                </div>
                
                <div class="group bg-white rounded-2xl p-6 text-center hover:shadow-lg transition-all duration-300 border border-gray-100 hover:border-accent/30">
                    <div class="w-16 h-16 bg-accent/10 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-accent/20 transition-colors">
                        <svg class="w-8 h-8 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-900">Restaurants</h3>
                </div>
                
                <div class="group bg-white rounded-2xl p-6 text-center hover:shadow-lg transition-all duration-300 border border-gray-100 hover:border-primary/30">
                    <div class="w-16 h-16 bg-primary/10 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-primary/20 transition-colors">
                        <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-900">Bars & Cafes</h3>
                </div>
                
                <div class="group bg-white rounded-2xl p-6 text-center hover:shadow-lg transition-all duration-300 border border-gray-100 hover:border-accent/30">
                    <div class="w-16 h-16 bg-accent/10 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-accent/20 transition-colors">
                        <svg class="w-8 h-8 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-gray-900">Boutiques</h3>
                </div>
            </div>
        </div>
    </section>

    {{-- Client Logos Carousel --}}
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="text-xs font-semibold text-primary uppercase tracking-widest">OUR CLIENTS</span>
                <h2 class="text-3xl font-bold text-gray-900 mt-2">Trusted by Businesses</h2>
            </div>
            
            <div class="relative overflow-hidden bg-gray-50 rounded-3xl p-8 md:p-12 border border-gray-100">
                <div class="flex items-center gap-12 animate-[scroll_30s_linear_infinite]" 
                     style="animation: scroll 30s linear infinite;">
                    <div class="flex items-center justify-center p-4 min-w-[140px]">
                        <img src="{{ asset('images/clients/puma.webp') }}" alt="Puma" class="max-h-12 object-contain grayscale hover:grayscale-0 transition-all">
                    </div>
                    <div class="flex items-center justify-center p-4 min-w-[140px]">
                        <img src="{{ asset('images/clients/purewater.png') }}" alt="Pure Water" class="max-h-12 object-contain grayscale hover:grayscale-0 transition-all">
                    </div>
                    <div class="flex items-center justify-center p-4 min-w-[140px]">
                        <img src="{{ asset('images/clients/blinggirl.jpg') }}" alt="Bling Girl" class="max-h-12 object-contain grayscale hover:grayscale-0 transition-all">
                    </div>
                    <div class="flex items-center justify-center p-4 min-w-[140px]">
                        <img src="{{ asset('images/clients/missmoo.jpg') }}" alt="Miss Moo" class="max-h-12 object-contain grayscale hover:grayscale-0 transition-all">
                    </div>
                    <div class="flex items-center justify-center p-4 min-w-[140px]">
                        <img src="{{ asset('images/clients/kwazionke.png') }}" alt="Kwazionke" class="max-h-12 object-contain grayscale hover:grayscale-0 transition-all">
                    </div>
                    <div class="flex items-center justify-center p-4 min-w-[140px]">
                        <img src="{{ asset('images/clients/ecomall.png') }}" alt="Ecomall" class="max-h-12 object-contain grayscale hover:grayscale-0 transition-all">
                    </div>
                    {{-- Duplicate for continuous scroll --}}
                    <div class="flex items-center justify-center p-4 min-w-[140px]">
                        <img src="{{ asset('images/clients/puma.webp') }}" alt="Puma" class="max-h-12 object-contain grayscale hover:grayscale-0 transition-all">
                    </div>
                    <div class="flex items-center justify-center p-4 min-w-[140px]">
                        <img src="{{ asset('images/clients/purewater.png') }}" alt="Pure Water" class="max-h-12 object-contain grayscale hover:grayscale-0 transition-all">
                    </div>
                    <div class="flex items-center justify-center p-4 min-w-[140px]">
                        <img src="{{ asset('images/clients/blinggirl.jpg') }}" alt="Bling Girl" class="max-h-12 object-contain grayscale hover:grayscale-0 transition-all">
                    </div>
                    <div class="flex items-center justify-center p-4 min-w-[140px]">
                        <img src="{{ asset('images/clients/missmoo.jpg') }}" alt="Miss Moo" class="max-h-12 object-contain grayscale hover:grayscale-0 transition-all">
                    </div>
                </div>
                
                <div class="mt-8 pt-8 border-t border-gray-200 text-center">
                    <p class="text-gray-500">Plus <span class="font-semibold text-primary">500+</span> more businesses across South Africa</p>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-20 bg-gradient-to-br from-gray-900 to-gray-800 relative overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-0 right-0 w-96 h-96 bg-primary rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-72 h-72 bg-accent rounded-full blur-3xl"></div>
        </div>
        
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                Ready to Upgrade Your Business?
            </h2>
            <p class="text-gray-400 text-lg mb-8 max-w-2xl mx-auto">
                Get a complete POS system with free lifetime software. No monthly fees, ever. Contact us today for a free consultation.
            </p>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('shop.index') }}?category=pos-systems" class="inline-flex items-center justify-center gap-2 px-10 py-4 bg-accent text-gray-900 font-bold rounded-xl hover:bg-accent-light transition-all duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    Shop POS Systems
                </a>
                <a href="https://wa.me/27743551336?text=Hi%21%20I%27d%20like%20a%20quote%20for%20a%20POS%20system" 
                   target="_blank" 
                   class="inline-flex items-center justify-center gap-2 px-10 py-4 bg-white/10 backdrop-blur-sm border border-white/20 text-white font-semibold rounded-xl hover:bg-white/20 transition-all duration-300">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.012-.172-.249-.018-.384.13-.506.135-.11.3-.286.449-.429.147-.143.196-.249.296-.415.099-.166.05-.305-.025-.43-.074-.124-.67-1.61-.918-2.205-.242-.578-.489-.498-.67-.506-.172-.009-.37-.013-.568-.013-.197 0-.518.074-.79.371-.273.297-1.04 1.014-1.04 2.467 0 1.453 1.065 2.851 1.213 3.05.149.199 2.092 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                    Get Free Quote
                </a>
            </div>
        </div>
    </section>
    
    {{-- Custom Animation Styles --}}
    <style>
        @keyframes scroll {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
    </style>
</x-layouts.app>
