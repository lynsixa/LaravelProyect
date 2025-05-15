<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\CodigoNis;

class CodigoNisController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!Session::has('idUsuario')) {
                return redirect()->route('login');
            }
            return $next($request);
        });
    }

    public function index()
    {
        if (Session::has('codigo')) {
            return redirect()->route('usuarios.codigonis.indexscan');
        }
        return view('usuarios.codigonis.index');
    }

    public function validarCodigo(Request $request)
    {
        $request->validate([
            'codigo' => 'required|string',
        ]);

        $codigoIngresado = $request->codigo;

        // Buscar código en la tabla
        $codigo = CodigoNis::where('Descripcion', $codigoIngresado)->first();

        if (!$codigo) {
            return back()->with('mensaje', 'Código no existe');
        }

        if ($codigo->Disponibilidad == 0) {
            return back()->with('mensaje', 'Código ya utilizado, no puede ingresar');
        }

        // Código disponible: marcar como usado
        $codigo->Disponibilidad = 0;
        $codigo->save();

        // Guardar código en sesión
        Session::put('codigo', $codigoIngresado);
        Session::put('numeroMesa', $codigo->Mesa_idMesa);
        Session::put('numeroPiso', ''); // Si tienes campo para piso, asigna aquí

        return redirect()->route('usuarios.codigonis.indexscan');
    }

    public function indexScan()
    {
        return view('usuarios.codigonis.indexscan');
    }

    public function cerrarSesion()
    {
        Session::flush();
        return redirect()->route('login');
    }
}
