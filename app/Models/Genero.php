<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    use HasFactory;

    // Definindo a tabela que a model irá utilizar
    protected $table = 'generos';

    // Definindo os campos que podem ser atribuídos em massa (mass assignment)
    protected $fillable = ['nome_genero', 'status_genero'];

    // Adicionando cast para o campo 'status' para garantir que seja tratado como um inteiro
    protected $casts = [
        'status_genero' => 'boolean', // Ativo/Indisponível
    ];
}
