
  {{ csrf_field() }}
  <div class="card p-3">

    <div class="row">
      <div class="col-12">
        <h4>INGRESO</h4>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group">
          <label for="ing_fecha" class="fntB">FECHA</label>
          @if(isset($ingreso->fecha))
          <input type="date" class="form-control" id="ing_fecha" name="ing_fecha"  placeholder="Enter email" value="{{old('ing_fecha', $ingreso->fecha->format('Y-m-d'))}}">
          @else
          <input type="date" class="form-control" id="ing_fecha" name="ing_fecha"  placeholder="Enter email" >
          @endif
          <small id="emailHelp" class="form-text text-muted">Fecha en que fue pagada la factura.</small>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group">
          <label for="ing_status" class="fntB">ESTATUS</label>
          <select class="custom-select" name="ing_status">
            @if(isset($ingreso->estatus) and $ingreso->estatus == 1)
              <option >Elige una opción</option>
              <option value="1" selected>Defintivo</option>
              <option value="2">Pendiente</option>
              <option value="3">Proyectado</option>
            @elseif(isset($ingreso->estatus) and $ingreso->estatus == 2)
              <option >Elige una opción</option>
              <option value="1">Defintivo</option>
              <option value="2" selected>Pendiente</option>
              <option value="3">Proyectado</option>
            @elseif(isset($ingreso->estatus) and $ingreso->estatus == 3)
              <option >Elige una opción</option>
              <option value="1">Defintivo</option>
              <option value="2">Pendiente</option>
              <option value="3" selected>Proyectado</option>
            @else
              <option selected>Elige una opción</option>
              <option value="1">Defintivo</option>
              <option value="2">Pendiente</option>
              <option value="3">Proyectado</option>
            @endif
          </select>
          <small id="emailHelp" class="form-text text-muted">Elige el estatus del ingreso.</small>
        </div>
      </div>
      <div class="col-12">
        <div class="form-group">
          <label for="ing_client" class="fntB">CLIENTE</label>
          <select class="custom-select" name="ing_client">
            <option selected>Elige una opción</option>
            @foreach($clientes as $cliente)
              @if(isset($ingreso->personas_id) and $cliente->id == $ingreso->personas_id)
                <option value="{{$cliente->id}}" selected>{{$cliente->identificador}}</option>
              @else
                <option value="{{$cliente->id}}">{{$cliente->identificador}}</option>
              @endif
            @endforeach
          </select>
          <small id="emailHelp" class="form-text text-muted">Elige el cliente.</small>
        </div>
      </div>
    </div>
    {{--END ROW 1 --}}
    <div class="row">
      <div class="col-12 col-md-6">
        <div class="form-group">
          <label for="ing_folio" class="fntB">FOLIO</label>
          @if(isset($ingreso->folio))
          <input type="text" class="form-control" id="ing_folio" name="ing_folio"  placeholder="Ingresa el folio de la factura" value="{{old('ing_folio', $ingreso->folio)}}">
          @else
          <input type="text" class="form-control" id="ing_folio" name="ing_folio"  placeholder="Ingresa el folio de la factura">
          @endif
          <small id="emailHelp" class="form-text text-muted">Sustituye los espacios por (-).</small>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group">
          <label for="ing_pub" class="fntB">IVA Manual</label>
          <select class="custom-select" name="ing_pub" id="ing_pub">
            @if(isset($ingreso->test) and $ingreso->test == 0)
              <option value="-1">Elige una opción</option>
              <option value="1">Si</option>
              <option value="0" selected>No</option>
            @elseif(isset($ingreso->test) and $ingreso->test == 1)
              <option value="-1">Elige una opción</option>
              <option value="1" selected>Si</option>
              <option value="0">No</option>
            @else
              <option value="-1"selected>Elige una opción</option>
              <option value="1">Si</option>
              <option value="0">No</option>
            @endif

          </select>
          <small id="emailHelp" class="form-text text-muted">Las facturas de gasolina tienen un manejo diferente del IVA.</small>
        </div>
      </div>
    </div>
    {{--END ROW 2 --}}
    <div class="row">
      <div class="col-12 col-md-4">
        <div class="form-group">
          <label for="ing_subtotal" class="fntB">SUBTOTAL</label>
          @if(isset($ingreso->fecha))
          <input type="number" class="form-control" disabled id="ing_subtotal" name="ing_subtotal" step=".01" placeholder="0.00" value="{{ old('ing_subtotal', $ingreso->subtotal) }}">
          @else
          <input type="number" class="form-control" disabled id="ing_subtotal" name="ing_subtotal" step=".01" placeholder="0.00" >
          @endif
        </div>
      </div>
      <div class="col-12 col-md-4">
        <div class="form-group">
          <label for="ing_iva" class="fntB">IVA</label>
          @if(isset($ingreso->fecha))
          <input type="number" class="form-control" disabled id="ing_iva" name="ing_iva" step=".01" placeholder="0.00" value="{{ old('ing_iva', $ingreso->iva) }}">
          @else
          <input type="number" class="form-control" disabled id="ing_iva" name="ing_iva" step=".01" placeholder="0.00">
          @endif
        </div>
      </div>
      <div class="col-12 col-md-4">
        <div class="form-group">
          <label for="ing_total" class="fntB">TOTAL</label>
          @if(isset($ingreso->fecha))
          <input type="number" class="form-control" id="ing_total" name="ing_total" step=".01" placeholder="Ingresa la cantidad" value="{{ old('ing_total', $ingreso->total) }}">
          @else
          <input type="number" class="form-control" id="ing_total" name="ing_total" step=".01" placeholder="Ingresa la cantidad">
          @endif
        </div>
      </div>
    </div>
    {{--END ROW 3 --}}
    <div class="row justify-content-center">
      <div class="col-12 col-md-6 col-lg-4">
        <button type="submit" name="button" class="btn btn-block btn-primary btn-sm">CREAR</button>
      </div>
    </div>
  </div>

</form>
