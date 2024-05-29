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
        <?php
            require_once("vista/header.php");
        ?>

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