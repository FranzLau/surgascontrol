
<!-- Modal -->
<div class="modal fade" id="balonModalCenter" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header pl-5">
        <h5 class="modal-title font-danger" id="exampleModalLongTitle">Agrega nuevo <strong>Producto</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-5">
        <form action="" id="frmbal">
          <div class="row">
            <div class="col-sm-6">
              
              <div class="form-group row">
                <label for="inputAcceso" class="col-md-4 col-form-label">Categoria :</label>
                <div class="col-md-8">
                  <select name="presbal" id="inputAcceso" class="form-control">
                    <option value="">Elije una..</option>
                    <option value="Balon">Balon</option>
                    <option value="No Balon">Otro</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputNamep" class="col-md-4 col-form-label">Producto :</label>
                 <div class="col-md-8">
                    <input name="nombal" type="text" class="form-control" id="inputNamep">
                </div>
              </div>
              
              <div class="form-group row">
               <label for="stocklle" class="col-sm-4 col-form-label">Stock Llenos</label>
               <div class="col-sm-6">
                 <input type="number" class="form-control" id="stocklle" name="stocklle">
               </div>
             </div>
             <div class="form-group row">
               <label for="stockvac" class="col-sm-4 col-form-label">Stock Vacios</label>
               <div class="col-sm-6">
                 <input type="number" class="form-control" id="stockvac" name="stockvac">
               </div>
             </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group row">
                <label for="zonalpBal" class="col-md-6 col-form-label">Precio Zonal</label>
                <div class="col-md-6">
                  <input type="number" step="any" class="form-control" id="zonalpBal" name="zonalpBal" placeholder="s/.">
                </div>
              </div>
              <div class="form-group row">
                <label for="domiciliopBal" class="col-md-6 col-form-label">Precio Domicilio</label>
                <div class="col-md-6">
                  <input type="number" step="any" class="form-control" id="domiciliopBal" name="domiciliopBal" placeholder="s/.">
                </div>
              </div>
              <div class="form-group row">
                <label for="fierroBal" class="col-md-6 col-form-label">Precio Envase</label>
                <div class="col-md-6">
                  <input type="number" step="any" class="form-control" id="fierroBal" name="fierroBal" placeholder="s/.">
                </div>
              </div>
              
              <div class="form-group row">
                <label for="inputDescripcion" class="col-md-4 col-form-label">Descripción</label>
                <div class="col-md-8">
                    <textarea name="descbal" class="form-control" id="inputDescripcion" rows="3"></textarea>
                </div>
             </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-sm-12 justify-content-start">
            <button id="agregabal" type="button" class="btn btn-purple-secondary"><i class="fas fa-save fa-xs mr-2"></i> Guardar</button>
            <button type="button" class="btn btn-close-secondary" data-dismiss="modal"><i class="fas fa-times fa-xs mr-2"></i> Cerrar</button>
          </div>
        </div>
        
      </div>
    </div>
  </div>
</div>