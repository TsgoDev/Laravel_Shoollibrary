<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    /**
     * Exibe a lista de todos os autores cadastrados, ordenados pela data de criação (mais recentes primeiro).
     */
    public function index()
    {
        $autores = Autor::orderBy('created_at', 'desc')->get();
        return view('autores.index', compact('autores'));
    }



    /**
     * Busca os dados de um autor específico para preenchimento do modal de edição.
    *
    * $id ID do autor
    * Dados do autor em formato JSON
    */
    public function edit($id)
    {

        $autor = Autor::findOrFail($id);
        return response()->json([
            'id' => $autor->id,
            'nome_autor' => $autor->nome_autor,
            'status_autor' => $autor->status_autor,
        ]);
    }



    /**
     * Atualiza as informações de um autor existente no banco de dados.
     */
    public function update(Request $request, $id)
    {
        // Validação dos dados
        $request->validate([
            'name' => 'required|string|max:100',
            'situacao' => 'required|in:0,1',
        ]);


        // Buscar autor pelo ID
        $autor = Autor::find($id);
        if (!$autor) {
            return redirect()->route('autores.index')->with('error', 'Autor não encontrado');
        }

        // Atualizar dados
        $autor->update([
            'nome_autor' => $request->name,
            'status_autor' => $request->situacao,
        ]);

        // Redirecionar para index
        return back()->with('message', 'Autor atualizado com sucesso!');
    }


    
    /**
     * Armazena um novo autor no banco de dados.
     */
    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'nome_autor' => 'required|string|max:100',
            'status_autor' => 'required|in:0,1', 
        ]);

        // Insert autor no banco
        $autor = Autor::create([
            'nome_autor' => $request->input('nome_autor'),
            'status_autor' => $request->input('status_autor'),
        ]);

        return back()->with('message', 'Autor cadastrado com sucesso!');
    }
}
