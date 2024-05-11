<?php
session_start();

function home(){

    //require_once("modelo/inicio_modelo.php"); //Inicio modelo no existe/no es necesario

    require_once("vista/inicio_vista.php");

    
}

function desconectar()
{
    session_destroy();
    header("Location: index.php");
}
?>