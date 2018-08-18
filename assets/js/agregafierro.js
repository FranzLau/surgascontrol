jQuery(document).ready(function() {
	$('#agregafierro').click(function() {
		vacios = validarFrmVacio('frmfierro');
		if(vacios > 0){
			alertify.error("Debe llenar todos los campos!");
			return false;
		}
		var datos=$('#frmfierro').serialize();
		$.ajax({
			url: '../../procesos/addfierro.php',
			type: 'POST',
			dataType: 'json',
			data: datos,
		})
		.done(function(r) {
			if (!r.error) {
				$('#tableFierro').load('../componentes/tablefierro.php');
				alertify.success("Agregado con ÉXITO");
			}else{
				alertify.error("Error: Ya existe");
			}
		})
		
	});
	$('#editafierro').click(function() {
		var datos=$('#frmFierr').serialize();
		$.ajax({
			url: '../../procesos/actualfier.php',
			type: 'POST',
			dataType: 'json',
			data: datos,
		})
		.done(function(r) {
			if (!r.error) {
				$('#tableFierro').load('../componentes/tablefierro.php');
				alertify.success("Editado con ÉXITO");
			}else{
				alertify.error("Error al Editar");
			}
		})
	});
});