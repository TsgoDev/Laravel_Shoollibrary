<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('editoras', function (Blueprint $table) {
            $table->id(); // cria 'id' como primary key auto-increment
            $table->string('nome_editora', 100);
            $table->string('cidade_editora', 70);
            $table->string('estado_editora', 2);
            $table->boolean('status_editora')->default(true); // Ativo/Indisponível
            $table->timestamps();
        
            // Índice único para evitar duplicatas com mesma combinação
            $table->unique(['nome_editora', 'cidade_editora', 'estado_editora'], 'editoras_unique_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('editoras');
    }
};
