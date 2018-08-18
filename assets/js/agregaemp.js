jQuery(document).ready(function() {
	$('#agregaemp').click(function() {
		var datos=$('#frmemp').serialize();
		
		$.ajax({
			url: '../../procesos/empleado/addemp.php',
			type: 'POST',
			dataType: 'json',
			data: datos,
			success:function(){
				
			}
		})
		.done(function(r) {
			if (!r.error) {
				$('#tabEmp').load('../componentes/tableemp.php');
				$('#frmemp')[0].reset();
				alertify.success("Agregado con ÉXITO");
			}else{
				alertify.error("Datos Incorrectos");
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
	$('#editarEmp').click(function() {
		var datos = $('#frmemP').serialize();

		$.ajax({
			url: '../../procesos/empleado/actualemp.php',
			type: 'POST',
			dataType: 'json',
			data: datos,
		})
		.done(function(r) {
			if (!r.error) {
				$('#tabEmp').load('../componentes/tableemp.php');
				alertify.success("Editado con ÉXITO");
			}else{
				alertify.error("Datos Incorrectos");
			}
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	});
	$('#editUser').click(function() {
		var datos = $('#formUser').serialize();

		$.ajax({
			url: '../../procesos/empleado/actualempuser.php',
			type: 'POST',
			dataType: 'json',
			data: datos,
		})
		.done(function(r) {
			if (!r.error) {
				$('#tabEmp').load('../componentes/tableemp.php');
				location.reload();
				alertify.success("Editado con ÉXITO");
			}else{
				alertify.error("Datos Incorrectos");
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