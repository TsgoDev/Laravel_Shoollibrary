<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    /**
     * Exibe a lista de todos os acervos ativos cadastrados, ordenados pela data de criação.
     */
    public function index()
    {
        $alunos = Aluno::where('status_aluno', true) // apenas ativos
            ->orderBy('created_at', 'desc')
            ->get();

        return view('alunos.index', compact('alunos'));
    }



    /**
     * Exibe a lista de todos os acervos inativos.
     */
    public function inativos()
    {
        $alunos = Aluno::where('status_aluno', 0)->orderBy('created_at', 'desc')->get();
        return view('alunos.index', compact('alunos'));
    }



    /**
     * Atualiza dados do aluno no banco de dados.
     */
    public function update(Request $request, $id)
    {
        // Validação dos dados
        $request->validate([
            'edit_matricula' => 'required|string|max:9',
            'edit_turma' => 'required|string|max:5',
            'edit_nome' => 'required|string|max:60',
            'edit_telefone' => 'required|string|max:15',
            'edit_email' => 'required|string|max:80',
            'status_aluno' => 'required|in:0,1',
        ]);

        // Buscar aluno pelo ID
        $aluno = Aluno::findOrFail($id);

        // Verifica se o matricula já existe (excluindo o próprio registro)
        $alunoExistente = Aluno::where('matricula_aluno', $request->edit_matricula)
            ->where('id', '!=', $id)
            ->first();

        if ($alunoExistente) {
            return back()->with('error', 'Matricula já existe!');
        }

        // Atualizar dados
        $aluno->update([
            'matricula_aluno' => $request->edit_matricula,
            'turma_aluno' => $request->edit_turma,
            'nome_aluno' => $request->edit_nome,
            'telefone_aluno' => $request->edit_telefone,
            'email_aluno' => $request->edit_email,
            'status_aluno' => $request->status_aluno,
        ]);


        // Redirecionar para index com mensagem de sucesso
        return redirect()->route('alunos.index')->with('message', 'Aluno atualizado com sucesso!');
    }
}
