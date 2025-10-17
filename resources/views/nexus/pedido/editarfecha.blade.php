@extends('layouts.vertical')
@section('title', 'Pedidos - Alta')
@section('section', 'pedidos')

@section('content')

<div class="content-page">
  <!-- Start content -->
  <div class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title fnt26 text-uppercase fntB">Pedidos - Editar fecha</h4>
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
          <div class="col-md-5">
            <div class="card m-b-20">
              <div class="card-body">
                <div class="invoice-title">
                	<form id="pedido-form" method="POST" action="{{ route('pedidos.storedate', ['id'=>$pedido->id]) }}">
                  @csrf
                  <div class="row justify-content-center">
                    <div class="col-12">
                      <p class="form-group">{{$pedido->hasCliente()->identificador}}</p>
                    </div>                    
                    <div class="col-12">
                      <p class="form-group">{{$pedido->total}}</p>
                    </div>                    
                    <div class="col-12">
                      <label class="form-group">Fecha del pedido:</label>
                      <input class="form-control" type="date" name="fecha_pedido" required>
                    </div>




                    <div class="col-md-4">
                      <button class="btn btn-small btn-success" type="submit">Guardar Pedido</button>
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
</div>

@endsection