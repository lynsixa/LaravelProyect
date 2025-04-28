<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuario'; // Asegúrate de que el nombre de la tabla sea correcto
    protected $primaryKey = 'idUsuario'; // Asegúrate de que el campo ID sea correcto

    protected $fillable = [
        'Nombres', 
        'Apellidos', 
        'Documento', 
        'Correo', 
        'Contraseña', 
        'FechaDeNacimiento',
        'Tipo_de_documento_idTipodedocumento',
        'Roles_idRoles',
    ];

    // Si deseas usar Timestamps, asegúrate de que el campo `created_at` y `updated_at` estén en la tabla
    public $timestamps = true;
}
