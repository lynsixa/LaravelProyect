<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;

class CalendarioController extends Controller
{
    public function index()
    {
        return view('admin.calendario.index'); // Retorna la vista con el calendario
    }

    public function eventos()
    {
        $eventos = Evento::select(
            'idEventos as id',
            'Titulo as title',
            'Fecha_Evento as start',
            'Descripcion as description'
        )->get();

        return response()->json($eventos); // Devuelve los eventos en formato JSON
    }
}
