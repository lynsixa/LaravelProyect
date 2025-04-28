<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Ejecutar la migración.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('id_usuario');  // Clave primaria con nombre adecuado
            $table->string('nombres', 45);  // Nombres del usuario, con un límite de 45 caracteres
            $table->string('apellidos', 45);  // Apellidos del usuario, con un límite de 45 caracteres
            $table->string('documento', 35);  // Documento de identificación, con un límite de 35 caracteres
            $table->string('correo', 100);  // Correo electrónico, con un límite de 100 caracteres
            $table->binary('contraseña');  // Contraseña almacenada como binario
            $table->date('fecha_de_nacimiento');  // Fecha de nacimiento
            $table->string('token', 40);  // Token de autenticación con un límite de 40 caracteres
            $table->string('token_password', 100)->nullable();  // Token para cambio de contraseña, opcional
            $table->integer('password_request')->default(0);  // Contador de solicitudes de cambio de contraseña

            // Relaciones foráneas
            $table->unsignedBigInteger('tipo_de_documento_id_tipo_de_documento')->nullable();  // Relación con tipo de documento
            $table->unsignedBigInteger('roles_id_roles');  // Relación con roles
            $table->unsignedBigInteger('codigonis_id_codigonis')->nullable();  // Relación con código Nis

            // Definición de claves foráneas
            $table->foreign('tipo_de_documento_id_tipo_de_documento')->references('id_tipodedocumento')->on('tipo_de_documentos');
            $table->foreign('roles_id_roles')->references('id_roles')->on('roles');
            $table->foreign('codigonis_id_codigonis')->references('id_codigonis')->on('codigonis');

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
        Schema::dropIfExists('usuarios');  // Elimina la tabla 'usuarios' en caso de revertir la migración
    }
}
