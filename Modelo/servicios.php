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