@extends('layouts.master')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($user->name) ? $user->get_full_name(): 'User' }}</h4>
        </span>

            <div class="pull-right">

                <form method="POST" action="{!! route('users.user.destroy', $user->id) !!}" accept-charset="UTF-8">
                    <input name="_method" value="DELETE" type="hidden">
                    {{ csrf_field() }}
                    <div class="btn-group btn-group-sm" role="group">
                        <a href="{{ route('users.user.index') }}" class="btn btn-primary" title="Show All User">
                            <span class="fa fa-list" aria-hidden="true"></span>
                        </a>

                        <a href="{{ route('users.user.create') }}" class="btn btn-success" title="Create New User">
                            <span class="fa fa-plus" aria-hidden="true"></span>
                        </a>

                        <a href="{{ route('users.user.edit', $user->id ) }}" class="btn btn-primary" title="Edit User">
                            <span class="fa fa-pen" aria-hidden="true"></span>
                        </a>

                        <button type="submit" class="btn btn-danger" title="Delete User"
                                onclick="return confirm(&quot;Click Ok to delete User.?&quot;)">
                            <span class="fa fa-trash" aria-hidden="true"></span>
                        </button>
                    </div>
                </form>

            </div>

        </div>
        <br>
        <form action="{{route('users.user.set.stores', $user->id)}}" method="post">
        @csrf
        <table class="table table-bordered">
            <thead class="bg-dark">
            <tr>
                <th>Nombre</th>
                <th>Asignar</th>
            </tr>
            </thead>
            <tbody>
            @foreach($stores as $store)
                <tr>
                    <td width="90%">{{$store->name}}</td>
                    <td>
                        <input type="checkbox" name="stores[]" class="form-control" value="{{$store->id}}"
                            {{ $user->hasStore($store->id) ? 'checked' : '' }}
                        >

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <input type="submit" class="btn btn-primary" value="Aceptar">
        </form>

    </div>

@endsection
