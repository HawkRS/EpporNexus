
  <div class="modal fade" id="modalNuevoArticulo" tabindex="-1" aria-labelledby="modalNuevoArticuloLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header bg-dark text-white">
                  <h5 class="modal-title" id="modalNuevoArticuloLabel">Registrar Nuevo Artículo de Ferretería</h5>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form method="POST" action="{{ route('ferreteria.store') }}">
                @csrf
                  <div class="modal-body">
                      <div class="row g-3">
                          <!-- Código -->
                          <div class="col-md-4">
                              <label for="codigo" class="form-label">Código</label>
                              <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Ej: ART-001" required>
                          </div>

                          <!-- Nombre -->
                          <div class="col-md-8">
                              <label for="nombre" class="form-label">Nombre del Artículo</label>
                              <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre descriptivo" required>
                          </div>

                          <!-- Categoría -->
                          <div class="col-md-6">
                              <label for="categoria" class="form-label">Categoría</label>
                              <select class="form-select" id="categoria" name="categoria" required>
                                  <option value="" selected disabled>Seleccione una opción...</option>
                                  <option value="abrasivos">Abrasivos</option>
                                  <option value="consumibles">Consumibles</option>
                                  <option value="miscelaneos">Misceláneos</option>
                                  <option value="seguridad">Seguridad</option>
                                  <option value="soldadura">Soldadura</option>
                              </select>
                          </div>

                          <!-- Unidad de Medida -->
                          <div class="col-md-6">
                              <label for="unidad_medida" class="form-label">Unidad de Medida</label>
                              <select class="form-select" id="unidad_medida" name="unidad_medida" required>
                                  <option value="pza">Pieza (PZA)</option>
                                  <option value="kg">Kilogramo (KG)</option>
                                  <option value="mts">Metros (MTS)</option>
                                  <option value="lt">Litros (LT)</option>
                              </select>
                          </div>

                          <!-- Cantidad -->
                          <div class="col-md-4">
                              <label for="cantidad" class="form-label">Stock Inicial</label>
                              <input type="number" class="form-control" id="cantidad" name="cantidad" min="0" value="0" required>
                          </div>

                          <!-- Costo Unitario -->
                          <div class="col-md-4">
                              <label for="costo_unitario" class="form-label">Costo Unitario ($)</label>
                              <input type="number" class="form-control" id="costo_unitario" name="costo_unitario" step="0.01" min="0" placeholder="0.00" required>
                          </div>

                          <!-- Precio de Venta -->
                          <div class="col-md-4">
                              <label for="precio_venta" class="form-label">Precio de Venta ($)</label>
                              <input type="number" class="form-control" id="precio_venta" name="precio_venta" step="0.01" min="0" placeholder="0.00" required>
                          </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                      <button type="submit" class="btn btn-success">Guardar Artículo</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
