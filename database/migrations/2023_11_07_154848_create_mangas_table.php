<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('mangas', function (Blueprint $table) {
            $table->increments('id_manga');
            $table->string('titulo');
            $table->integer('id_genero')->unsigned();
            $table->text('descripcion');
            $table->string('portada');
            $table->date('fecha_lanzamiento');
            $table->boolean('publicado');
            $table->string('link');
            $table->timestamps();

            //$table->foreign('id_genero')->references('id_genero')->on('genero');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mangas');
    }
};
