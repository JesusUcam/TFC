<?php
//session_start();

if (isset($_POST["accion"])) {

    ?>
    <script>console.log("llamada desde cc")</script>
    <?php

    //estamos ante una llamada a ajax
    echo '<form action="" method="post">
<label for="fid">id:</label>
<input type="text" id="fid" name="id" value="' . $_POST['id'] . '" readonly>

<label for="fcliente">Cliente:</label>
<input type="text" id="lcliente" name="cliente" value="' . $_POST['cliente'] . '">

<label for="fservicio">Servicio:</label>
<input type="text" id="lservicio" name="servicio" value="' . $_POST['servicio'] . '">

<label for="fcentro">Centro:</label>
<input type="text" id="lcentro" name="centro" value="' . $_POST['centro'] . '">

<label for="fpeluquero">Peluquero:</label>
<input type="text" id="lpeluquero" name="peluquero" value="' . $_POST['peluquero'] . '">

<label for="ffecha">Fecha:</label>
<input type="text" id="ffecha" name="fecha" value="' . $_POST['fecha'] . '">

<input type="submit" name="modificar" value="Modificar">
</form>
<input type="submit" id="cancelar" name="cancelar" value="Cancelar" onclick=cancelar()>
';
}

function home(){
    require_once ("modelo/citas_modelo.php");

    $error = '';
    $datos = new Citas_modelo();

    if (isset($_POST['guardar'])) {
        
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

function barbers(){

    require_once("modelo/usuarios_modelo.php");
    require_once("modelo/citas_modelo.php");
    
    $datos_Barber = new Usuarios_modelo();
    $datos_Cita = new Citas_modelo();

    $email = $_SESSION['email'];
    $peluquero_citas = $datos_Barber->get_citas_usuario($email);

    if (isset($_POST['borrar'])){
        $id = isset($_POST['id'])?$_POST['id']: '';
        
        if($datos_Cita->borrar($id)) $error = "Borrado correctamente";
        else $error = "Error al borrar";
        
    } elseif (isset($_POST["modificar"])) {

        $id = isset($_POST['id'])?$_POST['id']: '';
        $cliente=isset($_POST["cliente"])?$_POST["cliente"]:'';
        $servicio=isset($_POST["servicio"])?$_POST["servicio"]:'';
        $centro=isset($_POST["centro"])?$_POST["centro"]:'';
        $peluquero=isset($_POST["peluquero"])?$_POST["peluquero"]:'';
        $fecha=isset($_POST["fecha"])?$_POST["fecha"]:'';

        if ($datos_Cita->modificar($id, $cliente, $servicio, $centro, $peluquero, $fecha)) {
            $error = "Modificado correctamente";
        } else {
            $error = "Error al modificar";
        }
            
    } 
  
    require_once ("vista/barbers_vista.php");

}

?>