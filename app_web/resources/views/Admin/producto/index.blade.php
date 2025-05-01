@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-primary">Lista de Productos</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
  <!-- Botón de "Crear Nuevo Producto" -->
  <a href="{{ route('admin.producto.create') }}" class="btn btn-primary mb-4">Crear Nuevo Producto</a>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Disponibilidad</th>
                <th>Categoria</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
                <tr>
                    <td>{{ $producto->idProducto }}</td>
                    <td>{{ $producto->Precio }}</td>
                    <td>{{ $producto->Cantidad }}</td>
                    <td>{{ $producto->Disponibilidad ? 'Disponible' : 'No Disponible' }}</td>
                    <td>{{ $producto->categoria?->Nombre ?? 'Sin categoría' }}</td>
                    <td>
                        <a href="{{ route('admin.producto.edit', $producto->idProducto) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('admin.producto.destroy', $producto->idProducto) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
