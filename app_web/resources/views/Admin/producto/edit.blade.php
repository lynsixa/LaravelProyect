@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-primary">Editar Producto</h2>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.producto.update', $producto->idProducto) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="precio">Precio</label>
            <input type="number" step="0.001" class="form-control" name="precio" value="{{ $producto->Precio }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="cantidad">Cantidad</label>
            <input type="number" class="form-control" name="cantidad" value="{{ $producto->Cantidad }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="nombre_categoria">Nombre de la Categoría</label>
            <input type="text" class="form-control" name="nombre_categoria" value="{{ $producto->categoria->Nombre }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" class="form-control" required>{{ $producto->categoria->Descripcion }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="imagen1">Imagen 1 (Obligatoria)</label>
            <input type="file" class="form-control" name="imagen1" accept="image/*">
        </div>

        <div class="form-group mb-3">
            <label for="imagen2">Imagen 2 (Opcional)</label>
            <input type="file" class="form-control" name="imagen2" accept="image/*">
        </div>

        <div class="form-group mb-3">
            <label for="imagen3">Imagen 3 (Opcional)</label>
            <input type="file" class="form-control" name="imagen3" accept="image/*">
        </div>

        <button type="submit" class="btn btn-success">Actualizar Producto</button>
    </form>
</div>
@endsection
