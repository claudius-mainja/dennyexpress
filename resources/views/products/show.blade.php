<x-layouts.app title="{{ $product->name ?? 'Product Detail' }}">
    <x-partials.breadcrumbs :items="[
        ['label' => 'Shop', 'url' => route('shop.index')],
        ...($product->categories->isNotEmpty() ? [['label' => $product->categories->first()->name, 'url' => route('products.category', $product->categories->first()->slug)]] : []),
        ['label' => $product->name ?? 'Product', 'url' => '#'],
    ]" />

    <div class="container-custom pb-8 sm:pb-12 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 sm:gap-8 lg:gap-12 mb-8 sm:mb-12">

            <div class="relative aspect-square bg-gray-50 rounded-2xl border border-gray-200 overflow-hidden">
                @if ($product->primaryImage?->image_url)
                    <img src="{{ $product->primaryImage->image_url }}"
                         alt="{{ $product->name }}"
                         class="w-full h-full object-contain p-4 sm:p-8"
                         onerror="this.src='{{ asset('storage/images/products/pos-system-fallback.jpg') }}'">
                @else
                    <div class="w-full h-full flex items-center justify-center p-8 sm:p-16">
                        <img src="{{ asset('storage/images/products/pos-system-fallback.jpg') }}"
                             alt="{{ $product->name }}"
                             class="w-full h-full object-contain opacity-60">
                    </div>
                @endif

                @if ($product->on_sale && $product->sale_price && $product->sale_price < $product->price)
                    @php $discount = round((($product->price - $product->sale_price) / $product->price) * 100); @endphp
                    <span class="absolute top-3 left-3 bg-accent text-gray-900 text-xs font-bold px-3 py-1.5 rounded-xl">-{{ $discount }}% OFF</span>
                @endif

                @if ($product->new_arrival)
                    <span class="absolute top-3 right-3 bg-primary text-white text-[10px] font-bold px-3 py-1.5 rounded-xl">NEW</span>
                @endif
            </div>

            <div class="space-y-4 sm:space-y-6">
                <div>
                    @if ($product->brand ?? false)
                        <p class="text-[10px] sm:text-xs font-black text-primary uppercase tracking-widest mb-1">{{ $product->brand }}</p>
                    @endif
                    <h1 class="text-xl sm:text-2xl md:text-3xl font-bold text-gray-900">{{ $product->name }}</h1>
                    <p class="text-xs sm:text-sm text-gray-500 mt-1">
                        @if ($product->sku)SKU: {{ $product->sku }} | @endif
                        @if ($product->categories->isNotEmpty())
                            Categories:
                            @foreach ($product->categories as $cat)
                                <a href="{{ route('products.category', $cat->slug) }}" class="text-primary hover:text-primary-dark">{{ $cat->name }}</a>@if (!$loop->last), @endif
                            @endforeach
                        @endif
                    </p>
                </div>

                <div class="flex items-center gap-2 sm:gap-3">
                    <div class="flex items-center gap-0.5">
                        @php $avgRating = $product->approvedReviews->avg('rating') ?? 0; @endphp
                        @for ($i = 1; $i <= 5; $i++)
                            <svg class="w-3.5 sm:w-4 h-3.5 sm:h-4 {{ $i <= round($avgRating) ? 'text-accent' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        @endfor
                    </div>
                    <span class="text-xs sm:text-sm text-gray-500">({{ $product->approvedReviews->count() }} reviews)</span>
                </div>

                <div class="flex items-baseline gap-3 flex-wrap">
                    @if ($product->on_sale && $product->sale_price && $product->sale_price < $product->price)
                        <span class="text-2xl sm:text-3xl font-bold text-gray-900">R{{ number_format($product->sale_price, 2) }}</span>
                        <span class="text-base sm:text-lg text-gray-400 line-through">R{{ number_format($product->price, 2) }}</span>
                        @php $discount = round((($product->price - $product->sale_price) / $product->price) * 100); @endphp
                        <span class="text-xs font-bold text-white bg-primary px-2.5 py-1 rounded-lg">-{{ $discount }}%</span>
                    @else
                        <span class="text-2xl sm:text-3xl font-bold text-gray-900">R{{ number_format($product->price, 2) }}</span>
                    @endif
                </div>

                @if ($product->short_description)
                    <p class="text-sm sm:text-base text-gray-600 leading-relaxed">{{ $product->short_description }}</p>
                @endif

                <div class="flex flex-col sm:flex-row sm:items-center gap-2 sm:gap-4 text-xs sm:text-sm">
                    @if ($product->stock_status === 'in_stock')
                        <span class="flex items-center gap-1.5 text-primary font-semibold">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            In Stock
                            @if ($product->stock_quantity !== null && $product->stock_quantity <= 5)
                                (Only {{ $product->stock_quantity }} left)
                            @endif
                        </span>
                    @elseif ($product->stock_status === 'out_of_stock')
                        <span class="flex items-center gap-1.5 text-red-500 font-semibold">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            Out of Stock
                        </span>
                    @else
                        <span class="flex items-center gap-1.5 text-accent font-semibold">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            {{ ucfirst(str_replace('_', ' ', $product->stock_status)) }}
                        </span>
                    @endif
                    <span class="hidden sm:inline text-gray-300">|</span>
                    <span class="text-gray-500">We deliver nationwide</span>
                </div>

                <x-product.add-to-cart-form :product="$product" />

                <div class="border-t border-gray-200 pt-4 sm:pt-6 space-y-2 sm:space-y-3">
                    @if ($product->warranty_months)
                        <div class="flex items-center gap-2 text-xs sm:text-sm text-gray-600">
                            <svg class="w-4 h-4 text-primary shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                            <span>{{ $product->warranty_months ? $product->warranty_months . ' Month Warranty' : 'Product Warranty' }}</span>
                        </div>
                    @endif
                    <div class="flex items-center gap-2 text-xs sm:text-sm text-gray-600">
                        <svg class="w-4 h-4 text-primary shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>Nationwide delivery</span>
                    </div>
                    <div class="flex items-center gap-2 text-xs sm:text-sm text-gray-600">
                        <svg class="w-4 h-4 text-primary shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                        <span>14-day hassle-free returns</span>
                    </div>
                </div>
            </div>
        </div>

        <div x-data="tabGroup" class="mb-8 sm:mb-12">
            <div class="border-b border-gray-200 mb-4 sm:mb-6 overflow-x-auto">
                <nav class="flex gap-4 sm:gap-6 min-w-max">
                    <button @click="setTab(0)" class="pb-2 sm:pb-3 text-xs sm:text-sm font-semibold transition-colors duration-200 whitespace-nowrap" :class="activeTab === 0 ? 'text-primary border-b-2 border-primary' : 'text-gray-500 hover:text-gray-800'">Description</button>
                    @if ($product->specifications)
                        <button @click="setTab(1)" class="pb-2 sm:pb-3 text-xs sm:text-sm font-semibold transition-colors duration-200 whitespace-nowrap" :class="activeTab === 1 ? 'text-primary border-b-2 border-primary' : 'text-gray-500 hover:text-gray-800'">Specifications</button>
                    @endif
                    @if ($product->approvedReviews->count() > 0 || $product->what_included)
                        <button @click="setTab(2)" class="pb-2 sm:pb-3 text-xs sm:text-sm font-semibold transition-colors duration-200 whitespace-nowrap" :class="activeTab === 2 ? 'text-primary border-b-2 border-primary' : 'text-gray-500 hover:text-gray-800'">{{ $product->approvedReviews->count() > 0 ? 'Reviews (' . $product->approvedReviews->count() . ')' : 'What\'s Included' }}</button>
                    @endif
                </nav>
            </div>

            <div x-show="activeTab === 0" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                <div class="text-sm sm:text-base text-gray-600 space-y-3 sm:space-y-4 leading-relaxed max-w-3xl">
                    {!! nl2br(e($product->description)) !!}
                </div>
            </div>

            @if ($product->specifications)
                <div x-show="activeTab === 1" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-cloak>
                    <x-product.specs-table :specs="$product->specifications" />
                </div>
            @endif

            <div x-show="activeTab === {{ $product->specifications ? 2 : 1 }}" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-cloak>
                @if ($product->approvedReviews->count() > 0)
                    <div class="space-y-3 sm:space-y-4">
                        @foreach ($product->approvedReviews as $review)
                            <x-product.review-card :review="[
                                'author' => $review->author_name ?? $review->user?->name ?? 'Verified Customer',
                                'date' => $review->created_at->diffForHumans(),
                                'rating' => $review->rating,
                                'title' => $review->title ?? '',
                                'content' => $review->body ?? '',
                                'verified' => $review->verified,
                            ]" />
                        @endforeach
                    </div>
                @elseif ($product->what_included)
                    <div class="text-sm sm:text-base text-gray-600 space-y-2">
                        <h3 class="font-bold text-gray-900 uppercase text-sm">What's in the Box</h3>
                        <ul class="list-disc pl-4 sm:pl-5 space-y-1">
                            @foreach ((array) $product->what_included as $item)
                                <li>{{ is_array($item) ? json_encode($item) : $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>

        @if ($related->isNotEmpty())
            <x-product.featured-section
                title="Related Products"
                subtitle="Customers also bought"
                :products="$related"
            />
        @endif
    </div>
</x-layouts.app>