<?php

if (!function_exists('getPageTitle')) {
    function getPageTitle()
    {
        $titles = [
            'dashboard' => 'Painel de Controle',

            'autores.index' => 'Autores',
            'autores.inativos' => 'Autores Inativos',

            'acervos.index' => 'Acervos',
            'acervos.inativos' => 'Acervos Inativos',

            'generos.index' => 'Generos',
            'generos.inativos' => 'Generos Inativos',

            'editoras.index' => 'Editoras',
            'editoras.inativos' => 'Editoras Inativos',

            'profile.edit' => 'Perfil',

            'orders.index' => 'Pedidos',

            'products.index' => 'Produtos',
        ];

        return $titles[request()->route()->getName()] ?? 'Página Desconhecida';
    }
}

if (!function_exists('getMainMenu')) {
    function getMainMenu()
    {
        return [
            ['route' => 'dashboard', 'label' => 'Painel de Controle'],
            ['route' => 'autores.index', 'label' => 'Autores'],
            ['route' => 'acervos.index', 'label' => 'Acervos'],
            ['route' => 'generos.index', 'label' => 'Gêneros'],
            ['route' => 'editoras.index', 'label' => 'Editoras'],
            // Adicione outros menus principais aqui
        ];
    }
}
