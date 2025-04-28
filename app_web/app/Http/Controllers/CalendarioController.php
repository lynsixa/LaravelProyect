<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;

class CalendarioController extends Controller
{
    // Método para mostrar la vista del calendario
    public function index()
    {
        return view('admin.calendario.index');
    }

    // Método para obtener los eventos y enviarlos como JSON
    public function eventos()
    {
        $eventos = Evento::select('idEventos as id', 'Titulo as title', 'Fecha_Evento as start', 'Descripcion as description')->get();
        return response()->json($eventos);
    }
}
