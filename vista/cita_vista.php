<head>

    <link rel="stylesheet" href="CSS/pideCita.css">

</head>

<body>
    <?php
    require_once ("header.php");
    ?>
    <main>
        <h1>Pide cita online</h1>
        <h2>Servicios</h2>
        <form action="" method="post">

            <h3>¿Que necesitas?</h3>
            <select name="servicio" id="">
                <option value="Afeitado Clasico">Afeitado clásico con navaja de barbero y toallas calientes.</option>
                <option value="Corte de Cabello y Barba">Corte de cabello combinado con arreglo de barba.</option>
            </select>

            <h3>Selecciona uno de nuestros barberos</h3>
            <select name="peluquero">
                <option value="peluquero1@example.com">Antonio</option>
                <option value="peluquero2@example.com">María</option>


            </select>

            <select name="centro" id="">
                <option value="BarberShop_ElRaal">Cartagena</option>
                <option value="BarberShop_VistaAlegre">Murcia</option>
            </select>

            <h3>Fecha de tu cita</h3>
            <input type="date" name="fecha" id="fecha">

            <input type="submit" name="guardar" value="Enviar">

        </form>
    </main>

    <footer>
        <?php include 'footer.php'; ?>
    </footer>