<?php

namespace App\Http\Controllers;

use App\Models\Editora;
use Illuminate\Http\Request;

class EditoraController extends Controller
{
    /**
     * Exibe a lista de todos os editoras ativos cadastrados, ordenados pela data de criação.
     */
    public function index()
    {
        $editoras = Editora::where('status_editora', true) // apenas ativos
            ->orderBy('created_at', 'desc')
            ->get();

        return view('editoras.index', compact('editoras'));
    }



    /**
     * Exibe a lista de todos os autores inativos.
     */
    public function inativos()
    {
        $editoras = Editora::where('status_editora', 0)->orderBy('created_at', 'desc')->get();
        return view('editoras.index', compact('editoras'));
    }



    /**
     * Cadastra uma nova editora no banco de dados.
     */
    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'nome_editora' => 'required|string|max:100',
            'nome_cidade' => 'required|string|max:70',
            'nome_estado' => 'required|string|max:2',
            'status_editora' => 'required|in:0,1',
        ]);

        // Verifica se a editora já existe com mesmo nome, cidade e estado
        // Verifica se a editora já existe com mesmo nome, cidade e estado
        $editoraExistente = Editora::where('nome_editora', $request->input('nome_editora'))
            ->where('cidade_editora', $request->input('nome_cidade'))
            ->where('estado_editora', $request->input('nome_estado'))
            ->first();

        if ($editoraExistente) {
            return redirect()->back()->with('error', 'Essa Editora já está cadastrada para essa cidade e estado!');
        }


        // Insert genero no banco
        $editora = Editora::create([
            'nome_editora' => $request->input('nome_editora'),
            'cidade_editora' => $request->input('nome_cidade'),
            'estado_editora' => $request->input('nome_estado'),
            'status_editora' => $request->input('status_editora'),
        ]);

        return back()->with('message', 'Editora cadastrada com sucesso!');
    }



    /**
     * Atualiza dados da editora no banco de dados.
     */
    public function update(Request $request, $id)
    {
        // Validação dos dados
        $request->validate([
            'editora_nome' => 'required|string|max:100',
            'editora_cidade' => 'required|string|max:100',
            'editora_estado' => 'required|string|max:100',
            'editora_status' => 'required|in:0,1',
        ]);


        // Buscar editora pelo ID
        $editora = Editora::findOrFail($id);

        // Atualizar dados
        $editora->update([
            'nome_editora' => $request->editora_nome,
            'cidade_editora' => $request->editora_cidade,
            'estado_editora' => $request->editora_estado,
            'status_editora' => $request->editora_status,
        ]);

        return redirect()->route('editoras.index')->with('message', 'Editora atualizada com sucesso!');
    }
}
