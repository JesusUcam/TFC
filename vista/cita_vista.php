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
            <div>
                <h3>¿Qué necesitas?</h3>
                <select name="servicio" id="servicioSeleccionado">
                    <?php foreach ($servicios as $servicio): ?>
                    <option value="<?php echo $servicio['nombre']; ?>"><?php echo $servicio['nombre']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <!-- <h3 id="precioServicio">Precio del servicio: </h3> -->
            <div>
                <h3>Selecciona un centro</h3>
                <select name="centro" id="centroSeleccionado">
                    <?php foreach ($centros as $centro): ?>
                    <option value="<?php echo $centro; ?>"><?php echo $centro; ?></option>
                    <?php endforeach; ?>
                </select>
            </div st>
            <div id="div_selec_peluqueros">
                <h3>Selecciona uno de nuestros barberos</h3>
                <select name="peluquero" id="peluqueroSeleccionado">
                    <!-- <?php foreach ($peluqueros as $peluquero): ?>
                    <option value="<?php echo $peluquero['nombre']; ?>"><?php echo $peluquero['nombre']; ?></option>
                    <?php endforeach; ?> -->
                </select>
            </div>
            <div>

                <button type="button" id="comprobar_citas">Comprobar citas</button>
                <button type="button" id="comprobar_citas_anterior" style="display: none">Semana anterior</button>
                <button type="button" id="comprobar_citas_siguiente" style="display: none">Semana siguiente</button>

            </div>

            <br>

            <input type="submit" name="guardar" value="Enviar" id="enviar_formulario_citas">

            <div id="listado_citas"></div>
            <script src="JS/pedirCita.js" defer></script>

        </form>

    </div>
</main>
