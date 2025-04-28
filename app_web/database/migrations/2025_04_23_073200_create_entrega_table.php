<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntregaTable extends Migration
{
    /**
     * Ejecutar la migración.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entregas', function (Blueprint $table) {
            $table->id('id_entrega');  // Clave primaria con nombre adecuado
            $table->string('descripcion', 450)->nullable();  // Descripción opcional con un límite de 450 caracteres
            $table->boolean('entregado');  // Cambié 'tinyInteger' a 'boolean' si el valor solo es 0 o 1
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
        Schema::dropIfExists('entregas');  // Elimina la tabla 'entregas' en caso de revertir la migración
    }
}
