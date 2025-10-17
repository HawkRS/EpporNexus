<div class="row">
    <div class="col-md-6 mb-3">
        <label for="codigo" class="form-label">Código</label>
        <input type="text" class="form-control" id="codigo" name="codigo" value="{{ old('codigo', $producto->codigo ?? '') }}" required>
    </div>

    <div class="col-md-6 mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $producto->nombre ?? '') }}" required>
    </div>

    <div class="col-12 mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <textarea class="form-control" id="descripcion" name="descripcion">{{ old('descripcion', $producto->descripcion ?? '') }}</textarea>
    </div>
    
    <div class="col-md-6 mb-3">
        <label for="existencia" class="form-label">Existencia</label>
        <input type="number" class="form-control" id="existencia" name="existencia" value="{{ old('existencia', $producto->existencia ?? 0) }}" required>
    </div>

    <div class="col-md-6 mb-3">
        <label for="categoria" class="form-label">Categoría</label>
        <select class="custom-select" id="categoria" name="categoria" required>
            <option value="1" {{ old('categoria', $producto->categoria ?? '') == 1 ? 'selected' : '' }}>Implementos</option>
            <option value="2" {{ old('categoria', $producto->categoria ?? '') == 2 ? 'selected' : '' }}>Comederos</option>
            <option value="3" {{ old('categoria', $producto->categoria ?? '') == 3 ? 'selected' : '' }}>Jaulas</option>
            <option value="4" {{ old('categoria', $producto->categoria ?? '') == 4 ? 'selected' : '' }}>Pisos</option>
        </select>
    </div>

    <div class="col-md-6 mb-3">
        <label for="costo" class="form-label">Costo</label>
        <input type="number" step="0.01" class="form-control" id="costo" name="costo" value="{{ old('costo', $producto->costo ?? '') }}">
    </div>

    <div class="col-md-6 mb-3">
        <label for="ganancia" class="form-label">Ganancia</label>
        <input type="number" step="0.01" class="form-control" id="ganancia" name="ganancia" value="{{ old('ganancia', $producto->ganancia ?? '') }}">
    </div>

    <div class="col-12">
        <div class="row">
            <div class="col-md-3">
                <label for="ancho" class="form-label">Ancho</label>
                <input type="number" step="0.01" class="form-control" id="ancho" name="ancho" value="{{ old('ancho', $producto->ancho ?? '') }}">
            </div>
            <div class="col-md-3">
                <label for="alto" class="form-label">Alto</label>
                <input type="number" step="0.01" class="form-control" id="alto" name="alto" value="{{ old('alto', $producto->alto ?? '') }}">
            </div>
            <div class="col-md-3">
                <label for="largo" class="form-label">Largo</label>
                <input type="number" step="0.01" class="form-control" id="largo" name="largo" value="{{ old('largo', $producto->largo ?? '') }}">
            </div>
            <div class="col-md-3">
                <label for="peso" class="form-label">Peso</label>
                <input type="number" step="0.01" class="form-control" id="peso" name="peso" value="{{ old('peso', $producto->peso ?? '') }}">
            </div>
        </div>
    </div>

     
</div>

