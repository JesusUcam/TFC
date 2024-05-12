<?php

class users
{

    private $db;
    private $datos;

    public function __conectar()
    {
        require_once ("modelo/conect.php");
        $this->db = Conectar::conexion();
        $this->datos = array();
    }
    // Consultas para la tabla de usuarios (clientes)
    public function get_clientes()
    {

        $sql = "SELECT * FROM  clientes";
        $resultado = $this->db->query($sql);
        while ($registro = $resultado->fetch_assoc()) {
            $this->datos[] = $registro;
        }
        return $this->datos;
    }

    public function borrar_users($correo)
    {

        $sql = "DELETE FROM clientes WHERE Email = $correo";
        return $this->db->query($sql);

    }

    public function insertar_users($email, $telefono, $nombre, $apellidos, $clave, )
    {

        $sql = "INSERT INTO `clientes` (`Email`, `Telefono`, `Nombre`, `Apellidos`,`Clave`,) VALUES
           ('$email', $telefono,'$nombre', '$apellidos','$clave')";
        return $this->db->query($sql);
    }


    // Consultas para la tabla de usuarios (barberos)
    
    public function get_barbers()
    {

        $sql = "SELECT * FROM  peluqueros";
        $resultado = $this->db->query($sql);
        while ($registro = $resultado->fetch_assoc()) {
            $this->datos[] = $registro;
        }
        return $this->datos;
    }

    public function borrar_barbers($email)
    {

        $sql = "DELETE FROM peluqueros WHERE Email = $email";
        return $this->db->query($sql);

    }

    public function insertar_barbers($email, $nif, $nombre, $apellidos, $clave, $telefono)
    {

        $sql = "INSERT INTO `peluqueros` (`Email`,`NIF`, `Nombre`, `Apellidos`,`Clave`, `Autor`, `Telefono`) VALUES
       ('$email', '$nif', '$nombre', '$apellidos','$clave', '$telefono')";
        return $this->db->query($sql);
    }

}
?>