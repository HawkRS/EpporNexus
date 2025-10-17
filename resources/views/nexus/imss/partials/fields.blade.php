<form action="{{ isset($pago) ? route('imss.update', $pago->id) : route('imss.store') }}" method="POST">
    @csrf
    @if(isset($pago))
        @method('PUT')
    @endif

    <div class="row justify-content-center">


    <!-- Campo Fecha -->
    <div class="col-md-6 pt-2">
        <label for="fecha">Fecha</label>
        <input type="date" class="form-control" id="fecha" name="fecha" value="{{ isset($pago) ? $pago->fecha : old('fecha') }}" required>
    </div>

    <!-- Campo Periodo -->
    <div class="col-md-6 pt-2">
        <label for="periodo">Periodo</label>
        <input type="text" class="form-control" id="periodo" name="periodo" value="{{ isset($pago) ? $pago->periodo : old('periodo') }}" required>
    </div>

    <!-- Campo Bimestre -->
    <div class="col-md-6 pt-2">
        <label for="bimestre">Bimestre</label>
        <input type="text" class="form-control" id="bimestre" name="bimestre" value="{{ isset($pago) ? $pago->bimestre : old('bimestre') }}" required>
    </div>

    <!-- Campo Estatus -->
    <div class="col-md-6 pt-2">
        <label for="estatus">Estatus</label>
        <select class="form-control" id="estatus" name="estatus" required>
            <option value="1" {{ (isset($pago) && $pago->estatus == 'pendiente') ? 'selected' : '' }}>Pendiente</option>
            <option value="0" {{ (isset($pago) && $pago->estatus == 'pagado') ? 'selected' : '' }}>Pagado</option>
        </select>
    </div>

    <!-- Campo RFC -->
    <div class="col-md-6 pt-2">
        <label for="rfc">RFC</label>
        <input type="text" class="form-control" id="rfc" name="rfc" value="{{ isset($pago) ? $pago->rfc : old('rfc') }}" required maxlength="13">
    </div>

    <!-- Campo Monto -->
    <div class="col-md-6 pt-2">
        <label for="monto">Monto</label>
        <input type="number" class="form-control" id="monto" name="monto" value="{{ isset($pago) ? $pago->monto : old('monto') }}" required step="0.01">
    </div>

    <!-- Campo Empleados -->
    <div class="col-md-6 pt-2">
        <label for="empleados">Número de Empleados</label>
        <input type="number" class="form-control" id="empleados" name="empleados" value="{{ isset($pago) ? $pago->empleados : old('empleados') }}" required>
    </div>

    <!-- Campo Fecha de Pago -->
    <div class="col-md-6 pt-2">
        <label for="fechadepago">Fecha de Pago (opcional)</label>
        <input type="date" class="form-control" id="fechadepago" name="fechadepago" value="{{ isset($pago) ? $pago->fechadepago : old('fechadepago') }}">
    </div>

      <div class="col-md-6 col-xl-3 pt-4">
        <!-- Botón Guardar -->
        <button type="submit" class="btn btn-block btn-sm btn-primary fntB">
          {{ isset($pago) ? 'Actualizar' : 'Guardar' }}
        </button>
      </div>
    </div>
</form>