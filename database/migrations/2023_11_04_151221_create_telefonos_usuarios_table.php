<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTelefonosUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telefonos_usuarios', function (Blueprint $table) {
            $table->unsignedBigInteger('id_usuarios');
            $table->string('telefono', 15)->unique();
            $table->timestamps();
            $table->softDeletes();
            $table->primary(['id_usuarios', 'telefono']);
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
        Schema::dropIfExists('telefonos_usuarios');
    }
}
