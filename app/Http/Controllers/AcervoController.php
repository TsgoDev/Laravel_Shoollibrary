<?php

namespace App\Http\Controllers;

use App\Models\Acervo;
use Illuminate\Http\Request;

class AcervoController extends Controller
{
    /**
     * Exibe a lista de todos os acervos ativos cadastrados, ordenados pela data de criação.
     */
    public function index()
    {
        $acervos = Acervo::where('status_acervo', true) // apenas ativos
        ->orderBy('created_at', 'desc')
        ->get();

        return view('acervos.index', compact('acervos'));
    }
    

    /**
     * Exibe a lista de todos os acervos inativos.
     */
    public function inativos()
    {
        $acervos = Acervo::where('status_acervo', 0)->orderBy('created_at', 'desc')->get();
        return view('acervos.index', compact('acervos'));
    }


    /**
     * Cadastra um novo acervo no banco de dados.
     */
    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'nome_acervo' => 'required|string|max:100',
            'status_acervo' => 'required|in:0,1',
        ]);

        // Verifica se o acervo já existe
        $acervoExistente = Acervo::where('nome_acervo', $request->input('nome_acervo'))->first();

        if ($acervoExistente) {
            return back()->with('error', 'Acervo já existe!');
        }

        // Insert acervo no banco
        $acervo = Acervo::create([
            'nome_acervo' => $request->input('nome_acervo'),
            'status_acervo' => $request->input('status_acervo'),
        ]);

        return back()->with('message', 'Acervo cadastrado com sucesso!');
    }

    
    /**
     * Atualiza dados do acervo no banco de dados.
     */
    public function update(Request $request, $id)
    {
        // Validação dos dados
        $request->validate([
            'acervo' => 'required|string|max:100',
            'situacao' => 'required|in:0,1',
        ]);
        // Buscar acervo pelo ID
        $acervo = Acervo::findOrFail($id);

        // Atualizar dados
        $acervo->update([
            'nome_acervo' => $request->acervo,
            'status_acervo' => $request->situacao,
        ]);

        // Redirecionar para index com mensagem de sucesso
        return redirect()->route('acervos.index')->with('message', 'Acervo atualizado com sucesso!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
