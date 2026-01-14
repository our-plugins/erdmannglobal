<header class="bg-dark sticky top-0 z-50 border-b border-dark-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Logo -->
            <a href="{{ route('home', ['locale' => app()->getLocale()]) }}" class="flex items-center">
                <img src="{{ asset('images/logo.png') }}" alt="{{ __('messages.site_name') }}" class="h-16 w-auto">
            </a>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex items-center space-x-8">
                <a href="{{ route('home', ['locale' => app()->getLocale()]) }}" class="text-text-secondary hover:text-gold transition-colors font-medium {{ request()->routeIs('home') ? 'text-gold' : '' }}">
                    {{ __('messages.home') }}
                </a>
                <a href="{{ route('properties.index', ['locale' => app()->getLocale()]) }}" class="text-text-secondary hover:text-gold transition-colors font-medium {{ request()->routeIs('properties.*') ? 'text-gold' : '' }}">
                    {{ __('messages.listings') }}
                </a>
                <a href="{{ route('about', ['locale' => app()->getLocale()]) }}" class="text-text-secondary hover:text-gold transition-colors font-medium {{ request()->routeIs('about') ? 'text-gold' : '' }}">
                    {{ __('messages.about') }}
                </a>
                <a href="{{ route('blog.index', ['locale' => app()->getLocale()]) }}" class="text-text-secondary hover:text-gold transition-colors font-medium {{ request()->routeIs('blog.*') ? 'text-gold' : '' }}">
                    {{ __('messages.blog') }}
                </a>
                <a href="{{ route('contact', ['locale' => app()->getLocale()]) }}" class="text-text-secondary hover:text-gold transition-colors font-medium {{ request()->routeIs('contact') ? 'text-gold' : '' }}">
                    {{ __('messages.contact') }}
                </a>
            </nav>

            <!-- Right Side -->
            <div class="flex items-center space-x-4">
                <!-- Language Switcher -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center space-x-2 text-text-secondary hover:text-gold transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0-18 0m.6-3h16.8M3.6 15h16.8"/><path d="M11.5 3a17 17 0 0 0 0 18m1-18a17 17 0 0 1 0 18"/></g></svg>
                        <span class="uppercase font-medium text-sm">{{ app()->getLocale() }}</span>
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="open" @click.away="open = false" x-transition class="absolute right-0 mt-2 w-32 bg-dark-100 rounded-lg shadow-lg border border-dark-300 py-1 z-50">
                        @php
                            $currentRouteName = Route::currentRouteName();
                            $currentParams = Route::current() ? Route::current()->parameters() : [];
                            $queryString = request()->getQueryString();
                        @endphp
                        @foreach(['en' => 'English', 'fr' => 'Français'] as $localeCode => $language)
                            @php
                                $newParams = array_merge($currentParams, ['locale' => $localeCode]);
                                $url = $currentRouteName ? route($currentRouteName, $newParams) : url($localeCode);
                                if ($queryString) {
                                    $url .= '?' . $queryString;
                                }
                            @endphp
                            <a href="{{ $url }}" class="flex items-center px-4 py-2 text-sm text-text-secondary hover:bg-dark-200 hover:text-gold transition-colors {{ app()->getLocale() === $localeCode ? 'font-semibold text-gold bg-dark-200' : '' }}">
                                <span class="uppercase w-6 text-xs font-bold {{ app()->getLocale() === $localeCode ? 'text-gold' : 'text-text-muted' }}">{{ $localeCode }}</span>
                                <span class="ml-2">{{ $language }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Mobile Menu Button -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden p-2 text-text-secondary hover:text-gold transition-colors">
                    <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg x-show="mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="mobileMenuOpen" x-transition class="md:hidden bg-dark-100 border-t border-dark-300">
        <nav class="px-4 py-4 space-y-2">
            <a href="{{ route('home', ['locale' => app()->getLocale()]) }}" class="block px-4 py-2 rounded-lg text-text-secondary hover:bg-dark-200 hover:text-gold transition-colors {{ request()->routeIs('home') ? 'bg-dark-200 text-gold' : '' }}">
                {{ __('messages.home') }}
            </a>
            <a href="{{ route('properties.index', ['locale' => app()->getLocale()]) }}" class="block px-4 py-2 rounded-lg text-text-secondary hover:bg-dark-200 hover:text-gold transition-colors {{ request()->routeIs('properties.*') ? 'bg-dark-200 text-gold' : '' }}">
                {{ __('messages.listings') }}
            </a>
            <a href="{{ route('about', ['locale' => app()->getLocale()]) }}" class="block px-4 py-2 rounded-lg text-text-secondary hover:bg-dark-200 hover:text-gold transition-colors {{ request()->routeIs('about') ? 'bg-dark-200 text-gold' : '' }}">
                {{ __('messages.about') }}
            </a>
            <a href="{{ route('blog.index', ['locale' => app()->getLocale()]) }}" class="block px-4 py-2 rounded-lg text-text-secondary hover:bg-dark-200 hover:text-gold transition-colors {{ request()->routeIs('blog.*') ? 'bg-dark-200 text-gold' : '' }}">
                {{ __('messages.blog') }}
            </a>
            <a href="{{ route('contact', ['locale' => app()->getLocale()]) }}" class="block px-4 py-2 rounded-lg text-text-secondary hover:bg-dark-200 hover:text-gold transition-colors {{ request()->routeIs('contact') ? 'bg-dark-200 text-gold' : '' }}">
                {{ __('messages.contact') }}
            </a>

            <!-- Mobile Language Switcher -->
            <div class="border-t border-dark-300 pt-4 mt-4">
                <p class="px-4 text-xs text-text-muted uppercase tracking-wider mb-2">{{ __('messages.language') ?? 'Language' }}</p>
                @php
                    $currentRouteName = Route::currentRouteName();
                    $currentParams = Route::current() ? Route::current()->parameters() : [];
                    $queryString = request()->getQueryString();
                @endphp
                @foreach(['en' => 'English', 'fr' => 'Français'] as $localeCode => $language)
                    @php
                        $newParams = array_merge($currentParams, ['locale' => $localeCode]);
                        $url = $currentRouteName ? route($currentRouteName, $newParams) : url($localeCode);
                        if ($queryString) {
                            $url .= '?' . $queryString;
                        }
                    @endphp
                    <a href="{{ $url }}" class="flex items-center px-4 py-2 rounded-lg text-text-secondary hover:bg-dark-200 hover:text-gold transition-colors {{ app()->getLocale() === $localeCode ? 'bg-dark-200 text-gold' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0-18 0m.6-3h16.8M3.6 15h16.8"/><path d="M11.5 3a17 17 0 0 0 0 18m1-18a17 17 0 0 1 0 18"/></g></svg>
                        <span class="uppercase w-6 text-xs font-bold">{{ $localeCode }}</span>
                        <span class="ml-2">{{ $language }}</span>
                    </a>
                @endforeach
            </div>
        </nav>
    </div>
</header>
