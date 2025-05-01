<?php
// app/Http/Controllers/ProductoController.php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // Mostrar todos los productos
    public function index()
    {
        // Cargar productos con sus respectivas categorías usando 'with' para la relación
        $productos = Producto::with('categoria')->get(); // Aquí aseguramos que cargamos la relación 'categoria'
        return view('admin.producto.index', compact('productos'));
    }

    // Mostrar el formulario para crear un nuevo producto
    public function create()
    {
        $categorias = Categoria::all(); // Obtener todas las categorías disponibles
        return view('admin.producto.create', compact('categorias'));
    }

    // Almacenar un nuevo producto
    public function store(Request $request)
    {
        // Validar datos de entrada
        $request->validate([
            'precio' => 'required|numeric',
            'cantidad' => 'required|integer',
            'nombre_categoria' => 'required|string',
            'descripcion' => 'required|string',
            'imagen1' => 'required|image',
            'imagen2' => 'nullable|image',
            'imagen3' => 'nullable|image',
        ]);

        // Guardar el producto en la tabla 'producto'
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

        // Crear una nueva categoría asociada al producto
        Categoria::create([
            'Nombre' => $request->nombre_categoria,
            'Descripcion' => $request->descripcion,
            'Foto1' => $imagenes[0],
            'Foto2' => $imagenes[1],
            'Foto3' => $imagenes[2],
            'Producto_idProducto' => $producto->id, // Asociar el producto recién creado
        ]);

        return redirect()->route('admin.producto.index')->with('success', 'Producto subido correctamente.');
    }

    // Mostrar el formulario para editar un producto
    public function edit($id)
    {
        $producto = Producto::with('categoria')->findOrFail($id); // Cargar producto y su categoría
        $categorias = Categoria::all(); // Obtener todas las categorías disponibles
        return view('admin.producto.edit', compact('producto', 'categorias'));
    }

    // Actualizar un producto
    public function update(Request $request, $id)
    {
        // Validar datos de entrada
        $request->validate([
            'precio' => 'required|numeric',
            'cantidad' => 'required|integer',
            'nombre_categoria' => 'required|string',
            'descripcion' => 'required|string',
            'imagen1' => 'nullable|image',
            'imagen2' => 'nullable|image',
            'imagen3' => 'nullable|image',
        ]);

        // Obtener el producto existente
        $producto = Producto::findOrFail($id);

        // Actualizar el producto
        $producto->update([
            'Precio' => $request->precio,
            'Disponibilidad' => $request->cantidad > 0 ? 1 : 0,
            'Cantidad' => $request->cantidad,
            'CodigoNis_idCodigoNis' => null, // Aquí lo puedes actualizar si es necesario
        ]);

        // Subir las imágenes si existen
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

        // Actualizar la categoría asociada al producto
        $categoria = $producto->categoria;
        $categoria->update([
            'Nombre' => $request->nombre_categoria,
            'Descripcion' => $request->descripcion,
            'Foto1' => $imagenes[0] ?? $categoria->Foto1,
            'Foto2' => $imagenes[1] ?? $categoria->Foto2,
            'Foto3' => $imagenes[2] ?? $categoria->Foto3,
        ]);

        return redirect()->route('admin.producto.index')->with('success', 'Producto actualizado correctamente.');
    }

    // Eliminar un producto
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->categoria()->delete(); // Eliminar la categoría asociada
        $producto->delete(); // Eliminar el producto

        return redirect()->route('admin.producto.index')->with('success', 'Producto eliminado correctamente.');
    }
}
