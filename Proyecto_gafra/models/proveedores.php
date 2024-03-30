<?php
require_once 'config/db.php';

class Proveedores {
    private $db;
    private $proveedores;
    
    public function __construct() {
        $this->db = Database::connect();
        $this->proveedores = array();
    }
    public function get_proveedores(){
        $sql = "SELECT * FROM proveedores";
        $resultado = $this->db->query($sql);
        while($row = $resultado->fetch_assoc()){
            $this->proveedores[] = $row;
        }   
        return $this->proveedores;
    }
    

    public function insertar($nombre, $direccion, $telefono, $correo){
        $resultado = $this->db->query("INSERT INTO proveedores (nombre, direccion, telefono, correo) VALUES ('$nombre', '$direccion', '$telefono', '$correo')");
    }

    public function modificar($id, $nombre, $direccion, $telefono, $correo){
        $resultado = $this->db->query("UPDATE proveedores SET nombre='$nombre', direccion='$direccion', telefono='$telefono', correo='$correo' WHERE id='$id'");
    }

    public function eliminar($id) {
        $resultado = $this->db->query("DELETE FROM proveedores WHERE id ='$id'");
    }
    public function get_proveedor($id){
        $sql = "SELECT * FROM proveedores WHERE id= '$id' LIMIT 1 ";
        $resultado = $this->db->query($sql);
        $row = $resultado-> fetch_assoc();   
        return $row;
    }
  
}
?>
