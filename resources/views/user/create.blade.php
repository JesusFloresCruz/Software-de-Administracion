<div class="modal" id="addUser">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Nuevo usuario</h4>
            </div>
            <div class="modal-body">
                 <form class="form" action="/usuario" method="post">
                 {{ csrf_field() }}
                    <div class="control-group">
                        <label>Datos personales</label>
                        <div class="row">
                          <div class="col-xs-5">
                            <input type="text" class="form-control" placeholder="Nombres" name="nombre">
                          </div>
                          <div class="col-xs-5">
                            <input type="text" class="form-control" placeholder="Apellidos" name="apellido">
                          </div>
                          <div class="col-xs-2">
                            <input type="text" class="form-control" placeholder="Edad" name="edad">
                          </div>
                        </div>
                    </div><br>
                    <div class="control-group">
                         <div class="row">
                          <div class="col-xs-4">
                            <input type="text" class="form-control" placeholder="Telefono" name="telefono">
                          </div>
                          <div class="col-xs-8">
                            <input type="text" class="form-control" placeholder="Direccion de la oficina" name="direccion">
                          </div>
                        </div>
                    </div><br>
                    <div class="control-group">
                        <label>Acceso de sistema</label>
                        <div class="row">
                          <div class="col-xs-6">
                            <input type="text" class="form-control" placeholder="Tipo de usuario" name="tipo">
                          </div>
                          <div class="col-xs-6">
                            <input type="text" class="form-control" placeholder="Rol de usuario" name="rol">
                          </div>
                        </div>
                    </div><br>
                    @if (count($projects) > 0 )
                    <div class="control-group">
                        <label>Asignacion</label>
                        <select name="proyecto" class="form-control">
                            @foreach ($projects as $item)
                                <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                            @endforeach
                        </select>
                    </div><br>
                    <div class="control-group">
                        <label></label>
                        <div class="controls">
                            <button type="submit" class="btn btn-primary">
                                Registrar nuevo usuario
                            </button>
                        </div>
                    </div>
                    @else
                      <div class="control-group">
                        <p class="text-danger">No hay proyectos disponibles</p>
                      </div>
                    @endif
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dalog -->
</div>
<!-- /.modal -->