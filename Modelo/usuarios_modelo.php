<?php

class Usuarios_modelo{

    private $db; //conexion con la bbdd
    private $datos; //registros recuperados de la bbdd

    public function __construct(){
        require_once("modelo/conectar.php");
        $this->db = Conectar::conexion();
        $this->datos = array();
    }

    public function get_usuarios(){
        $sql = "SELECT * FROM clientes, peluqueros";
        $consulta = $this->db->query($sql);
        while ($registro = $consulta->fetch_assoc()) {
            $this->datos[] = $registro;
        }
        return $this->datos;
    }

    public function login($user, $password){
        $login = false;
        $sql = "SELECT * FROM peluqueros p, clientes c
                WHERE (p.email = '$user' AND p.clave = '$password')
                OR (c.email = '$user' AND c.clave = '$password')";
        if ($consulta = $this->db->query($sql)) {
            if ($consulta->num_rows > 0) {
                $login = true;
            }
        }
        return $login;
    }
}