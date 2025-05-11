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
        if (!Schema::hasTable('generos')) {
            Schema::create('generos', function (Blueprint $table) {
                $table->id(); // cria 'id' como primary key auto-increment
                $table->string('nome_genero', 100);
                $table->boolean('status_genero')->default(true); // Ativo/Indisponível
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('generos');
    }
};
