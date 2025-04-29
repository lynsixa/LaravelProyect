<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NIS extends Model
{
    use HasFactory;

    // Especifica el nombre de la tabla, porque no sigue la convención de Laravel
    protected $table = 'codigonis';  // Nombre correcto de la tabla

    // Definir qué campos pueden ser asignados masivamente (mass assignment)
    protected $fillable = ['Descripcion', 'Mesa_idMesa', 'Menu_idMenu', 'Disponibilidad', 'Eventos_idEventos'];

    // Si no quieres usar timestamps (created_at, updated_at), establece false
    public $timestamps = false;  // En caso de que tu tabla no use estos campos
}
