<div class="col-12 col-md-6 col-xl-3">
  <div class="form-group {{$errors->has('departamento') ? ' is-invalid' : ''}}">
    <label for="departamento" class="fntB">TIPO DE REGISTRO</label>
    <select class="custom-select" name="departamento">
      @if(isset($tarea))
        @switch($tarea->departamento)
            @case(1)
              <option >Elige una opción</option>
              <option value="1" selected>ENTREGA</option>
              <option value="2" >CONTABILIDAD</option>
              <option value="3" >RECURSOS HUMANOS</option>
              <option value="4" >PAGOS</option>
              <option value="5" >COBRANZA</option>
              <option value="6" >VENTAS</option>
              <option value="7" >MATERIALES</option>
              <option value="8" >MARKETING</option>
              <option value="9" >MISCELANEO</option>
            @break
            @case(2)
              <option >Elige una opción</option>
              <option value="1" >ENTREGA</option>
              <option value="2" selected>CONTABILIDAD</option>
              <option value="3" >RECURSOS HUMANOS</option>
              <option value="4" >PAGOS</option>
              <option value="5" >COBRANZA</option>
              <option value="6" >VENTAS</option>
              <option value="7" >MATERIALES</option>
              <option value="8" >MARKETING</option>
              <option value="9" >MISCELANEO</option>
            @break
            @case(3)
              <option >Elige una opción</option>
              <option value="1" >ENTREGA</option>
              <option value="2" >CONTABILIDAD</option>
              <option value="3" selected>RECURSOS HUMANOS</option>
              <option value="4" >PAGOS</option>
              <option value="5" >COBRANZA</option>
              <option value="6" >VENTAS</option>
              <option value="7" >MATERIALES</option>
              <option value="8" >MARKETING</option>
              <option value="9" >MISCELANEO</option>
            @break
            @case(4)
              <option >Elige una opción</option>
              <option value="1" >ENTREGA</option>
              <option value="2" >CONTABILIDAD</option>
              <option value="3" >RECURSOS HUMANOS</option>
              <option value="4" selected>PAGOS</option>
              <option value="5" >COBRANZA</option>
              <option value="6" >VENTAS</option>
              <option value="7" >MATERIALES</option>
              <option value="8" >MARKETING</option>
              <option value="9" >MISCELANEO</option>
            @break
            @case(5)
              <option >Elige una opción</option>
              <option value="1" >ENTREGA</option>
              <option value="2" >CONTABILIDAD</option>
              <option value="3" >RECURSOS HUMANOS</option>
              <option value="4" >PAGOS</option>
              <option value="5" selected>COBRANZA</option>
              <option value="6" >VENTAS</option>
              <option value="7" >MATERIALES</option>
              <option value="8" >MARKETING</option>
              <option value="9" >MISCELANEO</option>
            @break
            @case(6)
              <option >Elige una opción</option>
              <option value="1" >ENTREGA</option>
              <option value="2" >CONTABILIDAD</option>
              <option value="3" >RECURSOS HUMANOS</option>
              <option value="4" >PAGOS</option>
              <option value="5" >COBRANZA</option>
              <option value="6" selected>VENTAS</option>
              <option value="7" >MATERIALES</option>
              <option value="8" >MARKETING</option>
              <option value="9" >MISCELANEO</option>
            @break
            @case(7)
              <option >Elige una opción</option>
              <option value="1" >ENTREGA</option>
              <option value="2" >CONTABILIDAD</option>
              <option value="3" >RECURSOS HUMANOS</option>
              <option value="4" >PAGOS</option>
              <option value="5" >COBRANZA</option>
              <option value="6" >VENTAS</option>
              <option value="7" selected>MATERIALES</option>
              <option value="8" >MARKETING</option>
              <option value="9" >MISCELANEO</option>
            @break
            @case(8)
              <option >Elige una opción</option>
              <option value="1" >ENTREGA</option>
              <option value="2" >CONTABILIDAD</option>
              <option value="3" >RECURSOS HUMANOS</option>
              <option value="4" >PAGOS</option>
              <option value="5" >COBRANZA</option>
              <option value="6" >VENTAS</option>
              <option value="7" >MATERIALES</option>
              <option value="8" selected>MARKETING</option>
              <option value="9" >MISCELANEO</option>
            @break
            @case(9)
              <option >Elige una opción</option>
              <option value="1" >ENTREGA</option>
              <option value="2" >CONTABILIDAD</option>
              <option value="3" >RECURSOS HUMANOS</option>
              <option value="4" >PAGOS</option>
              <option value="5" >COBRANZA</option>
              <option value="6" >VENTAS</option>
              <option value="7" >MATERIALES</option>
              <option value="8" >MARKETING</option>
              <option value="9" selected>MISCELANEO</option>
            @break

        @endswitch
      @else
      <option >Elige una opción</option>
      <option value="1" >ENTREGA</option>
      <option value="2" >CONTABILIDAD</option>
      <option value="3" >RECURSOS HUMANOS</option>
      <option value="4" >PAGOS</option>
      <option value="5" >COBRANZA</option>
      <option value="6" >VENTAS</option>
      <option value="7" >MATERIALES</option>
      <option value="8" >MARKETING</option>
      <option value="9" >MISCELANEO</option>
      @endif
    </select>
    <small id="emailHelp" class="form-text text-muted">Tipo de pendiente.</small>
  </div>
  @error('departamento')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
