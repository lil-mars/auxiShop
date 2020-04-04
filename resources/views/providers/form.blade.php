
<div class="form-group {{ $errors->has('company_name') ? 'has-error' : '' }}">
    <label for="company_name" class="col-md-2 control-label">Company Name</label>
    <div class="col-md-10">
        <input class="form-control" name="company_name" type="text" id="company_name" value="{{ old('company_name', optional($provider)->company_name) }}" maxlength="40" placeholder="Enter company name here...">
        {!! $errors->first('company_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($provider)->name) }}" maxlength="40" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
    <label for="last_name" class="col-md-2 control-label">Last Name</label>
    <div class="col-md-10">
        <input class="form-control" name="last_name" type="text" id="last_name" value="{{ old('last_name', optional($provider)->last_name) }}" maxlength="40" placeholder="Enter last name here...">
        {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('occupation') ? 'has-error' : '' }}">
    <label for="occupation" class="col-md-2 control-label">Occupation</label>
    <div class="col-md-10">
        <input class="form-control" name="occupation" type="text" id="occupation" value="{{ old('occupation', optional($provider)->occupation) }}" maxlength="60" placeholder="Enter occupation here...">
        {!! $errors->first('occupation', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
    <label for="address" class="col-md-2 control-label">Address</label>
    <div class="col-md-10">
        <input class="form-control" name="address" type="text" id="address" value="{{ old('address', optional($provider)->address) }}" maxlength="255" placeholder="Enter address here...">
        {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
    <label for="city" class="col-md-2 control-label">City</label>
    <div class="col-md-10">
        <input class="form-control" name="city" type="text" id="city" value="{{ old('city', optional($provider)->city) }}" maxlength="20" placeholder="Enter city here...">
        {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('postal_code') ? 'has-error' : '' }}">
    <label for="postal_code" class="col-md-2 control-label">Postal Code</label>
    <div class="col-md-10">
        <input class="form-control" name="postal_code" type="text" id="postal_code" value="{{ old('postal_code', optional($provider)->postal_code) }}" maxlength="30" placeholder="Enter postal code here...">
        {!! $errors->first('postal_code', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('country') ? 'has-error' : '' }}">
    <label for="country" class="col-md-2 control-label">Country</label>
    <div class="col-md-10">
        <input class="form-control" name="country" type="text" id="country" value="{{ old('country', optional($provider)->country) }}" min="0" max="40" placeholder="Enter country here...">
        {!! $errors->first('country', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
    <label for="phone" class="col-md-2 control-label">Phone</label>
    <div class="col-md-10">
        <input class="form-control" name="phone" type="text" id="phone" value="{{ old('phone', optional($provider)->phone) }}" maxlength="20" placeholder="Enter phone here...">
        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('fax') ? 'has-error' : '' }}">
    <label for="fax" class="col-md-2 control-label">Fax</label>
    <div class="col-md-10">
        <input class="form-control" name="fax" type="text" id="fax" value="{{ old('fax', optional($provider)->fax) }}" maxlength="20" placeholder="Enter fax here...">
        {!! $errors->first('fax', '<p class="help-block">:message</p>') !!}
    </div>
</div>

