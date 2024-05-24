<head>
    <link rel="stylesheet" href="CSS/pideCita.css">

</head>

<body>
    <?php require_once ("header.php"); ?>
    <main>
        <h1>Pide cita online</h1>
        <h2>Servicios</h2>
        <form action="" method="post">

            <h3>¿Qué necesitas?</h3>
            <select name="servicio" id="servicioSelect">
                <?php foreach ($servicios as $servicio): ?>
                <option value="<?php echo $servicio; ?>"><?php echo $servicio; ?></option>
                <?php endforeach; ?>
            </select>

            <h3 id="precioServicio">Precio del servicio: </h3>

            <br>

            <h3>Selecciona uno de nuestros barberos</h3>
            <select name="peluquero">
                <?php foreach ($peluqueros as $peluquero): ?>
                <option value="<?php echo $peluquero; ?>"><?php echo $peluquero; ?></option>
                <?php endforeach; ?>
            </select>

            <h3>Selecciona un centro</h3>
            <select name="centro" id="">
                <?php foreach ($centros as $centro): ?>
                <option value="<?php echo $centro; ?>"><?php echo $centro; ?></option>
                <?php endforeach; ?>
            </select>

            <h3>Fecha de tu cita</h3>
            <input type="datetime-local" name="fecha" id="fecha">

            <input type="submit" name="guardar" value="Enviar">

        </form>
    </main>
    <footer>
        <?php include 'footer.php'; ?>
    </footer>


</body>