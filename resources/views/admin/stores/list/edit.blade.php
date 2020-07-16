@extends('layouts.master')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/spin/spin.css')}}">
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
            <h4 class="">{{ isset($store->name) ? $store->name : 'Tienda' }}</h4>
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
                Asignar cantidades en la tienda
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <form action="{{route('stores.store.quantity', $store->id)}}" method="post">
                    @csrf
                    <button class="btn btn-success btn-block" type="submit" id="buttonSubmit">
                        <div id="spin">
                            <div class="lds-spinner">
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                            </div>
                            <br>
                            GUARDANDO LOS CAMBIOS
                            <br>
                        </div>
                        <div id="buttonText">
                            <i class="fa fa-save"></i>
                            <br>
                            GUARDAR
                        </div>

                    </button>
                    <br>
                    <br>

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
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($spares as $spare)
                            <tr>
                                <td width="5%">{{ $spare->code }}</td>
                                <td width="30%">{{ $spare->description }}</td>
                                <td width="7%">{{ optional($spare->category)->name }}</td>
                                <td>{{ optional($spare->brand)->name }}</td>
                                <td>{{ $spare->measure }}</td>
                                <td width="5%">{{ $spare->product_code }}</td>
                                <td>
                                    <input type="text" name="spares[]" value="{{$spare->id}}" hidden>
                                    @if(isset($spare->get_data_by_store($store->id)->quantity))
                                        <input type="text" class="form-control" name="quantities[]"
                                               value="{{$spare->get_data_by_store($store->id)->quantity}}">
                                    @else
                                        <input type="text" class="form-control" name="quantities[]" value="0">
                                    @endif
                                </td>
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

                        </tr>
                        </tfoot>

                    </table>
                </form>

            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="{{asset('js/store/showSpin.js')}}"></script>
@endsection
