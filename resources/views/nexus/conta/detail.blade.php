@extends('layouts.vertical', ['title' => 'CONTABILIDAD'])
@section('title', 'Contabilidad')
@section('section', 'contadet')

@section('content')
<?php use Carbon\Carbon; ?>
@include('layouts.partials.page-title', ['subtitle' => 'Contabilidad', 'title' => 'Detalle'])
<div class="content-page">
  <!-- Start content -->
  <div class="content">
    <div class="container-fluid">

      <div class="row">
          <div class="col-sm-12">
              <div class="page-title-box">
                  <h4 class="page-title fnt26 text-uppercase fntB">Contabilidad</h4>
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item active fnt20 fntB">{{ $rfc }}</li>
                      @if($rfc == 'HEGS650524ST3')
                        <li class="breadcrumb-item active fnt20 fntB text-uppercase">susana hernandez gomez</li>
                      @elseif($rfc == 'GOHC9010197I0')
                        <li class="breadcrumb-item active fnt20 fntB text-uppercase">carlos alberto gonzález hernández</li>
                      @elseif($rfc == 'GOMC631007NC2')
                        <li class="breadcrumb-item active fnt20 fntB text-uppercase">carlos alberto gonzález melendez</li>
                      @ENDIF
                      <li class="breadcrumb-item active fnt20 fntB text-uppercase">
                        <a href="{{ route('conta.show', ['rfc' => $rfc, 'year' => $year ]) }}"> {{ $year }}</a>

                      </li>
                      <li class="breadcrumb-item active fnt20 fntB text-uppercase">
                        <a href="{{ route('conta.add.ingreso', ['rfc' => $rfc, 'year' => $year, 'month' => $month]) }}"> {{ $monthname }}</a>
                      </li>
                  </ol>
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
      {{-- end row --}}
      <div class="page-content-wrapper">

        <div class="row">

          <div class="col-xl-3 col-sm-6">
              <div class="card">
                  <div class="card-body">
                      <div class="d-flex justify-content-between">
                          <div class="avatar-lg rounded-circle bg-success widget-two-icon align-self-center">
                                <i class="mdi mdi-cash-register avatar-title font-30 text-white "></i>
                          </div>

                          <div class="wigdet-two-content media-body text-end text-truncate">
                              <p class="m-0 text-uppercase fnt20 text-truncate" title="Statistics">Ingresos $<span data-plugin="counterup">{{ number_format($ingresomensual['total'], 2) }}</span></p>
                              <p class="m-0">Facturado</p>
                              <h3 class="fw-medium">$<span data-plugin="counterup">{{ number_format($ingresomensual['facturados'], 2) }}</span></h3>
                              <p class="m-0">Publico Gral</p>
                              <h3 class="fw-medium">$<span data-plugin="counterup">{{ number_format($ingresomensual['publicogral'], 2) }}</span></h3>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <div class="col-xl-3 col-sm-6">
              <div class="card">
                  <div class="card-body">
                      <div class="d-flex justify-content-between">
                          <div class="avatar-lg rounded-circle bg-danger widget-two-icon align-self-center">
                              <i class="mdi mdi-cash avatar-title font-30 text-white"></i>
                          </div>

                          <div class="wigdet-two-content media-body text-end text-truncate">
                              <p class="m-0 text-uppercase fnt20 text-truncate" title="Statistics">Egresos $<span data-plugin="counterup">{{ number_format($egresomensual['total'], 2) }}</span></p>
                              <p class="m-0">Facturado</p>
                              <h3 class="fw-medium">$<span data-plugin="counterup">{{ number_format($egresomensual['total'], 2) }}</span></h3>
                              <p class="m-0">&nbsp;</p>
                              <h3 class="fw-medium">&nbsp;</h3>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <div class="col-xl-3 col-sm-6">
              <div class="card">
                  <div class="card-body">
                      <div class="d-flex justify-content-between">
                        @if($balance['diffivas'] >=0)
                            <div class="avatar-lg rounded-circle bg-success widget-two-icon align-self-center">
                        @else
                            <div class="avatar-lg rounded-circle bg-danger widget-two-icon align-self-center">
                        @endif
                              <i class="mdi mdi-bank avatar-title font-30 text-white"></i>
                          </div>

                          <div class="wigdet-two-content media-body text-end text-truncate">
                              <p class="m-0 text-uppercase fnt20 text-truncate" title="Statistics">saldo Ivas $<span data-plugin="counterup">{{ number_format($balance['diffivas'], 2) }}</span></p>
                              <p class="m-0">Acreditable</p>
                              <h3 class="fw-medium">$<span data-plugin="counterup">{{ number_format($egresomensual['ivaacreeditable'], 2) }}</span></h3>
                              <p class="m-0">Transladado</p>
                              <h3 class="fw-medium">$<span data-plugin="counterup">{{ number_format($ingresomensual['ivatrasladado'], 2) }}</span></h3>
                          </div>
                      </div>
                  </div>
              </div>
          </div>


        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                      @if($balance['balance'] >=0)
                          <div class="avatar-lg rounded-circle bg-success widget-two-icon align-self-center">
                      @else
                          <div class="avatar-lg rounded-circle bg-danger widget-two-icon align-self-center">
                      @endif
                            <i class="mdi mdi-currency-usd avatar-title font-30 text-white"></i>
                        </div>

                        <div class="wigdet-two-content media-body text-end text-truncate">
                            <p class="m-0 text-uppercase fnt20 text-truncate" title="Statistics">Saldo ISR $<span data-plugin="counterup">{{ number_format($balance['diffivas'], 2) }}</span></p>
                            <p class="m-0">Facturado</p>
                            <h3 class="fw-medium">$<span data-plugin="counterup">{{ number_format($balance['balance'], 2) }}</span></h3>
                            <p class="m-0">&nbsp;</p>
                            <h3 class="fw-medium">&nbsp;</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>



        {{-- END BLOQUES --}}
        <div class="row">

          <div class="col-md-6">
            <div class="card">
              <div class="card-body">
                <h4 class="header-title text-success">Ingresos</h4>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ingresoModal">
                  AGREGAR INGRESO
                </button>
                <div class="my-1">&nbsp;</div>
                <div class="table-responsive">
                  <table id='IngresoTable' class="table table-sm table-striped">
                    <thead>
                      <th class="text-success fntB">Fecha</th>
                      <th class="text-success fntB">Cliente</th>
                      <th class="text-success fntB">Folio</th>
                      <th class="text-success fntB">Subtotal</th>
                      <th class="text-success fntB">IVA</th>
                      <th class="text-success fntB">Total</th>
                      <th class="text-success fntB">Tipo</th>
                      <th class="text-success fntB">Acciones</th>
                    </thead>
                    <tbody>
                      @foreach($ingresos as $ingreso)
                          <?php
                          // OJO: Si $ingreso->cliente() es una relación de Eloquent,
                          // debes usar $ingreso->cliente en lugar de $ingreso->cliente()
                          // para acceder al objeto relacionado.
                          $cliente = $ingreso->cliente(); // Suponiendo que corregiste el modelo para usar la relación como propiedad
                          ?>
                          @if($ingreso->estatus == 2)
                              <tr class="table-warning">
                          @elseif($ingreso->estatus == 3)
                              <tr class="table-info">
                          @else
                              <tr>
                          @endif
                              {{-- 1. Celda de Fecha --}}
                              <td>{{ Carbon::parse($ingreso->fecha)->format('d/m/Y') }}</td>

                              {{-- 2. Celda del Cliente (CORREGIDA) --}}
                              <td>
                                  @if($cliente)
                                      @if(isset($cliente->identificador) && !empty($cliente->identificador))
                                          {{ $cliente->identificador }}
                                      @else
                                          {{ ucwords(strtolower($cliente->razonsocial)) }}
                                      @endif
                                  @else
                                      N/A
                                  @endif
                              </td>

                              {{-- 3. Celda de Folio --}}
                              <td>{{ $ingreso->folio }}</td>

                              {{-- 4-6. Celdas de Totales --}}
                              <td>$ {{ number_format($ingreso->subtotal, 2) }}</td>
                              <td>$ {{ number_format($ingreso->iva, 2) }}</td>
                              <td>$ {{ number_format($ingreso->total, 2) }}</td>

                              {{-- 7. Celda de Estatus --}}
                              @if($ingreso->test == 1)
                                  <td><span class="badge badge-success">Publico gral</span> </td>
                              @else
                                  <td><span class="badge badge-success">Facturado</span> </td>
                              @endif

                              {{-- 8. Celda de Acciones --}}
                              <td>
                                  <a href="{{ route('conta.edit.ingreso', ['rfc' => $rfc, 'id' => $ingreso->id]) }}" class="btn btn-sm btn-warning fntB"><i class="fas fnt18 fa-pencil-alt"></i></a>
                                  <a href="#" class="btn btn-sm btn-danger fntB"><i class="fas fnt18 fa-trash-alt"></i></a>
                              </td>
                          </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>

              </div>
            </div>
          </div>
          {{--END INGRESOS --}}

          <div class="col-md-6">
            <div class="card">
              <div class="card-body">
                <h4 class="header-title text-danger">Egresos</h4>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#egresoModal">
                  AGREGAR EGRESO
                </button>
                <div class="my-1">&nbsp;</div>
                <div class="table-responsive">
                  <table id='EgresoTable' class="table table-sm table-striped">
                    <thead>
                      <th class="text-danger fntB">Fecha</th>
                      <th class="text-danger fntB">Cliente</th>
                      <th class="text-danger fntB">Folio</th>
                      <th class="text-danger fntB">Subtotal</th>
                      <th class="text-danger fntB">IVA</th>
                      <th class="text-danger fntB">Total</th>
                      <th class="text-danger fntB">Acciones</th>
                    </thead>
                    <tbody>
                      @foreach($egresos as $egreso)
                        <?php
                        //use Carbon\Carbon;
                        $proveedor =  $egreso->proveedor();
                        //dd($proveedor->identificador);
                        //dd($egreso->fecha);
                        ?>
                        @if($egreso->estatus == 2)
                          <tr class="table-warning">
                        @elseif($egreso->estatus == 3)
                          <tr class="table-info">
                        @else
                          <tr>
                        @endif
                            <td>{{ Carbon::parse($egreso->fecha)->format('d/m/Y') }}</td>
                            <td>{{ $proveedor->identificador }}</td>
                            <td>{{ $egreso->folio }}</td>
                            <td>$ {{ number_format($egreso->subtotal, 2) }}</td>
                            <td>$ {{ number_format($egreso->iva, 2) }}</td>
                            <td>$ {{ number_format($egreso->total, 2) }}</td>
                            <td>
                              <a href="{{ route('conta.edit.egreso', ['rfc' => $rfc, 'id' => $egreso->id]) }}" class="btn btn-sm btn-warning fntB"><i class="fas fnt18 fa-pencil-alt"></i></a>
                              <a href="#" class="btn btn-sm btn-danger fntB"><i class="fas fnt18 fa-trash-alt"></i></a>
                            </td>
                          </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>

              </div>
            </div>
          </div>
          {{--END EGRESOS --}}

        </div>
        <!-- Modal -->
        <div class="modal fade" id="ingresoModal" tabindex="-1" aria-labelledby="ingresoModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="ingresoModalLabel">Registrar nuevo ingreso</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form class="col-12" method="POST" action="{{ route('conta.add.ingreso', ['rfc' => $rfc]) }}">
                  @csrf
                  @include('nexus.conta.partials.add_ingreso')
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-primary">Registrar</button>
                </form>
              </div>
            </div>
          </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="egresoModal" tabindex="-1" aria-labelledby="egresoModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="egresoModalLabel">Registrar nuevo egreso</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form class="col-12" method="POST" action="{{ route('conta.add.egreso', ['rfc' => $rfc]) }}">
                  @csrf
                  @include('nexus.conta.partials.add_egreso')
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-primary">Registrar</button>
                </form>
              </div>
            </div>
          </div>
        </div>





    </div>
  </div>
</div>
@endsection


@section('scripts')
@vite(['resources/js/nexus/contadetail.js'])
@endsection
