@extends('layouts.master')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($provider->name) ? $provider->get_full_name() : 'Provider' }}</h4>
        </span>

            <div class="pull-right">

                <form method="POST" action="{!! route('providers.provider.destroy', $provider->id) !!}"
                      accept-charset="UTF-8">
                    <input name="_method" value="DELETE" type="hidden">
                    {{ csrf_field() }}
                    <div class="btn-group btn-group-sm" role="group">
                        <a href="{{ route('providers.provider.index') }}" class="btn btn-primary"
                           title="Show All Provider">
                            <span class="fa fa-list" aria-hidden="true"></span>
                        </a>

                        <a href="{{ route('providers.provider.create') }}" class="btn btn-success"
                           title="Create New Provider">
                            <span class="fa fa-plus" aria-hidden="true"></span>
                        </a>

                        <a href="{{ route('providers.provider.edit', $provider->id ) }}" class="btn btn-primary"
                           title="Edit Provider">
                            <span class="fa fa-pen" aria-hidden="true"></span>
                        </a>

                        <button type="submit" class="btn btn-danger" title="Delete Provider"
                                onclick="return confirm(&quot;Click Ok to delete Provider.?&quot;)">
                            <span class="fa fa-trash" aria-hidden="true"></span>
                        </button>
                    </div>
                </form>

            </div>

        </div>

        <div class="card card-dark pt-1">
            <div class="card-header">
                <h3 class="card-title">Datos</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <dl class="row">
                    <div class="col-3">
                        <dt>compañía</dt>
                        <dd>{{ $provider->company_name }}</dd>
                    </div>
                    <div class="col-3">
                        <dt>Nombres</dt>
                        <dd>{{ $provider->name }}</dd>
                    </div>
                    <div class="col-3">
                        <dt>Apellidos</dt>
                        <dd>{{ $provider->last_name }}</dd>
                    </div>
                    <div class="col-3">
                        <dt>Ocupacion</dt>
                        <dd>{{ $provider->occupation }}</dd>
                    </div>
                    <div class="col-3">
                        <dt>Direccion</dt>
                        <dd>{{ $provider->address }}</dd>
                    </div>
                    <div class="col-3">
                        <dt>Ciudad</dt>
                        <dd>{{ $provider->city }}</dd>
                    </div>
                    <div class="col-3">
                        <dt>Codigo postal</dt>
                        <dd>{{ $provider->postal_code }}</dd>
                    </div>
                    <div class="col-3">
                        <dt>Pais</dt>
                        <dd>{{ $provider->country }}</dd>
                    </div>
                    <div class="col-3">
                        <dt>Telefono</dt>
                        <dd>{{ $provider->phone }}</dd>
                    </div>
                    <div class="col-3">
                        <dt>Fax</dt>
                        <dd>{{ $provider->fax }}</dd>
                    </div>
                    <div class="col-3">
                        <dt>Creacion</dt>
                        <dd>{{ $provider->created_at }}</dd>
                    </div>
                    <div class="col-3">
                        <dt>Ultima actualizacion</dt>
                        <dd>{{ $provider->updated_at }}</dd>
                    </div>
                </dl>

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
            <table class="table  table-bordered table-hover table-responsive-sm">
                <thead>
                <tr>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Contacto</th>
                    <th>Creacion</th>
                    <th>Ultima actulizacion</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($provider->purchases as $purchase)
                    <tr>
                        <td>{{$purchase->total_price}}</td>
                        <td>{{$purchase->count_spares()}}</td>
                        <td>{{$purchase->contact}}</td>
                        <td>{{$purchase->get_creation()}}</td>
                        <td>{{$purchase->get_last_update()}}</td>
                        <td><a href="{{ route('purchases.purchase.show', $purchase->id ) }}" class="btn btn-warning"
                               title="Show Sale">
                                <span class="fa fa-eye" aria-hidden="true"></span>
                            </a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>


@endsection
