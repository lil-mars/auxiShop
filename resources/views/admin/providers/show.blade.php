@extends('layouts.master')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($provider->name) ? $provider->get_full_name() : 'Provider' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('providers.provider.destroy', $provider->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('providers.provider.index') }}" class="btn btn-primary" title="Show All Provider">
                        <span class="fa fa-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('providers.provider.create') }}" class="btn btn-success" title="Create New Provider">
                        <span class="fa fa-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('providers.provider.edit', $provider->id ) }}" class="btn btn-primary" title="Edit Provider">
                        <span class="fa fa-pen" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Provider" onclick="return confirm(&quot;Click Ok to delete Provider.?&quot;)">
                        <span class="fa fa-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Company Name</dt>
            <dd>{{ $provider->company_name }}</dd>
            <dt>Name</dt>
            <dd>{{ $provider->name }}</dd>
            <dt>Last Name</dt>
            <dd>{{ $provider->last_name }}</dd>
            <dt>Occupation</dt>
            <dd>{{ $provider->occupation }}</dd>
            <dt>Address</dt>
            <dd>{{ $provider->address }}</dd>
            <dt>City</dt>
            <dd>{{ $provider->city }}</dd>
            <dt>Postal Code</dt>
            <dd>{{ $provider->postal_code }}</dd>
            <dt>Country</dt>
            <dd>{{ $provider->country }}</dd>
            <dt>Phone</dt>
            <dd>{{ $provider->phone }}</dd>
            <dt>Fax</dt>
            <dd>{{ $provider->fax }}</dd>
            <dt>Created At</dt>
            <dd>{{ $provider->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $provider->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection
