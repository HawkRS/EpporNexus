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
            <a href="{{route('pedidos.index')}}" class="btn btn-sm btn-primary">Regresar</a>
            </div>
          </div>
        </div>
        <!-- end row -->
        <div class="page-content-wrapper">
          <div class="row justify-content-center">

            @if ($errors->any())
            <script>
              var bolsaerrores = {!! json_encode($errors->all()) !!};
            </script>
            <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="errorModalLabel">¡Atención! Errores de Validación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                      {{ $error }}
                    </div>
                    @endforeach
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                  </div>
                </div>
              </div>
            </div>
            @else
            <script>
              var bolsaerrores = {!! json_encode(0) !!};
            </script>
            @endif


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
                            <th class="text-primary">Acciones</th>
                            <th class="text-primary">Cantidad</th>
                            <th class="text-primary">Descripción</th>
                            <th class="text-primary">P/Unitario</th>
                            <th class="text-primary">Importe</th>
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
                                <td class="fnt18 text-primary"><strong>TOTAL</strong></td>
                                @else
                                <td class="fnt18 text-primary"><strong>SUBTOTAL</strong></td>
                                @endif
                                <td>${{ number_format($pedido->subtotal, 2) }}</td>
                              </tr>
                              @if($pedido->factura == 1)
                              <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="fnt18 text-primary"><strong>IVA 16%</strong></td>
                                <td>${{ number_format($pedido-> iva, 2) }}</td>
                              </tr>
                              <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="fnt18 text-primary"><strong>TOTAL</strong></td>
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

            <div class="col-md-4">

              <div class="card m-b-20">
                <div class="card-body">
                  <h5 class="fnt18 fntB fnt_blue">Saldo: <span class=" fnt18 fntB  text-danger">${{ number_format($pedido->saldo, 2) }}</span></h5>
                  <div class="row">
                    <div class="col-md-6">
                      <h5 class="fnt18 fntB fnt_blue">Pagos</h5>
                    </div>
                    <div class="col-md-6">
                      <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addPagoModal">
                        Agregar Pago
                      </button>
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
                        <?php
                          // Mapeo para los métodos de pago
                          $METODOS_MAP = [
                              '1' => 'Efectivo',
                              '2' => 'Transferencia',
                              '6' => 'Deposito',
                              '3' => 'Cheque',
                              '4' => 'Mercado Libre',
                              '5' => 'Otro',
                          ];

                          // Mapeo para los bancos
                          $BANCOS_MAP = [
                              '1' => 'Banamex GOMC',
                              '2' => 'Banamex GOHC',
                              '3' => 'HSBC DAGH',
                              '4' => 'Mercado Libre',
                              '5' => 'Otro',
                          ];
                        ?>
                        @foreach($pedido->pagos as $pago)
                        <tr>
                            <td>{{ date('d-m-y', strtotime($pago->fecha)) }}</td>
                            <td> {{ $METODOS_MAP[$pago->metodo] ?? 'Valor Desconocido' }} </td>
                            <td>
                                @if ($pago->banco)
                                    {{ $BANCOS_MAP[$pago->banco] ?? 'N/A' }}
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>${{ number_format($pago->monto, 2) }}</td>
                            <td>
                                <!-- AÑADIDA LA CLASE 'editPagoBtn' -->
                                <button class="text-warning editPagoBtn"
                                data-id="{{ $pago->id }}"
                                data-fecha="{{ $pago->fecha }}"
                                data-metodo="{{ $pago->metodo }}"
                                data-banco="{{ $pago->banco }}"
                                data-monto="{{ $pago->monto }}"
                                data-bs-toggle="modal" data-bs-target="#editPagoModal">
                                <i class="fas fa-edit"></i>
                                </button>
                                <!-- Button trigger modal -->
                                <form action="{{ route('pagos.delete', $pago->id) }}" method="POST" class="d-inline delete-form">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="text-danger deletePagoBtn">
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
                <div class="row">
                  <div class="col-md-6">
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
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#StatusModal">
                      Actualizar estatus
                    </button>
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
                  <div class="col-md-6 text-center">
                    <h5 class="fnt18 fntB fnt_blue">Metodo de entrega</h5>
                    <div class="row">
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
                                <button class="float-right btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addGuiaModal">Agregar guia</button>
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

            <div class="card">
              <div class="card-body">
                <h5 class="fnt18 fntB fnt_blue">Acciones</h5>
                <div class="row">
                  <div class="col-md-6 pt-2 d-grid gap-2"> <a href="{{route('pedidos.edit', ['id'=>$pedido->id])}}" class="btn btn-block btn-warning">Editar pedido</a> </div>
                  <div class="col-md-6 pt-2 d-grid gap-2"> <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#PDFModal">Generar PDF</button> </div>
                  <div class="col-md-6 pt-2 d-grid gap-2"> <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#PaqueteriaModal">Paqueteria</button> </div>
                  <div class="col-md-6 pt-2 d-grid gap-2"> <a href="#" class="btn btn-block btn-primary">Cambiar cliente</a> </div>
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








        @include('nexus.pedido.partials.modalpdf')
        @include('nexus.pedido.partials.modalpaqueteria')
        @include('nexus.pedido.partials.modaladdpago')
        @include('nexus.pedido.partials.modaladdguia')
        @include('nexus.pedido.partials.modaleditpago')
        @include('nexus.pedido.partials.modalupdatestatus')


          @endsection

          @section('scripts')
          @vite(['resources/js/nexus/pedidoshow.js'])
          @endsection
