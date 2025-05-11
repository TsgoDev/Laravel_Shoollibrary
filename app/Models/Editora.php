<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Editora extends Model
{
    use HasFactory;

    // Definindo a tabela que a model irá utilizar
    protected $table = 'editoras';

    // Definindo os campos que podem ser atribuídos em massa (mass assignment)
    protected $fillable = ['nome_editora', 'cidade_editora', 'estado_id', 'status_editora'];

    // Adicionando cast para o campo 'status' para garantir que seja tratado como um inteiro
    protected $casts = [
        'status_editora' => 'boolean', // Ativo/Indisponível
    ];

    // Relacionamento com a tabela estados
    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }
}
