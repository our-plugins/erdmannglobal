<x-public-layout>
    <x-slot name="metaTitle">{{ __('messages.site_name') }} - {{ __('messages.hero_title') }}</x-slot>
    <x-slot name="metaDescription">{{ __('messages.hero_subtitle') }}</x-slot>

    <!-- Hero Section -->
<<<<<<< HEAD
    <section class="relative bg-dark py-20 lg:py-32 overflow-hidden">
        <!-- Background Image with Overlay -->
        {{-- <div class="absolute inset-0 bg-cover bg-center opacity-30" style="background-image: url('{{ asset('images/hero-bg.jpg') }}');"></div> --}}
        <div class="absolute inset-0 overflow-hidden">
            <video
                class="w-full h-full object-cover opacity-30"
=======
    <section class="relative min-h-[85vh] md:min-h-[90vh] flex flex-col">
        <!-- Background Video -->
        <div class="absolute inset-0">
            <video
                class="w-full h-full object-cover"
>>>>>>> master
                autoplay
                loop
                muted
                playsinline
            >
                <source src="{{ asset('images/video-tanger.mp4') }}" type="video/mp4">
            </video>
<<<<<<< HEAD
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
=======
            <!-- Subtle overlay for text readability -->
            <div class="absolute inset-0 bg-gradient-to-b from-black/40 via-black/20 to-black/50"></div>
        </div>

        <!-- Hero Content - Centered -->
        <div class="relative flex-1 flex items-center justify-center pt-20 pb-32 md:pb-40">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <span class="inline-block bg-white/90 backdrop-blur-sm text-gold text-sm font-semibold px-5 py-2.5 rounded-full mb-6 shadow-soft">
                    Premium Real Estate & Relocation
                </span>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight drop-shadow-lg">
                    {{ __('messages.hero_title') }}
                </h1>
                <p class="text-xl text-white/90 max-w-3xl mx-auto drop-shadow-md">
                    {{ __('messages.hero_subtitle') }}
                </p>
            </div>
        </div>

        <!-- Search Form - Fixed at Bottom -->
        <div class="relative z-10 w-full px-4 sm:px-6 lg:px-8 -mb-20 md:-mb-24">
>>>>>>> master
            <div class="max-w-5xl mx-auto">
                <form action="{{ route('properties.index', ['locale' => app()->getLocale()]) }}" method="GET" id="searchForm">
                    <!-- Status Tabs -->
                    <div class="flex justify-center mb-0">
<<<<<<< HEAD
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
=======
                        <div class="inline-flex rounded-t-xl overflow-hidden bg-white/95 backdrop-blur-sm shadow-soft-lg">
                            <button type="button" data-status=""
                                class="status-tab px-6 md:px-8 py-3 md:py-3.5 text-sm font-semibold transition-all duration-200 bg-white text-gold border-b-2 border-gold">
                                {{ __('messages.all_status') }}
                            </button>
                            <button type="button" data-status="rent"
                                class="status-tab px-6 md:px-8 py-3 md:py-3.5 text-sm font-semibold transition-all duration-200 bg-gold text-white hover:bg-gold-dark">
                                {{ __('messages.for_rent') }}
                            </button>
                            <button type="button" data-status="sale"
                                class="status-tab px-6 md:px-8 py-3 md:py-3.5 text-sm font-semibold transition-all duration-200 bg-gold text-white hover:bg-gold-dark">
>>>>>>> master
                                {{ __('messages.for_sale') }}
                            </button>
                        </div>
                    </div>

                    <!-- Hidden input for transaction type -->
                    <input type="hidden" name="transaction" id="transactionInput" value="">

                    <!-- Filter Card -->
<<<<<<< HEAD
                    <div class="bg-dark-100 rounded-xl border border-dark-300 p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4 items-end">
                            <!-- Looking For -->
                            <div>
                                <label class="block text-xs font-semibold text-gold uppercase tracking-wider mb-2">{{ __('messages.looking_for') }}</label>
                                <div class="relative">
                                    <select name="type" class="w-full appearance-none bg-dark-200 border border-dark-300 rounded-lg px-4 py-3 pr-10 text-text-secondary focus:outline-none focus:border-gold focus:ring-1 focus:ring-gold">
