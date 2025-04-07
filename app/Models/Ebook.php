<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ebook extends Model
{
    use HasFactory;

    // Definindo a tabela que a model irá utilizar
    protected $table = 'obras';

    // Definindo os campos que podem ser atribuídos em massa (mass assignment)
    protected $fillable = ['isbn', 'titulo', 'autor', 'edicao', 'edicao', 'ano','copia','acervo','genero','editora','situacao'];
}
