<!-- Modal -->
<div class="modal fade bd-example-modal-lg" data-backdrop="static" id="cliModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header pl-5">
        <h5 class="modal-title font-danger" id="exampleModalLongTitle">Agrega nuevo <strong>Cliente</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-5">
        <form action="" id="frmcli">
          <div class="form-group row">
            <label for="inputemp" class="col-md-3 col-form-label">Nombre completo:</label>
            <div class="col-md-5">
                <input name="nomcli" type="text" class="form-control" id="inputemp" placeholder="Nombres">
            </div>
            <div class="col-md-4">
                <input name="apecli" type="text" class="form-control" id="inputemp" placeholder="Apellidos">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputDocpro" class="col-md-3 col-form-label">Tipo Documento :</label>
            <div class="col-md-3">
                <select name="tdoccli" id="inputDocpro" class="form-control">
                  <option value="DNI" selected>DNI</option>
                  <option value="RUC">RUC</option>
                  <option value="Otro">Otro...</option>
                </select>
            </div>
            <div class="col-md-6">
                <input name="doccli" type="number" class="form-control" id="inputDocpro" placeholder="Nro. Documento">
            </div>
          </div>
            <div class="form-group row">
              <label for="inputDatemp" class="col-md-3 col-form-label">Fecha Nac. y Sexo</label>
              <div class="col-md-4">
                  <input name="datecli" type="date" class="form-control" id="inputDatemp">
              </div>
              <div class="col-md-3">
                <select name="sexcli" id="inputAcceso" class="form-control">
                  <option selected style="display: none;">Sexo</option>
                  <option value="M">Masculino</option>
                  <option value="F">Femenino</option>
                  <option value="N">Ninguno</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputdirpro" class="col-md-3 col-form-label">Dirección :</label>
              <div class="col-md-9">
                  <input name="dircli" type="text" class="form-control" id="inputdirpro" placeholder="Tu dirección">
              </div>
            </div>
            <div class="form-group row">
                  <label for="inputfonpro" class="col-md-3 col-form-label">Teléfono y Correo :</label>
                  <div class="col-md-4">
                      <input name="foncli" type="text" class="form-control" id="inputfonpro" placeholder="Teléfono">
                  </div>
                  <div class="col-md-5">
                      <input name="emailcli" type="email" class="form-control" id="inputfonpro" placeholder="E-mail">
                  </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button id="agregacli" type="button" class="btn btn-success-melody"><i class="fas fa-save fa-xs mr-2"></i> Guardar</button>
        <button type="button" class="btn btn-light-melody" data-dismiss="modal"><i class="fas fa-times fa-xs mr-2"></i> Cerrar</button>
      </div>
    </div>
  </div>
</div>