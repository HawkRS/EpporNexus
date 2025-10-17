@extends('layouts.vertical')
@section('title', 'Cotizacion - Detalle')
@section('section', 'cotizacion')

@section('content')
<!-- Modal PDF -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Generación PDF</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('cotizacion.pdf', ['id'=>$cotizacion->id])}}" method="post">
          @csrf
          @method('POST')

          <div class="form-group">
              <label>Datos personales</label>
              <select  name="datos" class="form-control">
                  <option >Elige una opción</option disabled>
                  <option value="1">GOMC</option>
                  <option value="2">Eppor</option>
                  <option value="3">Ambos</option>
                  <option value="4">Ninguno</option>
              </select>
          </div>
          <div class="form-group">
              <label>¿Con información bancaria?</label>
              <select  name="bancoflag" class="form-control">
                  <option >Elige una opción</option disabled>
                  <option value="1">Si</option>
                  <option value="2">No</option>
              </select>
          </div>
          <div class="form-group">
              <label>Info bancaria</label>
              <select  name="banco" class="form-control">
                  <option >Elige una opción</option disabled>
                  <option value="1">Banamex GOMC</option>
                  <option value="2">Banamex GOHC</option>
                  <option value="3">HSBC DAGH</option>
                  <option value="4">Otro</option>
              </select>
          </div>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Generar</button>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="content-page">
  <!-- Start content -->
  <div class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-sm-12">
          <div class="page-title-box">
            <h4 class="page-title fnt26 text-uppercase fntB">Cotización - detalle</h4>
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

            <div class="col-md-4">
              <div class="card m-b-20">
                <div class="card-body">
                  <div class="invoice-title">

                    <h2 class="fntB fnt_blue">COTIZACIÓN</h2>

                    <div class="pt-3">
                      <h5 class="fntB fnt_blue">
                        <i class="fas fa-file-invoice"></i> &nbsp;  Folio:
                        <span class="fntB  text-primary"># {{ $cotizacion->folio }}</span>
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
                        <div class="col-md-3  pt-xs-3 pt-md-0">
                          <a href="{{route('cotizacion.edit', ['id'=>$cotizacion->id])}}" class="btn btn-block btn-primary">Actualizar info</a>
                        </div>
                        <div class="col-md-3  pt-xs-3 pt-md-0">
                          <a href="#" class="btn btn-block btn-warning">Cambiar cliente</a>
                        </div>
                        <div class="col-md-3  pt-xs-3 pt-md-0">
                          <button type="button" class="btn btn-block btn-secondary" data-toggle="modal" data-target="#staticBackdrop">
                            Generar PDF
                          </button>
                        </div>
                        <div class="col-md-3">
                          <form method="POST" action="{{ route('cotizacion.pedido', $cotizacion->id) }}">
                              @csrf
                              <button class="btn btn-block btn-info" type="submit">Convertir a pedido</button>
                          </form>
                        </div>
                      </div>
                    </div>
                      @if(session('error'))
                          <div class="alert alert-danger">{{ session('error') }}</div>
                      @endif
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
                          @switch($cotizacion->estado)
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
                          @case('convertida')
                          <span class="fnt18 fntB text-danger"><i class="fas fa-circle"></i> Pedida</span>
                          @break
                          @default
                          <span class="fnt22 fntB text-success"><i class="fas fa-circle"></i> N/A</span>
                          @endswitch

                        </div>
                      </div>
                    </div>
                    <div class=" col-md-3">
                      <div class="card m-b-20">
                        <div class="card-body text-center">
                          <h5 class="fnt18 fntB fnt_blue">Total:</h5>
                          <span class=" fnt18 fntB  text-primary">${{ number_format($cotizacion->total, 2) }}</span>

                        </div>
                      </div>
                    </div>
                    <div class=" col-md-3">
                      <div class="card m-b-20">
                        <div class="card-body text-center">
                          <h5 class="fnt18 fntB fnt_blue">Saldo:</h5>
                          <span class=" fnt18 fntB  text-danger">${{ number_format($cotizacion->saldo, 2) }}</span>
                        </div>
                      </div>
                    </div>
                    <div class=" col-md-3">
                      <div class="card m-b-20">
                        <div class="card-body text-center">
                          <h5 class="fnt18 fntB fnt_blue">Metodo de entrega:</h5>
                          <span class=" fnt18 fntB text-capitalize  text-dark">{{ $cotizacion->metodo_entrega }}</span>
                        </div>
                      </div>
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
                            @foreach($cotizacion->productos as $cotizacion)
                            <tr>
                              <td>{{ $cotizacion->nombre }}</td>
                              <td>{{ $cotizacion->pivot['cantidad']}}</td>

                              <td>${{ number_format($cotizacion->pivot['precio'], 2) }}</td>
                              <td>{{ $cotizacion->pivot['descuento'] }}%</td>
                              <td>${{ number_format($cotizacion->pivot['total'], 2) }}</td>
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



          </div>

        </div>
      </div>
    </div>

  </div>
</div>
</div>


@endsection