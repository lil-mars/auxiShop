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
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Sales</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('sales.sale.create') }}" class="btn btn-success" title="Create New Sale">
                    <span class="fa fa-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>

        @if(count($sales) == 0)
            <div class="panel-body text-center">
                <h4>No Sales Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Client</th>
                            <th>Store</th>
                            <th>User</th>
                            <th>Total Price</th>
                            <th>Total Amount</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($sales as $sale)
                        <tr>
                            <td>{{ optional($sale->Client)->get_full_name() }}</td>
                            <td>{{ optional($sale->Store)->name }}</td>
                            <td>{{ optional($sale->User)->get_full_name() }}</td>
                            <td>{{ $sale->total_price }}</td>
                            <td>{{ $sale->total_amount }}</td>

                            <td>

                                <form method="POST" action="{!! route('sales.sale.destroy', $sale->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('sales.sale.show', $sale->id ) }}" class="btn btn-info" title="Show Sale">
                                            <span class="fa fa-eye" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('sales.sale.edit', $sale->id ) }}" class="btn btn-primary" title="Edit Sale">
                                            <span class="fa fa-pen" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Sale" onclick="return confirm(&quot;Click Ok to delete Sale.&quot;)">
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
            {!! $sales->render() !!}
        </div>

        @endif

    </div>
@endsection
