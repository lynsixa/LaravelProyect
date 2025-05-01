<?php

// app/Models/Producto.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'producto';

    protected $fillable = [
        'Precio', 'Disponibilidad', 'Cantidad', 'CodigoNis_idCodigoNis', 'Categoria_idCategoria'
    ];

    // Relación con Categoria
    public function categoria()
    {
        return $this->hasOne(Categoria::class, 'Producto_idProducto');
    }
}
