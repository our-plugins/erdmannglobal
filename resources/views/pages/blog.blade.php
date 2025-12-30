<x-public-layout>
    <x-slot name="metaTitle">{{ __('messages.blog') }} - {{ __('messages.site_name') }}</x-slot>
    <x-slot name="metaDescription">{{ __('messages.hero_subtitle') }}</x-slot>

    <div class="bg-gray-50 min-h-screen">
        <!-- Page Header -->
        <div class="bg-white border-b">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <h1 class="text-3xl font-bold text-gray-900">
                    @isset($category)
                        {{ $category->name }}
                    @else
                        {{ __('messages.blog') }}
                    @endisset
                </h1>
                <p class="text-gray-600 mt-2">{{ __('messages.hero_subtitle') }}</p>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="lg:flex lg:gap-8">
                <!-- Main Content -->
                <div class="flex-1">
                    @if($posts->count())
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($posts as $post)
                                @include('components.blog-card', ['post' => $post])
                            @endforeach
                        </div>

                        <!-- Pagination -->
                        <div class="mt-8">
                            {{ $posts->links() }}
                        </div>
                    @else
                        <div class="text-center py-16">
                            <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                            </svg>
                            <h3 class="text-xl font-semibold text-gray-700">No posts found</h3>
                            <p class="text-gray-500 mt-2">Check back later for new content</p>
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <aside class="lg:w-72 flex-shrink-0 mt-8 lg:mt-0">
                    <div class="bg-white rounded-xl shadow-sm p-6 sticky top-24">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">{{ __('messages.categories') }}</h3>
                        <ul class="space-y-2">
                            <li>
                                <a href="{{ route('blog.index', ['locale' => app()->getLocale()]) }}"
                                    class="flex items-center justify-between py-2 px-3 rounded-lg {{ !isset($category) ? 'bg-gold-100 text-gold-700' : 'hover:bg-gray-100' }}">
                                    <span>All Posts</span>
                                    <span class="text-sm text-gray-500">{{ $posts->total() }}</span>
                                </a>
                            </li>
                            @foreach($categories as $cat)
                                <li>
                                    <a href="{{ route('blog.category', ['locale' => app()->getLocale(), 'slug' => $cat->slug]) }}"
                                        class="flex items-center justify-between py-2 px-3 rounded-lg {{ isset($category) && $category->id == $cat->id ? 'bg-gold-100 text-gold-700' : 'hover:bg-gray-100' }}">
                                        <span>{{ $cat->name }}</span>
                                        <span class="text-sm text-gray-500">{{ $cat->posts_count }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</x-public-layout>
