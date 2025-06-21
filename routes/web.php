<?php

//use App\Http\Controllers\ProductController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\AcervoController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\EditoraController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\ObraController;
use App\Http\Controllers\BuscaController;
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
    //----Salvar
    Route::post('/autores', [AutorController::class, 'store'])->name('autores-store');
    //---Update
    Route::put('/autores/{id}', [AutorController::class, 'update'])->name('autores-update');

    // Page index acervo
    Route::get('/acervos', [AcervoController::class, 'index'])->name('acervos.index');
    // Página de acervos inativos
    Route::get('/acervos/inativos', [AcervoController::class, 'inativos'])->name('acervos.inativos');
    //----Salvar
    Route::post('/acervos', [AcervoController::class, 'store'])->name('acervos-store');
    //---Update
    Route::put('/acervos/{id}', [AcervoController::class, 'update'])->name('acervos-update');


    // Page index genero
    Route::get('/generos', [GeneroController::class, 'index'])->name('generos.index');
    // Página de generos inativos
    Route::get('/generos/inativos', [GeneroController::class, 'inativos'])->name('generos.inativos');
    //----Salvar
    Route::post('/generos', [GeneroController::class, 'store'])->name('generos-store');
    //---Update
    Route::put('/generos/{id}', [GeneroController::class, 'update'])->name('generos-update');


    // Page index editora
    Route::get('/editoras', [EditoraController::class, 'index'])->name('editoras.index');
    // Página de editoras inativos
    Route::get('/editoras/inativos', [EditoraController::class, 'inativos'])->name('editoras.inativos');
    //----Salvar
    Route::post('/editoras', [EditoraController::class, 'store'])->name('editoras-store');
    //---Update
    Route::put('/editoras/{id}', [EditoraController::class, 'update'])->name('editoras-update');


    // Page index aluno
    Route::get('/alunos', [AlunoController::class, 'index'])->name('alunos.index');
    // Página de alunos inativos
    Route::get('/alunos/inativos', [AlunoController::class, 'inativos'])->name('alunos.inativos');
    //----Salvar
    Route::post('/alunos', [AlunoController::class, 'store'])->name('alunos-store');
    //---Update
    Route::put('/alunos/{id}', [AlunoController::class, 'update'])->name('alunos-update');


    // Page index obra
    Route::get('/obras', [ObraController::class, 'index'])->name('obras.index');
    // Página de obras inativos
    Route::get('/obras/inativos', [ObraController::class, 'inativos'])->name('obras.inativos');
    //----Salvar
    Route::post('/obras', [ObraController::class, 'store'])->name('obras-store');
    //---Update
    Route::put('/obras/{id}', [ObraController::class, 'update'])->name('obras-update');


    // Rotas para busca de dados
    Route::get('/buscar-editoras', [BuscaController::class, 'buscarEditoras'])->name('buscar-editoras');
    Route::get('/buscar-acervos', [BuscaController::class, 'buscarAcervos'])->name('buscar-acervos');
    Route::get('/buscar-generos', [BuscaController::class, 'buscarGeneros'])->name('buscar-generos');
    Route::get('/buscar-autores', [BuscaController::class, 'buscarAutores'])->name('buscar-autores');


    //----Excluir autores
    //Route::delete('/autores/{id}', [AutorController::class, 'destroy'])->name('autores-destroy');

    //----Excluir produto
    //Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products-destroy');

    //----Salvar produto
    //Route::post('/products', [ProductController::class, 'store'])->name('products-store');

    //----Atualizar status do produto
    //Route::post('/products/update-status/{product}', [ProductController::class, 'updateStatus'])->name('products.updateStatus');

});
