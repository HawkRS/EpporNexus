<form action="{{ isset($declaracion) ? route('declaracion.update', $declaracion->id) : route('declaracion.store') }}" method="POST">
    @csrf
    @if(isset($declaracion))
        @method('PUT')
    @endif

    <div class="row justify-content-center">


    <!-- Campo Fecha -->
    <div class="col-md-6 pt-2">
        <label for="fecha">Fecha</label>
        <input type="date" class="form-control" id="fecha" name="fecha" value="{{ isset($declaracion) ? $declaracion->fecha : old('fecha') }}" required>
    </div>

    <!-- Campo Periodo -->
    <div class="col-md-6 pt-2">
        <label for="periodo">Periodo</label>
        <input type="text" class="form-control" id="periodo" name="periodo" value="{{ isset($declaracion) ? $declaracion->periodo : old('periodo') }}" required>
    </div>

    <!-- Campo Estatus -->
    <div class="col-md-6 pt-2">
        <label for="estatus">Estatus</label>
        <select class="form-control" id="estatus" name="estatus" required>
            <option value="1" {{ (isset($declaracion) && $declaracion->estatus == 'pendiente') ? 'selected' : '' }}>Pendiente</option>
            <option value="0" {{ (isset($declaracion) && $declaracion->estatus == 'pagado') ? 'selected' : '' }}>Pagado</option>
        </select>
    </div>

    <!-- Campo RFC -->
    <div class="col-md-6 pt-2">
        <label for="rfc">RFC</label>
        <input type="text" class="form-control" id="rfc" name="rfc" value="{{ isset($declaracion) ? $declaracion->rfc : old('rfc') }}" required maxlength="13">
    </div>

    <!-- Campo Monto -->
    <div class="col-md-6 pt-2">
        <label for="monto">Monto</label>
        <input type="number" class="form-control" id="monto" name="monto" value="{{ isset($declaracion) ? $declaracion->monto : old('monto') }}" required step="0.01">
    </div>

    <!-- Campo Fecha de Pago -->
    <div class="col-md-6 pt-2">
        <label for="fechadepago">Fecha de Pago (opcional)</label>
        <input type="date" class="form-control" id="fechadepago" name="fechadepago" value="{{ isset($declaracion) ? $declaracion->fechadepago : old('fechadepago') }}">
    </div>

      <div class="col-md-6 col-xl-3 pt-4">
        <!-- Botón Guardar -->
        <button type="submit" class="btn btn-block btn-sm btn-primary fntB">
          {{ isset($declaracion) ? 'Actualizar' : 'Guardar' }}
        </button>
      </div>
    </div>
</form>