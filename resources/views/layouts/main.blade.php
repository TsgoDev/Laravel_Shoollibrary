<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Incluindo o SweetAlert 2.1.2 no cabeçalho -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

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


    <!-- Page Content index Product -->
    <main>
        @yield('content') <!-- Renderiza o conteúdo da página index -->
    </main>


    <!-- Modal site flowbite -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <!-- Incluindo o SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Jquery e outros scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <!-- Script de máscaras -->
    <script>
        $(document).ready(function() {
            $('.phone_with_ddd').mask('(00) 0000-00000'); // Mascara telefone
        });
    </script>

    @livewireScripts

    <!-- Seus scripts customizados -->
    <script src="/js/search-autores.js"></script>
    <script src="/js/search-acervos.js"></script>
    <script src="/js/search-generos.js"></script>
    <script src="/js/search-editoras.js"></script>
    <script src="/js/search-alunos.js"></script>
    <script src="/js/search-obras.js"></script>
    <script src="/js/modal-busca-obras.js"></script>
    <!-- Reinicialização do Alpine após navegação Turbo -->
    <script>
        document.addEventListener("turbo:load", () => {
            if (window.Alpine && Alpine.initTree) {
                Alpine.initTree(document.body);
            }
        });
    </script>
    @stack('scripts')
</body>

</html>