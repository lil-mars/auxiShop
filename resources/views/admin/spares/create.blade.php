@extends('layouts.master')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/select2.css')}}">
@endsection
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="panel-heading">
                    <div class="">
                        <h3 class="">Nuevo repuesto</h3>
                    </div>
                    <a href="{{ route('spares.index') }}" class="btn btn-secondary">
                        Volver atras
                        <span class="fas fa-backspace"></span>
                    </a>

                    <button href="{{ route('spares.index') }}" class="btn btn-success" data-toggle="modal"
                            data-target="#brandsForm">
                        Nueva marca
                        <span class="fas fa-plus"></span>
                    </button>
                    <button href="{{ route('spares.index') }}" class="btn btn-warning" data-toggle="modal"
                            data-target="#carlineForm">
                        Nueva linea carro
                        <span class="fas fa-plus"></span>
                    </button>
                    <a href="{{ route('spares.index') }}" class="btn btn-info" data-toggle="modal"
                       data-target="#categoriesForm">
                        Nueva categoria
                        <span class="fas fa-plus"></span>
                    </a>
                </div>

                <br><br>
                <div class="row">
                    <div class="col-12 ">
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <form method="POST" action="{{ route('spares.store') }}" accept-charset="UTF-8"
                              id="create_spare_form" name="create_spare_form" class="form-horizontal">

                            {{ csrf_field() }}
                            @include ('admin.spares.form', ['spare' => null, 'errors' => $errors])

                            <div class="form-group">
                                <div class="col-md-offset-2 col-md-10">
                                    <input class="btn btn-primary" type="submit" value="Registrar">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" id="categoriesForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nueva categoria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{route('categoryStoreAndBack')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="col-form-label">Nombre:</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div>
                            <h6 class="text-bold">Todas las categorias</h6>
                            <ul class="list-group">
                                @foreach($Categories as $category)
                                    <li class="list-group-item">{{$category}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="carlineForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nueva linea de carro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{route('carlineStoreAndBack')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="col-form-label">Nombre:</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div>
                            <h6 class="text-bold">Todas Lineas de carro</h6>
                            <ul class="list-group">
                                @foreach($CarLines as $carline)
                                    <li class="list-group-item">{{$carline}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="brandsForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nueva marca</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{route('brandStoreAndBack')}}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="col-form-label">Nombre:</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div>
                            <h6 class="text-bold">Todas las marcas</h6>
                            <ul class="list-group">
                                @foreach($Brands as $brand)
                                    <div class="row">
                                        <div class="col-6">
                                            <li class="list-group-item">
                                                <b>Nombre:</b>
                                                {{$brand->name}}
                                            </li>
                                        </div>
                                        <div class="col-6">
                                            <li class="list-group-item">
                                                <b>Pais:</b>
                                                {{$brand->country}}
                                            </li>
                                        </div>
                                    </div>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('js/spare/carline.js')}}">
    </script>
    <script src="{{asset('js/spare/showImage.js')}}">
    </script>
@endsection



