<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @if(app()->environment('local'))
            <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        @endif

        <title>{{ config('app.name', 'Pinball Friends') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-cursive text-gray-900 antialiased bg-gray-100 dark:bg-nightmainbg-dark">
        @env('demo')
            <x-demo-banner />
        @endenv

        <x-application-logo />

        <div class="mx-auto w-full min-h-screen sm:min-h-0 mt-6 px-6 pt-4 pb-12 sm:pb-24 sm:mb-8 sm:w-4/5 md:w-3/4 lg:w-1/2 bg-white dark:bg-nightmainbg shadow-md sm:rounded-lg bg-gradient-to-b from-gray-100 to-transparent from-0% via-white via-10% sm:bg-none dark:bg-none">
            {{ $slot }}
        </div>
    </body>
</html>
