<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCamionLlevaLoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camion_lleva_lote', function (Blueprint $table) {
            $table->unsignedBigInteger('id_lote')->primary()->notnull();
            $table->string('matricula', 10)->notnull();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_lote')->references('id')->on('lotes');
            $table->foreign('matricula')->references('matricula')->on('camiones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('camion_lleva_lote');
    }
}
