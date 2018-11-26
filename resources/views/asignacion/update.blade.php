@extends('layout')

@section('content')
                 <form class="form" action="/asignacion/update" method="post">
                 {{ csrf_field() }}
                    <div class="control-group">
                        <label>Descripcion de tarea</label>
                        <div class="controls">
                            <textarea class="form-control" name="nombre">
                                {{ $tarea->nombre}}
                            </textarea>
                        </div>
                    </div>
                    <hr>
                    <div class="control-group">
                        <div class="row">
                          <div class="col-xs-5">
                            <label>Fecha de inicio</label>
                            <input type="text" class="form-control date" id="begin" name="fecha_inicio">
                          </div>
                          <div class="col-xs-5">
                            <label>Fecha de finalizacion</label>
                            <input type="text" class="form-control date" id="end" name="fecha_fin">
                          </div>
                          <div class="col-xs-2">
                            <label>Posicion</label>
                            <input type="numeric" class="form-control" placeholder="Posicion" name="posicion" value="{{ $tarea->posicion}}">
                          </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="control-group">
                        <label>Usuario encargado de tarea</label>
                        <div class="controls">
                            <select name="usuario" class="form-control">
                                @foreach( $usuarios as $usuario)
                                    @if( $usuario->id == $tarea->id_usuario )
                                        <option selected="selected" value="{{ $usuario->id }}">{{$usuario->nombre}}, {{ $usuario->apellidos }}</option>
                                    @else
                                        <option  value="{{ $usuario->id }}">{{$usuario->nombre}}, {{ $usuario->apellidos }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br><br>
                    <div class="control-group">
                        <div class="row">
                            <div class="col-xs-3">
                                <label>Progreso (%)</label>
                            </div>
                            <div class="col-xs-7">
                                <input id="progreso" data-slider-id='progreso' type="text" name="progreso"/>
                            </div>
                            <div class="col-xs-2">
                                <input type="numeric" class="form-control" value="{{ $tarea->posicion }}" id="slider-info" class="slider-bg" disabled="disabled">
                            </div>
                        </div>
                    </div><br>
                    <div class="control-group">
                        <input type="hidden" name="tarea" value="{{ $tarea->id}}">
                        <label></label>
                        <div class="controls">
                            <button type="submit" class="btn btn-primary">
                                Actualizar proyecto
                            </button>
                        </div>
                    </div>
@endsection

@section('css')
    <link href="{{ URL::asset('css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/bootstrap-slider.min.css') }}" rel="stylesheet">
    <style>
        .slider.slider-horizontal{
            width: 100% !important;
        }

        .slider-bg .slider, .slider-bg .slider-bar{
            height:30px;
        }
    </style>
@endsection

@section('js')
<script src="{{ URL::asset('js/moment.min.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap-slider.min.js') }}"></script>
<script type="text/javascript">
    $(function () {
        $('#begin').datetimepicker({
            defaultDate: moment('{{ $tarea->fecha_inicio }}'),
            minDate: moment('{{ $proyecto->fecha_inicio }}'),
            maxDate: moment('{{ $proyecto->fecha_fin }}'),
            useCurrent: false,
            locale: 'es',
            format: 'DD/MM/YYYY',
        });
        $('#end').datetimepicker({
            defaultDate: moment('{{ $tarea->fecha_fin }}'),
            minDate: moment('{{ $proyecto->fecha_inicio }}'),
            maxDate: moment('{{ $proyecto->fecha_fin }}'),
            useCurrent: false,
            locale: 'es',
            format: 'DD/MM/YYYY',
        });

        $("#begin").on("dp.change", function (e) {
            $('#end').data("DateTimePicker").minDate(moment('{{ $proyecto->fecha_inicio }}'));
        });
        $("#end").on("dp.change", function (e) {
            $('#begin').data("DateTimePicker").maxDate(moment('{{ $proyecto->fecha_fin }}'));
        });

        $('.show-date').each(function(i, e) {
            var time = $(e).text();
            $(e).html(moment(time, "YYYY-MM-DD").format('DD/MM/YYYY'));
        });
        // With JQuery
        $('#progreso').slider({
            formatter: function(value) {
                $('#slider-info').val(value);
                return value;
            },
            min: 0,
            max: 100,
            step:1,
            value: {{ $tarea->progreso }}
        });
    });
</script>
@endsection