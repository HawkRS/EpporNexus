
{{-- Modal --}}
<div class="modal fade" id="PDFModal" tabindex="-1" aria-labelledby="PDFModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="PDFModalLabel">Generar PDF</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="" action="{{route('pedidos.pdf', ['id'=>$pedido->id])}}" method="POST">
          @csrf
          <div class="row g-3">


            {{-- INICIO: BLOQUE DE DATOS PERSONALES (ACTUALIZADO A BS5.3) --}}

            <div class="col-12 mb-3">
              <label for="datos" class="form-label">Datos personales</label>
              <select name="datos" class="form-select" id="datos">
                {{-- Usamos 'disabled selected' para la opción por defecto en BS5 --}}
                <option selected disabled>Elige una opción</option>
                <option value="1">GOMC</option>
                <option value="2">Eppor</option>
                <option value="3">Ambos</option>
                <option value="4">Ninguno</option>
              </select>
            </div>

            {{-- FIN: BLOQUE DE DATOS PERSONALES --}}

            @if(isset($pedido) && $pedido->saldo > 0)

            {{-- INICIO: BLOQUE DE INFORMACIÓN BANCARIA (CONDICIONAL - ACTUALIZADO A BS5.3) --}}

            <div class="col-12 mb-3">
              <label for="bancoflag" class="form-label">¿Con información bancaria?</label>
              <select name="bancoflag" class="form-select" id="bancoflag">
                <option selected disabled>Elige una opción</option>
                <option value="1">Si</option>
                <option value="2">No</option>
              </select>
            </div>

            <div class="col-12 mb-3">
              <label for="banco" class="form-label">Info bancaria</label>
              <select name="banco" class="form-select" id="banco">
                <option selected disabled>Elige una opción</option>
                <option value="1">Banamex GOMC</option>
                <option value="2">Banamex GOHC</option>
                <option value="3">HSBC DAGH</option>
                <option value="4">Otro</option>
              </select>
            </div>

            {{-- FIN: BLOQUE DE INFORMACIÓN BANCARIA --}}

            @else
            {{-- BLOQUE @ELSE: Se ejecuta cuando el saldo es 0 o $pedido no existe/no tiene saldo --}}
            <input type="hidden" name="bancoflag" value="2">
            <input type="hidden" name="banco" value="4">
            @endif

          </div>

          {{-- Gestión de botones: separamos y usamos flex utilities de BS5 --}}
          <div class="mt-4 d-flex justify-content-end gap-2">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Generar</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>