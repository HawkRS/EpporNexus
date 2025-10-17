@extends('layouts.vertical')
@section('title', 'Proveedores')
@section('section', 'proveedores')

@section('content')

<div class="content-page">
  <!-- Start content -->
  <div class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title fnt26 text-uppercase fntB">Proveedores</h4>
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
              <div class="col-12 col-md-4">
                <div class="card p-3">
                  <h3 class="text-uppercase fntB fnt_blue">{{ $proveedor->identificador }}</h3>
                  <div class="card-body pb-0">
                    <h5 class="fntB fnt20 fnt_blue"><i class="fas fa-file-invoice"></i> DATOS PERSONALES</h5>
                    <hr>
                    <p class="fntB fnt_dgrey"><strong>RAZON SOCIAL :</strong> {{ $proveedor->razonsocial }}</p>
                    <p class="fntB fnt_dgrey"><strong>RFC :</strong> {{ $proveedor->rfc }}</p>
                  </div>
                  <div class="card-body pt-0">
                    <h5 class="fntB fnt20 fnt_blue"><i class="fas fa-address-book"></i> DIRECCION</h5>
                    <hr>
                    <p class="fntB fnt_dgrey"><strong>DIRECCION :</strong> {{ $proveedor->direccion }}</p>
                    <p class="fntB fnt_dgrey"><strong>COL :</strong> {{ $proveedor->colonia }}, {{ $proveedor->estado }}, {{ $proveedor->pais }}</p>
                    <p class="fntB fnt_dgrey"><strong>CP. :</strong> {{ $proveedor->codigopostal }}</p>
                  </div>
                  <div class="row justify-content-center">
                    <div class="col-12 col-md-6">
                      <a href="{{ route('provee.edit', ['id' => $proveedor->id ]) }}" class="btn btn-block btn-outline-warning btn-sm">Editar</a>
                    </div>
                  </div>
                </div>

              </div> <!-- end col -->

              <div class="col-12 col-md-6">
                <div class="row">
                  <div class="col-12">

                    <div class="card">
                      <div class="card-header bg-primary">
                        <h6 class="fnt_white fnt18 fntB">CONTACTOS</h6>
                      </div>
                      <div class="card-body table-responsive">
                        <table class="table table-sm table-striped">
                          <thead class="fnt_blue">
                            <tr>
                              <th class="fntB">NOMBRE</th>
                              <th class="fntB">TELEFONO 1</th>
                              <th class="fntB">TELEFONO 2</th>
                              <th class="fntB">CORREO</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>OLGA</td>
                              <td>33 65 45 65 85</td>
                              <td>--</td>
                              <td>OLGA@MAIL.COM</td>
                            </tr>
                            <tr>
                              <td>OLGA</td>
                              <td>33 65 45 65 85</td>
                              <td>--</td>
                              <td>OLGA@MAIL.COM</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>

                      <div class="card">
                        <div class="card-header bg-primary">
                          <h6 class="fntB fnt_white fnt18">DATOS BANCARIOS</h6>
                        </div>
                        <div class="card-body table-responsive">
                          <table class="table table-sm table-striped">
                            <thead class="fnt_blue">
                              <tr>
                                <th class="fntB">BANCO</th>
                                <th class="fntB">CUENTA</th>
                                <th class="fntB">SUCURSAL</th>
                                <th class="fntB">CLABE</th>
                                <th class="fntB">TARJETA</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td><span class="badge badge-danger fntB">SANTANDER</span> </td>
                                <td>4513357</td>
                                <td>7007</td>
                                <td>231646468433536135</td>
                                <td>--</td>
                              </tr>
                              <tr>
                                <td><span class="badge badge-primary fntB">BANAMEX</span> </td>
                                <td>4513357</td>
                                <td>7007</td>
                                <td>231646468433536135</td>
                                <td>--</td>
                              </tr>
                              <tr>
                                <td><span class="badge badge-light fntB text-danger">HSBC</span> </td>
                                <td>4513357</td>
                                <td>7007</td>
                                <td>231646468433536135</td>
                                <td>--</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>

                  </div>
                </div>
              </div>


          </div> <!-- end row -->
    </div>
  </div>
</div>
</div>

@endsection
