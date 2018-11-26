@extends('layout')

@section('content')
<!-- column 2 -->
    <ul class="list-inline pull-right">
        <li><a title="Nuevo usuario" data-toggle="modal" href="#addUser" class="btn btn-info"><i class="glyphicon glyphicon-plus"></i></a>
        </li>
    </ul>

    <a href="#"><strong><i class="glyphicon glyphicon-list-alt"></i> Usuarios</strong></a><br>

    <hr>

	<div class="table-responsive">
	    <table class="table table-striped">
	        <tr>
	            <th>Usuaro</th>
	            <th>Tarea</th>
	            <th>Inicio</th>
	            <th>Fin</th>
	            <th width="15%">Fin</th>

	        </tr>
	        <tr>
	            <td>45</td>
	            <td>2.45%</td>
	            <td>Direct</td>
	            <td>Direct</td>
	            <th>
					<div class="btn-group btn-group-justified">
                  <a href="#" class="btn btn-info">
                    <i class="glyphicon glyphicon-pencil"></i>
                  </a>
                  <a href="#" class="btn btn-info">
                    <i class="glyphicon glyphicon-trash"></i>
                  </a>
                </div>
	            </th>
	        </tr>
	        <tr>
	            <td>289</td>
	            <td>56.2%</td>
	            <td>Referral</td>
	            <td>Direct</td>
	            <th>Fin</th>
	        </tr>
	    </table>
    </div>
    @include('modal.user')
@endsection