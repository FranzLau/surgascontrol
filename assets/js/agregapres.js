jQuery(document).ready(function() {
	$('#agregapres').click(function() {
		vacios = validarFrmVacio('frmPres');
		if(vacios > 0){
			alertify.error("Debe llenar todos los campos!");
			return false;
		}

		var datos=$('#frmPres').serialize();
		$.ajax({
			url: '../../procesos/presentacion/addpres.php',
			type: 'POST',
			dataType: 'json',
			data: datos,
			success:function(){
				
			}
		})
		.done(function(r) {
			if (!r.error) {
				$('#tablePres').load('../componentes/tablepres.php');
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
	$('#editaPres').click(function() {
		var datos=$('#frmPreP').serialize();

		$.ajax({
			url: '../../procesos/presentacion/actualpres.php',
			type: 'POST',
			dataType: 'json',
			data: datos,
		})
		.done(function(r) {
			if (!r.error) {
				$('#tablePres').load('../componentes/tablepres.php');
				alertify.success("Actualizado con ÉXITO");
			}else{
				alertify.error("Error al actualizar datos. ");
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