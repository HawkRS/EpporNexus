@extends('layouts.vertical')
@section('title', 'Contabilidad')
@section('section', 'editingreso')

@section('content')
<div class="content-page">
  <!-- Start content -->
  <div class="content">
    <div class="container-fluid">

      <div class="pt-5">

        <form class="col-12" method="POST" action="{{ route('conta.update.ingreso', ['rfc' => $rfc,'id' => $ingreso->id]) }}">

          @include('nexus.conta.partials.add_ingreso')

          <div class="row justify-content-center pb-3">
            <div class="col-md-3 col-lg-2 d-grid gap-2">
              <button class="btn btn-primary" type="submit" name="button">Actualizar</button>
            </div>
            <div class="col-md-3 col-lg-2 d-grid gap-2">
              <?php use Carbon\Carbon; $fecha = Carbon::now('America/Mexico_City'); //dd($fecha->year)?>
              <a  class="btn btn-dark" href="{{ route('conta.show', ['rfc' => $rfc, 'year' =>$fecha->year]) }}">Regresar</a>
            </div>
          </div>
        </form>

      </div>

    </div>
  </div>
</div>
@endsection
