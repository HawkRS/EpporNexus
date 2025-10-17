@extends('layouts.vertical')
@section('title', 'Empleados')
@section('section', 'listaempleados')

@section('content')

<div class="content-page">
  <!-- Start content -->
  <div class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title fnt26 text-uppercase fntB">Empleados - Lista</h4>
            </div>
        </div>
      </div>
      <!-- end row -->
      <div class="page-content-wrapper">
        <div class="row justify-content-center">
          <div class="col-12 col-md-10">
            <div class="card m-b-20">
              <div class="card-body">

                <div class="row">
                  <div class="col-md-8">
                    <h4 class="card-title mb-5 fnt_dblue">Listado de empleados (Empleados: {{ count($empleados) }})</h4>
                  </div>
                  <div class="col-md-4">
                    <span class="text-right">
                      <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#empleadoModal">
                        Agregar Empleado
                      </button>
                    </span>
                  </div>
                </div>
                <table class="table table-sm table-striped" id="EmpleadosTable">
                  <thead class="">
                    <th class=" fnt_blueD fntB">Nombre</th>
                    <th class=" fnt_blueD fntB">Edad</th>
                    <th class=" fnt_blueD fntB">Posicion</th>
                    <th class=" fnt_blueD fntB">Salario</th>
                    <th class=" fnt_blueD fntB">CURP</th>
                    <th class=" fnt_blueD fntB">NSS</th>
                    <th class=" fnt_blueD fntB">RFC</th>
                    <th class=" fnt_blueD fntB">Estatus</th>
                    <th class=" fnt_blueD fntB">Acciones</th>
                  </thead>
                  <tbody>
                    <?php use Carbon\Carbon; $fecha = Carbon::now('America/Mexico_City');  ?>
                    @foreach ($empleados as $empleado)

                    <?php

                    $birth = Carbon::parse($empleado->birthday);
                    $edad = $birth->diffInYears($fecha);

                     ?>

                    <tr class="fnt-14">
                      <td class="fntB">{{$empleado->name}} {{$empleado->last}}</td>
                      <td>Edad: {{$edad}}</td>
                      <td>{{$empleado->position}}</td>
                      <td class="fntB text-success">${{$empleado->salary}}</td>
                      <td>{{$empleado->curp}}</td>
                      <td>{{$empleado->nss}}</td>
                      <td>{{$empleado->rfc}}</td>
                      @if($empleado->status == 1)
                      <td class="text-center"><i class="fas fa-circle text-success"></i></td>
                      @else
                      <td class="text-center"><i class="fas fa-circle text-muted"></i></td>
                      @endif
                      <td>
                        <a href="{{ route('employees.show', ['id' => $empleado->id]) }}" class="text-primary" ><i class="fas fa-eye" aria-hidden="true"></i></a>
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


<!-- Modal -->
<div class="modal fade" id="empleadoModal" tabindex="-1" aria-labelledby="empleadoModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="empleadoModalLabel">Agregar empleado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="" method="POST" action="{{ route('employees.store') }}">
          {{ csrf_field() }}

          <input type="hidden" id="users_id" name="users_id" value="{{ Auth::user()->id }}">

          <div class="row justify-content-center">
            <div class="pt-3 col-12"> &nbsp; </div>
            @include('admin.employee.fields')

            <div class="col-12 col-md-6 col-xl-3">
              <button type="submit" name="button" class="btn btn-block btn-sm btn-primary fntB">CREAR</button>
            </div>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection
