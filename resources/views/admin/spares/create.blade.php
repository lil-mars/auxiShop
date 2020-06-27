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
                    <a href="{{ route('spares.index') }}" class="btn btn-primary">
                        Volver atras
                        <span class="fas fa-backspace"></span>
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
                        <form method=POST" action="{{ route('spares.store') }}" accept-charset="UTF-8"
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

@endsection
@section('scripts')
    <script src="{{asset('js/spare/carline.js')}}">
    </script>
    <script src="{{asset('js/spare/showImage.js')}}">
    </script>
@endsection



