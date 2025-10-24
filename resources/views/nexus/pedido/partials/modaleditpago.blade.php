<!-- Modal de Edición de Pago -->
<div class="modal fade" id="editPagoModal" tabindex="-1" aria-labelledby="editPagoModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editPagoModalLabel">Editar Pago</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form id="editPagoForm" method="POST">
        @csrf
        @method('PUT')

        <div class="modal-body">
          <div class="mb-3">
            <label for="editFecha" class="form-label">Fecha</label>
            <input type="date" name="fecha" id="editFecha" class="form-control" required>
          </div>

          {{-- CAMPO MÉTODO CORREGIDO A SELECT --}}
          <div class="mb-3">
            <label for="editMetodo" class="form-label">Método</label>
            {{-- Importante: El ID ahora está en el SELECT --}}
            <select name="metodo" id="editMetodo" class="form-control" required>
              <option value="" disabled>Elige una opción</option>
              <option value="1">Efectivo</option>
              <option value="2">Transferencia</option>
              <option value="6">Deposito</option>
              <option value="3">Cheque</option>
              <option value="4">Mercado Libre</option>
              <option value="5">Otro</option>
            </select>
          </div>

          {{-- CAMPO BANCO CORREGIDO A SELECT --}}
          <div class="mb-3">
            <label for="editBanco" class="form-label">Banco</label>
            {{-- Importante: El ID ahora está en el SELECT --}}
            <select name="banco" id="editBanco" class="form-control">
              <option value="">Elige una opción</option> {{-- Usamos value="" para deseleccionar --}}
              <option value="1">Banamex GOMC</option>
              <option value="2">Banamex GOHC</option>
              <option value="3">HSBC DAGH</option>
              <option value="4">Mercado Libre</option>
              <option value="5">Otro</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="editMonto" class="form-label">Monto</label>
            <input type="number" name="monto" id="editMonto" step="0.01" class="form-control" required>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
      </form>
    </div>
  </div>
</div>
