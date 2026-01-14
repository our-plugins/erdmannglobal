<x-public-layout>
    <x-slot name="metaTitle">{{ __('messages.about') }} - {{ __('messages.site_name') }}</x-slot>
    <x-slot name="metaDescription">{{ __('messages.about_title') }}</x-slot>

    <!-- Hero Section -->
    <section class="relative bg-dark py-20">
        <div class="absolute inset-0 bg-gradient-to-b from-dark-100 to-dark"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">{{ __('messages.about_title') }}</h1>
            <p class="text-xl text-text-secondary max-w-3xl mx-auto">{{ __('messages.hero_subtitle') }}</p>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-16 bg-dark-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div class="p-6">
                    <div class="text-4xl font-bold text-gold">{{ $stats['properties'] }}+</div>
                    <div class="text-text-muted mt-2">{{ __('messages.properties_count') }}</div>
                </div>
                <div class="p-6">
                    <div class="text-4xl font-bold text-gold">{{ $stats['clients'] }}+</div>
                    <div class="text-text-muted mt-2">{{ __('messages.happy_clients') }}</div>
                </div>
                <div class="p-6">
                    <div class="text-4xl font-bold text-gold">{{ $stats['years'] }}+</div>
                    <div class="text-text-muted mt-2">{{ __('messages.years_experience') }}</div>
                </div>
                <div class="p-6">
                    <div class="text-4xl font-bold text-gold">{{ $stats['cities'] }}+</div>
                    <div class="text-text-muted mt-2">{{ __('messages.cities_covered') }}</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Story -->
    <section class="py-16 bg-dark">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:flex lg:items-center lg:gap-12">
                <div class="lg:w-1/2 mb-8 lg:mb-0">
                    <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                        alt="Real Estate Office" class="rounded-xl w-full border border-dark-300" loading="lazy">
                </div>
                <div class="lg:w-1/2">
                    <h2 class="text-3xl font-bold text-white mb-6">{{ __('messages.our_story') }}</h2>
                    <div class="prose prose-lg prose-invert text-text-secondary">
                        <p>Founded in Northern Morocco, Erdmann Global Real Estate has been helping families find their dream homes for over a decade. We specialize in premium properties across Tangier, Tetouan, and the surrounding regions.</p>
                        <p>Our team of experienced professionals is dedicated to providing exceptional service, whether you're looking to buy, sell, or rent property in Morocco's beautiful northern region.</p>
                        <p>We understand that finding the perfect property is more than just a transaction - it's about finding a place to call home. That's why we take the time to understand your needs and guide you through every step of the process.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Mission -->
    <section class="py-16 bg-dark-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:flex lg:items-center lg:gap-12 flex-row-reverse">
                <div class="lg:w-1/2 mb-8 lg:mb-0">
                    <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                        alt="Modern Home" class="rounded-xl w-full border border-dark-300" loading="lazy">
                </div>
                <div class="lg:w-1/2">
                    <h2 class="text-3xl font-bold text-white mb-6">{{ __('messages.our_mission') }}</h2>
                    <div class="prose prose-lg prose-invert text-text-secondary prose-li:text-text-secondary">
                        <p>Our mission is to make real estate accessible and straightforward for everyone in Northern Morocco. We believe in transparency, integrity, and putting our clients first.</p>
                        <p>We aim to:</p>
                        <ul class="text-text-secondary">
                            <li>Provide comprehensive property listings across all categories</li>
                            <li>Offer expert guidance throughout the buying or renting process</li>
                            <li>Maintain the highest standards of professionalism and ethics</li>
                            <li>Build lasting relationships with our clients and community</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-16 bg-dark relative overflow-hidden">
        <div class="absolute top-0 left-0 right-0 h-1 bg-gold-gradient"></div>
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-white mb-4">Ready to Find Your Dream Home?</h2>
            <p class="text-text-secondary mb-8">Browse our extensive collection of properties or get in touch with our team.</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('properties.index', ['locale' => app()->getLocale()]) }}"
                    class="bg-gold hover:bg-gold-light text-dark font-semibold px-8 py-3 rounded-lg transition duration-200">
                    {{ __('messages.view_all') }} {{ __('messages.listings') }}
                </a>
                <a href="{{ route('contact', ['locale' => app()->getLocale()]) }}"
                    class="bg-transparent border-2 border-gold text-gold hover:bg-gold hover:text-dark font-semibold px-8 py-3 rounded-lg transition duration-200">
                    {{ __('messages.contact') }}
                </a>
            </div>
        </div>
    </section>
</x-public-layout>
