<!-- Modal -->
<div class="modal fade" id="addPagoModal" tabindex="-1" aria-labelledby="addPagoModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="addPagoModalLabel">Registrar nuevo pago</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('pagos.store') }}" method="POST">
          @csrf
          <div class="modal-body">
            <div class="form-group">
              <label>Fecha</label>
              <input type="date" name="fecha" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Método</label>
              <select name="metodo" class="form-control" required>
                <option >Elige una opción</option disabled>
                  <option value="1">Efectivo</option>
                  <option value="2">Transferencia</option>
                  <option value="6">Deposito</option>
                  <option value="3">Cheque</option>
                  <option value="4">Mercado Libre</option>
                  <option value="5">Otro</option>
                </select>
              </div>
              <div class="form-group">
                <label>Banco</label>
                <select  name="banco" class="form-control">
                  <option >Elige una opción</option disabled>
                    <option value="1">Banamex GOMC</option>
                    <option value="2">Banamex GOHC</option>
                    <option value="3">HSBC DAGH</option>
                    <option value="4">Mercado Libre</option>
                    <option value="5">Otro</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Monto</label>
                  <input type="number" name="monto" step="0.01" class="form-control" required>
                </div>
                <div class="form-group">
                  <input type="hidden" name="pedido_id" value="{{$pedido->id}}" required>
                </div>
              </div>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
      </div>
    </div>
  </div>
</div>