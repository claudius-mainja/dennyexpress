@props(['items' => []])

<nav aria-label="Breadcrumb" class="container-custom py-3 sm:py-4">
    <ol class="flex items-center gap-1 sm:gap-2 text-xs sm:text-sm flex-wrap">
        <li class="flex items-center gap-1 sm:gap-2">
            <a href="/" class="text-gray-500 hover:text-gray-800 transition-colors">
                <svg class="w-3.5 sm:w-4 h-3.5 sm:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
            </a>
            <svg class="w-3 sm:w-3.5 h-3 sm:h-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </li>
        @foreach ($items as $item)
            @if ($loop->last)
                <li class="text-gray-900 font-semibold truncate max-w-[200px] sm:max-w-none" aria-current="page">{{ $item['label'] }}</li>
            @else
                <li class="flex items-center gap-1 sm:gap-2">
                    <a href="{{ $item['url'] }}" class="text-gray-500 hover:text-gray-800 transition-colors truncate max-w-[120px] sm:max-w-none">{{ $item['label'] }}</a>
                    <svg class="w-3 sm:w-3.5 h-3 sm:h-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </li>
            @endif
        @endforeach
    </ol>
</nav>