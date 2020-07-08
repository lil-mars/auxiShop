
<div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
    <label for="code" class="col-md-2 control-label">Codigo</label>
    <div class="col-md-10">
        <input class="form-control" name="code" type="text" id="code"
               value="{{ old('code', optional($spare)->code) }}" maxlength="6" >
        {!! $errors->first('code', '<p class="help-block text-danger">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
    <label for="category_id" class="col-md-2 control-label">Categoria</label>
    <div class="col-md-10">
        <select class="form-control" id="category_id" name="category_id">
        	    <option value="" style="display: none;" {{ old('category_id', optional($spare)->category_id ?: '') == '' ? 'selected' : '' }} disabled selected>Categoria</option>
        	@foreach ($Categories as $key => $Category)
			    <option value="{{ $key }}" {{ old('category_id', optional($spare)->category_id) == $key ? 'selected' : '' }}>
			    	{{ $Category }}
			    </option>
			@endforeach
        </select>

        {!! $errors->first('category_id', '<p class="help-block text-danger">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('car_line_id') ? 'has-error' : '' }}">
    <label for="car_lines" class="col-md-2 control-label">Linea de carro</label>
    <div class="col-md-10">
        <select class="form-control" id="car_lines"
                name="car_lines[]" multiple="multiple">

        	@foreach ($CarLines as $key => $CarLine)
			    <option value="{{ $key }}" {{ old('car_line_id', optional($spare)->has_car_line($key)) ? 'selected' : '' }} >
			    	{{ $CarLine }}
			    </option>
			@endforeach
        </select>
        {!! $errors->first('car_line_id', '<p class="help-block text-danger">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('brand_id') ? 'has-error' : '' }}">
    <label for="brand_id" class="col-md-2 control-label">Marca</label>
    <div class="col-md-10">
        <select class="form-control" id="brand_id" name="brand_id">
        	    <option value="" style="display: none;" {{ old('brand_id', optional($spare)->brand_id ?: '') == '' ? 'selected' : '' }} disabled selected>Marca</option>
        	@foreach ($Brands as $brand)
			    <option value="{{ $brand->id }}" {{ old('brand_id', optional($spare)->brand_id) == $brand->id ? 'selected' : '' }}>
			    	{{ $brand->name }}
			    </option>
			@endforeach
        </select>

        {!! $errors->first('brand_id', '<p class="help-block text-danger">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    <label for="description" class="col-md-2 control-label">Decripcion</label>
    <div class="col-md-10">
        <input class="form-control" name="description" type="text" id="description" value="{{ old('description', optional($spare)->description) }}" maxlength="255">
        {!! $errors->first('description', '<p class="help-block text-danger">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('measure') ? 'has-error' : '' }}">
    <label for="measure" class="col-md-2 control-label">Medida</label>
    <div class="col-md-10">
        <input class="form-control" name="measure" type="text" id="measure" value="{{ old('measure', optional($spare)->measure) }}" maxlength="50" >
        {!! $errors->first('measure', '<p class="help-block text-danger">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('product_code') ? 'has-error' : '' }}">
    <label for="product_code" class="col-md-2 control-label">Codigo de producto</label>
    <div class="col-md-10">
        <input class="form-control" name="product_code" type="text" id="product_code" value="{{ old('product_code', optional($spare)->product_code) }}" maxlength="30" >
        {!! $errors->first('product_code', '<p class="help-block text-danger">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('original_code') ? 'has-error' : '' }}">
    <label for="original_code" class="col-md-2 control-label">Codigo original</label>
    <div class="col-md-10">
        <input class="form-control" name="original_code" type="text" id="original_code" value="{{ old('original_code', optional($spare)->original_code) }}" maxlength="50" >
        {!! $errors->first('original_code', '<p class="help-block text-danger">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('quantity') ? 'has-error' : '' }}">
    <label for="quantity" class="col-md-2 control-label">Cantidad</label>
    <div class="col-md-10">
        <input class="form-control" name="quantity" type="number" id="quantity" value="{{ old('quantity', optional($spare)->quantity) }}" min="-2147483648" max="2147483647" >
        {!! $errors->first('quantity', '<p class="help-block text-danger">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
    <label for="price" class="col-md-2 control-label">Precio</label>
    <div class="col-md-10">
        <input class="form-control" name="price" type="number" id="price" value="{{ old('price', optional($spare)->price) }}" min="-999999" max="999999" required="true"  step="any">
        {!! $errors->first('price', '<p class="help-block text-danger">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('price_m') ? 'has-error' : '' }}">
    <label for="price_m" class="col-md-2 control-label">Precio M</label>
    <div class="col-md-10">
        <input class="form-control" name="price_m" type="number" id="price_m" value="{{ old('price_m', optional($spare)->price_m) }}" min="-999999" max="999999" required="true"  step="any">
        {!! $errors->first('price_m', '<p class="help-block text-danger">:message</p>') !!}
    </div>
</div>

@if(auth()->user()->Role->name == 'admin')
<div class="form-group {{ $errors->has('investment') ? 'has-error' : '' }}">
    <label for="investment" class="col-md-2 control-label">Precio compra</label>
    <div class="col-md-10">
        <input class="form-control" name="investment" type="number" id="investment" value="{{ old('investment', optional($spare)->investment) }}" min="-999999" max="999999"   step="any">
        {!! $errors->first('investment', '<p class="help-block text-danger">:message</p>') !!}
    </div>
</div>
@endif
<div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
    <label for="image" class="col-md-2 control-label">Link de imagen</label>
    <div class="col-md-10">
        <input class="form-control" name="image" type="text" id="image" value="{{ old('image', optional($spare)->image) }}" min="0" max="255" >
        {!! $errors->first('image', '<p class="help-block text-danger">:message</p>') !!}
    </div>
</div>
<div class="row">
    <label for="showImage" class="col-md-2 control-label">Vista previa</label>
</div>
<div class="row">
    <div class="col-md-4 offset-3">
        <div class="text-center">
            <img src="" id="showImage" class="rounded img-fluid" alt="Seleciciona una foto">
        </div>
    </div>
</div>

