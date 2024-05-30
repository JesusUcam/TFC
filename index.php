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



        <link rel="stylesheet" href="JS/libreria/weekly-calendar-main/index.css">
        <script type="module" src="JS/libreria/weekly-calendar-main/calendar.js" async defer></script>
        <script type="module" src="JS/libreria/weekly-calendar-main/lookUpDaysHours.js" async defer></script>
        <!-- <script type="module" src="JS\libreria\weekly-calendar-main\index.js" async defer></script> -->

            <!-- 
            DIV PARA EL CALENDARIO SEMANAL
            <div class="calendar-container" id="calendar-container">
                <div class="calendar-header" id="calendar-header">
                    <div class="calendar-title" id="calendar-title"></div>
                    <div class="calendar-actions" id="calendar-actions">
                    <button class="calendar-action-button" id="calendar-action-button-prev">
                        &lt;
                    </button>
                    <button class="calendar-action-button" id="calendar-action-button-today">
                        Today
                    </button>
                    <button class="calendar-action-button" id="calendar-action-button-next">
                        &gt;
                    </button>
                    </div>
                </div>
                <div class="calendar" id="calendar">
                    <div class="calendar-days" id="calendar-days">
                    </div>
                    <div class="calendar-body" id="calendar-body">
                    </div>
                </div>
            </div>
        -->

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
    <script>console.log("llamada desde index.php");</script>
</head>
    
        <?php
    require_once ("controlador/front_controlador.php");
    ?>
   
    <footer>
    <?php

    include ('vista/footer.php');
    ?>
    </footer>
    

</body>

</html>