@extends('layouts.master')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/datatables.min.css')}}">
@endsection
@section('page-title')
    Lista de respuestos
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
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Filtros de busqueda:</h5>
                        <form action="{{route('filter-products')}}" method="get">
                            <div class="row">
                                <div class="form-group col-lg-4 col-6">
                                    <input value="{{ old('code') }}" type="text" name="code"
                                           class="form-control" placeholder="Codigo">
                                </div>
                                <div class="form-group col-lg-4 col-6">
                                    <input value="{{ old('description') }}"type="text" name="description"
                                           class="form-control" placeholder="Description">
                                </div>
                                <div class="form-group col-lg-4 col-6">
                                    <input value="{{ old('category') }}"type="text" name="category"
                                           class="form-control" placeholder="Categoria">
                                </div>
                                <div class="form-group col-lg-4 col-6">
                                    <input value="" type="text" name="brand"
                                           class="form-control" placeholder="Marca">
                                </div>
                                <div class="form-group col-lg-4 col-6">
                                    <input value="{{ old('originalCode') }}"type="text" name="original_code"
                                           class="form-control" placeholder="Codigo original">
                                </div>
                                <div class="form-group col-lg-4 col-6">
                                    <input value="{{ old('measure') }}"type="text" name="measure"
                                           class="form-control" placeholder="Medida">
                                </div>

                            </div>
                            <input  type="submit" class="btn btn-outline-primary" value="Filtrar">
                        </form>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body col-12">
                        <table  id="table" class="table table-bordered table-responsive-md">
                            <thead class="bg-secondary">
                                <tr>
                                    <th>Codigo</th>
                                    <th>Categoria</th>
                                    <th>Marca</th>
                                    <th>Nacion</th>
                                    <th>Medida</th>
                                    <th>Codigo respuesto</th>
                                    <th>Venta</th>
                                    <th>Compra</th>
                                    <th>Cod. Original</th>
                                    <th >Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($spares as $spare)
                                    <tr>
                                        <td>{{ $spare->id }}</td>
                                        <td>{{ optional($spare->category)->name }}</td>
                                        <td>{{ optional($spare->brand)->name }}</td>
                                        <td>{{ $spare->nationality }}</td>
                                        <td>{{ $spare->measure }}</td>
                                        <td>{{ $spare->product_code }}</td>
                                        <td>{{ $spare->price }}</td>
                                        <td>{{ $spare->investment }}</td>
                                        <td>
                                            <a class="text-primary show-image"
                                               style="cursor: pointer"
                                               data-productImg="{{$spare->image}}"
                                               data-productDesc="{{$spare->description}}"
                                               data-productCode="{{$spare->code}}"
                                            >
                                                {{ $spare->original_code }}
                                            </a>
                                        </td>
                                        <td>
                                            <div class="btn-group">

                                                    <a href="{{ route('spares.show',$spare->id)}}" class="btn btn-warning">
                                                        <i class='fas fa-eye'></i>
                                                    </a>

                                                    <a href="{{ route('spares.edit', $spare->id)}}"
                                                       class="btn btn-primary">
                                                        <i class='fas fa-pencil-alt'></i>
                                                    </a>
                                                <a href="#">
                                                    <form action="{{ route('spares.destroy', $spare->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"
                                                                data-toggle="modal" data-target="#deleteModal" >
                                                            <i class='fas fa-trash-alt'></i>
                                                        </button>
                                                    </form>
                                                </a>
                                            </div>

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Codigo</th>
                                <th>Categoria</th>
                                <th>Marca</th>
                                <th>Nacion</th>
                                <th>Medida</th>
                                <th>Codigo respuesto</th>
                                <th>Venta</th>
                                <th>Compra</th>
                                <th>Cod. Original</th>
                                <th >Opciones</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        {{--        Modal to show the image--}}
        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <strong><h3 class="modal-title" id="modalLabel"> </h3></strong>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p id="modalBody">

                        </p>
                        <img src="" alt="No image" class="img-fluid" id="product-image">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        {{--        Modal to show the image--}}

    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/spare/datatables.min.js') }}">    </script>
    <script src="{{ asset('js/spare/datatableconfig.js') }}">    </script>
    <script src="{{ asset('js/spare/modalconfig.js') }}">    </script>
@endsection

