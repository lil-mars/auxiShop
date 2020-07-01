@extends('layouts.master')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="">{{ isset($store->name) ? $store->name : 'Store' }}</h4>
        </span>
            <div class="float-left p-2">
                <form method="POST" action="{!! route('stores.store.destroy', $store->id) !!}" accept-charset="UTF-8">
                    <input name="_method" value="DELETE" type="hidden">
                    {{ csrf_field() }}
                    <div class="btn-group btn-group-sm" role="group">
                        <a href="{{ route('stores.store.index') }}" class="btn btn-primary" title="Show All Store">
                            <span class="fa fa-list" aria-hidden="true"></span>
                        </a>

                        <a href="{{ route('stores.store.create') }}" class="btn btn-success" title="Create New Store">
                            <span class="fa fa-plus" aria-hidden="true"></span>
                        </a>

                        <a href="{{ route('stores.store.edit', $store->id ) }}" class="btn btn-primary"
                           title="Edit Store">
                            <span class="fa fa-pen" aria-hidden="true"></span>
                        </a>

                        <button type="submit" class="btn btn-danger" title="Delete Store"
                                onclick="return confirm(&quot;Click Ok to delete Store.?&quot;)">
                            <span class="fa fa-trash" aria-hidden="true"></span>
                        </button>
                    </div>
                </form>

            </div>

        </div>

        <div class="card">
            <div class="card-header bg-dark">
                <h5 class="card-title">
                    Datos
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <dt>Nombre</dt>
                        <dd>{{ $store->name }}</dd>
                    </div>
                    <div class="col-3">
                        <dt>Direccion</dt>
                        <dd>{{ $store->address }}</dd>
                    </div>
                    <div class="col-3">
                        <dt>Telefono</dt>
                        <dd>{{ $store->phone }}</dd>
                    </div>
                    <div class="col-3">
                        <dt>Estado</dt>
                        <dd>{{ $store->status }}</dd>
                    </div>
                    <div class="col-6">
                        <dt>Fecha creacion</dt>
                        <dd>{{ $store->created_at }}</dd>
                    </div>
                    <div class="col-6">
                        <dt>Fecha actualizacion</dt>
                        <dd>{{ $store->updated_at }}</dd>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection

