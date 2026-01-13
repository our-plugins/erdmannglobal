<x-public-layout>
    <x-slot name="metaTitle">{{ $post->meta_title }}</x-slot>
    <x-slot name="metaDescription">{{ $post->meta_description }}</x-slot>
    <x-slot name="ogImage">{{ $post->featured_image_url }}</x-slot>
    <x-slot name="ogType">article</x-slot>

<<<<<<< HEAD
    <article class="bg-dark min-h-screen">
        <!-- Header Image -->
        <div class="relative h-64 md:h-96 bg-dark">
            <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}"
                class="w-full h-full object-cover opacity-40">
            <div class="absolute inset-0 bg-gradient-to-t from-dark via-dark/50 to-transparent"></div>
=======
    <article class="bg-page min-h-screen">
        <!-- Header Image -->
        <div class="relative h-64 md:h-96">
            <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}"
                class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-text-primary/80 via-text-primary/40 to-transparent"></div>
>>>>>>> master
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="text-center text-white px-4">
                    @if($post->category)
                        <a href="{{ route('blog.category', ['locale' => app()->getLocale(), 'slug' => $post->category->slug]) }}"
<<<<<<< HEAD
                            class="inline-block bg-gold text-dark text-sm font-semibold px-4 py-1 rounded-full mb-4 hover:bg-gold-light transition-colors">
                            {{ $post->category->name }}
                        </a>
                    @endif
                    <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold max-w-4xl mx-auto">{{ $post->title }}</h1>
=======
                            class="inline-block bg-gold text-white text-sm font-semibold px-4 py-1.5 rounded-lg mb-4 hover:bg-gold-dark transition-colors shadow-soft">
                            {{ $post->category->name }}
                        </a>
                    @endif
                    <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold max-w-4xl mx-auto drop-shadow-lg">{{ $post->title }}</h1>
>>>>>>> master
                </div>
            </div>
        </div>

<<<<<<< HEAD
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Meta Info -->
            <div class="flex flex-wrap items-center justify-center gap-4 text-text-muted mb-8 pb-8 border-b border-dark-300">
                @if($post->display_author_name)
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full mr-3 bg-gold flex items-center justify-center text-dark font-semibold">
                            {{ strtoupper(substr($post->display_author_name, 0, 1)) }}
                        </div>
                        <div>
                            <div class="text-sm text-text-muted">{{ __('messages.by') }}</div>
                            <div class="font-medium text-white">{{ $post->display_author_name }}</div>
=======
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <!-- Meta Info -->
            <div class="flex flex-wrap items-center justify-center gap-6 text-text-muted mb-10 pb-10 border-b border-border-light">
                @if($post->display_author_name)
                    <div class="flex items-center">
                        <div class="w-12 h-12 rounded-xl mr-3 bg-gold-50 flex items-center justify-center text-gold font-semibold">
                            {{ strtoupper(substr($post->display_author_name, 0, 1)) }}
                        </div>
                        <div>
                            <div class="text-xs text-text-muted uppercase tracking-wider">{{ __('messages.by') }}</div>
                            <div class="font-medium text-text-primary">{{ $post->display_author_name }}</div>
>>>>>>> master
                        </div>
                    </div>
                @endif
                @if($post->published_at)
                    <div class="flex items-center">
<<<<<<< HEAD
                        <svg class="w-5 h-5 mr-2 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <time datetime="{{ $post->published_at->toISOString() }}">
=======
                        <div class="w-10 h-10 rounded-lg bg-gold-50 flex items-center justify-center mr-2">
                            <svg class="w-5 h-5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <time datetime="{{ $post->published_at->toISOString() }}" class="text-text-secondary">
>>>>>>> master
                            {{ $post->published_at->format('F d, Y') }}
                        </time>
                    </div>
                @endif
                <div class="flex items-center">
<<<<<<< HEAD
                    <svg class="w-5 h-5 mr-2 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    {{ $post->reading_time }} {{ __('messages.read_time') }}
=======
                    <div class="w-10 h-10 rounded-lg bg-gold-50 flex items-center justify-center mr-2">
                        <svg class="w-5 h-5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <span class="text-text-secondary">{{ $post->reading_time }} {{ __('messages.read_time') }}</span>
>>>>>>> master
                </div>
            </div>

            <!-- Content -->
<<<<<<< HEAD
            <div class="prose prose-lg prose-invert max-w-none prose-headings:text-white prose-p:text-text-secondary prose-a:text-gold prose-strong:text-white prose-blockquote:border-gold prose-blockquote:text-text-secondary">
                {!! $post->content !!}
            </div>

            <!-- Share -->
            <div class="flex items-center justify-center gap-4 mt-8 pt-8 border-t border-dark-300">
                <span class="text-text-muted">{{ __('messages.share') }}:</span>
                <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($post->title) }}"
                    target="_blank" class="w-10 h-10 rounded-full bg-dark-100 border border-dark-300 flex items-center justify-center text-text-muted hover:text-gold hover:border-gold transition-colors">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                </a>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                    target="_blank" class="w-10 h-10 rounded-full bg-dark-100 border border-dark-300 flex items-center justify-center text-text-muted hover:text-gold hover:border-gold transition-colors">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"/></svg>
                </a>
                <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}&title={{ urlencode($post->title) }}"
                    target="_blank" class="w-10 h-10 rounded-full bg-dark-100 border border-dark-300 flex items-center justify-center text-text-muted hover:text-gold hover:border-gold transition-colors">
