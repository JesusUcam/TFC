<?php require_once ("header.php"); 
    
    $peluqueros_json = json_encode($peluqueros);
    $servicios_json = json_encode($servicios);
    $centros_json = json_encode($centros);
    $citas_json = json_encode($citas);

    echo "
    <input type='hidden' id='datos_peluqueros' value='$peluqueros_json'>
    <input type='hidden' id='datos_servicios' value='$servicios_json'>
    <input type='hidden' id='datos_centros' value='$centros_json'>
    <input type='hidden' id='datos_citas' value='$citas_json'>
    ";

    ?>
                  
<main class="mainCitaVista">
    <div class="pideCitaDiv">
        <h1>Pide cita online</h1>
        <h2>Servicios</h2>
        <form action="" method="post">

            <h3>¿Qué necesitas?</h3>
            <select name="servicio" id="servicioSeleccionado">
                <?php foreach ($servicios as $servicio): ?>
                <option value="<?php echo $servicio['nombre']; ?>"><?php echo $servicio['nombre']; ?></option>
                <?php endforeach; ?>
            </select>

            <h3 id="precioServicio">Precio del servicio: </h3>

            <br>

            <h3>Selecciona uno de nuestros barberos</h3>
            <select name="peluquero" id="peluqueroSeleccionado">
                <?php foreach ($peluqueros as $peluquero): ?>
                <option value="<?php echo $peluquero; ?>"><?php echo $peluquero; ?></option>
                <?php endforeach; ?>
            </select>

            <h3>Selecciona un centro</h3>
            <select name="centro" id="centroSeleccionado">
                <?php foreach ($centros as $centro): ?>
                <option value="<?php echo $centro; ?>"><?php echo $centro; ?></option>
                <?php endforeach; ?>
            </select>

            <h3>Fecha de tu cita</h3>
            <input type="datetime-local" name="fecha" id="fecha">

            <input type="submit" name="guardar" value="Enviar">

            <div id="listado_citas"></div>
            <script src="JS/pedirCita.js" defer></script>

        </form>

    </div>
</main>
