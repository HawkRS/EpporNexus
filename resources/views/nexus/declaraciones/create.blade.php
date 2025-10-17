@extends('layouts.vertical')
@section('title', 'Declaraciones - Registro')
@section('section', 'declaracionesregistro')

@section('content')

<div class="content-page">
  <!-- Start content -->
  <div class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title fnt26 text-uppercase fntB">Pagos Declaraciones - registro</h4>

            </div>
        </div>
      </div>
      <!-- end row -->
      <div class="page-content-wrapper">
        <div class="row justify-content-center">
          <div class="col-12 col-md-10">
            <div class="card m-b-20">
              <div class="card-body">

                <h2>REGISTRAR PAGO</h2>

                @include('admin.declaraciones.partials.fields')

              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection