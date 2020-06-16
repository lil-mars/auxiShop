
<div class="form-group {{ $errors->has('provider_id') ? 'has-error' : '' }}">
    <label for="provider_id" class="col-md-2 control-label">Proveedor</label>
    <div class="col-md-10">
        <select class="form-control" id="provider_id" name="provider_id">
        	    <option value="" style="display: none;" {{ old('provider_id', optional($purchase)->provider_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select provider</option>
        	@foreach ($Providers as $key => $Provider)
			    <option value="{{ $key }}" {{ old('provider_id', optional($purchase)->provider_id) == $key ? 'selected' : '' }}>
			    	{{ $Provider->get_full_name() }}
			    </option>
			@endforeach
        </select>

        {!! $errors->first('provider_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('contact') ? 'has-error' : '' }}">
    <label for="contact" class="col-md-2 control-label">Contacto</label>
    <div class="col-md-10">
        <input class="form-control" name="contact" type="text" id="contact" value="{{ old('contact', optional($purchase)->contact) }}" maxlength="255" placeholder="Enter contact here...">
        {!! $errors->first('contact', '<p class="help-block">:message</p>') !!}
    </div>
</div>



