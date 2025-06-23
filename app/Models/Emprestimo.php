<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    use HasFactory;

    // Definindo a tabela que a model irá utilizar
    protected $table = 'emprestimos';

    // Definindo os campos que podem ser atribuídos em massa (mass assignment)
    protected $fillable = [
        'aluno_id',
        'obra_id',
        'data_emprestimo',
        'data_devolucao',
        'status_emprestimo',
        'observacoes'
    ];

    protected $casts = [
        'data_emprestimo' => 'date',
        'data_devolucao' => 'date',
    ];

    // Relacionamentos
    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }

    public function obra()
    {
        return $this->belongsTo(Obra::class);
    }
}
