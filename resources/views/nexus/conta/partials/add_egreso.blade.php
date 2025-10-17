
  {{ csrf_field() }}
  <div class="card p-3">

    <div class="row">
      <div class="col-12">
        <h4>EGRESO</h4>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group {{$errors->has('egr_fecha') ? ' is-invalid' : ''}}">
          <label for="egr_fecha" class="fntB">FECHA</label>
          @if(isset($egreso->fecha))
          <input type="date" class="form-control" id="egr_fecha" name="egr_fecha"  placeholder="Enter email" value="{{old('egr_fecha', $egreso->fecha->format('Y-m-d'))}}">
          @else
          <input type="date" class="form-control" id="egr_fecha" name="egr_fecha"  placeholder="Enter email">
          @endif
          <small id="emailHelp" class="form-text text-muted">Fecha en que fue pagada la factura.</small>
        </div>
        @error('egr_fecha')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group {{$errors->has('egr_folio') ? ' is-invalid' : ''}}">
          <label for="egr_folio" class="fntB">FOLIO</label>
          @if(isset($egreso->folio))
          <input type="text" class="form-control" id="egr_folio" name="egr_folio"  placeholder="Ingresa el folio de la factura" value="{{ old('egr_folio', $egreso->folio) }}">
          @else
          <input type="text" class="form-control" id="egr_folio" name="egr_folio"  placeholder="Ingresa el folio de la factura" >
          @endif
          <small id="emailHelp" class="form-text text-muted">Sustituye los espacios por (-).</small>
        </div>
        @error('egr_folio')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
    </div>
    {{--END ROW 1 --}}
    <div class="row">
      <div class="col-12">
        <div class="form-group {{$errors->has('egr_provee') ? ' is-invalid' : ''}}">
          <label for="egr_provee" class="fntB">PROVEEDOR</label>
          <select class="custom-select" name="egr_provee">
            <option selected>Elige una opción</option>
            @foreach($proveedores as $proveedor)
              @if(isset($egreso->personas_id) and $proveedor->id == $egreso->personas_id)
                <option value="{{$proveedor->id}}" selected>{{$proveedor->identificador}}</option>
              @else
                <option value="{{$proveedor->id}}">{{$proveedor->identificador}}</option>
              @endif
            @endforeach
          </select>
          <small id="emailHelp" class="form-text text-muted">Elige el proveedor.</small>
        </div>
        @error('egr_provee')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group {{$errors->has('egr_status') ? ' is-invalid' : ''}}">
          <label for="egr_status" class="fntB">ESTATUS</label>
          <select class="custom-select" name="egr_status">
              @if(isset($egreso->estatus) and $egreso->estatus == 1)
                <option >Elige una opción</option>
                <option value="1" selected>Defintivo</option>
                <option value="2">Pendiente</option>
                <option value="3">Proyectado</option>
              @elseif(isset($egreso->estatus) and $egreso->estatus == 2)
                <option >Elige una opción</option>
                <option value="1">Defintivo</option>
                <option value="2" selected>Pendiente</option>
                <option value="3">Proyectado</option>
              @elseif(isset($egreso->estatus) and $egreso->estatus == 3)
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
          <small id="emailHelp" class="form-text text-muted">Elige el estatus del egreso.</small>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group {{$errors->has('egr_gas') ? ' is-invalid' : ''}}">
          <label for="egr_gas" class="fntB">IVA MANUAL</label>
          <select class="custom-select" name="egr_gas" id="egr_gas">
            <option value="-1"selected>Elige una opción</option>
            <option value="1">Si</option>
            <option value="0">No</option>
          </select>
          <small id="emailHelp" class="form-text text-muted">Las facturas de gasolina tienen un manejo diferente del IVA.</small>
        </div>
      </div>
    </div>
    {{--END ROW 2 --}}
    <div class="row">
      <div class="col-12 col-md-4">
        <div class="form-group {{$errors->has('egr_subtotal') ? ' is-invalid' : ''}}">
          <label for="egr_subtotal" class="fntB">SUBTOTAL</label>
          @if(isset($egreso->fecha))
          <input type="number" class="form-control" disabled id="egr_subtotal" name="egr_subtotal" step=".01" placeholder="0.00" value="{{ old('egr_subtotal', $egreso->subtotal) }}">
          @else
          <input type="number" class="form-control" disabled id="egr_subtotal" name="egr_subtotal" step=".01" placeholder="0.00" >
          @endif
        </div>
      </div>
      <div class="col-12 col-md-4">
        <div class="form-group {{$errors->has('egr_iva') ? ' is-invalid' : ''}}">
          <label for="egr_iva" class="fntB">IVA</label>
          @if(isset($egreso->fecha))
          <input type="number" class="form-control" disabled id="egr_iva" name="egr_iva" step=".01" placeholder="0.00" value="{{ old('egr_iva', $egreso->iva) }}">
          @else
          <input type="number" class="form-control" disabled id="egr_iva" name="egr_iva" step=".01" placeholder="0.00">
          @endif
        </div>
      </div>
      <div class="col-12 col-md-4">
        <div class="form-group {{$errors->has('egr_total') ? ' is-invalid' : ''}}">
          <label for="egr_total" class="fntB">TOTAL</label>
          @if(isset($egreso->fecha))
          <input type="number" class="form-control" id="egr_total" name="egr_total" step=".01" placeholder="Ingresa la cantidad" value="{{ old('egr_total', $egreso->total) }}">
          @else
          <input type="number" class="form-control" id="egr_total" name="egr_total" step=".01" placeholder="Ingresa la cantidad">
          @endif
        </div>
        @error('egr_total')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
    </div>
    {{--END ROW 3 --}}
    <div class="row justify-content-center">
      <div class="col-12 col-md-6 col-lg-4">
        <button type="submit" name="button" class="btn btn-block btn-primary btn-sm">CREAR</button>
      </div>
    </div>
  </div>
