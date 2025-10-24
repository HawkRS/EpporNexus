<div class="row">
  <!-- CAMPO: FECHA -->
  <div class="col-12 col-md-6 mb-3">
    <label for="ing_fecha" class="form-label fntB">FECHA</label>
    {{-- CORRECCIÓN: Lógica ISSET y control de tipo para evitar 'format() on string' --}}
    @if(isset($ingreso->fecha))
        @php
            // Comprueba si $ingreso->fecha es un objeto (Carbon).
            // Si lo es, llama a format('Y-m-d'). Si no, asume que es una cadena de fecha válida.
            $fecha_display = is_object($ingreso->fecha) ? $ingreso->fecha->format('Y-m-d') : $ingreso->fecha;
        @endphp
        <input type="date" class="form-control" id="ing_fecha" name="ing_fecha" placeholder="Enter email" value="{{old('ing_fecha', $fecha_display)}}">
    @else
    <input type="date" class="form-control" id="ing_fecha" name="ing_fecha" placeholder="Enter email">
    @endif
    <div id="dateHelp" class="form-text text-muted">Fecha en que fue pagada la factura.</div>
  </div>

  <!-- CAMPO: ESTATUS -->
  <div class="col-12 col-md-6 mb-3">
    <label for="ing_status" class="form-label fntB">ESTATUS</label>
    {{-- Se usa 'form-select' en lugar de 'custom-select' para BS5 --}}
    <select class="form-select" id="ing_status" name="ing_status">
      <option value="" @unless(isset($ingreso->estatus)) selected @endunless>Elige una opción</option>
      {{-- La lógica se simplifica usando el operador ternario para la selección --}}
      <option value="1" @if(isset($ingreso->estatus) && $ingreso->estatus == 1) selected @endif>Definitivo</option>
      <option value="2" @if(isset($ingreso->estatus) && $ingreso->estatus == 2) selected @endif>Pendiente</option>
      <option value="3" @if(isset($ingreso->estatus) && $ingreso->estatus == 3) selected @endif>Proyectado</option>
    </select>
    <div id="statusHelp" class="form-text text-muted">Elige el estatus del ingreso.</div>
  </div>

  <!-- CAMPO: CLIENTE -->
  <div class="col-12 mb-3">
    <label for="ing_client" class="form-label fntB">CLIENTE</label>
    <select class="form-select" id="ing_client" name="ing_client">
      <option selected>Elige una opción</option>
      @foreach($clientes as $cliente)
      <option class="text-uppercase" value="{{$cliente->id}}" @if(isset($ingreso->personas_id) and $cliente->id == $ingreso->personas_id) selected @endif>
        {{$cliente->identificador}}
      </option>
      @endforeach
    </select>
    <div id="clientHelp" class="form-text text-muted">Elige el cliente.</div>
  </div>
</div>
{{--END ROW 1 --}}

<div class="row">
  <!-- CAMPO: FOLIO -->
  <div class="col-12 col-md-6 mb-3">
    <label for="ing_folio" class="form-label fntB">FOLIO</label>
    <input type="text" class="form-control" id="ing_folio" name="ing_folio" placeholder="Ingresa el folio de la factura" value="{{old('ing_folio', $ingreso->folio ?? '')}}">
    <div id="folioHelp" class="form-text text-muted">Sustituye los espacios por (-).</div>
  </div>

  <!-- CAMPO: IVA Manual -->
  <div class="col-12 col-md-6 mb-3">
    <label for="ing_pub" class="form-label fntB">IVA Manual</label>
    <select class="form-select" name="ing_pub" id="ing_pub">
      <option value="-1" @unless(isset($ingreso->test)) selected @endunless>Elige una opción</option>
      {{-- La lógica se simplifica para la selección --}}
      <option value="1" @if(isset($ingreso->test) and $ingreso->test == 1) selected @endif>Sí</option>
      <option value="0" @if(isset($ingreso->test) and $ingreso->test == 0) selected @endif>No</option>
    </select>
    <div id="ivaHelp" class="form-text text-muted">Las facturas de gasolina tienen un manejo diferente del IVA.</div>
  </div>
</div>
{{--END ROW 2 --}}

<div class="row">
  <!-- CAMPO: SUBTOTAL -->
  <div class="col-12 col-md-4 mb-3">
    <label for="ing_subtotal" class="form-label fntB">SUBTOTAL</label>
    <input type="number" class="form-control" disabled id="ing_subtotal" name="ing_subtotal" step=".01" placeholder="0.00" value="{{ old('ing_subtotal', $ingreso->subtotal ?? '') }}">
    {{-- No se requiere help text --}}
  </div>

  <!-- CAMPO: IVA -->
  <div class="col-12 col-md-4 mb-3">
    <label for="ing_iva" class="form-label fntB">IVA</label>
    <input type="number" class="form-control" disabled id="ing_iva" name="ing_iva" step=".01" placeholder="0.00" value="{{ old('ing_iva', $ingreso->iva ?? '') }}">
    {{-- No se requiere help text --}}
  </div>

  <!-- CAMPO: TOTAL -->
  <div class="col-12 col-md-4 mb-3">
    <label for="ing_total" class="form-label fntB">TOTAL</label>
    <input type="number" class="form-control" id="ing_total" name="ing_total" step=".01" placeholder="Ingresa la cantidad" value="{{ old('ing_total', $ingreso->total ?? '') }}">
    {{-- No se requiere help text --}}
  </div>
</div>
{{--END ROW 3 --}}
