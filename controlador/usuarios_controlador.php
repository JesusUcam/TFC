<?php

console_log("Probando cosas");
// console_log($_POST["accion"]);
if(isset($_POST["accion"])){

    //estamos ante una llamada a ajax
echo '  <form action="" method="post">
<label for="fname">Nombre:</label>
<input type="text" id="fname" name="nombre" value="'.$_POST['nombre'].'" readonly>

<label for="fedad">Edad:</label>
<input type="text" id="ledad" name="edad" value="'.$_POST['edad'].'">

<label for="fcorreo">Correo:</label>
<input type="text" id="fcorreo" name="correo" value="'.$_POST['correo'].'">

<input type="submit" name="modificar" value="Modificar">
</form>
<input type="submit" id="cancelar" name="cancelar" value="Cancelar" onclick=cancelar()>
';
}


function home(){

    require_once("modelo/usuarios_modelo.php");

    $error = '';
    $datos = new Usuarios_modelo();
    if (!isset($_SESSION['email'])) {
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $clave = isset($_POST['clave']) ? $_POST['clave'] : '';

        console_log($email);
        console_log($clave);

        if ($datos->login($email, $clave)) {
            console_log("email encontrado!!!");
            $_SESSION['email'] = $email;
            // PREGUNTAR A PELIGROS SI LE VALE ESTE HEADER LOCATION
            // header("Location: index.php");
        } else {
            console_log("email no encontrado");
            if ($email != '') {
                $error = "Usuario o contraseña no encontrado";
            }
        }
    }
    
    $array_datos = $datos->get_usuarios();
    require_once("vista/inicio_vista.php");

}

function editar_perfil() {
    require_once("modelo/usuarios_modelo.php");

    $email = $_SESSION['email'];
    $datos = new Usuarios_modelo();

    $cliente_datos = $datos->get_cliente($email);
    require_once("vista/perfil_vista.php");
    
}

function clienteCitas() {

    require_once("modelo/usuarios_modelo.php");
    require_once("modelo/citas_modelo.php");

    $email = $_SESSION['email'];
    $datosCli = new Usuarios_modelo();
    $datosCit = new Citas_modelo();

    $cliente_datos = $datosCli->get_cliente($email);
    $cita_datos = $datosCit->get_citasCliente($email);

    require_once("vista/citasCliente_vista.php");
}

function desconectar(){
    session_destroy();
    // header("Location: index.php");
}
?>