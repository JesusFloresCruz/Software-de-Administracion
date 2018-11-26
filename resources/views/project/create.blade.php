<div class="modal" id="addProject">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Nuevo proyecto</h4>
            </div>
            <div class="modal-body">
                 <form class="form" action="/proyecto" method="post">
                 {{ csrf_field() }}
                    <div class="control-group">
                        <label>Nombre de proyecto</label>
                        <div class="controls">
                            <input type="text" class="form-control" placeholder="Nombre de proyecto" name="nombre">
                        </div>
                    </div>
                    <div class="control-group">
                        <table class="table">
                            <tr>
                                <td>
                                    Inicia: <input class=" form-control date" id="begin" type="text" name="fecha_inicio">
                                </td>
                                <td>
                                    Finaliza: <input class="form-control date" id="end" type="text" name="fecha_fin">
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="control-group">
                        <label>Descripcion</label>
                        <div class="controls">
                            <textarea class="form-control" name="descripcion"></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label></label>
                        <div class="controls">
                            <button type="submit" class="btn btn-primary">
                                Registrar proyecto
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dalog -->
</div>
<!-- /.modal -->