$(document).ready(function () {
    $('#btnsaveDate').click(function () {
        var datos=$('#formCaja').serialize();
        $.ajax({
            type: "POST",
            url: "../../procesos/liquidar/addcaja.php",
            data: datos,
            dataType: "json",
            success: function (response) {
            }
        })
        .done(function(r) {
            if (r==0) {
                alertify.error("Ya cerro Caja !");
            }else if(!r.error){
                $('#tabCaja').load('../componentes/tablecaja.php');
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