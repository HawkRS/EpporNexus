    <div class="form-group">
      <div class="row justify-content-center">

        <div class="col-md-6">
          <select name="cliente_id" class="form-control" required>
              <option value="">Seleccione un cliente</option>
              @foreach($clientes as $cliente)
                  <option value="{{ $cliente->id }}">{{ $cliente->identificador }}</option>
              @endforeach
          </select>
        </div>

        <div class="col-md-6">
          <select name="usuario_id" class="form-control" required>
              <option value="">Seleccione un vendedor</option>
              @foreach($usuarios as $usuario)
                  <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
              @endforeach
          </select>

        </div>

      </div>
    </div>


    <!-- Subtotal, IVA, Total, Saldo -->
    <input type="number" name="subtotal" step="0.01" placeholder="Subtotal" required>
    <input type="float" name="iva" step="0.01" placeholder="IVA" required>
    <input type="float" name="total" step="0.01" placeholder="Total" required>
    <input type="float" name="saldo" step="0.01" placeholder="Saldo" required>

    <!-- Estado, Método de entrega, Paquetería, Número de guía -->
    <input type="text" name="estado" placeholder="Estado del pedido" required>
    <input type="text" name="metodo_entrega" placeholder="Método de entrega">
    <input type="text" name="paqueteria" placeholder="Paquetería">
    <input type="text" name="numero_guia" placeholder="Número de guía">

    <!-- Facturado -->
    <input type="checkbox" name="factura" value="1"> Facturado

