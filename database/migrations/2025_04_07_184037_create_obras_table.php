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
        Schema::create('obras', function (Blueprint $table) {
            $table->id();
            $table->string('isbn', 20)->nullable();
            $table->string('titulo', 100);
            $table->string('autor', 100)->nullable(); // ou use relação com tabela autores
            $table->integer('edicao')->nullable();
            $table->year('ano')->nullable();
            $table->integer('copia');
            $table->string('acervo', 20)->nullable(); 
            $table->string('genero', 100)->nullable(); 
            $table->string('editora', 60)->nullable(); 
            $table->string('situacao', 15)->nullable();
            $table->timestamps(); // cria `created_at` e `updated_at`
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obras');
    }
};
