@extends('layouts.vertical')
@section('title', 'Empleados')
@section('section', 'nada')

@section('content')

<div class="content-page">
  <!-- Start content -->
  <div class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title fnt26 text-uppercase fntB">Producto: {{ $product->nombre }}</h4>
                <div class="state-information d-none d-sm-block">
                    <div class="state-graph">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#empleadoModal">
                        Actualizar producto
                      </button>
                    </div>
                </div>
            </div>
        </div>
      </div>

      <div class="row">
      	<div class="col-md-5">
      		<div class="card">
      			<div class="card-title"><img src="" alt=""></div>
      			<div class="card-footer">
      				<table>
      					<tbody>
      						<tr>
      							<td>ID:</td>
      							<td>{{$product->codigo}}</td>
      						</tr>
      						<tr><td>Categoria:</td>
      							<td>@switch($product->categoria)
      									@case(1)
      										Implementos
      									@break
      									@case(2)
      										Comederos
      									@break
      									@case(3)
      										Jaulas
      									@break
      									@case(4)
      										Pisos
      									@break
      									@default
      										N/A
      									@break
      								@endswitch
      								
      							</td>
      						</tr>
      						<tr><td>Nombre:</td>
      							<td>{{$product->nombre}}</td>
      						</tr>
      					</tbody>
      				</table>
      			</div>
      		</div>
      	</div>
      	<div class="col-md-7">
      		<div class="card">
      			<div class="card-body">
      				<h4>Especificaciones</h4>
	      			<table>
	      			<tbody>
	      				<tr>
	      					<td><strong>Descripción:</strong></td>
	      					<td>{{$product->descripcion}}</td>
	      				</tr>
	      				<tr>
	      					<td><strong>Costo:</strong></td>
	      					<td>{{$product->costo}}</td>
	      				</tr>
	      				<tr>
	      					<td><strong>Existencia:</strong></td>
	      					<td>{{$product->existencia}}</td>
	      				</tr>
	      				<tr>
	      					<td><strong>Ancho:</strong></td>
	      					<td>{{$product->ancho}}</td>
	      				</tr>
	      				<tr>
	      					<td><strong>Largo:</strong></td>
	      					<td>{{$product->largo}}</td>
	      				</tr>
	      				<tr>
	      					<td><strong>Alto:</strong></td>
	      					<td>{{$product->alto}}</td>
	      				</tr>
	      				<tr>
	      					<td><strong>Peso:</strong></td>
	      					<td>{{$product->peso}}</td>
	      				</tr>
	      			</tbody>
	      		</table>
      			</div>
      		</div>

      	</div>
      </div>


		</div>
	</div>
</div>



@endsection