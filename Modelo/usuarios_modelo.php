<?php

class Usuarios_modelo
{

    private $db; //conexion con la bbdd
    private $datos; //registros recuperados de la bbdd

    public function __construct()
    {
        require_once ("modelo/conectar.php");
        $this->db = Conectar::conexion();
        $this->datos = array();
    }

    public function get_usuarios() {
        $sql = "SELECT * FROM clientes, peluqueros";
        $consulta = $this->db->query($sql);
        while ($registro = $consulta->fetch_assoc()) {
            $this->datos[] = $registro;
        }
        return $this->datos;
    }

    public function login($usuario, $clave) {

        $login = false;
        $sql = "SELECT * FROM clientes
                WHERE email = '$usuario' AND clave = '$clave'";

        if ($consulta = $this->db->query($sql)) {

            if ($consulta->num_rows > 0) {

                console_log("Se ha logaead un cliente");
                $login = true;
                return ['login' => $login, 'type' => 'cliente'];

            } else {

                $sql = "SELECT * FROM peluqueros
                        WHERE email = '$usuario' AND clave = '$clave'";

                if ($consulta = $this->db->query($sql)) {

                    if ($consulta->num_rows > 0) {
                        console_log("Se ha logaead un peluquero");
                        $login = true;
                        return ['login' => $login, 'type' => 'peluquero'];

                    } else {

                        console_log("NO se ha logaead NADIE");
                        return ['login' => $login, 'type' => null];

                    }
                }
            }

            return $login;

        }
    }

    public function login1($usuario, $clave) {
      
        $login = false;
        $sql = "SELECT * FROM peluqueros p, clientes c
                WHERE (p.email = '$usuario' AND p.clave = '$clave')
                OR (c.email = '$usuario' AND c.clave = '$clave')";
        if ($consulta = $this->db->query($sql)) {
            if ($consulta->num_rows > 0) {
                console_log("Se ha logaead");
                $login = true;
            } else {
                console_log("NO se ha logaead");
            }
        }
        return $login;
    }

    public function get_cliente($usuario) { 
        $sql = "SELECT * FROM clientes WHERE email = '$usuario'";
        $consulta = $this->db->query($sql);
        if ($registro = $consulta->fetch_assoc()) {
            return $registro;
        }
        return null; // Devuelve null si no se encuentra el cliente
    }

    public function get_peluquero($usuario) { 
        $sql = "SELECT * FROM peluquero WHERE email = '$usuario'";
        $consulta = $this->db->query($sql);
        if ($registro = $consulta->fetch_assoc()) {
            return $registro;
        }
        return null; // Devuelve null si no se encuentra el cliente
    }

}
