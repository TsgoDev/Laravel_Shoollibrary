<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acervo extends Model
{
    use HasFactory;

    // Definindo a tabela que a model irá utilizar
    protected $table = 'acervos';

    // Definindo os campos que podem ser atribuídos em massa (mass assignment)
    protected $fillable = ['nome_acervo', 'status_acervo'];

    // Adicionando cast para o campo 'status' para garantir que seja tratado como um inteiro
    protected $casts = [
        'status_acervo' => 'boolean', // Ativo/Indisponível
    ];
}
