@extends('layouts.master')

@section('content')

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">{{ !empty($user->name) ? $user->get_full_name() : 'Usuario' }}</h4>
            </div>
            <div class="btn-group btn-group-sm pull-right" role="group">

                <a href="{{ route('users.user.index') }}" class="btn btn-primary" title="Show All User">
                    <span class="fa fa-list" aria-hidden="true"></span>
                </a>

                <a href="{{ route('users.user.create') }}" class="btn btn-success" title="Create New User">
                    <span class="fa fa-plus" aria-hidden="true"></span>
                </a>

            </div>
        </div>

        <div class="panel-body">
            <br><br>
            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('users.user.updatePassword', $user->id) }}" id="edit_user_form"
                  name="edit_user_form" accept-charset="UTF-8" class="form-horizontal">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PUT">
                <label for="password" class="col-md-2 control-label">Nueva contraseña</label>
                <div class="col-md-10">
                    <input type="password" class="form-control" name="password" type="text" id="password" value="" minlength="1" maxlength="255" required="true" >
                    {!! $errors->first('password', '<p class="invalid-feedback">:message</p>') !!}
                    <input type="checkbox" onclick="showPassword()">Mostrar contrasena
                    <br><br>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Actualizar">
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection

@section('scripts')
    <script>
        function showPassword() {
            let password = $('#password').get(0);
            if (password.type === 'password') {
                password.type = 'text';
            } else {
                password.type = 'password ';
            }
        }
    </script>
@endsection
