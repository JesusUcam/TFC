<?php
session_start();

function home(){

    require_once("modelo/clientes_modelo.php");

    $error = '';
    $datos = new Clientes_modelo();
    if (!isset($_SESSION['nombre'])) {
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
        $clave = isset($_POST['clave']) ? $_POST['clave'] : '';
        if ($datos->login($nombre, $clave)) {
            $_SESSION['nombre'] = $nombre;
        } else {
            if ($nombre != '') {
                $error = "Usuario o contraseña no encontrado";
            }
        }
    }
    
    $array_datos = $datos->get_datos();
    require_once("vista/inicio_vista.php");

}

function desconectar(){
    session_destroy();
    header("Location: index.php");
}
?>