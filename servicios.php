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
    <header>
        <div class="navbar">
            <div class="logo"><a href="index.php">J.A Barber Shop</a></div>
            <ul class="links">
                <li><a href="tienda.php">Tienda</a></li>
                <li><a href="nosostros.php">Sobre nosotros</a></li>
                <li><a href="servicios.php">Servicios</a></li>
                <li><a href="contacto.php">Contacto</a></li>
            </ul>
            <a href="#" class="action_btn">Iniciar Sesión</a>
            <div class="toggle_btn">
                <i class="fa-solid fa-bars"></i>
            </div>
        </div>

        <div class="dropdown_menu">
            <li><a href="tienda.php">Tienda</a></li>
            <li><a href="nosostros.php">Sobre nosotros</a></li>
            <li><a href="servicios.php">Servicios</a></li>
            <li><a href="contacto.php">Contacto</a></li>
            <li><a href="#" class="action_btn">Iniciar Sesión</a></li>
        </div>

    </header>
    <div class="main_Servicios">
    <div class="divServiciosMain">
        <h1 class="Servicios_h1">Forja tu estilo</h1>
        <div class="linea-vertical"></div>
        <p class="Servicios_p">Bienvenido a J.A.BarberShop.<br>donde el estilo clásico se encuentra con la modernidad. <br>Disfruta de un corte impecable, un afeitado perfecto y un ambiente inigualable. ¡Descubre tu mejor versión con nosotros!</p>
    </div>
    
    <div class="serparadorServicios">
    
    </div>

    <div class="ServiciosServicios">
    <h2 class="h2_Servicios">Nuestros Servicios</h2>
       

        <div class="containerServicios">
            <?php
                // Conectar a la base de datos
                try {
                    $conexion = new mysqli("localhost", "root", "", "ja_barbershop");
                    if ($conexion->connect_error) {
                        throw new Exception("Error al conectar con la base de datos: " . $conexion->connect_error);
                    }
                } catch (Exception $e) {
                    die('Error: ' . $e->getMessage());
                }

                // Consultar la base de datos
                $sql = "SELECT nombre, descripcion, duracion, precio FROM servicios";
                $resultado = $conexion->query($sql);

                // Comprobar si hay resultados
                if ($resultado->num_rows > 0) {
                    // Recorrer los resultados y generar las cards
                    while ($registro = $resultado->fetch_assoc()) {
                        echo '<div class="cardServicios">';
                        echo '<h2 class="h2Servicios">' . htmlspecialchars($registro['nombre']) . '</h2>';
                        echo '<p class="pServicios">' . htmlspecialchars($registro['descripcion']) . '</p>';
                        echo '<pclass="pServicios">Duración: ' . htmlspecialchars($registro['duracion']) . ' minutos</p>';
                        echo '<p class="precioServicios">' . htmlspecialchars($registro['precio']) . '€</p>';
                        echo '</div>';
                    }
                } else {
                    echo "No se encontraron resultados.";
                }

                $conexion->close();
                ?>
            </div>
            <a href="Contacto.php" class="botonServicios"> No dudes en contactarnos</a>
        </div>
       
        </div>


        

    </div>

    <footer>
    <?php include 'vista/footer.php';?>
</footer>
</body>
</html>