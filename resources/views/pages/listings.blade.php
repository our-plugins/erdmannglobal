<x-public-layout>
    <x-slot name="metaTitle">{{ __('messages.listings') }} - {{ __('messages.site_name') }}</x-slot>
    <x-slot name="metaDescription">{{ __('messages.hero_subtitle') }}</x-slot>

<<<<<<< HEAD
    <div class="bg-dark min-h-screen">
        <!-- Page Header -->
        <div class="bg-dark-100 border-b border-dark-300">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <h1 class="text-3xl font-bold text-white">{{ __('messages.listings') }}</h1>
                <p class="text-text-muted mt-2">{{ $properties->total() }} {{ __('messages.results_found') }}</p>
=======
    <div class="bg-page min-h-screen">
        <!-- Page Header -->
        <div class="bg-white border-b border-border-light">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-text-primary">{{ __('messages.listings') }}</h1>
                        <p class="text-text-muted mt-2">{{ $properties->total() }} {{ __('messages.results_found') }}</p>
                    </div>
                    <div class="mt-4 md:mt-0">
                        <nav class="flex items-center space-x-2 text-sm">
                            <a href="{{ route('home', ['locale' => app()->getLocale()]) }}" class="text-text-muted hover:text-gold transition-colors">{{ __('messages.home') }}</a>
                            <svg class="w-4 h-4 text-text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                            <span class="text-text-primary font-medium">{{ __('messages.listings') }}</span>
                        </nav>
                    </div>
                </div>
>>>>>>> master
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="lg:flex lg:gap-8">
                <!-- Filters Sidebar -->
<<<<<<< HEAD
                <aside class="lg:w-72 flex-shrink-0 mb-8 lg:mb-0">
                    <div class="bg-dark-100 border border-dark-300 rounded-xl p-6 sticky top-24">
                        <h2 class="text-lg font-semibold text-gold mb-6">{{ __('messages.filters') }}</h2>

                        <form action="{{ route('properties.index', ['locale' => app()->getLocale()]) }}" method="GET">
                            <div class="space-y-6">
                                <!-- Transaction Type -->
                                <div>
                                    <label class="block text-sm font-medium text-text-secondary mb-2">{{ __('messages.transaction_type') }}</label>
                                    <select name="transaction" class="w-full rounded-lg bg-dark-200 border-dark-300 text-text-secondary focus:border-gold focus:ring-gold">
=======
                <aside class="lg:w-80 flex-shrink-0 mb-8 lg:mb-0">
                    <div class="bg-white border border-border-light rounded-2xl p-6 sticky top-24 shadow-soft">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-lg font-semibold text-text-primary">{{ __('messages.filters') }}</h2>
                            <div class="w-8 h-8 rounded-lg bg-gold-50 flex items-center justify-center">
                                <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                                </svg>
                            </div>
                        </div>

                        <form action="{{ route('properties.index', ['locale' => app()->getLocale()]) }}" method="GET">
                            <div class="space-y-5">
                                <!-- Transaction Type -->
                                <div>
                                    <label class="block text-sm font-medium text-text-secondary mb-2">{{ __('messages.transaction_type') }}</label>
                                    <select name="transaction" class="w-full rounded-xl bg-page-section border-border-light text-text-primary focus:border-gold focus:ring-2 focus:ring-gold/20 transition-all">
>>>>>>> master
                                        <option value="">{{ __('messages.all_types') }}</option>
                                        <option value="rent" {{ request('transaction') == 'rent' ? 'selected' : '' }}>{{ __('messages.for_rent') }}</option>
                                        <option value="sale" {{ request('transaction') == 'sale' ? 'selected' : '' }}>{{ __('messages.for_sale') }}</option>
                                        <option value="commercial" {{ request('transaction') == 'commercial' ? 'selected' : '' }}>{{ __('messages.commercial') }}</option>
                                    </select>
                                </div>

                                <!-- Property Type -->
                                <div>
                                    <label class="block text-sm font-medium text-text-secondary mb-2">{{ __('messages.property_type') }}</label>
<<<<<<< HEAD
                                    <select name="type" class="w-full rounded-lg bg-dark-200 border-dark-300 text-text-secondary focus:border-gold focus:ring-gold">
=======
                                    <select name="type" class="w-full rounded-xl bg-page-section border-border-light text-text-primary focus:border-gold focus:ring-2 focus:ring-gold/20 transition-all">
