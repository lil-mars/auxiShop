
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Nombre</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($brand)->name) }}" maxlength="50" >
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('contry') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Pais</label>
    <div class="col-md-10">
        <input class="form-control" name="country" type="text" id="country" value="{{ old('country', optional($brand)->country) }}" maxlength="100" >
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

