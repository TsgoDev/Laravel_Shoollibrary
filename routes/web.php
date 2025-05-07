<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\AutorController;
use Illuminate\Support\Facades\Route;


// Rota de boas-vindas
Route::get('/', function () {
    return view('welcome');
});

// Grupo de rotas autenticadas
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',

    // Rota para o dashboard   
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Rotas (Autenticada)
Route::middleware(['auth'])->group(function () {

    // Page index autor
    Route::get('/autores', [AutorController::class, 'index'])->name('autores.index');
    // Página de autores inativos
    Route::get('/autores/inativos', [AutorController::class, 'inativos'])->name('autores.inativos');
    //----Modal Editar
    Route::get('autores/{id}/edit', [AutorController::class, 'edit'])->name('autores.edit');
    //----Salvar
    Route::post('/autores', [AutorController::class, 'store'])->name('autores-store');
    //---Update
    Route::put('/autores/{id}', [AutorController::class, 'update'])->name('autores-update');


    //Route::get('/products', [ProductController::class, 'index'])->name('products.index');

    //----Excluir autores
    //Route::delete('/autores/{id}', [AutorController::class, 'destroy'])->name('autores-destroy');

    //----Excluir produto
    //Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products-destroy');

    //----Salvar produto
    //Route::post('/products', [ProductController::class, 'store'])->name('products-store');

    //----Atualizar status do produto
    //Route::post('/products/update-status/{product}', [ProductController::class, 'updateStatus'])->name('products.updateStatus');

});

//----------Page 404------------>
Route::fallback(function () {
    return view('layouts.404');
});
