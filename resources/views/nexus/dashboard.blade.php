@extends('layouts.vertical', ['title' => 'Dashboard'])

@section('css')
<!-- C3 Chart css -->
@vite(['node_modules/c3/c3.min.css'])
@endsection

@section('content')
@include('layouts.partials.page-title', ['subtitle' => 'Dashboard', 'title' => 'Dashboard'])

<?php
use Carbon\Carbon;
Carbon::setLocale('es');
$currentDate = Carbon::now('America/Mexico_City');
$currentYear = $currentDate->year;
$previousYearDate = $currentDate->subYear();
$lastYear = $previousYearDate->year;
$mesAbreviado = Carbon::now('America/Mexico_City')->format('M');
?>

<div class="row">
  <div class="col-xl-3 col-sm-6">
      <div class="card">
          <div class="card-body">
              <div class="d-flex justify-content-between">
                  <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                      <i class="mdi mdi-currency-usd avatar-title font-30 text-white"></i>
                  </div>

                  <div class="wigdet-two-content media-body text-end text-truncate">
                      <p class="m-0 text-uppercase fw-medium text-truncate" title="Statistics">Ventas Anuales {{$currentYear}}</p>
                      <h3 class="fw-medium my-2">$ <span data-plugin="counterup">65,841</span></h3>
                      <p class="m-0"> Ene - {{$mesAbreviado}} {{$currentYear}}</p>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <div class="col-xl-3 col-sm-6">
      <div class="card">
          <div class="card-body">
              <div class="d-flex justify-content-between">
                  <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                      <i class="mdi mdi-currency-usd avatar-title font-30 text-white"></i>
                  </div>

                  <div class="wigdet-two-content media-body text-end text-truncate">
                      <p class="m-0 text-uppercase fw-medium text-truncate" title="Statistics">Ventas Anuales {{$lastYear}}</p>
                      <h3 class="fw-medium my-2">$ <span data-plugin="counterup">65,841</span></h3>
                      <p class="m-0"> Ene - Dic {{$lastYear}}</p>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <div class="col-xl-3 col-sm-6">
      <div class="card">
          <div class="card-body">
              <div class="d-flex justify-content-between">
                  <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                      <i class="mdi mdi-shipping-pallet avatar-title font-30 text-white"></i>
                  </div>

                  <div class="wigdet-two-content media-body text-end text-truncate">
                      <p class="m-0 text-uppercase fw-medium text-truncate" title="Statistics">Pedidos Activos</p>
                      <h3 class="fw-medium my-2"><span data-plugin="counterup">{{$pedidosActivos}}</span></h3>
                      <p class="m-0"> {{$pedidos->count()}} Pedidos totales</p>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <div class="col-xl-3 col-sm-6">
      <div class="card">
          <div class="card-body">
              <div class="d-flex justify-content-between">
                  <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                      <i class="mdi mdi-finance avatar-title font-30 text-white"></i>
                  </div>

                  <div class="wigdet-two-content media-body text-end text-truncate">
                      <p class="m-0 text-uppercase fw-medium text-truncate" title="Statistics">Balance General</p>
                      <h3 class="fw-medium my-2"><span data-plugin="counterup">{{$pedidosActivos}}</span></h3>
                      <p class="m-0"> {{$pedidos->count()}} Pedidos totales</p>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

{{-- END 1ST BLOCK --}}

<div class="row">

