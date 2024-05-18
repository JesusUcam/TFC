<?php

class Citas_modelo
{

    private $db;
    private $datos;

    public function __construct()
    {
        require_once ("modelo/conectar.php");
        $this->db = Conectar::conexion();
        $this->datos = array();
    }

    public function get_centros()
    {
        $sql = "SELECT * FROM centros";
        $resultado = $this->db->query($sql);
        while ($registro = $resultado->fetch_assoc()) {
            $this->datos[] = $registro;
        }
        return $this->datos;
    }

    public function get_barbers()
    {

        $sql = "SELECT * FROM  peluqueros";
        $resultado = $this->db->query($sql);
        while ($registro = $resultado->fetch_assoc()) {
            $this->datos[] = $registro;
        }
        return $this->datos;
    }
    public function get_datos_by_cliente($cliente)
    {

        $sql = "SELECT * FROM  citas WHERE cliente ='$cliente'";
        $resultado = $this->db->query($sql);
        while ($registro = $resultado->fetch_assoc()) {
            $this->datos[] = $registro;
        }
        return $this->datos;
    }

    public function get_citas()
    {
        $sql = "SELECT * FROM citas";
        $resultado = $this->db->query($sql);
        while ($registro = $resultado->fetch_assoc()) {
            $this->datos[] = $registro;
        }
        return $this->datos;
    }

    public function borrar_citas($id)
    {
        $sql = "DELETE FROM citas WHERE id_cita = $id";
        return $this->db->query($sql);
    }

    public function insertar_citas($peluquero, $cliente, $servicio, $centro, $fecha)
    {
        $sql = "INSERT INTO `citas` (`peluquero`, `cliente`, `servicio`, `centro`, `fecha`) VALUES ('$peluquero', '$cliente', '$servicio', '$centro', '$fecha')";
        return $this->db->query($sql);
    }



}


?>