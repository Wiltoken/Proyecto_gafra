<?php
session_start();
require_once('../config/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $clave_acceso = $_POST['clave_acceso'];

    // Conectarse a la base de datos
    $db = Database::connect();

    // Validar y sanitizar los datos de entrada
    $correo = mysqli_real_escape_string($db, $correo);
    // No es necesario sanitizar la contraseña porque se usará en password_verify

    // Consulta preparada para verificar las credenciales y obtener los datos del usuario
    $sql = "SELECT * FROM usuarios WHERE correo = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Verificar si la contraseña ingresada coincide con la almacenada en la base de datos
        if (password_verify($clave_acceso, $row['clave_acceso'])) {
            // Usuario autenticado
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $correo;
            $_SESSION['nombre'] = $row['nombre'];
            $_SESSION['apellido'] = $row['apellido'];
            $_SESSION['telefono'] = $row['telefono'];
            $_SESSION['tipo_usuario'] = $row['tipo_usuario'];

            // Mensaje de depuración para verificar el tipo de usuario
            echo "Tipo de usuario: " . $_SESSION['tipo_usuario'];

            // Redirigir al usuario al panel correspondiente según el tipo de usuario
            if ($_SESSION['tipo_usuario'] == 'administrador') {
                header("Location: ../views/usuario/dashboardHomeAdmin/dashboard.php");
                exit();
            } else if ($_SESSION['tipo_usuario'] == 'operario_corte') { // Corregido el chequeo del tipo de usuario
                header("Location: ../views/usuario/dashboardHomeOper/dashboard.php");
                exit();
            } 
            else if ($_SESSION['tipo_usuario'] == 'operario_ensamble') { // Corregido el chequeo del tipo de usuario
                header("Location: ../views/usuario/dashboardHomeOper/dashboard.php");
                exit();
            }
            else if ($_SESSION['tipo_usuario'] == 'operario_tuberia') { // Corregido el chequeo del tipo de usuario
                header("Location: ../views/usuario/dashboardHomeOper/dashboard.php");
                exit();
            }
            else if ($_SESSION['tipo_usuario'] == 'operario_satelite') { // Corregido el chequeo del tipo de usuario
                header("Location: ../views/usuario/dashboardHomeOper/dashboard.php");
                exit();
            }else {
                // Tipo de usuario no reconocido
                $error = "Tipo de usuario no reconocido";
            }
        } else {
            // Credenciales incorrectas
            $error = "Correo electrónico o contraseña incorrectos";
        }
    } else {
        // Credenciales incorrectas
        $error = "Correo electrónico o contraseña incorrectos";
    }

    $stmt->close();
    $db->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="../assets/styles.css">
    <!-- Estilos CSS adicionales -->
    <style>
        /* Estilos específicos para el formulario de inicio de sesión */
        .login-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f0f0f0;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .login-container h2 {
            margin-bottom: 20px;
            color: #01B1EA;
        }

        .login-container .form-group {
            margin-bottom: 20px;
        }

        .login-container label {
            font-weight: bold;
            color: #333333;
        }

        .login-container input[type="email"],
        .login-container input[type="password"] {
            width: 95%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 5px;
        }

        .login-container button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #01B1EA;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login-container button[type="submit"]:hover {
            background-color: #0088CC;
        }

        .error-message {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Iniciar Sesión</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="correo">Correo Electrónico:</label>
                <input type="email" id="correo" name="correo" required>
            </div>
            <div class="form-group">
                <label for="clave_acceso">Contraseña:</label>
                <input type="password" id="clave_acceso" name="clave_acceso" required>
            </div>
            <?php if(isset($error)) { ?>
                <p class="error-message"><?php echo $error; ?></p>
            <?php } ?>
            <button type="submit">Iniciar Sesión</button>
        </form>
    </div>
</body>
</html>
