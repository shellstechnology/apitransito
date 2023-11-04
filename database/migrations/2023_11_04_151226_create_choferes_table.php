<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChoferesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('choferes', function (Blueprint $table) {
            $table->unsignedBigInteger('id_usuarios')->primary();
            $table->string('licencia_de_conducir', 10)->unique();
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
        Schema::dropIfExists('choferes');
    }
}
