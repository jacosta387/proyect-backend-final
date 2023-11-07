<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentariosTable extends Migration
{
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->increments('id_comentario');
            $table->integer('id_usuario')->unsigned();
            $table->integer('id_capitulo')->unsigned();
            $table->integer('id_manga')->unsigned();
            $table->text('comentario');
            $table->date('fecha_comentario');
            $table->timestamps();

            $table->foreign('id_capitulo')->references('id_capitulo')->on('capitulo');
            $table->foreign('id_manga')->references('id_manga')->on('mangas');
        });
    }

    public function down()
    {
        Schema::dropIfExists('comentarios');
    }
}
