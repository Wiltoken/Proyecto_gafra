<?php

class PasswordUtils {
    public static function encriptar($clave) {
        // Aquí puedes implementar tu lógica para encriptar la contraseña
        return password_hash($clave, PASSWORD_DEFAULT);
    }

    public static function verificar($clave, $hash) {
        // Aquí puedes implementar tu lógica para verificar la contraseña
        return password_verify($clave, $hash);
    }
}

?>