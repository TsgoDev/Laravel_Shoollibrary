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
        Schema::create('acervos', function (Blueprint $table) {
            $table->id(); // cria 'id' como primary key auto-increment
            $table->string('nome_acervo', 100);
            $table->boolean('status_acervo')->default(true); // Ativo/Indisponível
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acervos');
    }
};
