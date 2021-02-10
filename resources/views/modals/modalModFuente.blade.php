<div class="modal fade" id="modFuente" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="form">
    <div class="modal-content">|
        <div class="modal-header">
        <h5 class="modal-title" id="addPalabraTitle">Modificación de Fuente Digital</h5>
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
                                <td>Descripción</td>
                                <td>
                                    <input type="text" id="idFuente" hidden>
                                    <input class="form-control" type="text" id="mtxDesc" required>
                                </td>
                            </tr>
                            <tr>
                                <td>URL</td>
                                <td>
                                    <input class="form-control" type="text" id="mtxUrl" required>
                                </td>
                            </tr>
                            <tr>
                                <td>Tipo</td>
                                <td>
                                    <select id="mstipo" class="form-control">
                                        <option value="0">Seleccionar</option>
                                        <option value="1">HTML</option>
                                        <option value="2">Tweeter</option>
                                        <option value="3">Facebook</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Origen</td>
                                <td>
                                    <select id="msorigen" class="form-control">
                                        <option value="0">Seleccionar</option>
                                        <option value="L">Local</option>
                                        <option value="R">Regional</option>
                                        <option value="N">Nacional</option>
                                        <option value="I">Internacional</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Activo</td>
                                <td>
                                    <input type="checkbox" id="mcactivo">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="btnFuenteMod">Guardar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
    </div>
</div>
