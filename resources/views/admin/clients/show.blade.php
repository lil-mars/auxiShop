@extends('layouts.master')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($client->name) ? $client->get_full_name() : 'Cliente' }}</h4>
        </span>

            <div class="pull-right">

                <form method="POST" action="{!! route('clients.client.destroy', $client->id) !!}"
                      accept-charset="UTF-8">
                    <input name="_method" value="DELETE" type="hidden">
                    {{ csrf_field() }}
                    <div class="btn-group btn-group-sm" role="group">
                        <a href="{{ route('clients.client.index') }}" class="btn btn-primary" title="Show All Client">
                            <span class="fa fa-list" aria-hidden="true"></span>
                        </a>

                        <a href="{{ route('clients.client.create') }}" class="btn btn-success"
                           title="Create New Client">
                            <span class="fa fa-plus" aria-hidden="true"></span>
                        </a>

                        <a href="{{ route('clients.client.edit', $client->id ) }}" class="btn btn-primary"
                           title="Edit Client">
                            <span class="fa fa-pen" aria-hidden="true"></span>
                        </a>

                        <button type="submit" class="btn btn-danger" title="Delete Client"
                                onclick="return confirm(&quot;Click Ok to delete Client.?&quot;)">
                            <span class="fa fa-trash" aria-hidden="true"></span>
                        </button>
                    </div>
                </form>

            </div>

        </div>
        <br>
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Datos</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>


            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <dt>Nombre de compañía</dt>
                        <dd>{{ $client->company_name }}</dd>
                    </div>
                    <div class="col-3">

                        <dt>Ocupacion</dt>
                        <dd>{{ $client->occupation }}</dd>
                    </div>
                    <div class="col-3">

                        <dt>Direccion</dt>
                        <dd>{{ $client->address }}</dd>
                    </div>
                    <div class="col-3">

                        <dt>Telefono</dt>
                        <dd>{{ $client->phone }}</dd>
                    </div>
                    <div class="col-3">
                        <dt>Apellido paterno</dt>
                        <dd>{{ $client->father_last_name }}</dd>
                    </div>
                    <div class="col-3">
                        <dt>Apellido materno</dt>
                        <dd>{{ $client->mother_last_name }}</dd>
                    </div>
                    <div class="col-3">
                        <dt>Segundo nombre</dt>
                        <dd>{{ $client->second_name }}</dd>
                    </div>
                    <div class="col-3">

                        <dt>Nombre</dt>
                        <dd>{{ $client->name }}</dd>
                    </div>

                    <div class="col-3">

                        <dt>Fax</dt>
                        <dd>{{ $client->fax }}</dd>
                    </div>
                    <div class="col-3">

                        <dt>CI</dt>
                        <dd>{{ $client->ci }}</dd>
                    </div>
                    <div class="col-3">
                        <dt>NIT</dt>
                        <dd>{{ $client->nit }}</dd>
                    </div>
                    <div class="col-6">
                        <dt>Creacion</dt>
                        <dd>{{ $client->created_at }}</dd>
                    </div>
                    <div class="col-4">
                        <dt>Ultima actualizacion</dt>
                        <dd>{{ $client->getUpdatedAt() }}</dd>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <div class="card card-dark">
        <div class="card-header">
            <h3 class="card-title">Ventas</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <br>
            <table class="table  table-bordered table-hover">
                <thead>
                <tr>
                    <th>Tienda</th>
                    <th>Usuario</th>
                    <th>Precio</th>
                    <th>Descuento</th>
                    <th>Cantidad</th>
                    <th>Creacion</th>
                    <th>Ultima actulizacion</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    @foreach($client->sales as $sale)
                        <td>{{optional($sale->Store)->name }}</td>
                        <td>{{$sale->User->get_full_name()}}</td>
                        <td>{{$sale->total_price}}</td>
                        <td>{{$sale->get_total_discount()}}</td>
                        <td>{{$sale->total_amount}}</td>
                        <td>{{$sale->get_creation()}}</td>
                        <td>{{$sale->get_last_update()}}</td>
                    @endforeach
                </tr>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>


@endsection
