<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($data["titulo"]) ? $data["titulo"] : "Proveedores"; ?></title>
    <link rel="stylesheet" href="../assets/styles.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>
        /* Estilos específicos para el dashboard de Operarios */
        /* Layout */
        body {
            padding: 20px;
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background-color: #f5f5dc; /* Crema */
        }
        .container {
            max-width: 1200px;
            margin: 20px auto; /* Agregado margen superior e inferior */
            display: flex;
            flex-direction: column; /* Para alinear el footer al final */
            min-height: 100vh; /* Para que el contenido ocupe al menos toda la altura de la ventana */
        }   

        #lateral {
    width: 96%;
    padding: 20px;
    background-color: #01B1EA;
    border-radius: 10px;
    margin-bottom: 20px;
}

#lateral img {
    width: 200px;
    height: 250px;
    margin-right: 20px;
}

#lateral h1 {
    font-size: 100px;
    color: black;
    margin: 0;
    text-align: left;
    flex-grow: 1;
    margin-top: 0; /* Eliminamos el margen superior */
}

.user-info-container {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
}

.user-info-container img {
    width: 200px;
    height: 250px;
    margin-right: 20px;
}

.user-info-container h1 {
    margin: 0;
    color: black;
    font-family: Arial, sans-serif;
}

.datos_usuario {
    background-color: #f5f5dc;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.datos_usuario p {
    
    margin: 10px 0;
    color: #333;
    font-size: 16px;
    font-family: Arial, sans-serif;
}
#user-info {
            color: black; /* Color de texto */
            margin-top: 10px; /* Espacio entre el título y la información del usuario */
            background-color: #f0f0f0; /* Fondo */
            padding: 10px; /* Espaciado interno */
            border-radius: 10px; /* Bordes redondeados */
        }

        #user-info p {
            margin: 5px 0; /* Espaciado entre cada línea de información */
        }

        .custom-text {
            margin: 5px 0;
        }

