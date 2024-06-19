<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Validación de Formulario con Javascript</title>
  <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/styleRegistro.css">
  <link rel="stylesheet" href="assets/css/sidebar.css"> <!-- Estilo adicional para la barra lateral -->
</head>
<body>
  <header class="header-container">
    <a href="#" class="header-logo">
      <img src="../../../assets/css/img/logo.png" alt="Logo">
    </a>
    <div>
      <h1><?php echo strtoupper($_SESSION['tipo_usuario']); ?></h1>
      <p><?php echo strtoupper("Panel"); ?></p>
    </div>
  </header>

  <div class="container">
    <nav class="sidebar">
      <div class="profile">
        <img src="../../../assets/css/img/Avatar.png" alt="profile_picture">
        <div class="profile-info">
          <h3><?php echo $_SESSION['nombre'] . ' ' . $_SESSION['apellido']; ?></h3>
        </div>
      </div>
      <ul class="sidebar__links">
        <li class="sidebar__link">
          <a href="#">
            <i class='sidebar__link-icon bx bx-home-alt-2 bx-tada-hover'></i>
            <span class="sidebar__link-name">Home</span>
          </a>
        </li>
        <li class="sidebar__link">
          <a href="#">
            <i class='sidebar__link-icon bx bx-bar-chart-alt-2 bx-tada-hover'></i>
            <span class="sidebar__link-name">Dashboard</span>
          </a>
        </li>
        <li class="sidebar__link">
          <a href="#">
            <i class='sidebar__link-icon bx bx-bell bx-tada-hover'></i>
            <span class="sidebar__link-name">Activity</span>
          </a>
        </li>
        <li class="sidebar__link">
          <a href="#">
            <i class='sidebar__link-icon bx bx-cog bx-spin-hover'></i>
            <span class="sidebar__link-name">Settings</span>
          </a>
        </li>
        <li class="sidebar__link sidebar__link--logout">
          <a href="?logout=true">
            <i class='sidebar__link-icon bx bx-log-out'></i>
            <span class="sidebar__link-name">Log Out</span>
          </a>
        </li>
      </ul>
      <i class='sidebar__arrow bx bx-chevron-right'></i>
    </nav>

    <main>
      <form action="" class="formulario" id="formulario">
        <!-- Grupos de campos del formulario -->
        <div class="formulario__grupo" id="grupo__usuario">
          <label for="usuario" class="formulario__label">Usuario</label>
          <div class="formulario__grupo-input">
            <input type="text" class="formulario__input" name="usuario" id="usuario" placeholder="john123">
            <i class="formulario__validacion-estado fas fa-times-circle"></i>
          </div>
          <p class="formulario__input-error">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo.</p>
        </div>

        <div class="formulario__grupo" id="grupo__nombre">
          <label for="nombre" class="formulario__label">Nombre</label>
          <div class="formulario__grupo-input">
            <input type="text" class="formulario__input" name="nombre" id="nombre" placeholder="John Doe">
            <i class="formulario__validacion-estado fas fa-times-circle"></i>
          </div>
          <p class="formulario__input-error">El nombre tiene que ser de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo.</p>
        </div>

        <div class="formulario__grupo" id="grupo__password">
          <label for="password" class="formulario__label">Contraseña</label>
          <div class="formulario__grupo-input">
            <input type="password" class="formulario__input" name="password" id="password">
            <i class="formulario__validacion-estado fas fa-times-circle"></i>
          </div>
          <p class="formulario__input-error">La contraseña tiene que ser de 4 a 12 dígitos.</p>
        </div>

        <div class="formulario__grupo" id="grupo__password2">
          <label for="password2" class="formulario__label">Repetir Contraseña</label>
          <div class="formulario__grupo-input">
            <input type="password" class="formulario__input" name="password2" id="password2">
            <i class="formulario__validacion-estado fas fa-times-circle"></i>
          </div>
          <p class="formulario__input-error">Ambas contraseñas deben ser iguales.</p>
        </div>

        <div class="formulario__grupo" id="grupo__correo">
          <label for="correo" class="formulario__label">Correo Electrónico</label>
          <div class="formulario__grupo-input">
            <input type="email" class="formulario__input" name="correo" id="correo" placeholder="correo@correo.com">
            <i class="formulario__validacion-estado fas fa-times-circle"></i>
          </div>
          <p class="formulario__input-error">El correo solo puede contener letras, numeros, puntos, guiones y guion bajo.</p>
        </div>

        <div class="formulario__grupo" id="grupo__telefono">
          <label for="telefono" class="formulario__label">Teléfono</label>
          <div class="formulario__grupo-input">
            <input type="text" class="formulario__input" name="telefono" id="telefono" placeholder="4491234567">
            <i class="formulario__validacion-estado fas fa-times-circle"></i>
          </div>
          <p class="formulario__input-error">El telefono solo puede contener numeros y el maximo son 14 dígitos.</p>
        </div>

        <div class="formulario__grupo" id="grupo__terminos">
          <label class="formulario__label">
            <input class="formulario__checkbox" type="checkbox" name="terminos" id="terminos">
            Acepto los Terminos y Condiciones
          </label>
        </div>

        <div class="formulario__mensaje" id="formulario__mensaje">
          <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente.</p>
        </div>

        <div class="formulario__grupo formulario__grupo-btn-enviar">
          <button type="submit" class="formulario__btn">Enviar</button>
          <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
        </div>
      </form>
    </main>
  </div>

  <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
  <script src="assets/js/formulario.js"></script>
  <script>
    // Script para manejar el despliegue del menú lateral
    const arrow = document.querySelector('.sidebar__arrow');
    const sidebar = document.querySelector('.sidebar');
    const header = document.querySelector('.header-container');
    const container = document.querySelector('.container');

    arrow.addEventListener('click', () => {
      sidebar.classList.toggle('active');
      container.classList.toggle('sidebar-active');
      header.classList.toggle('sidebar-active');
    });
  </script>
</body>
</html>
