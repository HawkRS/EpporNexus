@extends('layouts.vertical')
@section('title', 'Empleados')
@section('section', 'empleados')

@section('content')

<div class="content-page">
  <!-- Start content -->
  <div class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title fnt26 text-uppercase fntB">Empleados</h4>
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
                  <h3 class="text-uppercase fntB fnt_blue"><i class="fas fa-user fnt_blueD"></i> {{ $empleado->name }} {{$empleado->last}}</h3>
                  <div class="card-body pb-0">
                    <h5 class="fntB fnt20 fnt_blue"><i class="fas fa-file-invoice"></i> DATOS PERSONALES</h5>
                    <hr>
                    <?php use Carbon\Carbon; $fecha = Carbon::now('America/Mexico_City');  ?>
                    <?php

                    $birth = Carbon::parse($empleado->birthday);
                    $edad = $birth->diffInYears($fecha);

                     ?>
                     <div class="row">
                       <div class="col-6">
                         <p class="fntB fnt_dgrey"><strong>Nacimiento :</strong> {{ $empleado->birthplace }}</p>
                       </div>
                       <div class="col-6">
                         <p class="fntB fnt_dgrey"><strong>Edad: </strong> {{$edad}}</p>
                       </div>
                     </div>
                    <p class="fntB fnt_dgrey"><strong>RFC :</strong> {{ $empleado->nss }}</p>
                    <p class="fntB fnt_dgrey"><strong>NSS :</strong> {{ $empleado->rfc }}</p>
                    <p class="fntB fnt_dgrey"><strong>CURP :</strong> {{ $empleado->curp }}</p>
                  </div>
                  <div class="card-body pt-0">
                    <h5 class="fntB fnt20 fnt_blue"><i class="fas fa-address-book"></i> DIRECCION</h5>
                    <hr>
                    <p class="fntB fnt_dgrey"><strong>DIRECCION :</strong> {{ $empleado->address }}</p>
                  </div>
                  <div class="card-body pt-0">
                    <h5 class="fntB fnt20 fnt_blue"><i class="fas fa-hard-hat"></i> POSICIÓN</h5>
                    <hr>
                    @if($empleado->position == 'A')
                    <p class="fntB fnt_dgrey"><strong>Posición :</strong> Armador</p>
                    @elseif($empleado->position == 'S')
                    <p class="fntB fnt_dgrey"><strong>Posición :</strong> Soldador</p>
                    @endif
                    <p class="fntB fnt_dgrey"><strong>Salario :</strong> <span class="text-success"><i class="fas fa-dollar-sign"></i> {{ $empleado->salary }}</span></p>
                  </div>
                  <div class="row justify-content-center">
                    <div class="col-12 col-md-6">
                      <a href="{{ route('persona.edit', ['id' => $empleado->id ]) }}" class="btn btn-block btn-outline-warning btn-sm">Editar</a>
                    </div>
                  </div>
                </div>

              </div> <!-- end col -->

              <div class="col-12 col-md-6">
                <div class="row">
                  <div class="col-12">

                    <div class="card">
                      <div class="card-header bg-primary">
                        <h6 class="fnt_white fnt18 fntB">NOMINAS</h6>
                      </div>
                      <div class="card-body table-responsive">
                        <table class="table table-sm table-striped">
                          <thead class="fnt_blue">
                            <tr>
                              <th class="fntB">FECHA</th>
                              <th class="fntB">DESCRIPCION</th>
                              <th class="fntB">PERCEPCIONES</th>
                              <th class="fntB">DEDUCCIONES</th>
                              <th class="fntB">PAGADO</th>
                              <th class="fntB">ACCIONES</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>05/11/2022</td>
                              <td>7 COMEDEROS JAVIER CARRILLO</td>
                              <td>$ 4,000</td>
                              <td>0</td>
                              <td>$ 4,000</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>29/10/2022</td>
                              <td>7 COMEDEROS JAVIER CARRILLO</td>
                              <td>$ 4,000</td>
                              <td>0</td>
                              <td>$ 4,000</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>22/10/2022</td>
                              <td>12 COMEDEROS HUMEDOS PIONEROS</td>
                              <td>$ 4,000</td>
                              <td>0</td>
                              <td>$ 4,000</td>
                              <td></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>

                      <div class="card">
                        <div class="card-header bg-primary">
                          <h6 class="fntB fnt_white fnt18">PRESTAMOS</h6>
                        </div>
                        <div class="card-body table-responsive">
                          <table class="table table-sm table-striped">
                            <thead class="fnt_blue">
                              <tr>
                                <th class="fntB">FECHA</th>
                                <th class="fntB">CANTIDAD</th>
                                <th class="fntB">MOTIVO</th>
                                <th class="fntB">RESTANTE</th>
                                <th class="fntB">ABONOS</th>
                                <th class="fntB">ACCIONES</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>06/06/2022</td>
                                <td class="badge badge-success fntB">$ 500.00</td>
                                <td><span class="text-dark fntB">PERSONAL</span> </td>
                                <td ><span class="badge badge-danger fntB">$500.00</span></td>
                                <td>--</td>
                                <td></td>
                              </tr>
                              <tr>
                                <td>17/02/2022</td>
                                <td class="badge badge-success fntB">$20,000.00</td>
                                <td><span class="text-dark fntB">VEHICULO</span> </td>
                                <td ><span class="badge badge-danger fntB">$11,000.00</span></td>
                                <td>1</td>
                                <td></td>
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
