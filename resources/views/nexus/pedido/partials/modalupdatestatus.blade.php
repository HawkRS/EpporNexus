<!-- Modal -->
<div class="modal fade" id="StatusModal" tabindex="-1" aria-labelledby="StatusModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="StatusModalLabel">Actualizar status</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('pedidos.updatestatus', ['id'=>$pedido->id]) }}" method="POST">
                    @csrf
                    <label class="form-group">Estado:</label>
                    <select class="form-control" name="estado" >
                        <option {{ $pedido->status == 'ordenado' ? 'selected' : '' }} value="ordenado">Ordenado</option>
                        <option {{ $pedido->status == 'produccion' ? 'selected' : '' }} value="produccion">En produccion</option>
                        <option {{ $pedido->status == 'terminado' ? 'selected' : '' }} value="terminado">Terminado</option>
                        <option {{ $pedido->status == 'entregado' ? 'selected' : '' }} value="entregado">Entregado</option>
                        <option {{ $pedido->status == 'espera' ? 'selected' : '' }} value="espera">Espera</option>
                        <option {{ $pedido->status == 'cancelado' ? 'selected' : '' }} value="cancelado">Cancelado</option>
                    </select>

                    <button type="button" class="btn btn-secondary mt-3" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>
