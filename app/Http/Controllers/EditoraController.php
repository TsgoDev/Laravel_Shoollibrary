<?php

namespace App\Http\Controllers;

use App\Models\Editora;

use App\Models\Estado;
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

        // Buscar estados da tabela estados
        $estados = Estado::orderBy('nome_estado')->get();

        return view('editoras.index', compact('editoras', 'estados'));
    }



    /**
     * Exibe a lista de todos os autores inativos.
     */
    public function inativos()
    {
        $editoras = Editora::where('status_editora', 0)
            ->orderBy('created_at', 'desc')
            ->get();

        // Buscar estados da tabela estados
        $estados = Estado::orderBy('nome_estado')->get();

        return view('editoras.index', compact('editoras', 'estados'));
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
            'estado_id' => 'required|exists:estados,id',
            'status_editora' => 'required|in:0,1',
        ]);


        // Verifica se a editora já existe com mesmo nome, cidade e estado
        $editoraExistente = Editora::where('nome_editora', $request->input('nome_editora'))
            ->where('cidade_editora', $request->input('nome_cidade'))
            ->where('estado_id', $request->input('estado_id'))
            ->first();

        if ($editoraExistente) {
            return redirect()->back()->with('error', 'Editora já cadastrada nesta cidade e estado!');
        }

        // Insert editora no banco
        $editora = Editora::create([
            'nome_editora' => $request->input('nome_editora'),
            'cidade_editora' => $request->input('nome_cidade'),
            'estado_id' => $request->input('estado_id'),
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
            'edit_editora' => 'required|string|max:100',
            'edit_cidade' => 'required|string|max:70',
            'edit_estado' => 'required|string|max:30',
            'status_editora' => 'required|in:0,1',
        ]);


        // Buscar editora pelo ID
        $editora = Editora::findOrFail($id);

        // Atualizar dados
        $editora->update([
            'nome_editora' => $request->edit_editora,
            'cidade_editora' => $request->edit_cidade,
            'estado_id' => $request->edit_estado,
            'status_editora' => $request->status_editora,
        ]);

        return redirect()->route('editoras.index')->with('message', 'Editora atualizada com sucesso!');
    }
}
