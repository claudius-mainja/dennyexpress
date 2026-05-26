@props(['item' => null, 'model' => null])

@php
    $isModel = $model !== null || (is_object($item) && isset($item->product));
    
    if ($isModel && $model) {
        $itemModel = $model;
    } elseif ($isObject = is_object($item)) {
        $itemModel = $item;
    } else {
        $itemArr = (array) $item;
    }
    
    if ($isModel) {
        $id = $itemModel->id ?? null;
        $name = $itemModel->product?->name ?? 'Product';
        $slug = $itemModel->product?->slug ?? '#';
        $price = (float) ($itemModel->price ?? 0);
        $quantity = (int) ($itemModel->quantity ?? 1);
        $image = $itemModel->product?->primaryImage?->image_url ?? null;
        $sku = $itemModel->product?->sku ?? null;
    } else {
        $id = $itemArr['id'] ?? $itemArr['rowId'] ?? null;
        $name = $itemArr['name'] ?? 'Product';
        $slug = $itemArr['slug'] ?? '#';
        $price = (float) ($itemArr['price'] ?? 0);
        $quantity = (int) ($itemArr['quantity'] ?? 1);
        $image = $itemArr['image'] ?? null;
        $sku = $itemArr['sku'] ?? null;
    }
    
    $subtotal = $price * $quantity;
    
    if (!$image) {
        $image = asset('storage/images/products/pos-system-fallback.jpg');
    }
@endphp

<div {{ $attributes->merge(['class' => 'flex items-start gap-4 py-4 border-b border-gray-200']) }}>
    <div class="w-20 h-20 rounded-lg bg-gray-50 overflow-hidden shrink-0 border border-gray-200">
        <a href="{{ $slug ? route('products.show', $slug) : '#' }}">
            <img src="{{ $image }}"
                 alt="{{ $name }}"
                 class="w-full h-full object-cover"
                 onerror="this.src='{{ asset('storage/images/products/pos-system-fallback.jpg') }}'">
        </a>
    </div>

    <div class="flex-1 min-w-0">
        <h3 class="text-sm font-medium text-gray-900">
            <a href="{{ $slug ? route('products.show', $slug) : '#' }}" class="hover:text-primary transition-colors">
                {{ $name }}
            </a>
        </h3>
        
        @if ($sku)
            <p class="text-xs text-gray-500 mt-0.5">SKU: {{ $sku }}</p>
        @endif
        
        <p class="text-sm font-semibold text-gray-900 mt-1">R{{ number_format($price, 2) }}</p>

        <div class="flex items-center justify-between mt-3">
            <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden">
                @if ($id)
                    <form action="{{ route('cart.update', $id) }}" method="POST" class="flex items-center">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="quantity" value="{{ $quantity - 1 }}">
                        <button type="submit" 
                                class="w-8 h-8 flex items-center justify-center text-gray-500 hover:bg-gray-50 transition-colors"
                                {{ $quantity <= 1 ? 'disabled' : '' }}>
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                            </svg>
                        </button>
                    </form>
                @else
                    <span class="w-8 h-8 flex items-center justify-center text-gray-400">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                        </svg>
                    </span>
                @endif
                
                <span class="w-10 text-center text-sm font-medium text-gray-900 border-x border-gray-300 py-2">
                    {{ $quantity }}
                </span>
                
                @if ($id)
                    <form action="{{ route('cart.update', $id) }}" method="POST" class="flex items-center">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="quantity" value="{{ $quantity + 1 }}">
                        <button type="submit" 
                                class="w-8 h-8 flex items-center justify-center text-gray-500 hover:bg-gray-50 transition-colors">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                        </button>
                    </form>
                @else
                    <span class="w-8 h-8 flex items-center justify-center text-gray-400">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                    </span>
                @endif
            </div>

            <div class="text-right">
                <p class="text-sm font-semibold text-gray-900">R{{ number_format($subtotal, 2) }}</p>
                @if ($id)
                    <form action="{{ route('cart.remove', $id) }}" method="POST" onsubmit="return confirm('Remove this item?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-xs text-red-500 hover:text-red-700 transition-colors mt-0.5">
                            Remove
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
