@props(['review' => null])

<div {{ $attributes->merge(['class' => 'p-4 sm:p-6 bg-white rounded-xl border border-gray-200']) }}>
    <div class="flex items-start justify-between mb-3">
        <div class="flex items-center gap-3">
            <div class="w-8 sm:w-10 h-8 sm:h-10 rounded-full bg-primary/10 flex items-center justify-center">
                <span class="text-xs sm:text-sm font-bold text-primary">{{ substr($review['author'] ?? 'U', 0, 1) }}</span>
            </div>
            <div>
                <p class="text-xs sm:text-sm font-semibold text-gray-900">{{ $review['author'] ?? 'Verified Customer' }}</p>
                <p class="text-xs text-gray-500">{{ $review['date'] ?? '1 month ago' }}</p>
            </div>
        </div>
        <div class="flex items-center gap-0.5 shrink-0">
            @for ($i = 1; $i <= 5; $i++)
                <svg class="w-3 sm:w-3.5 h-3 sm:h-3.5 {{ $i <= ($review['rating'] ?? 5) ? 'text-accent' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
            @endfor
        </div>
    </div>
    <h4 class="text-xs sm:text-sm font-bold text-gray-900 mb-1">{{ $review['title'] ?? 'Great product!' }}</h4>
    <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">{{ $review['content'] ?? 'Excellent quality and fast shipping. Would recommend to anyone looking for reliable IT hardware.' }}</p>
    @if (isset($review['verified']) && $review['verified'])
        <p class="mt-2 text-xs text-primary flex items-center gap-1 font-medium">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Verified Purchase
        </p>
    @endif
</div>
