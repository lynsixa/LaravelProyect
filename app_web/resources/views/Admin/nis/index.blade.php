@extends('layouts.app')

@section('content')
<div class="container py-5">
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
                <th>Disponibilidad</th> <!-- Columna para disponibilidad -->
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($nis as $nis)
                <tr>
                    <td>{{ $nis->idCodigoNis }}</td>
                    <td>{{ $nis->Descripcion }}</td>
                    <td>{{ $nis->Mesa->NumeroMesa }}</td>
                    <td>{{ $nis->Menu->Descripcion }}</td>
                    <td>{{ $nis->Disponibilidad == 1 ? 'Disponible' : 'No Disponible' }}</td> <!-- Mostrar disponibilidad -->
                    <td>
                        <a href="{{ route('admin.nis.edit', $nis->idCodigoNis) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('admin.nis.destroy', $nis->idCodigoNis) }}" method="POST" class="d-inline">
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
