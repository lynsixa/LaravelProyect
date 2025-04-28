<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuario';
    protected $primaryKey = 'idUsuario';
    public $timestamps = true; // created_at y updated_at automáticos
    
    protected $fillable = [
        'Nombres',
        'Apellidos',
        'Documento',
        'Correo',
        'Contraseña',
        'FechaDeNacimiento',
        'token',
        'token_password',
        'password_request',
        'Tipo_de_documento_idTipodedocumento',
        'Roles_idRoles',
        'CodigoNis_idCodigoNis',
    ];

    public $incrementing = true;
    protected $keyType = 'int';
}
