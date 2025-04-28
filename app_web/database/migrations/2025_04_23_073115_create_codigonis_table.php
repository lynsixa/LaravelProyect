<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodigonisTable extends Migration
{
    /**
     * Ejecutar la migración.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codigonis', function (Blueprint $table) {
            $table->id('id_codigo_nis');  // Clave primaria con nombre adecuado
            $table->string('descripcion', 100);  // Descripción con 100 caracteres como máximo
            $table->tinyInteger('disponibilidad');  // Campo para disponibilidad (0 o 1)
            $table->unsignedBigInteger('menu_id_menu');  // Clave foránea para 'menu'
            $table->unsignedBigInteger('mesa_id_mesa');  // Clave foránea para 'mesa'
            $table->unsignedBigInteger('eventos_id_eventos')->nullable();  // Clave foránea para 'eventos', puede ser null
            $table->foreign('menu_id_menu')->references('id_menu')->on('menu');  // Relación con la tabla 'menu'
            $table->foreign('mesa_id_mesa')->references('id_mesa')->on('mesa');  // Relación con la tabla 'mesa'
            $table->foreign('eventos_id_eventos')->references('id_eventos')->on('eventos');  // Relación con la tabla 'eventos'
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
        Schema::dropIfExists('codigonis');  // Elimina la tabla 'codigonis' en caso de revertir la migración
    }
}
