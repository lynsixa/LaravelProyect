<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoTable extends Migration
{
    /**
     * Ejecutar la migración.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id('id_producto');  // Clave primaria con nombre adecuado
            $table->decimal('precio', 10, 3);  // Precio con 10 dígitos en total y 3 decimales
            $table->tinyInteger('disponibilidad');  // Disponibilidad como tinyInteger
            $table->integer('cantidad');  // Cantidad de producto
            $table->unsignedBigInteger('codigonis_id_codigonis')->nullable();  // Clave foránea a 'codigonis'
            $table->unsignedBigInteger('categoria_id_categoria')->nullable();  // Clave foránea a 'categoria'
            // Relaciones foráneas
            $table->foreign('codigonis_id_codigonis')->references('id_codigonis')->on('codigonis');
            $table->foreign('categoria_id_categoria')->references('id_categoria')->on('categorias');
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
        Schema::dropIfExists('productos');  // Elimina la tabla 'productos' en caso de revertir la migración
    }
}
