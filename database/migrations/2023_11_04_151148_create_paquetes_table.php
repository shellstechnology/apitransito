<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaquetesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paquetes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50)->notnull();
            $table->float('volumen_l', 8)->notnull();
            $table->float('peso_kg', 8)->notnull();
            $table->unsignedBigInteger('id_estado_p');
            $table->unsignedBigInteger('id_caracteristica_paquete');
            $table->unsignedBigInteger('id_producto');
            $table->unsignedBigInteger('id_lugar_entrega');
            $table->string('nombre_destinatario', 100)->notnull();
            $table->string('nombre_remitente', 100)->notnull();
            $table->datetime('fecha_de_entrega')->nullable();;
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('id_estado_p')->references('id')->on('estados_p');
            $table->foreign('id_caracteristica_paquete')->references('id')->on('caracteristicas');
            $table->foreign('id_producto')->references('id')->on('productos');
            $table->foreign('id_lugar_entrega')->references('id')->on('lugares_entrega');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paquetes');
    }
}
