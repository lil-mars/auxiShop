@extends('layouts.master')

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

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="ml-3 mb-3">Lineas de carro</h4>
            </div>
            <a  class="btn btn-info ml-3" href="{{route('spares.index')}}" >
                Volver atras <span class="fa fa-backspace" aria-hidden="true"></span>
            </a>
            <div class="btn-group" role="group">
                <a href="{{ route('car_lines.create') }}" class="btn btn-success" title="Create New Car Line">
                    Agregar linea de carro<span class="fa fa-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>

        @if(count($carLines) == 0)
            <div class="panel-body text-center">
                <h4>No hay registros!</h4>
            </div>
        @else
        <div class="card-body col-12">
            <div class="table-responsive">

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($carLines as $carLine)
                        <tr>
                            <td>{{ $carLine->name }}</td>

                            <td>

                                <form method="POST" action="{!! route('car_lines.destroy', $carLine->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('car_lines.show', $carLine->id ) }}" class="btn btn-info" title="Show Car Line">
                                            <span class="fa fa-eye" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('car_lines.edit', $carLine->id ) }}" class="btn btn-primary" title="Edit Car Line">
                                            <span class="fa fa-pen" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Car Line" onclick="return confirm(&quot;Click Ok to delete Car Line.&quot;)">
                                            <span class="fa fa-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $carLines->render() !!}
        </div>

        @endif

    </div>
@endsection
