<link rel="stylesheet" href="CSS/header.css">
<script>
    console.log("---HEADER---");
</script>
<?php
session_start();
if (isset($_SESSION['email'])) {
    ?>

<script>
console.log("SESION INICIADA");
</script>

<header>
    <div class="navbar">
        <div class="logo"><a href="index.php">J.A Barber Shop</a></div>
        <ul class="links">
            <li><a href="tienda.php">Tienda</a></li>
            <li><a href="nosostros.php">Sobre nosotros</a></li>
            <li><a href="servicios.php">Servicios</a></li>
            <li><a href="contacto.php">Contacto</a></li>
            <li>
                <div class="foto_perfil">
                    <img src="media/user_image.png" alt="foto de perfil de usuarios por defecto">
                </div>
            </li>
        </ul>
        <a href="index.php?controlador=citas&action=home" class="action_btn">Pedir Cita</a>

        <div class="toggle_btn">
            <i class="fa-solid fa-bars"></i>
            <!--<button id="btn_iniciar_sesion" class="action_btn">Iniciar Sesión</button>-->
        </div>
    </div>

    <!-- Desplegables -->
    <div class="dropdown_menu">
        <li><a href="tienda.php">Tienda</a></li>
        <li><a href="nosostros.php">Sobre nosotros</a></li>
        <li><a href="servicios.php">Servicios</a></li>
        <li><a href="contacto.php">Contacto</a></li>
        <li>
            <div class="foto_perfil">
                <i class="fa-solid fa-user"></i>
            </div>
        </li>
    </div>
  
    <div class="user_config">
        <li><a href="index.php?controlador=usuarios&action=clienteCitas">Mis Citas</a></li>
        <li><a href="index.php?controlador=usuarios&action=editar_perfil">Editar perfil</a></li>
        <li><a href="index.php?controlador=usuarios&action=desconectar" class="cs_btn">Cerrar sesion</a></li>
    </div>
    
</header>

<?php
    } else {
?>

<script>
console.log("NO HAY SESION INICIADA");
</script>


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
            <!--<button id="btn_iniciar_sesion" class="action_btn">Iniciar Sesión</button>-->
        </div>
    </div>

    <!-- Desplegables -->
    <div class="dropdown_menu">
        <li><a href="tienda.php">Tienda</a></li>
        <li><a href="nosostros.php">Sobre nosotros</a></li>
        <li><a href="servicios.php">Servicios</a></li>
        <li><a href="contacto.php">Contacto</a></li>
        <li><a href="#" class="action_btn">Iniciar Sesión</a></li>
    </div>

</header>

<div id="myModal" class="modal" style="display: none;">
    <div id="contact-form" class="modal-content">
        <span class="close"><i class="fa-solid fa-x"></i></span>

        <form action="index.php" method="post">
            <div>
                <label for="email">
                    <span class="required">Email: </span>
                    <input type="text" id="email" name="email" value="" placeholder="Su email" required="required"
                        tabindex="1" autofocus="autofocus">
                </label>
            </div>
            <div>
                <label for="clave">
                    <span class="required">Email: </span>
                    <input type="password" id="clave" name="clave" value="" placeholder="Su contraseña" tabindex="2"
                        required="required">
                </label>
            </div>
            <div>
                <button type="submit" id="btn-enviar" name="submit">Enviar</button>
            </div>
        </form>

    </div>
</div>
<script src="JS/iniciar_sesion.js" defer></script>
<?php
}
?>