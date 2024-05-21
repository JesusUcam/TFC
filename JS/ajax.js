function modificarUsuario(usuario) {
    $('#nuevo').hide();
    $('#contenido').show();
    $.ajax({
        type:'POST',
        data:{accion:"modificar",
            nombre:$("#nombre" + usuario).val(),
                edad: $("#edad" + usuario).val(),
                correo: $("#correo" + usuario).val()
            },
        url: "controlador/datos_controlador.php",
        success: function (response) {
            $("#contenido").html(response);
        },
        error: function (error) {
            console.log(error);
        },
    });
}
function modificarProducto(Producto) {
    $('#nuevo').hide();
    $('#contenido').show();
    $.ajax({
        type:'POST',
        data:{accion:"modificar",
            nombre:$("#nombre" + Producto).val(),
                cantidad: $("#cantidad" + Producto).val(),
                descripcion: $("#descripcion" + Producto).val()
            },
        url: "controlador/productos_controlador.php",
        success: function (response) {
            $("#contenido").html(response);
        },
        error: function (error) {
            console.log(error);
        },
    });
}

function cancelar() {
    $('#nuevo').show();
    $('#contenido').hide();
    
}