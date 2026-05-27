@props(['images' => [], 'alt' => 'Product image'])

<div x-data="productGallery" x-init="images = {{ json_encode($images) }}" {{ $attributes->merge(['class' => 'space-y-4']) }}>
    <div class="relative aspect-square bg-gray-100 rounded-xl overflow-hidden">
        <template x-for="(image, index) in images" :key="index">
            <img x-show="activeIndex === index"
                 :src="image"
                 :alt="'{{ $alt }} - ' + (index + 1)"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 class="w-full h-full object-contain p-4 sm:p-8 absolute inset-0">
        </template>

        <template x-if="images.length === 0">
            <div class="w-full h-full flex items-center justify-center p-8 sm:p-16">
                <img src="{{ asset('storage/images/products/pos-system-fallback.jpg') }}"
                     alt="{{ $alt }}"
                     class="w-full h-full object-contain opacity-60">
            </div>
        </template>

        <template x-if="images.length > 1">
            <div class="absolute inset-x-0 top-1/2 -translate-y-1/2 flex justify-between px-2 z-10">
                <button @click="prev" class="w-8 h-8 bg-white/90 backdrop-blur-sm rounded-full shadow-md flex items-center justify-center text-gray-800 hover:bg-white transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button @click="next" class="w-8 h-8 bg-white/90 backdrop-blur-sm rounded-full shadow-md flex items-center justify-center text-gray-800 hover:bg-white transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        </template>
    </div>

    <template x-if="images.length > 1">
        <div class="flex gap-3 overflow-x-auto pb-1">
            <template x-for="(image, index) in images" :key="index">
                <button @click="setActive(index)"
                        class="shrink-0 w-14 sm:w-16 h-14 sm:h-16 rounded-lg border-2 overflow-hidden transition-all duration-200"
                        :class="activeIndex === index ? 'border-primary' : 'border-transparent hover:border-gray-300'">
                    <img :src="image" :alt="'Thumbnail ' + (index + 1)" class="w-full h-full object-cover">
                </button>
            </template>
        </div>
    </template>
</div>
