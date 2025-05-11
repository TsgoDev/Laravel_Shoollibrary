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
            $table->id();
            $table->string('nome_editora', 100);
            $table->string('cidade_editora', 70);

            // Substituir 'estado_editora' por 'estado_id'
            $table->foreignId('estado_id')->constrained('estados')->onDelete('restrict');

            $table->boolean('status_editora')->default(true);
            $table->timestamps();

            $table->unique(['nome_editora', 'cidade_editora', 'estado_id'], 'editoras_unique_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('editora');
    }
};