=======
            <div class="bg-white rounded-2xl border border-border-light p-8 mb-10 shadow-soft">
                <div class="prose prose-lg max-w-none prose-headings:text-text-primary prose-p:text-text-secondary prose-a:text-gold prose-strong:text-text-primary prose-blockquote:border-gold prose-blockquote:text-text-secondary">
                    {!! $post->content !!}
                </div>
            </div>

            <!-- Share -->
            <div class="flex items-center justify-center gap-4 mb-10">
                <span class="text-text-muted">{{ __('messages.share') }}:</span>
                <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($post->title) }}"
                    target="_blank" class="w-11 h-11 rounded-xl bg-white border border-border-light flex items-center justify-center text-text-muted hover:text-gold hover:border-gold shadow-soft transition-all duration-200">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                </a>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                    target="_blank" class="w-11 h-11 rounded-xl bg-white border border-border-light flex items-center justify-center text-text-muted hover:text-gold hover:border-gold shadow-soft transition-all duration-200">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"/></svg>
                </a>
                <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}&title={{ urlencode($post->title) }}"
                    target="_blank" class="w-11 h-11 rounded-xl bg-white border border-border-light flex items-center justify-center text-text-muted hover:text-gold hover:border-gold shadow-soft transition-all duration-200">
>>>>>>> master
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                </a>
            </div>

            <!-- Newsletter Subscription -->
<<<<<<< HEAD
            <div class="mt-12 bg-dark-100 border border-dark-300 rounded-xl p-8 text-center relative overflow-hidden">
                <div class="absolute top-0 left-0 right-0 h-1 bg-gold-gradient"></div>
                <h3 class="text-2xl font-bold text-white mb-2">{{ __('messages.newsletter_title') }}</h3>
=======
            <div class="bg-white border border-border-light rounded-2xl p-8 text-center relative overflow-hidden shadow-soft">
                <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-gold-light via-gold to-gold-dark"></div>
                <div class="w-16 h-16 mx-auto mb-5 rounded-2xl bg-gold-50 flex items-center justify-center">
                    <svg class="w-8 h-8 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-text-primary mb-2">{{ __('messages.newsletter_title') }}</h3>
>>>>>>> master
                <p class="text-text-secondary mb-6">{{ __('messages.newsletter_subtitle') }}</p>
                <form action="{{ route('newsletter.subscribe', ['locale' => app()->getLocale()]) }}" method="POST" class="flex flex-col sm:flex-row gap-3 max-w-md mx-auto">
                    @csrf
                    <input type="email" name="email" placeholder="{{ __('messages.your_email') }}" required
<<<<<<< HEAD
                        class="flex-1 px-4 py-3 rounded-lg bg-dark-200 border border-dark-300 text-white placeholder-text-muted focus:outline-none focus:border-gold focus:ring-1 focus:ring-gold">
                    <button type="submit" class="bg-gold hover:bg-gold-light text-dark font-semibold px-6 py-3 rounded-lg transition duration-200">
=======
                        class="flex-1 px-5 py-3.5 rounded-xl bg-page-section border border-border-light text-text-primary placeholder-text-muted focus:outline-none focus:border-gold focus:ring-2 focus:ring-gold/20 transition-all">
                    <button type="submit" class="bg-gold hover:bg-gold-dark text-white font-semibold px-6 py-3.5 rounded-xl transition-all duration-200 shadow-soft hover:shadow-soft-md">
>>>>>>> master
                        {{ __('messages.subscribe') }}
                    </button>
                </form>
            </div>
        </div>

        <!-- Related Posts -->
        @if($relatedPosts->count())
<<<<<<< HEAD
        <section class="bg-dark-100 py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-2xl font-bold text-white mb-6">{{ __('messages.related_posts') }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
=======
        <section class="py-16 bg-page-section">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
                    <div>
                        <span class="text-gold font-semibold text-sm uppercase tracking-wider mb-2 block">{{ __('messages.keep_reading') ?? 'Keep Reading' }}</span>
                        <h2 class="text-2xl font-bold text-text-primary">{{ __('messages.related_posts') }}</h2>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
>>>>>>> master
                    @foreach($relatedPosts as $relatedPost)
                        @include('components.blog-card', ['post' => $relatedPost])
                    @endforeach
                </div>
            </div>
        </section>
        @endif
    </article>

    @push('schema')
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "Article",
        "headline": "{{ $post->title }}",
        "description": "{{ $post->meta_description }}",
        "image": "{{ $post->featured_image_url }}",
        "datePublished": "{{ $post->published_at?->toISOString() }}",
        "dateModified": "{{ $post->updated_at->toISOString() }}",
        @if($post->display_author_name)
        "author": {
            "@@type": "Person",
            "name": "{{ $post->display_author_name }}"
        },
        @endif
        "publisher": {
            "@@type": "Organization",
            "name": "{{ __('messages.site_name') }}"
        }
    }
    </script>
    @endpush
</x-public-layout>
