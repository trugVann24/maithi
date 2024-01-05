<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="{{asset('assets/js/jquery.js')}}"></script>

    </head>
    <body class="font-sans antialiased relative">
        @if (session('success'))
            <x-notification type="success" message="{{ session('success') }}" />
        @endif
        <div class="min-h-screen bg-gray-100">
            @include('layouts.includes.sidebar')
            <!-- Page Content -->
            <main class="ml-64 mt-10">
                <div class="py-12">
                    {{ $slot }}
                </div>
            </main>
        </div>

        <!-- Scripts -->
        <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
        <script src="{{asset('assets/js/start.js')}}"></script>
        @stack('script')
    </body>
</html>
