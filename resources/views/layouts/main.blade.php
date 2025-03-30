<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
<!-- Modal site flowbite -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script>
    $(document).ready(function() {
        $('.money').mask('000.000.000.000.000,00', {reverse: true});
    });
</script>

<script src="/js/sweetalert_delete_product.js"></script>
<script src="/js/search_product.js"></script>
</html>
