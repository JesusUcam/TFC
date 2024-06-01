<?php
require_once ("header.php");
// QUITAR QUE ESTO DA ERROR, PERO YA LO TENEMOS


console_log("llamada desde inicio_vista.php");
// console_log($array_datos);
?>

<main class="index-main">
    <section class="index-banner">
        <div class="banner-content">
            <h1>Welcome to J.A Barber Shop</h1>
            <p>Your ultimate destination for grooming and styling.</p>
            <a href="#services" class="action_btn">Explore Services</a>
        </div>
    </section>

    <section id="services" class="index-services">
        <div class="services-container">
            <h2>Our Services</h2>
            <div class="services-grid">
                <div class="service-card">
                    <i class="fas fa-cut"></i>
                    <h3>Corte de pelo</h3>
                    <p>Experimenta cortes precisos de nuestros hábiles barberos.</p>
                </div>
                <div class="service-card">
                    <i class="fa-solid fa-chess-king"></i>
                    <h3>Arreglo de barba</h3>
                    <p>Obtén esa forma perfecta de barba con nuestro servicio de recorte experto.</p>
                </div>
                <div class="service-card">
                    <i class="fas fa-hand-rock"></i>
                    <h3>Afeitado</h3>
                    <p>Disfruta de un afeitado suave y refrescante utilizando productos premium.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="index-appointment">
        <div class="appointment-container">
            <a href="contacto.php" class="indexcs_btn">Contactanos</a>
        </div>
    </section>
</main>


<footer>
    <?php

    require_once ("footer.php");

    ?>
</footer>
</body>

</html>