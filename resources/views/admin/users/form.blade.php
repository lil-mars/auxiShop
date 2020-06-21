
<div class="form-group {{ $errors->has('name') ? 'is_invalid' : '' }}">
    <label for="name" class="col-md-2 control-label">Nombres</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($user)->name) }}" minlength="1" maxlength="255" required="true" >
        {!! $errors->first('name', '<p class="invalid-feedback">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('last_name') ? 'is_invalid' : '' }}">
    <label for="last_name" class="col-md-2 control-label">Apellidos</label>
    <div class="col-md-10">
        <input class="form-control" name="last_name" type="text" id="last_name" value="{{ old('last_name', optional($user)->last_name) }}" maxlength="255" >
        {!! $errors->first('last_name', '<p class="invalid-feedback">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <label for="email" class="col-md-2 control-label">Email</label>
    <div class="col-md-10">
        <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" type="text" id="email" value="{{ old('email', optional($user)->email) }}" minlength="1" maxlength="255" required="true" >
        {!! $errors->first('email', '<p class="invalid-feedback">:message</p>') !!}
    </div>
</div>


@if(!isset($user->password))
<div class="form-group {{ $errors->has('password') ? 'is_invalid' : '' }}">
    <label for="password" class="col-md-2 control-label">Contraseña</label>
    <div class="col-md-10">
        <input type="password" class="form-control" name="password" type="text" id="password" value="{{ old('password', optional($user)->password) }}" minlength="1" maxlength="255" required="true" >
        {!! $errors->first('password', '<p class="invalid-feedback">:message</p>') !!}
        <input type="checkbox" onclick="showPassword()">Mostrar contrasena

    </div>
</div>
@endif


<div class="form-group {{ $errors->has('role_id') ? 'is_invalid' : '' }}">
    <label for="role_id" class="col-md-2 control-label">Rol</label>
    <div class="col-md-10">
        <select class="form-control" id="role_id" name="role_id">
        	    <option value="" style="display: none;" {{ old('role_id', optional($user)->role_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select role</option>
        	@foreach ($Roles as $key => $Role)
			    <option value="{{ $key }}" {{ old('role_id', optional($user)->role_id) == $key ? 'selected' : '' }}>
			    	{{ $Role }}
			    </option>
			@endforeach
        </select>

        {!! $errors->first('role_id', '<p class="invalid-feedback">:message</p>') !!}
    </div>
</div>
