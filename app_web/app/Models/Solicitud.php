<?php

// app/Models/Solicitud.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;

    protected $table = 'solicitud';  // Nombre de la tabla en la base de datos
    protected $primaryKey = 'idSolicitud'; // Clave primaria

    protected $fillable = ['Descripcion', 'Informe', 'Despachado', 'Entrega_idEntrega']; // Campos asignables masivamente

    public $timestamps = false; // Desactivar las marcas de tiempo (created_at, updated_at)
}
