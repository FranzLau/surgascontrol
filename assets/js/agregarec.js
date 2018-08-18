jQuery(document).ready(function() {
	$('#registroRec').click(function() {
		vacios = validarFrmVacio('frmRec');
		if(vacios > 0){
			alertify.error("Debe llenar todos los campos!");
			return false;
		}
		var datos=$('#frmRec').serialize();
		$.ajax({
			url: '../../procesos/repartidor/addrec.php',
			type: 'POST',
			dataType: 'json',
			data: datos,
		})
		.done(function(r) {
			if(r==0){
				alertify.error("No coincide con su cantidad")
			}else if (!r.error) {
				alertify.success("Agregado, puedes Continuar !");
				$('#tabRecarga').load('../componentes/tablerecarga.php');
				$('#cargachofer').load('../componentes/tablechofer.php');
				$('#frmRec')[0].reset();
			}else{
				alertify.error("Error al registrar !");
			}
		});
		return false;
	});
});