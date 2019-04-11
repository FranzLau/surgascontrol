jQuery(document).ready(function() {
	$('#agregaliquido').click(function() {
		vacios = validarFrmVacio('formliquida');
		if(vacios > 0){
			alertify.error("Debe llenar todos los campos!");
			return false;
		}

		var datos=$('#formliquida').serialize();
		$.ajax({
			url: '../../procesos/liquidar/addliqui.php',
			type: 'POST',
			dataType: 'json',
			data: datos,
			success:function(){
				
			}
		})
		.done(function(r) {
			if(!r.error){
				$('#tableLiquido').load("../componentes/tableliquidos.php");
				$('#formliquida')[0].reset();
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
	
});