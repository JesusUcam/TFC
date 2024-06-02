
<main class="mainIndex">
    <div class="banner">
    
    <?php

    if ($peluquero_citas==null) {
        console_log("No tienes ninguna cita");
    } else {
        $ahora = date("Y-m-d H:i:s");
        // console_log($peluquero_citas);
        // console_log($ahora);
        
        foreach ($peluquero_citas as $key => $cita) {

            // console_log($key);
            $fecha_cita = $cita['fecha'];

            if ($fecha_cita>$ahora) {
                
                echo "<h1>$fecha_cita</h1>";

            } else {
                console_log("Antes");
                console_log($fecha_cita);
            }

            echo "<form action='' method='post'>
                <input type='hidden' name='id' value='" . $cita['id'] . "'>
                <input type='submit' name='borrar' value='Borrar'>
                </form>";
            echo "
            <input type='hidden' id='id".$cita['id']."' value='" . $cita['id'] . "'>
            <input type='hidden' id='cliente".$cita['id']."' value='" . $cita['cliente'] . "'>
            <input type='hidden' id='servicio".$cita['id']."' value='" . $cita['servicio'] . "'>
            <input type='hidden' id='centro".$cita['id']."' value='" . $cita['centro'] . "'>
            <input type='hidden' id='peluquero".$cita['id']."' value='" . $cita['peluquero'] . "'>
            <input type='hidden' id='fecha".$cita['id']."' value='" . $cita['fecha'] . "'>
            <input type='submit' name='modificar' value='Modificar' onclick=modificarCita(`".$cita['id']."`)>";
            

        }

    }

    ?>

        <div id="contenido"></div>

    </div>
</main>