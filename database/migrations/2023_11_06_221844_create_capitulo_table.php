<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCapituloTable extends Migration
{
    public function up()
    {
        Schema::create('capitulo', function (Blueprint $table) {
            $table->increments('id_capitulo');
            $table->integer('numero_cap');
            $table->integer('id_manga')->unsigned();
            $table->string('nombre');
            $table->timestamps();

            $table->foreign('id_manga')->references('id_manga')->on('mangas');
        });
    }

    public function down()
    {
        Schema::dropIfExists('capitulo');
    }
}
