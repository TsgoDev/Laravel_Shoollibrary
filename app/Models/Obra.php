<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obra extends Model
{
    use HasFactory;

    // Nome da tabela
    protected $table = 'obras';

    // Campos que podem ser preenchidos em massa
    protected $fillable = [
        'isbn',
        'titulo',
        'edicao',
        'ano',
        'copia',
        'observacoes',
        'status_obra',
        'autor_id',
        'acervo_id',
        'genero_id',
        'editora_id'
    ];

    // Casts
    protected $casts = [
        'status_obra' => 'boolean',
    ];

    // RELACIONAMENTOS

    // Obra pertence a um autor
    public function autor()
    {
        return $this->belongsTo(Autor::class);
    }

    // Obra pertence a um acervo
    public function acervo()
    {
        return $this->belongsTo(Acervo::class);
    }

    // Obra pertence a um gênero
    public function genero()
    {
        return $this->belongsTo(Genero::class);
    }

    // Obra pertence a uma editora
    public function editora()
    {
        return $this->belongsTo(Editora::class);
    }

}
