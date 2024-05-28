<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>J.A Barber Shop</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="CSS/styles.css">
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
    <div class="main_Nosotros">
    <div class="divNosotrosMain">

    <div class="divNosotrosCentros">
        <div class="tituloNosotros">
            <div class="NosotrosMurcia">
                <h2 style="color: white;">Murcia</h2>
            </div>
            <div class="NosotrosCartagena">
                <h2 style="color: white;">Cartagena</h2>
            </div>
        </div>
    </div>
    </div>
    </div>
 

    <footer>
    <?php include 'vista/footer.php';?>
</footer>
</body>
</html>