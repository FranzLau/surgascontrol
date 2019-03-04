<!-- Modal -->
<div class="modal fade" id="ModalCompra" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header pl-5">
        <h5 class="modal-title font-danger" id="exampleModalCenterTitle">Agregar nueva <strong>Compra</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body px-5 py-3">
        <form action="">
          <input type="text" hidden="" value="Emitido" id="estComp" name="estComp">
          <div class="form-group row">
            
            <div class="col-sm-8">
                
            </div>
          </div>
          <div class="form-group row">
            
            <div class="col-sm-8">
              
            </div>
          </div>
          <div class="form-group row">
            <label for="pventaComp" class="col-sm-4 col-form-label"></label>
            <div class="col-sm-8">
              <input type="number" class="form-control text-center" id="pventaComp" name="pventaComp" placeholder="s/." readonly>
            </div>
          </div>
          <div id="subtotal">
            
            
          </div>
          <div class="form-group row">
            <label for="PagarComp" class="col-sm-4 col-form-label">Total:</label>
            <div class="col-sm-8">
              <input type="email" class="form-control text-center" id="PagarComp" disabled="true" placeholder="s/.">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-purple-secondary" ><i class="fas fa-shopping-cart fa-xs mr-2"></i> Comprar</button>
        <button type="button" class="btn btn-close-secondary" data-dismiss="modal"><i class="fas fa-times fa-xs mr-2"></i> Cerrar</button>
      </div>
    </div>
  </div>
</div>