@extends('layouts.vertical',['title' => 'Ferreteria'])

@section('content')
@include('layouts.partials.page-title', ['subtitle' => 'Inventario', 'title' => 'Ferreteria'])

<div class="row">
  <div class="col-md-4">
    <div class="card">
      <div class="card-body">
        <h5 class="header-title">Consumibles</h5>

          <div class="table-responsive">
            <table class="table table-sm table-striped" id="ConsumiblesTable">
              <thead>
                <th class="text-primary">Codigo</th>
                <th class="text-primary">Nombre</th>
                <th class="text-primary">Cantidad</th>
                <th class="text-primary">Costo</th>
                <th class="text-primary">Inversion</th>
                <th class="text-primary">Acciones</th>
              </thead>
              <tbody>
                @foreach ($consumibles as $consumible)
                  <tr>
                    <td>{{ $consumible->codigo }}</td>
                    <td>{{ $consumible->nombre }}</td>
                    <td>{{ $consumible->cantidad }}</td>
                    <td>${{ number_format($consumible->costo_unitario, 2) }}</td>
                    <td>${{ number_format($consumible->cantidad*$consumible->costo_unitario, 2) }}</td>
                    <td class="text-center">
                      <!-- Botón Editar (Lanza Modal) -->
                      <a href="#" class="text-warning"
                      data-bs-toggle="modal"
                      data-bs-target="#editModal"
                      data-id="{{ $consumible->id }}"
                      data-nombre="{{ $consumible->nombre }}"
                      data-cantidad="{{ $consumible->cantidad }}"
                      data-costo_unitario="{{ $consumible->costo_unitario }}">
                      <i class="fas fa-edit"></i>
                    </a>

                    <!-- Botón Eliminar (Formulario POST/DELETE) -->
                    <form action="{{ route('ferreteria.destroy', $consumible->id) }}" method="POST" class="delete-form">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="text-danger" onclick="return confirm('¿Está seguro de que desea eliminar este artículo: {{ $consumible->nombre }}?');">
                        <i class="fas fa-trash"></i>
                      </button>
                    </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>

      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card">
      <div class="card-body">
        <h5 class="header-title">Seguridad</h5>

          <div class="table-responsive">
            <table class="table table-sm table-striped" id="SeguridadTable">
              <thead>
                <th class="text-primary">Codigo</th>
                <th class="text-primary">Nombre</th>
                <th class="text-primary">Cantidad</th>
                <th class="text-primary">Costo</th>
                <th class="text-primary">Inversion</th>
                <th class="text-primary">Acciones</th>
              </thead>
              <tbody>
                @foreach ($seguridad as $segu)
                  <tr>
                    <td>{{ $segu->codigo }}</td>
                    <td>{{ $segu->nombre }}</td>
                    <td>{{ $segu->cantidad }}</td>
                    <td>${{ number_format($segu->costo_unitario, 2) }}</td>
                    <td>${{ number_format($segu->cantidad*$segu->costo_unitario, 2) }}</td>
                    <td class="text-center">
                      <!-- Botón Editar (Lanza Modal) -->
                      <a href="#" class="text-warning"
                      data-bs-toggle="modal"
                      data-bs-target="#editModal"
                      data-id="{{ $segu->id }}"
                      data-nombre="{{ $segu->nombre }}"
                      data-cantidad="{{ $segu->cantidad }}"
                      data-costo_unitario="{{ $segu->costo_unitario }}">
                      <i class="fas fa-edit"></i> 
                    </a>

                    <!-- Botón Eliminar (Formulario POST/DELETE) -->
                    <form action="{{ route('ferreteria.destroy', $segu->id) }}" method="POST" class="delete-form">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="text-danger" onclick="return confirm('¿Está seguro de que desea eliminar este artículo: {{ $segu->nombre }}?');">
                        <i class="fas fa-trash"></i>
                      </button>
                    </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>

      </div>
    </div>
  </div>
</div>

@endsection
