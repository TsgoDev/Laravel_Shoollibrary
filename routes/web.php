<?php

use App\Http\Controllers\ProductController;
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

// Rotas products (Autenticada)
Route::middleware(['auth'])->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');

    //----Excluir product
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products-destroy');
    //----Salvar product
    Route::post('/products', [ProductController::class, 'store'])->name('products-store');

});