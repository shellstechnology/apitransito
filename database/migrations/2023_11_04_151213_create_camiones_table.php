<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCamionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camiones', function (Blueprint $table) {
            $table->string('matricula', 10)->primary()->notnull();
            $table->unsignedBigInteger('id_estado_c');
            $table->unsignedBigInteger('id_modelo_marca');
            $table->float('volumen_max_l')->notnull();
            $table->float('peso_max_kg')->notnull();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_estado_c')->references('id')->on('estados_c');
            $table->foreign('id_modelo_marca')->references('id')->on('modelos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('camiones');
    }
}
