<x-layouts.app title="{{ $selectedCategory ? $selectedCategory->name . ' - ' : '' }}Shop">
    {{-- Breadcrumb --}}
    <div class="bg-gray-50 border-b border-gray-200 py-3">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center gap-2 text-xs text-gray-500">
                <a href="{{ route('home') }}" class="hover:text-primary transition-colors">Home</a>
                <svg class="w-3 h-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                <a href="{{ route('shop.index') }}" class="hover:text-primary transition-colors">Shop</a>
                @if ($selectedCategory)
                    <svg class="w-3 h-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    <span class="text-gray-800 font-medium">{{ $selectedCategory->name }}</span>
                @endif
            </div>
        </div>
    </div>

    {{-- Page Header --}}
    <div class="bg-white border-b border-gray-100 py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4">
                <div>
                    <h1 class="text-2xl md:text-3xl font-semibold text-gray-900">
                        {{ $selectedCategory ? $selectedCategory->name : 'All Products' }}
                    </h1>
                    <p class="text-sm text-gray-500 mt-1">
                        {{ $products->total() }} product{{ $products->total() !== 1 ? 's' : '' }} available
                    </p>
                </div>
                <div class="flex items-center gap-3">
                    <form action="{{ route('shop.index') }}" method="GET" class="flex items-center gap-2">
                        @if (request('search'))
                            <input type="hidden" name="search" value="{{ request('search') }}">
                        @endif
                        @if (request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif
                        <select name="sort" 
                                onchange="this.form.submit()"
                                class="text-sm border border-gray-300 rounded-lg px-3 py-2 bg-white focus:border-primary focus:ring-1 focus:ring-primary transition-colors">
                            <option value="newest" {{ request('sort') === 'newest' ? 'selected' : '' }}>Sort: Newest</option>
                            <option value="price_asc" {{ request('sort') === 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                            <option value="price_desc" {{ request('sort') === 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                            <option value="name" {{ request('sort') === 'name' ? 'selected' : '' }}>Name: A-Z</option>
                        </select>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Main Content --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            {{-- Sidebar Filters --}}
            <aside class="lg:col-span-1">
                <div class="bg-white rounded-xl border border-gray-200 p-5 space-y-6 sticky top-24">
                    {{-- Categories --}}
                    @if ($categories && $categories->count() > 0)
                        <div>
                            <h3 class="text-sm font-semibold text-gray-900 mb-3">Categories</h3>
                            <ul class="space-y-0.5">
                                <li>
                                    <a href="{{ route('shop.index') }}"
                                       class="flex items-center gap-2 p-2 text-sm rounded-lg transition-colors
                                              {{ !request('category') ? 'bg-primary/10 text-primary font-medium' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50' }}">
                                        <span>All Products</span>
                                    </a>
                                </li>
                                @foreach ($categories as $category)
                                    @php
                                        $isActive = request('category') === $category->slug;
                                        $hasChildren = $category->children && $category->children->count() > 0;
                                    @endphp
                                    <li>
                                        <a href="{{ route('shop.index') }}?category={{ $category->slug }}"
                                           class="flex items-center justify-between p-2 text-sm rounded-lg transition-colors
                                                  {{ $isActive ? 'bg-primary/10 text-primary font-medium' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50' }}">
                                            <span>{{ $category->name }}</span>
                                            @if ($hasChildren)
                                                <svg class="w-3 h-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                                </svg>
                                            @endif
                                        </a>
                                        @if ($hasChildren && $isActive)
                                            <ul class="ml-4 mt-1 space-y-0.5 border-l border-gray-200 pl-2">
                                                @foreach ($category->children as $child)
                                                    <li>
                                                        <a href="{{ route('shop.index') }}?category={{ $child->slug }}"
                                                           class="block p-1.5 text-xs text-gray-500 hover:text-primary rounded transition-colors">
                                                            {{ $child->name }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Clear Filters --}}
                    @if (request('search') || request('category') || request('sort'))
                        <div class="border-t border-gray-200 pt-5">
                            <a href="{{ route('shop.index') }}" 
                               class="w-full inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-white text-gray-700 text-sm font-medium rounded-lg border border-gray-300 hover:bg-gray-50 hover:border-gray-400 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Clear Filters
                            </a>
                        </div>
                    @endif
                </div>
            </aside>

            {{-- Products Grid --}}
            <div class="lg:col-span-3">
                @if ($products->count() > 0)
                    <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 gap-3 md:gap-4">
                        @foreach ($products as $product)
                            <x-product.card :product="$product" />
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-16">
                        <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                        </svg>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">No products found</h3>
                        <p class="text-sm text-gray-500 mb-6">Try adjusting your search or filters</p>
                        <a href="{{ route('shop.index') }}" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-primary text-white text-sm font-medium rounded-lg hover:bg-primary-dark transition-colors">
                            View All Products
                        </a>
                    </div>
                @endif

                {{-- Pagination --}}
                @if ($products->hasPages())
                    <div class="mt-8 flex flex-col sm:flex-row items-center justify-between gap-4">
                        <p class="text-sm text-gray-500">
                            Showing {{ $products->firstItem() }}-{{ $products->lastItem() }} of {{ $products->total() }} products
                        </p>
                        <div class="flex items-center gap-1">
                            {{ $products->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-layouts.app>
