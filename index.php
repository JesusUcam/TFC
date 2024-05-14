<!-- Landing Page basada en https://www.youtube.com/watch?v=GdrbE-s5DgQ -->
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
    <link rel="stylesheet" href="CSS/index.css">
    <link rel="stylesheet" href="CSS/modal.css">
    <!-- <link rel="stylesheet" href="CSS/contact.css"> -->
    <script src="JS/dropdown_menu.js" defer></script>
</head>

<body>

    <div id="myModal" class="modal" style="display: none;">
        <div id="contact-form" class="modal-content">
            <span class="close"><i class="fa-solid fa-x"></i></span>
            <form action="index.php" method="post">
                <div>
                    <label for="email">
                        <span class="required">Email: </span>
                        <input type="text" id="email" name="email" value="" placeholder="Su email" required="required" tabindex="1" autofocus="autofocus">
                    </label>
                </div>
                <div>
                    <label for="password">
                        <span class="required">Email: </span>
                        <input type="password" id="password" name="password" value="" placeholder="Su contraseña" tabindex="2" required="required">
                    </label>
                </div>
                <div>
                    <button type="submit" id="btn-enviar" name="submit">Enviar</button>
                </div>
            </form>
        </div>
    </div>

    <?php

        require_once("vista/header.php");
        require_once("controlador/front_controlador.php");
        include ('vista/footer.php');

    ?>

</body>

</html>