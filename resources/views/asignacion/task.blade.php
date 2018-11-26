@extends('layout')

@section('content')
    <ul class="list-inline pull-right">
        <li><a title="Nueva tarea" data-toggle="modal" href="/asignacion/create/{{ $project }}" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-plus"></i></a>
        </li>
    </ul>
    <a href="#"><strong><i class="glyphicon glyphicon-dashboard"></i> Asignaciones</strong></a>
    <hr>

<div class="panel">
    <ul class="nav nav-tabs" id="myTab">
        <li class="active"><a href="#task" data-toggle="tab">Tareas</a></li>
        <li><a href="#gui-gantt" data-toggle="tab">Grafica Gantt</a></li>
        <li><a href="#olds" data-toggle="tab">Tareas pasados</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active well" id="task">
            <div class="table-responsive">
                <br>
                <table class="table table-striped">
                        <tr>
                            <th>#</th>
                            <th>Descripcion</th>
                            <th>Inicio</th>
                            <th>Finaliza</th>
                            <th align="center">Progreso</th>
                            <th> Asignado </th>
                            <th></th>
                        </tr>
                    @if ( count($tasks) === 0 )
                    <tr>
                        <td colspan="7"> No hay tareas asignadas</td>
                    </tr>
                    @endif
                    @foreach ($tasks as $task)
                            <tr>
                                <td>{{ $task->posicion}}</td>
                                <td>{{ $task->nombre }}</td>
                                <td>
                                    <div class="show-date">{{ $task->fecha_inicio }}</div>
                                </td>
                                <td>
                                    <div class="show-date">{{ $task->fecha_fin }}</div>
                                </td>
                                <td>
                                    <div>{{ $task->progreso }} (%)</div>
                                </td>
                                <td>
                                    <div>{{ $task->usuario }}</div>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="/asignacion/update/{{ $project }}/{{ $task->id }}" class="btn btn-default btn-sm">
                                            <i class="glyphicon glyphicon-pencil"></i>
                                        </a>
                                        <a href="/asignacion/delete/{{ $project }}/{{ $task->id }}" class="btn btn-default btn-sm">
                                            <i class="glyphicon glyphicon-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="tab-pane well" id="gui-gantt">
            <br>
            <div id="jqChart" style="width: 600px; height: 500px;"></div>
        </div>
        <div class="tab-pane well" id="olds">
            <br>
            <ul class="list-group">
                @foreach($olds as $old)
                    <li class="list-group-item"> <a href="#">( {{ $old->days }} dias) </a> {{ $old->desc }} <span class="label label-info"> {{ $old->user }} </span></li>
                @endforeach
            </ul>
        </div>
    </div>

</div>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/jquery.jqChart.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/jquery.jqRangeSlider.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('themes/smoothness/jquery-ui-1.10.4.css') }}" />
@endsection

@section('js')
    <script src="{{ URL::asset('js/moment.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.mousewheel.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('js/jquery.jqChart.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('js/jquery.jqRangeSlider.min.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    $(function () {
        $('.show-date').each(function(i, e) {
            var time = $(e).text();
            $(e).html(moment(time, "YYYY-MM-DD").format('DD/MM/YYYY'));
        });
        $.getJSON("http://localhost:8000/gantt/{{ $project }}",function(msg){
                var taskList = [];
                $.each(msg,function(index,item){
                    taskList.push([
                            item.tarea,
                            new Date(item.inicio),
                            new Date(item.fin),
                        ]);
                });
                $('#jqChart').jqChart({
                    title: { text: 'Gantt Grafica' },
                    animation: { duration: 1 },
                    shadows: {
                        enabled: true
                    },
                    legend: {
                        visible: false
                    },
                    series: [
                        {
                            type: 'gantt',
                            fillStyles: ['#CA6B4B', '#005CDB', '#F3D288', '#506381', '#F1B9A8'],
                            data: taskList,
                        }
                    ]
                });
        });
    });
</script>
@endsection