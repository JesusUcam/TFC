<link rel="stylesheet" href="CSS/header.css">
<script src="JS/validacion.js" defer></script>
<?php
session_start();
if (isset($_SESSION['email'])) {
    if (($_SESSION['user_type']) == 'peluquero') {
        ?>

<header>
    <div class="navbar">
        <div class="logo"><a href="index.php">J.A Barber Shop</a></div>
        <ul class="links">
            <li><a href="tienda.php">Tienda</a></li>
            <li><a href="nosostros.php">Sobre nosotros</a></li>
            <li><a href="servicios.php">Servicios</a></li>
            <li><a href="contacto.php">Contacto</a></li>
        </ul>
        <a href="index.php?controlador=citas&action=barbers" class="action_btn">Mis Citas</a>
        <a href="index.php?controlador=usuarios&action=desconectar" class="cs_btn">Cerrar sesión</a>

        <div class="toggle_btn">
            <i class="fa-solid fa-bars"></i>
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
                <a href="" class="cs_btn">Mi perfil</a>
            </div>
        </li>
        <a href="index.php?controlador=citas&action=barbers" class="action_btn">Mis Citas</a>
        <a href="index.php?controlador=usuarios&action=desconectar" class="cs_btn">Cerrar sesión</a>
    </div>
</header>

<?php
    } else {
        ?>

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
                <a href="" class="cs_btn">Mi perfil</a>
                </div>
            </li>
        </ul>
        <a href="index.php?controlador=citas&action=home" class="action_btn" style="font-size: 1.8rem;">Pedir Cita</a>

        <div class="toggle_btn">
            <i class="fa-solid fa-bars"></i>
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
                <a href="" class="cs_btn">Mi perfil</a>
            </div>
        </li>
    </div>

    <div class="user_config">
        <li><a href="index.php?controlador=citas&action=clienteCitas">Mis Citas</a></li>
        <li><a href="index.php?controlador=usuarios&action=editar_perfil">Editar perfil</a></li>
        <li><a href="index.php?controlador=usuarios&action=desconectar" class="cs_btn">Cerrar sesión</a></li>
    </div>

</header>

<?php
    }
} else {
    ?>

<script>
console.log("NO HAY SESIÓN INICIADA");
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
        <a href="#" class="action_btn" style="font-size: 1.2rem;" onclick="openModal('loginModal')">Iniciar Sesión</a>
        <a href="#" class="action_btn" style="font-size: 1.2rem;" onclick="openModal('registerModal')">Crear Cuenta</a>
        <div class="toggle_btn">
            <i class="fa-solid fa-bars"></i>
        </div>
    </div>

    <!-- Desplegables -->
    <div class="dropdown_menu">
        <li><a href="tienda.php">Tienda</a></li>
        <li><a href="nosostros.php">Sobre nosotros</a></li>
        <li><a href="servicios.php">Servicios</a></li>
        <li><a href="contacto.php">Contacto</a></li>
        <li><a href="#" class="action_btn" style="font-size: 1.5rem;" onclick="openModal('loginModal')">Iniciar
                Sesión</a></li>
        <li><a href="#" class="action_btn" style="font-size: 1.5rem;" onclick="openModal('registerModal')">Crear
                Cuenta</a></li>
    </div>
</header>

<div id="loginModal" class="modal" style="display: none;">
    <div id="contact-form" class="modal-content">
        <span class="close" onclick="closeModal('loginModal')"><i class="fa-solid fa-x"></i></span>

        <form action="index.php" method="post">
            <div>
                <label for="email">
                    <span class="required">Email: </span>
                    <input type="text" id="emailInicio" name="email" value="" placeholder="Su email" required="required"
                        tabindex="1" autofocus="autofocus">
                </label>
            </div>
            <div>
                <label for="clave">
                    <span class="required">Contraseña: </span>
                    <input type="password" id="claveInicio" name="clave" value="" placeholder="Su contraseña"
                        tabindex="2" required="required">
                </label>
            </div>
            <div>
                <button type="button" onclick="validarInicioSesion()">Enviar</button>

            </div>
        </form>
    </div>
</div>

<div id="registerModal" class="modal" style="display: none;">
    <div id="register-form" class="modal-content">
        <span class="close" onclick="closeModal('registerModal')"><i class="fa-solid fa-x"></i></span>

        <form action="index.php?controlador=usuarios&action=insertar_clientes" method="post">
            <div>
                <label for="register-email">
                    <span class="required">Email: </span>
                    <input type="text" id="register-email" name="email" value="" placeholder="Su email"
                        required="required" tabindex="1">
                </label>
            </div>
            <div>
                <label for="register-name">
                    <span class="required">Nombre: </span>
                    <input type="text" id="register-name" name="nombre" value="" placeholder="Su nombre"
                        required="required" tabindex="2">
                </label>
            </div>
            <div>
                <label for="register-surname">
                    <span class="required">Apellidos: </span>
                    <input type="text" id="register-surname" name="apellidos" value="" placeholder="Sus apellidos"
                        required="required" tabindex="3">
                </label>
            </div>
            <div>
                <label for="register-phone">
                    <span class="required">Teléfono: </span>
                    <input type="text" id="register-phone" name="telefono" value="" placeholder="Su teléfono"
                        required="required" tabindex="4">
                </label>
            </div>
            <div>
                <label for="register-password">
                    <span class="required">Contraseña: </span>
                    <input type="password" id="register-password" name="clave" value="" placeholder="Su contraseña"
                        required="required" tabindex="5">
                </label>

            </div>
            <div>
                <input type="submit" name="submit" value="Registrar" onclick="return validarRegistro()">


            </div>
        </form>
    </div>
</div>


<script src="JS/iniciar_sesion.js" defer></script>
<script>
function openModal(modalId) {
    document.getElementById(modalId).style.display = 'block';
}

function closeModal(modalId) {
    document.getElementById(modalId).style.display = 'none';
}
</script>
<?php
}
?>