<?php

namespace App\Http\Controllers;

use App\Models\NIS;
use App\Models\Mesa;
use App\Models\Menu;
use App\Models\Evento; // Asegúrate de importar el modelo Evento
use Illuminate\Http\Request;

class NISController extends Controller
{
    // Mostrar la lista de NIS
    public function index()
    {
        $nis = NIS::all();  // Obtener todos los NIS
        return view('admin.nis.index', compact('nis'));
    }

    // Mostrar el formulario para crear un nuevo NIS
    public function create()
    {
        // Obtener todas las mesas y menús
        $mesas = Mesa::all();  
        $menus = Menu::all();  
        // Obtener todos los eventos (si los tienes en una tabla llamada eventos)
        $eventos = Evento::all();  

        return view('admin.nis.create', compact('mesas', 'menus', 'eventos'));  // Ahora pasamos los eventos
    }

    // Guardar un nuevo NIS en la base de datos
    public function store(Request $request)
{
    // Validación de los datos del formulario
    $request->validate([
        'descripcion' => 'required|string|max:100',
        'numero_piso' => 'required|integer',
        'numero_mesa' => 'required|integer',
        'menu_id' => 'required|exists:menu,idMenu', // Asegúrate que el menu_id sea válido
    ]);

    // Obtener la mesa según el número de piso y número de mesa
    $mesa = Mesa::where('NumeroPiso', $request->numero_piso)
                ->where('NumeroMesa', $request->numero_mesa)
                ->first();

    // Si la mesa no existe, retornamos un error
    if (!$mesa) {
        return redirect()->back()->withErrors('La mesa no existe en la base de datos');
    }

    // Crear el NIS
    NIS::create([
        'Descripcion' => $request->descripcion,
        'Mesa_idMesa' => $mesa->idMesa,  // Asociamos la mesa
        'Menu_idMenu' => $request->menu_id,  // Asociamos el menú
        'Disponibilidad' => 1,  // Disponibilidad por defecto como 1 (está disponible)
    ]);

    // Redirigir al índice de NIS con un mensaje de éxito
    return redirect()->route('admin.nis.index')->with('success', 'NIS creado exitosamente');
}

    
}
