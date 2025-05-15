<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    // Definindo a tabela que a model irá utilizar
    protected $table = 'alunos';

    // Definindo os campos que podem ser atribuídos em massa (mass assignment)
    protected $fillable = ['matricula_aluno', 'turma_aluno','nome_aluno','telefone_aluno','email_aluno','status_aluno'];

    // Adicionando cast para o campo 'status' para garantir que seja tratado como um inteiro
    protected $casts = [
        'status_aluno' => 'boolean',
    ];
}
