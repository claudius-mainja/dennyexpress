<x-layouts.app title="{{ $blog->seo_title ?? $blog->title }}">
    @push('meta')
        <meta name="description" content="{{ $blog->seo_description ?? strip_tags($blog->getExcerpt()) }}">
    @endpush

    <div class="bg-gray-50 border-b border-gray-200 py-3">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center gap-2 text-xs text-gray-500">
                <a href="{{ route('home') }}" class="hover:text-primary transition-colors">Home</a>
                <svg class="w-3 h-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                <a href="{{ route('blog.index') }}" class="hover:text-primary transition-colors">Blog</a>
                <svg class="w-3 h-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                <span class="text-gray-800 font-medium">{{ Str::limit($blog->title, 40) }}</span>
            </div>
        </div>
    </div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <article>
            @if ($blog->featured_image)
                <img src="{{ $blog->featured_image }}" alt="{{ $blog->title }}" class="w-full h-64 sm:h-96 object-cover rounded-xl mb-8">
            @endif

            <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-4">{{ $blog->title }}</h1>

            <div class="flex items-center gap-3 text-sm text-gray-500 mb-8">
                @if ($blog->author)
                    <span>{{ $blog->author->name }}</span>
                    <span>&middot;</span>
                @endif
                @if ($blog->published_at)
                    <span>{{ $blog->published_at->format('F j, Y') }}</span>
                @endif
                @if ($blog->categories->isNotEmpty())
                    <span>&middot;</span>
                    @foreach ($blog->categories as $cat)
                        <span class="text-primary">{{ $cat->name }}</span>@if (!$loop->last), @endif
                    @endforeach
                @endif
            </div>

            <div class="prose prose-gray max-w-none">
                {!! $blog->content !!}
            </div>
        </article>

        @if ($recent->isNotEmpty())
            <div class="mt-12 pt-8 border-t border-gray-200">
                <h2 class="text-xl font-semibold text-gray-900 mb-6">Recent Posts</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    @foreach ($recent as $post)
                        <a href="{{ route('blog.show', $post->slug) }}" class="group">
                            <div class="flex items-start gap-4">
                                @if ($post->featured_image)
                                    <img src="{{ $post->featured_image }}" alt="{{ $post->title }}" class="w-20 h-20 rounded-lg object-cover shrink-0">
                                @endif
                                <div>
                                    <h3 class="text-sm font-semibold text-gray-900 group-hover:text-primary transition-colors line-clamp-2">
                                        {{ $post->title }}
                                    </h3>
                                    <p class="text-xs text-gray-500 mt-1">
                                        {{ $post->published_at?->format('M j, Y') }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</x-layouts.app>
