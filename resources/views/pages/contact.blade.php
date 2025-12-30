<x-public-layout>
    <x-slot name="metaTitle">{{ __('messages.contact') }} - {{ __('messages.site_name') }}</x-slot>
    <x-slot name="metaDescription">{{ __('messages.get_in_touch') }}</x-slot>

    <div class="bg-dark min-h-screen">
        <!-- Page Header -->
        <div class="bg-dark-100 border-b border-dark-300">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <h1 class="text-3xl font-bold text-white">{{ __('messages.contact') }}</h1>
                <p class="text-text-muted mt-2">{{ __('messages.get_in_touch') }}</p>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="lg:flex lg:gap-12">
                <!-- Contact Form -->
                <div class="lg:flex-1">
                    <div class="bg-dark-100 border border-dark-300 rounded-xl p-8">
                        <h2 class="text-xl font-semibold text-gold mb-6">{{ __('messages.send_message') }}</h2>

                        @if(session('success'))
                            <div class="mb-6 p-4 bg-success/20 border border-success text-success rounded-lg">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('contact.store', ['locale' => app()->getLocale()]) }}" method="POST">
                            @csrf

                            @if(request('property'))
                                <input type="hidden" name="property_id" value="{{ request('property') }}">
                            @endif

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-text-secondary mb-1">{{ __('messages.name') }} *</label>
                                    <input type="text" id="name" name="name" value="{{ old('name') }}" required
                                        class="w-full rounded-lg bg-dark-200 border-dark-300 text-white placeholder-text-muted focus:border-gold focus:ring-gold @error('name') border-error @enderror">
                                    @error('name')
                                        <p class="mt-1 text-sm text-error">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="email" class="block text-sm font-medium text-text-secondary mb-1">{{ __('messages.email') }} *</label>
                                    <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                        class="w-full rounded-lg bg-dark-200 border-dark-300 text-white placeholder-text-muted focus:border-gold focus:ring-gold @error('email') border-error @enderror">
                                    @error('email')
                                        <p class="mt-1 text-sm text-error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <label for="phone" class="block text-sm font-medium text-text-secondary mb-1">{{ __('messages.phone') }}</label>
                                    <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                                        class="w-full rounded-lg bg-dark-200 border-dark-300 text-white placeholder-text-muted focus:border-gold focus:ring-gold">
                                </div>
                                <div>
                                    <label for="subject" class="block text-sm font-medium text-text-secondary mb-1">{{ __('messages.subject') }}</label>
                                    <input type="text" id="subject" name="subject" value="{{ old('subject') }}"
                                        class="w-full rounded-lg bg-dark-200 border-dark-300 text-white placeholder-text-muted focus:border-gold focus:ring-gold">
                                </div>
                            </div>

                            <div class="mb-6">
                                <label for="message" class="block text-sm font-medium text-text-secondary mb-1">{{ __('messages.message') }} *</label>
                                <textarea id="message" name="message" rows="5" required
                                    class="w-full rounded-lg bg-dark-200 border-dark-300 text-white placeholder-text-muted focus:border-gold focus:ring-gold @error('message') border-error @enderror">{{ old('message') }}</textarea>
                                @error('message')
                                    <p class="mt-1 text-sm text-error">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit"
                                class="w-full bg-gold hover:bg-gold-light text-dark font-semibold py-3 px-6 rounded-lg transition duration-200">
                                {{ __('messages.send_message') }}
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="lg:w-96 mt-8 lg:mt-0">
                    <div class="bg-dark-100 border border-dark-300 rounded-xl p-8 mb-6">
                        <h2 class="text-xl font-semibold text-gold mb-6">{{ __('messages.contact_info') }}</h2>

                        <div class="space-y-6">
                            <div class="flex items-start">
                                <div class="w-12 h-12 bg-gold/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h3 class="font-medium text-white">Address</h3>
                                    <p class="text-text-muted">Tangier, Morocco</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="w-12 h-12 bg-gold/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h3 class="font-medium text-white">{{ __('messages.phone') }}</h3>
                                    <a href="tel:+212600000000" class="text-text-muted hover:text-gold transition-colors">+212 600-000000</a>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="w-12 h-12 bg-gold/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h3 class="font-medium text-white">{{ __('messages.email') }}</h3>
                                    <a href="mailto:info@erdmannglobal.com" class="text-text-muted hover:text-gold transition-colors">info@erdmannglobal.com</a>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="w-12 h-12 bg-gold/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h3 class="font-medium text-white">Working Hours</h3>
                                    <p class="text-text-muted">Mon - Fri: 9:00 AM - 6:00 PM</p>
                                    <p class="text-text-muted">Sat: 10:00 AM - 4:00 PM</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Map -->
                    <div class="bg-dark-100 border border-dark-300 rounded-xl overflow-hidden">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d103693.70785424046!2d-5.893571!3d35.7594651!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd0b875cf04c132d%3A0x76bfc571bfb4e17a!2sTangier%2C%20Morocco!5e0!3m2!1sen!2sus!4v1635000000000!5m2!1sen!2sus"
                            width="100%"
                            height="250"
                            style="border:0; filter: grayscale(100%) invert(92%) contrast(90%);"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-public-layout>