#user-info {
            color: #01B1EA; /* Color de texto */
            margin-top: 10px; /* Espacio entre el título y la información del usuario */
            background-color: #f0f0f0; /* Fondo */
            padding: 10px; /* Espaciado interno */
            border-radius: 10px; /* Bordes redondeados */
        }

        #user-info p {
            margin: 5px 0; /* Espaciado entre cada línea de información */
        }

        .layout {
            display: flex;  
            flex-direction: column;
            align-items: center;
        }

        /* Encabezado */
        .nav {
            background-color: #222;
            color: white;
            width: 100%;
            padding: 10px 0;
            text-align: center;
        }

        .nav h2 {
            margin: 0;
            font-size: 24px;
            color: #01B1EA;
        }

        /* Contenido */
        .admin {
            width: 80%;
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .admin-div-h2 {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .admin-div-h2-h2 {
            font-size: 24px;
            color: hsl(195, 99%, 46%);
            margin: 0;
        }

        .login-form-btn {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 200px;
        }

        /* Tabla */
        .tabla-container {
            width: 100%;
            margin-top: 20px;
            overflow-x: auto;
        }

        .tabla-botones {
            margin-bottom: 20px;
            display: flex;
            justify-content: flex-end;
        }

        .tabla-btn {
            padding: 20px 50px;
            margin-right: 20px;
            background-color: #01B1EA;
            color: black;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .tabla-btn:hover {
            background-color: #0088CC;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            font-family: 'Roboto', sans-serif;
        }

        .table th, .table td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: center;
        }

        .table th {
            background-color: #01B1EA;
            color: black;
        }

        .table td {
            background-color: #f2f2f2;
        }

        .table-primary th {
            background-color: #01B1EA;
        }

        /* Botón de retroceso */
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
<aside id="lateral">
    <div class="user-info-container">
        <img src="assets/Avatar.png" alt="Avatar">
        <div  class="datos_usuario">
        <?php if(isset($_SESSION['nombre']) && isset($_SESSION['apellido']) && isset($_SESSION['email']) && isset($_SESSION['telefono'])) { ?>
            <h1><p><?php echo $_SESSION['tipo_usuario']; ?></p></h1>
            <div>
                    <p>Nombre: <?php echo $_SESSION['nombre']; ?></p>
                    <p>Apellido: <?php echo $_SESSION['apellido']; ?></p>
                    <p>Correo: <?php echo $_SESSION['email']; ?></p>
                    <p>Teléfono: <?php echo $_SESSION['telefono']; ?></p>
                <?php } else { ?>
                    <p>No se en contraron datos de usuario en la sesión.</p>
                <?php } ?>
            </div>
        </div>
        <h1>Administrador</h1>
    </div>
</aside>
    <div id="menu_2" class="menu_2">
        <section class="layout">
            <article class="admin">
                <div class="admin-div-h2">
                    <input class="login-form-btn" type="text" placeholder="Buscar">
                </div>
            </article>

            <div class="table-container">
                <div class="tabla-botones">
                    <button onclick="window.location.href='index.php?controller=proveedores&action=nuevo'" class="tabla-btn">Nuevo</button>
                    <button onclick="modificarProveedor()" class="tabla-btn">Editar</button>
                    <button onclick="eliminarProveedor()" class="tabla-btn">Borrar</button>
                </div>
                <table border="1" class="table">
                    <thead>
                        <tr class="table-primary">
                            <th><input type="checkbox" id="checkAll"></th>
                            <th>id</th>
                            <th>Nombre</th>
                            <th>Direccion</th>
                            <th>Telefono</th>
                            <th>Correo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($data["proveedores"]) && is_array($data["proveedores"])): ?>
                            <?php foreach ($data["proveedores"] as $proveedor): ?>
                                <tr>
                                    <td><input type="checkbox" class="row-checkbox" data-user-id="<?php echo $proveedor['id']; ?>"></td>
                                    <td><?php echo $proveedor['id']; ?></td>
                                    <td><?php echo $proveedor['nombre']; ?></td>
                                    <td><?php echo $proveedor['direccion']; ?></td>
                                    <td><?php echo $proveedor['telefono']; ?></td>
                                    <td><?php echo $proveedor['correo']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="8">No se encontraron datos de usuarios.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div class="btn-back">
                <a href="views/usuario/dashboardHomeAdmin/dashboard.php" class="btn-back-img">
                    <img title="Atras" class="btn-back-img-img" src="assets/back.png" alt="Volver">
                </a>
            </div>
        </section>
        
    </div>

    <script>
    // Función para manejar el evento onchange del checkbox de encabezado
    document.getElementById('checkAll').addEventListener('change', function() {
        var checkboxes = document.querySelectorAll('.row-checkbox');
        checkboxes.forEach(function(checkbox) {
            checkbox.checked = document.getElementById('checkAll').checked;
        });
    });

    // Función para redireccionar a la página de modificar
    function modificarProveedor() {
        var checkboxes = document.querySelectorAll('.row-checkbox');
        var checkedCount = 0;
        var userId = null;

        checkboxes.forEach(function(checkbox) {
            if (checkbox.checked) {
                checkedCount++;
                userId = checkbox.getAttribute('data-user-id');
            }
        });

        if (checkedCount === 1) {
            window.location.href = 'index.php?controller=proveedores&action=actualizar&id=' + userId;
        } else if (checkedCount > 1) {
            alert('Solo puedes modificar un proveedor a la vez');
        } else {
            alert('Por favor, seleccione un proveedor primero.');
        }
    }

    // Función para eliminar proveedores seleccionados
    function eliminarProveedor() {
        var checkboxes = document.querySelectorAll('.row-checkbox');
        var checkedUserIds = [];

        checkboxes.forEach(function(checkbox) {
            if (checkbox.checked) {
                checkedUserIds.push(checkbox.getAttribute('data-user-id'));
            }
        });

        if (checkedUserIds.length > 0) {
            var confirmation = confirm('¿Estás seguro de que deseas eliminar los proveedores seleccionados?');
            if (confirmation) {
                // Redirigir al controlador para eliminar los proveedores
                window.location.href = 'index.php?controller=proveedores&action=eliminar&ids=' + checkedUserIds.join(',');
            }
        } else {
            alert('Por favor, seleccione al menos un proveedor para eliminar.');
        }
    }
</script>
</div>
</body>
</html>
