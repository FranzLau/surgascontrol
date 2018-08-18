<!-- Modal -->
<div class="modal fade" id="editcatModalCenter" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-surgas">
        <h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-edit"></i> Editar Categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-5">
        <form action="" id="frmCate">
          <input type="text" name="idcatC" id="idcatC" hidden="">
          <div class="form-group row">
            <label for="inputNamecat" class="col-md-4 col-form-label">Categoria</label>
            <div class="col-md-8">
                <input name="nomcategC" type="text" class="form-control" id="inputNamecatC" placeholder="Nombre Categoria">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputDesCat" class="col-md-4 col-form-label">Descripción</label>
            <div class="col-md-8">
                <textarea name="descategC" class="form-control" id="inputDesCatC" rows="3"></textarea>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button id="editacateg" type="button" class="btn btn-warning-secondary"><i class="fas fa-edit"></i> Editar</button>
        <button type="button" class="btn btn-close-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
      </div>
    </div>
  </div>
</div>