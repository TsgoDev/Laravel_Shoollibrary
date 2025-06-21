<?php

namespace App\Http\Controllers;

use App\Models\Acervo;
use App\Models\Editora;
use App\Models\Genero;
use App\Models\Autor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BuscaController extends Controller
{
    public function buscarEditoras()
    {
        $editoras = Editora::where('status_editora', true)->get();
        Log::info('Buscando Editoras:', $editoras->toArray());
        return response()->json($editoras);
    }

    public function buscarAcervos()
    {
        $acervos = Acervo::where('status_acervo', true)->get();
        Log::info('Buscando Acervos:', $acervos->toArray());
        return response()->json($acervos);
    }

    public function buscarGeneros()
    {
        $generos = Genero::where('status_genero', true)->get();
        Log::info('Buscando Gêneros:', $generos->toArray());
        return response()->json($generos);
    }

    public function buscarAutores()
    {
        $autores = Autor::where('status_autor', true)->get();
        Log::info('Buscando Autores:', $autores->toArray());
        return response()->json($autores);
    }
}
