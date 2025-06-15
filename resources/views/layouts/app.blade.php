<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Vite CSS & JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body>
    
    <header>
        @livewire('navigation-menu') <!-- Inclui o navbar de navegação -->
    </header>

    <aside>
        @include('layouts.sidebar') <!-- Inclui menu sidebar Meraki UI -->
    </aside>

    <!-- Page Content Dashboard -->
    <main>
        {{ $slot }}
    </main>

    <!-- Page Content-->
    <main>
        @yield('Content') <!--Nenhum conteúdo está sendo renderizado no momento---->
    </main>

    @stack('modals')

    @livewireScripts
</body>

</html>
