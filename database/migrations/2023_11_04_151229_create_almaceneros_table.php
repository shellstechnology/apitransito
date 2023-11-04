<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlmacenerosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('almaceneros', function (Blueprint $table) {
            $table->unsignedBigInteger('id_usuarios')->primary();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_usuarios')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('almaceneros');
    }
}
