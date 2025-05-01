<?php
// app/Http/Controllers/ProductoController.php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // Mostrar todos los productos con sus categorías
    public function index()
    {
        $productos = Producto::with('categoria')->get(); // Cargar productos con categorías
        return view('admin.producto.index', compact('productos'));
    }

    // Mostrar el formulario para crear un producto
    public function create()
    {
        // Obtener todas las categorías disponibles
        return view('admin.producto.create');
    }

    // Almacenar un nuevo producto
    public function store(Request $request)
    {
        $request->validate([
            'precio' => 'required|numeric',
            'cantidad' => 'required|integer',
            'nombre_categoria' => 'required|string',
            'descripcion' => 'required|string',
            'imagen1' => 'required|image',
            'imagen2' => 'nullable|image',
            'imagen3' => 'nullable|image',
        ]);

        // Guardar el producto
        $producto = Producto::create([
            'Precio' => $request->precio,
            'Disponibilidad' => $request->cantidad > 0 ? 1 : 0,
            'Cantidad' => $request->cantidad,
            'CodigoNis_idCodigoNis' => null, // Aquí lo puedes actualizar si es necesario
        ]);

        // Subir las imágenes
        $imagenes = [];
        $carpetaDestino = public_path('fotosProductos/');

        for ($i = 1; $i <= 3; $i++) {
            if ($request->hasFile("imagen$i")) {
                $nombreArchivo = time() . "_img{$i}_" . $request->file("imagen$i")->getClientOriginalName();
                $rutaFinal = $carpetaDestino . $nombreArchivo;

                if ($request->file("imagen$i")->move($carpetaDestino, $nombreArchivo)) {
                    $imagenes[] = $nombreArchivo;
                } else {
                    $imagenes[] = null;
                }
            } else {
                $imagenes[] = null;
            }
        }

        // Crear la categoría asociada al producto
        Categoria::create([
            'Nombre' => $request->nombre_categoria,
            'Descripcion' => $request->descripcion,
            'Foto1' => $imagenes[0],
            'Foto2' => $imagenes[1],
            'Foto3' => $imagenes[2],
            'Producto_idProducto' => $producto->id, // Asociamos la categoría al producto
        ]);

        return redirect()->route('admin.producto.index')->with('success', 'Producto subido correctamente.');
    }

    // Mostrar formulario para editar un producto
    public function edit($id)
    {
        $producto = Producto::with('categoria')->findOrFail($id); // Cargar el producto con su categoría
        return view('admin.producto.edit', compact('producto'));
    }

    // Actualizar un producto
    public function update(Request $request, $id)
    {
        $request->validate([
            'precio' => 'required|numeric',
            'cantidad' => 'required|integer',
            'nombre_categoria' => 'required|string',
            'descripcion' => 'required|string',
            'imagen1' => 'nullable|image',
            'imagen2' => 'nullable|image',
            'imagen3' => 'nullable|image',
        ]);

        // Actualizar el producto
        $producto = Producto::findOrFail($id);
        $producto->update([
            'Precio' => $request->precio,
            'Disponibilidad' => $request->cantidad > 0 ? 1 : 0,
            'Cantidad' => $request->cantidad,
        ]);

        // Subir imágenes si se actualizan
        $imagenes = [];
        $carpetaDestino = public_path('fotosProductos/');

        for ($i = 1; $i <= 3; $i++) {
            if ($request->hasFile("imagen$i")) {
                $nombreArchivo = time() . "_img{$i}_" . $request->file("imagen$i")->getClientOriginalName();
                $rutaFinal = $carpetaDestino . $nombreArchivo;

                if ($request->file("imagen$i")->move($carpetaDestino, $nombreArchivo)) {
                    $imagenes[] = $nombreArchivo;
                } else {
                    $imagenes[] = null;
                }
            } else {
                $imagenes[] = null;
            }
        }

        // Actualizar la categoría asociada
        $categoria = $producto->categoria;
        $categoria->update([
            'Nombre' => $request->nombre_categoria,
            'Descripcion' => $request->descripcion,
            'Foto1' => $imagenes[0] ?: $categoria->Foto1, // Si no se carga una nueva imagen, conserva la antigua
            'Foto2' => $imagenes[1] ?: $categoria->Foto2,
            'Foto3' => $imagenes[2] ?: $categoria->Foto3,
        ]);

        return redirect()->route('admin.producto.index')->with('success', 'Producto actualizado correctamente.');
    }
}
