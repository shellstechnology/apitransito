<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChoferConduceCamionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chofer_conduce_camion', function (Blueprint $table) {
            $table->unsignedBigInteger('id_chofer')->primary();
            $table->string('matricula_camion', 10)->unique();
            $table->datetime('fecha_y_hora')->nullable();;
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_chofer')->references('id_usuarios')->on('choferes');
            $table->foreign('matricula_camion')->references('matricula')->on('camiones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chofer_conduce_camion');
    }
}
