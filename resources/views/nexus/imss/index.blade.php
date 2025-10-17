@extends('layouts.vertical')
@section('title', 'Imss')
@section('section', 'imss')

@section('content')

<div class="content-page">
  <!-- Start content -->
  <div class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title fnt26 text-uppercase fntB">Pagos IMSS</h4>
            </div>
        </div>
      </div>
      <!-- end row -->

      <div class="page-content-wrapper">
          <div class="row justify-content-center">
              <div class="col-12 col-md-8">
                <div class="card p-3">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-8">
                        <h4 class="card-title mb-5 text-dark">Registro de pagos</h4>
                      </div>
                      <div class="col-md-4">
                        <span class="text-right">
                          <a href="{{route('imss.create')}}" class="btn btn-sm btn-success">Registrar pago</a>
                        </span>
                      </div>
                    </div>


                      <div class="table-responsive">
                        <table id="ImssTable" class="table table-striped table-hover align-middle ">
                          <thead>
                            <th>Fecha de emision</th>
                            <th>Periodo</th>
                            <th>Bimestre</th>
                            <th>Estatus</th>
                            <th>RFC</th>
                            <th>Monto</th>
                            <th>Empleados</th>
                            <th>Fecha de pago</th>
                            <th>Acciones</th>
                          </thead>
                          <tbody>
                            @foreach($pagos as $pago)
                            <tr>
                              <td>{{ $pago->fecha }}</td>
                              <td>({{$pago->periodo}}){{ \Carbon\Carbon::createFromDate(null, $pago->periodo)->locale('es')->isoFormat('MMMM') }}</td>
                              <td>{{ $pago->bimestre }}</td>
                              <td>@if($pago->estatus == 1)
                                <span class="badge bg-success">Pagado</span>
                                @else
                                <span class="badge bg-danger">Pendiente</span>
                                @endif
                              </td>
                              <td>{{ $pago->rfc }}</td>
                              <td>$ {{ number_format($pago->monto, 2) }}</td>
                              <td>{{ $pago->empleados }}</td>
                              <td>{{ \Carbon\Carbon::parse($pago->fechadepago)->locale('es')->isoFormat('D-MMMM-Y') }}</td>
                              <td>
                                <a href="{{ route('imss.edit', ['id'=>$pago->id]) }}" class="btn btn-primary btn-sm">Editar</a>
                                <a href="#" class="btn btn-danger btn-sm">Eliminar</a>
                              </td>
                            </tr>
                            @endforeach


                          </tbody>
                        </table>
                      </div>
                  </div>
                </div>

              </div> <!-- end col -->



          </div> <!-- end row -->
    </div>
  </div>
</div>
</div>

@endsection
