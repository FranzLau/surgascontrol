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
        <form action="" id="frmComprar">
          <input type="text" hidden="" value="Emitido" id="estComp" name="estComp">
          <div class="form-group row">
            <label for="provComp" class="col-sm-4 col-form-label">Proveedor:</label>
            <div class="col-sm-8">
                <select class="form-control" id="provComp" name="provComp">
                  <option selected value="">Elije uno</option>
                <?php $prov = $con->query("SELECT * FROM proveedor");
                        while ($row = $prov->fetch_assoc()) {
                          echo "<option value='".$row['id_proveedor']."' ";
                          echo ">";
                          echo $row['razon_social'];
                          echo "</option>";
                        }
                    ?>
            </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="produComp" class="col-sm-4 col-form-label">Artículo</label>
            <div class="col-sm-8">
              <select class="form-control " id="produComp" name="produComp">
                <option value="">Elije uno</option>
                <?php 
                  $prod = $con->query("SELECT * FROM producto");
                  while ($row = $prod->fetch_assoc()) {
                    echo "<option value='".$row['id_producto']."' ";
                    echo ">";
                    echo $row['nom_producto'];
                    echo "</option>";
                  }
                ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="pventaComp" class="col-sm-4 col-form-label"></label>
            <div class="col-sm-8">
              <input type="number" class="form-control text-center" id="pventaComp" name="pventaComp" placeholder="s/." readonly>
            </div>
          </div>
          <div id="subtotal">
            <div class="form-group row">
              <label for="stockComp" class="col-sm-4 col-form-label">Cantidad</label>
              <div class="col-sm-4">
                    <input type="text" class="form-control" id="stockComp" name="stockComp">
              </div>
            </div>
            <div class="form-group row">
              <label for="pcomComp" class="col-sm-4 col-form-label">Precio Unid.</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="pcomComp" name="pcomComp" placeholder="s./00.00">
              </div>
            </div>
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
        <button type="button" class="btn btn-purple-secondary" id="generarCompra"><i class="fas fa-shopping-cart fa-xs mr-2"></i> Comprar</button>
        <button type="button" class="btn btn-close-secondary" data-dismiss="modal"><i class="fas fa-times fa-xs mr-2"></i> Cerrar</button>
      </div>
    </div>
  </div>
</div>