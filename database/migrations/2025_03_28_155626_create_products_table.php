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
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Chave primária
            $table->string('name'); // Nome do produto
            $table->text('description'); // Descrição
            $table->decimal('price', 10, 2); // Preço
            $table->string('image')->nullable(); // Imagem (opcional)
            $table->boolean('status')->default(true); // Ativo/Inativo
            $table->timestamps(); // created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
