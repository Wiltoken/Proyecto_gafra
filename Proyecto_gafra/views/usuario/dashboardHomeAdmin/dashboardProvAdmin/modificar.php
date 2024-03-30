<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['titulo']; ?></title>
    <style>
        /* Estilos para el formulario de registro */
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f0f0f0;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .container h2 {
            margin-bottom: 20px;
            color: #01B1EA;
        }

        .container .form-grupo {
            margin-bottom: 20px;
        }

        .container label {
            font-weight: bold;
        }

        .container input[type="text"],
        .container input[type="email"],
        .container input[type="tel"],
        .container input[type="password"],
        .container select {
            width: 90%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 5px;
        }

        .container button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #01B1EA;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .container button[type="submit"]:hover {
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
    <div class="container">
    <h2><?php echo $data['titulo']; ?></h2>
        <form id="nuevo" name="nuevo" method="POST" action="index.php?controller=proveedores&action=guardar" autocomplete="off">
            <!-- Agrega un campo oculto para el ID del usuario -->
            <input type="hidden" name="id" value="<?php echo isset($data["proveedores"]["id"]) ? $data["proveedores"]["id"] : ''; ?>">

            <div class="form-grupo">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo isset($data["proveedores"]["nombre"]) ? $data["proveedores"]["nombre"] : ''; ?>">
            </div>
            
            <div class="form-grupo">
                <label for="direccion">Direccion</label>
                <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo isset($data["proveedores"]["direccion"]) ? $data["proveedores"]["direccion"] : ''; ?>">
            </div>

            <div class="form-grupo">
                <label for="telefono">Telefono</label>
                <input type="tel" class="form-control" id="telefono" name="telefono" value="<?php echo isset($data["proveedores"]["telefono"]) ? $data["proveedores"]["telefono"] : ''; ?>">
            </div>

            <div class="form-grupo">
                <label for="correo">Correo</label>
                <input type="email" class="form-control" id="correo" name="correo" value="<?php echo isset($data["proveedores"]["correo"]) ? $data["proveedores"]["correo"] : ''; ?>">
            </div>

        

            <button id="guardar" name="guardar" type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
    <div class="btn-back">
                <a href="views/usuario/dashboardHomeAdmin/dashboard.php" class="btn-back-img">
                    <img title="Atras" class="btn-back-img-img" src="assets/back.png" alt="Volver">
                </a>
            </div>
</body>
</html>
