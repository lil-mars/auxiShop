
<div class="form-group {{ $errors->has('client_id') ? 'has-error' : '' }}">
    <label for="client_id" class="col-md-2 control-label">Cliente</label>
    <div class="col-md-10">
        <select class="form-control" id="client_id" name="client_id">
        	    <option value="" style="display: none;" {{ old('client_id', optional($sale)->client_id ?: '') == '' ? 'selected' : '' }} disabled selected>Seleccionar cliente</option>
        	@foreach ($Clients as $key => $Client)
			    <option value="{{ $key }}" {{ old('client_id', optional($sale)->client_id) == $key ? 'selected' : '' }}>
			    	{{ $Client->get_full_name() }}
			    </option>
			@endforeach
        </select>

        {!! $errors->first('client_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
@if(!isset($sale->store_id))
<div class="form-group {{ $errors->has('store_id') ? 'has-error' : '' }}">
    <label for="store_id" class="col-md-2 control-label">Tienda</label>
    <div class="col-md-10">
        <select class="form-control" id="store_id" name="store_id" required>
        	    <option value="" style="display: none;"
                        {{ old('store_id', optional($sale)->store_id ?: '') == '' ? 'selected' : '' }} disabled selected
                >Seleccionar tienda</option>
            @foreach(Auth::user()->stores as $store)
                <option value="{{$store->id}}" {{old('store_id', optional($sale)->store_id == $store->id ? 'selected': '')}}>
                    {{$store->name}}
                </option>
            @endforeach
        </select>
        {!! $errors->first('store_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
@endif
<input type="hidden" value="{{auth()->user()->id }}" name="user_id" {{ optional($sale)->user_id ? 'disabled' : '' }}>



