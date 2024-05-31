<?php
$servername = "localhost";
$username = "root";  // Cambia esto si es necesario
$password = "";      // Cambia esto si es necesario
$dbname = "ja_barbershop2";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT email, nombre, foto, descripcion FROM peluqueros";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<div class="nosotros-full-section nosotros-padding-large nosotros-bg-light-gray">
          <h1 class="nosotros-h1-full-section">Conoce a nuestros peluqueros</h1>
          <div class="nosotros-container nosotros-grid-three-columns nosotros-gap-large">';

    while ($row = $result->fetch_assoc()) {
        echo '<div class="nosotros-profile nosotros-text-center">
                <img src="media/' . $row["foto"] . '" alt="' . $row["nombre"] . '" width="200" height="200" class="nosotros-image-circle" />
                <div>
                    <h3 class="nosotros-heading-medium">' . $row["nombre"] . '</h3>
                    <p class="nosotros-text-gray">' . $row["email"] . '</p>
                    <br>
                </div>
                <p class="nosotros-paragraph-small nosotros-text-gray">
                    ' . $row["descripcion"] . '
                </p>
              </div>';
    }
    echo '  </div>
          </div>';
} else {
    echo "0 results";
}

$conn->close();
?>