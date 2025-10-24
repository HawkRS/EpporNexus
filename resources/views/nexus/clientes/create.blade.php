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
          <div class="col-12 col-md-10">
            <div class="card m-b-20">
              <div class="card-body">

                <h2>CREAR CLIENTE</h2>

                <form class="" method="POST" action="{{ route('cliente.store') }}">
                  {{ csrf_field() }}

                  <div class="row justify-content-center">
                    <div class="pt-3 col-12"> &nbsp; </div>
                    @include('nexus.clientes.partials.fields')

                    <div class="col-12 col-md-6 col-xl-3">
                      <button type="submit" name="button" class="btn btn-block btn-sm btn-primary fntB">CREAR</button>
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
