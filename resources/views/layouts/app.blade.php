<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- font awesome icons -->
        <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">



        <!-- Scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>

        @livewireStyles
        <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
        <link
            href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
            rel="stylesheet"
        />
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@1.2.3/dist/trix.css">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


         <!-- Styles -->
         <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body class="font-sans antialiased">

        <div class="min-h-screen bg-gray-color lg:flex" x-data="{isNavOpen:false}">
            <x-navigation />
            <div class="relative z-0 lg:flex-grow">
                <x-top-header />
                <main>
                    {{ $slot }}
                </main>
            </div>
        </div>

        @livewireScripts
        <script src="https://unpkg.com/trix@1.2.3/dist/trix.js"></script>
        <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
        <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
        @stack('scripts')
    </body>
</html>
