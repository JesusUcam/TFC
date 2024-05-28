<?php

class Citas_modelo {

    private $db;
    private $datos;
    private $datosServicios;

    public function __construct()
    {
        require_once ("modelo/conectar.php");
        $this->db = Conectar::conexion();
        $this->datos = array();
    }

    public function get_servicios()
    {
        $sql = "SELECT nombre, duracion, precio FROM servicios";
        $consulta = $this->db->query($sql);
        while ($registro = $consulta->fetch_assoc()) {
            $this->datosServicios[] = $registro;
        }
        return $this->datosServicios;
    }

    public function get_peluqueros()
    {
        $sql = "SELECT Nombre FROM peluqueros";
        $resultado = $this->db->query($sql);
        $peluqueros = array();
        while ($registro = $resultado->fetch_assoc()) {
            $peluqueros[] = $registro['Nombre'];
        }
        return $peluqueros;
    }

    public function get_centros()
    {
        $sql = "SELECT nombre FROM centros";
        $resultado = $this->db->query($sql);
        $centros = array();
        while ($registro = $resultado->fetch_assoc()) {
            $centros[] = $registro['nombre'];
        }
        return $centros;
    }

    public function get_precio_servicio($nombre_servicio)
    {

        $sql = "SELECT Precio FROM servicios WHERE Nombre = '$nombre_servicio'";
        $resultado = $this->db->query($sql);
        $registro = $resultado->fetch_assoc();
        echo "pita";
        return $registro['Precio'];
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

    public function get_citasCliente($usuario){
        
        console_log($consulta);
        $sql = "SELECT * FROM citas WHERE cliente = $usuario";
        $consulta = $this->db->query($sql);
        console_log($sql);
        console_log($consulta);
        if ($registro = $consulta->fetch_assoc()) {
            return $registro;
        }
        return null;
    }

    public function borrar_citas($id){
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