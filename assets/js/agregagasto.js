jQuery(document).ready(function() {
	$('#agregaGasto').click(function() {
		vacios = validarFrmVacio('frmGastar');
		if(vacios > 0){
			alertify.error("Debe llenar todos los campos!");
			return false;
		}

		var datos=$('#frmGastar').serialize();

		$.ajax({
			url: '../../procesos/gasto/addgastar.php',
			type: 'POST',
			dataType: 'json',
			data: datos,
			success:function(){
				
			}
		})
		.done(function(r) {
			if (!r.error) {
				$('#tableGasto').load('../componentes/tablegasto.php');
				alertify.success("Agregado con ÉXITO");
			}else{
				alertify.error("Error al Registrar");
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
	$('#btnEditGto').click(function() {
		var datos = $('#frmGasto').serialize();

		$.ajax({
			url: '../../procesos/gasto/actualgasto.php',
			type: 'POST',
			dataType: 'json',
			data: datos,
		})
		.done(function(r) {
			if (!r.error) {
				$('#tableGasto').load('../componentes/tablegasto.php');
				alertify.success("Agregado con ÉXITO");
			}else{
				alertify.error("Error al Registrar");
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