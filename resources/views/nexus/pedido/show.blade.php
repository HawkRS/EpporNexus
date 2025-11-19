@extends('layouts.vertical', ['title' => 'Pedidos'])

@section('css')

@endsection

@section('content')
@include('layouts.partials.page-title', ['subtitle' => 'Pedidos', 'title' => 'Detalle'])

<div class="row">

  <div class="col-md-8">
    <div class="card">
      <div class="card-body">
        <h2 class="fntB fnt_blue"><i class="fas fa-file-invoice"></i> Pedido # {{ $pedido->folio }}</h2>
        <a href="{{route('pedidos.index')}}" class="btn btn-sm btn-primary">Regresar</a>
        <div  class="row fnt16 text-uppercase pt-4">
          <div class="table-responsive">
            <table class="table table-sm table-borderless">
              <tbody>
                <tr class="bg-primary">
                  <td class="bg-primary text-fixed-white"><strong>Cliente:</strong> {{$cliente->identificador}}</td>
                  <td class="bg-primary text-fixed-white"><strong>RFC:</strong> {{$cliente->rfc}}</td>
                  <td class="bg-primary text-fixed-white"><strong>Fecha:</strong> {{ date('d/m/y', strtotime($pedido->fecha)) }}</td>
                </tr>
              </tbody>
            </table>
            <table class="table table-sm table-borderless">
              <tbody>
                <tr>
                  <td><strong>Dirección:</strong> {{$cliente->direccion}}</td>
                  <td><strong>Colonia:</strong> {{$cliente->colonia}}</td>
                </tr>
                <tr>
                  <td><strong>Ciudad:</strong> {{$cliente->municipio}}</td>
                  <td><strong>Estado:</strong> {{$cliente->estado}}, {{$cliente->pais}}</td>
                </tr>
                <tr>
                  <td><strong>Telefono:</strong> {{$cliente->telefono}}</td>
                  <td><strong>Código postal:</strong> {{$cliente->codigopostal}}</td>
                </tr>
              </tbody>
            </table>
            <table>
              <tbody>
                <table id="PedidoTable" class="table table-sm table-borderless table-striped table-hover align-middle ">
                  <thead class="bg-primary">
                    <th class="text-fixed-white">Acciones</th>
                    <th class="text-fixed-white">Cantidad</th>
                    <th class="text-fixed-white">Descripción</th>
                    <th class="text-fixed-white">P/Unitario</th>
                    <th class="text-fixed-white">Importe</th>
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
                      <div id="productos-container"></div>

                      <!-- Total del pedido -->
                      <div>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        @if($pedido->factura == 0)
                        <td class="bg-primary text-fixed-white"><strong>TOTAL</strong></td>
                        @else
                        <td class="bg-primary text-fixed-white"><strong>SUBTOTAL</strong></td>
                        @endif
                        <td>${{ number_format($pedido->subtotal, 2) }}</td>
                      </tr>
                      @if($pedido->factura == 1)
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="bg-primary text-fixed-white"><strong>IVA 16%</strong></td>
                        <td>${{ number_format($pedido->iva, 2) }}</td>
                      </tr>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="bg-primary text-fixed-white"><strong>TOTAL</strong></td>
                        <td>${{ number_format($pedido->total, 2) }}</td>
                      </tr>
                      @endif
                    </tbody>
                  </thead>
                </table>
              </tbody>
            </table>
          </div>
          <div class="col-md-8 d-grid d2">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddProdModal">Agregar Producto</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- END CARD COTIZACIÓN --}}

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
          <div class="text-center pb-3">
          <h5 class="fnt18 fntB fnt_blue">Estatus:  &nbsp;
            @switch($pedido->estado)
            @case('ordenado')
            <span class="fnt18 badge badge-soft-primary"><i class="fas fa-circle"></i> Ordenado</span>
            <p class="text-muted pt-3"><i class="fas fa-4x fa-cart-shopping"></i></p>
            @break
            @case('produccion')
            <span class="fnt18 badge badge-soft-warning"><i class="fas fa-circle"></i> Produccion</span>
            <p class="text-muted pt-3"><i class="fas fa-4x fa-helmet-safety"></i></p>
            @break
            @case('terminado')
            <span class="fnt18 badge badge-soft-success"><i class="fas fa-circle"></i> Terminado</span>
            <p class="text-muted pt-3"><i class="fas fa-4x fa-boxes-stacked"></i></p>
            @break
            @case('entregado')
            <span class="fnt18 badge badge-soft-success"><i class="fas fa-circle"></i> Entregado</span>
            <p class="text-muted pt-3"><i class="fas fa-4x fa-cart-flatbed"></i></p>
            @break
            @case('espera')
            <span class="fnt18 badge badge-soft-warning"><i class="fas fa-circle"></i> Espera</span>
            <p class="text-muted pt-3"><i class="fas fa-4x fa-hourglass-half"></i></p>
            @break
            @case('cancelado')
            <span class="fnt18 badge badge-soft-danger"><i class="fas fa-circle"></i> Cancelado</span>
            <p class="text-muted pt-3"><i class="fas fa-4x fa-xmark"></i></p>
            @break
            @default
            <span class="fnt22 fntB text-secondary"><i class="fas fa-circle"></i> N/A</span>
            <p class="text-muted pt-3"><i class="fas fa-4x fa-notdef"></i></p>
            @endswitch
          </h5>
          <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#StatusModal">
            Actualizar estatus
          </button>
        </div>
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
            <div class="col-12 text-center text-muted">
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
