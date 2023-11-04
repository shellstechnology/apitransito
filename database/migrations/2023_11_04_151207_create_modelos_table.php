<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modelos', function (Blueprint $table) {
            $table->id();
            $table->string('modelo', 50)->notnull();
            $table->unsignedBigInteger('id_marca');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_marca')->references('id')->on('marcas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modelos');
    }
}
