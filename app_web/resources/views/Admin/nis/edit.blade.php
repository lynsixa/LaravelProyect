@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-primary">Editar NIS</h2>

    <form method="POST" action="{{ route('admin.nis.update', $nis->idCodigoNis) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <input type="text" class="form-control" name="descripcion" id="descripcion" value="{{ old('descripcion', $nis->Descripcion) }}" required>
        </div>

        <div class="mb-3">
            <label for="numero_piso" class="form-label">Número de Piso</label>
            <input type="number" class="form-control" name="numero_piso" id="numero_piso" value="{{ old('numero_piso', $nis->Mesa->NumeroPiso) }}" required>
        </div>

        <div class="mb-3">
            <label for="numero_mesa" class="form-label">Número de Mesa</label>
            <input type="number" class="form-control" name="numero_mesa" id="numero_mesa" value="{{ old('numero_mesa', $nis->Mesa->NumeroMesa) }}" required>
        </div>

        <div class="mb-3">
            <label for="menu_id" class="form-label">Menú</label>
            <select name="menu_id" class="form-control" required>
                @foreach($menus as $menu)
                    <option value="{{ $menu->idMenu }}" {{ $nis->Menu->idMenu == $menu->idMenu ? 'selected' : '' }}>
                        {{ $menu->Descripcion }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Actualizar NIS</button>
    </form>
</div>
@endsection