</div>
<div class="col-12 col-md-6 col-xl-3">
  <div class="form-group {{$errors->has('importancia') ? ' is-invalid' : ''}}">
    <label for="importancia" class="fntB">PRIORIDAD</label>
    <select class="custom-select" name="importancia">
      @if(isset($tarea->importancia))
        @switch($tarea->importancia)
            @case(1)
            <option >Elige una opción</option>
            <option value="1" selected>SIN RELEVANCIA</option>
            <option value="2" >NORMAL</option>
            <option value="3" >IMPORTANTE</option>
            <option value="4" >URGENTE</option>
            <option value="5" >INMEDIATO</option>
                @break
            @case(2)
            <option >Elige una opción</option>
            <option value="1" >SIN RELEVANCIA</option>
            <option value="2" selected>NORMAL</option>
            <option value="3" >IMPORTANTE</option>
            <option value="4" >URGENTE</option>
            <option value="5" >INMEDIATO</option>
                @break
            @case(3)
            <option >Elige una opción</option>
            <option value="1" >SIN RELEVANCIA</option>
            <option value="2" >NORMAL</option>
            <option value="3" selected>IMPORTANTE</option>
            <option value="4" >URGENTE</option>
            <option value="5" >INMEDIATO</option>
                @break
            @case(4)
            <option >Elige una opción</option>
            <option value="1" >SIN RELEVANCIA</option>
            <option value="2" >NORMAL</option>
            <option value="3" >IMPORTANTE</option>
            <option value="4" selected>URGENTE</option>
            <option value="5" >INMEDIATO</option>
                @break
            @case(5)
            <option >Elige una opción</option>
            <option value="1" >SIN RELEVANCIA</option>
            <option value="2" >NORMAL</option>
            <option value="3" >IMPORTANTE</option>
            <option value="4" >URGENTE</option>
            <option value="5" selected>INMEDIATO</option>
                @break
        @endswitch
      @else
        <option >Elige una opción</option>
        <option value="1" >SIN RELEVANCIA</option>
        <option value="2" >NORMAL</option>
        <option value="3" >IMPORTANTE</option>
        <option value="4" >URGENTE</option>
        <option value="5" >INMEDIATO</option>
      @endif
    </select>
    <small id="emailHelp" class="form-text text-muted">Urgencia de la tarea del 1-5.</small>
  </div>
  @error('importancia')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
</div>
<div class="col-12 col-md-6 col-xl-3">
  <div class="form-group {{$errors->has('fechalimite') ? ' is-invalid' : ''}}">
    <label for="fechalimite" class="fntB">FECHA LIMITE</label>
    @if(isset($tarea->fechalimite))
    <input type="date" class="form-control" id="fechalimite" name="fechalimite"  placeholder="Enter email" value="{{old('fechalimite', $tarea->fechalimite->format('Y-m-d'))}}">
    @else
    <input type="date" class="form-control" id="fechalimite" name="fechalimite"  placeholder="Enter email">
    @endif
    <small id="emailHelp" class="form-text text-muted">En caso de no haber dejar vacio.</small>
  </div>
  @error('fechalimite')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
</div>
<div class="col-12 col-md-6 col-xl-3">
  <div class="form-group {{$errors->has('asignadoa') ? ' is-invalid' : ''}}">
    <label for="asignadoa" class="fntB">ASIGNAR TAREA</label>
    <select class="custom-select" name="asignadoa">
      <option >Elige una opción</option>
      @foreach($usuarios as $usuario)
        @if(isset($tarea->asignadoa) and $usuario->id == $tarea->asignadoa)
          <option value="{{$usuario->id}}" selected>{{$usuario->name}} {{ $usuario->last }}</option>
        @else
          <option value="{{$usuario->id}}">{{$usuario->name}} {{ $usuario->last }}</option>
        @endif
      @endforeach
    </select>
    <small id="emailHelp" class="form-text text-muted">Elige un usuario para asignarle una tarea, deja vacio para dominio gral.</small>
  </div>
  @error('asignadoa')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
</div>
<div class="col-12">
  <div class="form-group {{$errors->has('tarea') ? ' is-invalid' : ''}}">
    <label for="tarea" class="fntB">TAREA</label>
      <textarea class="form-control" name="tarea" id="exampleFormControlTextarea1" rows="3">@if(isset($tarea))
{{ $tarea->tarea }}
        @endif
      </textarea>
    <small id="emailHelp" class="form-text text-muted">Elige un usuario para asignarle una tarea, deja vacio para dominio gral.</small>
  </div>
  @error('tarea')
      <div class="alert alert-danger">{{ $message }}</div>
  @enderror
</div>
