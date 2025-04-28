<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriasTable extends Migration
{
    /**
     * Ejecutar la migración.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id('id_categoria');  // Clave primaria con nombre adecuado
            $table->string('nombre', 105);  // Columna 'nombre' con límite de 105 caracteres
            $table->string('descripcion', 450);  // Columna 'descripcion' con límite de 450 caracteres
            $table->string('foto1', 350);  // Columna 'foto1' para la imagen principal
            $table->string('foto2', 350)->nullable();  // Columna 'foto2' opcional
            $table->string('foto3', 350)->nullable();  // Columna 'foto3' opcional
            $table->unsignedBigInteger('producto_id');  // Clave foránea referenciando la tabla 'productos'
            $table->foreign('producto_id')->references('id_producto')->on('productos');  // Relación con la tabla 'productos'
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
        Schema::dropIfExists('categorias');  // Elimina la tabla 'categorias'
    }
}
