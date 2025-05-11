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
