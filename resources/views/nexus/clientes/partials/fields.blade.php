<div class="col-12 col-md-6">
  <div class="form-group {{$errors->has('identificador') ? ' is-invalid' : ''}}">
    <label for="identificador" class="fntB">IDENTIFICADOR</label>
    @if(isset($cliente->identificador))
    <input type="text" class="form-control" id="identificador" name="identificador"  placeholder="Nombre comercial o corto para facil identificacion" value="{{ old('identificador', $cliente->identificador) }}">
    @else
    <input type="text" class="form-control" id="identificador" name="identificador"  placeholder="Nombre comercial o corto para facil identificacion" >
    @endif
  </div>
  @error('identificador')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
</div>

<div class="col-12 col-md-6">
  <div class="form-group {{$errors->has('razonsocial') ? ' is-invalid' : ''}}">
    <label for="razonsocial" class="fntB">RAZON SOCIAL</label>
    @if(isset($cliente->razonsocial))
    <input type="text" class="form-control" id="razonsocial" name="razonsocial"  placeholder="Registro oficial ante el SAT" value="{{ old('razonsocial', $cliente->razonsocial) }}">
    @else
    <input type="text" class="form-control" id="razonsocial" name="razonsocial"  placeholder="Registro oficial ante el SAT" >
    @endif
  </div>
  @error('razonsocial')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
</div>
{{-- END ROW 1 --}}
<div class="col-12 col-md-6 col-xl-4">
  <div class="form-group {{$errors->has('rfc') ? ' is-invalid' : ''}}">
    <label for="rfc" class="fntB">RFC</label>
    @if(isset($cliente->rfc))
    <input type="text" class="form-control" id="rfc" name="rfc"   value="{{ old('rfc', $cliente->rfc) }}">
    @else
    <input type="text" class="form-control" id="rfc" name="rfc"   >
    @endif
  </div>
  @error('rfc')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
</div>
<div class="col-12 col-md-6 col-xl-4">
  <div class="form-group {{$errors->has('correo') ? ' is-invalid' : ''}}">
    <label for="correo" class="fntB">Email</label>
    @if(isset($cliente->correo))
    <input type="text" class="form-control" id="correo" name="correo" value="{{ old('correo', $cliente->correo) }}">
    @else
    <input type="text" class="form-control" id="correo" name="correo">
    @endif
  </div>
  @error('correo')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
</div>
<div class="col-12 col-md-6 col-xl-4">
  <div class="form-group {{$errors->has('telefono') ? ' is-invalid' : ''}}">
    <label for="telefono" class="fntB">Telefono</label>
    @if(isset($cliente->telefono))
    <input type="text" class="form-control" id="telefono" name="telefono" value="{{ old('telefono', $cliente->telefono) }}">
    @else
    <input type="text" class="form-control" id="telefono" name="telefono">
    @endif
  </div>
  @error('telefono')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
</div>
{{-- END ROW 2 --}}
<div class="col-12 col-md-4">
  <div class="form-group {{$errors->has('direccion') ? ' is-invalid' : ''}}">
    <label for="direccion" class="fntB">Dirección</label>
    @if(isset($cliente->direccion))
    <input type="text" class="form-control" id="direccion" name="direccion" value="{{ old('direccion', $cliente->direccion) }}">
    @else
    <input type="text" class="form-control" id="direccion" name="direccion">
    @endif
  </div>
  @error('direccion')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
</div>
<div class="col-12 col-md-4">
  <div class="form-group {{$errors->has('colonia') ? ' is-invalid' : ''}}">
    <label for="colonia" class="fntB">Colonia</label>
    @if(isset($cliente->colonia))
    <input type="text" class="form-control" id="colonia" name="colonia" value="{{ old('colonia', $cliente->colonia) }}">
    @else
    <input type="text" class="form-control" id="colonia" name="colonia">
    @endif
  </div>
  @error('colonia')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
</div>
<div class="col-12 col-md-4">
  <div class="form-group {{$errors->has('codigopostal') ? ' is-invalid' : ''}}">
    <label for="codigopostal" class="fntB">Codigo Postal</label>
    @if(isset($cliente->codigopostal))
    <input type="text" class="form-control" id="codigopostal" name="codigopostal" value="{{ old('codigopostal', $cliente->codigopostal) }}">
    @else
    <input type="text" class="form-control" id="codigopostal" name="codigopostal">
    @endif
  </div>
  @error('codigopostal')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
</div>
{{-- END ROW 3 --}}
<div class="col-12 col-md-4">
  <div class="form-group {{$errors->has('municipio') ? ' is-invalid' : ''}}">
    <label for="municipio" class="fntB">Municipio</label>
    @if(isset($cliente->municipio))
    <input type="text" class="form-control" id="municipio" name="municipio" value="{{ old('municipio', $cliente->municipio) }}">
    @else
    <input type="text" class="form-control" id="municipio" name="municipio">
    @endif
  </div>
  @error('municipio')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
</div>
<div class="col-12 col-md-4">
  <div class="form-group {{$errors->has('estado') ? ' is-invalid' : ''}}">
    <label for="estado" class="fntB">Estado</label>
    @if(isset($cliente->estado))
    <input type="text" class="form-control" id="estado" name="estado" value="{{ old('estado', $cliente->estado) }}">
    @else
    <input type="text" class="form-control" id="estado" name="estado">
    @endif
  </div>
  @error('estado')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
</div>
<div class="col-12 col-md-4">
  <div class="form-group {{$errors->has('pais') ? ' is-invalid' : ''}}">
    <label for="pais" class="fntB">Pais</label>
    @if(isset($cliente->pais))
    <input type="text" class="form-control" id="pais" name="pais" value="{{ old('pais', $cliente->pais) }}">
    @else
    <input type="text" class="form-control" id="pais" name="pais">
    @endif
  </div>
  @error('pais')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
</div>
