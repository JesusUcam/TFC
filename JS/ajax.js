function modificarCita(cita) {
    $('#nuevo').hide();
    $('#contenido').show();

    $.ajax({
        type: 'POST',
        data: {
            accion: "modificar",
            id: $("#id" + cita).val(),
            cliente: $("#cliente" + cita).val(),
            servicio: $("#servicio" + cita).val(),
            centro: $("#centro" + cita).val(),
            peluquero: $("#peluquero" + cita).val(),
            fecha: $("#fecha" + cita).val()
        },
        url: "controlador/citas_controlador.php",
        success: function (response) {
            
            $("#contenido").html(response);
            console.log(cita);
        },
        error: function (error) {
            console.log("Error:", error);
        },
    });
}

function cancelar() {
    $('#nuevo').show();
    $('#contenido').hide();
}