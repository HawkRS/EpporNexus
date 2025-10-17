@extends('layouts.vertical')
@section('title', 'Clientes')
@section('section', 'proveedores')

@section('content')

<div class="content-page">
  <!-- Start content -->
  <div class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title fnt26 text-uppercase fntB">Clientes</h4>
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
                      <div class="card-body table-responsive">
                          <div class="clearfix pb-3">
                            <a href="{{ route('cliente.create') }}" class="btn btn-sm btn-primary float-right text-uppercase">Crear cliente</a>
                          </div>
                          <table id='ProveeTable' class="table table-sm table-striped table-hover align-middle">
                            <thead>
                              <tr>
                                  <th class="text-capitalize text-primary">Identificador</th>
                                  <th class="text-capitalize text-primary">Razon social</th>
                                  <th class="text-capitalize text-primary">RFC</th>
                                  <th class="text-capitalize text-primary">telefono</th>
                                  <th class="text-capitalize text-primary">direccion</th>
                                  <th class="text-capitalize text-primary">correo</th>
                                  <th class="text-capitalize text-primary">acciones</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($clientes as $client)
                                <tr>
                                  <td class="text-secondary">{{ ucwords(strtolower($client->identificador)) }}</td>
                                  {{-- Aplica ucwords si el nombre completo necesita capitalización (ej. "Diego Gonzalez") --}}
                                  <td class="text-secondary">{{ ucwords(strtolower($client->razonsocial)) }}</td>
                                  <td class="text-cappitalize text-secondary">{{ $client->rfc }}</td>
                                  <td class="text-secondary">{{ $client->telefono }}</td>
                                  {{-- Se usa ucwords para que cada palabra de la dirección inicie con mayúscula --}}
                                  <td class="text-secondary">{{ ucwords(strtolower($client->direccion)) }}</td>
                                  <td class="text-secondary">{{ strtolower($client->correo) }}</td>
                                  <td>&nbsp;
                                    <a class="text-info" href="{{ route('cliente.show', ['id' => $client->id]) }}"> <i class="fas fa-eye"></i> </a>&nbsp;&nbsp;
                                    <a class="text-warning" href="{{ route('cliente.edit', ['id' => $client->id]) }}"> <i class="fas fa-edit"></i> </a>
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


@section('scripts')
@vite(['resources/js/nexus/clientes.js'])
@endsection