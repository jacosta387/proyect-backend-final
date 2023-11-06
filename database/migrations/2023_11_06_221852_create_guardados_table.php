<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuardadosTable extends Migration
{
    public function up()
    {
        Schema::create('guardados', function (Blueprint $table) {
            $table->increments('id_guardado');
            $table->integer('id_usuario')->unsigned();
            $table->integer('id_manga')->unsigned();
            $table->date('fecha_guardado');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('guardados');
    }
}
