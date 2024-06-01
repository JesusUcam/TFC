<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>J.A Barber Shop</title>
    <link rel="stylesheet" href="JS/libreria/weekly-calendar-main/index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha512-zCH1r2M3QDfWM1oE7GNcRGAX9cVJz7bx9Zp09paR3M6yH4xkf2dQt5ad6jAsldPM0y2AWdN2MeSDD/GhA+PvDw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="CSS/tienda.css">
    <script src="JS/dropdown_menu.js" defer></script>
    <script src="JS/tienda.js" defer></script>
</head>

<body class="bodyTienda">

    <?php
    require_once ("vista/header.php");
    ?>

    <main class="tiendaMain">

        <div class="tituloTienda">
            <h1>DESTACADOS</h1>
        </div>

        <div class="carrousel" style="--object-fit:cover">
            <div class="slides">
                <?php
                // Conexión a la base de datos
                $conexion = new mysqli('localhost', 'root', '', 'ja_barbershop2');

                // Verificar la conexión
                if ($conexion->connect_error) {
                    die("Conexión fallida: " . $conexion->connect_error);
                }

                // Consulta a la base de datos para obtener las imágenes
                $consulta = "SELECT imagen FROM productos WHERE destacado = 'si'";
                $resultado = $conexion->query($consulta);

                if ($resultado->num_rows > 0) {

                    while ($fila = $resultado->fetch_assoc()) {
                        // Mostrar las imágenes obtenidas de la base de datos
                        echo '<img src="media/' . $fila["imagen"] . '" />';

                    }
                } else {
                    echo "No se encontraron resultados.";
                }

                $conexion->close();
                ?>
            </div>
        </div>

        <div class="tituloTienda2">
            <h2>PRODUCTOS</h2>
        </div>

        <div class="productos">
            <?php
            // Conexión a la base de datos
            $conexion = new mysqli('localhost', 'root', '', 'ja_barbershop2');

            // Verificar la conexión
            if ($conexion->connect_error) {
                die("Conexión fallida: " . $conexion->connect_error);
            }

            // Consulta a la base de datos para obtener los productos
            $consulta = "SELECT nombre, descripcion, precio, imagen FROM productos";
            $resultado = $conexion->query($consulta);

            if ($resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    echo '
                    <div class="card">
                        <img src="media/' . $fila["imagen"] . '" alt="' . $fila["nombre"] . '">
                        <div class="card-body">
                            <h5 class="card-title">' . $fila["nombre"] . '</h5>
                            <p class="card-text">' . $fila["descripcion"] . '</p>
                            <p class="card-price">Precio: $' . $fila["precio"] . '</p>
                        </div>
                    </div>';
                }
            } else {
                echo "No se encontraron productos.";
            }

            $conexion->close();
            ?>
        </div>

        <!-- Resto del contenido de la página -->
    </main>
    <footer>
        <?php require_once ("vista/footer.php"); ?>
    </footer>


</body>

</html>