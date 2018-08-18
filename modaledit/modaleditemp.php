<div class="modal fade bd-example-modal-lg" data-backdrop="static" id="EditempModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-surgas">
        <h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-edit"></i> Editar Empleado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-5">
        
            <form action="" id="frmemP" name="frmemP">
              <input type="text" hidden="" id="idemP" name="idemP">
              <div class="form-group row">
                 <label for="inputemP" class="col-md-3 col-form-label col-form-label-sm">Nombres y Apellidos :</label>
                 <div class="col-md-5">
                     <input name="nomemP" type="text" class="form-control form-control-sm" id="inputemP" placeholder="Nombres">
                </div>
                 <div class="col-md-4">
                     <input name="apemP" type="text" class="form-control form-control-sm" id="inputapeP" placeholder="Apellidos">
                 </div>
              </div>
               <div class="form-group row">
                 <label for="inputDocemp" class="col-md-3 col-form-label col-form-label-sm">DNI :</label>
                 <div class="col-md-5">
                    <input name="dniemP" type="number" class="form-control form-control-sm" id="inputDemP" placeholder="Nro. de DNI">
                 </div>
               </div>
               <div class="form-group row">
                  <label for="inputDatemp" class="col-md-3 col-form-label col-form-label-sm">Fecha Nacimiento :</label>
                  <div class="col-md-5">
                      <input name="fnemP" type="date" class="form-control form-control-sm" id="inputDatemP">
                  </div>
                  
                  <div class="col-md-4">
                    <select name="sexemP" id="inputSexemP" class="form-control form-control-sm">
                       <option selected style="display:none">Sexo</option>
                       <option value="M">Masculino</option>
                       <option value="F">Femenino</option>
                     </select>
                  </div>
               </div>  
               <div class="form-group row">
                 <label for="inputdirpro" class="col-md-3 col-form-label col-form-label-sm">Dirección :</label>
                 <div class="col-md-9">
                    <input name="diremP" type="text" class="form-control form-control-sm" id="inputdiremP" placeholder="Tu dirección">
                </div>
               </div>
               <div class="form-group row">
                 <label for="inputemail" class="col-md-3 col-form-label col-form-label-sm">Datos extras :</label>
                 <div class="col-md-3">
                    <input name="emailemP" type="email" class="form-control form-control-sm" id="inputEmailemP" placeholder="abc@ejemplo.com">
                  </div>
                 <div class="col-md-3">
                    <select name="cargoemP" id="inputcgemP" class="form-control form-control-sm">
                       <?php $cargo = $con->query("SELECT * FROM cargo");
                            while ($row = $cargo->fetch_assoc()) {
                              echo "<option value='".$row['id_cargo']."' ";
                              echo ">";
                              echo $row['nom_cargo'];
                              echo "</option>";
                            }
                        ?>
                     </select>
                  </div>
                  <div class="col-md-3">
                    <input name="telfemP" type="number" class="form-control form-control-sm" id="inputfonemP" placeholder="Teléfono">
                  </div>
               </div>
               <div class="form-group row">
                  <label for="inputAcc" class="col-md-3 col-form-label col-form-label-sm">Tipo Acceso :</label>
                  <div class="col-md-4">
                    <select name="accemP" id="inputAccemP" class="form-control form-control-sm">
                      <option selected disabled="">Elije una ..</option>
                      <option value="Administrador">Administrador</option>
                      <option value="Usuario">Usuario</option>
                      <option value="Ninguno">Ninguno</option>
                    </select>
                  </div>
                  <div class="col-md-5">
                      <input name="passemP" type="text" class="form-control form-control-sm" id="inputpassP" placeholder="Contraseña">
                  </div>
              </div>
                    
            </form>
         
      </div>
      <div class="modal-footer">
        <button id="editarEmp" type="button" class="btn btn-warning-secondary"><i class="fas fa-edit"></i> Editar</button>
        <button type="button" class="btn btn-close-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
      </div>
    </div>
  </div>
</div>