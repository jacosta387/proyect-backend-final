<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroLecturaTable extends Migration
{
    public function up()
    {
        Schema::create('registro_lectura', function (Blueprint $table) {
            $table->increments('id_lectura');
            $table->integer('id_usuario')->unsigned();
            // $table->integer('id_guardado')->unsigned();
            $table->integer('id_manga')->unsigned; 
            $table->integer('id_capitulo')->unsigned();
            // $table->date('fecha_lectura');
            // $table->boolean('leido');
            $table->timestamps();

            // $table->foreign('id_guardado')->references('id_guardado')->on('guardados');
            // $table->foreign('id_capitulo')->references('id_capitulo')->on('capitulo');
        });
    }

    public function down()
    {
        Schema::dropIfExists('registro_lectura');
    }
}
