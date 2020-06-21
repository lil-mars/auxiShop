
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Nombre</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($store)->name) }}" maxlength="40">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
    <label for="address" class="col-md-2 control-label">Direccion</label>
    <div class="col-md-10">
        <input class="form-control" name="address" type="text" id="address" value="{{ old('address', optional($store)->address) }}" maxlength="255">
        {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
    <label for="phone" class="col-md-2 control-label">Telefono</label>
    <div class="col-md-10">
        <input class="form-control" name="phone" type="text" id="phone" value="{{ old('phone', optional($store)->phone) }}" maxlength="20">
        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
    <label for="status" class="col-md-2 control-label">Estado</label>
    <div class="col-md-10">
        <input list="states" class="form-control" name="status" type="text" id="status" value="{{ old('status', optional($store)->status) }}" maxlength="20">
        <datalist id="states">
            <option value="Activado">
            <option value="Desactivado">
        </datalist>
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

