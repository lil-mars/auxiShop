
<div class="form-group {{ $errors->has('company_name') ? 'has-error' : '' }}">
    <label for="company_name" class="col-md-2 control-label">Nombre de compañía</label>
    <div class="col-md-10">
        <input class="form-control" name="company_name" type="text" id="company_name" value="{{ old('company_name', optional($client)->company_name) }}" maxlength="20" >
        {!! $errors->first('company_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('father_last_name') ? 'has-error' : '' }}">
    <label for="father_last_name" class="col-md-2 control-label">Apellido paterno</label>
    <div class="col-md-10">
        <input class="form-control" name="father_last_name" type="text" id="father_last_name" value="{{ old('father_last_name', optional($client)->father_last_name) }}" maxlength="20" >
        {!! $errors->first('father_last_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('mother_last_name') ? 'has-error' : '' }}">
    <label for="mother_last_name" class="col-md-2 control-label">Apellido materno</label>
    <div class="col-md-10">
        <input class="form-control" name="mother_last_name" type="text" id="mother_last_name" value="{{ old('mother_last_name', optional($client)->mother_last_name) }}" maxlength="20" >
        {!! $errors->first('mother_last_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('second_name') ? 'has-error' : '' }}">
    <label for="second_name" class="col-md-2 control-label">Segundo nombre</label>
    <div class="col-md-10">
        <input class="form-control" name="second_name" type="text" id="second_name" value="{{ old('second_name', optional($client)->second_name) }}" maxlength="20" >
        {!! $errors->first('second_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Nombre</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($client)->name) }}" maxlength="20" >
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('occupation') ? 'has-error' : '' }}">
    <label for="occupation" class="col-md-2 control-label">Ocupacion</label>
    <div class="col-md-10">
        <input class="form-control" name="occupation" type="text" id="occupation" value="{{ old('occupation', optional($client)->occupation) }}" maxlength="30" >
        {!! $errors->first('occupation', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
    <label for="address" class="col-md-2 control-label">Direccion</label>
    <div class="col-md-10">
        <input class="form-control" name="address" type="text" id="address" value="{{ old('address', optional($client)->address) }}" maxlength="20" >
        {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
    <label for="phone" class="col-md-2 control-label">Telefono</label>
    <div class="col-md-10">
        <input class="form-control" name="phone" type="text" id="phone" value="{{ old('phone', optional($client)->phone) }}" maxlength="20" >
        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('fax') ? 'has-error' : '' }}">
    <label for="fax" class="col-md-2 control-label">Fax</label>
    <div class="col-md-10">
        <input class="form-control" name="fax" type="text" id="fax" value="{{ old('fax', optional($client)->fax) }}" maxlength="20" >
        {!! $errors->first('fax', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('ci') ? 'has-error' : '' }}">
    <label for="ci" class="col-md-2 control-label">CI</label>
    <div class="col-md-10">
        <input class="form-control" name="ci" type="text" id="ci" value="{{ old('ci', optional($client)->ci) }}" minlength="1" maxlength="30" required="true" >
        {!! $errors->first('ci', '<p class="help-block">:message</p>') !!}
    </div>
</div>