=======
                    <div class="bg-white/95 backdrop-blur-sm rounded-2xl rounded-t-none shadow-soft-xl border border-white/50 p-4 md:p-6">
                        <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-5 gap-3 md:gap-4 items-end">
                            <!-- Looking For -->
                            <div class="col-span-2 md:col-span-1">
                                <label class="block text-xs font-semibold text-text-secondary uppercase tracking-wider mb-2">{{ __('messages.looking_for') }}</label>
                                <div class="relative">
                                    <select name="type" class="w-full appearance-none bg-page-section border border-border-light rounded-xl px-4 py-3 md:py-3.5 pr-10 text-text-primary focus:outline-none focus:border-gold focus:ring-2 focus:ring-gold/20 transition-all">
>>>>>>> master
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
<<<<<<< HEAD
                                <label class="block text-xs font-semibold text-gold uppercase tracking-wider mb-2">{{ __('messages.location') }}</label>
                                <div class="relative">
                                    <select name="city" class="w-full appearance-none bg-dark-200 border border-dark-300 rounded-lg px-4 py-3 pr-10 text-text-secondary focus:outline-none focus:border-gold focus:ring-1 focus:ring-gold">
=======
                                <label class="block text-xs font-semibold text-text-secondary uppercase tracking-wider mb-2">{{ __('messages.location') }}</label>
                                <div class="relative">
                                    <select name="city" class="w-full appearance-none bg-page-section border border-border-light rounded-xl px-4 py-3 md:py-3.5 pr-10 text-text-primary focus:outline-none focus:border-gold focus:ring-2 focus:ring-gold/20 transition-all">
>>>>>>> master
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
<<<<<<< HEAD
                                <label class="block text-xs font-semibold text-gold uppercase tracking-wider mb-2">{{ __('messages.property_size') }}</label>
                                <div class="relative">
                                    <select name="bedrooms" class="w-full appearance-none bg-dark-200 border border-dark-300 rounded-lg px-4 py-3 pr-10 text-text-secondary focus:outline-none focus:border-gold focus:ring-1 focus:ring-gold">
=======
                                <label class="block text-xs font-semibold text-text-secondary uppercase tracking-wider mb-2">{{ __('messages.property_size') }}</label>
                                <div class="relative">
                                    <select name="bedrooms" class="w-full appearance-none bg-page-section border border-border-light rounded-xl px-4 py-3 md:py-3.5 pr-10 text-text-primary focus:outline-none focus:border-gold focus:ring-2 focus:ring-gold/20 transition-all">
>>>>>>> master
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
<<<<<<< HEAD
                            <div>
                                <label class="block text-xs font-semibold text-gold uppercase tracking-wider mb-2">{{ __('messages.your_budget') }}</label>
                                <div class="relative">
                                    <select name="max_price" class="w-full appearance-none bg-dark-200 border border-dark-300 rounded-lg px-4 py-3 pr-10 text-text-secondary focus:outline-none focus:border-gold focus:ring-1 focus:ring-gold">
=======
                            <div class="hidden lg:block">
                                <label class="block text-xs font-semibold text-text-secondary uppercase tracking-wider mb-2">{{ __('messages.your_budget') }}</label>
                                <div class="relative">
                                    <select name="max_price" class="w-full appearance-none bg-page-section border border-border-light rounded-xl px-4 py-3 md:py-3.5 pr-10 text-text-primary focus:outline-none focus:border-gold focus:ring-2 focus:ring-gold/20 transition-all">
>>>>>>> master
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
<<<<<<< HEAD
                            <div>
                                <button type="submit" class="w-full bg-gold hover:bg-gold-light text-dark font-semibold py-3 px-8 rounded-lg transition duration-200 shadow-lg hover:shadow-xl">
=======
                            <div class="col-span-2 lg:col-span-1">
                                <button type="submit" class="w-full bg-gold hover:bg-gold-dark text-white font-semibold py-3 md:py-3.5 px-8 rounded-xl transition-all duration-200 shadow-soft hover:shadow-soft-md flex items-center justify-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                    </svg>
>>>>>>> master
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
<<<<<<< HEAD
                            t.classList.remove('bg-gold', 'text-dark', 'hover:bg-gold-light');
                            t.classList.add('bg-dark-100', 'text-gold', 'border-b-2', 'border-gold');
                        } else {
                            t.classList.remove('bg-dark-100', 'text-gold', 'border-b-2', 'border-gold');
                            t.classList.add('bg-gold', 'text-dark', 'hover:bg-gold-light');
=======
                            t.classList.remove('bg-gold', 'text-white', 'hover:bg-gold-dark');
                            t.classList.add('bg-white', 'text-gold', 'border-b-2', 'border-gold');
                        } else {
                            t.classList.remove('bg-white', 'text-gold', 'border-b-2', 'border-gold');
                            t.classList.add('bg-gold', 'text-white', 'hover:bg-gold-dark');
>>>>>>> master
                        }
                    });
                });
            });
        });
    </script>

    <!-- Statistics Section -->
