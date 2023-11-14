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
        Schema::create('registro_lecturas', function (Blueprint $table) {
            $table->increments('id_lectura');
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_manga');
            $table->integer('id_capitulo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registro_lecturas');
    }
};
