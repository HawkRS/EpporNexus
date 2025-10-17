@extends('layouts.vertical')
@section('title', 'Clientes - Alta')
@section('section', 'clientes')

@section('content')

<div class="content-page">
  <!-- Start content -->
  <div class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title fnt26 text-uppercase fntB">Clientes - alta</h4>
            </div>
        </div>
      </div>
      <!-- end row -->
      <div class="page-content-wrapper">
        <div class="row justify-content-center">
          <div class="col-12 col-md-10">
            <div class="card m-b-20">
              <div class="card-body">

                <h2>EDITAR CLIENTE</h2>

                <form class="" method="POST" action="{{ route('cliente.update', [$cliente->id]) }}">
                  {{ csrf_field() }}
                  @if ( count( $errors ) > 0 )
                      @foreach ($errors->all() as $error)
                          <div>{{ $error }}</div>
                      @endforeach
                  @endif
                    <input type="hidden" id="personas_id" name="personas_id" value="{{ $cliente->id }}">

                  <div class="row justify-content-center">
                    <div class="pt-3 col-12"> &nbsp; </div>
                    @include('admin.clientes.partials.fields')

                    <div class="col-12 col-md-6 col-xl-3">
                      <button type="submit" name="button" class="btn btn-block btn-sm btn-primary fntB">ACTUALIZAR</button>
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
