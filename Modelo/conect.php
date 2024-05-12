<?php 

class Conect {
    public static function conexion(){
        try {
            $conexion = new mysqli("localhost", "root", "", "ja_barbershop");
        } catch (Exception $e ) {
            die ('Error'.$e->getMessage("error al conectar a la base de datos"));
        }
        return $conexion;
    }

}


?>