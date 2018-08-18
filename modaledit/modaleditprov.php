<!-- Modal -->
<div class="modal fade bd-example-modal-lg" data-backdrop="static" id="VerprovModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-surgas">
        <h5 class="modal-title" id="exampleModalLongTitle">Editar Proveedor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body px-5 py-3">
        <form action="" id="frmProV">
          <input type="text" hidden="" id="idproV" name="idproV">
          <div class="form-group row">
            <label for="inputNameP" class="col-md-4 col-form-label">Razón Social :</label>
            <div class="col-md-8">
                <input name="nomproV" type="text" class="form-control" id="inputnomV" placeholder="Nombre Proveedor">
            </div>
          </div>
          <div class="form-group row">
             <label for="inputProsec" class="col-md-4 col-form-label">Sector comercial :</label>
             <div class="col-md-8">
                <select name="secproV" id="inputsecV" class="form-control">
                  <option value="Gas" selected>Gas</option>
                  <option value="Grifo">Grifo</option>
                  <option value="Alimentos">Alimentos</option>
                  <option value="Salud">Salud</option>
                  <option value="Tecnologia">Tecnologia</option>
                  <option value="Servicio">Servicio</option>
                  <option value="otro">Otros ...</option>
                 </select>
             </div>
           </div>
             <div class="form-group row">
               <label for="inputDocpro" class="col-md-4 col-form-label">Tipo Documento :</label>
              <div class="col-md-3">
                  <select name="tdproV" id="inputTdproV" class="form-control">
                     <option value="DNI" selected>DNI</option>
                     <option value="RUC">RUC</option>
                     <option value="otro">Otros ...</option>
                   </select>
              </div>
               <div class="col-md-5">
                   <input name="ndocproV" type="number" class="form-control" id="inputDocproV">
              </div>
             </div>
            <div class="form-group row">
               <label for="inputdirpro" class="col-md-4 col-form-label">Dirección :</label>
               <div class="col-md-8">
                  <input name="dirproV" type="text" class="form-control" id="inputdirproV">
               </div>
             </div>
            <div class="form-group row">
               <label for="inputfonpro" class="col-md-4 col-form-label">Teléfono y Correo :</label>
              <div class="col-md-3">
                   <input name="fonproV" type="text" class="form-control" id="inputfonproV">
               </div>
              <div class="col-md-5">
                   <input name="emailproV" type="text" class="form-control" id="inputEproV">
               </div>
            </div>
            <div class="form-group row">
              <label for="inputlink" class="col-md-4 col-form-label">Sitio Web :</label>
               <div class="col-md-8">
                   <input name="urlproV" type="text" class="form-control" id="inputlinkV" placeholder="Vacio">
              </div>
            </div>
         
        </form>
      </div>
      <div class="modal-footer">
        <button id="editaprove" type="button" class="btn btn-warning-secondary"><i class="fas fa-pencil-alt"></i> Editar</button>
        <button type="button" class="btn btn-close-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
      </div>
    </div>
  </div>
</div>