<div class="col-md-6 col-lg-3">

  {{-- CARD PAGOS IMSS,ISN,SAT --}}
  <div class="card">
    <div class="card-body">
      <h4 class="header-title">Pagos mensuales</h4>
      <div class="row">
        <div class="col-lg-4 text-center pt-2 pb-2">
          <a href="{{ route('imss.index') }}">
          @if($ImssPayments > 0)
          <i class="fas fa-4x fa-briefcase-medical text-danger"></i>
          @else
          <i class="fas fa-4x fa-briefcase-medical text-success"></i>
          @endif
          @if($ImssPayments > 0)
            <br> <p class="badge bg-danger">{{ $ImssPayments }} pendientes</p>
          @else
            <br> <p class="badge bg-success">{{ $ImssPayments }} pendientes</p>
          @endif
          <p>IMSS</p>
        </a>
        </div>
        <div class="col-lg-4 text-center pt-2 pb-2">
          <a href="{{ route('declaracion.index') }}">
            @if($IsnPayments > 0)
            <i class="fas fa-4x fa-file-invoice-dollar text-danger"></i>
            @else
            <i class="fas fa-4x fa-file-invoice-dollar text-success"></i>
            @endif
            @if($IsnPayments > 0)
            <br> <p class="badge bg-danger">{{ $IsnPayments }} pendientes</p>
            @else
            <br> <p class="badge bg-success">{{ $IsnPayments }} pendientes</p>
            @endif
            <p>Pagos SAT</p>
          </a>
        </div>
        <div class="col-lg-4 text-center pt-2 pb-2">
          <a href="{{ route('isn.index') }}">
            @if($SatPayments > 0)
            <i class="fas fa-4x fa-clipboard text-danger"></i>
            @else
            <i class="fas fa-4x fa-clipboard text-success"></i>
            @endif
            @if($SatPayments > 0)
            <br> <p class="badge bg-danger">{{ $SatPayments }} pendientes</p>
            @else
            <br> <p class="badge bg-success">{{ $SatPayments }} pendientes</p>
            @endif
            <p>Pagos 2%</p>
          </a>
        </div>
      </div>
    </div>
  </div>
  {{-- TERMINA CARD PAGOS IMSS,ISN,SAT --}}

  {{-- CAJA CHICA --}}
    <div class="card">
      <div class="card-body">
        <h4 class="header-title">Caja chica: <span class="text-success"> ${{ number_format($balance, 2) }}</span></h4>
        <div class="table-responsive">
          <table class="table table-striped table-sm p-1">
            <thead>
              <tr>
                <th>Fecha</th>
                <th>Monto</th>
                <th>Área</th>
                <th>Descripción</th>
              </tr>
            </thead>
            <tbody>
              @foreach($movimientos as $movimiento)
              <tr>
                <td>{{ date_format($movimiento->created_at,"d/m/y") }}</td>
                @if(ucfirst($movimiento->tipo) == "Salida")
                <td class="text-danger">- ${{ number_format($movimiento->monto, 2) }}</td>
                @else
                <td class="text-success">${{ number_format($movimiento->monto, 2) }}</td>
                @endif
                @switch($movimiento->area)
                @case('comidas')
                <td><span class="fnt10 badge badge-pill task-type-8">Comidas</span></td>
                @break
                @case('casa')
                <td><span class="fnt10 badge badge-pill task-type-7">Pagos Casa</span></td>
                @break
                @case('salarios_casa')
                <td><span class="fnt10 badge badge-pill task-type-4">Casa</span></td>
                @break
                @case('salarios_negocio')
                <td><span class="fnt10 badge badge-pill task-type-3">Eppor</span></td>
                @break
                @case('gastos_negocio')
                <td><span class="fnt10 badge badge-pill task-type-6">Gastos Eppor</span></td>
                @break
                @case('gasolinas')
                <td><span class="fnt10 badge badge-pill task-type-1">Gasolinas</span></td>
                @break
                @case('miscelaneos')
                <td><span class="fnt10 badge badge-pill task-type-8">Miscelaneos</span></td>
                @break
                @case('prestamo')
                <td><span class="fnt10 badge badge-pill task-type-5">Prestamo</span></td>
                @break
                @case('ingreso')
                <td><span class="fnt10 badge badge-pill task-type-2">Ingreso</span></td>
                @break
                @default
                Default case...
                @endswitch
                <td>{{ $movimiento->descripcion }}</td>
              </tr>

              @endforeach
            </tbody>
          </table>
        </div>
        <a href="{{ route('movimientos.index') }}" class="btn btn-primary">Ver detalles</a>
      </div>
    </div>
  {{-- END CAJA CHICA --}}

</div>
{{-- TERMINA COLUMNA 1 --}}

