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
   
        <?php
            require_once("vista/header.php");
            console_log("llamada desde servicios.php");
        ?>

    </header>

    <div class="main_Servicios">
    <div class="divServiciosMain">
        <h1 class="Servicios_h1">Forja tu estilo</h1>
        <div class="linea-vertical"></div>
        <p class="Servicios_p">Bienvenido a J.A.BarberShop.<br>donde el estilo clásico se encuentra con la modernidad. <br>Disfruta de un corte impecable, un afeitado perfecto y un ambiente inigualable. ¡Descubre tu mejor versión con nosotros!</p>
    </div>
    
    <div class="serparadorServicios">
    <h2 class="h2_Servicios">Nuestros Servicios</h2>
    </div>

    <div class="ServiciosServicios">
    
       

        <div class="containerServicios">
        <?php
try {
    $conexion = new mysqli("localhost", "root", "", "ja_barbershop");
    if ($conexion->connect_error) {
        throw new Exception("Error al conectar con la base de datos: " . $conexion->connect_error);
    }
} catch (Exception $e) {
    die('Error: ' . $e->getMessage());
}

$sql = "SELECT nombre, descripcion, duracion, precio, imagen FROM servicios";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    while ($registro = $resultado->fetch_assoc()) {
        echo '<div class="cardServicios">';
        echo '<div class="cardInner">';
        echo '<div class="cardFront" style="background-image: url(\'media/' . htmlspecialchars($registro['imagen']) . '\');"></div>';
        echo '<div class="cardBack">';
        echo '<h2 class="h2Servicios">' . htmlspecialchars($registro['nombre']) . '</h2>';
        echo '<p class="pServicios">' . htmlspecialchars($registro['descripcion']) . '</p>';
        echo '<p class="pServicios">Duración: ' . htmlspecialchars($registro['duracion']) . ' minutos</p>';
        echo '<p class="precioServicios">' . htmlspecialchars($registro['precio']) . '€</p>';
        echo '</div>';
        echo '</div>';
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
    <?php require_once("vista/footer.php");?>


    </footer>
  
</body>
</html>