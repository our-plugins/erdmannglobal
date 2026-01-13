<x-public-layout>
    <x-slot name="metaTitle">{{ $property->meta_title }}</x-slot>
    <x-slot name="metaDescription">{{ $property->meta_description ?? Str::limit(strip_tags($property->description), 160) }}</x-slot>
    <x-slot name="ogImage">{{ $property->primary_image_url }}</x-slot>
    <x-slot name="ogType">realestate.listing</x-slot>

    <div class="bg-page min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Breadcrumb -->
            <nav class="flex items-center space-x-2 text-sm mb-6">
                <a href="{{ route('home', ['locale' => app()->getLocale()]) }}" class="text-text-muted hover:text-gold transition-colors">{{ __('messages.home') }}</a>
                <svg class="w-4 h-4 text-text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <a href="{{ route('properties.index', ['locale' => app()->getLocale()]) }}" class="text-text-muted hover:text-gold transition-colors">{{ __('messages.listings') }}</a>
                <svg class="w-4 h-4 text-text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <span class="text-text-primary font-medium truncate max-w-xs">{{ $property->title }}</span>
            </nav>

            <!-- Header -->
            <div class="flex flex-col md:flex-row justify-between items-start mb-6 gap-4">
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-text-primary">{{ $property->title }}</h1>
                    <div class="flex items-center mt-2 text-text-muted">
                        <svg class="w-5 h-5 mr-2 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        {{ $property->neighborhood ?? $property->city }}
                    </div>
                </div>
                <button class="flex items-center gap-2 text-text-secondary hover:text-gold transition-colors bg-white border border-border-light px-4 py-2 rounded-xl">
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
                    <div class="mb-8" x-data="imageGallery()">
                        @php $images = $property->images; @endphp

                        <!-- Main Gallery Grid -->
                        <div class="grid grid-cols-4 gap-3">
                            <!-- Main Image -->
                            <div class="col-span-4 md:col-span-3 relative">
                                @if($property->is_new)
                                    <span class="absolute top-4 left-4 bg-success text-white text-xs font-semibold px-3 py-1.5 rounded-lg z-10 shadow-soft">
                                        {{ __('messages.new') }}
                                    </span>
                                @endif
                                <img :src="currentImage" alt="{{ $property->title }}"
                                    class="w-full h-72 md:h-[420px] object-cover rounded-2xl cursor-pointer shadow-soft-lg hover:shadow-soft-xl transition-shadow duration-300"
                                    @click="openLightbox(currentIndex)"
                                    loading="lazy">

                                <!-- Image Counter Badge -->
                                @if($images->count() > 1)
                                <button @click="openLightbox(0)"
                                    class="absolute bottom-4 right-4 bg-white/95 backdrop-blur-sm hover:bg-white text-text-primary px-4 py-2.5 rounded-xl flex items-center gap-2 transition-all shadow-soft-md">
                                    <svg class="w-5 h-5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <span class="font-semibold">{{ $images->count() }} {{ __('messages.photos') ?? 'Photos' }}</span>
                                </button>
                                @endif
                            </div>

                            <!-- Thumbnail Sidebar -->
                            <div class="hidden md:flex md:col-span-1 flex-col gap-3 max-h-[420px] overflow-y-auto">
                                @foreach($images->take(5) as $index => $image)
                                    <div class="relative">
                                        <img src="{{ $image->url }}" alt="{{ $property->title }}"
                                            class="w-full h-[78px] object-cover rounded-xl cursor-pointer transition-all duration-200"
                                            :class="currentIndex === {{ $index }} ? 'ring-2 ring-gold opacity-100' : 'hover:opacity-90 opacity-70'"
                                            @click="setImage({{ $index }})"
                                            loading="lazy">
                                        @if($loop->last && $images->count() > 5)
                                            <button @click="openLightbox(5)"
                                                class="absolute inset-0 bg-text-primary/60 rounded-xl flex items-center justify-center hover:bg-text-primary/70 transition-colors">
                                                <span class="text-white font-semibold text-lg">+{{ $images->count() - 5 }}</span>
                                            </button>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Mobile Thumbnail Strip -->
                        <div class="flex md:hidden gap-2 mt-3 overflow-x-auto pb-2">
                            @foreach($images->take(6) as $index => $image)
                                <div class="flex-shrink-0 relative">
                                    <img src="{{ $image->url }}" alt="{{ $property->title }}"
                                        class="w-20 h-16 object-cover rounded-xl cursor-pointer transition-all duration-200"
                                        :class="currentIndex === {{ $index }} ? 'ring-2 ring-gold opacity-100' : 'opacity-70'"
                                        @click="setImage({{ $index }})"
                                        loading="lazy">
                                    @if($loop->last && $images->count() > 6)
                                        <button @click="openLightbox(6)"
                                            class="absolute inset-0 bg-text-primary/60 rounded-xl flex items-center justify-center">
                                            <span class="text-white font-semibold text-sm">+{{ $images->count() - 6 }}</span>
                                        </button>
                                    @endif
                                </div>
                            @endforeach
                        </div>

                        <!-- Lightbox Modal -->
                        <div x-show="lightboxOpen"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0"
                            x-transition:enter-end="opacity-100"
                            x-transition:leave="transition ease-in duration-200"
                            x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                            class="fixed inset-0 z-50 bg-text-primary/95 flex items-center justify-center"
                            @keydown.escape.window="closeLightbox()"
                            @keydown.arrow-left.window="prevImage()"
                            @keydown.arrow-right.window="nextImage()">

                            <!-- Close Button -->
                            <button @click="closeLightbox()"
                                class="absolute top-4 right-4 text-white/80 hover:text-white p-2 z-10 bg-white/10 rounded-full">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>

                            <!-- Counter -->
                            <div class="absolute top-4 left-4 text-white/80 text-lg font-medium z-10 bg-white/10 px-4 py-2 rounded-lg">
                                <span x-text="lightboxIndex + 1"></span> / <span x-text="images.length"></span>
                            </div>

                            <!-- Previous Button -->
                            <button @click="prevImage()"
                                class="absolute left-4 top-1/2 -translate-y-1/2 text-white/80 hover:text-white p-3 bg-white/10 hover:bg-white/20 rounded-full transition-colors z-10">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                </svg>
                            </button>

                            <!-- Main Lightbox Image -->
                            <img :src="images[lightboxIndex]" alt="{{ $property->title }}"
                                class="max-h-[85vh] max-w-[90vw] object-contain rounded-2xl shadow-2xl">

                            <!-- Next Button -->
                            <button @click="nextImage()"
                                class="absolute right-4 top-1/2 -translate-y-1/2 text-white/80 hover:text-white p-3 bg-white/10 hover:bg-white/20 rounded-full transition-colors z-10">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </button>

                            <!-- Thumbnail Strip in Lightbox -->
                            <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-2 overflow-x-auto max-w-[90vw] p-3 bg-white/10 rounded-2xl backdrop-blur-sm">
                                @foreach($images as $index => $image)
                                    <img src="{{ $image->url }}" alt="{{ $property->title }}"
                                        class="w-16 h-12 object-cover rounded-lg cursor-pointer flex-shrink-0 transition-all duration-200"
                                        :class="lightboxIndex === {{ $index }} ? 'ring-2 ring-gold opacity-100' : 'opacity-50 hover:opacity-80'"
                                        @click="lightboxIndex = {{ $index }}"
                                        loading="lazy">
                                @endforeach
                            </div>
                        </div>

                        <script>
                            function imageGallery() {
                                return {
                                    images: @json($images->pluck('url')),
                                    currentIndex: 0,
                                    lightboxOpen: false,
                                    lightboxIndex: 0,
                                    get currentImage() {
                                        return this.images[this.currentIndex] || '{{ $property->primary_image_url }}';
                                    },
                                    setImage(index) {
                                        this.currentIndex = index;
                                    },
                                    openLightbox(index) {
                                        this.lightboxIndex = index;
                                        this.lightboxOpen = true;
                                        document.body.style.overflow = 'hidden';
                                    },
                                    closeLightbox() {
                                        this.lightboxOpen = false;
                                        document.body.style.overflow = '';
                                    },
                                    nextImage() {
                                        this.lightboxIndex = (this.lightboxIndex + 1) % this.images.length;
                                    },
                                    prevImage() {
                                        this.lightboxIndex = (this.lightboxIndex - 1 + this.images.length) % this.images.length;
                                    }
                                }
                            }
                        </script>
                    </div>

                    <!-- Property Info Bar -->
                    <div class="flex flex-wrap items-center gap-3 mb-6">
                        <span class="bg-gold-50 text-gold px-4 py-2 rounded-xl font-semibold text-sm capitalize">
                            {{ __('messages.for_' . $property->transaction_type) ?? ucfirst($property->transaction_type) }}
                        </span>
                        <span class="bg-page-section text-text-secondary px-4 py-2 rounded-xl font-medium text-sm capitalize">
                            {{ __('messages.' . $property->property_type) ?? ucfirst($property->property_type) }}
                        </span>
                    </div>

                    <!-- Quick Stats -->
                    <div class="bg-white rounded-2xl border border-border-light p-6 mb-6 shadow-soft">
                        <div class="flex flex-wrap items-center justify-between gap-6">
                            <div class="flex flex-wrap items-center gap-8">
                                @if($property->bedrooms)
                                    <div class="flex items-center gap-3">
                                        <div class="w-12 h-12 rounded-xl bg-gold-50 flex items-center justify-center">
                                            <svg class="w-6 h-6 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-xs text-text-muted uppercase tracking-wider">{{ __('messages.bedrooms') }}</p>
                                            <p class="text-lg font-semibold text-text-primary">{{ $property->bedrooms }}</p>
                                        </div>
                                    </div>
                                @endif
                                @if($property->bathrooms)
                                    <div class="flex items-center gap-3">
                                        <div class="w-12 h-12 rounded-xl bg-gold-50 flex items-center justify-center">
                                            <svg class="w-6 h-6 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-xs text-text-muted uppercase tracking-wider">{{ __('messages.bathrooms') }}</p>
                                            <p class="text-lg font-semibold text-text-primary">{{ $property->bathrooms }}</p>
                                        </div>
                                    </div>
                                @endif
                                @if($property->area_sqm)
                                    <div class="flex items-center gap-3">
                                        <div class="w-12 h-12 rounded-xl bg-gold-50 flex items-center justify-center">
                                            <svg class="w-6 h-6 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-xs text-text-muted uppercase tracking-wider">{{ __('messages.area') }}</p>
                                            <p class="text-lg font-semibold text-text-primary">{{ number_format($property->area_sqm) }} {{ __('messages.sqm') }}</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="text-right">
                                <p class="text-xs text-text-muted uppercase tracking-wider mb-1">{{ __('messages.price') ?? 'Price' }}</p>
                                <p class="text-2xl md:text-3xl font-bold text-gold">{{ $property->formatted_price }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Property Detail Section -->
                    <div class="bg-white rounded-2xl border border-border-light p-6 mb-6 shadow-soft">
                        <h2 class="text-xl font-semibold text-text-primary mb-5 flex items-center">
                            <div class="w-10 h-10 rounded-xl bg-gold-50 flex items-center justify-center mr-3">
                                <svg class="w-5 h-5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                            </div>
                            {{ __('messages.property_detail') }}
                        </h2>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
                            @if($property->furnished)
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-page-section rounded-xl flex items-center justify-center">
                                        <svg class="w-5 h-5 text-text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-xs text-text-muted uppercase tracking-wider">{{ __('messages.furniture') }}</div>
                                        <div class="font-medium text-text-primary">{{ __('messages.' . $property->furnished) }}</div>
                                    </div>
                                </div>
                            @endif
                            @if($property->floor)
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-page-section rounded-xl flex items-center justify-center">
                                        <svg class="w-5 h-5 text-text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-xs text-text-muted uppercase tracking-wider">{{ __('messages.floor') }}</div>
                                        <div class="font-medium text-text-primary">{{ $property->floor }}</div>
                                    </div>
                                </div>
                            @endif
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-page-section rounded-xl flex items-center justify-center">
                                    <svg class="w-5 h-5 text-text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-xs text-text-muted uppercase tracking-wider">{{ __('messages.property_id') }}</div>
                                    <div class="font-medium text-text-primary">{{ $property->property_code }}</div>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-page-section rounded-xl flex items-center justify-center">
                                    <svg class="w-5 h-5 text-text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-xs text-text-muted uppercase tracking-wider">{{ __('messages.date_listed') }}</div>
                                    <div class="font-medium text-text-primary">{{ $property->created_at->format('m/d/y') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="bg-white rounded-2xl border border-border-light p-6 mb-6 shadow-soft">
                        <h2 class="text-xl font-semibold text-text-primary mb-5 flex items-center">
                            <div class="w-10 h-10 rounded-xl bg-gold-50 flex items-center justify-center mr-3">
                                <svg class="w-5 h-5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/>
                                </svg>
                            </div>
                            {{ __('messages.description') }}
                        </h2>
                        <div class="prose max-w-none text-text-secondary leading-relaxed">
                            {!! nl2br(e($property->description)) !!}
                        </div>
                    </div>

                    <!-- Features -->
                    @if($property->features->count())
                    <div class="bg-white rounded-2xl border border-border-light p-6 mb-6 shadow-soft">
                        <h2 class="text-xl font-semibold text-text-primary mb-5 flex items-center">
                            <div class="w-10 h-10 rounded-xl bg-gold-50 flex items-center justify-center mr-3">
                                <svg class="w-5 h-5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            {{ __('messages.property_features') }}
                        </h2>
                        <div class="grid grid-cols-2 gap-4" x-data="{ showAll: false }">
                            @foreach($property->features->take(8) as $feature)
                                <div class="flex items-center justify-between py-3 px-4 bg-page-section rounded-xl">
                                    <span class="text-text-secondary">{{ $feature->label }}:</span>
                                    <span class="font-medium {{ $feature->value === 'yes' ? 'text-success' : 'text-text-muted' }}">
                                        {{ $feature->display_value }}
                                    </span>
                                </div>
                            @endforeach
                            @if($property->features->count() > 8)
                                <template x-if="showAll">
                                    @foreach($property->features->skip(8) as $feature)
                                        <div class="flex items-center justify-between py-3 px-4 bg-page-section rounded-xl">
                                            <span class="text-text-secondary">{{ $feature->label }}:</span>
                                            <span class="font-medium {{ $feature->value === 'yes' ? 'text-success' : 'text-text-muted' }}">
                                                {{ $feature->display_value }}
                                            </span>
                                        </div>
                                    @endforeach
                                </template>
                                <button @click="showAll = !showAll"
                                    class="col-span-2 text-gold hover:text-gold-dark font-semibold text-sm border border-gold rounded-xl py-3 transition-colors">
                                    <span x-show="!showAll">Show More Features</span>
                                    <span x-show="showAll">Show Less</span>
                                </button>
                            @endif
                        </div>
                    </div>
                    @endif

                    <!-- Map -->
                    @if($property->latitude && $property->longitude)
                    <div class="bg-white rounded-2xl border border-border-light p-6 mb-6 shadow-soft">
                        <h2 class="text-xl font-semibold text-text-primary mb-5 flex items-center">
                            <div class="w-10 h-10 rounded-xl bg-gold-50 flex items-center justify-center mr-3">
                                <svg class="w-5 h-5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            {{ __('messages.map') }}
                        </h2>
                        <div class="rounded-xl overflow-hidden h-80">
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
                    <div class="bg-white rounded-2xl border border-border-light p-6 mb-6 shadow-soft">
                        <h2 class="text-xl font-semibold text-text-primary mb-5 flex items-center">
                            <div class="w-10 h-10 rounded-xl bg-gold-50 flex items-center justify-center mr-3">
                                <svg class="w-5 h-5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            {{ __('messages.video') }}
                        </h2>
                        <div class="rounded-xl overflow-hidden aspect-video">
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
                <aside class="lg:w-96 flex-shrink-0 mt-8 lg:mt-0">
                    <div class="bg-white rounded-2xl border border-border-light p-6 sticky top-24 shadow-soft">
                        <h3 class="text-lg font-semibold text-text-primary mb-5">{{ __('messages.contact_agent') }}</h3>

                        <div class="flex items-center gap-4 mb-5 pb-5 border-b border-border-light">
                            <div class="w-14 h-14 bg-gold-50 rounded-xl flex items-center justify-center">
                                <span class="text-gold font-bold text-lg">EG</span>
                            </div>
                            <div>
                                <div class="font-semibold text-text-primary">{{ __('messages.customer_service') }}</div>
                                <div class="text-sm text-text-muted">Tangier, Morocco</div>
                            </div>
                        </div>

                        <div class="space-y-4 mb-6">
                            <div class="flex items-center justify-between p-3 bg-page-section rounded-xl">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 rounded-lg bg-gold-50 flex items-center justify-center mr-3">
                                        <svg class="w-5 h-5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                        </svg>
                                    </div>
                                    <span class="text-sm text-text-muted">{{ __('messages.whatsapp') }}</span>
                                </div>
                                <a href="tel:+212600000000" class="text-text-primary font-medium hover:text-gold transition-colors">+212 600-000000</a>
                            </div>
                            <div class="flex items-center justify-between p-3 bg-page-section rounded-xl">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 rounded-lg bg-gold-50 flex items-center justify-center mr-3">
                                        <svg class="w-5 h-5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <span class="text-sm text-text-muted">{{ __('messages.email') }}</span>
                                </div>
                                <a href="mailto:info@mre.ma" class="text-text-primary font-medium hover:text-gold transition-colors">info@mre.ma</a>
                            </div>
                        </div>

                        <a href="{{ route('contact', ['locale' => app()->getLocale(), 'property' => $property->id]) }}"
                            class="block w-full bg-gold hover:bg-gold-dark text-white font-semibold py-4 px-6 rounded-xl text-center transition-all duration-200 shadow-soft hover:shadow-soft-md">
                            {{ __('messages.get_in_touch') }}
                        </a>
                    </div>
                </aside>
            </div>

            <!-- Similar Properties -->
            @if($similarProperties->count())
            <section class="mt-16 pt-12 border-t border-border-light">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
                    <div>
                        <span class="text-gold font-semibold text-sm uppercase tracking-wider mb-2 block">{{ __('messages.you_may_also_like') ?? 'You May Also Like' }}</span>
                        <h2 class="text-2xl font-bold text-text-primary">{{ __('messages.similar_properties') }}</h2>
                    </div>
                </div>
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
