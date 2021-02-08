<div class="modal fade" id="addFuente" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="form">
    <div class="modal-content">|
        <div class="modal-header">
        <h5 class="modal-title" id="addFuenteTitle">Agregar Fuente</h5>
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
                                    <input class="form-control" type="text" id="txDesc" required>
                                </td>
                            </tr>
                            <tr>
                                <td>URL</td>
                                <td>
                                    <input class="form-control" type="text" id="txUrl" required>
                                </td>
                            </tr>
                            <tr>
                                <td>Tipo</td>
                                <td>
                                    <select id="stipo" class="form-control">
                                        <option value="0">Seleccionar</option>
                                        <option value="1">HTML</option>
                                        <option value="2">Tweeter</option>
                                        <option value="2">Facebook</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Origen</td>
                                <td>
                                    <select id="sorigen" class="form-control">
                                        <option value="0">Seleccionar</option>
                                        <option value="L">Local</option>
                                        <option value="R">Regional</option>
                                        <option value="N">Nacional</option>
                                        <option value="I">Internacional</option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="btnFuenteAdd">Guardar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
    </div>
</div>
