@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Spare' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('spares.spare.destroy', $spare->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('spares.spare.index') }}" class="btn btn-primary" title="Show All Spare">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('spares.spare.create') }}" class="btn btn-success" title="Create New Spare">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('spares.spare.edit', $spare->id ) }}" class="btn btn-primary" title="Edit Spare">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Spare" onclick="return confirm(&quot;Click Ok to delete Spare.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Code</dt>
            <dd>{{ $spare->code }}</dd>
            <dt>Category</dt>
            <dd>{{ optional($spare->Category)->name }}</dd>
            <dt>Car Line</dt>
            <dd>{{ optional($spare->CarLine)->name }}</dd>
            <dt>Brand</dt>
            <dd>{{ optional($spare->Brand)->name }}</dd>
            <dt>Description</dt>
            <dd>{{ $spare->description }}</dd>
            <dt>Nationality</dt>
            <dd>{{ $spare->nationality }}</dd>
            <dt>Measure</dt>
            <dd>{{ $spare->measure }}</dd>
            <dt>Product Code</dt>
            <dd>{{ $spare->product_code }}</dd>
            <dt>Original Code</dt>
            <dd>{{ $spare->original_code }}</dd>
            <dt>Quantity</dt>
            <dd>{{ $spare->quantity }}</dd>
            <dt>Price</dt>
            <dd>{{ $spare->price }}</dd>
            <dt>Price M</dt>
            <dd>{{ $spare->price_m }}</dd>
            <dt>Investment</dt>
            <dd>{{ $spare->investment }}</dd>
            <dt>Image</dt>
            <dd>{{ $spare->image }}</dd>
            <dt>Created At</dt>
            <dd>{{ $spare->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $spare->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection