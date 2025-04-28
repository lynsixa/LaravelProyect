<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTable extends Migration
{
    /**
     * Ejecutar la migración.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id('id_evento');  // Clave primaria con nombre adecuado
            $table->string('titulo', 255);  // Título del evento, con límite de 255 caracteres
            $table->string('descripcion', 50);  // Descripción del evento, con límite de 50 caracteres
            $table->dateTime('fecha_evento');  // Fecha y hora del evento
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
        Schema::dropIfExists('eventos');  // Elimina la tabla 'eventos' en caso de revertir la migración
    }
}
