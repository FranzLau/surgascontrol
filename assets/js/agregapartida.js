jQuery(document).ready(function() {
	$('#btnNewPartida').click(function() {
    	vacios = validarFrmVacio('formPartida');
		if(vacios > 0){
			alertify.error("Debe llenar todos los campos!");
			return false;
		}
		var datos = $('#formPartida').serialize();
		$.ajax({
			url: '../../procesos/recarga/addpart.php',
			type: 'POST',
			dataType: 'json',
			data: datos,
			success:function(){
				
			}
		})
		.done(function(r) {
			if (r==0) {
				alertify.error("Chofer en Marcha");
			}else if(!r.error){
				$('#tabRecarga').load('../componentes/tablerecarga.php');
				$('#cargachofer').load('../componentes/tablechofer.php');
				alertify.success("Agregado con ÉXITO");
			}else{
				alertify.error("Error: No se pudo Registrar");
			}
		});
		return false;
    });
});