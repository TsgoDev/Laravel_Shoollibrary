<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Definindo a tabela que a model irá utilizar
    protected $table = 'products';

    // Definindo os campos que podem ser atribuídos em massa (mass assignment)
    protected $fillable = ['name', 'description', 'category', 'price', 'image', 'status'];

    // Adicionando cast para o campo 'status' para garantir que seja tratado como um inteiro
    protected $casts = [
        'status' => 'boolean',
    ];

}
