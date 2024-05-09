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
            } else if ($_SESSION['tipo_usuario'] == 'operario_ensamble') { // Corregido el chequeo del tipo de usuario
                header("Location: ../views/usuario/dashboardHomeOper/dashboard.php");
                exit();
            } else if ($_SESSION['tipo_usuario'] == 'operario_tuberia') { // Corregido el chequeo del tipo de usuario
                header("Location: ../views/usuario/dashboardHomeOper/dashboard.php");
                exit();
            } else if ($_SESSION['tipo_usuario'] == 'operario_satelite') { // Corregido el chequeo del tipo de usuario
                header("Location: ../views/usuario/dashboardHomeOper/dashboard.php");
                exit();
            } else {
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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../assets/style.css">
    <title>Login</title>
</head>

<body>
    <div class="container-form register">
        <div class="information">
            <div class="info-childs">
                <img src="../assets/img/Logo.png" alt="Logo de la empresa">
                <p>Te damos la bienvenida a nuestra plataforma, donde podrás explorar todos los detalles de nuestra
                    empresa. Descubre nuestra visión y misión para conocer más sobre nosotros.</p>
                    <input type="button" value="Iniciar Sesión" id="sign-in">
            </div>
        </div>
        <div class="form-information">
            <div class="form-information-childs">
                <h2>GAFRA</h2>
                <div class="vision">
                    <h3>Visión</h3>
                    <p>Ser la marca líder global en la fabricación de productos innovadores y de alta calidad para
                        bebés, reconocidos por nuestra excelencia en diseño, seguridad y cuidado del medio ambiente.</p>
                </div>
                <div class="mission">
                    <h3>Misión</h3>
                    <p>Comprometernos a diseñar y fabricar productos seguros, cómodos y funcionales que mejoren la vida
                        de los bebés y sus familias, manteniendo altos estándares de calidad, seguridad y
                        sostenibilidad, mientras inspiramos confianza en nuestros clientes y facilitamos el desarrollo
                        saludable de los más pequeños.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-form login hide">
        <div class="information">
            <div class="info-childs">
                <img src="../assets/img/Logo.png" alt="Logo de la empresa">
                <p> Bienvenido a nuestra plataforma de gestión de inventario. Optimiza tu almacenamiento y control de
                    productos hoy mismo.</p>
                <input type="button" value="Conocer más" id="sign-up">
            </div>
        </div>
        <div class="form-information">
            <div class="form-information-childs">
                <h2>Iniciar Sesión</h2>
                <div class="icons">
                    <i class='bx bxs-book-bookmark'></i>
                </div>
                <p>¿Necesitas ayuda?</p>
                <form action="" method="post" class="form">
                    <div>
                        <label>
                            <i class='bx bx-envelope'></i>
                            <input type="email" placeholder="Correo Electrónico" name="correo">
                        </label>
                    </div>
                    <div>
                        <label>
                            <i class='bx bx-lock-alt'></i>
                            <input type="password" placeholder="Contraseña" name="clave_acceso">
                        </label>
                    </div>
                    <input type="submit" value="Iniciar Sesión">
                    <div class="alerta-error">Todos los campos son obligatorios</div>
                    <div class="alerta-exito">Te registraste correctamente</div>
                </form>
            </div>
        </div>
    </div>
    <script src="../assets/js/script.js"></script>
    <script src="../assets/js/register.js"></script>
    <script src="../assets/js/login.js"></script>
</body>
</html>