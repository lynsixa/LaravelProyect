@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-primary">Subir Nuevo Producto</h2>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.producto.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="precio">Precio</label>
            <input type="number" step="0.001" class="form-control" name="precio" required>
        </div>

        <div class="form-group mb-3">
            <label for="cantidad">Cantidad</label>
            <input type="number" class="form-control" name="cantidad" required>
        </div>

        <div class="form-group mb-3">
            <label for="nombre_categoria">Nombre de la Categoría</label>
            <input type="text" class="form-control" name="nombre_categoria" required>
        </div>

        <div class="form-group mb-3">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" class="form-control" required></textarea>
        </div>

        <div class="form-group mb-3">
            <label for="imagen1">Imagen 1 (Obligatoria)</label>
            <input type="file" class="form-control" name="imagen1" accept="image/*" required>
        </div>

        <div class="form-group mb-3">
            <label for="imagen2">Imagen 2 (Opcional)</label>
            <input type="file" class="form-control" name="imagen2" accept="image/*">
        </div>

        <div class="form-group mb-3">
            <label for="imagen3">Imagen 3 (Opcional)</label>
            <input type="file" class="form-control" name="imagen3" accept="image/*">
        </div>

        <button type="submit" class="btn btn-success">Subir Producto</button>
    </form>
</div>
@endsection
