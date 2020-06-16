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
                <h4 class="mt-5 mb-5">Compras</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('purchases.purchase.create') }}" class="btn btn-success" title="Create New Purchase">
                    <span class="fa fa-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>

        @if(count($purchases) == 0)
            <div class="panel-body text-center">
                <h4>No hay compras disponibles.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Proveedor</th>
                            <th>Contacto</th>
                            <th>Precio total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($purchases as $purchase)
                        <tr>
                            <td>{{ $purchase->id}}</td>
                            <td>{{ optional($purchase->Provider)->get_full_name() }}</td>
                            <td>{{ $purchase->contact }}</td>
                            <td>{{ $purchase->total_price }} BS</td>
                            <td>
                                <form method="POST" action="{!! route('purchases.purchase.destroy', $purchase->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">

                                        <a href="{{ route('purchases.purchase.show', $purchase->id ) }}" class="btn btn-secondary" title="Show Purchase">
                                            <span class="fa fa-shopping-basket" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('purchases.purchase.edit', $purchase->id ) }}" class="btn btn-primary" title="Edit Purchase">
                                            <span class="fa fa-pen" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Purchase" onclick="return confirm(&quot;Click Ok to delete Purchase.&quot;)">
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

        <div class="panel-footer">
            {!! $purchases->render() !!}
        </div>

        @endif

    </div>
@endsection
