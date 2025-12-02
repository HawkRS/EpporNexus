@extends('layouts.vertical',['title' => 'Ferreteria'])

@section('content')
@include('layouts.partials.page-title', ['subtitle' => 'Inventario', 'title' => 'Ferreteria'])

<div class="row">
    <!-- COLUMNA 1: GRÁFICO Y RESUMEN (col-md-4) -->
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="header-title">Desglose de Inversión por Categoría</h5>
                <!-- CORRECCIÓN CLAVE: Asignar a window para que el módulo JS la pueda leer -->
                <script>
                    window.inversionPorCategoria = @json($inversionPorCategoria);
                </script>
                <div class="py-2"> &nbsp; </div>
                <canvas id="FerreteriaValue"></canvas>
                <div class="py-1"> &nbsp; </div>

                <!-- Tabla de Leyenda del Gráfico -->
                <div class="table-responsive">
                    <table class="table table-sm table-striped">
                        <tbody>
                            @php
                                // Definimos los colores aquí para que coincidan con el JS y la leyenda
                                $categorias = [
                                    'Abrasivos' => 'danger',
                                    'Consumibles' => 'success',
                                    'Miscelaneos' => 'warning',
                                    'Seguridad' => 'dark',
                                    'Soldadura' => 'info',
                                ];
                            @endphp

                            @foreach ($inversionPorCategoria as $categoria => $inversion)
                                @if (isset($categorias[$categoria]))
                                    <tr>
                                        <td> <span class="text-{{ $categorias[$categoria] }}"><i class="fas fa-circle"></i></span> {{ $categoria }}</td>
                                        <td> $ {{ number_format($inversion, 2) }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="row justify-content-center mt-3">
                    <div class="col-md-8">
                        <div class="d-grid">
                            <a href="#" class="btn btn-sm btn-primary">Agregar artículo</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- COLUMNA 2: TABLAS CON PESTAÑAS (col-md-8) -->
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">

                <!-- NAV TABS (Pestañas de Navegación) -->
                <ul class="nav nav-tabs nav-bordered mb-3">
                    <li class="nav-item">
                        <a href="#tab-abrasivos" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
                            Abrasivos <span class="badge bg-danger ms-1">${{ number_format($inversionPorCategoria['Abrasivos'], 0) }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#tab-consumibles" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                            Consumibles <span class="badge bg-success ms-1">${{ number_format($inversionPorCategoria['Consumibles'], 0) }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#tab-miscelaneos" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                            Misceláneos <span class="badge bg-warning ms-1">${{ number_format($inversionPorCategoria['Miscelaneos'], 0) }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#tab-seguridad" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                            Seguridad <span class="badge bg-dark ms-1">${{ number_format($inversionPorCategoria['Seguridad'], 0) }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#tab-soldadura" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                            Soldadura <span class="badge bg-info ms-1">${{ number_format($inversionPorCategoria['Soldadura'], 0) }}</span>
                        </a>
                    </li>
                </ul>

                <!-- TAB CONTENT (Contenido de las Pestañas) -->
                <div class="tab-content">

                    <!-- PESTAÑA ABRASIVOS -->
                    <div class="tab-pane show active" id="tab-abrasivos">
                        <h5 class="header-title mb-3">Inventario de Abrasivos</h5>
                        <div class="table-responsive">
                            <!-- ¡MANTENEMOS EL ID PARA DATATABLES! -->
                            <table class="table table-sm table-striped w-100" id="AbrasivosTable">
                                <thead>
                                    <tr>
                                        <th class="text-primary">Código</th>
                                        <th class="text-primary">Nombre</th>
                                        <th class="text-primary">Cantidad</th>
                                        <th class="text-primary">Costo</th>
                                        <th class="text-primary">Inversión</th>
                                        <th class="text-primary">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($abrasivos as $abrasivo)
                                    <tr>
                                        <td>{{ $abrasivo->codigo }}</td>
                                        <td>{{ $abrasivo->nombre }}</td>
                                        <td>{{ $abrasivo->cantidad }} {{ $abrasivo->unidad_medida }}</td>
                                        <td>${{ number_format($abrasivo->costo_unitario, 2) }}</td>
                                        <td>${{ number_format($abrasivo->costo_unitario * $abrasivo->cantidad, 2) }}</td>
                                        <td class="text-center">
                                            <!-- Botones de Acción -->
                                            <a href="#" class="text-warning me-2" data-bs-toggle="modal"
                                                data-bs-target="#editModal" data-id="{{ $abrasivo->id }}"
                                                data-nombre="{{ $abrasivo->nombre }}" data-cantidad="{{ $abrasivo->cantidad }}"
                                                data-costo="{{ $abrasivo->costo_unitario }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('ferreteria.destroy', $abrasivo->id) }}" method="POST" class="delete-form d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <!-- Usamos un mensaje modal personalizado en lugar de confirm() -->
                                                <button type="button" class="btn text-danger p-0 delete-item" data-nombre="{{ $abrasivo->nombre }}">
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

                    <!-- PESTAÑA CONSUMIBLES -->
                    <div class="tab-pane" id="tab-consumibles">
                        <h5 class="header-title mb-3">Inventario de Consumibles</h5>
                        <div class="table-responsive">
                            <!-- ¡MANTENEMOS EL ID PARA DATATABLES! -->
                            <table class="table table-sm table-striped w-100" id="ConsumiblesTable">
                                <thead>
                                    <tr>
                                        <th class="text-primary">Código</th>
                                        <th class="text-primary">Nombre</th>
                                        <th class="text-primary">Cantidad</th>
                                        <th class="text-primary">Costo</th>
                                        <th class="text-primary">Inversión</th>
                                        <th class="text-primary">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($consumibles as $consumible)
                                    <tr>
                                        <td>{{ $consumible->codigo }}</td>
                                        <td>{{ $consumible->nombre }}</td>
                                        <td>{{ $consumible->cantidad }} {{ $consumible->unidad_medida }}</td>
                                        <td>${{ number_format($consumible->costo_unitario, 2) }}</td>
                                        <td>${{ number_format($consumible->costo_unitario * $consumible->cantidad, 2) }}</td>
                                        <td class="text-center">
                                            <!-- Botones de Acción -->
                                            <a href="#" class="text-warning me-2" data-bs-toggle="modal"
                                                data-bs-target="#editModal" data-id="{{ $consumible->id }}"
                                                data-nombre="{{ $consumible->nombre }}" data-cantidad="{{ $consumible->cantidad }}"
                                                data-costo="{{ $consumible->costo_unitario }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('ferreteria.destroy', $consumible->id) }}" method="POST" class="delete-form d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn text-danger p-0 delete-item" data-nombre="{{ $consumible->nombre }}">
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

                    <!-- PESTAÑA MISCELÁNEOS -->
                    <div class="tab-pane" id="tab-miscelaneos">
                        <h5 class="header-title mb-3">Inventario de Misceláneos</h5>
                        <div class="table-responsive">
                            <!-- ¡MANTENEMOS EL ID PARA DATATABLES! -->
                            <table class="table table-sm table-striped w-100" id="MiscelaneosTable">
                                <thead>
                                    <tr>
                                        <th class="text-primary">Código</th>
                                        <th class="text-primary">Nombre</th>
                                        <th class="text-primary">Cantidad</th>
                                        <th class="text-primary">Costo</th>
                                        <th class="text-primary">Inversión</th>
                                        <th class="text-primary">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($miscelaneos as $miscelaneo)
                                    <tr>
                                        <td>{{ $miscelaneo->codigo }}</td>
                                        <td>{{ $miscelaneo->nombre }}</td>
                                        <td>{{ $miscelaneo->cantidad }} {{ $miscelaneo->unidad_medida }}</td>
                                        <td>${{ number_format($miscelaneo->costo_unitario, 2) }}</td>
                                        <td>${{ number_format($miscelaneo->costo_unitario * $miscelaneo->cantidad, 2) }}</td>
                                        <td class="text-center">
                                            <!-- Botones de Acción -->
                                            <a href="#" class="text-warning me-2" data-bs-toggle="modal"
                                                data-bs-target="#editModal" data-id="{{ $miscelaneo->id }}"
                                                data-nombre="{{ $miscelaneo->nombre }}" data-cantidad="{{ $miscelaneo->cantidad }}"
                                                data-costo="{{ $miscelaneo->costo_unitario }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('ferreteria.destroy', $miscelaneo->id) }}" method="POST" class="delete-form d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn text-danger p-0 delete-item" data-nombre="{{ $miscelaneo->nombre }}">
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

                    <!-- PESTAÑA SEGURIDAD -->
                    <div class="tab-pane" id="tab-seguridad">
                        <h5 class="header-title mb-3">Inventario de Seguridad</h5>
                        <div class="table-responsive">
                            <!-- ¡MANTENEMOS EL ID PARA DATATABLES! -->
                            <table class="table table-sm table-striped w-100" id="SeguridadTable">
                                <thead>
                                    <tr>
                                        <th class="text-primary">Código</th>
                                        <th class="text-primary">Nombre</th>
                                        <th class="text-primary">Cantidad</th>
                                        <th class="text-primary">Costo</th>
                                        <th class="text-primary">Inversión</th>
                                        <th class="text-primary">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($seguridad as $segu)
                                    <tr>
                                        <td>{{ $segu->codigo }}</td>
                                        <td>{{ $segu->nombre }}</td>
                                        <td>{{ $segu->cantidad }} {{ $segu->unidad_medida }}</td>
                                        <td>${{ number_format($segu->costo_unitario, 2) }}</td>
                                        <td>${{ number_format($segu->costo_unitario * $segu->cantidad, 2) }}</td>
                                        <td class="text-center">
                                            <!-- Botones de Acción -->
                                            <a href="#" class="text-warning me-2" data-bs-toggle="modal"
                                                data-bs-target="#editModal" data-id="{{ $segu->id }}"
                                                data-nombre="{{ $segu->nombre }}" data-cantidad="{{ $segu->cantidad }}"
                                                data-costo="{{ $segu->costo_unitario }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('ferreteria.destroy', $segu->id) }}" method="POST" class="delete-form d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn text-danger p-0 delete-item" data-nombre="{{ $segu->nombre }}">
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

                    <!-- PESTAÑA SOLDADURA -->
                    <div class="tab-pane" id="tab-soldadura">
                        <h5 class="header-title mb-3">Inventario de Soldadura</h5>
                        <div class="table-responsive">
                            <!-- ¡MANTENEMOS EL ID PARA DATATABLES! -->
                            <table class="table table-sm table-striped w-100" id="SoldaduraTable">
                                <thead>
                                    <tr>
                                        <th class="text-primary">Código</th>
                                        <th class="text-primary">Nombre</th>
                                        <th class="text-primary">Cantidad</th>
                                        <th class="text-primary">Costo</th>
                                        <th class="text-primary">Inversión</th>
                                        <th class="text-primary">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($soldaduras as $soldadura)
                                    <tr>
                                        <td>{{ $soldadura->codigo }}</td>
                                        <td>{{ $soldadura->nombre }}</td>
                                        <td>{{ $soldadura->cantidad }} {{ $soldadura->unidad_medida }}</td>
                                        <td>${{ number_format($soldadura->costo_unitario, 2) }}</td>
                                        <td>${{ number_format($soldadura->costo_unitario * $soldadura->cantidad, 2) }}</td>
                                        <td class="text-center">
                                          <a href="#" class="text-warning me-2"
                                              data-bs-toggle="modal"
                                              data-bs-target="#editModal"
                                              data-id="{{ $soldadura->id }}"
                                              data-nombre="{{ $soldadura->nombre }}"
                                              data-cantidad="{{ $soldadura->cantidad }}"
                                              data-costo="{{ $soldadura->costo_unitario }}">
                                              <i class="fas fa-edit"></i>
                                          </a>
                                            <form action="{{ route('ferreteria.destroy', $soldadura->id) }}" method="POST" class="delete-form d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn text-danger p-0 delete-item" data-nombre="{{ $soldadura->nombre }}">
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

                </div> <!-- Fin tab-content -->
            </div>
        </div>
    </div>
</div>

<!-- Modal para Confirmación de Eliminación (Reemplaza alert/confirm) -->
<div class="modal fade" id="deleteConfirmModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmModalLabel">Confirmar Eliminación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Está seguro de que desea eliminar el artículo: <strong id="deleteItemName"></strong>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteButton">Eliminar</button>
            </div>
        </div>
    </div>
</div>

@include('nexus.inventarios.ferreteria.partials.modaledititem')

@endsection

@section('scripts')
@vite(['resources/js/nexus/ferreteria.js'])
@endsection
