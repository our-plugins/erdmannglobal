<x-public-layout>
    <x-slot name="metaTitle">{{ __('messages.site_name') }} - {{ __('messages.hero_title') }}</x-slot>
    <x-slot name="metaDescription">{{ __('messages.hero_subtitle') }}</x-slot>

    <!-- Hero Section -->
    <section class="relative bg-dark py-20 lg:py-32 overflow-hidden">
        <!-- Background Image with Overlay -->
        {{-- <div class="absolute inset-0 bg-cover bg-center opacity-30" style="background-image: url('{{ asset('images/hero-bg.jpg') }}');"></div> --}}
        <div class="absolute inset-0 overflow-hidden">
            <video
                class="w-full h-full object-cover opacity-30"
                autoplay
                loop
                muted
                playsinline
            >
                <source src="{{ asset('images/video-tanger.mp4') }}" type="video/mp4">
            </video>
        </div>

        <div class="absolute inset-0 bg-gradient-to-b from-dark/80 via-dark/60"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6">
                    {{ __('messages.hero_title') }}
                </h1>
                <p class="text-xl text-text-secondary max-w-3xl mx-auto">
                    {{ __('messages.hero_subtitle') }}
                </p>
            </div>

            <!-- Search Form -->
            <div class="max-w-5xl mx-auto">
                <form action="{{ route('properties.index', ['locale' => app()->getLocale()]) }}" method="GET" id="searchForm">
                    <!-- Status Tabs -->
                    <div class="flex justify-center mb-0">
                        <div class="inline-flex rounded-t-lg overflow-hidden border border-b-0 border-dark-300">
                            <button type="button" data-status=""
                                class="status-tab px-8 py-3 text-sm font-semibold transition-all duration-200 bg-dark-100 text-gold border-b-2 border-gold">
                                {{ __('messages.all_status') }}
                            </button>
                            <button type="button" data-status="rent"
                                class="status-tab px-8 py-3 text-sm font-semibold transition-all duration-200 bg-gold text-dark hover:bg-gold-light">
                                {{ __('messages.for_rent') }}
                            </button>
                            <button type="button" data-status="sale"
                                class="status-tab px-8 py-3 text-sm font-semibold transition-all duration-200 bg-gold text-dark hover:bg-gold-light">
                                {{ __('messages.for_sale') }}
                            </button>
                        </div>
                    </div>

                    <!-- Hidden input for transaction type -->
                    <input type="hidden" name="transaction" id="transactionInput" value="">

                    <!-- Filter Card -->
                    <div class="bg-dark-100 rounded-xl border border-dark-300 p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4 items-end">
                            <!-- Looking For -->
                            <div>
                                <label class="block text-xs font-semibold text-gold uppercase tracking-wider mb-2">{{ __('messages.looking_for') }}</label>
                                <div class="relative">
                                    <select name="type" class="w-full appearance-none bg-dark-200 border border-dark-300 rounded-lg px-4 py-3 pr-10 text-text-secondary focus:outline-none focus:border-gold focus:ring-1 focus:ring-gold">
                                        <option value="">{{ __('messages.property_type') }}</option>
                                        <option value="apartment">{{ __('messages.apartment') }}</option>
                                        <option value="house">{{ __('messages.house') }}</option>
                                        <option value="villa">{{ __('messages.villa') }}</option>
                                        <option value="land">{{ __('messages.land') }}</option>
                                        <option value="office">{{ __('messages.office') }}</option>
                                        <option value="studio">{{ __('messages.studio') }}</option>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gold">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <!-- Location -->
                            <div>
                                <label class="block text-xs font-semibold text-gold uppercase tracking-wider mb-2">{{ __('messages.location') }}</label>
                                <div class="relative">
                                    <select name="city" class="w-full appearance-none bg-dark-200 border border-dark-300 rounded-lg px-4 py-3 pr-10 text-text-secondary focus:outline-none focus:border-gold focus:ring-1 focus:ring-gold">
                                        <option value="">{{ __('messages.all_cities') }}</option>
                                        <option value="Tangier">Tangier</option>
                                        <option value="Tetouan">Tetouan</option>
                                        <option value="Chefchaouen">Chefchaouen</option>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gold">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <!-- Property Size (Bedrooms) -->
                            <div>
                                <label class="block text-xs font-semibold text-gold uppercase tracking-wider mb-2">{{ __('messages.property_size') }}</label>
                                <div class="relative">
                                    <select name="bedrooms" class="w-full appearance-none bg-dark-200 border border-dark-300 rounded-lg px-4 py-3 pr-10 text-text-secondary focus:outline-none focus:border-gold focus:ring-1 focus:ring-gold">
                                        <option value="">{{ __('messages.bedrooms') }}</option>
                                        <option value="1">1+</option>
                                        <option value="2">2+</option>
                                        <option value="3">3+</option>
                                        <option value="4">4+</option>
                                        <option value="5">5+</option>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gold">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <!-- Your Budget (Max Price) -->
                            <div>
                                <label class="block text-xs font-semibold text-gold uppercase tracking-wider mb-2">{{ __('messages.your_budget') }}</label>
                                <div class="relative">
                                    <select name="max_price" class="w-full appearance-none bg-dark-200 border border-dark-300 rounded-lg px-4 py-3 pr-10 text-text-secondary focus:outline-none focus:border-gold focus:ring-1 focus:ring-gold">
                                        <option value="">{{ __('messages.max_price') }}</option>
                                        <option value="500000">500,000 MAD</option>
                                        <option value="1000000">1,000,000 MAD</option>
                                        <option value="2000000">2,000,000 MAD</option>
                                        <option value="5000000">5,000,000 MAD</option>
                                        <option value="10000000">10,000,000 MAD</option>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gold">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <!-- Search Button -->
                            <div>
                                <button type="submit" class="w-full bg-gold hover:bg-gold-light text-dark font-semibold py-3 px-8 rounded-lg transition duration-200 shadow-lg hover:shadow-xl">
                                    {{ __('messages.search') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Search Form Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const statusTabs = document.querySelectorAll('.status-tab');
            const transactionInput = document.getElementById('transactionInput');

            statusTabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    transactionInput.value = this.dataset.status;

                    statusTabs.forEach(t => {
                        if (t === this) {
                            t.classList.remove('bg-gold', 'text-dark', 'hover:bg-gold-light');
                            t.classList.add('bg-dark-100', 'text-gold', 'border-b-2', 'border-gold');
                        } else {
                            t.classList.remove('bg-dark-100', 'text-gold', 'border-b-2', 'border-gold');
                            t.classList.add('bg-gold', 'text-dark', 'hover:bg-gold-light');
                        }
                    });
                });
            });
        });
    </script>

    <!-- Statistics Section -->
    <section class="py-16 bg-dark-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div class="p-6">
                    <div class="text-4xl font-bold text-gold">{{ $stats['properties'] }}+</div>
                    <div class="text-text-muted mt-2">{{ __('messages.properties_count') }}</div>
                </div>
                <div class="p-6">
                    <div class="text-4xl font-bold text-gold">{{ $stats['rentals'] }}+</div>
                    <div class="text-text-muted mt-2">{{ __('messages.for_rent') }}</div>
                </div>
                <div class="p-6">
                    <div class="text-4xl font-bold text-gold">{{ $stats['sales'] }}+</div>
                    <div class="text-text-muted mt-2">{{ __('messages.for_sale') }}</div>
                </div>
                <div class="p-6">
                    <div class="text-4xl font-bold text-gold">10+</div>
                    <div class="text-text-muted mt-2">{{ __('messages.years_experience') }}</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Properties -->
    @if($featuredProperties->count())
    <section class="py-16 bg-dark">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold text-white">{{ __('messages.featured_properties') }}</h2>
                <a href="{{ route('properties.index', ['locale' => app()->getLocale()]) }}" class="text-gold hover:text-gold-light font-semibold transition-colors">
                    {{ __('messages.view_all') }} &rarr;
                </a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($featuredProperties as $property)
                    @include('components.property-card', ['property' => $property])
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Properties for Rent -->
    @if($propertiesForRent->count())
    <section class="py-16 bg-dark-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold text-white">{{ __('messages.homes_for_rent') }}</h2>
                <a href="{{ route('properties.index', ['locale' => app()->getLocale(), 'transaction' => 'rent']) }}" class="text-gold hover:text-gold-light font-semibold transition-colors">
                    {{ __('messages.view_all') }} &rarr;
                </a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($propertiesForRent as $property)
                    @include('components.property-card', ['property' => $property])
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Properties for Sale -->
    @if($propertiesForSale->count())
    <section class="py-16 bg-dark">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold text-white">{{ __('messages.properties_for_sale') }}</h2>
                <a href="{{ route('properties.index', ['locale' => app()->getLocale(), 'transaction' => 'sale']) }}" class="text-gold hover:text-gold-light font-semibold transition-colors">
                    {{ __('messages.view_all') }} &rarr;
                </a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($propertiesForSale as $property)
                    @include('components.property-card', ['property' => $property])
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Latest Properties -->
    @if($latestProperties->count())
    <section class="py-16 bg-dark-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold text-white">{{ __('messages.latest_listings') }}</h2>
                <a href="{{ route('properties.index', ['locale' => app()->getLocale()]) }}" class="text-gold hover:text-gold-light font-semibold transition-colors">
                    {{ __('messages.view_all') }} &rarr;
                </a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($latestProperties as $property)
                    @include('components.property-card', ['property' => $property])
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Newsletter Section -->
    <section class="py-16 bg-dark relative overflow-hidden">
        <!-- Gold Gradient Border -->
        <div class="absolute top-0 left-0 right-0 h-1 bg-gold-gradient"></div>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-white mb-4">{{ __('messages.newsletter_title') }}</h2>
            <p class="text-text-secondary mb-8">{{ __('messages.newsletter_subtitle') }}</p>
            <form action="{{ route('newsletter.subscribe', ['locale' => app()->getLocale()]) }}" method="POST" class="flex flex-col sm:flex-row gap-4 max-w-xl mx-auto">
                @csrf
                <input type="email" name="email" placeholder="{{ __('messages.your_email') }}" required
                    class="flex-1 px-6 py-3 rounded-lg bg-dark-100 border border-dark-300 text-white placeholder-text-muted focus:outline-none focus:border-gold focus:ring-1 focus:ring-gold">
                <button type="submit" class="bg-gold hover:bg-gold-light text-dark font-semibold px-8 py-3 rounded-lg transition duration-200">
                    {{ __('messages.subscribe') }}
                </button>
            </form>
        </div>
    </section>

    <!-- Latest Blog Posts -->
    @if($latestPosts->count())
    <section class="py-16 bg-dark-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold text-white">{{ __('messages.latest_posts') }}</h2>
                <a href="{{ route('blog.index', ['locale' => app()->getLocale()]) }}" class="text-gold hover:text-gold-light font-semibold transition-colors">
                    {{ __('messages.view_all') }} &rarr;
                </a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($latestPosts as $post)
                    @include('components.blog-card', ['post' => $post])
                @endforeach
            </div>
        </div>
    </section>
    @endif

    @push('schema')
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@@type": "RealEstateAgent",
        "name": "{{ __('messages.site_name') }}",
        "description": "{{ __('messages.hero_subtitle') }}",
        "url": "{{ url('/') }}",
        "address": {
            "@@type": "PostalAddress",
            "addressLocality": "Tangier",
            "addressCountry": "MA"
        }
    }
    </script>
    @endpush
</x-public-layout>
