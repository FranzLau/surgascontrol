<!-- Modal -->
<div class="modal fade" id="editfierModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Editar Precios</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" id="frmFierr">
          <input type="text" name="idfierroF" id="idfierroF" hidden="">
          <div class="form-group row">
            <label for="inputNameFi" class="col-md-4 col-form-label col-form-label-sm">Nombre:</label>
            <div class="col-md-6">
                <input name="nomFier" type="text" class="form-control form-control-sm" id="inputNameFi" placeholder="Nombre">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputCgas" class="col-md-4 col-form-label col-form-label-sm">Con gas</label>
            <div class="col-md-4">
                <input type="number" step="any" name="pcongas" class="form-control form-control-sm" id="inputCgas">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputSgas" class="col-md-4 col-form-label col-form-label-sm">Sin gas</label>
            <div class="col-md-4">
                <input type="number" step="any" name="psingas" class="form-control form-control-sm" id="inputSgas">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle"></i> Cerrar</button>
        <button id="editafierro" type="button" class="btn btn-warning"><i class="fas fa-pen-square"></i> Editar</button>
      </div>
    </div>
  </div>
</div>