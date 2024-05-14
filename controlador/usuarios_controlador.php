<?php
session_start();

function home(){

    require_once("modelo/usuarios_modelo.php");

    $error = '';
    $datos = new Usuarios_modelo();
    if (!isset($_SESSION['email'])) {
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $clave = isset($_POST['clave']) ? $_POST['clave'] : '';
        if ($datos->login($email, $clave)) {
            $_SESSION['email'] = $email;
        } else {
            if ($email != '') {
                $error = "Usuario o contraseña no encontrado";
            }
        }
    }
    
    $array_datos = $datos->get_usuarios();
    require_once("vista/inicio_vista.php");

}

function desconectar(){
    session_destroy();
    header("Location: index.php");
}
?>