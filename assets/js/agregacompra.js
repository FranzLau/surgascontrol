jQuery(document).ready(function() {
	$('#generarCompra').click(function() {
		
		vacios = validarFrmVacio('frmComprar');
		if(vacios > 0){
			alertify.error("Completa todos los campos");
			return false;
		}
		var datos = $('#frmComprar').serialize();
		$.ajax({
		url: '../../procesos/compra/addcompdet.php',
		type: 'POST',
		data: datos
		})
		.done(function(r) {
			if(r==1){
				alertify.error('No hay Balones Vacios');
			}else if (r==0) {
				alertify.error('Pocos Balones en Stock');
			}else if(!r.error){
				$('#tableCompra').load('../componentes/tablecompra.php');
				$('#tableBal').load('../componentes/tablebal.php');
				$('#frmComprar')[0].reset();
				alertify.alert("Compraste con Exito.", function(){
				    alertify.success('Tu STOCK aumento');
				});
			}else{
				alertify.error("ERROR al comprar");
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