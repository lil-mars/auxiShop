@extends('layouts.master')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($client->name) ? $client->get_full_name() : 'Cliente' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('clients.client.destroy', $client->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('clients.client.index') }}" class="btn btn-primary" title="Show All Client">
                        <span class="fa fa-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('clients.client.create') }}" class="btn btn-success" title="Create New Client">
                        <span class="fa fa-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('clients.client.edit', $client->id ) }}" class="btn btn-primary" title="Edit Client">
                        <span class="fa fa-pen" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Client" onclick="return confirm(&quot;Click Ok to delete Client.?&quot;)">
                        <span class="fa fa-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Nombre de compañía</dt>
            <dd>{{ $client->company_name }}</dd>
            <dt>Apellido paterno</dt>
            <dd>{{ $client->father_last_name }}</dd>
            <dt>Apellido materno</dt>
            <dd>{{ $client->mother_last_name }}</dd>
            <dt>Segundo nombre</dt>
            <dd>{{ $client->second_name }}</dd>
            <dt>Nombre</dt>
            <dd>{{ $client->name }}</dd>
            <dt>Ocupacion</dt>
            <dd>{{ $client->occupation }}</dd>
            <dt>Direccion</dt>
            <dd>{{ $client->address }}</dd>
            <dt>Telefono</dt>
            <dd>{{ $client->phone }}</dd>
            <dt>Fax</dt>
            <dd>{{ $client->fax }}</dd>
            <dt>CI</dt>
            <dd>{{ $client->ci }}</dd>
            <dt>Created At</dt>
            <dd>{{ $client->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $client->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection
