<?php
require_once 'config/db.php';

class Solicitudes
{
    private $db;
    private $solicitudes;

    public function __construct()
    {
        $this->db = Database::connect();
        $this->solicitudes = array();
    }

    public function get_solicitudes()
    {
        $sql = "SELECT * FROM solicitudes";
        $resultado = $this->db->query($sql);
        while ($row = $resultado->fetch_assoc()) {
            $this->solicitudes[] = $row;
        }
        return $this->solicitudes;
    }
    public function insertar($fecha_solicitud, $descripcion, $estado, $id_usuario)
    {
        $resultado = $this->db->query("INSERT INTO solicitudes (fecha_solicitud, descripcion, estado, id_usuario) VALUES ('$fecha_solicitud', '$descripcion', '$estado', '$id_usuario')");
    }


    public function modificar($id, $fecha_solicitud, $descripcion, $estado, $id_usuario)
    {
        $resultado = $this->db->query("UPDATE solicitudes SET fecha_solicitud='$fecha_solicitud', descripcion='$descripcion', estado='$estado', id_usuario='$id_usuario' WHERE id='$id'");
    }

    public function eliminar($id)
    {
        $resultado = $this->db->query("DELETE FROM solicitudes WHERE id ='$id'");
    }

    public function get_solicitud($id)
    {
        $sql = "SELECT * FROM solicitudes WHERE id= '$id' LIMIT 1 ";
        $resultado = $this->db->query($sql);
        $row = $resultado->fetch_assoc();
        return $row;
    }
}
