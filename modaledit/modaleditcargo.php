<!-- Modal -->
<div class="modal fade" id="editcargoModalCenter" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-surgas">
        <h5 class="modal-title" id="exampleModalCenterTitle"><i class="fas fa-edit"></i> Editar Cargo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-5">
        <form action="" id="frmCargO">
        	<input type="text" name="idCargoC" hidden="" id="idCargoC">
          <div class="form-group row">
            <label for="inputNamecar" class="col-md-4 col-form-label">Cargo :</label>
            <div class="col-md-8">
                <input name="nomcgC" type="text" class="form-control" id="inputNamecgC">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputDesCat" class="col-md-4 col-form-label">Descripción :</label>
            <div class="col-md-8">
                <textarea name="descgC" class="form-control form-control-sm" id="inputDescgC" rows="3"></textarea>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
      	<button id="editaCargo" type="button" class="btn btn-warning-secondary"><i class="fas fa-pencil-alt"></i> Editar</button>
        <button type="button" class="btn btn-close-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
      </div>
    </div>
  </div>
</div>
