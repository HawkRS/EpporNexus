@extends('layouts.vertical')
@section('title', 'Contabilidad')
@section('section', 'contadet')

@section('content')
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

            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger mini-stat position-relative">
                    <div class="card-body">
                        <div class="mini-stat-desc">
                            <h6 class="text-uppercase verti-label text-white-50">egresos</h6>
                            <div class="text-white">
                                <h6 class="text-uppercase mt-0 text-white-50 fntB">egresos {{ $monthname }}</h6>
                                <h3 class="mb-3 mt-0 fnt30 fntB"> $ {{ number_format($egresomensual['total'], 2) }}</h3>
                                <div class="">
                                    {{--<span class="badge badge-light text-info"> +11% </span>--}}
                                    <span class="ml-2 text-uppercase">{{ $egresomensual['conteo'] }} compras</span>
                                </div>
                            </div>
                            <div class="mini-stat-icon">
                              <i class="fas fa-cash-register display-2"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card bg-success mini-stat position-relative">
                    <div class="card-body">
                        <div class="mini-stat-desc">
                            <h6 class="text-uppercase verti-label text-white-50">ingresos</h6>
                            <div class="text-white">
                                <h6 class="text-uppercase mt-0 text-white-50 fntB">ingresos {{ $monthname }}</h6>
                                <h3 class="mb-1 mt-0 text-uppercase fnt18">facturado: <span class="fntB">$ {{ number_format($ingresomensual['facturados'], 2) }}</span></h3>
                                <h3 class="mb-1 mt-0 text-uppercase fnt18">publico gral: <span class="fntB">$ {{ number_format($ingresomensual['publicogral'], 2) }}</span></h3>
                                {{--<h3 class="mb-3 mt-0 fnt30 fntB">$ {{ number_format($ingresomensual['total'], 2) }}</h3>--}}

                                <div class="">
                                    <span class="ml-2 text-uppercase">{{ $ingresomensual['conteo'] }} ventas</span>
                                </div>
                            </div>
                            <div class="mini-stat-icon">
                              <i class="fas fa-money-bill-wave display-2"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
              @if($balance['diffivas'] >=0)
                <div class="card bg-success mini-stat position-relative">
              @else
                <div class="card bg-danger mini-stat position-relative">
              @endif
                    <div class="card-body">
                        <div class="mini-stat-desc">
                            <h6 class="text-uppercase verti-label text-white-50">impuestos</h6>
                            <div class="text-white">
                                <h6 class="text-uppercase mt-0 text-white-50 fntB">impuestos</h6>
                                <h3 class="mb-1 mt-0 text-uppercase fnt16">acreditable: <span class="fntB">$ {{ number_format($egresomensual['ivaacreeditable'], 2) }}</span></h3>
                                <h3 class="mb-1 mt-0 text-uppercase fnt16">transladado: <span class="fntB">$ {{ number_format($ingresomensual['ivatrasladado'], 2) }}</span></h3>
                                <div class="">
                                  @if($balance['diffivas'] >=0)
                                  <span class="badge badge-light text-success fnt18 fntB">$ {{ number_format($balance['diffivas'], 2) }}</span>
                                  @else
                                  <span class="badge badge-light text-danger fnt18 fntB">DIFF: $ {{ number_format($balance['diffivas'], 2) }}</span>
                                  @endif
                                </div>
                            </div>
                            <div class="mini-stat-icon">
                              <i class="fas fa-landmark display-2"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
              @if($balance['balance'] >=0)
                <div class="card bg-success mini-stat position-relative">
              @else
                <div class="card bg-danger mini-stat position-relative">
              @endif
                    <div class="card-body">
                        <div class="mini-stat-desc">
                            <h6 class="text-uppercase verti-label text-white-50">balance</h6>
                            <div class="text-white">
                                <h6 class="text-uppercase mt-0 text-white-50 fntB">resultado</h6>
                                <h3 class="mb-3 mt-0 fnt20 fntB text-uppercase">{{ $monthname }}</h3>
                                <div class="">
                                  @if($balance['balance'] >=0)
                                  <span class="badge badge-light text-success fnt20 fntB">BALANCE: $ {{ number_format($balance['balance'], 2) }}</span>
                                  @else
                                  <span class="badge badge-light text-danger fnt20 fntB">BALANCE: $ {{ number_format($balance['balance'], 2) }}</span>
                                  @endif
                                </div>
                            </div>
                            <div class="mini-stat-icon">
                              <i class="fas fa-chart-line display-2"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        {{-- END BLOQUES --}}

        <div class="row">

          <div class="col-12">
            <h1 class="text-success fntB float-left">INGRESOS</h1>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-sm btn-success fntB fnt20 float-right mt-2" data-toggle="modal" data-target="#exampleModal">
              AGREGAR INGRESO
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar ingreso</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form class="col-12" method="POST" action="{{ route('conta.add.ingreso', ['rfc' => $rfc]) }}">
                      @include('admin.conta.partials.add_ingreso')
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              </div>
            </div>
          </div>



          <div class="col-12">
            <div class="card table-responsive p-3">
              <table id='IngresoTable' class="table table-sm table-striped">
                <thead class="bg-success">
                  <tr class="fnt18 fnt_white">
                    <th class="fntB">FECHA</th>
                    <th class="fntB">CLIENTE</th>
                    <th class="fntB">FOLIO</th>
                    <th class="fntB">SUBTOTAL</th>
                    <th class="fntB">IVA</th>
                    <th class="fntB">TOTAL</th>
                    <th class="fntB">TIPO</th>
                    <th class="fntB">ACCIONES</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($ingresos as $ingreso)
                  <?php
                  //use Carbon\Carbon;
                  $cliente =  $ingreso->cliente();
                  dd($cliente);
                  ?>
                  @if($ingreso->estatus == 2)
                    <tr class="table-warning">
                  @elseif($ingreso->estatus == 3)
                    <tr class="table-info">
                  @else
                    <tr>
                  @endif
                      <td>{{ date_format($ingreso->fecha,"d/m/Y") }}</td>
                      @if($cliente) {{-- Verifica si $cliente no es null --}}
                                      @if(isset($cliente->identificador) && !empty($cliente->identificador)) {{-- Verifica si 'identificador' existe y no está vacío --}}
                                          {{ $cliente->identificador }}
                                      @else
                                          {{ $cliente->razonsocial }}
                                      @endif
                                  @else
                                      N/A {{-- O cualquier texto que indique que no hay cliente asociado --}}
                                  @endif
                      <td>{{ $ingreso->folio }}</td>
                      <td>$ {{ number_format($ingreso->subtotal, 2) }}</td>
                      <td>$ {{ number_format($ingreso->iva, 2) }}</td>
                      <td>$ {{ number_format($ingreso->total, 2) }}</td>
                      @if($ingreso->test == 1)
                        <td><span class="badge badge-success">Publico gral</span> </td>
                      @else
                        <td><span class="badge badge-success">Facturado</span> </td>
                      @endif
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
        {{--END INGRESOS --}}

        <div class="row">
            <div class="col-12">
              <h1 class="text-danger fntB float-left">EGRESOS</h1>
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-sm btn-danger fntB fnt20 float-right mt-2" data-toggle="modal" data-target="#exampleModalEgreso">
                AGREGAR EGRESO
              </button>

              <!-- Modal -->
              <div class="modal fade" id="exampleModalEgreso" tabindex="-1" aria-labelledby="exampleModalEgresoLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalEgresoLabel">Agregar egreso</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <form class="col-12" method="POST" action="{{ route('conta.add.egreso', ['rfc' => $rfc]) }}">
                        @include('admin.conta.partials.add_egreso')
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12">
              <div class="card table-responsive p-3">
                <table id='EgresoTable' class="table table-sm table-striped">
                  <thead class="bg-danger">
                    <tr class="fnt18 fnt_white">
                      <th class="fntB">FECHA</th>
                      <th class="fntB">CLIENTE</th>
                      <th class="fntB">FOLIO</th>
                      <th class="fntB">SUBTOTAL</th>
                      <th class="fntB">IVA</th>
                      <th class="fntB">TOTAL</th>
                      <th class="fntB">ACCIONES</th>
                    </tr>
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
                          <td>{{ date_format($egreso->fecha,"d/m/Y") }}</td>
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
        {{--END EGRESOS --}}
      </div>



    </div>
  </div>
</div>
@endsection
