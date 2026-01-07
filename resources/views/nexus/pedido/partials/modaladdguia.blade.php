<!-- Modal -->
<div class="modal fade" id="addGuiaModal" tabindex="-1" aria-labelledby="addGuiaModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="addGuiaModalLabel">Agregar Guia</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('pedidos.addguia', ['id'=>$pedido->id]) }}" method="POST">
          @csrf
          <div class="form-group">
            <label>Paqueteria</label>
            <input type="text" name="paqueteria" class="form-control" required>
          </div>

          <div class="form-group">
            <label>N° Guia</label>
            <input type="text" name="guia"  class="form-control" required>
          </div>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
      </div>

    </div>
  </div>
</div>
