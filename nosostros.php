<!DOCTYPE html>
<html lang="en">

<link>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>J.A Barber Shop</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="JS/libreria/weekly-calendar-main/index.css">
<script type="module" src="JS/libreria/weekly-calendar-main/calendar.js" async defer></script>
<script type="module" src="JS/libreria/weekly-calendar-main/lookUpDaysHours.js" async defer></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
</link>
<link rel="stylesheet" href="CSS/index.css">
<script src="JS/dropdown_menu.js" defer></script>
</head>

<body>

    <?php
    require_once ("vista/header.php");
    ?>

    <div class="NosotrosMurcia"></div>

    <div class="nosotros-full-section nosotros-padding-large">
        <div class="nosotros-container nosotros-grid-two-columns nosotros-gap-large">
            <img src="media/fachadaMurcia.jpg" alt="Barber Shop" width="800" height="600"
                class="nosotros-image-responsive nosotros-rounded-lg nosotros-order-last" />
            <div class="nosotros-text-content">
                <h1 class="nosotros-heading-large">Bienvenido a J.A.BARBERSHOP </h1>
                <p class="nosotros-paragraph-medium nosotros-text-gray">
                    Cortes de pelo de primera calidad, hechos a mano. Cada corte es una obra de arte en nuestra silla de
                    barbero.
                    Tu estilo, tu elección, nuestra pasión
                </p>
            </div>
        </div>
    </div>



    <?php
    include ("Modelo/nosotros_modelo.php");
    ?>
    <section class="w-full max-w-2xl mx-auto py-12">
        <div class="space-y-4">
            <h2 class="text-3xl">ENCUENTRANOS</h2>
            <p class="text-gray-500 dark:text-gray-400">
                Visítanos en nuestra oficina central, ubicada en el corazón de la ciudad.
            </p>
            <div class="iframe-container">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3161.0125810553677!2d-0.9912869880164104!3d37.60186292198401!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd6343f5e84c3165%3A0xda1e4ba647ff7405!2sJJ%20BARBERSHOP!5e0!3m2!1ses!2ses!4v1717148372039!5m2!1ses!2ses"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3144.227778749087!2d-1.130115088002872!3d37.99514719931717!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd63831974abea55%3A0xc4759231b7d98a29!2sJJota%20BarberShop%20and%20Beauty%20Murcia!5e0!3m2!1ses!2ses!4v1717150090595!5m2!1ses!2ses"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

    </section>
    <footer>
        <?php require_once ("vista/footer.php"); ?>
    </footer>

</body>

</html>