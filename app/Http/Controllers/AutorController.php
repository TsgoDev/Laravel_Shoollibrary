<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    /**
     * Function Listar todos os autores
     */
    public function index(){

        $autores = Autor::orderBy('created_at', 'desc')->get();
        return view('autores.index', compact('autores'));
    
    }

    public function destroy($id)
    {
        // Busca o produto pelo ID
        $autores = Autor::find($id);

        if ($autores) {
            // Deleta o produto
            $autores->delete();
            return redirect()->route('autores.index');
        }

        // Caso o produto não seja encontrado
        return redirect()->route('autores.index')->with('error', 'Autor não encontrado.');
    }

    
}
