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
        Schema::create('emprestimos', function (Blueprint $table) {
            $table->id();
            $table->string('matricula_aluno', 9);
            $table->string('turma_aluno', 5);
            $table->string('nome_aluno', 60);
            $table->string('titulo_livro', 100);
            $table->date('data_emprestimo');
            $table->date('data_devolucao');
            $table->enum('status_emprestimo', ['Em andamento', 'Devolvido', 'Atrasado'])->default('Em andamento');
            $table->string('observacoes', 200)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emprestimos');
    }
};
