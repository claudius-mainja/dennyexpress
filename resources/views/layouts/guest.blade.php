<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'Denny Express')) | Denny Express</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="font-sans antialiased text-dark-charcoal bg-light-gray min-h-screen flex flex-col">
    <div class="flex-1 flex flex-col sm:justify-center items-center pt-6 sm:pt-0 px-4">
        <div class="mb-8">
            <a href="/" class="flex items-center gap-3">
                <div class="w-10 h-10 bg-primary-navy rounded-lg flex items-center justify-center">
                    <span class="text-white font-bold text-lg">D</span>
                </div>
                <span class="text-xl font-bold text-primary-navy">Denny Express</span>
            </a>
        </div>

        <div class="w-full sm:max-w-md bg-white rounded-xl shadow-card border border-border-gray overflow-hidden">
            {{ $slot }}
        </div>
    </div>
</body>
</html>
