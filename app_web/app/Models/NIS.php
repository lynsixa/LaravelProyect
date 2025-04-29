<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NIS extends Model
{
    protected $table = 'codigonis'; // Asegúrate de que el nombre de la tabla sea correcto

    protected $fillable = ['Descripcion', 'Mesa_idMesa', 'Menu_idMenu', 'Disponibilidad', 'Eventos_idEventos'];

    // Definir las relaciones
    public function mesa()
    {
        return $this->belongsTo(Mesa::class, 'Mesa_idMesa');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'Menu_idMenu');
    }

    public function evento()
    {
        return $this->belongsTo(Evento::class, 'Eventos_idEventos');
    }
}
