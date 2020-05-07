@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Purchase Spare' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('purchase_spares.purchase_spare.destroy', $purchaseSpare->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('purchase_spares.purchase_spare.index') }}" class="btn btn-primary" title="Show All Purchase Spare">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('purchase_spares.purchase_spare.create') }}" class="btn btn-success" title="Create New Purchase Spare">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('purchase_spares.purchase_spare.edit', $purchaseSpare->id ) }}" class="btn btn-primary" title="Edit Purchase Spare">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Purchase Spare" onclick="return confirm(&quot;Click Ok to delete Purchase Spare.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Purchase</dt>
            <dd>{{ optional($purchaseSpare->Purchase)->contact }}</dd>
            <dt>Spare</dt>
            <dd>{{ optional($purchaseSpare->Spare)->code }}</dd>
            <dt>Unit Price</dt>
            <dd>{{ $purchaseSpare->unit_price }}</dd>
            <dt>Price</dt>
            <dd>{{ $purchaseSpare->price }}</dd>
            <dt>Quantity</dt>
            <dd>{{ $purchaseSpare->quantity }}</dd>
            <dt>Created At</dt>
            <dd>{{ $purchaseSpare->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $purchaseSpare->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection