<?php

namespace App\Http\Controllers;

use App\Models\Acervo;
use App\Models\Editora;
use App\Models\Genero;
use App\Models\Autor;
use Illuminate\Http\Request;

class BuscaController extends Controller
{
    public function buscarEditoras()
    {
        $editoras = Editora::where('status_editora', true)->orderBy('created_at', 'desc')->get();
        return response()->json($editoras);
    }

    public function buscarAcervos()
    {
        $acervos = Acervo::where('status_acervo', true)->orderBy('created_at', 'desc')->get();
        return response()->json($acervos);
    }

    public function buscarGeneros()
    {
        $generos = Genero::where('status_genero', true)->orderBy('created_at', 'desc')->get();
        return response()->json($generos);
    }

    public function buscarAutores()
    {
        $autores = Autor::where('status_autor', true)->orderBy('created_at', 'desc')->get();
        return response()->json($autores);
    }
}