<div class="col-md-6">

  {{--VENTAS--}}
  <div class="card">
    <div class="card-body">
      <h4 class="header-title">Ventas</h4>
      <canvas id="AnualSales" class="AnualSales" height="50%"></canvas>
    </div>
  </div>
  {{-- END VENTAS --}}

  {{-- PEDIDOS --}}
  <div class="card">
    <div class="card-body">
      <h4 class="header-title">Pedidos activos</h4>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <th>Cliente</th>
            <th>Fecha de pedido</th>
            <th>Factura</th>
            <th>Monto</th>
            <th>Estatus</th>
            <th>Saldo</th>
            <th>Vendedor</th>
            <th>Acciones</th>
          </thead>
          <tbody>
            @foreach($ultimospedidos as $pedido)
            <tr>
              <td>{{ $pedido->cliente->identificador }}</td>
              @if($pedido->fecha != null)
              <td>{{ date('d/m/y', strtotime($pedido->fecha)) }}</td>
              @else
              <td>Sin Fecha</td>
              @endif
              @if($pedido->factura == true)
              <td><span class="badge rounded-pill bg-primary">Facturada</span> </td>
              @else
              <td><span class="badge rounded-pill bg-secondary">Sin Factura</span> </td>
              @endif
              <td>${{ number_format($pedido->total, 2) }}</td>
              @switch($pedido->estado)
              @case('ordenado')
              <td> <span class="badge rounded-pill bg-primary"><i class="fas fa-circle"></i> Ordenado </span></td>
              @break
              @case('produccion')
              <td> <span class="badge rounded-pill bg-warning"><i class="fas fa-circle"></i> Produccion </span></td>
              @break
              @case('terminado')
              <td> <span class="badge rounded-pill bg-success"><i class="fas fa-circle"></i> Terminado </span></td>
              @break
              @case('entregado')
              <td> <span class="badge rounded-pill bg-success"><i class="fas fa-circle"></i> Entregado </span></td>
              @break
              @case('espera')
              <td> <span class="badge rounded-pill bg-warning"><i class="fas fa-circle"></i> Espera </span></td>
              @break
              @case('cancelado')
              <td> <span class="badge rounded-pill bg-danger"><i class="fas fa-circle"></i> Cancelado </span></td>
              @break
              @case('convertida')
              <td> <span class="badge rounded-pill bg-success"><i class="fas fa-circle"></i> Convertida </span></td>
              @break
              @default
              <td> <span class="badge rounded-pill bg-secondary"><i class="fas fa-circle"></i> n/a </span></td>
              @endswitch
              <td>${{ number_format($pedido->saldo, 2) }}</td>
              <td>{{ $pedido->usuario->name }}</td>
              <td>
                <a class="text-info" href="{{ route('pedidos.show', $pedido->id) }}"> <i class="fas fa-eye"></i> </a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

    </div>
  </div>
  {{-- END PEDIDOS --}}

</div>
{{-- END COLUMNA CENTRAL --}}

<div class="col-md-12 col-lg-3">

  {{-- GRAFICO COBRANZA --}}
  <div class="card">
    <div class="card-body">
      <h4 class="header-title">Cobranza</h4>
      <canvas id="graficaSaldosTotales"   data-saldo='@json($totalSaldoPedidos)' data-cobrado='@json($totalCobradoPedidos)'> </canvas>
      <div class="row pt-4">
        <div class="col-12 col-lg-6">
          <p class="text-success"><i class="fas fa-circle"></i> Total en pedidos</p>
        </div>
        <div class="col-12 col-lg-6">
          <p class="text-danger"><i class="fas fa-circle"></i> Saldo x pagar</p>
        </div>
      </div>
    </div>
  </div>
  {{-- END GRAFICO COBRANZA --}}


  {{-- GRAFICA PRODUCTOS VENDIDOS --}}
  <div class="card">
    <div class="card-body">
      <h4 class="header-title">Productos mas vendidos</h4>
      <canvas id="graficaProductosAnuales"  data-labels='@json($productosUltimoAnio->pluck("nombre"))'  data-values='@json($productosUltimoAnio->pluck("total"))'> </canvas>
      <div class="row pt-4">
        @foreach($productosUltimoAnio as $productosContado)
        <div class="col-12">
          <p class="fnt_type{{$loop->index+1}}">
            <i class="fas fa-circle"></i>
            {{ ucfirst(Str::lower(Str::limit($productosContado->nombre, 40))) }}
          </p>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  {{-- END GRAFICA PRODUCTOS VENDIDOS --}}

</div>
{{-- TERMINAN COLUMNAS --}}

</div>


<!--- end row -->
@endsection

@section('scripts')
@vite(['resources/js/nexus/dashboard.js'])
@endsection