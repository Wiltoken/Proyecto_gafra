<?php
session_start();

// Destruir todas las variables de sesión
$_SESSION = array();

// Destruir la sesión
session_destroy();

// Redirigir al formulario de inicio de sesión
require_once '..\views\login.php';
exit;
?>