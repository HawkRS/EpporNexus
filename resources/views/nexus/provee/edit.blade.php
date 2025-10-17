@extends('layouts.vertical')
@section('title', 'Proveedores - Alta')
@section('section', 'proveedores')

@section('content')

<div class="content-page">
  <!-- Start content -->
  <div class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title fnt26 text-uppercase fntB">Persona - alta</h4>
            </div>
        </div>
      </div>
      <!-- end row -->
      <div class="page-content-wrapper">
        <div class="row justify-content-center">
          <div class="col-12 col-md-10">
            <div class="card m-b-20">
              <div class="card-body">

                <h2>EDITAR PERSONA</h2>

                <form class="" method="POST" action="{{ route('provee.update', [$proveedor->id]) }}">
                  {{ csrf_field() }}
                  @if ( count( $errors ) > 0 )
                      @foreach ($errors->all() as $error)
                          <div>{{ $error }}</div>
                      @endforeach
                  @endif
                    <input type="hidden" id="personas_id" name="personas_id" value="{{ $proveedor->id }}">

                  <div class="row justify-content-center">
                    <div class="pt-3 col-12"> &nbsp; </div>
                    @include('nexus.provee.partials.fields')

                    <div class="col-12 col-md-6 col-xl-3">
                      <button type="submit" name="button" class="btn btn-block btn-sm btn-primary fntB">UPDATE</button>
                    </div>
                  </div>

                </form>

              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

@endsection
