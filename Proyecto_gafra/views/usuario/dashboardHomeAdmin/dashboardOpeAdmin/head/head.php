<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Industrias Gafra</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- Custom CSS -->
  <style>
    /* Estilo para el enlace activo */
    .navbar-nav .nav-item.active .nav-link {
      color: #fff !important;
      background-color: #6c757d !important;
    }

    /* Estilo para el logotipo */
    .navbar-brand {
      font-size: 1.8rem;
      font-weight: bold;
      font-size: 1.5rem; /* Ajustar tamaño de letra */
    }

    /* Estilo para el botón del toggler */
    .navbar-toggler {
      border: none;
    }

    /* Estilo para el fondo de la barra de navegación */
    .navbar {
      background-color: #343a40; /* Color de fondo */
      padding: 1rem 0; /* Espaciado interno */
      border-radius: 0; /* Borde redondeado */
      box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* Sombra */
    }

    /* Estilo para los enlaces de la barra de navegación */
    .navbar-nav .nav-link {
      color: #fff; /* Color del texto */
      font-size: 1.2rem; /* Tamaño de letra */
      font-weight: bold; /* Negrita */
      transition: color 0.3s; /* Transición suave */
    }

    /* Estilo al pasar el cursor sobre los enlaces de la barra de navegación */
    .navbar-nav .nav-link:hover {
      color: #adb5bd; /* Cambio de color al pasar el cursor */
    }

    /* Estilo para el contenedor del logotipo */
    .navbar-brand {
      margin-right: 2rem; /* Espacio a la derecha */
      color: #fff; /* Color del texto */
      transition: color 0.3s; /* Transición suave */
    }

    /* Estilo al pasar el cursor sobre el logotipo */
    .navbar-brand:hover {
      color: #adb5bd; /* Cambio de color al pasar el cursor */
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
      <!-- Logotipo -->
      <a class="navbar-brand" href="\Proyecto_gafra\views\usuario\dashboardHomeAdmin\dashboard.php">INDUSTRIAS GAFRA</a>
      <!-- Botón del toggler para dispositivos móviles -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Elementos de la barra de navegación -->
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Acerca de</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Servicios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contacto</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Your content here -->

  <!-- Bootstrap JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-V2pc8EQzvu1pLelLb5cxGk/xILX0m36uXxXvhXbJ3E8V0lKps9wz/5zrO0R0exDa" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-E8tqLUsjf1ePMtBYJg4/BWFYg2M8LDP0yQd/Pxh5p8r+0yJwYYtW/3Rtws1geVU2" crossorigin="anonymous"></script>
</body>

</html>
