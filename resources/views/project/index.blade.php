@extends('layout')

@section('content')
<!-- column 2 -->
    <ul class="list-inline pull-right">
        <li><a title="Nuevo proyecto" data-toggle="modal" href="#addProject" class="btn btn-info"><i class="glyphicon glyphicon-plus"></i></a>
        </li>
    </ul>

    <a href="#"><strong><i class="glyphicon glyphicon-list-alt"></i> Proyectos</strong></a><br>
    <hr>

    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th>Nombre proyecto</th>
                <th>Inicia</th>
                <th>Finaliza</th>
                <th></th>
            </tr>
            @foreach ($project as $detail)
            <tr>
                <td class="table-text">
                    <div>{{ $detail->nombre }}</div>
                </td>
                <td class="table-text">
                    <div class="show-date">{{ $detail->fecha_inicio }}</div>
                </td>
                <td class="table-text">
                    <div class="show-date">{{ $detail->fecha_fin }}</div>
                </td>
             <td class="table-text">
                        <div class="btn-group" role="group">
                            <a href="/asignacion/create/{{ $detail->id }}" class="btn btn-default btn-sm" title="Nueva tarea">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </a>
                            <a href="/proyecto/delete/{{ $detail->id }}" class="btn btn-default btn-sm" title="Borrar proyecto">
                                <i class="glyphicon glyphicon-trash"></i>
                            </a>
                        </div>
                    </td>
            </tr>
            @endforeach
        </table>
    </div>
    @include('project.create')
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