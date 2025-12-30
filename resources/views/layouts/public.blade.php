<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $metaTitle ?? __('messages.site_name') }}</title>
    <meta name="description" content="{{ $metaDescription ?? '' }}">

    <!-- Open Graph -->
    <meta property="og:title" content="{{ $metaTitle ?? __('messages.site_name') }}">
    <meta property="og:description" content="{{ $metaDescription ?? '' }}">
    <meta property="og:image" content="{{ $ogImage ?? asset('images/og-default.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="{{ $ogType ?? 'website' }}">
    <meta property="og:locale" content="{{ app()->getLocale() }}">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $metaTitle ?? __('messages.site_name') }}">
    <meta name="twitter:description" content="{{ $metaDescription ?? '' }}">
    <meta name="twitter:image" content="{{ $ogImage ?? asset('images/og-default.jpg') }}">

    <!-- Canonical & Alternate -->
    <link rel="canonical" href="{{ url()->current() }}">
    @php $currentLocale = app()->getLocale(); @endphp
    <link rel="alternate" hreflang="en" href="{{ str_replace("/{$currentLocale}/", '/en/', url()->current()) }}">
    <link rel="alternate" hreflang="fr" href="{{ str_replace("/{$currentLocale}/", '/fr/', url()->current()) }}">
    <link rel="alternate" hreflang="x-default" href="{{ str_replace("/{$currentLocale}/", '/en/', url()->current()) }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Styles & Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Schema.org -->
    @stack('schema')
</head>
<body class="font-sans antialiased bg-gray-50" x-data="{ mobileMenuOpen: false }">
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        @include('partials.header')

        <!-- Main Content -->
        <main class="flex-grow">
            {{ $slot }}
        </main>

        <!-- Footer -->
        @include('partials.footer')
    </div>

    @stack('scripts')
</body>
</html>
