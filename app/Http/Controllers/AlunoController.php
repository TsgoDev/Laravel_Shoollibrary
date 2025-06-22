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
            ->get()
            ->map(function ($aluno) {
                $aluno->tem_observacao = !empty($aluno->observacoes);
                return $aluno;
            });

        return view('pages.alunos.index', compact('alunos'));
    }



    /**
     * Exibe a lista de todos os acervos inativos.
     */
    public function inativos()
    {
        $alunos = Aluno::where('status_aluno', 0)->orderBy('created_at', 'desc')->get()
            ->map(function ($aluno) {
                $aluno->tem_observacao = !empty($aluno->observacoes);
                return $aluno;
            });
        return view('pages.alunos.index', compact('alunos'));
    }




    /**
     * Cadastra um novo aluno no banco de dados.
     */
    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'matricula_aluno' => 'required|string|max:9',
            'turma_aluno' => 'required|string|max:5',
            'nome_aluno' => 'required|string|max:60',
            'telefone_aluno' => 'required|string|max:15',
            'email_aluno' => 'required|string|max:80',
            'status_aluno' => 'required|in:0,1',
            'observacoes' => 'nullable|string|max:200',
        ]);


        // Verifica se o matricula já existe
        $alunoExistente = Aluno::where('matricula_aluno', $request->input('matricula_aluno'))->first();

        if ($alunoExistente) {
            return back()->with('error', 'Essa matrícula já existe!');
        }

        // Verifica se o email já existe
        $alunoExistente = Aluno::where('email_aluno', $request->input('email_aluno'))->first();

        if ($alunoExistente) {
            return back()->with('error', 'Esse email já existe!');
        }

        // Verifica se o telefone já existe
        $alunoExistente = Aluno::where('telefone_aluno', $request->input('telefone_aluno'))->first();

        if ($alunoExistente) {
            return back()->with('error', 'Esse telefone já existe!');
        }
        // Insert aluno no banco
        $aluno = Aluno::create([
            'matricula_aluno' => $request->matricula_aluno,
            'turma_aluno' => $request->turma_aluno,
            'nome_aluno' => $request->nome_aluno,
            'telefone_aluno' => $request->telefone_aluno,
            'email_aluno' => $request->email_aluno,
            'status_aluno' => $request->status_aluno,
            'observacoes' => $request->observacoes,
        ]);

        // Redirecionar para index com mensagem de sucesso
        return redirect()->route('alunos.index')->with('message', 'Aluno cadastrado com sucesso!');
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
            'edit_status_aluno' => 'required|in:0,1',
            'edit_observacoes' => 'nullable|string|max:200',
        ]);

        // Buscar aluno pelo ID
        $aluno = Aluno::findOrFail($id);

        // Verifica se a matrícula já existe (excluindo o próprio registro)
        $alunoExistente = Aluno::where('matricula_aluno', $request->edit_matricula)
            ->where('id', '!=', $id)
            ->first();

        if ($alunoExistente) {
            return back()->with('error', 'Essa matrícula já existe!');
        }

        // Verifica se o email já existe (excluindo o próprio registro)
        $emailExistente = Aluno::where('email_aluno', $request->edit_email)
            ->where('id', '!=', $id)
            ->first();

        if ($emailExistente) {
            return back()->with('error', 'Esse email já existe!');
        }

        // Verifica se o telefone já existe (excluindo o próprio registro)
        $telefoneExistente = Aluno::where('telefone_aluno', $request->edit_telefone)
            ->where('id', '!=', $id)
            ->first();

        if ($telefoneExistente) {
            return back()->with('error', 'Esse telefone já existe!');
        }

        // Atualizar dados
        $aluno->update([
            'matricula_aluno' => $request->edit_matricula,
            'turma_aluno' => $request->edit_turma,
            'nome_aluno' => $request->edit_nome,
            'telefone_aluno' => $request->edit_telefone,
            'email_aluno' => $request->edit_email,
            'status_aluno' => $request->edit_status_aluno,
            'observacoes' => $request->edit_observacoes,
        ]);

        // Redirecionar para index com mensagem de sucesso
        return redirect()->route('alunos.index')->with('message', 'Aluno atualizado com sucesso!');
    }
}
