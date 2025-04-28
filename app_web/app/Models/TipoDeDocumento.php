<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoDeDocumento extends Model
{
    protected $table = 'tipo_de_documento'; // Aquí especificas el nombre exacto de la tabla en la base de datos
    protected $primaryKey = 'idTipodedocumento'; // Si tu clave primaria no es 'id'
    public $timestamps = false; // Si no tienes columnas de timestamps (created_at, updated_at), puedes ponerlo en false

    // Otros métodos y propiedades de tu modelo
}
