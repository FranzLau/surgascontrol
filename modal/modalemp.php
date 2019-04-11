<!-- Modal -->
<div class="container-fluid">
  <div class="modal fade bd-example-modal-lg" data-backdrop="static" id="empModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content p-3">
        <div class="modal-header">
          <p class="modal-title font-danger" id="exampleModalLongTitle">Agregar nuevo <strong>Empleado</strong></p>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" id="frmemp">
            <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
            <div class="row">
              <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
              <div class="col-md-7">
                <div class="form-group row">
                  <label for="inputemp" class="col-md-3 col-form-label col-form-label-sm">Nombres</label>
                  <div class="col-md-9">
                    <input name="nomemp" type="text" class="form-control form-control-sm" id="inputemp" placeholder="Nombres">
                  </div>
                </div>
                <div class="row form-group">
                  <label for="inputemp" class="col-md-3 col-form-label col-form-label-sm">Apellidos</label>
                  <div class="col-md-9">
                    <input name="apeemp" type="text" class="form-control form-control-sm" id="inputemp" placeholder="Apellidos">
                  </div>
                </div>
              </div>
                <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
                
              <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
            </div>
            <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
            <div class="row">
              <div class="col-md-7"><!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
                <div class="form-group row">
                  <label for="inputDocemp" class="col-md-3 col-form-label col-form-label-sm">DNI</label>
                  <div class="col-md-9">
                    <input name="dniemp" type="number" class="form-control form-control-sm" id="inputDocemp" placeholder="Nro. de DNI">
                  </div>
                </div>
                <div class="row form-group">
                  <label for="" class="col-md-3 col-form-label col-form-label-sm">Cargo</label>
                  <div class="col-md-9">
                    <select name="cargoemp" id="inputAcceso" class="form-control form-control-sm">
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
              <div class="col-md-5"><!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
                <div class="form-group row">
                  <label for="inputDatemp" class="col-md-4 col-form-label col-form-label-sm">Nacimiento</label>
                  <div class="col-md-8">
                    <input name="fechnac" type="date" class="form-control form-control-sm" id="inputDatemp">
                  </div>
                </div>
                <div class="row form-group">
                  <label for="" class="col-md-4 col-form-label col-form-label-sm">Sexo</label>
                  <div class="col-md-8">
                    <select name="sexemp" id="inputAcceso" class="form-control form-control-sm">
                      <option selected style="display:none">Sexo</option>
                      <option value="M">Masculino</option>
                      <option value="F">Femenino</option>
                      <option value="O">Otro</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
            
            <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
            <div class="row">
              <div class="col-md-7"><!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
                <div class="form-group row">
                  <label for="inputdirpro" class="col-md-3 col-form-label col-form-label-sm">Dirección</label>
                  <div class="col-md-9">
                    <input name="diremp" type="text" class="form-control form-control-sm" id="inputdirpro" placeholder="Tu dirección">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputemail" class="col-md-3 col-form-label col-form-label-sm">E-mail</label>
                  <div class="col-md-9">
                    <input name="emailemp" type="email" class="form-control form-control-sm" id="inputemail" placeholder="abc@ejemplo.com">
                  </div>
                </div>
                <div class="row form-group">
                  <label for="inputfone" class="col-md-3 col-form-label col-form-label-sm">Teléfono</label>
                  <div class="col-md-9">
                    <input name="telfemp" type="number" class="form-control form-control-sm" id="inputfone" placeholder="Teléfono">
                  </div>
                </div>
              </div>
              <div class="col-md-5"><!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
                <div class="row form-group">
                  <label for="selestado" class="col-md-4 col-form-label col-form-label-sm">Estado</label>
                  <div class="col-md-8">
                    <select name="selestado" id="selestado" class="form-control form-control-sm">
                      <option selected style="display:none">Elije una...</option>
                      <option value="Activo">Activo</option>
                      <option value="Inactivo">Inactivo</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputAccEmp" class="col-md-4 col-form-label col-form-label-sm">Acceso</label>
                  <div class="col-md-8">
                    <select name="accemp" id="inputAccEmp" class="form-control form-control-sm">
                      <option selected style="display: none;">Elije una ..</option>
                      <option value="Administrador">Administrador</option>
                      <option value="Usuario">Usuario</option>
                      <option value="Ninguno">Ninguno</option>
                    </select>
                  </div>
                </div>
                <div class="row form-group">
                  <label for="inputpass" class="col-md-4 col-form-label col-form-label-sm">Contraseña</label>
                  <div class="col-md-8">
                    <input name="passemp" type="text" class="form-control form-control-sm" id="inputpass" placeholder="Contraseña">
                  </div>
                </div>
              </div>
            </div>
            <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->    
          </form>
        </div>
        <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
        <div class="modal-footer">
          <button id="agregaemp" type="button" class="btn btn-success-melody"><i class="fas fa-save mr-2"></i> Guardar</button>
          <button type="button" class="btn btn-light-melody" data-dismiss="modal"><i class="fas fa-times mr-2"></i> Cerrar</button>
        </div>
      </div>
    </div>
  </div>
</div>