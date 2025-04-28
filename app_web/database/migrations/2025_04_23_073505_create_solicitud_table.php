<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudTable extends Migration
{
    /**
     * Ejecutar la migración.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id('id_solicitud');  // Clave primaria con nombre adecuado
            $table->string('descripcion', 405);  // Descripción de la solicitud con un límite de 405 caracteres
            $table->string('informe', 450)->nullable();  // Informe de la solicitud (opcional, hasta 450 caracteres)
            $table->tinyInteger('despachado');  // Estado de despacho (0 o 1)
            $table->unsignedBigInteger('entrega_id_entrega')->nullable();  // Clave foránea a 'entrega', opcional
            // Relación foránea
            $table->foreign('entrega_id_entrega')->references('id_entrega')->on('entregas');
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
        Schema::dropIfExists('solicitudes');  // Elimina la tabla 'solicitudes' en caso de revertir la migración
    }
}
