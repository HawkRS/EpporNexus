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
              </div>
          </div>
      </div>
      {{-- end row --}}

      <div class="page-content-wrapper">

        <div class="row">

          <div class="col-lg-4">
              <div class="card">
                  <div class="card-body">
                      <div class="d-flex justify-content-between">
                          <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                              <i class="mdi mdi-currency-usd avatar-title font-30 text-white"></i>
                          </div>

                          <div class="wigdet-two-content media-body text-end text-truncate">
                              <p class="m-0 text-uppercase fnt20 text-truncate" title="Statistics">ingreso anual</p>
                              <p class="m-0">&nbsp;</p>
                              <h3 class="fw-medium">$ <span data-plugin="counterup">{{ number_format($balances['ingresoanual'], 2) }}</span></h3>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <div class="col-lg-4">
              <div class="card">
                  <div class="card-body">
                      <div class="d-flex justify-content-between">
                          <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                              <i class="mdi mdi-currency-usd avatar-title font-30 text-white"></i>
                          </div>

                          <div class="wigdet-two-content media-body text-end text-truncate">
                              <p class="m-0 text-uppercase fnt20 text-truncate" title="Statistics">{{ $mesactual }}</p>
                              <p class="m-0">&nbsp;</p>
                              <h3 class="fw-medium">$ <span data-plugin="counterup">{{ number_format($balances['mesactual'], 2) }}</span></h3>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <div class="col-lg-4">
              <div class="card">
                  <div class="card-body">
                      <div class="d-flex justify-content-between">
                          <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                              <i class="mdi mdi-currency-usd avatar-title font-30 text-white"></i>
                          </div>

                          <div class="wigdet-two-content media-body text-end text-truncate">
                              <p class="m-0 text-uppercase fnt20 text-truncate" title="Statistics">Balance anual</p>
                              <p class="m-0">&nbsp;</p>
                              <h3 class="fw-medium">$ <span data-plugin="counterup">{{ number_format($balances['balanceanual'], 2) }}</span></h3>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

        </div>

        <div class="row">
          <script> var balances = {!! json_encode($balances) !!}; </script>

          <div class="col-lg-8">
            <div class="card">
              <div class="card-body">
                <h4 class="header-title">Desglose anual contable</h4>
                <div class="table-responsive">
                  <table class="table table-sm table-striped">
                    <thead>
                      <tr>
                        <th class="fntB text-primary">Mes</th>
                        <th class="fntB text-primary">Ingresos</th>
                        <th class="fntB text-primary">Egresos</th>
                        <th class="fntB text-primary">Balance</th>
                        <th class="fntB text-primary">Declaración</th>
                        <th class="fntB text-primary">Monto</th>
                        <th class="fntB text-primary">Acciones</th>
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

          <div class="col-lg-4">

            <div class="card">
              <div class="card-body">
                <h4 class="header-title text-success">Ingresos: <span class="text-success"> ${{ number_format($balances['ingresoanual'], 2) }}</span></h4>
                <div class="">
                  <canvas id="AnualIngresos" class="" height="200px"></canvas>
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-body">
                <h4 class="header-title text-danger">Egresos: <span class="text-danger"> ${{ number_format($balances['egresoanual'], 2) }}</span></h4>
                <div class="">
                  <canvas id="AnualEgresos" class="" height="200px"></canvas>
                </div>
              </div>
            </div>

          </div>
          {{-- END COL GRAFICAS --}}

        </div>
        {{-- END SEGUNDO ROW --}}

      </div>
      {{-- END PAGE WRAPPER --}}
    </div>
  </div>
</div>

@endsection

@section('scripts')
@vite(['resources/js/nexus/contashow.js'])
@endsection
