<div class="modal fade" id="modAddUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="form">
    <div class="modal-content">|
        <div class="modal-header">
        <h5 class="modal-title" id="addPalabraTitle">Alta de usuarios</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-12">
                    <table class="table form-group">
                        <tbody>
                            <tr>
                                <td>Nombre</td>
                                <td>
                                    <input type="text" id="idUsr" hidden>
                                    <input class="form-control" type="text" id="txunombre" autocomplete="false">
                                </td>
                            </tr>

                            <tr>
                                <td>Email</td>
                                <td>
                                    <input class="form-control" type="text" id="txuemail" autocomplete="false">
                                </td>
                            </tr>

                            <tr>
                                <td>Contraseña</td>
                                <td>
                                    <input class="form-control" autcomplete="false" type="password" id="txupass" autocomplete="false">
                                </td>
                            </tr>

                            <tr>
                                <td>Activo</td>
                                <td>
                                    <input type="checkbox" id="uactivo">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="btnUserAdd">Guardar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
    </div>
</div>
