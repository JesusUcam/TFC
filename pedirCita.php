<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome sin descargar -->
    <title>J.A Barber Shop</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="CSS/styles.css">
    <link rel="stylesheet" href="CSS/pideCita.css">
    <script src="JS/dropdown_menu.js" defer></script>
</head>

<body>
    <?php
    require_once ("vista/header.php");
    ?>
    <main>
        <h1>Pide cita online</h1>
        <h2>Servicios</h2>

        <h3>¿Que necesitas?</h3>
        <select name="servicios" id="">
            <option value="corte">Corte</option>
            <option value="corteyBarba">Corte y barba</option>
            <option value="barba">Barba</option>
            <option value="tinte">Tinte de pelo</option>
            <option value="tinteyCorte">Tinte y corte</option>
            <option value="premium">Especial premium (lavado + tratamiento + corte + barba + estilizado)</option>

        </select>

        <h3>Selecciona uno de nuestros barberos</h3>
            <select name="" id="">
                <option value="jesus">Jesus</option>
                <option value="alex">Alejandro</option>
                <option value="vecario">Vecario</option>

            </select>
        
        <h3>Fecha de tu cita</h3>
        <input type="date" name="fecha" id="fecha">
        

    </main>

    <footer>
        <?php include 'vista/footer.php'; ?>
    </footer>