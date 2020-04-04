@extends('layouts.master')

@section('content')

    <div class="panel panel-default">
        <div class="row">
            <div class="col-12">
                <div class="panel-heading">

                    <div class="pull-left">
                        <h4 class="">{{ !empty($title) ? $title : 'Editar repuesto' }}</h4>
                    </div>
                    <div class="btn-group btn-group-sm pull-right" role="group">

                        <a href="{{ route('spares.index') }}" class="btn btn-primary">
                            Volver atras
                            <span class="fas fa-backspace"></span>
                        </a>
                    </div>
                </div>

                <div class="panel-body">

                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <form method="POST" action="{{ route('spares.update', $spare->id) }}" id="edit_spare_form" name="edit_spare_form" accept-charset="UTF-8" class="form-horizontal">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="PUT">
                        @include ('admin.spares.form', [
                                                    'spare' => $spare,
                                                  ])

                        <div class="form-group">
                            <div class="">
                                <input class="btn btn-primary" type="submit" value="Actualizar">
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>

    </div>

@endsection
