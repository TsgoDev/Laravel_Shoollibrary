<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emprestimo;

class EmprestimoController extends Controller
{
    /**
     * Exibe a lista de todos os autores ativos cadastrados, ordenados pela data de criação.
     */
    public function index()
    {
        $emprestimos = Emprestimo::where('status_emprestimo', true) // apenas ativos
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.emprestimos.index', compact('emprestimos'));
    }



    /**
     * Exibe a lista de todos os autores inativos.
     */
    public function inativos()
    {
        $emprestimos = Emprestimo::where('status_emprestimo', 0)->orderBy('created_at', 'desc')->get();
        return view('pages.emprestimos.index', compact('emprestimos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validação dos dados
        $request->validate([
            'matricula_aluno' => 'required|string|max:9',
            'turma_aluno' => 'required|string|max:5',
            'nome_aluno' => 'required|string|max:60',
            'titulo_livro' => 'required|string|max:100',
            'data_emprestimo' => 'required|date',
            'data_devolucao' => 'required|date',
            'status_emprestimo' => 'required|string|max:100',
            'observacoes' => 'nullable|string|max:200',
        ]);

        // Insert empréstimo no banco
        $emprestimo = Emprestimo::create([
            'matricula_aluno' => $request->matricula_aluno,
            'turma_aluno' => $request->turma_aluno,
            'nome_aluno' => $request->nome_aluno,
            'titulo_livro' => $request->titulo_livro,
            'data_emprestimo' => $request->data_emprestimo,
            'data_devolucao' => $request->data_devolucao,
            'status_emprestimo' => $request->status_emprestimo,
            'observacoes' => $request->observacoes,
        ]);

        // Redirecionar para index com mensagem de sucesso
        return redirect()->route('emprestimos.index')->with('message', 'Empréstimo cadastrado com sucesso!');


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
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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
