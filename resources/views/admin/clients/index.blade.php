@extends('layouts.master')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/datatables.min.css')}}">
@endsection
@section('page-title')
    Lista de Clientes
@endsection
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


            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('clients.client.create') }}" class="btn btn-success" title="Create New Clients">
                    <span class="fa fa-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>

        @if(count($clientsObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Clients Available.</h4>
            </div>
        @else
        <div class="card-body col-12">
            <div class="table-responsive">

                <table class="table table-striped " id="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Compañía</th>
                        <th>Nombre (Apellidos y nombres)</th>
                        <th>Telefono</th>
                        <th>CI</th>
                        <th>NIT</th>
                        <th>Compras</th>
                        <th>Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clientsObjects as $clients)
                        <tr>
                            <td>{{ $clients->id }}</td>
                            <td>{{ $clients->company_name }}</td>
                            <td>{{ $clients->get_full_name() }}</td>
                            <td>{{ $clients->phone }}</td>
                            <td>{{ $clients->ci }}</td>
                            <td>{{ $clients->nit }}</td>
                            <td>{{ $clients->countSales() }}</td>
                            <td>

                                <form method="POST" action="{!! route('clients.client.destroy', $clients->id) !!}" accept-charset="UTF-8">
                                    <input name="_method" value="DELETE" type="hidden">
                                    {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('clients.client.show', $clients->id ) }}" class="btn btn-info" title="Show Clients">
                                            <span class="fa fa-eye" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('clients.client.edit', $clients->id ) }}" class="btn btn-primary" title="Edit Clients">
                                            <span class="fa fa-pen" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Clients" onclick="return confirm(&quot;Click Ok to delete Clients.&quot;)">
                                            <span class="fa fa-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>

        </div>

        @endif

    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/spare/datatables.min.js') }}">    </script>
    <script src="{{ asset('js/spare/datatableconfig.js') }}">    </script>
@endsection
