<?php 
  session_start();
  require '../../config/conexion.php';
  if (isset($_SESSION['loggedIN'])) {
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include('head.php'); ?>
</head>
<body style="background: #F2F4F4">
	<?php include('../../modaledit/modaleditpres.php'); ?>
	<?php include('../../modaledit/modaleditcat.php'); ?>
	<?php include('../../modaledit/modaleditfier.php'); ?>
	<?php include('../../modaledit/modaledittgasto.php'); ?>
	<?php include('navbar.php'); ?>

	<div class="container">

    <div class="row mt-5">
      <div class="col-sm-12 d-flex">
        <h4 class="m-auto">PANEL DE MANTENIMIENTO</h4>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-sm-12">
        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Categoria</a>
            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Presentacion</a>
            <a class="nav-item nav-link" id="nav-gasto-tab" data-toggle="tab" href="#nav-gasto" role="tab" aria-controls="nav-contact" aria-selected="false">Tipo de Gasto</a>
          </div>
        </nav>
        <div class="card border-top-0">
          <div class="card-body">
            <div class="tab-content" id="nav-tabContent">
              
              <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="row">
                  <div class="col-sm-4">
                    <form action="" id="frmcateg">
                      
                      <div class="form-group">
                        <label for="inputNamecat" class="col-form-label">Pesos :</label>
                        <input name="nomcateg" type="text" class="form-control" id="inputNamecat" placeholder="Nombre">
                      </div>
                      <div class="form-group">
                        <label for="inputDesCat" class="col-form-label">Descripción</label>
                        
                        <textarea class="form-control" name="descateg" id="inputDesCat" rows="2"></textarea>
                      </div>
                    
                    </form>
                     <button id="agregacateg" type="button" class="btn btn-team-surgas m-auto"><i class="fas fa-save"></i> Guardar</button>
                  </div>
                  <div class="col-sm-8">
                    <div id="tableCateg"></div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                <div class="row">
                  <div class="col-sm-4">
                    <form action="" id="frmPres">
                    
                      <div class="form-group">
                        <label for="inputNamepre" class="col-form-label">Marca :</label>
                        <input name="nompres" type="text" class="form-control" id="inputNamepre" placeholder="Marca">
                      </div>
                      <div class="form-group">
                        <label for="inputDespre" class="col-form-label">Descripción :</label>
                        <textarea name="descpres" class="form-control" id="inputDespre" rows="3"></textarea>
                        
                      </div>
                    
                  </form>
                  <button id="agregapres" type="button" class="btn btn-team-surgas m-auto"><i class="fas fa-save"></i> Guardar</button>
                  </div>
                  <div class="col-sm-8">
                    <div id="tablePres"></div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="nav-gasto" role="tabpanel" aria-labelledby="nav-gasto-tab">
                <div class="row">
                  <div class="col-sm-4">
                    <form action="" id="frmtga">
                    
                      <div class="form-group">
                        <label for="inputNamecat" class="col-form-label">Nombre :</label>
                        <input name="nomtga" type="text" class="form-control" id="inputNamecat" placeholder="Tipo de Gasto">
                      </div>
                      <div class="form-group">
                        <label for="inputDesCat" class="col-form-label">Descripción :</label>
                        <textarea name="desctga" class="form-control" id="inputDesCat" rows="3"></textarea>
                        
                      </div>
                   
                  </form>
                  <button id="agregatga" type="button" class="btn btn-team-surgas m-auto"><i class="fas fa-save"></i> Guardar</button>
                  </div>
                  <div class="col-sm-8">
                    <div id="tabletg"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--********************************************************************************************************-->
		
	</div>

	<?php include('scripts.php'); ?>
	<script type="text/javascript">
      $(document).ready(function() {
        $('#tablePres').load('../componentes/tablepres.php');
        $('#tableCateg').load('../componentes/tablecate.php');
        $('#tableFierro').load('../componentes/tablefierro.php');
        $('#tabletg').load('../componentes/tabletipogasto.php');
      });
  </script>
  <script type="text/javascript">
    function obtenDatosPresentacion(idpres) {
      $.ajax({
        url: '../../procesos/presentacion/editpres.php',
        type: 'POST',
        data: "idpres=" + idpres,
        success:function(r) {
          var datos= $.parseJSON(r);
          $('#idpreP').val(datos['idpresphp']);
          $('#inputNamepreP').val(datos['nompresphp']);
          $('#inputDespreP').val(datos['despresphp']);
        }
      })
    }
    function eliminarPresentacion(idpres){
      alertify.confirm("¿Seguro de BORRAR esta presentación?.",
          function(){
             $.ajax({
              url: '../../procesos/presentacion/deletepres.php',
              type: 'POST',
              data: "idpres=" + idpres,
              success:function(r){
               if (r==1) {
                $('#tablePres').load('../componentes/tablepres.php');
                alertify.success("Eliminaste con EXITO");
               }else{
                alertify.error("No se pudo Eliminar");
               }
              }
            })
          },
          function(){
            alertify.warning('Estuviste a punto de Eliminar');
          });
    }
  </script>  
  <script type="text/javascript">
      function obtenDatosCategoria(idcat){
        $.ajax({
          url: '../../procesos/categoria/editcat.php',
          type: 'POST',
          data: "idcat=" + idcat,
          success:function(r){
            var datos = $.parseJSON(r);
            $('#idcatC').val(datos['idcatphp']);
            $('#inputNamecatC').val(datos['nomcatphp']);
            $('#inputDesCatC').val(datos['descatphp']);
          }
        })
      }
      function eliminarCategoria(idcat){
        alertify.confirm("¿Desea BORRAR esta categoria?.",
          function(){
             $.ajax({
              url: '../../procesos/categoria/deletecat.php',
              type: 'POST',
              data: "idcat=" + idcat,
              success:function(r){
               if (r==1) {
                $('#tableCateg').load('../componentes/tablecate.php');
                alertify.success("Eliminaste con EXITO");
               }else{
                alertify.error("No se pudo Eliminar este producto");
               }
              }
            })
          },
          function(){
            alertify.warning('Estuviste a punto de Eliminar');
          });
      }
    </script>  
    <script type="text/javascript">
    function obtenDatosFierro(idfier){
        $.ajax({
          url: '../../procesos/editfier.php',
          type: 'POST',
          data: "idfier=" + idfier,
          success:function(r){
            var datos = $.parseJSON(r);
            $('#idfierroF').val(datos['idfierrophp']);
            $('#inputNameFi').val(datos['nomfierrophp']);
            $('#inputCgas').val(datos['congasphp']);
            $('#inputSgas').val(datos['singasphp']);
          }
        })
     }
     function eliminarFierro(idfier){
     	alertify.confirm("¿Desea BORRAR este precio?.",
          function(){
             $.ajax({
              url: '../../procesos/deletefier.php',
              type: 'POST',
              data: "idfier=" + idfier,
              success:function(r){
               if (r==1) {
                $('#tableFierro').load('../componentes/tablefierro.php');
                alertify.success("Eliminaste con EXITO");
               }else{
                alertify.error("No se pudo Eliminar");
               }
              }
            })
          },
          function(){
            alertify.warning('Estuviste a punto de Eliminar');
          });
     }
    </script>
    <script>
    	function obtenTipoGasto(idtga){
    		$.ajax({
    			url: '../../procesos/gasto/edittgas.php',
    			type: 'POST',
    			data: "idtga=" + idtga,
    			success:function(r){
    				var datos = $.parseJSON(r);
    				$('#idTga').val(datos['idtgphp']);
    				$('#inputNametcg').val(datos['nomtgphp']);
    				$('#inputDestga').val(datos['destgphp']);
    			}
    		})
    	}
    	function eliminarTipoGasto(idtga){
    	alertify.confirm("¿Seguro de BORRAR esto?.",
          function(){
             $.ajax({
              url: '../../procesos/gasto/deletetga.php',
              type: 'POST',
              data: "idtga=" + idtga,
              success:function(r){
               if (r==1) {
                $('#tabletg').load('../componentes/tabletipogasto.php');
                alertify.success("Eliminaste con EXITO");
               }else{
                alertify.error("No se pudo Eliminar");
               }
              }
            })
          },
          function(){
            alertify.warning('Estuviste a punto de Eliminar');
          });
    	}
    </script>
</body>
</html>
<?php 
  }else{
    header('Location: ../../');
  }
?>