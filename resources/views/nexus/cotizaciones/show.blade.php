@extends('layouts.vertical', ['title' => 'Cotizaciones'])

@section('css')

@endsection

@section('content')
@include('layouts.partials.page-title', ['subtitle' => 'Cotizaciones', 'title' => 'Detalle'])

<div class="row">

  <div class="col-md-9">
    <div class="card">
      <div class="card-body">
        <h2 class="fntB fnt_blue"><i class="fas fa-file-invoice"></i> Cotización # {{ $cotizacion->folio }}</h2>
        <div  class="row fnt16 text-uppercase pt-4">
          <div class="table-responsive">
            <table class="table table-sm table-borderless">
              <tbody>
                <tr class="bg-primary">
                  <td class="bg-primary "><strong>Cliente:</strong> {{$cliente->identificador}}</td>
                  <td class="bg-primary "><strong>RFC:</strong> {{$cliente->rfc}}</td>
                  <td class="bg-primary "><strong>Fecha:</strong> {{ date('d/m/y', strtotime($cotizacion->fecha)) }}</td>
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
                    <th class="text-light">Acciones</th>
                    <th class="text-light">Cantidad</th>
                    <th class="text-light">Descripción</th>
                    <th class="text-light">P/Unitario</th>
                    <th class="text-light">Importe</th>
                    <tbody>
                      @foreach($cotizacion->productos as $cotizacionProducto)
                      <tr>
                        <td>
                          <a href="#" class="text-warning"><i class="fas fa-edit"></i></a>
                          <a href="#" class="text-danger"><i class="fas fa-trash-alt"></i></a>
                        </td>
                        <td>{{ $cotizacionProducto->pivot['cantidad']}}</td>
                        <td>{{ $cotizacionProducto->nombre }}</td>
                        <td>${{ number_format($cotizacionProducto->pivot['precio'], 2) }}</td>
                        <td>${{ number_format($cotizacionProducto->pivot['total'], 2) }}</td>

                      </tr>
                      @endforeach
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        @if($cotizacion->factura == 0)
                        <td class="bg-primary text-light"><strong>TOTAL</strong></td>
                        @else
                        <td class="bg-primary text-light"><strong>SUBTOTAL</strong></td>
                        @endif
                        <td>${{ number_format($cotizacion->subtotal, 2) }}</td>
                      </tr>
                      @if($cotizacion->factura == 1)
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="bg-primary text-light"><strong>IVA 16%</strong></td>
                        <td>${{ number_format($cotizacion-> iva, 2) }}</td>
                      </tr>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="bg-primary text-light"><strong>TOTAL</strong></td>
                        <td>${{ number_format($cotizacion-> total, 2) }}</td>
                      </tr>
                      @endif
                    </tbody>
                  </thead>
                </table>
              </tbody>
            </table>
          </div>





        </div>
        </div>
      </div>
  </div>
  {{-- END CARD COTIZACIÓN --}}

  <div class="col-md-3">
    <div class="card">
      <div class="card-body">
        <h5 class="fnt18 fntB fnt_blue">Acciones</h5>
        <div class="row">
          <div class="col-md-6 pt-2 d-grid gap-2"> <a href="{{route('cotizacion.edit', ['id'=>$cotizacion->id])}}" class="btn btn btn-block btn-warning">Editar pedido</a> </div>
          <div class="col-md-6 pt-2 d-grid gap-2">
            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#PDFModal">Generar PDF</button>
          </div>
          <div class="col-md-6 pt-2 d-grid gap-2">
            <form method="POST" action="{{ route('cotizacion.pedido', $cotizacion->id) }}">
                @csrf
                <button class="btn btn btn-info" type="submit">Convertir a pedido</button>
            </form>
          </div>
          <div class="col-md-6 pt-2 d-grid gap-2"> <a href="#" class="btn btn btn-block btn-primary">Cambiar cliente</a> </div>
        </div>
      </div>
    </div>
  </div>

</div>

@include ('nexus.cotizaciones.partials.pdfmodal')

@endsection
