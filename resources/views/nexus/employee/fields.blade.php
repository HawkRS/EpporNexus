<div class="col-12">
  <div class="form-group {{$errors->has('name') ? ' is-invalid' : ''}}">
    <label for="name" class="fntB">Nombre(s)</label>
    @if(isset($empleado->name))
    <input type="text" class="form-control" id="name" name="name"  placeholder="Ingresa nombre(s)" value="{{old('name', $empleado->name)}}" required>
    @else
    <input type="text" class="form-control" id="name" name="name"  placeholder="Ingresa nombre(s)" required>
    @endif
  </div>
  @error('name')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
</div>

<div class="col-12">
  <div class="form-group {{$errors->has('last') ? ' is-invalid' : ''}}">
    <label for="last" class="fntB">Apellidos</label>
    @if(isset($empleado->last))
    <input type="text" class="form-control" id="last" name="last"  placeholder="Ingresa apellido(s)" value="{{old('last', $empleado->last)}}" required>
    @else
    <input type="text" class="form-control" id="last" name="last"  placeholder="Ingresa apellido(s)" required>
    @endif
  </div>
  @error('last')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
</div>

<div class="col-12 col-md-6">
  <div class="form-group {{$errors->has('phone1') ? ' is-invalid' : ''}}">
    <label for="phone1" class="fntB">Telefono 1</label>
    @if(isset($empleado->phone1))
    <input type="text" class="form-control" id="phone1" name="phone1"  placeholder="Ingresa Celular" value="{{old('phone1', $empleado->phone1)}}" required>
    @else
    <input type="text" class="form-control" id="phone1" name="phone1"  placeholder="Ingresa Celular" required>
    @endif
  </div>
  @error('phone1')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
</div>

<div class="col-12 col-md-6">
  <div class="form-group {{$errors->has('phone2') ? ' is-invalid' : ''}}">
    <label for="phone2" class="fntB">Telefono 2</label>
    @if(isset($empleado->phone2))
    <input type="text" class="form-control" id="phone2" name="phone2"  placeholder="Ingresa Telefono2" value="{{old('phone2', $empleado->phone2)}}">
    @else
    <input type="text" class="form-control" id="phone2" name="phone2"  placeholder="Ingresa Telefono2">
    @endif
  </div>
  @error('phone2')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
</div>

<div class="col-12">
  <div class="form-group {{$errors->has('address') ? ' is-invalid' : ''}}">
    <label for="address" class="fntB">Direccion</label>
    @if(isset($empleado->address))
    <input type="text" class="form-control" id="address" name="address"  placeholder="Ingresa domicilio completo" value="{{old('address', $empleado->address)}}" required>
    @else
    <input type="text" class="form-control" id="address" name="address"  placeholder="Ingresa domicilio completo" required>
    @endif
  </div>
  @error('address')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
</div>

<div class="col-12 col-md-6">
  <div class="form-group {{$errors->has('nss') ? ' is-invalid' : ''}}">
    <label for="nss" class="fntB">N° Seguro Social</label>
    @if(isset($empleado->nss))
    <input type="text" class="form-control" id="nss" name="nss"  placeholder="Ingresa NSS" value="{{old('nss', $empleado->nss)}}">
    @else
    <input type="text" class="form-control" id="nss" name="nss"  placeholder="Ingresa NSS">
    @endif
  </div>
  @error('nss')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
</div>

<div class="col-12 col-md-6">
  <div class="form-group {{$errors->has('rfc') ? ' is-invalid' : ''}}">
    <label for="rfc" class="fntB">RFC</label>
    @if(isset($empleado->rfc))
    <input type="text" class="form-control" id="rfc" name="rfc"  placeholder="Ingresa RFC" value="{{old('rfc', $empleado->rfc)}}">
    @else
    <input type="text" class="form-control" id="rfc" name="rfc"  placeholder="Ingresa RFC">
    @endif
  </div>
  @error('rfc')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
</div>

<div class="col-12 col-md-6">
  <div class="form-group {{$errors->has('curp') ? ' is-invalid' : ''}}">
    <label for="curp" class="fntB">CURP</label>
    @if(isset($empleado->curp))
    <input type="text" class="form-control" id="curp" name="curp"  placeholder="Ingresa CURP" value="{{old('curp', $empleado->curp)}}">
    @else
    <input type="text" class="form-control" id="curp" name="curp"  placeholder="Ingresa CURP">
    @endif
  </div>
  @error('curp')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
</div>

