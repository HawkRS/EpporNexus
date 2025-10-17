@extends('layouts.vertical')
@section('title', 'ISN - Registro')
@section('section', 'imssregistro')

@section('content')

<div class="content-page">
  <!-- Start content -->
  <div class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title fnt26 text-uppercase fntB">Pagos ISN(2%) - registro</h4>

            </div>
        </div>
      </div>
      <!-- end row -->
      <div class="page-content-wrapper">
        <div class="row justify-content-center">
          <div class="col-12 col-md-10">
            <div class="card m-b-20">
              <div class="card-body">

                <h2>ACTUALIZAR PAGO</h2>
                @if ( count( $errors ) > 0 )
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                @endif

                @include('admin.isn.partials.fields')

              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection