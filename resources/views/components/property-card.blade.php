<div class="bg-dark-100 rounded-xl border border-dark-300 overflow-hidden hover:border-gold/50 transition-all duration-300 group">
    <a href="{{ route('properties.show', ['locale' => app()->getLocale(), 'slug' => $property->slug]) }}" class="block">
        <div class="relative overflow-hidden">
            <img src="{{ $property->primary_image_url }}" alt="{{ $property->title }}"
                class="w-full h-56 object-cover group-hover:scale-105 transition-transform duration-300"
                loading="lazy">

            <!-- Badges -->
            <div class="absolute top-3 left-3 flex flex-wrap gap-2">
                @if($property->is_new)
                    <span class="bg-success text-white text-xs font-semibold px-2 py-1 rounded">
                        {{ __('messages.new') }}
                    </span>
                @endif
                <span class="{{ $property->transaction_badge_color }} text-white text-xs font-semibold px-2 py-1 rounded capitalize">
                    {{ __('messages.for_' . $property->transaction_type) ?? ucfirst($property->transaction_type) }}
                </span>
                <span class="bg-dark/80 text-white text-xs font-semibold px-2 py-1 rounded capitalize backdrop-blur-sm">
                    {{ __('messages.' . $property->property_type) ?? ucfirst($property->property_type) }}
                </span>
            </div>

            <!-- Price Overlay -->
            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-dark to-transparent p-4">
                <span class="text-xl font-bold text-gold">
                    {{ $property->formatted_price }}
                </span>
            </div>
        </div>

        <div class="p-4">
            <h3 class="text-lg font-semibold text-white mb-2 truncate group-hover:text-gold transition-colors">
                {{ $property->title }}
            </h3>

            <div class="flex items-center text-text-muted text-sm mb-3">
                <svg class="w-4 h-4 mr-1 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                {{ $property->neighborhood ?? $property->city }}
            </div>

            <div class="flex items-center justify-between text-sm text-text-secondary border-t border-dark-300 pt-4">
                @if($property->bedrooms)
                    <div class="flex items-center">
                        <svg class="w-4 h-4 mr-1 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        {{ $property->bedrooms }}
                    </div>
                @endif
            </div>
        </div>
    </a>
</div>
