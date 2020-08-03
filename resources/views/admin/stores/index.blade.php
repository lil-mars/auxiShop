@extends('layouts.master')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Tiendas</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('stores.store.create') }}" class="btn btn-success" title="Create New Store">
                    <span class="fa fa-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>

        @if(count($stores) == 0)
            <div class="panel-body text-center">
                <h4>No hay tiendas disponibles.</h4>
            </div>
        @else
        <div class="card">
            <div class="">

                <table class="table table-striped table-responsive-sm table-bordered">
                    <thead class="bg-dark">
                        <tr>
                            <th>Nombre</th>
                            <th>Direccion</th>
                            <th>Telefono</th>
                            <th>Estado</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($stores as $store)
                        @if(Auth::user()->hasStore($store->id))
                        <tr>
                            <td>{{ $store->name }}</td>
                            <td>{{ $store->address }}</td>
                            <td>{{ $store->phone }}</td>
                            <td>{{ $store->status }}</td>

                            <td>

                                <form method="POST" action="{!! route('stores.store.destroy', $store->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('stores.store.show', $store->id ) }}" class="btn btn-info" title="Show Store">
                                            <span class="fa fa-eye" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('stores.store.list', $store->id ) }}" class="btn btn-warning" title="Show Store">
                                            <span class="fa fa-clipboard-list" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('stores.store.edit', $store->id ) }}" class="btn btn-primary" title="Edit Store">
                                            <span class="fa fa-pen" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Store" onclick="return confirm(&quot;Click Ok to delete Store.&quot;)">
                                            <span class="fa fa-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>

                            </td>
                        </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $stores->render() !!}
        </div>

        @endif

    </div>
@endsection
