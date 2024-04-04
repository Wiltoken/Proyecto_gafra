<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <style>
        /* Estilos generales */
        body {
            padding: 20px;
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background-color: #f5f5dc; /* Crema */
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }

        h1 {
            text-align: center;
            color: #01B1EA;
            margin-bottom: 20px;
        }

        .container {
            display: flex;
            justify-content: center;
            background-image: url('ruta/a/la/imagen.jpg');
            background-size: cover;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            width: 100%;
            max-width: 800px;
        }

        .text-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            width: 50%;
        }

        .blue-box {
            padding: 20px;
            background-color: #01B1EA;
            color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .blue-box p {
            margin: 0;
        }

        .login-button {
            text-align: center;
        }

        .login-button a {
            display: inline-block;
            padding: 10px 20px;
            font-size: 18px;
            background-color: #01B1EA;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .login-button a:hover {
            background-color: #0088CC;
        }

        /* Estilos para el logo */
        .logo-container {
            width: 30%;
            display: flex;
            justify-content: flex-start;
            align-items: center;
        }

        .logo {
            margin-right: 20px;
        }

        .logo img {
            max-width: 100%;
            height: auto;
        }

        .linea-separadora {
            width: 2px;
            background-color: #01B1EA;
            height: 50%;
            margin: 0 20px;
        }

        /* Estilos del footer */
        footer {
            background-color: #222222;
            color: white;
            text-align: center;
            padding: 20px 0;
            border-radius: 10px;
            width: 100%;
            max-width: 800px;
        }

        footer p {
            margin: 0;
        }

        /* Estilos para hacer la página responsive */
        @media screen and (max-width: 768px) {
            .container {
                flex-direction: column;
                align-items: center;
            }
            .logo-container {
                width: 100%;
                justify-content: center;
                margin-bottom: 20px;
            }
            .text-container {
                width: 100%;
            }
            h1 {
                font-size: 24px;
            }
            .blue-box p {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo-container">
            <div class="logo">
                <img src="/Proyecto_gafra/assets/logo_grafa.png" alt="Logo de la empresa">
            </div>
            <div class="linea-separadora"></div>
        </div>
        <div class="text-container">
            <h1>Bienvenido a Gafra</h1>
            <div class="blue-box">
                <p>Visión: "Ser la marca líder a nivel global en la fabricación de productos innovadores y de alta calidad para bebés, siendo reconocidos por nuestra excelencia en diseño, seguridad y cuidado del medio ambiente."</p>
            </div>
            <div class="blue-box">
                <p>Misión: "En nuestra empresa nos comprometemos a diseñar y fabricar productos seguros, cómodos y funcionales que mejoren la vida de los bebés y sus familias. Nos esforzamos por mantener los más altos estándares de calidad, seguridad y sostenibilidad en cada etapa de nuestro proceso de producción, mientras promovemos un entorno de trabajo positivo y colaborativo. Buscamos inspirar confianza en nuestros clientes, creando soluciones innovadoras que faciliten el cuidado y el desarrollo saludable de los más pequeños."</p>
            </div>
            <div class="login-button">
                <a href="/Proyecto_gafra/views/login.php">Ingresar</a>
            </div>
        </div>
    </div>
    <footer>
        <p>2024®️ Gafra todos los derechos reservados</p>
    </footer>
</body>
</html>
