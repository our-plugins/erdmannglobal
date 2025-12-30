<article class="bg-dark-100 rounded-xl border border-dark-300 overflow-hidden hover:border-gold/50 transition-all duration-300 group">
    <a href="{{ route('blog.show', ['locale' => app()->getLocale(), 'slug' => $post->slug]) }}" class="block">
        <div class="relative overflow-hidden">
            <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}"
                class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300"
                loading="lazy">
            @if($post->category)
                <span class="absolute top-3 left-3 bg-gold text-dark text-xs font-semibold px-3 py-1 rounded-full">
                    {{ $post->category->name }}
                </span>
            @endif
        </div>

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
                {{ $post->title }}
            </h3>

            @if($post->excerpt)
                <p class="text-text-muted text-sm line-clamp-2 mb-4">
                    {{ $post->excerpt }}
                </p>
            @endif

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
                </span>
            </div>
        </div>
    </a>
</article>
