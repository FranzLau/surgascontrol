jQuery(document).ready(function() {
	$('#agregaprov').click(function() {
		var datos=$('#frmProve').serialize();
		
		$.ajax({
			url: '../../procesos/proveedor/addprov.php',
			type: 'POST',
			dataType: 'json',
			data: datos,
			success:function(){
				
			}
		})
		.done(function(r) {
			if (!r.error) {
				$('#tableProv').load('../componentes/tableprove.php');
				$('#frmProve')[0].reset();
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
	$('#editaprove').click(function() {
		var datos=$('#frmProV').serialize();
		$.ajax({
			url: '../../procesos/proveedor/actualprov.php',
			type: 'POST',
			dataType: 'json',
			data: datos,
		})
		.done(function(r) {
			if (!r.error) {
				$('#tableProv').load('../componentes/tableprove.php');
				alertify.success("Editado con ÉXITO");
			}else{
				alertify.error("Error al editar campos");
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