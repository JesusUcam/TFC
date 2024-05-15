<?php
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

?>