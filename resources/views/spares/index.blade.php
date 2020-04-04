@extends('layouts.app')

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
                <h4 class="mt-5 mb-5">Spares</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('spares.spare.create') }}" class="btn btn-success" title="Create New Spare">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($spares) == 0)
            <div class="panel-body text-center">
                <h4>No Spares Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Category</th>
                            <th>Car Line</th>
                            <th>Brand</th>
                            <th>Nationality</th>
                            <th>Measure</th>
                            <th>Product Code</th>
                            <th>Original Code</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Price M</th>
                            <th>Investment</th>
                            <th>Image</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($spares as $spare)
                        <tr>
                            <td>{{ $spare->code }}</td>
                            <td>{{ optional($spare->Category)->name }}</td>
                            <td>{{ optional($spare->CarLine)->name }}</td>
                            <td>{{ optional($spare->Brand)->name }}</td>
                            <td>{{ $spare->nationality }}</td>
                            <td>{{ $spare->measure }}</td>
                            <td>{{ $spare->product_code }}</td>
                            <td>{{ $spare->original_code }}</td>
                            <td>{{ $spare->quantity }}</td>
                            <td>{{ $spare->price }}</td>
                            <td>{{ $spare->price_m }}</td>
                            <td>{{ $spare->investment }}</td>
                            <td>{{ $spare->image }}</td>

                            <td>

                                <form method="POST" action="{!! route('spares.spare.destroy', $spare->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('spares.spare.show', $spare->id ) }}" class="btn btn-info" title="Show Spare">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('spares.spare.edit', $spare->id ) }}" class="btn btn-primary" title="Edit Spare">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Spare" onclick="return confirm(&quot;Click Ok to delete Spare.&quot;)">
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
            {!! $spares->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection