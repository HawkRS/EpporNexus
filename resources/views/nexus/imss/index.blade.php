@extends('layouts.vertical')
@section('title', 'Imss')
@section('section', 'imss')

@section('content')
@include('layouts.partials.page-title', ['subtitle' => 'Pagos IMSS', 'title' => 'Detalle'])

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
              <a href="{{route('imss.create')}}" class="btn btn-sm btn-primary">Registrar pago</a>
            </span>
          </div>
        </div>


          <div class="table-responsive">
            <table id="IMSSTable" class="table table-striped table-hover align-middle ">
              <thead>
                <th class="text-primary">Fecha de emision</th>
                <th class="text-primary">Periodo</th>
                <th class="text-primary">Bimestre</th>
                <th class="text-primary">Estatus</th>
                <th class="text-primary">RFC</th>
                <th class="text-primary">Monto</th>
                <th class="text-primary">Empleados</th>
                <th class="text-primary">Fecha de pago</th>
                <th class="text-primary">Acciones</th>
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
                    <a href="{{ route('imss.edit', ['id'=>$pago->id]) }}" class="text-warning"><i class="fas fa-eye"></i></a>&nbsp;&nbsp;&nbsp;
                    <a href="#" class="text-danger"><i class="fas fa-trash"></i></a>
                  </td>
                </tr>
                @endforeach


              </tbody>
            </table>
          </div>
      </div>
    </div>

  </div> <!-- end col -->

</div>


@endsection

@section('scripts')
@vite(['resources/js/nexus/indeximss.js'])
@endsection
