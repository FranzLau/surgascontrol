<!-- Modal -->
<div class="modal fade" id="GastoModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-surgas">
        <h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-edit"></i> Editar Gasto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-5">
        <form action="" id="frmGasto">
          <input type="text" hidden="" name="idGto" id="idGto">
          <div class="form-group row">
            <label for="Gtotipo" class="col-sm-4 col-form-label">Tipo de Gasto</label>
            <div class="col-sm-8">
              <select class="form-control" id="Gtotipo" name="gastoTi">
                <option value="0">Elije una..</option>
                <option value="Combustible">Combustible</option>
                <option value="Movilidad">Movilidad</option>
                <option value="Útiles de Aseo">Útiles de Aseo</option>
                <option value="Útiles de Oficina">Útiles de Oficina</option>
                <option value="Otros">Otros</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="GtoDesc" class="col-sm-4 col-form-label">Descripción</label>
            <div class="col-sm-8">
              <textarea class="form-control" name="GtoDesc" id="GtoDesc" rows="3"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label for="GtoPrec" class="col-sm-4 col-form-label">Precio</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="GtoPrec" name="GtoPrec" placeholder="s/.000">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
        <button id="btnEditGto" type="button" class="btn btn-warning"><i class="fas fa-pencil-alt"></i> Editar</button>
      </div>
    </div>
  </div>
</div>