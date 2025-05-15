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
        if (!Schema::hasTable('alunos')) {
            Schema::create('alunos', function (Blueprint $table) {
            $table->id(); // cria 'id' como primary key auto-increment
            $table->string('matricula_aluno',9);
            $table->string('turma_aluno',5);
            $table->string('nome_aluno',60);
            $table->string('telefone_aluno',15);
            $table->string('email_aluno',80);
            $table->boolean('status_aluno')->default(true); // Ativo/Indisponível
            $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alunos');
    }
};
