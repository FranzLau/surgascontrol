<!-- Modal -->
<div class="modal fade" data-backdrop="static" id="ModalRepartidor" tabindex="-1" role="dialog" aria-labelledby="Modalrepar" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-danger" id="Modalrepar">Agrega nueva <strong>Partida</strong> <i class="fas fa-truck"></i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-5">
        <div class="row">
          <div class="col-sm-12">
            <form action="" id="formPartida">
              <div class="form-group row">
                <label for="parChof" class="col-form-label col-sm-4">Chofer :</label>
                <div class="col-sm-8">
                  <select class="form-control" name="parChof" id="parChof">
                    <option value="">Elije uno..</option>
                  <?php $prod = $con->query("SELECT * FROM empleado");
                    while ($row = $prod->fetch_assoc()) {
                      echo "<option value='".$row['id_emp']."' ";
                      echo ">";
                      echo $row['nom_emp'];
                      echo " ";
                      echo $row['ape_emp'];
                      echo "</option>";
                    }
                  ?>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="parzona" class="col-sm-4 col-form-label">Zona :</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="parzona" name="parzona">
                </div>
              </div>
              <div class="form-group row">
                <label for="parplaca" class="col-form-label col-sm-4">Placa :</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="parplaca" name="parplaca">
                </div>
              </div>
              <div class="form-group row">
                 <label for="parcantidad" class="col-form-label col-sm-4">Cantidad :</label>
                 <div class="col-sm-4">
                   <input type="number" class="form-control" id="parcantidad" name="parcantidad">
                 </div>
              </div>
              <?php
                date_default_timezone_set('America/Lima');
                $fech = date('Y-m-d');
              ?>
              <div class="form-group row">
                 <label for="colFormLabelSm" class="col-form-label col-sm-4">Fecha :</label>
                 <div class="col-sm-8">
                   <input type="text" readonly class="form-control text-center" id="colFormLabelSm" value=" <?php echo $fech ?> ">
                 </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" id="btnNewPartida" class="btn btn-purple-secondary"><i class="fas fa-save fa-xs mr-2"></i> Guardar</button>
        <button type="button" class="btn btn-close-secondary" data-dismiss="modal"><i class="fas fa-times fa-xs mr-2"></i> Cerrar</button>
      </div>
    </div>
  </div>
</div>