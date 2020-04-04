@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($store->name) ? $store->name : 'Store' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('stores.store.destroy', $store->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('stores.store.index') }}" class="btn btn-primary" title="Show All Store">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('stores.store.create') }}" class="btn btn-success" title="Create New Store">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('stores.store.edit', $store->id ) }}" class="btn btn-primary" title="Edit Store">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Store" onclick="return confirm(&quot;Click Ok to delete Store.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $store->name }}</dd>
            <dt>Address</dt>
            <dd>{{ $store->address }}</dd>
            <dt>Phone</dt>
            <dd>{{ $store->phone }}</dd>
            <dt>Status</dt>
            <dd>{{ $store->status }}</dd>
            <dt>Created At</dt>
            <dd>{{ $store->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $store->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection