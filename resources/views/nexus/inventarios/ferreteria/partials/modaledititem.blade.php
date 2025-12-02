<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Editar Registro de Soldadura</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="editForm" method="POST" action="{{ route('ferreteria.update', ['id' => 'ID_PLACEHOLDER']) }}">
                <div class="modal-body">
                    @csrf

                    <input type="hidden" name="id" id="editId">

                    <div class="mb-3">
                        <label for="editNombre" class="form-label">Nombre del Producto</label>
                        <input type="text" name="nombre" id="editNombre" required readonly
                            class="form-control" aria-describedby="nombreHelp">
                    </div>

                    <div class="mb-3">
                        <label for="editCantidad" class="form-label">Cantidad (Stock)</label>
                        <input type="number" name="cantidad" id="editCantidad" required min="0"
                            class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="editCosto" class="form-label">Costo Unitario</label>
                        <!-- Es crucial que el nombre del input coincida con el campo de tu modelo: costo_unitario -->
                        <input type="number" name="costo_unitario" id="editCosto" step="0.01" required
                            class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-warning">Guardar Cambios</button>
                </div>
            </form>

        </div>
    </div>
</div>
