<?php

console_log("djskhfkjas");

class Clientes_modelo{

    private $db; //conexion con la bbdd
    private $datos; //registros recuperados de la bbdd

    public function __construct(){
        require_once("modelo/conectar.php");
        $this->db = Conectar::conexion();
        $this->datos = array();
    }

    public function get_datos(){
        $sql = "SELECT * FROM clientes";
        $consulta = $this->db->query($sql);
        while ($registro = $consulta->fetch_assoc()) {
            $this->datos[] = $registro;
        }
        return $this->datos;
    }

    public function login($user, $password){
        $login = false;
        $sql = "SELECT * FROM clientes WHERE nombre = '$user' AND clave = '$password'";
        if ($consulta = $this->db->query($sql)) {
            if ($consulta->num_rows > 0) {
                $login = true;
            }
        }
        return $login;
    }
}