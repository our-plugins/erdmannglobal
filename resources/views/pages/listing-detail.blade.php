<x-public-layout>
    <x-slot name="metaTitle">{{ $property->meta_title }}</x-slot>
    <x-slot name="metaDescription">{{ $property->meta_description ?? Str::limit(strip_tags($property->description), 160) }}</x-slot>
    <x-slot name="ogImage">{{ $property->primary_image_url }}</x-slot>
    <x-slot name="ogType">realestate.listing</x-slot>

    <div class="bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Header -->
            <div class="flex justify-between items-start mb-6">
                <h1 class="text-2xl md:text-3xl font-bold text-gray-900">{{ $property->title }}</h1>
                <button class="text-gray-500 hover:text-gold-500 flex items-center gap-1">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/>
                    </svg>
                    {{ __('messages.share') }}
                </button>
            </div>

            <div class="lg:flex lg:gap-8">
                <!-- Main Content -->
                <div class="lg:flex-1">
                    <!-- Image Gallery -->
                    <div class="mb-6">
                        @php $images = $property->images; @endphp
                        <div class="grid grid-cols-4 gap-2" x-data="{ activeImage: '{{ $property->primary_image_url }}' }">
                            <div class="col-span-4 md:col-span-2 row-span-2 relative">
                                @if($property->is_new)
                                    <span class="absolute top-3 left-3 bg-green-500 text-white text-xs font-semibold px-2 py-1 rounded z-10">
                                        {{ __('messages.new') }}
                                    </span>
                                @endif
                                <img :src="activeImage" alt="{{ $property->title }}"
                                    class="w-full h-64 md:h-full object-cover rounded-lg cursor-pointer"
                                    loading="lazy">
                            </div>
                            @foreach($images->take(4) as $index => $image)
                                @if($index > 0 || $images->count() == 1)
                                <div class="hidden md:block">
                                    <img src="{{ $image->url }}" alt="{{ $property->title }}"
                                        class="w-full h-32 object-cover rounded-lg cursor-pointer hover:opacity-80 transition"
                                        @click="activeImage = '{{ $image->url }}'"
                                        loading="lazy">
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <!-- Property Info Bar -->
                    <div class="flex flex-wrap items-center gap-4 text-sm text-gray-600 mb-6">
                        <span class="bg-gold-100 text-gold-700 px-3 py-1 rounded-full font-medium capitalize">
                            {{ __('messages.for_' . $property->transaction_type) ?? ucfirst($property->transaction_type) }}
                        </span>
                        <span class="bg-gray-100 px-3 py-1 rounded-full capitalize">
                            {{ __('messages.' . $property->property_type) ?? ucfirst($property->property_type) }}
                        </span>
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            </svg>
                            {{ $property->neighborhood ?? $property->city }}
                        </span>
                    </div>

                    <!-- Quick Stats -->
                    <div class="flex flex-wrap items-center gap-6 text-gray-600 mb-6 pb-6 border-b">
                        @if($property->bedrooms)
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                </svg>
                                <span>{{ $property->bedrooms }}</span>
                            </div>
                        @endif
                        @if($property->bathrooms)
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"/>
                                </svg>
                                <span>{{ $property->bathrooms }}</span>
                            </div>
                        @endif
                        @if($property->area_sqm)
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/>
                                </svg>
                                <span>{{ number_format($property->area_sqm) }} {{ __('messages.sqm') }}</span>
                            </div>
                        @endif
                        <div class="ml-auto text-2xl font-bold text-gold-600">
                            {{ $property->formatted_price }}
                        </div>
                    </div>

                    <!-- Property Detail Section -->
                    <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
                        <h2 class="text-xl font-semibold text-gray-900 mb-4">{{ __('messages.property_detail') }}</h2>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
                            @if($property->furnished)
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center">
                                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-xs text-gray-500">{{ __('messages.furniture') }}</div>
                                        <div class="font-medium">{{ __('messages.' . $property->furnished) }}</div>
                                    </div>
                                </div>
                            @endif
                            @if($property->floor)
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center">
                                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-xs text-gray-500">{{ __('messages.floor') }}</div>
                                        <div class="font-medium">{{ $property->floor }}</div>
                                    </div>
                                </div>
                            @endif
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-xs text-gray-500">{{ __('messages.property_id') }}</div>
                                    <div class="font-medium">{{ $property->property_code }}</div>
                                </div>
                            </div>
                            @if($property->area_sqm)
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center">
                                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-xs text-gray-500">{{ __('messages.area') }}</div>
                                        <div class="font-medium">{{ number_format($property->area_sqm) }} {{ __('messages.sqm') }}</div>
                                    </div>
                                </div>
                            @endif
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-xs text-gray-500">{{ __('messages.date_listed') }}</div>
                                    <div class="font-medium">{{ $property->created_at->format('m/d/y') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
                        <h2 class="text-xl font-semibold text-gray-900 mb-4">{{ __('messages.description') }}</h2>
                        <div class="prose max-w-none text-gray-600">
                            {!! nl2br(e($property->description)) !!}
                        </div>
                    </div>

                    <!-- Features -->
                    @if($property->features->count())
                    <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
                        <h2 class="text-xl font-semibold text-gray-900 mb-4">{{ __('messages.property_features') }}</h2>
                        <div class="grid grid-cols-2 gap-4" x-data="{ showAll: false }">
                            @foreach($property->features->take(8) as $feature)
                                <div class="flex items-center justify-between py-2 border-b border-gray-100">
                                    <span class="text-gray-600">{{ $feature->label }}:</span>
                                    <span class="font-medium {{ $feature->value === 'yes' ? 'text-green-600' : 'text-gray-400' }}">
                                        {{ $feature->display_value }}
                                    </span>
                                </div>
                            @endforeach
                            @if($property->features->count() > 8)
                                <template x-if="showAll">
                                    @foreach($property->features->skip(8) as $feature)
                                        <div class="flex items-center justify-between py-2 border-b border-gray-100">
                                            <span class="text-gray-600">{{ $feature->label }}:</span>
                                            <span class="font-medium {{ $feature->value === 'yes' ? 'text-green-600' : 'text-gray-400' }}">
                                                {{ $feature->display_value }}
                                            </span>
                                        </div>
                                    @endforeach
                                </template>
                                <button @click="showAll = !showAll"
                                    class="col-span-2 text-gold-500 hover:text-gold-600 font-medium text-sm border border-gold-500 rounded-lg py-2 mt-2">
                                    <span x-show="!showAll">Show More</span>
                                    <span x-show="showAll">Show Less</span>
                                </button>
                            @endif
                        </div>
                    </div>
                    @endif

                    <!-- Map -->
                    @if($property->latitude && $property->longitude)
                    <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
                        <h2 class="text-xl font-semibold text-gray-900 mb-4">{{ __('messages.map') }}</h2>
                        <div class="rounded-lg overflow-hidden h-80">
                            <iframe
                                width="100%"
                                height="100%"
                                frameborder="0"
                                src="https://www.google.com/maps/embed/v1/place?key=YOUR_API_KEY&q={{ $property->latitude }},{{ $property->longitude }}&zoom=15"
                                allowfullscreen
                                loading="lazy">
                            </iframe>
                        </div>
                    </div>
                    @endif

                    <!-- Video -->
                    @if($property->video_url)
                    <div class="bg-white rounded-xl shadow-sm p-6 mb-6">
                        <h2 class="text-xl font-semibold text-gray-900 mb-4">{{ __('messages.video') }}</h2>
                        <div class="rounded-lg overflow-hidden aspect-video">
                            @if(str_contains($property->video_url, 'youtube'))
                                @php
                                    preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $property->video_url, $matches);
                                    $videoId = $matches[1] ?? '';
                                @endphp
                                <iframe width="100%" height="100%"
                                    src="https://www.youtube.com/embed/{{ $videoId }}"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen
                                    loading="lazy">
                                </iframe>
                            @else
                                <video controls class="w-full h-full">
                                    <source src="{{ $property->video_url }}" type="video/mp4">
                                </video>
                            @endif
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <aside class="lg:w-80 flex-shrink-0 mt-8 lg:mt-0">
                    <div class="bg-white rounded-xl shadow-sm p-6 sticky top-24">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">{{ __('messages.contact_agent') }}</h3>

                        <div class="flex items-center gap-3 mb-4 pb-4 border-b">
                            <div class="w-12 h-12 bg-gold-100 rounded-full flex items-center justify-center">
                                <span class="text-gold-600 font-bold">EG</span>
                            </div>
                            <div>
                                <div class="font-semibold">{{ __('messages.customer_service') }}</div>
                                <div class="text-sm text-gray-500">Tangier, Morocco</div>
                            </div>
                        </div>

                        <div class="space-y-3 mb-6">
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-500">{{ __('messages.whatsapp') }}:</span>
                                <a href="tel:+212600000000" class="text-gray-900 hover:text-gold-500">+212 600-000000</a>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-500">{{ __('messages.email') }}:</span>
                                <a href="mailto:info@mre.ma" class="text-gray-900 hover:text-gold-500">info@mre.ma</a>
                            </div>
                        </div>

                        <a href="{{ route('contact', ['locale' => app()->getLocale(), 'property' => $property->id]) }}"
                            class="block w-full bg-gold-500 hover:bg-gold-600 text-white font-semibold py-3 px-6 rounded-lg text-center transition duration-200">
                            {{ __('messages.get_in_touch') }}
                        </a>
                    </div>
                </aside>
            </div>

            <!-- Similar Properties -->
            @if($similarProperties->count())
            <section class="mt-12 pt-12 border-t">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">{{ __('messages.similar_properties') }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($similarProperties as $similar)
                        @include('components.property-card', ['property' => $similar])
                    @endforeach
                </div>
            </section>
            @endif
        </div>
    </div>

    @push('schema')
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "RealEstateListing",
        "name": "{{ $property->title }}",
        "description": "{{ Str::limit(strip_tags($property->description), 200) }}",
        "url": "{{ url()->current() }}",
        "image": "{{ $property->primary_image_url }}",
        "price": "{{ $property->price }}",
        "priceCurrency": "{{ $property->currency }}",
        "address": {
            "@@type": "PostalAddress",
            "addressLocality": "{{ $property->city }}",
            "addressCountry": "MA"
        },
        @if($property->latitude && $property->longitude)
        "geo": {
            "@@type": "GeoCoordinates",
            "latitude": "{{ $property->latitude }}",
            "longitude": "{{ $property->longitude }}"
        },
        @endif
        "numberOfRooms": "{{ $property->bedrooms }}",
        "floorSize": {
            "@@type": "QuantitativeValue",
            "value": "{{ $property->area_sqm }}",
            "unitCode": "MTK"
        }
    }
    </script>
    @endpush
</x-public-layout>
