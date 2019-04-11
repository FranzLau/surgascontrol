<!-- Modal -->
<div class="modal fade bd-example-modal-lg" data-backdrop="static" id="proveModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header pl-5">
        <h5 class="modal-title font-danger" id="exampleModalLongTitle">Agrega nuevo <strong>Proveedor</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-5">
        <form action="" id="frmProve">
          <div class="form-group row">
            <label for="inputNamep" class="col-md-4 col-form-label">Razón Social :</label>
            <div class="col-md-8">
                <input name="nomprove" type="text" class="form-control" id="inputNamep">
            </div>
          </div>
          <div class="form-group row">
             <label for="inputProsec" class="col-md-4 col-form-label">Sector comercial :</label>
             <div class="col-md-4">
                <select name="sectorprove" id="inputProsec" class="form-control">
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
                  <select name="tdocprov" id="inputDocpro" class="form-control">
                     <option value="DNI" selected>DNI</option>
                     <option value="RUC">RUC</option>
                     <option value="otro">Otros ...</option>
                   </select>
              </div>
               <div class="col-md-5">
                   <input name="ndocprov" type="number" class="form-control" id="inputDocpro" placeholder="Nro. Documento">
              </div>
             </div>
            <div class="form-group row">
               <label for="inputdirpro" class="col-md-4 col-form-label">Dirección :</label>
               <div class="col-md-8">
                  <input name="dirprov" type="text" class="form-control" id="inputdirpro">
               </div>
             </div>
            <div class="form-group row">
               <label for="inputfonpro" class="col-md-4 col-form-label">Teléfono y Correo :</label>
              <div class="col-md-3">
                   <input name="fonprov" type="text" class="form-control" id="inputfonpro">
               </div>
              <div class="col-md-5">
                   <input name="emailprov" type="text" class="form-control" id="inputfonpro" placeholder="abc@ejemplo.com">
               </div>
            </div>
            <div class="form-group row">
              <label for="inputlink" class="col-md-4 col-form-label">Sitio Web :</label>
               <div class="col-md-8">
                   <input name="urlprov" type="text" class="form-control" id="inputlink" placeholder="www.ejemplo.com">
              </div>
            </div>
         
        </form>
      </div>
      <div class="modal-footer bg-light">
        <button id="agregaprov" type="button" class="btn btn-success-melody"><i class="fas fa-save fa-xs mr-2"></i> Guardar</button>
        <button type="button" class="btn btn-light-melody" data-dismiss="modal"><i class="fas fa-times fa-xs mr-2"></i> Cerrar</button>
      </div>
    </div>
  </div>
</div>