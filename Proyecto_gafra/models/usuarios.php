<?php
require_once 'config/db.php';
require_once 'utils/password_utils.php';
 // Añadir el archivo de utilidades para el manejo de contraseñas

class Usuarios {
    private $db;
    private $usuarios;
    
    public function __construct() {
        $this->db = Database::connect();
        $this->usuarios = array();
    }

    public function get_usuarios(){
        $sql = "SELECT * FROM usuarios";
        $resultado = $this->db->query($sql);
        while($row = $resultado->fetch_assoc()){
            $this->usuarios[] = $row;
        }   
        return $this->usuarios;
    }

    public function insertar($nombre, $apellido, $correo, $clave_acceso, $telefono, $tipo_usuario){
        // Encriptar la contraseña antes de almacenarla
        $clave_encriptada = PasswordUtils::encriptar($clave_acceso);
        $resultado = $this->db->query("INSERT INTO usuarios (nombre, apellido, correo, clave_acceso, telefono, tipo_usuario) VALUES ('$nombre', '$apellido', '$correo', '$clave_encriptada', '$telefono', '$tipo_usuario')");
    }

    public function modificar($id, $nombre, $apellido, $correo, $clave_acceso, $telefono, $tipo_usuario){
        // No es necesario encriptar la contraseña al modificar un usuario
        $resultado = $this->db->query("UPDATE usuarios SET nombre='$nombre', apellido='$apellido', correo='$correo',clave_acceso='$clave_acceso', telefono='$telefono', tipo_usuario='$tipo_usuario' WHERE id='$id'");
    }

    public function eliminar($id) {
        $resultado = $this->db->query("DELETE FROM usuarios  WHERE id ='$id'");
    
        // Restablecer el valor del autoincremento
        $max_id_query = "SELECT MAX(id) + 1 AS max_id FROM usuarios";
        $result = $this->db->query($max_id_query);
        $row = $result->fetch_assoc();
        $max_id = $row['max_id'];
    
        // Verificar si el valor de $max_id es válido
        if ($max_id === null) {
            // Si no se encontraron registros en la tabla, establecer el autoincremento en 1
            $max_id = 1;
        }
    
        // Construir y ejecutar la consulta ALTER TABLE
        $alter_auto_increment_query = "ALTER TABLE usuarios AUTO_INCREMENT = $max_id";
        $this->db->query($alter_auto_increment_query);
    }

    public function get_usuario($id){
        $sql= "SELECT * FROM usuarios WHERE id='$id' LIMIT 1";
        $resultado = $this->db->query($sql);
        $row = $resultado->fetch_assoc();
        return $row;
    }

    // Método para autenticar un usuario
    public function autenticar($correo, $clave_acceso) {
        // Obtener la información del usuario desde la base de datos
        $sql = "SELECT * FROM usuarios WHERE correo='$correo' LIMIT 1";
        $resultado = $this->db->query($sql);
        $row = $resultado->fetch_assoc();
        
        // Verificar si se encontró un usuario con el correo proporcionado
        if ($row) {
            // Verificar si la contraseña proporcionada coincide con la contraseña almacenada sin encriptar
            if ($row['clave_acceso'] === $clave_acceso) {
                // Las contraseñas coinciden, usuario autenticado
                return $row;
            }
        }
        // Las contraseñas no coinciden o el usuario no existe, devolver NULL
        return null;
    }
}
?>
