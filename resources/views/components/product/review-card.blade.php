@props(['review' => null])

<div {{ $attributes->merge(['class' => 'p-6 bg-white rounded-xl border border-border-gray']) }}>
    <div class="flex items-start justify-between mb-3">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-primary-blue/10 flex items-center justify-center">
                <span class="text-sm font-semibold text-primary-blue">{{ substr($review['author'] ?? 'U', 0, 1) }}</span>
            </div>
            <div>
                <p class="text-sm font-medium text-dark-charcoal">{{ $review['author'] ?? 'Verified Customer' }}</p>
                <p class="text-xs text-medium-gray">{{ $review['date'] ?? '1 month ago' }}</p>
            </div>
        </div>
        <div class="flex items-center gap-0.5">
            @for ($i = 1; $i <= 5; $i++)
                <svg class="w-3.5 h-3.5 {{ $i <= ($review['rating'] ?? 5) ? 'text-warning' : 'text-border-gray' }}" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                </svg>
            @endfor
        </div>
    </div>
    <h4 class="text-sm font-semibold text-dark-charcoal mb-1">{{ $review['title'] ?? 'Great product!' }}</h4>
    <p class="text-sm text-medium-gray leading-relaxed">{{ $review['content'] ?? 'Excellent quality and fast shipping. Would recommend to anyone looking for reliable IT hardware.' }}</p>
    @if (isset($review['verified']) && $review['verified'])
        <p class="mt-2 text-xs text-success flex items-center gap-1">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Verified Purchase
        </p>
    @endif
</div>
