<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdenTable extends Migration
{
    /**
     * Ejecutar la migración.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes', function (Blueprint $table) {
            $table->id('id_orden');  // Clave primaria con nombre adecuado
            $table->string('token_cliente', 450)->nullable();  // Token del cliente (opcional)
            $table->string('descripcion', 450);  // Descripción de la orden
            $table->float('precio_final');  // Precio final de la orden
            $table->dateTime('fecha');  // Fecha y hora de la orden
            $table->unsignedBigInteger('producto_id_producto')->nullable();  // Clave foránea para 'producto', opcional
            $table->unsignedBigInteger('solicitud_id_solicitud')->nullable();  // Clave foránea para 'solicitud', opcional
            $table->integer('cantidad')->default(1);  // Cantidad de productos (por defecto 1)
            $table->unsignedBigInteger('usuario_id_usuario')->nullable();  // Clave foránea para 'usuario', opcional
            // Relaciones foráneas
            $table->foreign('producto_id_producto')->references('id_producto')->on('productos');
            $table->foreign('solicitud_id_solicitud')->references('id_solicitud')->on('solicitudes');
            $table->foreign('usuario_id_usuario')->references('id_usuario')->on('usuarios');
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
        Schema::dropIfExists('ordenes');  // Elimina la tabla 'ordenes' en caso de revertir la migración
    }
}
