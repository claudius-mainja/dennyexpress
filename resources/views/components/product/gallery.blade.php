@props(['images' => [], 'alt' => 'Product image'])

<div x-data="productGallery" x-init="images = {{ json_encode($images) }}" {{ $attributes->merge(['class' => 'space-y-4']) }}>
    <div class="relative aspect-square bg-light-gray rounded-xl overflow-hidden">
        <template x-for="(image, index) in images" :key="index">
            <img x-show="activeIndex === index"
                 :src="image"
                 :alt="'{{ $alt }} - ' + (index + 1)"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 class="w-full h-full object-cover absolute inset-0">
        </template>

        <template x-if="images.length === 0">
            <div class="w-full h-full flex items-center justify-center">
                <svg class="w-16 h-16 text-border-gray" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
        </template>

        <template x-if="images.length > 1">
            <div class="absolute inset-x-0 top-1/2 -translate-y-1/2 flex justify-between px-2">
                <button @click="prev" class="w-8 h-8 bg-white/90 backdrop-blur-sm rounded-full shadow-soft flex items-center justify-center text-dark-charcoal hover:bg-white transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button @click="next" class="w-8 h-8 bg-white/90 backdrop-blur-sm rounded-full shadow-soft flex items-center justify-center text-dark-charcoal hover:bg-white transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        </template>
    </div>

    <template x-if="images.length > 1">
        <div class="flex gap-3 overflow-x-auto scrollbar-hide pb-1">
            <template x-for="(image, index) in images" :key="index">
                <button @click="setActive(index)"
                        class="shrink-0 w-16 h-16 rounded-lg border-2 overflow-hidden transition-all duration-200"
                        :class="activeIndex === index ? 'border-primary-blue' : 'border-transparent hover:border-border-gray'">
                    <img :src="image" :alt="'Thumbnail ' + (index + 1)" class="w-full h-full object-cover">
                </button>
            </template>
        </div>
    </template>
</div>
