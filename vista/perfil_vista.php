<?php

console_log("asdfhjaskdfhjkhkj");
console_log($cliente_datos);

if (isset($cliente_datos)) {
    echo "
    <!-- <main> -->
        <div class='banner'>
            <h1>".$cliente_datos['Email']."</h1>
            <h1>".$cliente_datos['Telefono']."</h1>
            <h1>".$cliente_datos['Nombre']."</h1>
            <h1>".$cliente_datos['Apellidos']."</h1>
            <h1>CAMBIAR CONTRASEÑA</h1>
        </div>
    <!-- </main> -->
    ";
}

?>