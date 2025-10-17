@extends('layouts.vertical')
@section('title', 'Caja chica')
@section('section', 'caja')

@section('content')
<script>
var gastosporarea = {!! json_encode($gastosPorArea) !!};
</script>
<div class="content-page">
  <!-- Start content -->
  <div class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-sm-12">
          <div class="page-title-box">
            <h4 class="page-title fnt26 text-uppercase fntB">Caja chica</h4>
          </div>
        </div>
      </div>
      <!-- end row -->
      <div class="page-content-wrapper">
        <div class="row justify-content-center">

          <div class="col-md-6 col-lg-4">
            <div class="card">
              <div class="card-body">
                <h2 class="fnt_blue fntB">Balance: <span class="text-success">${{ number_format($totalcaja, 2) }}</span> </h2>
                <div class="">

                </div>
                <div class="row">

                  <div class="col-12">
                    <p>Buscar por fechas</p>
                    <form method="GET" action="{{ route('movimientos.index') }}">
                      <div class="row justify-content-center">
                        <div class="col-md-8 mt-3">
                          <input type="date" name="fecha_inicio" class="form-control" value="{{ $fechaInicio->format('Y-m-d') }}">
                        </div>
                        <div class="col-md-8 mt-3">
                          <input type="date" name="fecha_fin" class="form-control" value="{{ $fechaFin->format('Y-m-d') }}">
                        </div>
                        <div class="col-md-8 mt-3">
                          <button type="submit" class="btn btn-block btn-primary">Filtrar</button>
                        </div>
                      </div>
                    </form>
                  </div>

                  <div class="col-12 pt-4">
                    <p>Grafico de gastos</p>
                    <canvas id="Gastos" class="CajaMoves" width="400" height="400"></canvas>
                  </div>

                </div>

              </div>
            </div>
          </div>

          <div class="col-md-8">
            <div class="card">
              <div class="card-body">
                @if ( count( $errors ) > 0 )
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                @endif

                <div class="row">
                  <div class="col-md-6">
                    <h2 class="fnt_blue fntB">Movimientos</h2>
                  </div>
                  <div class="col-md-6 p-2">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                      Agregar movimiento
                    </button>
                  </div>
                </div>


                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nuevo movimiento</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">

                        <form method="POST" action="{{ route('movimientos.store') }}">
                            @csrf
                            <div class="form-group">

                            </div>
                            <!-- Tipo de movimiento (ingreso o egreso) -->
                            <div>
                                <label for="tipo">Tipo de Movimiento:</label>
                                <select class="form-control" name="tipo" id="tipo" required>
                                    <option value="entrada">Ingreso</option>
                                    <option value="salida">Egreso</option>
                                </select>
                            </div>

                            <!-- Monto del movimiento -->
                            <div>
                                <label for="monto">Monto:</label>
                                <input type="number" class="form-control" name="monto" id="monto" step="0.01" placeholder="Monto" required>
                            </div>

                            <!-- Área de gasto -->
                            <div>
                                <label for="area">Área de Gasto:</label>
                                <select class="form-control" name="area" id="area" required>
                                    <option value="comidas">Comidas</option>
                                    <option value="casa">Casa</option>
                                    <option value="salarios_casa">Salarios casa</option>
                                    <option value="salarios_negocio">Salarios negocio</option>
                                    <option value="gastos_negocio">Gastos negocio</option>
                                    <option value="gasolinas">Gasolinas</option>
                                    <option value="miscelaneos">Miscelaneos</option>
                                    <option value="prestamo">Prestamo</option>
                                    <option value="ingreso">Ingreso</option>
                                    <!-- Añade más áreas según tu necesidad -->
                                </select>
                            </div>

                            <!-- Descripción del movimiento -->
                            <div>
                                <label for="descripcion">Descripción:</label>
                                <textarea class="form-control" name="descripcion" id="descripcion" rows="4" placeholder="Descripción del movimiento" required></textarea>
                            </div>
                            <div class="row justify-content-center pt-3">
                              <div class="col-md-6 col-lg-4">
                                <button type="submit" name="button" class="btn btn-block btn-primary">Enviar</button>
                              </div>
                            </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

                <table id="CajaTable" class="table table-striped table-hover align-middle ">
                  <thead>
                    <tr>
                      <th class="fnt_blue fntB">Fecha</th>
                      <th class="fnt_blue fntB">Tipo</th>
                      <th class="fnt_blue fntB">Monto</th>
                      <th class="fnt_blue fntB">Área</th>
                      <th class="fnt_blue fntB">Descripción</th>
                      <th class="fnt_blue fntB">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($movimientos as $movimiento)
                    <tr>
                      <td>{{ $movimiento->created_at }}</td>
                      <td>
                        @if($movimiento->tipo == 'entrada')
                        <span class="badge badge-pill badge-success"><i class="fas fa-plus-circle"></i> {{ ucfirst($movimiento->tipo) }}</span>
                        @else
                        <span class="badge badge-pill badge-danger"><i class="fas fa-minus-circle"></i> {{ ucfirst($movimiento->tipo) }}</span>
                        @endif
                      </td>
                      <td>${{ number_format($movimiento->monto, 2) }}</td>
                      <td>{{ $movimiento->area }}</td>
                      <td>{{ $movimiento->descripcion }}</td>

                      <td>
                        <!-- Botón para abrir el modal de edición -->
                        <button
                        class="btn btn-warning btn-sm edit-button"
                        data-id="{{ $movimiento->id }}"
                        data-url="{{ route('movimientos.update', $movimiento->id) }}"
                        data-tipo="{{ $movimiento->tipo }}"
                        data-monto="{{ $movimiento->monto }}"
                        data-area="{{ $movimiento->area }}"
                        data-descripcion="{{ $movimiento->descripcion }}"
                        > Editar </button>
                        <!-- Eliminar con doble verificación -->
                            <a href="#" class="btn btn-danger btn-sm delete-button" data-id="{{ $movimiento->id }}">Eliminar</a>
                            <!-- Formulario de eliminación oculto -->
                            <form id="delete-form-{{ $movimiento->id }}" action="{{ route('movimientos.delete', ['id'=>$movimiento->id]) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
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

    </div>
  </div>
</div>

<!-- Modal de edición (solo uno) -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Editar Movimiento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit-form" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Tipo de Movimiento -->
                    <div class="form-group">
                        <label for="tipo">Tipo de Movimiento</label>
                        <select class="form-control" name="tipo" id="tipo" required>
                          <option value="entrada">Ingreso</option>
                          <option value="salida">Egreso</option>
                        </select>
                    </div>

                    <!-- Monto -->
                    <div class="form-group">
                        <label for="monto">Monto</label>
                        <input type="number" class="form-control"  step="0.01" name="monto" id="monto" required>
                    </div>

                    <!-- Área de Gasto -->
                    <div class="form-group">
                        <label for="area">Área de Gasto</label>
                        <select class="form-control" name="area" id="area" required>
                          <option value="comidas">Comidas</option>
                          <option value="casa">Casa</option>
                          <option value="salarios_casa">Salarios casa</option>
                          <option value="salarios_negocio">Salarios negocio</option>
                          <option value="gastos_negocio">Gastos negocio</option>
                          <option value="gasolinas">Gasolinas</option>
                          <option value="miscelaneos">Miscelaneos</option>
                          <option value="prestamo">Prestamo</option>
                          <option value="ingreso">Ingreso</option>
                        </select>
                    </div>

                    <!-- Descripción -->
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea class="form-control" name="descripcion" id="descripcion" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-success">Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

