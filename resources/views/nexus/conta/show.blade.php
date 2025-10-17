@extends('layouts.vertical')
@section('title', 'Contabilidad')
@section('section', 'contabilidad')

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
                        <li class="breadcrumb-item active fnt20 fntB text-uppercase">Carlos Alberto González Melendez</li>
                      @ENDIF
                      <li class="breadcrumb-item active fnt20 fntB text-uppercase">{{ $year }}</li>
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
          <script>
            var balances = {!! json_encode($balances) !!};


            </script>

            <div class="col-xl-4 col-md-6">
                <div class="card bg-primary mini-stat position-relative">
                    <div class="card-body">
                        <div class="mini-stat-desc">
                            <h6 class="text-uppercase verti-label text-white-50">tope anual</h6>
                            <div class="text-white">
                                <h6 class="text-uppercase mt-0 text-white-50">Espacio tope anual</h6>
                                <h3 class="mb-3 mt-0 fnt30 fntB">$ {{ number_format($balances['topeanual'], 2) }}</h3>
                                <div class="">
                                    {{--<span class="badge badge-light text-info"> +11% </span>--}}
                                    <span class="ml-2 text-uppercase">Activos</span>
                                </div>
                            </div>
                            <div class="mini-stat-icon">
                              <i class="fas fa-funnel-dollar display-2"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6">
                <div class="card bg-primary mini-stat position-relative">
                    <div class="card-body">
                        <div class="mini-stat-desc">
                            <h6 class="text-uppercase verti-label text-white-50">balance</h6>
                            <div class="text-white">
                                <h6 class="text-uppercase mt-0 text-white-50">balance mes en curso</h6>
                                <h3 class="mb-3 mt-0 fnt20 fntB text-uppercase">{{ $mesactual }}</h3>
                                <div class="">
                                  <span class="badge badge-light text-success fnt20 fntB">$ {{ number_format($balances['mesactual'], 2) }}</span>
                                </div>
                            </div>
                            <div class="mini-stat-icon">
                              <i class="fas fa-chart-line display-2"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6">
                <div class="card bg-primary mini-stat position-relative">
                    <div class="card-body">
                        <div class="mini-stat-desc">
                            <h6 class="text-uppercase verti-label text-white-50">balance</h6>
                            <div class="text-white">
                                <h6 class="text-uppercase mt-0 text-white-50">balance anual</h6>
                                <h3 class="mb-3 mt-0 fnt20 fntB text-uppercase">{{ $year }}</h3>
                                <div class="">
                                    <span class="badge badge-light text-{{ $balances['balanceanual'] >=0 ? 'success' : 'danger' }} fnt20 fntB">$ {{ number_format($balances['balanceanual'], 2) }}</span>
                                </div>
                            </div>
                            <div class="mini-stat-icon">
                              <i class="fas fa-chart-bar display-2"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        {{-- END 1ST BLOCK --}}
        <div class="row">
          <div class="col-12 col-lg-8">
            <div class="row">
              <div class="col-12">
                <div class="card table-responsive">
                  <table class="table table-striped table-md">
                    <thead class="bg-primary">
                      <tr>
                        <th class="fntB fnt_white">MES</th>
                        <th class="fntB fnt_white">INGRESOS</th>
                        <th class="fntB fnt_white">EGRESOS</th>
                        <th class="fntB fnt_white">BALANCE</th>
                        <th class="fntB fnt_white">DECLARACION</th>
                        <th class="fntB fnt_white">MONTO</th>
                        <th class="fntB fnt_white">ACCIONES</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="fntB"> <td>ENERO</td>      <td>$ {{ number_format($balances['ene']['income'], 2) }}</td> <td>$ {{ number_format($balances['ene']['outcome'], 2) }}</td> <td class="text-{{ $balances['ene']['balance'] >=0 ? 'success' : 'danger' }}">$ {{ number_format($balances['ene']['balance'], 2) }}</td> <td><span class="badge badge-success"> DECLARADA </span>  </td> <td>$ 1,500.25</td> <td><a href="{{ route('conta.detail', ['rfc' => $rfc, 'year' => $year, 'month' => 1]) }}" class="btn btn-sm btn-primary">más</a> </td>  </tr>
                      <tr class="fntB"> <td>FEBRERO</td>    <td>$ {{ number_format($balances['feb']['income'], 2) }}</td> <td>$ {{ number_format($balances['feb']['outcome'], 2) }}</td> <td class="text-{{ $balances['feb']['balance'] >=0 ? 'success' : 'danger' }}">$ {{ number_format($balances['feb']['balance'], 2) }}</td> <td><span class="badge badge-success"> DECLARADA </span>  </td> <td>$ 1,500.25</td> <td><a href="{{ route('conta.detail', ['rfc' => $rfc, 'year' => $year, 'month' => 2]) }}" class="btn btn-sm btn-primary">más</a> </td>  </tr>
                      <tr class="fntB"> <td>MARZO</td>      <td>$ {{ number_format($balances['mar']['income'], 2) }}</td> <td>$ {{ number_format($balances['mar']['outcome'], 2) }}</td> <td class="text-{{ $balances['mar']['balance'] >=0 ? 'success' : 'danger' }}">$ {{ number_format($balances['mar']['balance'], 2) }}</td> <td><span class="badge badge-success"> DECLARADA </span>  </td> <td>$ 1,500.25</td> <td><a href="{{ route('conta.detail', ['rfc' => $rfc, 'year' => $year, 'month' => 3]) }}" class="btn btn-sm btn-primary">más</a> </td>  </tr>
                      <tr class="fntB"> <td>ABRIL</td>      <td>$ {{ number_format($balances['abr']['income'], 2) }}</td> <td>$ {{ number_format($balances['abr']['outcome'], 2) }}</td> <td class="text-{{ $balances['abr']['balance'] >=0 ? 'success' : 'danger' }}">$ {{ number_format($balances['abr']['balance'], 2) }}</td> <td><span class="badge badge-success"> DECLARADA </span>  </td> <td>$ 1,500.25</td> <td><a href="{{ route('conta.detail', ['rfc' => $rfc, 'year' => $year, 'month' => 4]) }}" class="btn btn-sm btn-primary">más</a> </td>  </tr>
                      <tr class="fntB"> <td>MAYO</td>       <td>$ {{ number_format($balances['may']['income'], 2) }}</td> <td>$ {{ number_format($balances['may']['outcome'], 2) }}</td> <td class="text-{{ $balances['may']['balance'] >=0 ? 'success' : 'danger' }}">$ {{ number_format($balances['may']['balance'], 2) }}</td> <td><span class="badge badge-success"> DECLARADA </span>  </td> <td>$ 1,500.25</td> <td><a href="{{ route('conta.detail', ['rfc' => $rfc, 'year' => $year, 'month' => 5]) }}" class="btn btn-sm btn-primary">más</a> </td>  </tr>
                      <tr class="fntB"> <td>JUNIO</td>      <td>$ {{ number_format($balances['jun']['income'], 2) }}</td> <td>$ {{ number_format($balances['jun']['outcome'], 2) }}</td> <td class="text-{{ $balances['jun']['balance'] >=0 ? 'success' : 'danger' }}">$ {{ number_format($balances['jun']['balance'], 2) }}</td> <td><span class="badge badge-success"> DECLARADA </span>  </td> <td>$ 1,500.25</td> <td><a href="{{ route('conta.detail', ['rfc' => $rfc, 'year' => $year, 'month' => 6]) }}" class="btn btn-sm btn-primary">más</a> </td>  </tr>
                      <tr class="fntB"> <td>JULIO</td>      <td>$ {{ number_format($balances['jul']['income'], 2) }}</td> <td>$ {{ number_format($balances['jul']['outcome'], 2) }}</td> <td class="text-{{ $balances['jul']['balance'] >=0 ? 'success' : 'danger' }}">$ {{ number_format($balances['jul']['balance'], 2) }}</td> <td><span class="badge badge-success"> DECLARADA </span>  </td> <td>$ 1,500.25</td> <td><a href="{{ route('conta.detail', ['rfc' => $rfc, 'year' => $year, 'month' => 7]) }}" class="btn btn-sm btn-primary">más</a> </td>  </tr>
                      <tr class="fntB"> <td>AGOSTO</td>     <td>$ {{ number_format($balances['ago']['income'], 2) }}</td> <td>$ {{ number_format($balances['ago']['outcome'], 2) }}</td> <td class="text-{{ $balances['ago']['balance'] >=0 ? 'success' : 'danger' }}">$ {{ number_format($balances['ago']['balance'], 2) }}</td> <td><span class="badge badge-success"> DECLARADA </span>  </td> <td>$ 1,500.25</td> <td><a href="{{ route('conta.detail', ['rfc' => $rfc, 'year' => $year, 'month' => 8]) }}" class="btn btn-sm btn-primary">más</a> </td>  </tr>
                      <tr class="fntB"> <td>SEPTIEMBRE</td> <td>$ {{ number_format($balances['sep']['income'], 2) }}</td> <td>$ {{ number_format($balances['sep']['outcome'], 2) }}</td> <td class="text-{{ $balances['sep']['balance'] >=0 ? 'success' : 'danger' }}">$ {{ number_format($balances['sep']['balance'], 2) }}</td> <td><span class="badge badge-success"> DECLARADA </span>  </td> <td>$ 1,500.25</td> <td><a href="{{ route('conta.detail', ['rfc' => $rfc, 'year' => $year, 'month' => 9]) }}" class="btn btn-sm btn-primary">más</a> </td>  </tr>
                      <tr class="fntB"> <td>OCTUBRE</td>    <td>$ {{ number_format($balances['oct']['income'], 2) }}</td> <td>$ {{ number_format($balances['oct']['outcome'], 2) }}</td> <td class="text-{{ $balances['oct']['balance'] >=0 ? 'success' : 'danger' }}">$ {{ number_format($balances['oct']['balance'], 2) }}</td> <td><span class="badge badge-success"> DECLARADA </span>  </td> <td>$ 1,500.25</td> <td><a href="{{ route('conta.detail', ['rfc' => $rfc, 'year' => $year, 'month' => 10]) }}" class="btn btn-sm btn-primary">más</a> </td>  </tr>
                      <tr class="fntB"> <td>NOVIEMBRE</td>  <td>$ {{ number_format($balances['nov']['income'], 2) }}</td> <td>$ {{ number_format($balances['nov']['outcome'], 2) }}</td> <td class="text-{{ $balances['nov']['balance'] >=0 ? 'success' : 'danger' }}">$ {{ number_format($balances['nov']['balance'], 2) }}</td> <td><span class="badge badge-success"> DECLARADA </span>  </td> <td>$ 1,500.25</td> <td><a href="{{ route('conta.detail', ['rfc' => $rfc, 'year' => $year, 'month' => 11]) }}" class="btn btn-sm btn-primary">más</a> </td>  </tr>
                      <tr class="fntB"> <td>DICIEMBRE</td>  <td>$ {{ number_format($balances['dic']['income'], 2) }}</td> <td>$ {{ number_format($balances['dic']['outcome'], 2) }}</td> <td class="text-{{ $balances['dic']['balance'] >=0 ? 'success' : 'danger' }}">$ {{ number_format($balances['dic']['balance'], 2) }}</td> <td><span class="badge badge-success"> DECLARADA </span>  </td> <td>$ 1,500.25</td> <td><a href="{{ route('conta.detail', ['rfc' => $rfc, 'year' => $year, 'month' => 12]) }}" class="btn btn-sm btn-primary">más</a> </td>  </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          {{-- END TABLA MES ANUAL --}}

          <div class="col-12 col-lg-4">
            <div class="row">
              <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                  <div class="card-header bg-success">
                    <h6 class="fntB fnt_white"> INGRESOS </h6>
                  </div>
                  <div class="card-body">
                    <canvas id="AnualIngresos" class=""></canvas>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                  <div class="card-header bg-danger">
                    <h6 class="fntB fnt_white"> EGRESOS </h6>
                  </div>
                  <div class="card-body">
                    <canvas id="AnualEgresos" class=""></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        {{--<div class="col-12">
          <div class="card bg-primary">
            <div class="p-3">
              <h6 class="text-uppercase fntB fnt22 fnt_white">total ingresos : <span class="badge badge-light fntB fnt22 text-success">$ {{ number_format($balances['ingresoanual'], 2) }}</span> </h6>
              <h6 class="text-uppercase fntB fnt22 fnt_white">total egresos : <span class="badge badge-light fntB fnt22 text-danger">$ {{ number_format($balances['egresoanual'], 2) }}</span> </h6>
              <h6 class="text-uppercase fntB fnt22 fnt_white">balance anual : <span class="badge badge-light fntB fnt22 text-{{ $balances['balanceanual'] >=0 ? 'success' : 'danger' }}">$ {{ number_format($balances['balanceanual'], 2) }}</span> </h6>
            </div>
          </div>
        </div>--}}
        {{-- END 2ND BLOCK --}}




      </div>
      {{-- END PAGE WRAPPER --}}
    </div>
  </div>
</div>



@endsection
