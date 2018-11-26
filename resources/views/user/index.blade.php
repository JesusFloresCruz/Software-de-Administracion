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
                <th>Nombre completo</th>
                <th>Tipo</th>
                <th>Rol</th>
                <th></th>
            </tr>
            @foreach ($users as $detail)
            <tr>
                <td class="table-text">
                    <div>{{ $detail->nombre }}, {{ $detail->apellidos }}</div>
                </td>
                <td class="table-text">
                    <div>{{ $detail->tipo }}</div>
                </td>
                <td class="table-text">
                    <div>{{ $detail->rol }}</div>
                </td>
                <td class="table-text">
                        <div class="btn-group" role="group">
                            <a href="/usuario/delete/{{ $detail->id }}" class="btn btn-default btn-sm">
                                <i class="glyphicon glyphicon-trash"></i>
                            </a>
                        </div>
                    </td>
            </tr>
            @endforeach
        </table>
    </div>
    @include('user.create')
@endsection
