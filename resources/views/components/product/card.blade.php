@props(['product' => null])

@php
    $isObject = is_object($product);
    $productArr = $isObject ? $product->toArray() : (array) $product;
    
    $id = $productArr['id'] ?? ($isObject ? $product->id : null);
    $image = $productArr['image'] ?? null;
    
    if (!$image && $isObject && isset($product->primaryImage)) {
        $image = $product->primaryImage->image_url ?? null;
    }
    
    if (!$image && isset($productArr['primary_image_url'])) {
        $image = $productArr['primary_image_url'];
    }
    
    if (!$image) {
        $image = asset('storage/images/products/pos-system-fallback.jpg');
    }
    
    $name = $productArr['name'] ?? 'Product Name';
    $slug = $productArr['slug'] ?? '#';
    
    $price = $productArr['price'] ?? 0;
    $originalPrice = $productArr['original_price'] ?? null;
    $salePrice = $productArr['sale_price'] ?? null;
    
    if ($isObject && $product->sale_price && $product->sale_price < $product->price) {
        $originalPrice = $product->price;
        $price = $product->sale_price;
    } elseif ($salePrice && $salePrice < $price) {
        $originalPrice = $price;
        $price = $salePrice;
    }
    
    $onSale = ($productArr['on_sale'] ?? false) || ($originalPrice && $originalPrice > $price);
    
    $brand = $productArr['brand'] ?? null;
    $rating = $productArr['rating'] ?? 0;
    $reviewsCount = $productArr['reviews_count'] ?? 0;
    $stockQuantity = $productArr['stock_quantity'] ?? null;
    $inStock = ($productArr['stock_status'] ?? 'in_stock') === 'in_stock';
@endphp

<div {{ $attributes->merge(['class' => 'group bg-white rounded-2xl border border-gray-200 overflow-hidden hover:border-primary/50 hover:shadow-xl hover:shadow-primary/5 transition-all duration-300']) }}>
    <div class="relative aspect-square bg-gray-50 overflow-hidden">
        <a href="{{ route('products.show', $slug) }}" class="block w-full h-full">
            <img src="{{ $image }}"
                 alt="{{ $name }}"
                 class="w-full h-full object-contain p-4 group-hover:scale-105 transition-transform duration-500"
                 onerror="this.src='{{ asset('storage/images/products/pos-system-fallback.jpg') }}'">
        </a>

        @if ($onSale && $originalPrice)
            @php
                $discount = round((($originalPrice - $price) / $originalPrice) * 100);
            @endphp
            @if ($discount > 0)
                <span class="absolute top-3 left-3 bg-accent text-gray-900 text-xs font-bold px-3 py-1.5 rounded-xl">
                    -{{ $discount }}% OFF
                </span>
            @endif
        @endif

        @if (!$inStock || ($stockQuantity !== null && $stockQuantity <= 0))
            <div class="absolute inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center">
                <span class="bg-gray-900 text-white text-sm font-semibold px-4 py-2 rounded-xl">
                    Out of Stock
                </span>
            </div>
        @endif

        @if ($stockQuantity !== null && $stockQuantity > 0 && $stockQuantity <= 5)
            <span class="absolute bottom-3 left-3 bg-accent/10 text-accent-dark text-xs font-semibold px-3 py-1.5 rounded-xl border border-accent/20">
                Only {{ $stockQuantity }} left
            </span>
        @endif
    </div>

    <div class="p-4 flex flex-col">
        @if ($brand)
            <p class="text-xs text-gray-500 uppercase tracking-wider mb-1.5">{{ $brand }}</p>
        @endif

        <h3 class="text-sm text-gray-900 font-semibold leading-snug mb-2 line-clamp-2 min-h-[40px]">
            <a href="{{ route('products.show', $slug) }}" class="hover:text-primary transition-colors">
                {{ $name }}
            </a>
        </h3>

        @if ($reviewsCount > 0 || $rating > 0)
            <div class="flex items-center gap-1.5 mb-3">
                @for ($i = 1; $i <= 5; $i++)
                    <svg class="w-4 h-4 {{ $i <= $rating ? 'text-accent' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                @endfor
                @if ($reviewsCount > 0)
                    <span class="text-xs text-gray-500">({{ $reviewsCount }} reviews)</span>
                @endif
            </div>
        @endif

        <div class="flex items-baseline gap-2 mb-4">
            <span class="text-xl font-bold text-gray-900">
                R{{ number_format((float)$price, 2) }}
            </span>
            @if ($onSale && $originalPrice && $originalPrice > $price)
                <span class="text-sm text-gray-400 line-through">
                    R{{ number_format((float)$originalPrice, 2) }}
                </span>
            @endif
        </div>

        <div class="mt-auto">
            @if ($inStock && ($stockQuantity === null || $stockQuantity > 0) && $id)
                <form action="{{ route('cart.add') }}" method="POST" class="add-to-cart-form">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $id }}">
                    <input type="hidden" name="quantity" value="1">
                    <button type="submit" class="w-full inline-flex items-center justify-center gap-2 px-4 py-3 bg-primary text-white text-sm font-bold rounded-xl hover:bg-primary-dark hover:shadow-lg hover:shadow-primary/25 active:scale-[0.97] transition-all duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                        Add to Cart
                    </button>
                </form>
            @else
                <button disabled class="w-full inline-flex items-center justify-center gap-2 px-4 py-3 bg-gray-200 text-gray-500 text-sm font-semibold rounded-xl cursor-not-allowed">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    {{ $inStock ? 'Add to Cart' : 'Out of Stock' }}
                </button>
            @endif
        </div>
    </div>
</div>
