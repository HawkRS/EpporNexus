@extends('layouts.vertical')
@section('title', 'Pedidos - Actualizar')
@section('section', 'pedidosedit')

@section('content')
<script>
    let productosExistentes = @json($pedido->productos);
</script>

  <div class="content-page">
    <!-- Start content -->
    <div class="content">
      <div class="container-fluid">

        <div class="row">
          <div class="col-sm-12">
              <div class="page-title-box">
                  <h4 class="page-title fnt26 text-uppercase fntB">Pedidos - actualizar</h4>

              </div>
          </div>
        </div>
        <!-- end row -->
        <div class="page-content-wrapper">
          <div class="row justify-content-center">
            <div class="col-12 col-md-10">
              <div class="card m-b-20">
                <div class="card-body">
                  <h1>Editar Pedido #{{ $pedido->folio }}</h1>

                  <form action="{{ route('pedidos.update', $pedido->id) }}" method="POST">
                      @csrf
                      @method('PUT')

                      <!-- Cliente -->
                      <div class="form-group">
                          <label for="cliente">Cliente</label>
                          <select name="cliente_id" id="cliente" class="form-control">
                              @foreach ($clientes as $cliente)
                                  <option value="{{ $cliente->id }}" {{ $cliente->id == $pedido->cliente_id ? 'selected' : '' }}>
                                      {{ $cliente->identificador }}
                                  </option>
                              @endforeach
                          </select>
                      </div>

                      <!-- Estado del pedido -->
                      <div class="form-group">
                          <label for="estado">Estado</label>
                          <select name="estado" id="estado" class="form-control">
                              <option value="pendiente" {{ $pedido->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                              <option value="completado" {{ $pedido->estado == 'completado' ? 'selected' : '' }}>Completado</option>
                              <option value="cancelado" {{ $pedido->estado == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                          </select>
                      </div>

                      <!-- Estado del pedido -->
                      <div class="form-group">
                          <label for="fecha_pedido">Estado</label>
                          @if(@isset($pedido->fecha))
                          <input class="form-control" type="date" name="fecha_pedido" id="fecha_pedido" value="{{ $pedido->fecha  }}">
                          @else
                          <input class="form-control" type="date" name="fecha_pedido" id="fecha_pedido">
                          @endif
                      </div>

                      <!-- Método de entrega -->
                      <div class="form-group">
                          <label for="metodo_entrega">Método de Entrega</label>
                          <select name="metodo_entrega" id="metodo_entrega" class="form-control">
                              <option value="paqueteria" {{ $pedido->metodo_entrega == 'paqueteria' ? 'selected' : '' }}>Paquetería</option>
                              <option value="personal" {{ $pedido->metodo_entrega == 'personal' ? 'selected' : '' }}>Personal</option>
                          </select>
                      </div>

                      <!-- Facturado -->
                      <div class="form-group">
                          <label for="factura">¿Facturado?</label>
                          <input type="checkbox" name="factura" id="factura" value="1" {{ $pedido->factura ? 'checked' : '' }}>
                      </div>

                      <!-- Productos -->
                      <!-- Productos -->
                      <div class="row justify-content-center pt-4">
                        <div class="col-md-4">
                          <h2 class="mt-0">Productos</h2>
                        </div>
                        <div class="col-md-4">
                          <button class="btn btn-small btn-primary" type="button" id="agregar-producto">Agregar Producto</button>
                        </div>
                      </div>

                      <div id="productos-container">
                        <!-- Aquí se agregarán los productos dinámicamente -->
                      </div>

                      <!-- Total del pedido -->
                      <div class="form-group pt-4">
                        <label class="fnt26 text-primary">Total:</label>
                        <input class="form-control" type="text" id="total" readonly>
                      </div>


                      <!-- Totales -->
                      <div class="form-group">
                          <label for="subtotal">Subtotal:</label>
                          <span id="subtotal">{{ $pedido->subtotal }}</span>
                      </div>

                      <div class="form-group">
                          <label for="iva">IVA:</label>
                          <span id="iva">{{ $pedido->iva }}</span>
                      </div>

                      <div class="form-group">
                          <label for="total">Total:</label>
                          <span id="total">{{ $pedido->total }}</span>
                      </div>

                      <button type="submit" class="btn btn-primary">Guardar Cambios</button>
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
