<?php 


class Centros {
    private $db;
    private $datos;

    public function __conectar(){
        require_once ("modelo/conect.php");
        $this->db = Conectar::conexion();
        $this->datos = array();
    }

    public function get_centros(){
        $sql = "SELECT * FROM centros";
        $resultado = $this->db->query($sql);
        while ($registro = $resultado->fetch_assoc()) {
            $this->datos[] = $registro;
        }
        return $this->datos;
    }



}



?>