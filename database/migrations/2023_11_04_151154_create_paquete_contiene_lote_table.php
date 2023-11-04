<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaqueteContieneLoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paquete_contiene_lote', function (Blueprint $table) {
            $table->unsignedBigInteger('id_paquete')->primary();
            $table->unsignedBigInteger('id_lote');
            $table->unsignedBigInteger('id_almacen');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_paquete')->references('id')->on('paquetes');
            $table->foreign('id_lote')->references('id')->on('lotes');
            $table->foreign('id_almacen')->references('id')->on('almacenes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paquete_contiene_lote');
    }
}
