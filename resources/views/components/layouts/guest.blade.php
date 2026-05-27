<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'Denny Express')) | Denny Express</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link rel="icon" type="image/webp" href="{{ asset('images/logos/denny-logo.webp') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="font-sans antialiased text-gray-800 bg-gray-100 min-h-screen flex flex-col">
    <div class="flex-1 flex flex-col sm:justify-center items-center pt-6 sm:pt-0 px-4">
        <div class="mb-8">
            <a href="/" class="flex items-center gap-3">
                <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center">
                    <span class="text-white font-bold text-lg">D</span>
                </div>
                <span class="text-xl font-bold text-gray-900">Denny Express</span>
            </a>
        </div>

        <div class="w-full sm:max-w-md bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
            {{ $slot }}
        </div>
    </div>
</body>
</html>