<<<<<<< HEAD
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
=======
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center p-6 rounded-2xl bg-page-section border border-border-light">
                    <div class="w-14 h-14 mx-auto mb-4 rounded-xl bg-gold-50 flex items-center justify-center">
                        <svg class="w-7 h-7 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    <div class="text-3xl font-bold text-gold mb-1">{{ $stats['properties'] }}+</div>
                    <div class="text-text-muted text-sm">{{ __('messages.properties_count') }}</div>
                </div>
                <div class="text-center p-6 rounded-2xl bg-page-section border border-border-light">
                    <div class="w-14 h-14 mx-auto mb-4 rounded-xl bg-gold-50 flex items-center justify-center">
                        <svg class="w-7 h-7 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div class="text-3xl font-bold text-gold mb-1">{{ $stats['rentals'] }}+</div>
                    <div class="text-text-muted text-sm">{{ __('messages.for_rent') }}</div>
                </div>
                <div class="text-center p-6 rounded-2xl bg-page-section border border-border-light">
                    <div class="w-14 h-14 mx-auto mb-4 rounded-xl bg-gold-50 flex items-center justify-center">
                        <svg class="w-7 h-7 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="text-3xl font-bold text-gold mb-1">{{ $stats['sales'] }}+</div>
                    <div class="text-text-muted text-sm">{{ __('messages.for_sale') }}</div>
                </div>
                <div class="text-center p-6 rounded-2xl bg-page-section border border-border-light">
                    <div class="w-14 h-14 mx-auto mb-4 rounded-xl bg-gold-50 flex items-center justify-center">
                        <svg class="w-7 h-7 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                        </svg>
                    </div>
                    <div class="text-3xl font-bold text-gold mb-1">10+</div>
                    <div class="text-text-muted text-sm">{{ __('messages.years_experience') }}</div>
>>>>>>> master
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Properties -->
    @if($featuredProperties->count())
<<<<<<< HEAD
    <section class="py-16 bg-dark">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold text-white">{{ __('messages.featured_properties') }}</h2>
                <a href="{{ route('properties.index', ['locale' => app()->getLocale()]) }}" class="text-gold hover:text-gold-light font-semibold transition-colors">
                    {{ __('messages.view_all') }} &rarr;
=======
    <section class="py-20 bg-page">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10">
                <div>
                    <span class="text-gold font-semibold text-sm uppercase tracking-wider mb-2 block">{{ __('messages.our_selection') ?? 'Our Selection' }}</span>
                    <h2 class="text-3xl font-bold text-text-primary">{{ __('messages.featured_properties') }}</h2>
                </div>
                <a href="{{ route('properties.index', ['locale' => app()->getLocale()]) }}" class="mt-4 md:mt-0 inline-flex items-center text-gold hover:text-gold-dark font-semibold transition-colors group">
                    {{ __('messages.view_all') }}
                    <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
>>>>>>> master
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
<<<<<<< HEAD
    <section class="py-16 bg-dark-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold text-white">{{ __('messages.homes_for_rent') }}</h2>
                <a href="{{ route('properties.index', ['locale' => app()->getLocale(), 'transaction' => 'rent']) }}" class="text-gold hover:text-gold-light font-semibold transition-colors">
                    {{ __('messages.view_all') }} &rarr;
=======
    <section class="py-20 bg-page-section">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10">
                <div>
                    <span class="text-gold font-semibold text-sm uppercase tracking-wider mb-2 block">{{ __('messages.rental_properties') ?? 'Rental Properties' }}</span>
                    <h2 class="text-3xl font-bold text-text-primary">{{ __('messages.homes_for_rent') }}</h2>
                </div>
                <a href="{{ route('properties.index', ['locale' => app()->getLocale(), 'transaction' => 'rent']) }}" class="mt-4 md:mt-0 inline-flex items-center text-gold hover:text-gold-dark font-semibold transition-colors group">
                    {{ __('messages.view_all') }}
                    <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
