<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    /**
     * Exibe a lista de todos os autores ativos cadastrados, ordenados pela data de criação.
     */
    public function index()
    {
        $generos = Genero::where('status_genero', true) // apenas ativos
            ->orderBy('created_at', 'desc')
            ->get();

        return view('generos.index', compact('generos'));
    }



    /**
     * Exibe a lista de todos os autores inativos.
     */
    public function inativos()
    {
        $generos = Genero::where('status_genero', 0)->orderBy('created_at', 'desc')->get();
        return view('generos.index', compact('generos'));
    }



    /**
     * Cadastra um novo gênero no banco de dados.
     */
    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'nome_genero' => 'required|string|max:100',
            'status_genero' => 'required|in:0,1',
        ]);

        // Verifica se o gênero já existe
        $generoExistente = Genero::where('nome_genero', $request->input('nome_genero'))->first();

        if ($generoExistente) {
            return back()->with('error', 'Esse Gênero já existe!');
        }

        // Insert genero no banco
        $genero = Genero::create([
            'nome_genero' => $request->input('nome_genero'),
            'status_genero' => $request->input('status_genero'),
        ]);

        return back()->with('message', 'Gênero cadastrado com sucesso!');
    }



    /**
     * Atualiza dados do gênero no banco de dados.
     */
    public function update(Request $request, $id)
    {
        // Validação dos dados
        $request->validate([
            'genero' => 'required|string|max:100',
            'situacao' => 'required|in:0,1',
        ]);

        // Buscar gênero pelo ID
        $genero = Genero::findOrFail($id);

        // Verifica se o gênero já existe (excluindo o próprio registro)
        $generoExistente = Genero::where('nome_genero', $request->genero)
        ->where('id', '!=', $id)
        ->first();

        if ($generoExistente) {
            return back()->with('error', 'Gênero já existe!');
        }

        // Atualizar dados
        $genero->update([
            'nome_genero' => $request->genero,
            'status_genero' => $request->situacao,
        ]);

        // Redirecionar para index com mensagem de sucesso
        return redirect()->route('generos.index')->with('message', 'Gênero atualizado com sucesso!');
    }
}
