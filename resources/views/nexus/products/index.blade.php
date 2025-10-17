@extends('layouts.vertical')
@section('title', 'Productos')
@section('section', 'productos')

@section('content')

<div class="content-page">
  <!-- Start content -->
  <div class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title fnt26 text-uppercase fntB">Productos</h4>

            </div>
        </div>
      </div>

      <div class="page-content-wrapper">
          <div class="row justify-content-center">
              <div class="col-12 col-md-10">
                  <div class="card m-b-20">
                      <div class="card-body table-responsive">
                          <div class="clearfix pb-3">
                            <h4 class="mt-0 text-uppercase fnt20 fntB float-left">Lista</h4>
                            <a href="{{ route('product.create') }}" class="btn btn-sm btn-primary float-right text-uppercase">Crear producto</a>
                          </div>

                          <table  id='ProdsTable'  class="table table-sm table-striped table-hover align-middle ">
                            <thead >
                              <th class="text-capitalize fnt_blue fntB">codigo</th>
                              <th class="text-capitalize fnt_blue fntB">nombre</th>
                              <th class="text-capitalize fnt_blue fntB">descripcion</th>
                              <th class="text-capitalize fnt_blue fntB">existencia</th>
                              <th class="text-capitalize fnt_blue fntB">imagen</th>
                              <th class="text-capitalize fnt_blue fntB">costo</th>
                              <th class="text-capitalize fnt_blue fntB">ganancia</th>
                              <th class="text-capitalize fnt_blue fntB">acciones</th>
                            </thead>
                            <tbody>
                              @foreach($products as $product)
                              <tr>
                                <td><a href="{{route('product.show', ['id'=>$product->id])}}">
                                  {{ $product->codigo }}
                                </a>
                                </td>
                                <td>{{ $product->nombre }}</td>
                                <td>{{ $product->descripcion }}</td>
                                <td>{{ $product->existencia }}</td>
                                <td><img src="{{ asset('img/prods/'.$product->codigo.'.jpg') }}" alt="Producto {{ $product->codigo }}" width="50" height="50"></td>
                                <td>{{ $product->costo }}</td>
                                <td>{{ $product->ganancia }}</td>
                                <td>

                                  <a class="text-warning" href="{{ route('product.edit', ['id' => $product->id]) }}"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;&nbsp;
                                  <a class="text-danger" href="#"><i class="fas fnt18 fa-trash-alt"></i></a>
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>

                      </div>
                  </div>
              </div> <!-- end col -->
          </div> <!-- end row -->

    </div>
  </div>
</div>

@endsection
