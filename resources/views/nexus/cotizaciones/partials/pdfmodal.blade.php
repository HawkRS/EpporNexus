<!-- Modal -->
<div class="modal fade" id="PDFModal" tabindex="-1" aria-labelledby="PDFModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="PDFModalLabel">Generar PDF</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('cotizacion.pdf', ['id'=>$cotizacion->id])}}" method="post">
          @csrf
          @method('POST')

          <div class="form-group">
              <label>Datos personales</label>
              <select  name="datos" class="form-control">
                  <option >Elige una opción</option disabled>
                  <option value="1">GOMC</option>
                  <option value="2">Eppor</option>
                  <option value="3">Ambos</option>
                  <option value="4">Ninguno</option>
              </select>
          </div>
          <div class="form-group">
              <label>¿Con información bancaria?</label>
              <select  name="bancoflag" class="form-control">
                  <option >Elige una opción</option disabled>
                  <option value="1">Si</option>
                  <option value="2">No</option>
              </select>
          </div>
          <div class="form-group">
              <label>Info bancaria</label>
              <select  name="banco" class="form-control">
                  <option >Elige una opción</option disabled>
                  <option value="1">Banamex GOMC</option>
                  <option value="2">Banamex GOHC</option>
                  <option value="3">HSBC DAGH</option>
                  <option value="4">Otro</option>
              </select>
          </div>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Generar</button>
        </form>
      </div>
    </div>
  </div>
</div>
