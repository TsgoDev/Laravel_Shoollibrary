<?php

if (!function_exists('getPageTitle')) {
    function getPageTitle()
    {
        $titles = [
            'dashboard' => 'Painel de Controle',
            'products.index' => 'Produtos',
            'autores.index' => 'Autores',
            'profile.edit' => 'Perfil',
            'orders.index' => 'Pedidos',
        ];

        return $titles[request()->route()->getName()] ?? 'Página Desconhecida';
    }
}
