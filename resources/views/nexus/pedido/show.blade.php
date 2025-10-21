@extends('layouts.vertical')
@section('title', 'Pedidos - Detalle')
@section('section', 'pedidosshow')

@section('content')

<div class="content-page">
  <!-- Start content -->
  <div class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-sm-12">
          <div class="page-title-box">
            <h4 class="page-title fnt26 text-uppercase fntB">Pedidos - detalle</h4>
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

            <div class="col-8">
              <div class="card">
                <div class="card-body">
                  <h2 class="fntB fnt_blue"><i class="fas fa-file-invoice"></i> Folio # {{ $pedido->folio }}</h2>
                  <div  class="row fnt16 text-uppercase pt-4">
                    <div class="col-md-9">
                      <span class="fntB fnt20 fnt_blue">Cliente:</span> {{$cliente->identificador}}
                    </div>
                    <div class="col-md-3">
                      @if($pedido->fecha != null)
                      <span class="fntB fnt_blue">Fecha:</span> {{ date('d/m/y', strtotime($pedido->fecha)) }}
                      @else
                      <span class="fntB fnt_blue">Fecha:</span> Sin Fecha
                      @endif
                    </div>
                    <div class="col-md-9">
                      <span class="fntB fnt_blue">Dirección:</span> {{$cliente->direccion}}
                    </div>
                    <div class="col-md-3">
                      <span class="fntB fnt_blue">Telefono:</span> {{$cliente->telefono}}
                    </div>
                    <div class="col-md-9">
                      <span class="fntB fnt_blue">Colonia:</span> {{$cliente->colonia}}
                    </div>
                    <div class="col-md-3">
                      <span class="fntB fnt_blue">Estado:</span> {{$cliente->estado}}, {{$cliente->pais}}
                    </div>
                    <div class="col-md-9">
                      <span class="fntB fnt_blue">Ciudad:</span> {{$cliente->municipio}}
                    </div>
                    <div class="col-md-3">
                      <span class="fntB fnt_blue">Email:</span> {{$cliente->correo}}
                    </div>
                  </div>

                  <div class="row pt-4">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="PedidoTable" class="table table-striped table-hover align-middle ">
                          <thead class="fnt_blue">
                            <th>ACCIONES</th>
                            <th>CANTIDAD</th>
                            <th>DESCRIPCIÓN</th>
                            <th>P/UNITARIO</th>
                            <th>IMPORTE</th>
                            <tbody>
                              @foreach($pedido->productos as $pedidoProducto)
                              <tr>
                                <td>
                                  <a href="#" class="text-warning"><i class="fas fa-edit"></i></a>
                                  <a href="#" class="text-danger"><i class="fas fa-trash-alt"></i></a>
                                </td>
                                <td>{{ $pedidoProducto->pivot['cantidad']}}</td>
                                <td>{{ $pedidoProducto->nombre }}</td>
                                <td>${{ number_format($pedidoProducto->pivot['precio'], 2) }}</td>
                                <td>${{ number_format($pedidoProducto->pivot['total'], 2) }}</td>

                              </tr>
                              @endforeach
                              <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                @if($pedido->factura == 0)
                                <td class="fntB fnt18 fnt_blue">TOTAL</td>
                                @else
                                <td class="fntB fnt18 fnt_blue">SUBTOTAL</td>
                                @endif
                                <td>${{ number_format($pedido->subtotal, 2) }}</td>
                              </tr>
                              @if($pedido->factura == 1)
                              <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="fntB fnt18 fnt_blue">IVA 16%</td>
                                <td>${{ number_format($pedido-> iva, 2) }}</td>
                              </tr>
                              <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="fntB fnt18 fnt_blue">TOTAL</td>
                                <td>${{ number_format($pedido-> total, 2) }}</td>
                              </tr>
                              @endif
                            </tbody>
                          </thead>
                        </table>
                      </div>
                    </div>{{-- END TABLE --}}
                    <div class="col-12">
                      <h5 class="fnt18 fntB fnt_blue">Observaciones</h5>
                      <p>{{$pedido->comentarios}}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-3">

              <div class="card m-b-20">
                <div class="card-body">
                  <h5 class="fnt18 fntB fnt_blue">Saldo: <span class=" fnt18 fntB  text-danger">${{ number_format($pedido->saldo, 2) }}</span></h5>
                  <div class="row">
                    <div class="col-md-6">
                      <h5 class="fnt18 fntB fnt_blue">Pagos</h5>
                    </div>
                    <div class="col-md-6">
                      <button class="float-right btn btn-sm btn-primary" data-toggle="modal" data-target="#addPagoModal">Agregar Pago</button>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-striped table-sm">
                      <thead>
                        <tr>
                          <th class="fnt_blue fntB">Fecha</th>
                          <th class="fnt_blue fntB">Método</th>
                          <th class="fnt_blue fntB">Banco</th>
                          <th class="fnt_blue fntB">Monto</th>
                          <th class="fnt_blue fntB">Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($pedido->pagos as $pago)
                        <tr>
                          <td>{{ $pago->fecha }}</td>
                          <td>{{ $pago->metodo }}</td>
                          <td>{{ $pago->banco ?? 'N/A' }}</td>
                          <td>${{ number_format($pago->monto, 2) }}</td>
                          <td>
                            <button class="btn btn-warning btn-sm editPagoBtn"
                            data-id="{{ $pago->id }}"
                            data-fecha="{{ $pago->fecha }}"
                            data-metodo="{{ $pago->metodo }}"
                            data-banco="{{ $pago->banco }}"
                            data-monto="{{ $pago->monto }}"
                            data-toggle="modal" data-target="#editPagoModal">
                            <i class="fas fa-edit"></i>
                          </button>
                          <form action="{{ route('pagos.delete', $pago->id) }}" method="POST" class="d-inline delete-form">
                            @csrf
                            @method('POST')
                            <button type="submit" class="btn btn-danger btn-sm deletePagoBtn">
                              <i class="fas fa-trash-alt"></i>
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

            <div class="card">
              <div class="card-body">
                <h5 class="fnt18 fntB fnt_blue">Estatus:  &nbsp;
                  @switch($pedido->estado)
                  @case('ordenado')
                  <span class="fnt18 fntB text-primary"><i class="fas fa-circle"></i> Ordenado</span>
                  @break
                  @case('produccion')
                  <span class="fnt18 fntB text-warning"><i class="fas fa-circle"></i> Produccion</span>
                  @break
                  @case('terminado')
                  <span class="fnt18 fntB text-success"><i class="fas fa-circle"></i> Terminado</span>
                  @break
                  @case('entregado')
                  <span class="fnt18 fntB text-success"><i class="fas fa-circle"></i> Entregado</span>
                  @break
                  @case('espera')
                  <span class="fnt18 fntB text-warning"><i class="fas fa-circle"></i> Espera</span>
                  @break
                  @case('cancelado')
                  <span class="fnt18 fntB text-danger"><i class="fas fa-circle"></i> Cancelado</span>
                  @break
                  @default
                  <span class="fnt22 fntB text-secondary"><i class="fas fa-circle"></i> N/A</span>
                  @endswitch
                </h5>
                <h5 class="fnt18 fntB fnt_blue">Canal de venta: &nbsp;
                  <span class=" fnt16 fntB  text-primary">
                    @switch($pedido->canaldeventa)
                    @case('1')
                    Contacto directo
                    @break
                    @case('2')
                    Facebook/Whats
                    @break
                    @case('3')
                    Mercado Libre
                    @break
                    @case('4')
                    Vendedor externo
                    @break
                    @case('5')
                    Tradicional
                    @break
                    @case('6')
                    Otro
                    @break
                    @default
                    N/A
                    @endswitch
                  </span>
                </h5>

              </div>
            </div>

            <div class="card ">
              <div class="card-body">
                <div class="row">
                  <div class="col-12">
                    <h5 class="fnt18 fntB fnt_blue">Metodo de entrega</h5>
                  </div>
                  <div class="col-12 text-center fnt_grey">
                    @if($pedido->metodo_entrega == "envio")
                    <p class="pt-3"><i class="fas fa-4x fa-shipping-fast"></i></p>
                    <p class="fnt18 fntB">Envio por paqueteria</p>
                    @else
                    <p class="pt-3"><i class="fas fa-4x fa-truck-loading"></i></p>
                    <p class="fnt18 fntB">Cliente recoge en bodega</p>
                    @endif
                  </div>
                  @if($pedido->metodo_entrega == "envio")
                  <div class="col-12">
                    <table class="table table-sm">
                      <tbody>
                        <tr>
                          @if($pedido->HasGuia() == null)
                          <td>Sin Guia</td>
                          <td>
                            <button class="float-right btn btn-sm btn-primary" data-toggle="modal" data-target="#addGuiaModal">Agregar guia</button>
                          </td>
                          @else
                          <td>{{$pedido->HasGuia()->paqueteria}}</td>
                          <td>{{$pedido->HasGuia()->guia}}</td>
                          @endif
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  @endif
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-body">
                <h5 class="fnt18 fntB fnt_blue">Acciones</h5>
                <div class="row">
                  <div class="col-12 pt-2"> <a href="{{route('pedidos.edit', ['id'=>$pedido->id])}}" class="btn btn-block btn-primary">Editar pedido</a> </div>
                  <div class="col-12 pt-2"> <button type="button" class="btn btn-block btn-secondary" data-toggle="modal" data-target="#generarPDF">Generar PDF </button> </div>
                  <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#myModal">Standard Modal</button>
                  <div class="col-12 pt-2"> <button type="button" class="btn btn-block btn-info" data-toggle="modal" data-target="#paqueteria">Paqueteria </button> </div>
                  <div class="col-12 pt-2"> <a href="#" class="btn btn-block btn-warning">Cambiar cliente</a> </div>
                </div>
              </div>
            </div>

          </div>

          <div class="col-md-3">
            <div class="card m-b-20">
              <div class="card-body">
                <div class="invoice-title">

                  <h2 class="fntB fnt_blue">PEDIDO</h2>

                  <div class="pt-3">
                    <h5 class="fntB fnt_blue">
                      <i class="fas fa-file-invoice"></i> &nbsp;  Folio:
                      <span class="fntB  text-primary"># {{ $pedido->folio }}</span>
                    </h5>
                    <h5><strong class="fntB fnt_blue"><i class="fas fa-user-tag"></i> &nbsp;  Cliente:</strong> {{$cliente->identificador}}</h5>
                    <p><strong class="fntB fnt_blue"><i class="fas fa-id-card"></i> &nbsp; RFC:</strong>
                      {{$cliente->rfc}}
                    </p>
                    <p><strong class="fntB fnt_blue"><i class="fas fa-user"></i> &nbsp; Razon Social:</strong> {{$cliente->razonsocial}}</p>
                    <p><strong class="fntB fnt_blue"><i class="fas fa-envelope"></i> &nbsp; E-mail:</strong> {{$cliente->correo}}</p>
                    <p><strong class="fntB fnt_blue"><i class="fas fa-phone"></i> &nbsp; Telefono:</strong> {{$cliente->telefono}}</p>
                    <p><strong class="fntB fnt_blue"><i class="fas fa-map-marker-alt"></i> &nbsp; Domicilio:</strong> {{$cliente->direccion}},CP: {{$cliente->codigopostal}}, {{$cliente->estado}}</p>
                  </div>
                  @if ( count( $errors ) > 0 )
                  @foreach ($errors->all() as $error)
                  <div class="pt-3 text-danger">{{ $error }}</div>
                  @endforeach
                  @endif
                  <div class="pt-3">
                    <div class="row justify-content-center">
                      <div class="col-md-4  pt-xs-3 pt-md-0">
                        <a href="{{route('pedidos.edit', ['id'=>$pedido->id])}}" class="btn btn-block btn-primary">Editar pedido</a>
                      </div>
                      <div class="col-md-4  pt-xs-3 pt-md-0">
                        <a href="#" class="btn btn-block btn-warning">Cambiar cliente</a>
                      </div>
                      <div class="col-md-4  pt-xs-3 pt-md-0">
                        <button type="button" class="btn btn-block btn-secondary" data-toggle="modal" data-target="#generarpdf">
                          Generar PDF
                        </button>
                        <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#PedidoModal">Nuevo pedido</button>
                      </div>
                      {{--
                        <div class="col-md-4  pt-3">
                          <button type="button" class="btn btn-block btn-secondary" data-toggle="modal" data-target="#paqueteria">
                            Paqueteria
                          </button>
                        </div>
                        --}}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-12 col-md-6">
              <div class="row">

                <div class="col-12">

                  <div class="row">
                    <div class=" col-md-3">
                      <div class="card m-b-20">
                        <div class="card-body text-center">
                          <h5 class="fnt18 fntB fnt_blue">Estatus:</h5>
                          @switch($pedido->estado)
                          @case('ordenado')
                          <span class="fnt18 fntB text-primary"><i class="fas fa-circle"></i> Ordenado</span>
                          @break
                          @case('produccion')
                          <span class="fnt18 fntB text-warning"><i class="fas fa-circle"></i> Produccion</span>
                          @break
                          @case('terminado')
                          <span class="fnt18 fntB text-success"><i class="fas fa-circle"></i> Terminado</span>
                          @break
                          @case('entregado')
                          <span class="fnt18 fntB text-success"><i class="fas fa-circle"></i> Entregado</span>
                          @break
                          @case('espera')
                          <span class="fnt18 fntB text-warning"><i class="fas fa-circle"></i> Espera</span>
                          @break
                          @case('cancelado')
                          <span class="fnt18 fntB text-danger"><i class="fas fa-circle"></i> Cancelado</span>
                          @break
                          @default
                          <span class="fnt22 fntB text-secondary"><i class="fas fa-circle"></i> N/A</span>
                          @endswitch

                        </div>
                      </div>
                    </div>
                    <div class=" col-md-3">
                      <div class="card m-b-20">
                        <div class="card-body text-center">
                          <h5 class="fnt18 fntB fnt_blue">Total:</h5>
                          <span class=" fnt18 fntB  text-primary">${{ number_format($pedido->total, 2) }}</span>

                        </div>
                      </div>
                    </div>
                    <div class=" col-md-3">
                      <div class="card m-b-20">
                        <div class="card-body text-center">
                          <h5 class="fnt18 fntB fnt_blue">Saldo:</h5>
                          <span class=" fnt18 fntB  text-danger">${{ number_format($pedido->saldo, 2) }}</span>
                        </div>
                      </div>
                    </div>

                    <div class=" col-md-3">
                      <div class="card m-b-20">
                        <div class="card-body text-center">
                          <h5 class="fnt18 fntB fnt_blue">Canal de venta:</h5>
                          <span class=" fnt16 fntB  text-primary">
                            @switch($pedido->canaldeventa)
                            @case('1')
                            Contacto directo
                            @break
                            @case('2')
                            Facebook/Whats
                            @break
                            @case('3')
                            Mercado Libre
                            @break
                            @case('4')
                            Vendedor externo
                            @break
                            @case('5')
                            Tradicional
                            @break
                            @case('6')
                            Otro
                            @break
                            @default
                            N/A
                            @endswitch
                          </span>
                        </div>
                      </div>
                    </div>

                  </div>

                </div>

                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="fnt18 fntB fnt_blue">Observaciones</h5>
                      <p>{{$pedido->comentarios}}</p>
                    </div>
                  </div>
                </div>

                <div class="col-12">

                  <div class="card m-b-20">
                    <div class="card-body">
                      <h5 class="fnt18 fntB fnt_blue">Listado de productos</h5>

                      <div class="table-responsive">
                        <table id="PedidoTable" class="table table-striped table-hover align-middle ">
                          <thead class="fnt_blue">
                            <tr>
                              <th class="fntB fnt16">Producto</th>
                              <th class="fntB fnt16">Cantidad</th>
                              <th class="fntB fnt16">Precio</th>
                              <th class="fntB fnt16">Descuento</th>
                              <th class="fntB fnt16">Total</th>
                              <th class="fntB fnt16">Acciones</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($pedido->productos as $pedidoProducto)
                            <tr>
                              <td>{{ $pedidoProducto->nombre }}</td>
                              <td>{{ $pedidoProducto->pivot['cantidad']}}</td>

                              <td>${{ number_format($pedidoProducto->pivot['precio'], 2) }}</td>
                              <td>{{ $pedidoProducto->pivot['descuento'] }}%</td>
                              <td>${{ number_format($pedidoProducto->pivot['total'], 2) }}</td>
                              <td>
                                <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
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

            <div class="col-md-3">
              <div class="row">
                <div class="col-12">
                  <div class="card ">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-12">
                          <h5>Metodo de entrega</h5>
                        </div>
                        <div class="col-12 text-center fnt_grey">
                          @if($pedido->metodo_entrega == "envio")
                          <p class="pt-3"><i class="fas fa-4x fa-shipping-fast"></i></p>
                          <p class="fnt18 fntB">Envio por paqueteria</p>
                          @else
                          <p class="pt-3"><i class="fas fa-4x fa-truck-loading"></i></p>
                          <p class="fnt18 fntB">Cliente recoge en bodega</p>
                          @endif
                        </div>
                        @if($pedido->metodo_entrega == "envio")
                        <div class="col-12">
                          <table class="table table-sm">
                            <tbody>
                              <tr>
                                @if($pedido->HasGuia() == null)
                                <td>Sin Guia</td>
                                <td>
                                  <button class="float-right btn btn-sm btn-primary" data-toggle="modal" data-target="#addGuiaModal">Agregar guia</button>
                                </td>
                                @else
                                <td>{{$pedido->HasGuia()->paqueteria}}</td>
                                <td>{{$pedido->HasGuia()->guia}}</td>
                                @endif
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>

          </div>

        </div>
      </div>
    </div>

  </div>
