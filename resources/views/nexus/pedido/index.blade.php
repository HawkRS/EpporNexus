@extends('layouts.vertical')
@section('title', 'Pedidos')
@section('section', 'pedidoindex')

@section('content')
<div class="content-page">
  <!-- Start content -->
  <div class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-sm-12">
          <div class="page-title-box">
            <h4 class="page-title fnt26 text-uppercase fntB">PEDIDOS</h4>
          </div>
        </div>
      </div>
      <!-- end row -->
      <!-- Button trigger modal -->


      <div class="page-content-wrapper">
        <div class="row justify-content-center">

          <div class="col-md-8 col-lg-9">
            <div class="card p-3">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <h4 class="card-title mb-5 text-dark">Registro de pedidos</h4>
                  </div>
                  <div class="col-md-4">
                    <span class="text-right">
                      {{--<a href="{{route('pedidos.create')}}" class="btn btn-sm btn-success">Nuevo pedido</a>--}}
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#PedidoModal">
                        Nuevo pedido
                      </button>
                    </span>
                  </div>
                </div>

                <div class="row">
                  <div class="col-12">
                    <form method="GET" class="mb-4">
                      <div class="row">
                        <div class="col-md-3">
                          <label>Cliente</label>
                          <input type="text" name="cliente" class="form-control" placeholder="Nombre o identificador">
                        </div>
                        <div class="col-md-3">
                          <label>Producto</label>
                          <input type="text" name="producto" class="form-control" placeholder="Nombre del producto">
                        </div>
                        <div class="col-md-3">
                          <label>Desde</label>
                          <input type="date" name="desde" class="form-control">
                        </div>
                        <div class="col-md-3">
                          <label>Hasta</label>
                          <input type="date" name="hasta" class="form-control">
                        </div>
                      </div>

                      <div class="row mt-2">
                        <div class="col-md-3">
                          <label>Estado</label>
                          <select name="estado" class="form-control">
                            <option value="">Todos</option>
                            <option value="ordenado">Ordenado</option>
                            <option value="produccion">Producción</option>
                            <option value="terminado">Terminado</option>
                            <option value="entregado">Entregado</option>
                            <option value="espera">Espera</option>
                            <option value="cancelado">Cancelado</option>
                            <option value="convertida">Convertida</option>
                          </select>
                        </div>

                        <div class="col-md-3">
                          <label>Método de entrega</label>
                          <select name="entrega" class="form-control">
                            <option value="">Todos</option>
                            <option value="recoger">Cliente recoge</option>
                            <option value="enviado">Enviado</option>
                          </select>
                        </div>

                        <div class="col-md-3">
                          <label>¿Pagado?</label>
                          <select name="pagado" class="form-control">
                            <option value="">Todos</option>
                            <option value="si">Pagado</option>
                            <option value="no">Saldo pendiente</option>
                          </select>
                        </div>

                        <div class="col-md-3 d-flex align-items-end">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="saldo_pendiente" id="saldo_pendiente">
                            <label class="form-check-label" for="saldo_pendiente">Solo con saldo pendiente</label>
                          </div>
                        </div>
                      </div>

                      <div class="row mt-2">
                        <div class="col-md-12 text-right">
                          <button type="submit" class="btn btn-primary">Filtrar</button>
                          <a href="{{ route('pedidos.index') }}" class="btn btn-secondary">Limpiar</a>
                        </div>
                      </div>
                    </form>
                  </div>

          </div>
          <div class="table-responsive">
            <table id="PedidoTable" class="table table-striped table-hover align-middle ">
              <thead>
                <tr>
                  <th class="fnt_blue fntB">Folio</th>
                  <th class="fnt_blue fntB">Fecha</th>
                  <th class="fnt_blue fntB">Cliente</th>
                  <th class="fnt_blue fntB">Total</th>
                  <th class="fnt_blue fntB">Factura</th>
                  <th class="fnt_blue fntB">Saldo</th>
                  <th class="fnt_blue fntB">Estado</th>
                  <th class="fnt_blue fntB">Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach($pedidos as $pedido)
                <tr>
                  <td>{{ $pedido->folio }}</td>
                  @if($pedido->fecha != null)
                  <td>{{ date('d/m/y', strtotime($pedido->fecha)) }}</td>
                  @else
                  <td>Sin Fecha</td>
                  @endif
                  <td>{{ $pedido->cliente->identificador }}</td>
                  <td>${{ number_format($pedido->total, 2) }}</td>
                  @if($pedido->factura == true)
                  <td><span class="badge badge-soft-primary">Facturada</span> </td>
                  @else
                  <td><span class="badge badge-soft-secondary">Sin Factura</span> </td>
                  @endif
                  <td>${{ number_format($pedido->saldo, 2) }}</td>
                  @switch($pedido->estado)
                  @case('ordenado')
                  <td> <span class="badge badge-soft-primary"><i class="fas fa-circle"></i> Ordenado </span></td>
                  @break
                  @case('produccion')
                  <td> <span class="badge badge-soft-warning"><i class="fas fa-circle"></i> Produccion </span></td>
                  @break
                  @case('terminado')
                  <td> <span class="badge badge-soft-success"><i class="fas fa-circle"></i> Terminado </span></td>
                  @break
                  @case('entregado')
                  <td> <span class="badge badge-soft-success"><i class="fas fa-circle"></i> Entregado </span></td>
                  @break
                  @case('espera')
                  <td> <span class="badge badge-soft-warning"><i class="fas fa-circle"></i> Espera </span></td>
                  @break
                  @case('cancelado')
                  <td> <span class="badge badge-soft-danger"><i class="fas fa-circle"></i> Cancelado </span></td>
                  @break
                  @case('convertida')
                  <td> <span class="badge badge-soft-success"><i class="fas fa-circle"></i> Convertida </span></td>
                  @break
                  @default
                  <td> <span class="badge badge-soft-secondary"><i class="fas fa-circle"></i> n/a </span></td>
                  @endswitch
                  <td>
                    <a class="text-info" href="{{ route('pedidos.show', $pedido->id) }}"> <i class="fas fa-eye"></i> </a>&nbsp;
                    <a class="text-primary" href="{{ route('pedidos.editdate', $pedido->id) }}"> <i class="fas fa-calendar"></i> </a>&nbsp;
                    <a class="text-warning" href="{{ route('pedidos.edit', $pedido->id) }}"> <i class="fas fa-edit"></i> </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div> <!-- end col -->

