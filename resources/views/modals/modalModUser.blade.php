<div class="modal fade" id="modModUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="form">
    <div class="modal-content">|
        <div class="modal-header">
        <h5 class="modal-title" id="addPalabraTitle">Modifica Usuario</h5>
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
                                    <input type="text" id="idUsrM" hidden>
                                    <input class="form-control" type="text" id="txMunombre" readonly>
                                </td>
                            </tr>

                            <tr>
                                <td>Email</td>
                                <td>
                                    <input class="form-control" type="text" id="txMuemail">
                                </td>
                            </tr>

                            <tr>
                                <td>Contraseña <span class="tx-8"><i>(Dejar en blanco para que no se cambie la contraseña)</i></span></td>
                                <td>
                                    <input class="form-control" autcomplete="false" type="password" id="txMupass">
                                </td>
                            </tr>

                            <tr>
                                <td>Activo</td>
                                <td>
                                    <input type="checkbox" id="uMactivo">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="btnUserMod">Guardar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
    </div>
</div>
