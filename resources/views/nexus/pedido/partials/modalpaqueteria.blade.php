
{{-- Modal --}}
<div class="modal fade" id="PaqueteriaModal" tabindex="-1" aria-labelledby="PaqueteriaModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="PaqueteriaModalLabel">Generar PDF</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="" action="{{route('pedidos.pdfpaqueteria', ['id'=>$pedido->id])}}" method="POST">
          @csrf
          <div class="row g-3">

            {{-- BLOQUE INFO DE ENVÍO Y LÓGICA DE OCULTACIÓN --}}
            <div class="col-12 mb-3">
                <label for="datosenvio" class="form-label">Info de envio</label>
                <select id="datosenvio" name="datosenvio" class="form-select">
                    <option selected disabled>Elige una opción</option>
                    <option value="1">Misma del pedido</option>
                    <option value="2">Otro</option>
                </select>
            </div>

            <div class="col-12 mb-3">
                <label for="tipoenvio" class="form-label">Lugar de envio</label>
                <select id="tipoenvio" name="tipoenvio" class="form-select">
                    <option selected disabled>Elige una opción</option>
                    <option value="1">Ocurre</option>
                    <option value="2">Domicilio</option>
                </select>
            </div>

            <div id="datosenviootros" class="col-12" >
                <div class="row g-3">
                    <h6 class="mt-0 pt-0 text-secondary">Destinatario:</h6>

                    <div class="col-md-6 mb-0">
                        <label for="receptor" class="form-label">Receptor</label>
                        <input class="form-control" type="text" id="receptor" name="receptor" value="">
                    </div>

                    <div class="col-md-6 mb-0">
                        <label for="numtelefono" class="form-label">Telefono</label>
                        <input class="form-control" type="text" id="numtelefono" name="numtelefono" value="">
                    </div>

                    <div class="col-12 mb-0">
                        <label for="domicilio" class="form-label">Domicilio</label>
                        <input class="form-control" type="text" id="domicilio" name="domicilio" value="">
                    </div>

                    <div class="col-md-6 mb-0">
                        <label for="colonia" class="form-label">Colonia</label>
                        <input class="form-control" type="text" id="colonia" name="colonia" value="">
                    </div>

                    <div class="col-md-6 mb-0">
                        <label for="ciudad" class="form-label">Ciudad</label>
                        <input class="form-control" type="text" id="ciudad" name="ciudad" value="">
                    </div>

                    <div class="col-md-6 mb-0">
                        <label for="estado" class="form-label">Estado</label>
                        <input class="form-control" type="text" id="estado" name="estado" value="">
                    </div>

                    <div class="col-md-6 mb-0">
                        <label for="codigopostal" class="form-label">Codigo Postal</label>
                        <input class="form-control" type="number" id="codigopostal" name="codigopostal" value="">
                    </div>
                </div>
            </div>
            {{-- FIN: BLOQUE DE ENVÍO --}}

            <div class="col-12 mb-0">
                <label for="numetiquetas" class="form-label">Cantidad de etiquetas para producto</label>
                <input class="form-control" type="number" id="numetiquetas" name="numetiquetas" value="">
            </div>

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