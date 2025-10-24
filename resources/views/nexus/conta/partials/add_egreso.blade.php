<div class="row">
  <!-- CAMPO: FECHA -->
  <div class="col-12 col-md-6 mb-3">
    <label for="egr_fecha" class="form-label fntB">FECHA</label>
    {{-- CORRECCIÓN: Lógica ISSET y control de tipo para evitar 'format() on string' --}}
    @if(isset($egreso->fecha))
        @php
            // Comprueba si $egreso->fecha es un objeto (Carbon).
            // Si lo es, llama a format('Y-m-d'). Si no, asume que es una cadena de fecha válida.
            $fecha_display = is_object($egreso->fecha) ? $egreso->fecha->format('Y-m-d') : $egreso->fecha;
        @endphp
    <input
      type="date"
      class="form-control @error('egr_fecha') is-invalid @enderror"
      id="egr_fecha"
      name="egr_fecha"
      placeholder="Enter email"
      value="{{old('egr_fecha', $fecha_display)}}">
    @else
    <input
      type="date"
      class="form-control @error('egr_fecha') is-invalid @enderror"
      id="egr_fecha"
      name="egr_fecha"
      placeholder="Enter email">
    @endif
    <div id="dateHelp" class="form-text text-muted">Fecha en que fue pagada la factura.</div>
    @error('egr_fecha')
      <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
  </div>

  <!-- CAMPO: FOLIO -->
  <div class="col-12 col-md-6 mb-3">
    <label for="egr_folio" class="form-label fntB">FOLIO</label>
    {{-- Lógica ISSET: Asegura que $egreso->folio exista --}}
    <input
      type="text"
      class="form-control @error('egr_folio') is-invalid @enderror"
      id="egr_folio"
      name="egr_folio"
      placeholder="Ingresa el folio de la factura"
      value="{{ old('egr_folio', $egreso->folio ?? '') }}">
    <div id="folioHelp" class="form-text text-muted">Sustituye los espacios por (-).</div>
    @error('egr_folio')
      <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
  </div>
</div>
{{--END ROW 1 --}}

<div class="row">
  <!-- CAMPO: PROVEEDOR -->
  <div class="col-12 mb-3">
    <label for="egr_provee" class="form-label fntB">PROVEEDOR</label>
    <select class="form-select @error('egr_provee') is-invalid @enderror" id="egr_provee" name="egr_provee">
      <option selected>Elige una opción</option>
      @foreach($proveedores as $proveedor)
      {{-- Lógica ISSET: Asegura que $egreso->personas_id exista para la selección --}}
      <option value="{{$proveedor->id}}" @if(isset($egreso->personas_id) and $proveedor->id == $egreso->personas_id) selected @endif>
        {{$proveedor->identificador}}
      </option>
      @endforeach
    </select>
    <div id="proveedorHelp" class="form-text text-muted">Elige el proveedor.</div>
    @error('egr_provee')
      <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
  </div>

  <!-- CAMPO: ESTATUS -->
  <div class="col-12 col-md-6 mb-3">
    <label for="egr_status" class="form-label fntB">ESTATUS</label>
    <select class="form-select @error('egr_status') is-invalid @enderror" name="egr_status" id="egr_status">
      {{-- Lógica ISSET: Asegura que $egreso->estatus exista para la selección --}}
      <option value="" @unless(isset($egreso->estatus)) selected @endunless>Elige una opción</option>
      <option value="1" @if(isset($egreso->estatus) && $egreso->estatus == 1) selected @endif>Definitivo</option>
      <option value="2" @if(isset($egreso->estatus) && $egreso->estatus == 2) selected @endif>Pendiente</option>
      <option value="3" @if(isset($egreso->estatus) && $egreso->estatus == 3) selected @endif>Proyectado</option>
    </select>
    <div id="statusHelp" class="form-text text-muted">Elige el estatus del egreso.</div>
    @error('egr_status')
      <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
  </div>

  <!-- CAMPO: IVA MANUAL -->
  <div class="col-12 col-md-6 mb-3">
    <label for="egr_gas" class="form-label fntB">IVA MANUAL</label>
    <select class="form-select @error('egr_gas') is-invalid @enderror" name="egr_gas" id="egr_gas">
      {{-- Lógica ISSET: Usamos $egreso->test como ejemplo, si es otra propiedad, ajústala --}}
      <option value="-1" @unless(isset($egreso->test)) selected @endunless>Elige una opción</option>
      <option value="1" @if(isset($egreso->test) and $egreso->test == 1) selected @endif>Sí</option>
      <option value="0" @if(isset($egreso->test) and $egreso->test == 0) selected @endif>No</option>
    </select>
    <div id="ivaManualHelp" class="form-text text-muted">Las facturas de gasolina tienen un manejo diferente del IVA.</div>
    @error('egr_gas')
      <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
  </div>
</div>
{{--END ROW 2 --}}

<div class="row">
  <!-- CAMPO: SUBTOTAL (Disabled) -->
  <div class="col-12 col-md-4 mb-3">
    <label for="egr_subtotal" class="form-label fntB">SUBTOTAL</label>
    {{-- Lógica ISSET: Asegura que $egreso->subtotal exista --}}
    <input
      type="number"
      class="form-control @error('egr_subtotal') is-invalid @enderror"
      disabled
      id="egr_subtotal"
      name="egr_subtotal"
      step=".01"
      placeholder="0.00"
      value="{{ old('egr_subtotal', $egreso->subtotal ?? '') }}">
    @error('egr_subtotal')
      <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
  </div>

  <!-- CAMPO: IVA (Disabled) -->
  <div class="col-12 col-md-4 mb-3">
    <label for="egr_iva" class="form-label fntB">IVA</label>
    {{-- Lógica ISSET: Asegura que $egreso->iva exista --}}
    <input
      type="number"
      class="form-control @error('egr_iva') is-invalid @enderror"
      disabled
      id="egr_iva"
      name="egr_iva"
      step=".01"
      placeholder="0.00"
      value="{{ old('egr_iva', $egreso->iva ?? '') }}">
    @error('egr_iva')
      <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
  </div>

  <!-- CAMPO: TOTAL -->
  <div class="col-12 col-md-4 mb-3">
    <label for="egr_total" class="form-label fntB">TOTAL</label>
    {{-- Lógica ISSET: Asegura que $egreso->total exista --}}
    <input
      type="number"
      class="form-control @error('egr_total') is-invalid @enderror"
      id="egr_total"
      name="egr_total"
      step=".01"
      placeholder="Ingresa la cantidad"
      value="{{ old('egr_total', $egreso->total ?? '') }}">
    @error('egr_total')
      <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
  </div>
</div>
{{--END ROW 3 --}}
