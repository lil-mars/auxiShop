
<div class="form-group {{ $errors->has('purchase_id') ? 'has-error' : '' }}">
    <label for="purchase_id" class="col-md-2 control-label">Purchase</label>
    <div class="col-md-10">
        <select class="form-control" id="purchase_id" name="purchase_id">
        	    <option value="" style="display: none;" {{ old('purchase_id', optional($purchaseSpare)->purchase_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select purchase</option>
        	@foreach ($Purchases as $key => $Purchase)
			    <option value="{{ $key }}" {{ old('purchase_id', optional($purchaseSpare)->purchase_id) == $key ? 'selected' : '' }}>
			    	{{ $Purchase }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('purchase_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('spare_id') ? 'has-error' : '' }}">
    <label for="spare_id" class="col-md-2 control-label">Spare</label>
    <div class="col-md-10">
        <select class="form-control" id="spare_id" name="spare_id">
        	    <option value="" style="display: none;" {{ old('spare_id', optional($purchaseSpare)->spare_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select spare</option>
        	@foreach ($Spares as $key => $Spare)
			    <option value="{{ $key }}" {{ old('spare_id', optional($purchaseSpare)->spare_id) == $key ? 'selected' : '' }}>
			    	{{ $Spare }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('spare_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('unit_price') ? 'has-error' : '' }}">
    <label for="unit_price" class="col-md-2 control-label">Unit Price</label>
    <div class="col-md-10">
        <input class="form-control" name="unit_price" type="number" id="unit_price" value="{{ old('unit_price', optional($purchaseSpare)->unit_price) }}" min="-999999" max="999999" placeholder="Enter unit price here..." step="any">
        {!! $errors->first('unit_price', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
    <label for="price" class="col-md-2 control-label">Price</label>
    <div class="col-md-10">
        <input class="form-control" name="price" type="number" id="price" value="{{ old('price', optional($purchaseSpare)->price) }}" min="-999999" max="999999" placeholder="Enter price here..." step="any">
        {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('quantity') ? 'has-error' : '' }}">
    <label for="quantity" class="col-md-2 control-label">Quantity</label>
    <div class="col-md-10">
        <input class="form-control" name="quantity" type="number" id="quantity" value="{{ old('quantity', optional($purchaseSpare)->quantity) }}" min="-2147483648" max="2147483647" placeholder="Enter quantity here...">
        {!! $errors->first('quantity', '<p class="help-block">:message</p>') !!}
    </div>
</div>

