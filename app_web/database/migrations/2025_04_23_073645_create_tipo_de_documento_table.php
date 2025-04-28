<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoDeDocumentoTable extends Migration
{
    /**
     * Ejecutar la migración.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_de_documentos', function (Blueprint $table) {
            $table->id('id_tipo_de_documento');  // Clave primaria con nombre adecuado
            $table->string('descripcion', 45);  // Descripción del tipo de documento, con un límite de 45 caracteres
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
        Schema::dropIfExists('tipo_de_documentos');  // Elimina la tabla 'tipo_de_documentos' en caso de revertir la migración
    }
}
