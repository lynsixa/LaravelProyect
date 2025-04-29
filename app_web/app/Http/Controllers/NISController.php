<?php

namespace App\Http\Controllers;

use App\Models\NIS;
use App\Models\Mesa;
use App\Models\Menu;
use App\Models\Evento;
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
        // Obtener todas las mesas, menús y eventos
        $mesas = Mesa::all();
        $menus = Menu::all();
        $eventos = Evento::all();

        return view('admin.nis.create', compact('mesas', 'menus', 'eventos'));
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

        // Verificar si la mesa ya existe
        $mesa = Mesa::where('NumeroPiso', $request->numero_piso)
                    ->where('NumeroMesa', $request->numero_mesa)
                    ->first();

        if (!$mesa) {
            // Si la mesa no existe, crearla
            $mesa = Mesa::create([
                'NumeroPiso' => $request->numero_piso,
                'NumeroMesa' => $request->numero_mesa,
            ]);
        }

        // Crear el NIS
        NIS::create([
            'Descripcion' => $request->descripcion,
            'Mesa_idMesa' => $mesa->idMesa,  // Asociamos la mesa
            'Menu_idMenu' => $request->menu_id,  // Asociamos el menú
            'Eventos_idEventos' => $request->eventos_id, // Asociamos el evento (si existe)
            'Disponibilidad' => 1,  // Disponibilidad por defecto como 1 (está disponible)
        ]);

        // Redirigir al índice de NIS con un mensaje de éxito
        return redirect()->route('admin.nis.index')->with('success', 'NIS creado exitosamente');
    }
}
