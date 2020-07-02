@extends('layouts.master')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($brand->name) ? $brand->name : 'Marca' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('brands.destroy', $brand->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('brands.index') }}" class="btn btn-primary" title="Show All Brand">
                        <span class="fa fa-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('brands.create') }}" class="btn btn-success" title="Create New Brand">
                        <span class="fa fa-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('brands.edit', $brand->id ) }}" class="btn btn-primary" title="Edit Brand">
                        <span class="fa fa-pen-alt" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Brand" onclick="return confirm(&quot;Click Ok to delete Brand.?&quot;)">
                        <span class="fa fa-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Nombre</dt>
            <dd>{{ $brand->name }}</dd>

        </dl>
        <dl class="dl-horizontal">
            <dt>Pais</dt>
            <dd>{{ $brand->country }}</dd>
        </dl>

    </div>
</div>

@endsection
