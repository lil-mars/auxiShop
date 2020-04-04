@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($client->name) ? $client->name : 'Client' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('clients.client.destroy', $client->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('clients.client.index') }}" class="btn btn-primary" title="Show All Client">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('clients.client.create') }}" class="btn btn-success" title="Create New Client">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('clients.client.edit', $client->id ) }}" class="btn btn-primary" title="Edit Client">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Client" onclick="return confirm(&quot;Click Ok to delete Client.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Company Name</dt>
            <dd>{{ $client->company_name }}</dd>
            <dt>Father Last Name</dt>
            <dd>{{ $client->father_last_name }}</dd>
            <dt>Mother Last Name</dt>
            <dd>{{ $client->mother_last_name }}</dd>
            <dt>Second Name</dt>
            <dd>{{ $client->second_name }}</dd>
            <dt>Name</dt>
            <dd>{{ $client->name }}</dd>
            <dt>Occupation</dt>
            <dd>{{ $client->occupation }}</dd>
            <dt>Address</dt>
            <dd>{{ $client->address }}</dd>
            <dt>Phone</dt>
            <dd>{{ $client->phone }}</dd>
            <dt>Fax</dt>
            <dd>{{ $client->fax }}</dd>
            <dt>Ci</dt>
            <dd>{{ $client->ci }}</dd>
            <dt>Created At</dt>
            <dd>{{ $client->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $client->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection