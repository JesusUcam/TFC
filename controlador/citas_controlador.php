<?php
//session_start();

function home(){
    require_once ("modelo/citas_modelo.php");

    $error = '';
    $datos = new Citas_modelo();

    if (isset($_POST['guardar'])) {
        console_log('Guardando cita');
        $servicio = isset($_POST['servicio']) ? $_POST['servicio'] : '';
        $peluquero = isset($_POST['peluquero']) ? $_POST['peluquero'] : '';
        $centro = isset($_POST['centro']) ? $_POST['centro'] : '';
        $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : '';

        //Conversion a la clave primaria
        $peluquero = $datos->get_peluquero($peluquero);

        if ($datos->insertar_citas($_SESSION['email'], $servicio, $centro, $peluquero, $fecha)) {
            console_log('Cita guardada correctamente');
        } else {
            console_log("error");
        }

    }
  
    // Obtener los datos necesarios para la vista desde el modelo
    $servicios = $datos->get_servicios();
    $peluqueros = $datos->get_peluqueros();
    $centros = $datos->get_centros();
    $citas = $datos->get_citas();

    require_once ("vista/cita_vista.php");
  
}

?>