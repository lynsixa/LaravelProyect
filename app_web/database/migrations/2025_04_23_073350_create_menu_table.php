<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuTable extends Migration
{
    /**
     * Ejecutar la migración.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id('id_menu');  // Clave primaria con nombre adecuado
            $table->string('descripcion', 400);  // Descripción con un límite de 400 caracteres
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
        Schema::dropIfExists('menus');  // Elimina la tabla 'menus' en caso de revertir la migración
    }
}
