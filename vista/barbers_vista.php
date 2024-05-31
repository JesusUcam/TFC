
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
                console_log("Despues");
                console_log($fecha_cita);
                echo "<h1>$fecha_cita</h1>";
            } else {
                console_log("Antes");
                console_log($fecha_cita);
            }
        }

    }

    ?>

    </div>
</main>