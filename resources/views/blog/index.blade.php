<x-layouts.app title="Blog">
    <div class="bg-gray-50 border-b border-gray-200 py-3">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center gap-2 text-xs text-gray-500">
                <a href="{{ route('home') }}" class="hover:text-primary transition-colors">Home</a>
                <svg class="w-3 h-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                <span class="text-gray-800 font-medium">Blog</span>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-2xl md:text-3xl font-semibold text-gray-900 mb-8">Our Blog</h1>

        @if ($blogs->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($blogs as $post)
                    <article class="bg-white rounded-xl border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow">
                        <a href="{{ route('blog.show', $post->slug) }}">
                            @if ($post->featured_image)
                                <img src="{{ $post->featured_image }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
                            @else
                                <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
                                    <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                    </svg>
                                </div>
                            @endif
                        </a>
                        <div class="p-5">
                            <div class="flex items-center gap-2 text-xs text-gray-500 mb-2">
                                @if ($post->published_at)
                                    <span>{{ $post->published_at->format('M j, Y') }}</span>
                                @endif
                                @if ($post->author)
                                    <span>&middot;</span>
                                    <span>{{ $post->author->name }}</span>
                                @endif
                            </div>
                            <h2 class="text-lg font-semibold text-gray-900 mb-2 line-clamp-2">
                                <a href="{{ route('blog.show', $post->slug) }}" class="hover:text-primary transition-colors">
                                    {{ $post->title }}
                                </a>
                            </h2>
                            <p class="text-sm text-gray-600 line-clamp-3">
                                {{ $post->getExcerpt() }}
                            </p>
                            <div class="mt-4">
                                <a href="{{ route('blog.show', $post->slug) }}" class="text-sm font-medium text-primary hover:text-primary-dark transition-colors">
                                    Read more &rarr;
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $blogs->links() }}
            </div>
        @else
            <div class="text-center py-16">
                <svg class="w-20 h-20 mx-auto text-gray-300 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                </svg>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">No posts yet</h3>
                <p class="text-sm text-gray-500 max-w-md mx-auto">
                    Check back soon for new articles and updates.
                </p>
            </div>
        @endif
    </div>
</x-layouts.app>
