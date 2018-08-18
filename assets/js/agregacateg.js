jQuery(document).ready(function() {
	$('#agregacateg').click(function() {
		vacios = validarFrmVacio('frmcateg');
		if(vacios > 0){
			alertify.error("Debe llenar todos los campos!");
			return false;
		}

		var datos=$('#frmcateg').serialize();
		
		$.ajax({
			url: '../../procesos/categoria/addcateg.php',
			type: 'POST',
			dataType: 'json',
			data: datos,
			success:function(){
				
			}
		})
		.done(function(r) {
			if (!r.error) {
				$('#tableCateg').load('../componentes/tablecate.php');
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
	$('#editacateg').click(function(){
		var datos=$('#frmCate').serialize();
		$.ajax({
			url: '../../procesos/categoria/actualcateg.php',
			type: 'POST',
			dataType: 'json',
			data: datos,
		})
		.done(function(r) {
			if (!r.error) {
				$('#tableCateg').load('../componentes/tablecate.php');
				alertify.success("Editado con ÉXITO");
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
		return false;
	})
});