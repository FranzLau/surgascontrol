<!-- Modal -->
<div class="container-fluid">
<div class="modal fade bd-example-modal-lg" data-backdrop="static" id="empModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header pl-5">
        <p class="modal-title font-danger" id="exampleModalLongTitle">Agregar nuevo <strong>Empleado</strong></p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-5">
            <form action="" id="frmemp">
              <div class="form-group row">
                 <label for="inputemp" class="col-md-3 col-form-label col-form-label-sm">Nombres y Apellidos :</label>
                 <div class="col-md-5">
                     <input name="nomemp" type="text" class="form-control form-control-sm" id="inputemp" placeholder="Nombres">
                </div>
                 <div class="col-md-4">
                     <input name="apeemp" type="text" class="form-control form-control-sm" id="inputemp" placeholder="Apellidos">
                 </div>
              </div>
               <div class="form-group row">
                 <label for="inputDocemp" class="col-md-3 col-form-label col-form-label-sm">DNI :</label>
                 <div class="col-md-5">
                    <input name="dniemp" type="number" class="form-control form-control-sm" id="inputDocemp" placeholder="Nro. de DNI">
                 </div>
               </div>
               <div class="form-group row">
                  <label for="inputDatemp" class="col-md-3 col-form-label col-form-label-sm">Fecha Nacimiento :</label>
                  <div class="col-md-5">
                      <input name="fechnac" type="date" class="form-control form-control-sm" id="inputDatemp">
                  </div>
                  
                  <div class="col-md-4">
                    <select name="sexemp" id="inputAcceso" class="form-control form-control-sm">
                       <option selected style="display:none">Sexo</option>
                       <option value="M">Masculino</option>
                       <option value="F">Femenino</option>
                     </select>
                  </div>
               </div>  
               <div class="form-group row">
                 <label for="inputdirpro" class="col-md-3 col-form-label col-form-label-sm">Dirección :</label>
                 <div class="col-md-9">
                    <input name="diremp" type="text" class="form-control form-control-sm" id="inputdirpro" placeholder="Tu dirección">
                </div>
               </div>
               <div class="form-group row">
                 <label for="inputemail" class="col-md-3 col-form-label col-form-label-sm">Datos extras :</label>
                 <div class="col-md-3">
                    <input name="emailemp" type="email" class="form-control form-control-sm" id="inputemail" placeholder="abc@ejemplo.com">
                  </div>
                 <div class="col-md-3">
                    <select name="cargoemp" id="inputAcceso" class="form-control form-control-sm">
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
                    <input name="telfemp" type="number" class="form-control form-control-sm" id="inputfone" placeholder="Teléfono">
                  </div>
               </div>
               <div class="form-group row">
                  <label for="inputAccEmp" class="col-md-3 col-form-label col-form-label-sm">Tipo Acceso :</label>
                  <div class="col-md-4">
                    <select name="accemp" id="inputAccEmp" class="form-control form-control-sm">
                      <option selected style="display: none;">Elije una ..</option>
                      <option value="Administrador">Administrador</option>
                      <option value="Usuario">Usuario</option>
                      <option value="Ninguno">Ninguno</option>
                    </select>
                  </div>
                  <div class="col-md-5">
                      <input name="passemp" type="text" class="form-control form-control-sm" id="inputpass" placeholder="Contraseña">
                  </div>
              </div>
                    
            </form>
         
      </div>
      <div class="modal-footer">
        <button id="agregaemp" type="button" class="btn btn-purple-secondary"><i class="fas fa-save fa-xs mr-2"></i> Guardar</button>
        <button type="button" class="btn btn-close-secondary" data-dismiss="modal"><i class="fas fa-times fa-xs mr-2"></i> Cerrar</button>
      </div>
    </div>
  </div>
</div>
</div>