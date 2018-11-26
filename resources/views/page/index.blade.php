@extends('layout')

@section('content')
	<a href="#"><strong><i class="glyphicon glyphicon-dashboard"></i> panel Principal</strong></a>
    <hr>
    
	<div class="panel panel-default">
    <div class="panel-heading">
        <h4>Reporte de progreso</h4></div>
    <div class="panel-body">

        <i class="glyphicon glyphicon-user"></i> <small>Usuario Uno</small>
        <div class="progress">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                <span class="sr-only">50% Completado</span>
            </div>
        </div>
        <i class="glyphicon glyphicon-user"></i> <small>Usuario Dos</small>
        <div class="progress">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%">
                <span class="sr-only">30% Completado</span>
            </div>
        </div>
        <i class="glyphicon glyphicon-user"></i> <small>Usuario Tres</small>
        <div class="progress">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%">
                <span class="sr-only">72% Completado</span>
            </div>
        </div>
    </div>
    <!--/panel-body-->
</div>
<!--/panel-->
    
@endsection

