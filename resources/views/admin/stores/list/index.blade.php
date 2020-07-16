@extends('layouts.master')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/datatables.min.css')}}">
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
    @if(Session::has('error_message'))
        <div class="alert alert-danger">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('error_message') !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

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
    </div>
    <div class="card m-2">
        <div class="card-header bg-dark">
            <h5 class="card-title">
                Repuestos
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <table id="table" class="table table-responsive table-hover table-bordered" style="width: 100%">
                    <thead class="bg-dark">
                    <tr>
                        <th width="5%">Codigo</th>
                        <th width="30%">Descripcion</th>
                        <th width="7%">Categoria</th>
                        <th>Marca</th>
                        <th>Medida</th>
                        <th width="5%">Codigo respuesto</th>
                        <th>Cantidad</th>
                        @if(auth()->user()->Role->name == 'admin')
                            <th>Eliminar</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($store->store_spares as $store_spare)
                        <tr>
                            <td width="5%">{{ $store_spare->spare->code }}</td>
                            <td width="30%">{{ $store_spare->spare->description }}</td>
                            <td width="7%">{{ optional($store_spare->spare->category)->name }}</td>
                            <td>{{ optional($store_spare->spare->brand)->name }}</td>
                            <td>{{ $store_spare->spare->measure }}</td>
                            <td width="5%">{{ $store_spare->spare->product_code }}</td>
                            <td>{{ $store_spare->quantity }}</td>
                            @if(auth()->user()->Role->name == 'admin')
                                <td>
                                    <form action="{{route('stores.store.delete.quantity', $store_spare->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" type="submit">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th width="5%">Codigo</th>
                        <th width="30%">Decripcion</th>
                        <th width="7%">Categoria</th>
                        <th>Marca</th>
                        <th>Medida</th>
                        <th width="5%">Codigo respuesto</th>
                        <th>Cantidad</th>
                        @if(auth()->user()->Role->name == 'admin')
                            <th>Opciones</th>
                        @endif
                    </tr>
                    </tfoot>
                </table>

            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="{{asset('js/store/select2.js')}}"></script>
    <script src="{{ asset('js/spare/datatables.min.js') }}"></script>
    <script src="{{ asset('js/spare/datatableconfig.js') }}"></script>
@endsection
