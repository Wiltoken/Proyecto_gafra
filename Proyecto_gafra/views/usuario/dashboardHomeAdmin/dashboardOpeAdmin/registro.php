<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['titulo']; ?></title>
    <style>
        /* Estilos para el formulario de registro */
        .container-r {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f0f0f0;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .container-r h2 {
            margin-bottom: 20px;
            color: #01B1EA;
        }

        .container-r .form-grupo {
            margin-bottom: 20px;
        }

        .container-r label {
            font-weight: bold;
        }

        .container-r input[type="text"],
        .container-r input[type="email"],
        .container-r input[type="tel"],
        .container-r input[type="password"],
        .container-r select[name="tipo_usuario"]{
            width: 95%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 5px;
        }

        .container-r button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #01B1EA;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .container-r button[type="submit"]:hover {
            background-color: #0088CC;
        }
        .btn-back {
            position: fixed;
            bottom: 20px;
            left: 20px;
            text-align: center;
        }

        .btn-back a {
            display: inline-block;
            text-decoration: none;
            color: #333;
        }

        .btn-back-img {
            width: 50px;
        }

        .btn-back-img-img {
            width: 100%;
            height: auto;
            transition: transform 0.3s ease; /* Agrega transición para la escala */
        }

        .btn-back-img-img:hover {
            transform: scale(1.1); /* Aumenta el tamaño al pasar el mouse sobre el botón */
        }
    </style>
</head>
<body>
    
    <div class="container-r">
        <h2><?php echo $data['titulo'];?></h2>
        <form id="nuevo" name="nuevo" method="POST" action="index.php?controller=usuarios&action=guardar" autocomplete="off">
        
            <div class="form-grupo">
                <label for="nombre">Nombre:</label><br>
                <input type="text" id="nombre" name="nombre" required><br>
            </div>

            <div class="form-grupo">
                <label for="apellido">Apellido:</label><br>
                <input type="text" id="apellido" name="apellido" required><br>
            </div>

            <div class="form-grupo">
                <label for="correo">Correo Electrónico:</label><br>
                <input type="email" id="correo" name="correo" required><br>
            </div>

            <div class="form-grupo">
                <label for="clave_acceso">Contraseña:</label><br>
                <input type="password" id="clave_acceso" name="clave_acceso" required><br>
            </div>

            <div class="form-grupo">
                <label for="telefono">Teléfono:</label><br>
                <input type="tel" id="telefono" name="telefono"><br>
            </div>

            <div class="form-grupo">
                <label for="tipo_usuario">Tipo de Usuario:</label><br>
                <select id="tipo_usuario" name="tipo_usuario" required>
                    <option value="administrador">Administrador</option>
                    <option value="operario_corte">Operario Corte</option>
                    <option value="operario_ensamble">Operario Ensamble</option>
                    <option value="operario_tuberia">Operario Tubería</option>
                    <option value="operario_satelite">Operario Satélite</option>
                </select><br>
            </div>

            <button id="guardar" name="guardar" type="submit">Guardar</button>

        </form>
    </div>
    <div class="btn-back">
                <a href="views/usuario/dashboardHomeAdmin/dashboard.php" class="btn-back-img">
                    <img title="Atras" class="btn-back-img-img" src="assets/back.png" alt="Volver">
                </a>
            </div>

</body>
</html>
