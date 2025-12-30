<footer class="bg-dark text-white">
    <!-- Gold Divider -->
    <div class="h-1 bg-gold-gradient"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Brand -->
            <div>
                <a href="{{ route('home', ['locale' => app()->getLocale()]) }}" class="block mb-6">
                    <img src="{{ asset('images/logo.png') }}" alt="{{ __('messages.site_name') }}" class="h-16 w-auto">
                </a>
                <p class="text-text-muted text-sm mb-6 leading-relaxed">
                    {{ __('messages.hero_subtitle') }}
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="w-10 h-10 rounded-full bg-dark-100 border border-dark-300 flex items-center justify-center text-text-muted hover:text-gold hover:border-gold transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-dark-100 border border-dark-300 flex items-center justify-center text-text-muted hover:text-gold hover:border-gold transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"/></svg>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-dark-100 border border-dark-300 flex items-center justify-center text-text-muted hover:text-gold hover:border-gold transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-gold font-semibold mb-6 text-lg">{{ __('messages.quick_links') }}</h3>
                <ul class="space-y-3">
                    <li><a href="{{ route('home', ['locale' => app()->getLocale()]) }}" class="text-text-muted hover:text-gold transition-colors">{{ __('messages.home') }}</a></li>
                    <li><a href="{{ route('properties.index', ['locale' => app()->getLocale()]) }}" class="text-text-muted hover:text-gold transition-colors">{{ __('messages.listings') }}</a></li>
                    <li><a href="{{ route('about', ['locale' => app()->getLocale()]) }}" class="text-text-muted hover:text-gold transition-colors">{{ __('messages.about') }}</a></li>
                    <li><a href="{{ route('blog.index', ['locale' => app()->getLocale()]) }}" class="text-text-muted hover:text-gold transition-colors">{{ __('messages.blog') }}</a></li>
                    <li><a href="{{ route('contact', ['locale' => app()->getLocale()]) }}" class="text-text-muted hover:text-gold transition-colors">{{ __('messages.contact') }}</a></li>
                </ul>
            </div>

            <!-- Property Types -->
            <div>
                <h3 class="text-gold font-semibold mb-6 text-lg">{{ __('messages.property_type') }}</h3>
                <ul class="space-y-3">
                    <li><a href="{{ route('properties.index', ['locale' => app()->getLocale(), 'type' => 'apartment']) }}" class="text-text-muted hover:text-gold transition-colors">{{ __('messages.apartment') }}</a></li>
                    <li><a href="{{ route('properties.index', ['locale' => app()->getLocale(), 'type' => 'villa']) }}" class="text-text-muted hover:text-gold transition-colors">{{ __('messages.villa') }}</a></li>
                    <li><a href="{{ route('properties.index', ['locale' => app()->getLocale(), 'type' => 'house']) }}" class="text-text-muted hover:text-gold transition-colors">{{ __('messages.house') }}</a></li>
                    <li><a href="{{ route('properties.index', ['locale' => app()->getLocale(), 'type' => 'land']) }}" class="text-text-muted hover:text-gold transition-colors">{{ __('messages.land') }}</a></li>
                    <li><a href="{{ route('properties.index', ['locale' => app()->getLocale(), 'type' => 'office']) }}" class="text-text-muted hover:text-gold transition-colors">{{ __('messages.office') }}</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h3 class="text-gold font-semibold mb-6 text-lg">{{ __('messages.contact_info') }}</h3>
                <ul class="space-y-4">
                    <li class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-gold mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span class="text-text-muted">Tangier, Morocco</span>
                    </li>
                    <li class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-gold mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <span class="text-text-muted">+212 600-000000</span>
                    </li>
                    <li class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-gold mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <span class="text-text-muted">info@erdmannglobal.com</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="mt-12 pt-8 border-t border-dark-300 flex flex-col md:flex-row justify-between items-center">
            <p class="text-text-muted text-sm">
                &copy; {{ date('Y') }} {{ __('messages.site_name') }}. {{ __('messages.all_rights_reserved') }}
            </p>
            <div class="flex space-x-6 mt-4 md:mt-0">
                <a href="#" class="text-text-muted hover:text-gold text-sm transition-colors">{{ __('messages.privacy_policy') }}</a>
                <a href="#" class="text-text-muted hover:text-gold text-sm transition-colors">{{ __('messages.terms_of_service') }}</a>
            </div>
        </div>
    </div>
</footer>
