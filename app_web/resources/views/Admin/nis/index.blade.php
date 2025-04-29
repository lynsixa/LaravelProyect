@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Lista de NIS -->
    <h2 class="mb-4 text-primary">Lista de NIS</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.nis.create') }}" class="btn btn-primary mb-4">Crear NIS</a>

    <table class="table table-bordered table-hover text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Descripción</th>
                <th>Número de Mesa</th>
                <th>Menú</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($nis as $item)
                <tr>
                    <td>{{ $item->idCodigoNis }}</td>
                    <td>{{ $item->Descripcion }}</td>
                    <td>{{ $item->Mesa->NumeroMesa }}</td>
                    <td>{{ $item->Menu->Descripcion }}</td>
                    <td>
                        <a href="{{ route('admin.nis.edit', $item->idCodigoNis) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('admin.nis.destroy', $item->idCodigoNis) }}" method="POST" class="d-inline">
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
