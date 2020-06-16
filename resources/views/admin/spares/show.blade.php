@extends('layouts.master')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Spare' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('spares.destroy', $spare->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('spares.index') }}" class="btn btn-primary" title="Show All Spare">
                        <span class="fa fa-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('spares.create') }}" class="btn btn-success" title="Create New Spare">
                        <span class="fa fa-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('spares.edit', $spare->id ) }}" class="btn btn-primary" title="Edit Spare">
                        <span class="fa fa-pen" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Spare" onclick="return confirm(&quot;Click Ok to delete Spare.?&quot;)">
                        <span class="fa fa-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Codigo</dt>
            <dd>{{ $spare->code }}</dd>
            <dt>Categoria</dt>
            <dd>{{ optional($spare->Category)->name }}</dd>
            <dt>Linea de carro</dt>
            <dd>{{ optional($spare->CarLine)->name }}</dd>
            <dt>Marca</dt>
            <dd>{{ optional($spare->Brand)->name }}</dd>
            <dt>Descripcion</dt>
            <dd>{{ $spare->description }}</dd>
            <dt>Nacionalidad</dt>
            <dd>{{ $spare->nationality }}</dd>
            <dt>Medidas</dt>
            <dd>{{ $spare->measure }}</dd>
            <dt>Codigo producto</dt>
            <dd>{{ $spare->product_code }}</dd>
            <dt>Codigo original</dt>
            <dd>{{ $spare->original_code }}</dd>
            <dt>Cantidad</dt>
            <dd>{{ $spare->quantity }}</dd>
            <dt>Precio</dt>
            <dd>{{ $spare->price }}</dd>
            <dt>Precio M</dt>
            <dd>{{ $spare->price_m }}</dd>
            <dt>Precio compra</dt>
            <dd>{{ $spare->investment }}</dd>
            <dt>Imagen</dt>
            <dd>{{ $spare->image }}</dd>
            <dt>Creacion</dt>
            <dd>{{ $spare->created_at }}</dd>
            <dt>Actualizacion</dt>
            <dd>{{ $spare->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection
