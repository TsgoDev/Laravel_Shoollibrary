<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    /**
     * Function Listar todos autores
     */
    public function index() {
        $autores = Autor::orderBy('created_at', 'desc')->get();
        return view('autores.index', compact('autores'));
    }
    

    /**
     * Function Editar autores
     */
    public function edit(string $id){

    $autor = Autor::findOrFail($id);
    return view('autores.index', compact('autor'));
        
    }

    
}
