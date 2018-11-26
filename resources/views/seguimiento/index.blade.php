@extends('layout')

@section('content')
    <a href="#"><strong><i class="glyphicon glyphicon-blackboard"></i> Seguimiento de actividades</strong></a>
    <hr>
    @foreach($projects as $project)
    <div class="panel panel-default">
        <div class="panel-heading">
            <h5>{{ $project['nombre'] }} </h5>
        </div>
        <div class="panel-body">
            @if ( count($project['tareas']) === 0 )
              <p class="text-danger">No hay tareas registradas</p>
            @endif

            @foreach( $project['tareas'] as $task)
                @if ( $task['progreso'] > 75 )
                    <small>{{ $task['nombre'] }}</small>
                    <div class="progress">
                      <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{ $task['progreso'] }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $task['progreso'] }}%;">
                        {{ $task['progreso'] }}%
                      </div>
                    </div>
                @elseif ( $task['progreso'] > 50)
                    <small>{{ $task['nombre'] }}</small>
                    <div class="progress">
                      <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="{{ $task['progreso'] }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $task['progreso'] }}%;">
                        {{ $task['progreso'] }}%
                      </div>
                    </div>
                @elseif ( $task['progreso'] > 25)
                    <small>{{ $task['nombre'] }}</small>
                    <div class="progress">
                      <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="{{ $task['progreso'] }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $task['progreso'] }}%;">
                        {{ $task['progreso'] }}%
                      </div>
                    </div>
                @else
                    <small>{{ $task['nombre'] }}</small>
                    <div class="progress">
                      <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="{{ $task['progreso'] }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $task['progreso'] }}%;">
                        {{ $task['progreso'] }}%
                      </div>
                    </div>
                @endif
            @endforeach
        </div>
        <!--/panel-body-->
    </div>
    @endforeach

@endsection

@section('css')
<link href="{{ URL::asset('css/jquery.gantt.css') }}" rel="stylesheet">
<style type="text/css">
    /* Bootstrap 3.x re-reset  */
      .fn-gantt *,
      .fn-gantt *:after,
      .fn-gantt *:before {
        -webkit-box-sizing: content-box;
           -moz-box-sizing: content-box;
                box-sizing: content-box;
      }
</style>
@endsection

@section('js')
<script src="{{ URL::asset('js/moment.min.js') }}"></script>
@endsection