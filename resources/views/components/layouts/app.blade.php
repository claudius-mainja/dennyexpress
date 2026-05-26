<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('meta_description', config('app.name', 'Denny Express') . ' - POS Systems & Hardware South Africa')">
    <meta name="keywords" content="@yield('meta_keywords', 'POS systems, thermal printers, barcode scanners, cash drawers, South Africa')">

    <title>@yield('title', config('app.name', 'Denny Express'))</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link rel="icon" type="image/webp" href="{{ asset('images/logos/denny-logo.webp') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logos/denny-logo.webp') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>
<body x-data="{
    cartOpen: false,
    searchOpen: false,
    mobileOpen: false,
}" class="font-sans antialiased text-gray-800 bg-gray-50">

    <x-partials.topbar />
    <x-partials.header />

    <main class="min-h-screen">
        {{ $slot }}
    </main>

    <x-partials.footer />
    <x-partials.cart-slideover />
    <x-partials.search-modal />
    <x-partials.nav-mobile />
    <x-partials.whatsapp-widget />

    @stack('scripts')

    @if (session('success'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)"
             x-show="show"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 translate-y-2"
             class="fixed bottom-4 right-4 z-50 bg-success text-white px-6 py-3 rounded-lg shadow-lg text-sm font-medium">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)"
             x-show="show"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 translate-y-2"
             class="fixed bottom-4 right-4 z-50 bg-error text-white px-6 py-3 rounded-lg shadow-lg text-sm font-medium">
            {{ session('error') }}
        </div>
    @endif
</body>
</html>
