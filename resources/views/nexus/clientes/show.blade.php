
@extends('layouts.vertical')
@section('title', 'Clientes')
@section('section', 'clientes')

@section('content')

<div class="content-page">
  <!-- Start content -->
  <div class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-12">
          <div class="page-title-box">
            <h4 class="page-title fnt26 text-uppercase fntB">Clientes</h4>
            {{--
              <div class="state-information d-none d-sm-block">
                <div class="state-graph">
                  <div id="header-chart-1"></div>
                  <div class="info">Balance $ 2,317</div>
                </div>
                <div class="state-graph">
                  <div id="header-chart-2"></div>
                  <div class="info">Item Sold 1230</div>
                </div>
              </div>
              --}}

            </div>
          </div>
        </div>
        <!-- end row -->

        <div class="page-content-wrapper">
          <div class="row justify-content-center">
            <div class="col-12 col-md-4">

              <div class="col-12">
                <div class="card p-3">
                  <div class="card-body pb-0">
                    <h4 class="fntB fnt24 fnt_blue"><i class="fas fa-file-invoice"></i> Datos fiscales
                      <a href="{{ route('cliente.edit', ['id' => $cliente->id ]) }}" class="text-info"> &nbsp;<i class="fas fa-edit"></i> </a>
                    </h4>
                    <hr>
                    <p class="fntB fnt_dgrey"><strong>Nombre (comercial): </strong> {{ $cliente->identificador }}</p>
                    <p class="fntB fnt_dgrey"><strong>Razón social: </strong> {{ $cliente->razonsocial }}</p>
                    <p class="fntB fnt_dgrey"><strong>RFC: </strong> {{ $cliente->rfc }}</p>
                    <p class="fntB fnt_dgrey"><strong>Código Postal: </strong> {{ $cliente->codigopostal }}</p>
                    <p class="fntB fnt_dgrey"><strong>Régimen: </strong> {{ $cliente->codigopostal }}</p>
                    <p class="fntB fnt_dgrey"><strong>Telefono: </strong> {{ $cliente->telefono }}</p>
                  </div>
                  <div class="card-body pt-0">
                    <h5 class="fntB fnt20 fnt_blue"><i class="fas fa-address-book"></i> Domicilio</h5>
                    <hr>
                    <p class="fntB fnt_dgrey"><strong>Dirección: </strong> {{ $cliente->direccion }}</p>
                    <p class="fntB fnt_dgrey"><strong>Ciudad/Colonia: </strong> {{ $cliente->colonia }}</p>
                    <p class="fntB fnt_dgrey"><strong>Estado: </strong> {{ $cliente->estado }}</p>
                    <p class="fntB fnt_dgrey"><strong>País: </strong>  {{ $cliente->pais }}</p>
                  </div>
                </div>
              </div>

              {{--
              <div class="col-12">

                <div class="card">
                  <div class="card-body table-responsive">
                    <h5 class="fnt_blueL fnt20 fntB">Contactos</h5>
                    <table class="table table-sm table-striped">
                      <thead class="fnt_blue">
                        <tr>
                          <th class="fntB">Nombre</th>
                          <th class="fntB">Telefono 1</th>
                          <th class="fntB">Telefono 2</th>
                          <th class="fntB">Correo</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>OLGA</td>
                          <td>33 65 45 65 85</td>
                          <td>--</td>
                          <td>OLGA@MAIL.COM</td>
                        </tr>
                        <tr>
                          <td>OLGA</td>
                          <td>33 65 45 65 85</td>
                          <td>--</td>
                          <td>OLGA@MAIL.COM</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="card">
                  <div class="card-body table-responsive">
                    <h5 class="fntB fnt_blueL fnt20">Datos bancarios</h5>
                    <table class="table table-sm table-striped">
                      <thead class="fnt_blue">
                        <tr>
                          <th class="fntB">Banco</th>
                          <th class="fntB">Cuente</th>
                          <th class="fntB">Sucursal</th>
                          <th class="fntB">Clabe</th>
                          <th class="fntB">Tarjeta</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><span class="badge badge-danger fntB">SANTANDER</span> </td>
                          <td>4513357</td>
                          <td>7007</td>
                          <td>231646468433536135</td>
                          <td>--</td>
                        </tr>
                        <tr>
                          <td><span class="badge badge-primary fntB">BANAMEX</span> </td>
                          <td>4513357</td>
                          <td>7007</td>
                          <td>231646468433536135</td>
                          <td>--</td>
                        </tr>
                        <tr>
                          <td><span class="badge badge-light fntB text-danger">HSBC</span> </td>
                          <td>4513357</td>
                          <td>7007</td>
                          <td>231646468433536135</td>
                          <td>--</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              --}}

            </div> <!-- end col -->

            <div class="col-12 col-md-8">
              <div class="row">

                <div class="col-12 col-md-4">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="fntB fnt_blue fnt24">Pedidos</h4>
                      <span class="float-right fnt30 fntB text-success">{{$pedidos->count()}}</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-md-4">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="fntB fnt_blue fnt24">Cotizaciones</h4>
                      <span class="float-right fnt30 fntB text-success">{{$pedidos->count()}}</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-md-4">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="fntB fnt_blue fnt24">Saldo total</h4>
                      <span class="float-right fnt30 fntB text-success">${{ number_format($saldo, 2) }}</span>
                    </div>
                  </div>
                </div>

                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-8">
                          <h4 class="fntB fnt_blueL fnt18">Pedidos</h4>
                        </div>
                        <div class="col-md-4">
                          <span class="text-right">
                            {{--<a href="{{route('pedidos.create')}}" class="btn btn-sm btn-success">Nuevo pedido</a>--}}
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#PedidoModal">
                              Nuevo pedido
                            </button>
                          </span>
                        </div>
                      </div>


                      <div class="table-responsive">
                        <table id="PedidoTable" class="table table-striped table-hover align-middle ">
                            <thead>
                              <tr>
                                  <th class="fnt_blue fntB">Folio</th>
                                  <th class="fnt_blue fntB">Total</th>
                                  <th class="fnt_blue fntB">Factura</th>
                                  <th class="fnt_blue fntB">Saldo</th>
                                  <th class="fnt_blue fntB">Estado</th>
                                  <th class="fnt_blue fntB">Entrega</th>
                                  <th class="fnt_blue fntB">Acciones</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach($pedidos as $pedido)
                              <tr>
                                  <td>{{ $pedido->folio }}</td>
                                  <td>${{ number_format($pedido->total, 2) }}</td>
                                  @if($pedido->factura == true)
                                    <td><span class="fnt13 text-primary"><i class="fas fa-circle"></i> Facturada</span> </td>
                                  @else
                                    <td><span class="fnt13 text-secondary"><i class="fas fa-circle"></i> Sin Factura</span> </td>
                                  @endif
                                  <td>${{ number_format($pedido->saldo, 2) }}</td>
                                    @switch($pedido->estado)
                                      @case('ordenado')
                                          <td> <span class="fnt13 text-primary"><i class="fas fa-circle"></i> ordenado </span></td>
                                          @break
                                      @case('produccion')
                                          <td> <span class="fnt13 text-warning"><i class="fas fa-circle"></i> produccion </span></td>
                                          @break
                                      @case('terminado')
                                          <td> <span class="fnt13 text-success"><i class="fas fa-circle"></i> terminado </span></td>
                                          @break
                                      @case('entregado')
                                          <td> <span class="fnt13 text-success"><i class="fas fa-circle"></i> entregado </span></td>
                                          @break
                                      @case('espera')
                                          <td> <span class="fnt13 text-warning"><i class="fas fa-circle"></i> espera </span></td>
                                          @break
                                      @case('cancelado')
                                          <td> <span class="fnt13 text-danger"><i class="fas fa-circle"></i> cancelado </span></td>
                                          @break
                                      @default
                                          <td> <span class="fnt13 text-secondary"><i class="fas fa-circle"></i> n/a </span></td>
                                    @endswitch
                                  <td>{{ $pedido->metodo_entrega == 'recoger' ? 'Cliente recoge' : 'Enviado' }}</td>
                                  <td>
                                      <a class="text-info" href="{{ route('pedidos.show', $pedido->id) }}"> <i class="fas fa-eye"></i> </a>&nbsp;
                                      <a class="text-warning" href="{{ route('pedidos.edit', $pedido->id) }}"> <i class="fas fa-edit"></i> </a>
                                  </td>
                              </tr>
                              @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-8">
                          <h4 class="fntB fnt_blueL fnt18">Cotizaciones</h4>
                        </div>
                        <div class="col-md-4">
                          <span class="text-right">
                            {{--<a href="{{route('pedidos.create')}}" class="btn btn-sm btn-success">Nuevo pedido</a>--}}
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#PedidoModal">
                              Nuevo pedido
                            </button>
                          </span>
                        </div>
                      </div>


                      <div class="table-responsive">
                        <table id="CotizacionTable" class="table table-striped table-hover align-middle ">
                            <thead>
                              <tr>
                                  <th class="fnt_blue fntB">Folio</th>
                                  <th class="fnt_blue fntB">Total</th>
                                  <th class="fnt_blue fntB">Factura</th>
                                  <th class="fnt_blue fntB">Saldo</th>
                                  <th class="fnt_blue fntB">Estado</th>
                                  <th class="fnt_blue fntB">Entrega</th>
                                  <th class="fnt_blue fntB">Acciones</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach($pedidos as $pedido)
                              <tr>
                                  <td>{{ $pedido->folio }}</td>
                                  <td>${{ number_format($pedido->total, 2) }}</td>
                                  @if($pedido->factura == true)
                                    <td><span class="fnt13 text-primary"><i class="fas fa-circle"></i> Facturada</span> </td>
                                  @else
                                    <td><span class="fnt13 text-secondary"><i class="fas fa-circle"></i> Sin Factura</span> </td>
                                  @endif
                                  <td>${{ number_format($pedido->saldo, 2) }}</td>
                                    @switch($pedido->estado)
                                      @case('ordenado')
                                          <td> <span class="fnt13 text-primary"><i class="fas fa-circle"></i> ordenado </span></td>
                                          @break
                                      @case('produccion')
                                          <td> <span class="fnt13 text-warning"><i class="fas fa-circle"></i> produccion </span></td>
                                          @break
                                      @case('terminado')
                                          <td> <span class="fnt13 text-success"><i class="fas fa-circle"></i> terminado </span></td>
                                          @break
                                      @case('entregado')
                                          <td> <span class="fnt13 text-success"><i class="fas fa-circle"></i> entregado </span></td>
                                          @break
                                      @case('espera')
                                          <td> <span class="fnt13 text-warning"><i class="fas fa-circle"></i> espera </span></td>
                                          @break
                                      @case('cancelado')
                                          <td> <span class="fnt13 text-danger"><i class="fas fa-circle"></i> cancelado </span></td>
                                          @break
                                      @default
                                          <td> <span class="fnt13 text-secondary"><i class="fas fa-circle"></i> n/a </span></td>
                                    @endswitch
                                  <td>{{ $pedido->metodo_entrega == 'recoger' ? 'Cliente recoge' : 'Enviado' }}</td>
                                  <td>
                                    <a class="text-info" href="{{ route('pedidos.show', $pedido->id) }}"> <i class="fas fa-eye"></i> </a>&nbsp;
                                    <a class="text-warning" href="{{ route('pedidos.edit', $pedido->id) }}"> <i class="fas fa-edit"></i> </a>
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


          </div> <!-- end row -->
        </div>
      </div>
    </div>
  </div>

  @endsection
