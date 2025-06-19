<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adquirircursos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_curso')
            ->nullable()
            ->constrained('facursos')
            ->cascadeOnUpdate()
            ->nullOnDelete();
            $table->foreignId('id_estudiante')
            ->nullable()
            ->constrained('estudiantes')
            ->cascadeOnUpdate()
            ->nullOnDelete();
            $table->date('fecha');
            $table->String('estado_adquirircurso');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adquirircursos');
    }
};
