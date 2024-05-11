<?php 

class Servicios {

    private $db;
    private $datos;

    public function __conectar()
    {
        require_once ("modelo/conect.php");
        $this->db = Conectar::conexion();
        $this->datos = array();
    }

    public function get_servicios(){
        $sql = "SELECT * FROM servicios";
        $resultado = $this->db->query($sql);
        while ($registro = $resultado->fetch_assoc()) {
            $this->datos[] = $registro;
        }
        return $this->datos;
    }


}



?>