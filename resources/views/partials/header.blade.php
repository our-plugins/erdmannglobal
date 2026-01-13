<header class="bg-white sticky top-0 z-50 shadow-soft border-b border-border-light">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Logo -->
            <a href="{{ route('home', ['locale' => app()->getLocale()]) }}" class="flex items-center">
                <img src="{{ asset('images/logo.png') }}" alt="{{ __('messages.site_name') }}" class="h-14 w-auto">
            </a>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex items-center space-x-8">
                <a href="{{ route('home', ['locale' => app()->getLocale()]) }}"
                   class="font-medium transition-colors duration-200 {{ request()->routeIs('home') ? 'text-gold' : 'text-text-secondary hover:text-gold' }}">
                    {{ __('messages.home') }}
                </a>
                <a href="{{ route('properties.index', ['locale' => app()->getLocale()]) }}"
                   class="font-medium transition-colors duration-200 {{ request()->routeIs('properties.*') ? 'text-gold' : 'text-text-secondary hover:text-gold' }}">
                    {{ __('messages.listings') }}
                </a>
                <a href="{{ route('about', ['locale' => app()->getLocale()]) }}"
                   class="font-medium transition-colors duration-200 {{ request()->routeIs('about') ? 'text-gold' : 'text-text-secondary hover:text-gold' }}">
                    {{ __('messages.about') }}
                </a>
                <a href="{{ route('blog.index', ['locale' => app()->getLocale()]) }}"
                   class="font-medium transition-colors duration-200 {{ request()->routeIs('blog.*') ? 'text-gold' : 'text-text-secondary hover:text-gold' }}">
                    {{ __('messages.blog') }}
                </a>
                <a href="{{ route('contact', ['locale' => app()->getLocale()]) }}"
                   class="font-medium transition-colors duration-200 {{ request()->routeIs('contact') ? 'text-gold' : 'text-text-secondary hover:text-gold' }}">
                    {{ __('messages.contact') }}
                </a>
            </nav>

            <!-- Right Side -->
            <div class="flex items-center space-x-4">
                <!-- Language Switcher -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open"
                            class="flex items-center space-x-2 text-text-secondary hover:text-gold transition-colors duration-200 px-3 py-2 rounded-lg hover:bg-page-section">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24">
                            <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0-18 0m.6-3h16.8M3.6 15h16.8"/>
                                <path d="M11.5 3a17 17 0 0 0 0 18m1-18a17 17 0 0 1 0 18"/>
                            </g>
                        </svg>
                        <span class="uppercase font-medium text-sm">{{ app()->getLocale() }}</span>
                        <svg class="w-3 h-3 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="open"
                         @click.away="open = false"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-1"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 translate-y-1"
                         class="absolute right-0 mt-2 w-36 bg-white rounded-xl shadow-soft-lg border border-border-light py-2 z-50">
                        @php
                            $currentRouteName = Route::currentRouteName();
                            $currentParams = Route::current() ? Route::current()->parameters() : [];
                            $queryString = request()->getQueryString();
                        @endphp
                        @foreach(['en' => 'English', 'fr' => 'Francais'] as $localeCode => $language)
                            @php
                                $newParams = array_merge($currentParams, ['locale' => $localeCode]);
                                $url = $currentRouteName ? route($currentRouteName, $newParams) : url($localeCode);
                                if ($queryString) {
                                    $url .= '?' . $queryString;
                                }
                            @endphp
                            <a href="{{ $url }}"
                               class="flex items-center px-4 py-2.5 text-sm transition-colors duration-200 {{ app()->getLocale() === $localeCode ? 'bg-gold-50 text-gold font-semibold' : 'text-text-secondary hover:bg-page-section hover:text-text-primary' }}">
                                <span class="uppercase w-7 text-xs font-bold {{ app()->getLocale() === $localeCode ? 'text-gold' : 'text-text-muted' }}">{{ $localeCode }}</span>
                                <span class="ml-2">{{ $language }}</span>
                                @if(app()->getLocale() === $localeCode)
                                    <svg class="w-4 h-4 ml-auto text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                @endif
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Mobile Menu Button -->
                <button @click="mobileMenuOpen = !mobileMenuOpen"
                        class="md:hidden p-2 text-text-secondary hover:text-gold hover:bg-page-section rounded-lg transition-colors duration-200">
                    <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg x-show="mobileMenuOpen" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="mobileMenuOpen"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         x-cloak
         class="md:hidden bg-white border-t border-border-light shadow-soft-lg">
        <nav class="px-4 py-4 space-y-1">
            <a href="{{ route('home', ['locale' => app()->getLocale()]) }}"
               class="block px-4 py-3 rounded-xl font-medium transition-colors duration-200 {{ request()->routeIs('home') ? 'bg-gold-50 text-gold' : 'text-text-secondary hover:bg-page-section hover:text-text-primary' }}">
                {{ __('messages.home') }}
            </a>
            <a href="{{ route('properties.index', ['locale' => app()->getLocale()]) }}"
               class="block px-4 py-3 rounded-xl font-medium transition-colors duration-200 {{ request()->routeIs('properties.*') ? 'bg-gold-50 text-gold' : 'text-text-secondary hover:bg-page-section hover:text-text-primary' }}">
                {{ __('messages.listings') }}
            </a>
            <a href="{{ route('about', ['locale' => app()->getLocale()]) }}"
               class="block px-4 py-3 rounded-xl font-medium transition-colors duration-200 {{ request()->routeIs('about') ? 'bg-gold-50 text-gold' : 'text-text-secondary hover:bg-page-section hover:text-text-primary' }}">
                {{ __('messages.about') }}
            </a>
            <a href="{{ route('blog.index', ['locale' => app()->getLocale()]) }}"
               class="block px-4 py-3 rounded-xl font-medium transition-colors duration-200 {{ request()->routeIs('blog.*') ? 'bg-gold-50 text-gold' : 'text-text-secondary hover:bg-page-section hover:text-text-primary' }}">
                {{ __('messages.blog') }}
            </a>
            <a href="{{ route('contact', ['locale' => app()->getLocale()]) }}"
               class="block px-4 py-3 rounded-xl font-medium transition-colors duration-200 {{ request()->routeIs('contact') ? 'bg-gold-50 text-gold' : 'text-text-secondary hover:bg-page-section hover:text-text-primary' }}">
                {{ __('messages.contact') }}
            </a>

            <!-- Mobile Language Switcher -->
            <div class="border-t border-border-light pt-4 mt-4">
                <p class="px-4 text-xs text-text-muted uppercase tracking-wider mb-2 font-semibold">{{ __('messages.language') ?? 'Language' }}</p>
                @php
                    $currentRouteName = Route::currentRouteName();
                    $currentParams = Route::current() ? Route::current()->parameters() : [];
                    $queryString = request()->getQueryString();
                @endphp
                @foreach(['en' => 'English', 'fr' => 'Francais'] as $localeCode => $language)
                    @php
                        $newParams = array_merge($currentParams, ['locale' => $localeCode]);
                        $url = $currentRouteName ? route($currentRouteName, $newParams) : url($localeCode);
                        if ($queryString) {
                            $url .= '?' . $queryString;
                        }
                    @endphp
                    <a href="{{ $url }}"
                       class="flex items-center px-4 py-3 rounded-xl transition-colors duration-200 {{ app()->getLocale() === $localeCode ? 'bg-gold-50 text-gold' : 'text-text-secondary hover:bg-page-section hover:text-text-primary' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" viewBox="0 0 24 24">
                            <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0-18 0m.6-3h16.8M3.6 15h16.8"/>
                                <path d="M11.5 3a17 17 0 0 0 0 18m1-18a17 17 0 0 1 0 18"/>
                            </g>
                        </svg>
                        <span class="uppercase w-7 text-xs font-bold">{{ $localeCode }}</span>
                        <span class="ml-2 font-medium">{{ $language }}</span>
                        @if(app()->getLocale() === $localeCode)
                            <svg class="w-4 h-4 ml-auto text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        @endif
                    </a>
                @endforeach
            </div>
        </nav>
    </div>
</header>
