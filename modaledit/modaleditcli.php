<!-- Modal -->
<div class="modal fade bd-example-modal-lg" data-backdrop="static" id="editcliModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-surgas">
        <h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-edit"></i> EditarCliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-5">
        <form action="" id="frmeditC">
          <input type="text" hidden="" name="idcliC" id="idcliC">
          <div class="form-group row">
            <label for="inputempC" class="col-md-3 col-form-label">Nombre Completo</label>
            <div class="col-md-5">
                <input name="nomcliC" type="text" class="form-control" id="inputnomC" placeholder="Nombres">
            </div>
            <div class="col-md-4">
                <input name="apecliC" type="text" class="form-control" id="inputapeC" placeholder="Apellidos">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputDocpro" class="col-md-3 col-form-label">Tipo Documento :</label>
            <div class="col-md-3">
                <select name="tdocliC" id="inputDtipo" class="form-control">
                  <option value="DNI" selected>DNI</option>
                  <option value="RUC">RUC</option>
                  <option value="Otro">Otro...</option>
                </select>
            </div>
            <div class="col-md-6">
                <input name="docliC" type="number" class="form-control" id="inputDcli" placeholder="Nro. Documento">
            </div>
          </div>
            <div class="form-group row">
              <label for="inputDateC" class="col-md-3 col-form-label">Fecha Nac. y Sexo</label>
              <div class="col-md-4">
                  <input name="datecliC" type="date" class="form-control" id="inputDateC">
              </div>
              <div class="col-md-3">
                <select name="sexcliC" id="sexcliC" class="form-control">
                  <option selected style="display: none;">Sexo</option>
                  <option value="M">Masculino</option>
                  <option value="F">Femenino</option>
                  <option value="N">Ninguno</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputdirC" class="col-md-3 col-form-label">Dirección :</label>
              <div class="col-md-9">
                  <input name="dircliC" type="text" class="form-control" id="inputdirC" placeholder="Tu dirección">
              </div>
            </div>
            <div class="form-group row">
                  <label for="inputfonC" class="col-md-3 col-form-label">Teléfono y Correo :</label>
                  <div class="col-md-4">
                      <input name="foncliC" type="text" class="form-control" id="inputfonC" placeholder="Teléfono">
                  </div>
                  <div class="col-md-5">
                      <input name="emailcliC" type="email" class="form-control" id="emailcliC" placeholder="E-mail">
                  </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button id="btneditcli" type="button" class="btn btn-warning-secondary"><i class="fas fa-pencil-alt"></i> Editar</button>
        <button type="button" class="btn btn-close-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
      </div>
    </div>
  </div>
</div>