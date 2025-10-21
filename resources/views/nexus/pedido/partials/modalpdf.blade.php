<div id="myModal" class="modal fade show" tabindex="-1" aria-labelledby="myModalLabel" style="display: block;" aria-modal="true" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myModalLabel">Modal Heading</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                            </div>
                                            <div class="modal-body">
                                              <form action="{{route('pedidos.pdf', ['id'=>$pedido->id])}}" method="post">
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
                                                  @if($pedido->saldo > 0)
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
                                                      @else
                                                      <input type="hidden" name="bancoflag" value="2">
                                                      <input type="hidden" name="banco" value="4">
                                                      @endif
                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                      <button type="submit" class="btn btn-primary">Generar</button>
                                                    </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div>
