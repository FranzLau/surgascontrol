function salir() {
    alertify.confirm("Desea salir de SURGAS.",
	  function(){
	  	
	  	window.location = "../../logout.php";
	  },
	  function(){
	    alertify.success('Gracias por quedarte');
	  });    
}