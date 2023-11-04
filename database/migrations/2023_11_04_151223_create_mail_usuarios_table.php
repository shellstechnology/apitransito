<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mail_usuarios', function (Blueprint $table) {
            $table->unsignedBigInteger('id_usuarios');
            $table->string('mail', 50)->unique();
            $table->timestamps();
            $table->softDeletes();
            $table->primary(['id_usuarios', 'mail']);
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
        Schema::dropIfExists('mail_usuarios');
    }
}
