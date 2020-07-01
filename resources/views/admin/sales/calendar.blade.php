@extends('layouts.master')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/full-calendar/main.min.css')}}">
@endsection
@section('content')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var srcCalendarEl = document.getElementById('source-calendar');
            var srcCalendar = new FullCalendar.Calendar(srcCalendarEl, {
                locale: 'es',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                },
                navLinks: true, // can click day/week names to navigate views
                nowIndicator: true,
                editable: false,
                initialDate: '{{now()}}',
                events: [
                        @foreach($sales as $sale)
                    {
                        title: '{{$sale->user->get_full_name()}}',
                        start: '{{$sale->created_at}}',
                        url: '{{route('sales.sale.show', $sale->id)}}'
                    },
                    @endforeach
                ],
            });
            srcCalendar.render();
        });
    </script>
    </head>
    <body>

    <div class="card col-12">
        <div class="card-body">
            <div id='source-calendar'></div>
        </div>
    </div>
    </body>
@endsection
@section('scripts')
    <script src="{{asset('js/full-calendar/main.min.js')}}"></script>
    <script src="{{asset('js/full-calendar/es.js')}}"></script>

@endsection
