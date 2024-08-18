<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.2/dist/flowbite.min.css"/>
    <script src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script>

    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans">
<div class="min-h-screen">
    @include('layouts.navigation')

    <!-- Page Content -->
    <main class="h-screen grid md:grid-cols-6 sm:grid-cols-4 max-w-7xl mx-auto">
        {{-- Sidebar --}}
        <section class="col-span-1 border-r-2 border-green-lighter pt-14 pr-5">
            @include('layouts.sidebar')
        </section>

        {{-- Main Content --}}
        <section class="col-span-5 pt-14 pl-10">
            {{ $slot }}
        </section>
    </main>
</div>
@livewireScripts
@livewire('livewire-ui-modal')

</body>
</html>