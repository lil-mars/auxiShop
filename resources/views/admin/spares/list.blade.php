@extends('layouts.master')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/select2.css')}}">
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
    @if(auth()->user()->Role->name == 'admin')
        <a href="{{route('spares.create')}}">
            <button class="btn btn-primary m-2">
                Agregar respuesto
                <span class="fa fa-plus"></span>
            </button>
        </a>
        <a href="{{route('brands.index')}}">
            <button class="btn btn-success m-2">
                Marcas
                <span class="fa fa-list"></span>
            </button>
        </a>
        <a href="{{route('car_lines.index')}}">
            <button class="btn btn-warning m-2">
                Linea de carros
                <span class="fa fa-list"></span>
            </button>
        </a>
        <a href="{{route('categories.index')}}">
            <button class="btn btn-secondary m-2">
                Categoria
                <span class="fa fa-list"></span>
            </button>
        </a>
    @endif
    <div class="card">
        <div class="card-body">
            <List id="spare-list" is-admin="{{ auth()->user()->Role->name == 'admin' }}"></List>

        </div>

    </div>

@endsection
@section('scripts')
    <script src="{{asset('js/vue.js')}}"></script>

@endsection