>>>>>>> master
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
<<<<<<< HEAD
    <section class="py-16 bg-dark">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold text-white">{{ __('messages.properties_for_sale') }}</h2>
                <a href="{{ route('properties.index', ['locale' => app()->getLocale(), 'transaction' => 'sale']) }}" class="text-gold hover:text-gold-light font-semibold transition-colors">
                    {{ __('messages.view_all') }} &rarr;
=======
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10">
                <div>
                    <span class="text-gold font-semibold text-sm uppercase tracking-wider mb-2 block">{{ __('messages.buy_property') ?? 'Buy Property' }}</span>
                    <h2 class="text-3xl font-bold text-text-primary">{{ __('messages.properties_for_sale') }}</h2>
                </div>
                <a href="{{ route('properties.index', ['locale' => app()->getLocale(), 'transaction' => 'sale']) }}" class="mt-4 md:mt-0 inline-flex items-center text-gold hover:text-gold-dark font-semibold transition-colors group">
                    {{ __('messages.view_all') }}
                    <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
>>>>>>> master
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
<<<<<<< HEAD
    <section class="py-16 bg-dark-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold text-white">{{ __('messages.latest_listings') }}</h2>
                <a href="{{ route('properties.index', ['locale' => app()->getLocale()]) }}" class="text-gold hover:text-gold-light font-semibold transition-colors">
                    {{ __('messages.view_all') }} &rarr;
=======
    <section class="py-20 bg-page-section">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10">
                <div>
                    <span class="text-gold font-semibold text-sm uppercase tracking-wider mb-2 block">{{ __('messages.new_arrivals') ?? 'New Arrivals' }}</span>
                    <h2 class="text-3xl font-bold text-text-primary">{{ __('messages.latest_listings') }}</h2>
                </div>
                <a href="{{ route('properties.index', ['locale' => app()->getLocale()]) }}" class="mt-4 md:mt-0 inline-flex items-center text-gold hover:text-gold-dark font-semibold transition-colors group">
                    {{ __('messages.view_all') }}
                    <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
>>>>>>> master
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
<<<<<<< HEAD
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
=======
    <section class="py-20 bg-white relative overflow-hidden">
        <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-gold-light via-gold to-gold-dark"></div>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="w-16 h-16 mx-auto mb-6 rounded-2xl bg-gold-50 flex items-center justify-center">
                <svg class="w-8 h-8 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
            </div>
            <h2 class="text-3xl font-bold text-text-primary mb-4">{{ __('messages.newsletter_title') }}</h2>
            <p class="text-text-secondary mb-8 max-w-2xl mx-auto">{{ __('messages.newsletter_subtitle') }}</p>
            <form action="{{ route('newsletter.subscribe', ['locale' => app()->getLocale()]) }}" method="POST" class="flex flex-col sm:flex-row gap-4 max-w-xl mx-auto">
                @csrf
                <input type="email" name="email" placeholder="{{ __('messages.your_email') }}" required
                    class="flex-1 px-6 py-4 rounded-xl bg-page-section border border-border-light text-text-primary placeholder-text-muted focus:outline-none focus:border-gold focus:ring-2 focus:ring-gold/20 transition-all">
                <button type="submit" class="bg-gold hover:bg-gold-dark text-white font-semibold px-8 py-4 rounded-xl transition-all duration-200 shadow-soft hover:shadow-soft-md whitespace-nowrap">
>>>>>>> master
                    {{ __('messages.subscribe') }}
                </button>
            </form>
        </div>
    </section>

    <!-- Latest Blog Posts -->
    @if($latestPosts->count())
<<<<<<< HEAD
    <section class="py-16 bg-dark-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold text-white">{{ __('messages.latest_posts') }}</h2>
                <a href="{{ route('blog.index', ['locale' => app()->getLocale()]) }}" class="text-gold hover:text-gold-light font-semibold transition-colors">
                    {{ __('messages.view_all') }} &rarr;
=======
    <section class="py-20 bg-page-section">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10">
                <div>
                    <span class="text-gold font-semibold text-sm uppercase tracking-wider mb-2 block">{{ __('messages.from_our_blog') ?? 'From Our Blog' }}</span>
                    <h2 class="text-3xl font-bold text-text-primary">{{ __('messages.latest_posts') }}</h2>
                </div>
                <a href="{{ route('blog.index', ['locale' => app()->getLocale()]) }}" class="mt-4 md:mt-0 inline-flex items-center text-gold hover:text-gold-dark font-semibold transition-colors group">
                    {{ __('messages.view_all') }}
                    <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
>>>>>>> master
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
