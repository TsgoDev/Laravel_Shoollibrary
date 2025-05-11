<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    /**
     * Exibe a lista de todos os autores ativos cadastrados, ordenados pela data de criação.
     */
    public function index()
    {
        $autores = Autor::where('status_autor', true) // apenas ativos
            ->orderBy('created_at', 'desc')
            ->get();

        return view('autores.index', compact('autores'));
    }



    /**
     * Exibe a lista de todos os autores inativos.
     */
    public function inativos()
    {
        $autores = Autor::where('status_autor', 0)->orderBy('created_at', 'desc')->get();
        return view('autores.index', compact('autores'));
    }



    /**
     * Cadastra um novo autor no banco de dados.
     */
    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'nome_autor' => 'required|string|max:100',
            'status_autor' => 'required|in:0,1',
        ]);

        // Verifica se o autor já existe
        $autorExistente = Autor::where('nome_autor', $request->input('nome_autor'))->first();

        if ($autorExistente) {
            return back()->with('error', 'Esse Autor já existe!');
        }

        // Insert autor no banco
        $autor = Autor::create([
            'nome_autor' => $request->input('nome_autor'),
            'status_autor' => $request->input('status_autor'),
        ]);

        return back()->with('message', 'Autor cadastrado com sucesso!');
    }



    /**
     * Atualiza dados do autor no banco de dados.
     */
    public function update(Request $request, $id)
    {
        // Validação dos dados
        $request->validate([
            'autor' => 'required|string|max:100',
            'situacao' => 'required|in:0,1',
        ]);

        // Buscar autor pelo ID
        $autor = Autor::findOrFail($id);

        // Verifica se o gênero já existe (excluindo o próprio registro)
        $autorExistente = Autor::where('nome_autor', $request->autor)
            ->where('id', '!=', $id)
            ->first();

        if ($autorExistente) {
            return back()->with('error', 'Autor já existe!');
        }

        // Atualizar dados
        $autor->update([
            'nome_autor' => $request->autor,
            'status_autor' => $request->situacao,
        ]);

        // Redirecionar para index com mensagem de sucesso
        return redirect()->route('autores.index')->with('message', 'Autor atualizado com sucesso!');
    }
}
