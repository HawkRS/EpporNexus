@extends('layouts.vertical')
@section('title', 'Cotizaciones')
@section('section', 'cotizacionindex')

@section('content')
<div class="content-page">
  <!-- Start content -->
  <div class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-sm-12">
          <div class="page-title-box">
            <h4 class="page-title fnt26 text-uppercase fntB">COTIZACIONES</h4>
          </div>
        </div>
      </div>
      <!-- end row -->

      <div class="page-content-wrapper">
        <div class="row justify-content-center">
          <div class="col-12 col-md-10">
            <div class="card p-3">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <h4 class="card-title mb-5 text-dark">Registro de cotizaciones</h4>
                  </div>
                  <div class="col-md-4">
                    <span class="text-right">
                      {{--<a href="{{route('cotizacion.create')}}" class="btn btn-sm btn-success">Nueva cotizacion</a>--}}
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#PedidoModal">
                        Nueva cotización
                      </button>
                    </span>
                  </div>
                </div>


                <div class="table-responsive">
                  <table id="PedidoTable" class="table table-striped table-hover align-middle ">
                      <thead>
                        <tr>
                            <th class="fnt_blue fntB">Folio</th>
                            <th class="fnt_blue fntB">Cliente</th>
                            <th class="fnt_blue fntB">Total</th>
                            <th class="fnt_blue fntB">Factura</th>
                            <th class="fnt_blue fntB">Saldo</th>
                            <th class="fnt_blue fntB">Estado</th>
                            <th class="fnt_blue fntB">Entrega</th>
                            <th class="fnt_blue fntB">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cotizaciones as $cotizacion)
                        <tr>
                            <td>{{ $cotizacion->folio }}</td>
                            <td>{{ $cotizacion->cliente->identificador }}</td>
                            <td>${{ number_format($cotizacion->total, 2) }}</td>
                            @if($cotizacion->factura == true)
                              <td><span class="text-primary"><i class="fas fa-circle"></i> Facturada</span> </td>
                            @else
                              <td><span class="text-secondary"><i class="fas fa-circle"></i> Sin Factura</span> </td>
                            @endif
                            <td>${{ number_format($cotizacion->saldo, 2) }}</td>
                              @switch($cotizacion->estado)
                                @case('ordenado')
                                    <td> <span class="text-primary"><i class="fas fa-circle"></i> ordenado </span></td>
                                    @break
                                @case('produccion')
                                    <td> <span class="text-warning"><i class="fas fa-circle"></i> produccion </span></td>
                                    @break
                                @case('terminado')
                                    <td> <span class="text-success"><i class="fas fa-circle"></i> terminado </span></td>
                                    @break
                                @case('entregado')
                                    <td> <span class="text-success"><i class="fas fa-circle"></i> entregado </span></td>
                                    @break
                                @case('espera')
                                    <td> <span class="text-warning"><i class="fas fa-circle"></i> espera </span></td>
                                    @break
                                @case('cancelado')
                                    <td> <span class="text-danger"><i class="fas fa-circle"></i> cancelado </span></td>
                                    @break
                                @case('convertida')
                                    <td> <span class="text-success"><i class="fas fa-circle"></i> convertida </span></td>
                                    @break
                                @default
                                    <td> <span class="text-secondary"><i class="fas fa-circle"></i> n/a </span></td>
                              @endswitch
                            <td>{{ $cotizacion->metodo_entrega == 'recoger' ? 'Cliente recoge' : 'Enviado' }}</td>
                            <td>
                              <a class="text-info" href="{{ route('cotizacion.show', $cotizacion->id) }}"> <i class="fas fa-eye"></i> </a>&nbsp;
                              <a class="text-warning" href="{{ route('cotizacion.edit', $cotizacion->id) }}"> <i class="fas fa-edit"></i> </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div> <!-- end col -->



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
        <h5 class="modal-title" id="PedidoModalLabel">Nueva cotización</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="" action="{{ route('cotizacion.create') }}" method="GET">
            {{ csrf_field() }}
          <div class="row">

            <div class="col-12">
                <label for="cliente_id" class="fntB">CLIENTE</label>
                <select class="custom-select" name="cliente_id">
                  <option selected>Elige una opción</option>
                  @foreach($clientes as $cliente)
                      <option value="{{$cliente->id}}" class="text-uppercase">{{$cliente->identificador}}</option>
                  @endforeach
                </select>
                <small id="emailHelp" class="form-text text-muted">Elige el cliente.</small>
              @error('cliente_id')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

          </div>

          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Generar</button>
          <a href="{{route('cliente.create')}}" class="btn btn-primary">Nuevo cliente</a>
        </form>
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>

@endsection
