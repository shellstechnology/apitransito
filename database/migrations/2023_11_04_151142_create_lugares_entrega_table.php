<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLugaresEntregaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lugares_entrega', function (Blueprint $table) {
            $table->id();
            $table->float('longitud', 16)->notnull();
            $table->float('latitud', 16)->notnull();
            $table->string('direccion', 100);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lugares_entrega');
    }
}
