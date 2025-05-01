<?php

// app/Models/Categoria.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categoria';

    protected $fillable = [
        'Nombre', 'Descripcion', 'Foto1', 'Foto2', 'Foto3', 'Producto_idProducto'
    ];

    // Relación inversa con Producto
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'Producto_idProducto');
    }
}
