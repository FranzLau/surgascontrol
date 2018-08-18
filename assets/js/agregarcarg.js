jQuery(document).ready(function() {
	$('#agregacargo').click(function() {
		var datos=$('#frmcargo').serialize();
		
		$.ajax({
			url: '../../procesos/cargo/addcarg.php',
			type: 'POST',
			dataType: 'json',
			data: datos,
			success:function(){
				
			}
		})
		.done(function(r) {
			if (!r.error) {
				$('#tableCarg').load('../componentes/tablecargo.php');
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
	$('#editaCargo').click(function() {
		var datos = $('#frmCargO').serialize();
		$.ajax({
			url: '../../procesos/cargo/actualcargo.php',
			type: 'POST',
			dataType: 'json',
			data: datos,
		})
		.done(function(r) {
			if (!r.error) {
				$('#tableCarg').load('../componentes/tablecargo.php');
				alertify.success("Editado con ÉXITO");
			}else{
				alertify.error("Error al editar campo");
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