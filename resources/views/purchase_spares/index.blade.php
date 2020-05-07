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
                <h4 class="mt-5 mb-5">Purchase Spares</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('purchases.spare.create' ,'9') }}" class="btn btn-success" title="Create New Purchase Spare">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>

        @if(count($purchaseSpares) == 0)
            <div class="panel-body text-center">
                <h4>No Purchase Spares Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Purchase</th>
                            <th>Spare</th>
                            <th>Unit Price</th>
                            <th>Price</th>
                            <th>Quantity</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($purchaseSpares as $purchaseSpare)
                        <tr>
                            <td>{{ optional($purchaseSpare->Purchase)->contact }}</td>
                            <td>{{ optional($purchaseSpare->Spare)->code }}</td>
                            <td>{{ $purchaseSpare->unit_price }}</td>
                            <td>{{ $purchaseSpare->price }}</td>
                            <td>{{ $purchaseSpare->quantity }}</td>

                            <td>

                                <form method="POST" action="{!! route('purchases.spare.destroy', [$purchaseSpare->id, 9]) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('purchases.spare.show', [$purchaseSpare->id, 9] ) }}" class="btn btn-info" title="Show Purchase Spare">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('purchases.spare.edit', [$purchaseSpare->id, 9] ) }}" class="btn btn-primary" title="Edit Purchase Spare">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Purchase Spare" onclick="return confirm(&quot;Click Ok to delete Purchase Spare.&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
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
        </div>

        @endif

    </div>
@endsection
