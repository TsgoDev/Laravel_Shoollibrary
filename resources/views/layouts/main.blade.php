<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

<!-- Styles -->
@livewireStyles
</head>

<body>
    <header>
        @livewire('navigation-menu') <!-- Inclui a barra de navegação -->
    </header>

    <aside>
        @include('layouts.sidebar') <!-- Inclui a sidebar -->
    </aside>

    <!-- Page Content -->
    <main>
        @yield('product') <!-- Renderiza o conteúdo da página -->
    </main>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

</html>
