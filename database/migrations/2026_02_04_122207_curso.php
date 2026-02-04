<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo', ['online', 'presencial'])->default('online');
            $table->string('nome', 20);
            $table->text('descricao')->nullable();
            $table->integer('vagas');
            $table->integer('preco')->default(0);
            $table->string('data_inicio');
            $table->string('data_fim');
            $table->string('data_max_matricula');
            $table->boolean('ativo')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursos');
    }
};
