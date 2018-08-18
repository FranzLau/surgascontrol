jQuery(document).ready(function() {
	$('#agregacli').click(function() {
		//vacios = validarFrmVacio('frmcli');
		//if(vacios > 0){
			//alertify.error("Debe llenar todos los campos!");
			//return false;
		//}

		var datos=$('#frmcli').serialize();
		$.ajax({
			url: '../../procesos/cliente/addcli.php',
			type: 'POST',
			dataType: 'json',
			data: datos,
			success:function(){
				
			}
		})
		.done(function(r) {
			if (!r.error) {
				$('#tableCli').load('../componentes/tablecli.php');
				$('#frmcli')[0].reset();
				alertify.success("Agregado con ÉXITO");
			}else{
				alertify.error("Error: Ya existe el cliente o datos incorrectos");
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
	$('#btneditcli').click(function() {
		var datos=$('#frmeditC').serialize();
		$.ajax({
			url: '../../procesos/cliente/actualcli.php',
			type: 'POST',
			dataType: 'json',
			data: datos,
			success:function(){
				
			}
		})
		.done(function(r) {
			if (!r.error) {
				$('#tableCli').load('../componentes/tablecli.php');
				alertify.success("Actualizado con ÉXITO");
			}else{
				alertify.error("Error al editar el Campo");
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