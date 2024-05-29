<?php

console_log("asdfhjaskdfhjkhkj");
console_log($cliente_datos);

if (isset($cliente_datos)) {
    echo "
    <!-- <main> -->
        <div class='banner'>
            <form action='' method='post'>
                <h1>".$cliente_datos['Email']."</h1>
                <h1>".$cliente_datos['Telefono']."</h1>
                <h1>".$cliente_datos['Nombre']."</h1>
                <h1>".$cliente_datos['Apellidos']."</h1>

                
                <input type='hidden' id='email".$cliente_datos['Email']."' value='" .$cliente_datos['Email']. "'>
                <input type='hidden' id='telefono".$cliente_datos['Email']."' value='".$cliente_datos['Telefono']."'>
                <input type='hidden' id='nombre".$cliente_datos['Email']."' value='" . $cliente_datos['Nombre'] . "'>
                <input type='hidden' id='apellidos".$cliente_datos['Email']."' value='" . $cliente_datos['Apellidos'] . "'>

                "; // CON LA NUEVA BBDD USAR ESTO:
                // <input type='hidden' id='nombre".$cliente_datos['id']."' value='" .$cliente_datos['Email']. "'>
                // <input type='hidden' id='cantidad".$cliente_datos['id']."' value='" . $cliente_datos['cantidad'] . "'>
                // <input type='hidden' id='descripcion".$cliente_datos['id']."' value='" . $cliente_datos['descripcion'] . "'>
                echo "

                <input type='submit' name='modificar' value='Modificar' onclick=modificarProducto(`".$cliente_datos['Email']."`)>

                <h1>CAMBIAR CONTRASEÑA</h1>
            </form>
        </div>
    <!-- </main> -->
    ";
}

?>