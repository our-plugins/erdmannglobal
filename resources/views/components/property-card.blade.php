<<<<<<< HEAD
<div class="bg-dark-100 rounded-xl border border-dark-300 overflow-hidden hover:border-gold/50 transition-all duration-300 group">
    <a href="{{ route('properties.show', ['locale' => app()->getLocale(), 'slug' => $property->slug]) }}" class="block">
        <div class="relative overflow-hidden">
            <img src="{{ $property->primary_image_url }}" alt="{{ $property->title }}"
                class="w-full h-56 object-cover group-hover:scale-105 transition-transform duration-300"
=======
<div class="bg-white rounded-2xl border border-border-light overflow-hidden shadow-card hover:shadow-card-hover transition-all duration-300 group">
    <a href="{{ route('properties.show', ['locale' => app()->getLocale(), 'slug' => $property->slug]) }}" class="block">
        <div class="relative overflow-hidden">
            <img src="{{ $property->primary_image_url }}" alt="{{ $property->title }}"
                class="w-full h-56 object-cover group-hover:scale-105 transition-transform duration-500"
>>>>>>> master
                loading="lazy">

            <!-- Badges -->
            <div class="absolute top-3 left-3 flex flex-wrap gap-2">
                @if($property->is_new)
<<<<<<< HEAD
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
=======
                    <span class="bg-success text-white text-xs font-semibold px-2.5 py-1 rounded-lg shadow-soft">
                        {{ __('messages.new') }}
                    </span>
                @endif
                <span class="{{ $property->transaction_badge_color }} text-white text-xs font-semibold px-2.5 py-1 rounded-lg shadow-soft capitalize">
                    {{ __('messages.for_' . $property->transaction_type) ?? ucfirst($property->transaction_type) }}
                </span>
            </div>

            <!-- Featured Badge -->
            @if($property->is_featured)
                <div class="absolute top-3 right-3">
                    <span class="bg-gold text-white text-xs font-semibold px-2.5 py-1 rounded-lg shadow-soft flex items-center">
                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        Featured
                    </span>
                </div>
            @endif

            <!-- Property Type Badge -->
            <div class="absolute bottom-3 left-3">
                <span class="bg-white/90 backdrop-blur-sm text-text-secondary text-xs font-medium px-2.5 py-1 rounded-lg shadow-soft capitalize">
                    {{ __('messages.' . $property->property_type) ?? ucfirst($property->property_type) }}
>>>>>>> master
                </span>
            </div>
        </div>

<<<<<<< HEAD
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
=======
        <div class="p-5">
            <!-- Price -->
            <div class="mb-3">
                <span class="text-xl font-bold text-gold">
                    {{ $property->formatted_price }}
                </span>
                @if($property->transaction_type === 'rent')
                    <span class="text-text-muted text-sm">/{{ __('messages.month') ?? 'month' }}</span>
                @endif
            </div>

            <!-- Title -->
            <h3 class="text-lg font-semibold text-text-primary mb-2 truncate group-hover:text-gold transition-colors duration-200">
                {{ $property->title }}
            </h3>

            <!-- Location -->
            <div class="flex items-center text-text-muted text-sm mb-4">
                <svg class="w-4 h-4 mr-1.5 text-gold flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                <span class="truncate">{{ $property->neighborhood ?? $property->city }}</span>
            </div>

            <!-- Features -->
            <div class="flex items-center justify-between text-sm text-text-secondary border-t border-border-light pt-4">
                @if($property->bedrooms)
                    <div class="flex items-center">
                        <div class="w-8 h-8 rounded-lg bg-gold-50 flex items-center justify-center mr-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                        </div>
                        <span class="font-medium">{{ $property->bedrooms }}</span>
>>>>>>> master
                    </div>
                @endif
                @if($property->bathrooms)
                    <div class="flex items-center">
<<<<<<< HEAD
                        <svg class="w-4 h-4 mr-1 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"/>
                        </svg>
                        {{ $property->bathrooms }}
=======
                        <div class="w-8 h-8 rounded-lg bg-gold-50 flex items-center justify-center mr-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"/>
                            </svg>
                        </div>
                        <span class="font-medium">{{ $property->bathrooms }}</span>
>>>>>>> master
                    </div>
                @endif
                @if($property->area_sqm)
                    <div class="flex items-center">
<<<<<<< HEAD
                        <svg class="w-4 h-4 mr-1 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/>
                        </svg>
                        {{ number_format($property->area_sqm) }} {{ __('messages.sqm') }}
=======
                        <div class="w-8 h-8 rounded-lg bg-gold-50 flex items-center justify-center mr-2">
                            <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/>
                            </svg>
                        </div>
                        <span class="font-medium">{{ number_format($property->area_sqm) }} {{ __('messages.sqm') ?? 'm2' }}</span>
>>>>>>> master
                    </div>
                @endif
            </div>
        </div>
    </a>
</div>
