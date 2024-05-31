<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>J.A Barber Shop</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="CSS/index.css">
    <script src="JS/dropdown_menu.js" defer></script>
</head>

<body>
    <?php
    require_once ("vista/header.php");

    ?>

    </header>

    <div class="main_Servicios">

        <div class="divServiciosMain">
            <h1 class="Servicios_h1">Forja tu estilo</h1>
            <div class="linea-vertical"></div>
            <p class="Servicios_p">Bienvenido a J.A.BarberShop.<br>donde el estilo clásico se encuentra con la
                modernidad. <br>Disfruta de un corte impecable, un afeitado perfecto y un ambiente inigualable.
                ¡Descubre tu mejor versión con nosotros!</p>
        </div>

        <div class="serparadorServicios">
            <h2 class="h2_Servicios">Nuestros Servicios</h2>
        </div>

        <div class="ServiciosServicios">

            <div class="containerServicios">
                <?php 
               include("Modelo/servicios.php") ?>
            </div>
            <a href="Contacto.php" class="botonServicios">Contáctanos</a>
        </div>

    </div>

    </div>
    <footer>
        <?php require_once ("vista/footer.php"); ?>
    </footer>

</body>

</html>