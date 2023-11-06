<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalificacionTable extends Migration
{
    public function up()
    {
        Schema::create('calificacion', function (Blueprint $table) {
            $table->increments('id_calificacion');
            $table->integer('id_manga')->unsigned();
            $table->integer('id_usuario')->unsigned();
            $table->integer('calificacion');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('calificacion');
    }
}
