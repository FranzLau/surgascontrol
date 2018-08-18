jQuery(document).ready(function() {
	$('#agregatga').click(function() {
		vacios = validarFrmVacio('frmtga');
		if(vacios > 0){
			alertify.error("Debe llenar todos los campos!");
			return false;
		}

		var datos=$('#frmtga').serialize();
		$.ajax({
			url: '../../procesos/gasto/addtga.php',
			type: 'POST',
			dataType: 'json',
			data: datos,
			success:function(){
				
			}
		})
		.done(function(r) {
			if (!r.error) {
				$('#tabletg').load('../componentes/tabletipogasto.php');
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
	$('#editarTga').click(function() {
		var datos=$('#frmTga').serialize();

		$.ajax({
			url: '../../procesos/gasto/actualtga.php',
			type: 'POST',
			dataType: 'json',
			data: datos,
		})
		.done(function(r) {
			if (!r.error) {
				$('#tabletg').load('../componentes/tabletipogasto.php');
				alertify.success("Editado con ÉXITO");
			}else{
				alertify.error("Error al Editar campos");
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