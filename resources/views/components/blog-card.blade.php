<<<<<<< HEAD
<article class="bg-dark-100 rounded-xl border border-dark-300 overflow-hidden hover:border-gold/50 transition-all duration-300 group">
    <a href="{{ route('blog.show', ['locale' => app()->getLocale(), 'slug' => $post->slug]) }}" class="block">
        <div class="relative overflow-hidden">
            <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}"
                class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300"
                loading="lazy">
            @if($post->category)
                <span class="absolute top-3 left-3 bg-gold text-dark text-xs font-semibold px-3 py-1 rounded-full">
=======
<article class="bg-white rounded-2xl border border-border-light overflow-hidden shadow-card hover:shadow-card-hover transition-all duration-300 group">
    <a href="{{ route('blog.show', ['locale' => app()->getLocale(), 'slug' => $post->slug]) }}" class="block">
        <div class="relative overflow-hidden">
            <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}"
                class="w-full h-52 object-cover group-hover:scale-105 transition-transform duration-500"
                loading="lazy">
            @if($post->category)
                <span class="absolute top-4 left-4 bg-gold text-white text-xs font-semibold px-3 py-1.5 rounded-lg shadow-soft">
>>>>>>> master
                    {{ $post->category->name }}
                </span>
            @endif
        </div>

<<<<<<< HEAD
        <div class="p-5">
            <div class="flex items-center text-text-muted text-sm mb-3">
                @if($post->published_at)
                    <time datetime="{{ $post->published_at->toISOString() }}">
                        {{ $post->published_at->format('M d, Y') }}
                    </time>
                @endif
                <span class="mx-2 text-dark-300">&bull;</span>
                <span>{{ $post->reading_time }} {{ __('messages.read_time') }}</span>
            </div>

            <h3 class="text-lg font-semibold text-white mb-2 group-hover:text-gold transition-colors line-clamp-2">
=======
        <div class="p-6">
            <div class="flex items-center text-text-muted text-sm mb-3">
                @if($post->published_at)
                    <time datetime="{{ $post->published_at->toISOString() }}" class="flex items-center">
                        <svg class="w-4 h-4 mr-1.5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        {{ $post->published_at->format('M d, Y') }}
                    </time>
                @endif
                <span class="mx-3 w-1 h-1 rounded-full bg-border-light"></span>
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-1.5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    {{ $post->reading_time }} {{ __('messages.read_time') }}
                </span>
            </div>

            <h3 class="text-lg font-semibold text-text-primary mb-3 group-hover:text-gold transition-colors duration-200 line-clamp-2">
>>>>>>> master
                {{ $post->title }}
            </h3>

            @if($post->excerpt)
<<<<<<< HEAD
                <p class="text-text-muted text-sm line-clamp-2 mb-4">
=======
                <p class="text-text-muted text-sm line-clamp-2 mb-5">
>>>>>>> master
                    {{ $post->excerpt }}
                </p>
            @endif

<<<<<<< HEAD
            <div class="flex items-center justify-between pt-4 border-t border-dark-300">
                @if($post->display_author_name)
                    <div class="flex items-center">
                        <div class="w-8 h-8 rounded-full mr-2 bg-gold flex items-center justify-center text-dark text-xs font-semibold">
                            {{ strtoupper(substr($post->display_author_name, 0, 1)) }}
                        </div>
                        <span class="text-sm text-text-secondary">{{ $post->display_author_name }}</span>
                    </div>
                @endif
                <span class="text-gold hover:text-gold-light font-medium text-sm transition-colors">
                    {{ __('messages.read_more') }} &rarr;
=======
            <div class="flex items-center justify-between pt-5 border-t border-border-light">
                @if($post->display_author_name)
                    <div class="flex items-center">
                        <div class="w-9 h-9 rounded-xl mr-3 bg-gold-50 flex items-center justify-center text-gold text-sm font-semibold">
                            {{ strtoupper(substr($post->display_author_name, 0, 1)) }}
                        </div>
                        <span class="text-sm text-text-secondary font-medium">{{ $post->display_author_name }}</span>
                    </div>
                @endif
                <span class="text-gold hover:text-gold-dark font-semibold text-sm transition-colors duration-200 flex items-center group/link">
                    {{ __('messages.read_more') }}
                    <svg class="w-4 h-4 ml-1 group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
>>>>>>> master
                </span>
            </div>
        </div>
    </a>
</article>
