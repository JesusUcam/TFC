<?php
//session_start();

function home()
{
    require_once ("modelo/citas_modelo.php");

    $error = '';
    $datos = new Citas_modelo();

    if (isset($_POST['guardar'])) {
        console_log('Guardando cita');  
        $peluquero = isset($_POST['peluquero']) ? $_POST['peluquero'] : '';
        $cliente = "1";
        $servicio = isset($_POST['servicio']) ? $_POST['servicio'] : '';
        $centro = isset($_POST['centro']) ? $_POST['centro'] : '';
        $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : '';

        if ($datos->insertar_citas($peluquero, $cliente, $servicio, $centro, $fecha)) {
            console_log('Cita guardada correctamente');
        }

    }

    require_once("pedirCita.php");
}
/*function desconectar()
{
    session_destroy();
    header("Location: index.php");
}
*/
?>