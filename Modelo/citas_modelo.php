<?php 

class Citas{

    private $db;
    private $datos;

    public function __conectar()
    {
        require_once ("modelo/conect.php");
        $this->db = Conectar::conexion();
        $this->datos = array();
    }


    public function get_citas(){
        $sql = "SELECT * FROM citas";
        $resultado = $this->db->query($sql);
        while ($registro = $resultado->fetch_assoc()) {
            $this->datos[] = $registro;
        }
        return $this->datos;
    }

    public function borrar_citas($id){
        $sql = "DELETE FROM citas WHERE id_cita = $id";
        return $this->db->query($sql);
    }

    public function insertar_citas($id_cita, $peluquero, $cliente, $servicio, $centro, $fecha){

        $sql = "INSERT INTO `citas` (`id_cita`, `peluquero`, `cliente`, `servicio`, `centro`, `fecha`) VALUES
           ('$id_cita', '$peluquero','$cliente', '$servicio','$centro', '$fecha')";
        return $this->db->query($sql);


    }


}


?>