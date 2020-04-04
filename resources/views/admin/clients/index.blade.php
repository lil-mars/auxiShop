@extends('layouts.app')

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
                <h4 class="mt-5 mb-5">Clients</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('clients.clients.create') }}" class="btn btn-success" title="Create New Clients">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($clientsObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Clients Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Company Name</th>
                            <th>Father Last Name</th>
                            <th>Mother Last Name</th>
                            <th>Second Name</th>
                            <th>Name</th>
                            <th>Occupation</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Fax</th>
                            <th>Ci</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($clientsObjects as $clients)
                        <tr>
                            <td>{{ $clients->company_name }}</td>
                            <td>{{ $clients->father_last_name }}</td>
                            <td>{{ $clients->mother_last_name }}</td>
                            <td>{{ $clients->second_name }}</td>
                            <td>{{ $clients->name }}</td>
                            <td>{{ $clients->occupation }}</td>
                            <td>{{ $clients->address }}</td>
                            <td>{{ $clients->phone }}</td>
                            <td>{{ $clients->fax }}</td>
                            <td>{{ $clients->ci }}</td>

                            <td>

                                <form method="POST" action="{!! route('clients.clients.destroy', $clients->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('clients.clients.show', $clients->id ) }}" class="btn btn-info" title="Show Clients">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('clients.clients.edit', $clients->id ) }}" class="btn btn-primary" title="Edit Clients">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Clients" onclick="return confirm(&quot;Click Ok to delete Clients.&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
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
            {!! $clientsObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection