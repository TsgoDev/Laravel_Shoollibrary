<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;

    // Definindo a tabela que a model irá utilizar
    protected $table = 'autores';

    // Definindo os campos que podem ser atribuídos em massa (mass assignment)
    protected $fillable = ['nome_autor', 'status_autor'];

    // Adicionando cast para o campo 'status' para garantir que seja tratado como um inteiro
    protected $casts = [
        'status_autor' => 'boolean',
    ];

    // RELACIONAMENTOS

    // Autor pode ter várias obras
    public function obras()
    {
        return $this->belongsToMany(Obra::class, 'autor_obra');
    }
}
