<x-public-layout>
    <x-slot name="metaTitle">{{ __('messages.about') }} - {{ __('messages.site_name') }}</x-slot>
    <x-slot name="metaDescription">{{ __('messages.about_title') }}</x-slot>

    <!-- Hero Section -->
    <section class="relative bg-page-section py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="inline-block bg-gold-50 text-gold text-sm font-semibold px-4 py-2 rounded-full mb-6">
                {{ __('messages.about') }}
            </span>
            <h1 class="text-4xl md:text-5xl font-bold text-text-primary mb-4">{{ __('messages.about_title') }}</h1>
            <p class="text-xl text-text-secondary max-w-3xl mx-auto">{{ __('messages.hero_subtitle') }}</p>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="text-center p-8 rounded-2xl bg-page-section border border-border-light">
                    <div class="w-14 h-14 mx-auto mb-4 rounded-xl bg-gold-50 flex items-center justify-center">
                        <svg class="w-7 h-7 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    <div class="text-4xl font-bold text-gold mb-1">{{ $stats['properties'] }}+</div>
                    <div class="text-text-muted">{{ __('messages.properties_count') }}</div>
                </div>
                <div class="text-center p-8 rounded-2xl bg-page-section border border-border-light">
                    <div class="w-14 h-14 mx-auto mb-4 rounded-xl bg-gold-50 flex items-center justify-center">
                        <svg class="w-7 h-7 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="text-4xl font-bold text-gold mb-1">{{ $stats['clients'] }}+</div>
                    <div class="text-text-muted">{{ __('messages.happy_clients') }}</div>
                </div>
                <div class="text-center p-8 rounded-2xl bg-page-section border border-border-light">
                    <div class="w-14 h-14 mx-auto mb-4 rounded-xl bg-gold-50 flex items-center justify-center">
                        <svg class="w-7 h-7 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                        </svg>
                    </div>
                    <div class="text-4xl font-bold text-gold mb-1">{{ $stats['years'] }}+</div>
                    <div class="text-text-muted">{{ __('messages.years_experience') }}</div>
                </div>
                <div class="text-center p-8 rounded-2xl bg-page-section border border-border-light">
                    <div class="w-14 h-14 mx-auto mb-4 rounded-xl bg-gold-50 flex items-center justify-center">
                        <svg class="w-7 h-7 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <div class="text-4xl font-bold text-gold mb-1">{{ $stats['cities'] }}+</div>
                    <div class="text-text-muted">{{ __('messages.cities_covered') }}</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Story -->
    <section class="py-20 bg-page-section">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:flex lg:items-center lg:gap-16">
                <div class="lg:w-1/2 mb-10 lg:mb-0">
                    <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                        alt="Real Estate Office" class="rounded-2xl w-full shadow-soft-lg" loading="lazy">
                </div>
                <div class="lg:w-1/2">
                    <span class="text-gold font-semibold text-sm uppercase tracking-wider mb-3 block">Who We Are</span>
                    <h2 class="text-3xl font-bold text-text-primary mb-6">{{ __('messages.our_story') }}</h2>
                    <div class="prose prose-lg max-w-none text-text-secondary">
                        <p>Founded in Northern Morocco, Erdmann Global Real Estate has been helping families find their dream homes for over a decade. We specialize in premium properties across Tangier, Tetouan, and the surrounding regions.</p>
                        <p>Our team of experienced professionals is dedicated to providing exceptional service, whether you're looking to buy, sell, or rent property in Morocco's beautiful northern region.</p>
                        <p>We understand that finding the perfect property is more than just a transaction - it's about finding a place to call home. That's why we take the time to understand your needs and guide you through every step of the process.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Mission -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:flex lg:items-center lg:gap-16 flex-row-reverse">
                <div class="lg:w-1/2 mb-10 lg:mb-0">
                    <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                        alt="Modern Home" class="rounded-2xl w-full shadow-soft-lg" loading="lazy">
                </div>
                <div class="lg:w-1/2">
                    <span class="text-gold font-semibold text-sm uppercase tracking-wider mb-3 block">What Drives Us</span>
                    <h2 class="text-3xl font-bold text-text-primary mb-6">{{ __('messages.our_mission') }}</h2>
                    <div class="prose prose-lg max-w-none text-text-secondary">
                        <p>Our mission is to make real estate accessible and straightforward for everyone in Northern Morocco. We believe in transparency, integrity, and putting our clients first.</p>
                        <p class="mb-4">We aim to:</p>
                    </div>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <div class="w-6 h-6 rounded-lg bg-gold-50 flex items-center justify-center mr-3 mt-0.5 flex-shrink-0">
                                <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>
                            <span class="text-text-secondary">Provide comprehensive property listings across all categories</span>
                        </li>
                        <li class="flex items-start">
                            <div class="w-6 h-6 rounded-lg bg-gold-50 flex items-center justify-center mr-3 mt-0.5 flex-shrink-0">
                                <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>
                            <span class="text-text-secondary">Offer expert guidance throughout the buying or renting process</span>
                        </li>
                        <li class="flex items-start">
                            <div class="w-6 h-6 rounded-lg bg-gold-50 flex items-center justify-center mr-3 mt-0.5 flex-shrink-0">
                                <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>
                            <span class="text-text-secondary">Maintain the highest standards of professionalism and ethics</span>
                        </li>
                        <li class="flex items-start">
                            <div class="w-6 h-6 rounded-lg bg-gold-50 flex items-center justify-center mr-3 mt-0.5 flex-shrink-0">
                                <svg class="w-4 h-4 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>
                            <span class="text-text-secondary">Build lasting relationships with our clients and community</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-20 bg-page-section relative overflow-hidden">
        <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-gold-light via-gold to-gold-dark"></div>
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="w-16 h-16 mx-auto mb-6 rounded-2xl bg-gold-50 flex items-center justify-center">
                <svg class="w-8 h-8 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
            </div>
            <h2 class="text-3xl font-bold text-text-primary mb-4">Ready to Find Your Dream Home?</h2>
            <p class="text-text-secondary mb-8 text-lg">Browse our extensive collection of properties or get in touch with our team.</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('properties.index', ['locale' => app()->getLocale()]) }}"
                    class="bg-gold hover:bg-gold-dark text-white font-semibold px-8 py-4 rounded-xl transition-all duration-200 shadow-soft hover:shadow-soft-md">
                    {{ __('messages.view_all') }} {{ __('messages.listings') }}
                </a>
                <a href="{{ route('contact', ['locale' => app()->getLocale()]) }}"
                    class="bg-white border-2 border-gold text-gold hover:bg-gold-50 font-semibold px-8 py-4 rounded-xl transition-all duration-200">
                    {{ __('messages.contact') }}
                </a>
            </div>
        </div>
    </section>
</x-public-layout>
