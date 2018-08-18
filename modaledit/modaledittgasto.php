<!-- Modal -->
	<div class="modal fade" id="vertgastoModalCenter" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header bg-surgas">
	        <h5 class="modal-title" id="exampleModalCenterTitle"><i class="fas fa-edit"></i> Editar el tipo de Gasto</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body p-5">
	        <form action="" id="frmTga">
	        	<input type="text" hidden="" id="idTga" name="idTga">
	          <div class="form-group row">
	            <label for="inputNametcg" class="col-md-4 col-form-label">Tipo de gasto :</label>
	            <div class="col-md-8">
	                <input name="nomTga" type="text" class="form-control" id="inputNametcg">
	            </div>
	          </div>
	          <div class="form-group row">
	            <label for="inputDestga" class="col-md-4 col-form-label">Descripción :</label>
	            <div class="col-md-8">
	                <textarea name="descTga" class="form-control" id="inputDestga" rows="3"></textarea>
	            </div>
	          </div>
	        </form>
	      </div>
	      <div class="modal-footer">
	      	<button id="editarTga" type="button" class="btn btn-warning-secondary"><i class="fas fa-edit"></i> Editar</button>
	        <button type="button" class="btn btn-close-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
	      </div>
	    </div>
	  </div>
	</div>