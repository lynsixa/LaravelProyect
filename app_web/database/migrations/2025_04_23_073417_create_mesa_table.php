<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMesaTable extends Migration
{
    /**
     * Ejecutar la migración.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mesas', function (Blueprint $table) {
            $table->id('id_mesa');  // Clave primaria con nombre adecuado
            $table->integer('numero_piso');  // Número de piso
            $table->integer('numero_mesa');  // Número de mesa
            $table->timestamps();  // Tiempos de creación y actualización automáticos
        });
    }

    /**
     * Deshacer la migración.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mesas');  // Elimina la tabla 'mesas' en caso de revertir la migración
    }
}