>>>>>>> master
                                        <option value="">{{ __('messages.select_type') }}</option>
                                        @foreach(['apartment', 'house', 'villa', 'land', 'office', 'studio', 'farm', 'garage', 'shop'] as $type)
                                            <option value="{{ $type }}" {{ request('type') == $type ? 'selected' : '' }}>
                                                {{ __('messages.' . $type) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- City -->
                                <div>
                                    <label class="block text-sm font-medium text-text-secondary mb-2">{{ __('messages.location') }}</label>
<<<<<<< HEAD
                                    <select name="city" class="w-full rounded-lg bg-dark-200 border-dark-300 text-text-secondary focus:border-gold focus:ring-gold">
=======
                                    <select name="city" class="w-full rounded-xl bg-page-section border-border-light text-text-primary focus:border-gold focus:ring-2 focus:ring-gold/20 transition-all">
>>>>>>> master
                                        <option value="">{{ __('messages.select_location') }}</option>
                                        @foreach($cities as $city)
                                            <option value="{{ $city }}" {{ request('city') == $city ? 'selected' : '' }}>{{ $city }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Bedrooms -->
                                <div>
                                    <label class="block text-sm font-medium text-text-secondary mb-2">{{ __('messages.bedrooms') }}</label>
<<<<<<< HEAD
                                    <select name="bedrooms" class="w-full rounded-lg bg-dark-200 border-dark-300 text-text-secondary focus:border-gold focus:ring-gold">
=======
                                    <select name="bedrooms" class="w-full rounded-xl bg-page-section border-border-light text-text-primary focus:border-gold focus:ring-2 focus:ring-gold/20 transition-all">
>>>>>>> master
                                        <option value="">{{ __('messages.any_bedrooms') }}</option>
                                        @foreach([1, 2, 3, 4, 5] as $num)
                                            <option value="{{ $num }}" {{ request('bedrooms') == $num ? 'selected' : '' }}>{{ $num }}+</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Price Range -->
                                <div>
                                    <label class="block text-sm font-medium text-text-secondary mb-2">{{ __('messages.price_range') }}</label>
<<<<<<< HEAD
                                    <div class="grid grid-cols-2 gap-2">
                                        <input type="number" name="min_price" value="{{ request('min_price') }}"
                                            placeholder="{{ __('messages.min_price') }}"
                                            class="w-full rounded-lg bg-dark-200 border-dark-300 text-text-secondary placeholder-text-muted focus:border-gold focus:ring-gold text-sm">
                                        <input type="number" name="max_price" value="{{ request('max_price') }}"
                                            placeholder="{{ __('messages.max_price') }}"
                                            class="w-full rounded-lg bg-dark-200 border-dark-300 text-text-secondary placeholder-text-muted focus:border-gold focus:ring-gold text-sm">
=======
                                    <div class="grid grid-cols-2 gap-3">
                                        <input type="number" name="min_price" value="{{ request('min_price') }}"
                                            placeholder="{{ __('messages.min_price') }}"
                                            class="w-full rounded-xl bg-page-section border-border-light text-text-primary placeholder-text-muted focus:border-gold focus:ring-2 focus:ring-gold/20 text-sm transition-all">
                                        <input type="number" name="max_price" value="{{ request('max_price') }}"
                                            placeholder="{{ __('messages.max_price') }}"
                                            class="w-full rounded-xl bg-page-section border-border-light text-text-primary placeholder-text-muted focus:border-gold focus:ring-2 focus:ring-gold/20 text-sm transition-all">
>>>>>>> master
                                    </div>
                                </div>

                                <!-- Area Range -->
                                <div>
                                    <label class="block text-sm font-medium text-text-secondary mb-2">{{ __('messages.area_range') }} ({{ __('messages.sqm') }})</label>
<<<<<<< HEAD
                                    <div class="grid grid-cols-2 gap-2">
                                        <input type="number" name="min_area" value="{{ request('min_area') }}"
                                            placeholder="{{ __('messages.min_area') }}"
                                            class="w-full rounded-lg bg-dark-200 border-dark-300 text-text-secondary placeholder-text-muted focus:border-gold focus:ring-gold text-sm">
                                        <input type="number" name="max_area" value="{{ request('max_area') }}"
                                            placeholder="{{ __('messages.max_area') }}"
                                            class="w-full rounded-lg bg-dark-200 border-dark-300 text-text-secondary placeholder-text-muted focus:border-gold focus:ring-gold text-sm">
=======
                                    <div class="grid grid-cols-2 gap-3">
                                        <input type="number" name="min_area" value="{{ request('min_area') }}"
                                            placeholder="{{ __('messages.min_area') }}"
                                            class="w-full rounded-xl bg-page-section border-border-light text-text-primary placeholder-text-muted focus:border-gold focus:ring-2 focus:ring-gold/20 text-sm transition-all">
                                        <input type="number" name="max_area" value="{{ request('max_area') }}"
                                            placeholder="{{ __('messages.max_area') }}"
                                            class="w-full rounded-xl bg-page-section border-border-light text-text-primary placeholder-text-muted focus:border-gold focus:ring-2 focus:ring-gold/20 text-sm transition-all">
>>>>>>> master
                                    </div>
                                </div>

                                <!-- Buttons -->
<<<<<<< HEAD
                                <div class="flex gap-2 pt-4">
                                    <button type="submit" class="flex-1 bg-gold hover:bg-gold-light text-dark font-semibold py-2.5 px-4 rounded-lg transition duration-200">
                                        {{ __('messages.apply_filters') }}
                                    </button>
                                    <a href="{{ route('properties.index', ['locale' => app()->getLocale()]) }}"
                                        class="flex-1 bg-dark-200 hover:bg-dark-300 text-text-secondary border border-dark-300 font-semibold py-2.5 px-4 rounded-lg text-center transition duration-200">
=======
                                <div class="flex gap-3 pt-4 border-t border-border-light">
                                    <button type="submit" class="flex-1 bg-gold hover:bg-gold-dark text-white font-semibold py-3 px-4 rounded-xl transition-all duration-200 shadow-soft hover:shadow-soft-md">
                                        {{ __('messages.apply_filters') }}
                                    </button>
                                    <a href="{{ route('properties.index', ['locale' => app()->getLocale()]) }}"
                                        class="flex-1 bg-white hover:bg-page-section text-text-secondary border border-border-light font-semibold py-3 px-4 rounded-xl text-center transition-all duration-200">
>>>>>>> master
                                        {{ __('messages.clear_filters') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </aside>

                <!-- Properties Grid -->
                <div class="flex-1">
                    <!-- Sort Dropdown -->
<<<<<<< HEAD
                    <div class="flex justify-between items-center mb-6">
                        <div class="text-text-muted">
                            {{ __('messages.showing') }} {{ $properties->firstItem() ?? 0 }} {{ __('messages.to') }} {{ $properties->lastItem() ?? 0 }}
                            {{ __('messages.of') }} {{ $properties->total() }} {{ __('messages.results') }}
=======
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
                        <div class="text-text-muted text-sm">
                            {{ __('messages.showing') }} <span class="font-semibold text-text-primary">{{ $properties->firstItem() ?? 0 }}</span> {{ __('messages.to') }} <span class="font-semibold text-text-primary">{{ $properties->lastItem() ?? 0 }}</span>
                            {{ __('messages.of') }} <span class="font-semibold text-text-primary">{{ $properties->total() }}</span> {{ __('messages.results') }}
>>>>>>> master
                        </div>
                        <form action="{{ route('properties.index', ['locale' => app()->getLocale()]) }}" method="GET" class="flex items-center gap-2">
                            @foreach(request()->except('sort', 'page') as $key => $value)
                                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                            @endforeach
<<<<<<< HEAD
                            <select name="sort" onchange="this.form.submit()" class="rounded-lg bg-dark-100 border-dark-300 text-text-secondary focus:border-gold focus:ring-gold text-sm">
=======
                            <label class="text-sm text-text-muted whitespace-nowrap">Sort by:</label>
                            <select name="sort" onchange="this.form.submit()" class="rounded-xl bg-white border-border-light text-text-primary focus:border-gold focus:ring-2 focus:ring-gold/20 text-sm transition-all">
>>>>>>> master
                                <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Latest</option>
                                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                                <option value="area_desc" {{ request('sort') == 'area_desc' ? 'selected' : '' }}>Area: Largest First</option>
                            </select>
                        </form>
                    </div>

                    @if($properties->count())
                        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                            @foreach($properties as $property)
                                @include('components.property-card', ['property' => $property])
                            @endforeach
                        </div>

                        <!-- Pagination -->
<<<<<<< HEAD
                        <div class="mt-8">
                            {{ $properties->links() }}
                        </div>
                    @else
                        <div class="text-center py-16">
                            <svg class="w-16 h-16 mx-auto text-gold mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                            <h3 class="text-xl font-semibold text-white">No properties found</h3>
                            <p class="text-text-muted mt-2">Try adjusting your filters</p>
=======
                        <div class="mt-10">
                            {{ $properties->links() }}
                        </div>
                    @else
                        <div class="text-center py-20 bg-white rounded-2xl border border-border-light">
                            <div class="w-20 h-20 mx-auto mb-6 rounded-2xl bg-gold-50 flex items-center justify-center">
                                <svg class="w-10 h-10 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-text-primary mb-2">No properties found</h3>
                            <p class="text-text-muted mb-6">Try adjusting your filters to find more properties</p>
                            <a href="{{ route('properties.index', ['locale' => app()->getLocale()]) }}" class="inline-flex items-center bg-gold hover:bg-gold-dark text-white font-semibold py-3 px-6 rounded-xl transition-all duration-200">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                </svg>
                                Reset Filters
                            </a>
>>>>>>> master
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-public-layout>
