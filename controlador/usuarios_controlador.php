<?php
// console_log($_POST["accion"]);
if (isset($_POST["accion"])) {

    //estamos ante una llamada a ajax
    echo '  <form action="" method="post">
<label for="fname">Nombre:</label>
<input type="text" id="fname" name="nombre" value="' . $_POST['nombre'] . '" readonly>

<label for="fedad">Edad:</label>
<input type="text" id="ledad" name="edad" value="' . $_POST['edad'] . '">

<label for="fcorreo">Correo:</label>
<input type="text" id="fcorreo" name="correo" value="' . $_POST['correo'] . '">

<input type="submit" name="modificar" value="Modificar">
</form>
<input type="submit" id="cancelar" name="cancelar" value="Cancelar" onclick=cancelar()>
';
}


function home()
{

    require_once ("modelo/usuarios_modelo.php");

    $error = '';
    $datos = new Usuarios_modelo();
    if (!isset($_SESSION['email'])) {
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $clave = isset($_POST['clave']) ? $_POST['clave'] : '';

        console_log($email);
        console_log($clave);

        $login_data = $datos->login($email, $clave);
        if ($login_data['login']) {
            console_log("email encontrado!!!");
            $_SESSION['email'] = $email;
            $_SESSION['user_type'] = $login_data['type'];
            // header("Location: index.php");
        } else {
            console_log("email no encontrado");
            if ($email != '') {
                $error = "Usuario o contraseña no encontrado";
            }
        }

    }

    $array_datos = $datos->get_usuarios();
    require_once ("vista/inicio_vista.php");
}



function insertar_clientes()
{
    require_once ("modelo/usuarios_modelo.php");
    $datos = new Usuarios_modelo();

    $email = $_POST['email'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    $clave = $_POST['clave'];


    if ($datos->insertar_clientes($email, $nombre, $apellidos, $telefono, $clave)) {
        echo "<p style= color:white; font-size:1.5rem;>Registro exitoso</p>";
    } else {
        echo "Error en el registro";
    }
}



function editar_perfil()
{
    require_once ("modelo/usuarios_modelo.php");

    $email = $_SESSION['email'];
    $datos = new Usuarios_modelo();

    $cliente_datos = $datos->get_cliente($email);
    require_once ("vista/perfil_vista.php");

}

function clienteCitas()
{

    require_once ("modelo/usuarios_modelo.php");
    require_once ("modelo/citas_modelo.php");

    $email = $_SESSION['email'];
    $datosCli = new Usuarios_modelo();
    $datosCit = new Citas_modelo();

    $cliente_datos = $datosCli->get_cliente($email);
    $cita_datos = $datosCit->get_citasCliente($email);

    require_once ("vista/citasCliente_vista.php");
}

function barbers()
{

    require_once ("modelo/usuarios_modelo.php");
    require_once ("modelo/citas_modelo.php");
    
    $datos = new Usuarios_modelo();

    $email = $_SESSION['email'];
    $peluquero_citas = $datos->get_citas_usuario($email);
  
    require_once ("vista/barbers_vista.php");

}




function desconectar()
{
    session_destroy();
    // header("Location: index.php");
}
?>