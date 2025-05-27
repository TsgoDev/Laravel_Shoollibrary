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
        $table->integer('edicao');
        $table->integer('ano');
        $table->integer('copia');
        $table->string('observacoes', 200)->nullable();
        $table->boolean('status_obra')->default(true); // Ativo/Indisponível
        $table->timestamps();


         // Foreign Keys
        $table->foreignId('autor_id')->constrained('autores')->onDelete('restrict');
        $table->foreignId('acervo_id')->constrained('acervos')->onDelete('restrict');
        $table->foreignId('genero_id')->constrained('generos')->onDelete('restrict');
        $table->foreignId('editora_id')->constrained('editoras')->onDelete('restrict');
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
