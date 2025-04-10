<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    /**
     * Listar todos autores
     */
    public function index() {
        $autores = Autor::orderBy('created_at', 'desc')->get();
        return view('autores.index', compact('autores'));
    }
    

    /**
     * Editar autores
     */
    public function edit($id){

        $autor = Autor::findOrFail($id);
        return response()->json([
            'id' => $autor->id,
            'nome_autor' => $autor->nome_autor,
            'status_autor' => $autor->status_autor,
        ]);
        
    }

    
}
