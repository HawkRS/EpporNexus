@extends('layouts.vertical')
@section('title', 'Pedidos - Alta')
@section('section', 'pedidos')

@section('content')
<script>
    var productosDisponibles = @json($productos);
</script>
<div class="content-page">
  <!-- Start content -->
  <div class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title fnt26 text-uppercase fntB">Pedidos - alta</h4>
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
          <div class="col-md-5">
            <div class="card m-b-20">
              <div class="card-body">
                <div class="invoice-title">
                  <div class="row">
                    <div class="col-md-6">
                      <h2>CREAR COTIZACIÓN</h2>
                    </div>
                    <div class="col-md-6 pt-xs-3 pt-md-0">
                      <h4 class="float-right-md font-size-16"><strong>Order # 12345</strong></h4>
                    </div>
                  </div>
                  <div class="pt-3">
                    <h5><strong class="fntB fnt_blue">Cliente:</strong> {{$cliente->identificador}}</h5>
                    <p><strong class="fntB fnt_blue"><i class="fas fa-id-card"></i> RFC:</strong> {{$cliente->rfc}}</p>
                    <p><strong class="fntB fnt_blue"><i class="fas fa-user"></i> Razon Social:</strong> {{$cliente->razonsocial}}</p>
                    <p><strong class="fntB fnt_blue"><i class="fas fa-envelope"></i> E-mail:</strong> {{$cliente->correo}}</p>
                    <p><strong class="fntB fnt_blue"><i class="fas fa-phone"></i> Telefono:</strong> {{$cliente->telefono}}</p>
                    <p><strong class="fntB fnt_blue"><i class="fas fa-map-marker-alt"></i> Domicilio:</strong> {{$cliente->direccion}},CP: {{$cliente->codigopostal}}, {{$cliente->estado}}</p>
                  </div>
                  @if ( count( $errors ) > 0 )
                      @foreach ($errors->all() as $error)
                          <div class="pt-3 text-danger">{{ $error }}</div>
                      @endforeach
                  @endif
                  <div class="pt-3">
                    <div class="row justify-content-center">
                      <div class="col-md-4  pt-xs-3 pt-md-0">
                        <a href="#" class="btn btn-block btn-primary">Editar Cliente</a>
                      </div>
                      <div class="col-md-4  pt-xs-3 pt-md-0">
                        <a href="#" class="btn btn-block btn-warning">Cambiar cliente</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-7">
            <div class="card m-b-20">
              <div class="card-body">
                <!-- Formulario de datos del pedido -->
                <form id="pedido-form" method="POST" action="{{ route('cotizacion.store') }}">
                  @csrf
                  <input type="hidden" name="cliente_id" value="{{ $cliente->id }}">
                  <input type="hidden" name="usuario_id" value="{{ Auth::user()->id }}">
                  <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-3">
                      <label class="form-group">Fecha de la cotización:</label>
                      <input class="form-control" type="date" name="fecha_pedido" required>
                    </div>

                    <div class="col-md-6 col-lg-3">
                      <label class="form-group">Factura:</label>
                      <select class="form-control" name="factura" id="factura-select">
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                      </select>
                    </div>

                    <div class="col-md-6 col-lg-3">
                      <label class="form-group">Método de entrega:</label>
                      <select class="form-control" name="metodo_entrega" required>
                        <option value="envio">Envío</option>
                        <option value="recoger">Recoger</option>
                      </select>
                    </div>

                    <div class="col-md-6 col-lg-3">
                      <label class="form-group">Estado:</label>
                      <select class="form-control" name="estado" id="factura-select">
                        <option value="ordenado">Ordenado</option>
                        <option value="produccion">En produccion</option>
                        <option value="terminado">Terminado</option>
                        <option value="entregado">Entregado</option>
                        <option value="espera">Espera</option>
                        <option value="cancelado">Cancelado</option>
                      </select>
                    </div>
                  </div>

                  <!-- Productos -->
                  <div class="row justify-content-center pt-4">

                    <div class="col-md-4">
                      <h2 class="mt-0">Productos</h2>
                    </div>
                    <div class="col-md-4">
                      <button class="btn btn-small btn-primary" type="button" id="agregar-producto">Agregar Producto</button>
                    </div>
                    <div class="col-md-4">
                      <button class="btn btn-small btn-success" type="submit">Guardar cotización</button>
                    </div>
                  </div>

                  <div id="productos-container"></div>

                  <!-- Total del pedido -->
                  <div>
                    <label class="form-group fnt26 text-primary">Total:</label>
                    <input class="form-control" type="text" id="total" readonly>
                  </div>

                </form>

              </div>
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>
</div>
@endsection
