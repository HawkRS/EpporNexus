
<div class="modal fade" id="AddProdModal" tabindex="-1" aria-labelledby="AddProdModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="AddProdModalLabel">Agregar producto</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('pedidos.addproducts', ['id'=> $pedido->id]) }}" method="POST">
          @csrf
          <div class="form-group">
            <label>Método</label>
            <select name="producto" class="form-control" required>
              <option >Elige una opción</option disabled>
                @foreach($productlist as $producto)
                <option value="{{$producto->id}}">{{$producto->nombre}}</option>
                @endforeach
              </select>
            </div>
          <div class="form-group">
            <label>Cantidad</label>
            <input type="number" name="cantidad" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Costo</label>
            <input type="number" name="costo" step="0.01" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Descuento</label>
            <input type="number" name="descuento" class="form-control">
          </div>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
      </div>
    </div>
  </div>
</div>