</div>
</div>

<!-- Modal Agregar Pago -->
<div class="modal fade" id="addPagoModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Agregar Pago</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form action="{{ route('pagos.store') }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label>Fecha</label>
            <input type="date" name="fecha" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Método</label>
            <select name="metodo" class="form-control" required>
              <option >Elige una opción</option disabled>
                <option value="1">Efectivo</option>
                <option value="2">Transferencia</option>
                <option value="6">Deposito</option>
                <option value="3">Cheque</option>
                <option value="4">Mercado Libre</option>
                <option value="5">Otro</option>
              </select>
            </div>
            <div class="form-group">
              <label>Banco</label>
              <select  name="banco" class="form-control">
                <option >Elige una opción</option disabled>
                  <option value="1">Banamex GOMC</option>
                  <option value="2">Banamex GOHC</option>
                  <option value="3">HSBC DAGH</option>
                  <option value="4">Mercado Libre</option>
                  <option value="5">Otro</option>
                </select>
              </div>
              <div class="form-group">
                <label>Monto</label>
                <input type="number" name="monto" step="0.01" class="form-control" required>
              </div>
              <div class="form-group">
                <input type="hidden" name="pedido_id" value="{{$pedido->id}}" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Guardar</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal Editar Pago -->
    <div class="modal fade" id="editPagoModal" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Editar Pago</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <form id="editPagoForm" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-body">
              <div class="form-group">
                <label>Fecha</label>
                <input type="date" name="fecha" id="editFecha" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Método</label>
                <input type="text" name="metodo" id="editMetodo" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Banco</label>
                <input type="text" name="banco" id="editBanco" class="form-control">
              </div>
              <div class="form-group">
                <label>Monto</label>
                <input type="number" name="monto" id="editMonto" step="0.01" class="form-control" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Guardar cambios</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal PDF -->
    <div class="modal fade" id="paqueteria" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="paqueteriaLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="paqueteriaLabel">Paqueterias</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{route('pedidos.pdf', ['id'=>$pedido->id])}}" method="post">
              @csrf
              @method('POST')
              <div class="form-group">
                <label>Paqueteria</label>
                <select  name="paqinfo" class="form-control">
                  <option >Elige una opción</option disabled>
                    <option value="1">Tres Guerras</option>
                    <option value="2">Castores</option>
                    <option value="3">Otro</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Info de envio</label>
                  <select id="datosenvio"  name="datosenvio" class="form-control">
                    <option >Elige una opción</option disabled>
                      <option value="1">Misma del pedido</option>
                      <option value="2">Otro</option>
                    </select>
                  </div>
                  <div id="datosenviootros" style="display:none">
                    <div class="form-group">
                      <label>Receptor</label>
                      <input class="form-control" type="text" name="receptor" value="">
                    </div>
                    <div class="form-group">
                      <label>Telefono</label>
                      <input class="form-control" type="text" name="numtelefono" value="">
                    </div>
                    <div class="form-group">
                      <label>Domicilio</label>
                      <input class="form-control" type="text" name="domicilio" value="">
                    </div>
                    <div class="form-group">
                      <label>Colonia</label>
                      <input class="form-control" type="text" name="colonia" value="">
                    </div>
                    <div class="form-group">
                      <label>Ciudad</label>
                      <input class="form-control" type="text" name="ciudad" value="">
                    </div>
                    <div class="form-group">
                      <label>Estado</label>
                      <input class="form-control" type="text" name="estado" value="">
                    </div>
                    <div class="form-group">
                      <label>Codigo Postal</label>
                      <input class="form-control" type="number" name="codigopostal" value="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Cantidad de etiquetas para producto</label>
                    <input class="form-control" type="number" name="numetiquetas" value="">
                  </div>

                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-primary">Generar</button>
                </form>
              </div>
            </div>
          </div>
        </div>

        @include('nexus.pedido.partials.modalpdf')

        <!-- Modal Editar Pago -->
        <div class="modal fade" id="addGuiaModal" tabindex="-1">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Agregar Guia</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <form action="{{ route('pedidos.addguia', ['id'=>$pedido->id]) }}" method="POST">
                @csrf
                <div class="modal-body">
                  <div class="form-group">
                    <label>Paqueteria</label>
                    <input type="text" name="paqueteria" class="form-control" required>
                  </div>

                  <div class="form-group">
                    <label>N° Guia</label>
                    <input type="text" name="guia"  class="form-control" required>
                    </div
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          @endsection

          @section('scripts')
          @vite(['resources/js/nexus/pedidoshow.js'])
          @endsection
