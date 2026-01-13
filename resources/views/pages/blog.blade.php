<x-public-layout>
    <x-slot name="metaTitle">{{ __('messages.blog') }} - {{ __('messages.site_name') }}</x-slot>
    <x-slot name="metaDescription">{{ __('messages.hero_subtitle') }}</x-slot>

    <div class="bg-page min-h-screen">
        <!-- Page Header -->
        <div class="bg-white border-b border-border-light">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-text-primary">
                            @isset($category)
                                {{ $category->name }}
                            @else
                                {{ __('messages.blog') }}
                            @endisset
                        </h1>
                        <p class="text-text-muted mt-2">{{ __('messages.hero_subtitle') }}</p>
                    </div>
                    <div class="mt-4 md:mt-0">
                        <nav class="flex items-center space-x-2 text-sm">
                            <a href="{{ route('home', ['locale' => app()->getLocale()]) }}" class="text-text-muted hover:text-gold transition-colors">{{ __('messages.home') }}</a>
                            <svg class="w-4 h-4 text-text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                            <span class="text-text-primary font-medium">{{ __('messages.blog') }}</span>
                        </nav>
                    </div>
                </div>
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
                        <div class="mt-10">
                            {{ $posts->links() }}
                        </div>
                    @else
                        <div class="text-center py-20 bg-white rounded-2xl border border-border-light">
                            <div class="w-20 h-20 mx-auto mb-6 rounded-2xl bg-gold-50 flex items-center justify-center">
                                <svg class="w-10 h-10 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-text-primary mb-2">No posts found</h3>
                            <p class="text-text-muted">Check back later for new content</p>
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <aside class="lg:w-80 flex-shrink-0 mt-8 lg:mt-0">
                    <div class="bg-white rounded-2xl border border-border-light p-6 sticky top-24 shadow-soft">
                        <h3 class="text-lg font-semibold text-text-primary mb-5 flex items-center">
                            <div class="w-10 h-10 rounded-xl bg-gold-50 flex items-center justify-center mr-3">
                                <svg class="w-5 h-5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                </svg>
                            </div>
                            {{ __('messages.categories') }}
                        </h3>
                        <ul class="space-y-2">
                            <li>
                                <a href="{{ route('blog.index', ['locale' => app()->getLocale()]) }}"
                                    class="flex items-center justify-between py-3 px-4 rounded-xl transition-all duration-200 {{ !isset($category) ? 'bg-gold-50 text-gold font-semibold' : 'hover:bg-page-section text-text-secondary' }}">
                                    <span>All Posts</span>
                                    <span class="text-sm {{ !isset($category) ? 'text-gold' : 'text-text-muted' }}">{{ $posts->total() }}</span>
                                </a>
                            </li>
                            @foreach($categories as $cat)
                                <li>
                                    <a href="{{ route('blog.category', ['locale' => app()->getLocale(), 'slug' => $cat->slug]) }}"
                                        class="flex items-center justify-between py-3 px-4 rounded-xl transition-all duration-200 {{ isset($category) && $category->id == $cat->id ? 'bg-gold-50 text-gold font-semibold' : 'hover:bg-page-section text-text-secondary' }}">
                                        <span>{{ $cat->name }}</span>
                                        <span class="text-sm {{ isset($category) && $category->id == $cat->id ? 'text-gold' : 'text-text-muted' }}">{{ $cat->posts_count }}</span>
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
