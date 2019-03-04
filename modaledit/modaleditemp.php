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
          <div class="row"><!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
            <div class="col-md-7"><!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
              <div class="form-group row">
                <label for="inputemP" class="col-md-3 col-form-label col-form-label-sm">Nombre</label>
                <div class="col-md-9">
                  <input name="nomemP" type="text" class="form-control form-control-sm" id="inputemP" placeholder="Nombres">
                </div>
              </div>
              <div class="row form-group">
                <label for="inputapeP" class="col-md-3 col-form-label col-form-label-sm">Apellido</label>
                <div class="col-md-9">
                     <input name="apemP" type="text" class="form-control form-control-sm" id="inputapeP" placeholder="Apellidos">
                 </div>
              </div>
            </div>
          </div><!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
          <div class="row">
            <div class="col-md-7"><!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
              <div class="form-group row">
                <label for="inputDocemp" class="col-md-3 col-form-label col-form-label-sm">DNI :</label>
                <div class="col-md-9">
                  <input name="dniemP" type="number" class="form-control form-control-sm" id="inputDemP" placeholder="Nro. de DNI">
                </div>
              </div>
              <div class="row form-group">
                <label for="inputcgemP" class="col-md-3 col-form-label col-form-label-sm">Cargo</label>
                <div class="col-md-9">
                  <select name="cargoemP" id="inputcgemP" class="form-control form-control-sm">
                    <option selected style="display:none">Elije una...</option>
                    <option value="Gerente">Gerente</option>
                    <option value="Chofer">Chofer</option>
                    <option value="Administrador">Administrador</option>
                    <option value="Contador">Contador</option>
                    <option value="Soporte Técnico">Soporte Técnico</option>
                    <option value="Recepcionista de Llamadas">Recepcionista de Llamadas</option>
                    <option value="Ventas">Ventas</option>
                    <option value="Limpieza">Limpieza</option>
                    <option value="Otro">Otro</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-5"><!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
              <div class="form-group row">
                <label for="inputDatemp" class="col-md-4 col-form-label col-form-label-sm">Nacimiento</label>
                <div class="col-md-8">
                  <input name="fnemP" type="date" class="form-control form-control-sm" id="inputDatemP">
                </div>
              </div> 
              <div class="row form-group">
                <label for="inputSexemP" class="col-md-4 col-form-label col-form-label-sm">Sexo</label>
                <div class="col-md-8">
                  <select name="sexemP" id="inputSexemP" class="form-control form-control-sm">
                    <option selected style="display:none">Sexo</option>
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                    <option value="O">Otro</option>
                  </select>
                </div>
              </div>
            </div>
          </div><!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
          <div class="row">
            <div class="col-md-7"><!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
              <div class="form-group row">
                <label for="inputdirpro" class="col-md-3 col-form-label col-form-label-sm">Dirección</label>
                <div class="col-md-9">
                  <input name="diremP" type="text" class="form-control form-control-sm" id="inputdiremP" placeholder="Tu dirección">
                </div>
              </div>
              <div class="form-group row">
                 <label for="inputEmailemP" class="col-md-3 col-form-label col-form-label-sm">E-mail</label>
                 <div class="col-md-9">
                    <input name="emailemP" type="email" class="form-control form-control-sm" id="inputEmailemP">
                  </div>
               </div>
              <div class="row form-group">
                <label for="inputfonemP" class="col-md-3 col-form-label col-form-label-sm">Teléfono</label>
                <div class="col-md-9">
                  <input name="telfemP" type="number" class="form-control form-control-sm" id="inputfonemP">
                </div>
              </div>
            </div>
            <div class="col-md-5"><!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
              <div class="row form-group">
                <label for="selestadoE" class="col-md-4 col-form-label col-form-label-sm">Estado</label>
                <div class="col-md-8">
                  <select name="selestadoE" id="selestadoE" class="form-control form-control-sm">
                    <option selected style="display:none">Elije una...</option>
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputAcc" class="col-md-4 col-form-label col-form-label-sm">Acceso</label>
                <div class="col-md-8">
                  <select name="accemP" id="inputAccemP" class="form-control form-control-sm">
                    <option selected disabled="">Elije una ..</option>
                    <option value="Administrador">Administrador</option>
                    <option value="Usuario">Usuario</option>
                    <option value="Ninguno">Ninguno</option>
                  </select>
                </div>
              </div>
              <div class="row form-group">
                <label for="inputpassP" class="col-md-4 col-form-label col-form-label-sm">Contraseña</label>
                <div class="col-md-8">
                  <input name="passemP" type="text" readonly class="form-control form-control-sm" id="inputpassP">
                </div>
              </div>
            </div>
          </div><!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->       
        </form>
      </div>
      <div class="modal-footer">
        <button id="editarEmp" type="button" class="btn btn-warning-secondary"><i class="fas fa-edit"></i> Editar</button>
        <button type="button" class="btn btn-close-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
      </div>
    </div>
  </div>
</div>