<div class="col-12 col-md-6">
  <label for="gender" class="control-label fntB {{ $errors->has('gender') ? ' text-danger' : '' }}">Genero</label>
  <select class="custom-select {{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender" id="gender">
    @if (isset($empleado->gender) )
      @if($empleado->gender == 'M')
        <option value=-1 >Elige una de las opciones...</option>
        <option value='H' >Hombre</option>
        <option value='M' selected>Mujer</option>
      @elseif($empleado->gender == 'H')
        <option value=-1 >Elige una de las opciones...</option>
        <option value='H' selected>Hombre</option>
        <option value='M' >Mujer</option>
      @endif
    @else
        <option value=-1 selected>Elige una de las opciones...</option>
        <option value='H' >Hombre</option>
        <option value='M' >Mujer</option>
    @endif
  </select>
  @if($errors->has('gender'))
    <small class="text-danger">{{ $errors->first('gender')}}</small>
  @endif
</div>

<div class="col-12 col-md-6">
  <label for="position" class="control-label fntB {{ $errors->has('position') ? ' text-danger' : '' }}">Posicion</label>
  <select class="custom-select {{ $errors->has('position') ? ' is-invalid' : '' }}" name="position" id="position">
    @if (isset($empleado->position) )
      @if($empleado->position == 'A')
        <option value=-1 >Elige una de las opciones...</option>
        <option value='S' >Soldador</option>
        <option value='A' selected>Armador</option>
      @elseif($empleado->position == 'S')
        <option value=-1 >Elige una de las opciones...</option>
        <option value='S' selected>Soldador</option>
        <option value='A' >Armador</option>
      @endif
    @else
        <option value=-1 selected>Elige una de las opciones...</option>
        <option value='S' >Soldador</option>
        <option value='A' >Armador</option>
    @endif
  </select>
  @if($errors->has('position'))
    <small class="text-danger">{{ $errors->first('position')}}</small>
  @endif
</div>

<div class="col-12 col-md-6">
  <label for="civilstate" class="control-label fntB {{ $errors->has('civilstate') ? ' text-danger' : '' }}">Estado civil</label>
  <select class="custom-select {{ $errors->has('civilstate') ? ' is-invalid' : '' }}" name="civilstate" id="civilstate">
    @if (isset($empleado->civilstate) )
      @if($empleado->civilstate == 1)
        <option value=-1 >Elige una de las opciones...</option>
        <option value='1' selected>Casado</option>
        <option value='2' >Soltero</option>
        <option value='3' >Separado</option>
      @elseif($empleado->civilstate == 2)
        <option value=-1 >Elige una de las opciones...</option>
        <option value='1' >Casado</option>
        <option value='2' selected>Soltero</option>
        <option value='3' >Separado</option>
      @elseif($empleado->civilstate == 3)
        <option value=-1 >Elige una de las opciones...</option>
        <option value='1' >Casado</option>
        <option value='2' >Soltero</option>
        <option value='3' selected>Separado</option>
      @endif
    @else
        <option value=-1 selected>Elige una de las opciones...</option>
        <option value='1' >Casado</option>
        <option value='2' >Soltero</option>
        <option value='3' >Separado</option>
    @endif
  </select>
  @if($errors->has('civilstate'))
    <small class="text-danger">{{ $errors->first('civilstate')}}</small>
  @endif
</div>

<div class="col-12 col-md-4">
  <div class="form-group {{$errors->has('salary') ? ' is-invalid' : ''}}">
    <label for="salary" class="fntB">Salario</label>
    @if(isset($empleado->salary))
    <input type="number" class="form-control" id="salary" name="salary"  placeholder="Ingresa salario" value="{{old('salary', $empleado->salary)}}" required>
    @else
    <input type="number" class="form-control" id="salary" name="salary"  placeholder="Ingresa salario" required>
    @endif
  </div>
  @error('salary')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
</div>

<div class="col-12 col-md-4">
  <label for="birthday" class="control-label fntB {{ $errors->has('birthday') ? ' text-danger' : '' }}">Birthday</label>
  @if(isset($empleado->birthday))
  <input type="date" class="form-control" id="birthday" name="birthday"  placeholder="Ingresa salario" value="{{old('birthday', $empleado->birthday)}}" required>
  @else
  <input type="date" class="form-control" id="birthday" name="birthday"  placeholder="Ingresa salario" required>
  @endif
  @error('birthday')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
</div>

<div class="col-12 col-md-4">
  <div class="form-group {{$errors->has('birthplace') ? ' is-invalid' : ''}}">
    <label for="birthplace" class="fntB">Estado de nacimiento</label>
    @if(isset($empleado->birthplace))
    <input type="text" class="form-control" id="birthplace" name="birthplace"  placeholder="Ingresa salario" value="{{old('birthplace', $empleado->birthplace)}}" required>
    @else
    <input type="text" class="form-control" id="birthplace" name="birthplace"  placeholder="Ingresa salario" required>
    @endif
  </div>
  @error('birthplace')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
</div>
