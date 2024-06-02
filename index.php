<!-- Landing Page basada en https://www.youtube.com/watch?v=GdrbE-s5DgQ -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome sin descargar -->
    <title>J.A Barber Shop</title>
    <link rel="stylesheet" href="CSS/index.css">
    <link rel="stylesheet" href="CSS/modal.css">
    <link rel="stylesheet" href="CSS/pideCita.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="CSS/contact.css"> -->
    <script src="JS/dropdown_menu.js" defer></script>
</head>

<body>

    <head>
        <?php

        require_once ("vista/header.php");
        ?>

        <script>
        console.log("llamada desde index.php");
        </script>
    </head>
    <main>
        <?php
        require_once ("controlador/front_controlador.php");
        ?>
    </main>
    <footer>
        <?php

        include ('vista/footer.php');
        ?>
    </footer>


</body>

</html>