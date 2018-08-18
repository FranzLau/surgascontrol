<!-- Modal -->
<div class="modal fade" id="editpresModalCenter" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-surgas">
        <h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-edit"></i> Editar Presentacion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-5">
        <form action="" id="frmPreP">
        	<input type="text" name="idpreP" id="idpreP" hidden="">
          <div class="form-group row">
            <label for="inputNamepre" class="col-md-4 col-form-label">Nombre</label>
            <div class="col-md-8">
                <input name="nompresP" type="text" class="form-control" id="inputNamepreP">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputDespre" class="col-md-4 col-form-label">Descripción</label>
            <div class="col-md-8">
                <textarea name="descpresP" class="form-control" id="inputDespreP" rows="3"></textarea>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button id="editaPres" type="button" class="btn btn-warning"><i class="fas fa-edit"></i> Editar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
      </div>
    </div>
  </div>
</div>