<div class="col-md-4 col-lg-3">
  <div class="row">
    <div class="col-12">
      <div class="card">
            <div class="card-body">
              <h4>Pedidos por estado</h4>
          <canvas
            id="graficaPedidos"
            data-labels='@json($porEstado->keys())'
            data-values='@json($porEstado->values())'>
          </canvas>
          <div class="row">
            @foreach($porEstado as $estado => $total)
            <div class="col-12 col-md-4">
              @switch($loop->index)
                @case(1)
                <p class="text-primary">
                @break
                @case(2)
                <p class="text-danger">
                @break
                @case(3)
                <p class="text-dark">
                @break
                @case(4)
                <p class="text-warning">
                @break
                @case(0)
                <p class="text-success">
                @break
              @endswitch
              <i class="fas fa-circle"></i> {{ ucfirst($estado) }}</p>
            </div>
            @endforeach
          </div>
      </div>
    </div>
  </div>
  <div class="col-12">
    <div class="card">
        <div class="card-body">
          <h4>Cobranza</h4>
        <!-- Estado de pago -->
        <canvas
          id="graficaSaldos"
          data-labels='@json(["Pagado", "Pendiente"])'
          data-values='@json([$totalPagado, $totalSaldo])'>
        </canvas>
        <div class="row">
          <div class="col-12 col-lg-6">
            <p class="text-success"><i class="fas fa-circle"></i> Total en pedidos</p>
          </div>
          <div class="col-12 col-lg-6">
            <p class="text-danger"><i class="fas fa-circle"></i> Saldo x pagar</p>
          </div>
        </div>
    </div>
  </div>
</div>
<div class="col-12">
  <div class="card">
    <div class="card-body">
      <h4>Productos</h4>
      <!-- Productos más solicitados -->
      <canvas
        id="graficaProductos"
        data-labels='@json($productosContados->pluck("nombre"))'
        data-values='@json($productosContados->pluck("total"))'>
      </canvas>
      <div class="row">
        @foreach($productosContados as $productosContado)
          <div class="col-12">
            @switch($loop->index)
              @case(1)
              <p class="text-primary">
              @break
              @case(2)
              <p class="text-danger">
              @break
              @case(3)
              <p class="text-dark">
              @break
              @case(4)
              <p class="text-warning">
              @break
              @case(0)
              <p class="text-success">
              @break
            @endswitch
              <i class="fas fa-circle"></i>
              {{ ucfirst(Str::lower(Str::limit($productosContado->nombre, 40))) }}
            </p>
          </div>
        @endforeach
      </div>
  </div>
</div>
</div>
  </div>
</div>

  </div> <!-- end row -->
</div>
</div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="PedidoModal" tabindex="-1" aria-labelledby="PedidoModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="PedidoModalLabel">Nuevo pedido</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="" action="{{ route('pedidos.create') }}" method="GET">
          @csrf
          <div class="row g-3">

            <div class="col-12">
                <!-- 'form-label' es el estándar de BS5. Usamos 'fw-bold' para simular 'fntB' si no es una clase personalizada. -->
                <label for="cliente_id" class="form-label fw-bold">CLIENTE</label>

                <!-- CLAVE BS5: 'custom-select' se convierte en 'form-select' -->
                <select class="form-select" name="cliente_id" id="cliente_id">
                    <option selected>Elige una opción</option>
                    @foreach($clientes as $cliente)
                    <option value="{{$cliente->id}}" class="text-uppercase">{{$cliente->identificador}}</option>
                    @endforeach
                </select>

                <!-- 'form-text' se usa en cualquier elemento de bloque (div, p) para texto de ayuda -->
                <div id="clienteHelp" class="form-text text-muted">Elige el cliente.</div>

                @error('cliente_id')
                <!-- El 'mt-2' añade margen superior si hay un error -->
                <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

        </div>

        <!-- Gestión de botones: separamos y usamos flex utilities de BS5 -->
        <div class="mt-4 d-flex justify-content-end gap-2">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Generar</button>
            <a href="{{route('cliente.create')}}" class="btn btn-primary">Nuevo cliente</a>
        </div>
        </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>



@endsection

@section('scripts')
@vite(['resources/js/nexus/pedidos.js'])
@endsection