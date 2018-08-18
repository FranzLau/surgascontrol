<!-- Modal -->
<div class="modal fade" id="editabalModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-surgas">
        <h5 class="modal-title" id="exampleModalLongTitle">Edita Productos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-5">
        <form action="" id="frmbalE">
          <div class="row">
            <div class="col-sm-6">
              <input type="text" hidden="" name="idbalE" id="idbalE">
              <div class="form-group row">
                <label for="inputNamepE" class="col-md-4 col-form-label">Nombre</label>
                 <div class="col-md-8">
                    <input name="nombalE" type="text" class="form-control" id="inputNamepE" placeholder="Producto">
                </div>
              </div>
              <div class="form-group row">
                <label for="zonalpBale" class="col-md-4 col-form-label">P. Zonal</label>
                <div class="col-md-4">
                  <input type="number" step="any" class="form-control" id="zonalpBale" name="zonalpBale" placeholder="s/.">
                </div>
              </div>
              <div class="form-group row">
                <label for="domiciliopBale" class="col-md-4 col-form-label">P. Domicilio</label>
                <div class="col-md-4">
                  <input type="number" step="any" class="form-control" id="domiciliopBale" name="domiciliopBale" placeholder="s/.">
                </div>
              </div>
              <div class="form-group row">
                <label for="fierropBale" class="col-md-4 col-form-label">P. Envase</label>
                <div class="col-md-4">
                  <input type="number" step="any" class="form-control" id="fierropBale" name="fierropBale" placeholder="s/.">
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group row">
                  <label for="inputpresE" class="col-md-4 col-form-label">Tipo</label>
                  <div class="col-md-6">
                    <select name="presbalE" id="inputpresE" class="form-control">
                      <option value="">Elije una..</option>
                      <option value="Balon">Balon</option>
                      <option value="No Balon">Otro</option>
                    </select>
                  </div>
              </div>
              <div class="form-group row">
                <label for="inputDescripcionE" class="col-md-4 col-form-label">Descripción</label>
                <div class="col-md-8">
                  <textarea name="descbalE" class="form-control" id="inputDescripcionE" rows="3"></textarea>
                </div>
              </div>
            </div>
          </div> 
        </form>
      </div>
      <div class="modal-footer">
        <button id="btneditbal" type="button" class="btn btn-warning-secondary"><i class="fas fa-pencil-alt"></i> Editar</button>
        <button type="button" class="btn btn-close-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
      </div>
    </div>
  </div>
</div>