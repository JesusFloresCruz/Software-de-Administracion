@extends('layout')

@section('content')

    <a href="#"><strong><i class="glyphicon glyphicon-dashboard"></i> Asignaciones de tareas</strong></a>
    <hr>
    <div class="table-responsive">
        <table class="table table-striped">
                <tr>
                    <th>Proyecto</th>
                    <th>Dias de trabajo</th>
                    <th>Total tareas</th>
                </tr>
            @foreach ($projects as $project)
                    <tr>
                        <td><a href="/asignacion/{{ $project->id }}">{{ $project->nombre }}</a></td>
                        <td> {{ $project->days }} </td>
                        <td> {{ $project->tasks }} </td>
                    </tr>
            @endforeach
        </table>
    </div>
@endsection

@section('css')
    <link href="{{ URL::asset('css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
@endsection

@section('js')
<script src="{{ URL::asset('js/moment.min.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap-datetimepicker.min.js') }}"></script>
<script type="text/javascript">
    $(function () {
        $('#begin').datetimepicker({
            useCurrent: true,
            locale: 'es',
            format: 'DD/MM/YYYY',
        });
        $('#end').datetimepicker({
            useCurrent: false,
            locale: 'es',
            format: 'DD/MM/YYYY',
        });

        $("#begin").on("dp.change", function (e) {
            $('#end').data("DateTimePicker").minDate(e.date);
        });
        $("#end").on("dp.change", function (e) {
            $('#begin').data("DateTimePicker").maxDate(e.date);
        });

        $('.show-date').each(function(i, e) {
            var time = $(e).text();
            $(e).html(moment(time, "YYYY-MM-DD").format('DD/MM/YYYY'));
        });
    });
</script>
@endsection