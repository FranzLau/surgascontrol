jQuery(document).ready(function() {
	$('#agregabal').click(function() {
		vacios = validarFrmVacio('frmbal');
		if(vacios > 0){
			alertify.error("Debe llenar todos los campos!");
			return false;
		}

		var datos=$('#frmbal').serialize();
		$.ajax({
			url: '../../procesos/balon/addbal.php',
			type: 'POST',
			dataType: 'json',
			data: datos,
			success:function(){
				
			}
		})
		.done(function(r) {
			if (r==0) {
				alertify.error("El Producto YA EXISTE");
			}else if(!r.error){
				$('#tableBal').load('../componentes/tablebal.php');
				$('#frmbal')[0].reset();
				alertify.success("Agregado con ÉXITO");
			}else{
				alertify.error("ERROR al Registrar");
			}
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		return false;
	});
	$('#btneditbal').click(function() {
		var datos=$('#frmbalE').serialize();
		$.ajax({
			url: '../../procesos/balon/actualbal.php',
			type: 'POST',
			dataType: 'json',
			data: datos,
			success:function(){

			}
		})
		.done(function(r) {
			if (!r.error) {
				$('#tableBal').load('../componentes/tablebal.php');
				alertify.success("Actualizado con ÉXITO");
			}else{
				alertify.error("Error al Editar");
			}
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	});
});