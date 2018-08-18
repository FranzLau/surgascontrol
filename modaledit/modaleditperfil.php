<div class="modal fade bd-example-modal-lg" data-backdrop="static" id="EditempUserCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-surgas">
        <h5 class="modal-title font-danger" id="exampleModalLongTitle"><i class="fas fa-edit"></i> Editar <strong>Perfil</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-5">
        
            <form action="" id="formUser" name="formUser">
              <input type="text" hidden="" id="idUser" name="idUser">
              <div class="form-group row">
                 <label for="nomUser" class="col-md-3 col-form-label col-form-label-sm">Nombres y Apellidos :</label>
                 <div class="col-md-5">
                     <input name="nomUser" readonly type="text" class="form-control form-control-sm" id="nomUser">
                </div>
                 <div class="col-md-4">
                     <input name="apeUser" readonly type="text" class="form-control form-control-sm" id="apeUser" >
                 </div>
              </div>
               <div class="form-group row">
                 <label for="dniUser" class="col-md-3 col-form-label col-form-label-sm">DNI :</label>
                 <div class="col-md-5">
                    <input name="dniUser" readonly type="number" class="form-control form-control-sm" id="dniUser">
                 </div>
               </div>
               <div class="form-group row">
                  <label for="nacUser" class="col-md-3 col-form-label col-form-label-sm">Fecha Nacimiento :</label>
                  <div class="col-md-5">
                      <input name="nacUser" type="date" class="form-control form-control-sm" id="nacUser">
                  </div>
                  
               </div>  
               <div class="form-group row">
                 <label for="direcUser" class="col-md-3 col-form-label col-form-label-sm">Dirección :</label>
                 <div class="col-md-9">
                    <input name="direcUser" type="text" class="form-control form-control-sm" id="direcUser">
                </div>
               </div>
               <div class="form-group row">
                 <label for="emailUser" class="col-md-3 col-form-label col-form-label-sm">Datos extras :</label>
                 <div class="col-md-4">
                    <input name="emailUser" type="email" class="form-control form-control-sm" id="emailUser">
                  </div>
                 
                  <div class="col-md-3">
                    <input name="fonUser" type="number" class="form-control form-control-sm" id="fonUser">
                  </div>
               </div>
            </form>
         
      </div>
      <div class="modal-footer">
        <button id="editUser" type="button" class="btn btn-warning-secondary"><i class="fas fa-edit"></i> Editar</button>
        <button type="button" class="btn btn-close-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
      </div>
    </div>
  </div>
</div>