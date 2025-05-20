<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sistema Digital Tutorías CUCEA</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/styles.css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet" />
</head>

<body>
  <!-- Encabezado -->
  <header class="bg-black text-white text-center py-2">
    <h1>Sistema Digital Tutorías CUCEA</h1>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" role="navigation" aria-label="Menú principal">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Mostrar u ocultar menú">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

          <!-- Menú alineado a la izquierda -->
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link" href="tutorias_cucea.php">Inicio</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="serviciosDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Servicios
              </a>
              <ul class="dropdown-menu" aria-labelledby="serviciosDropdown">
                <li><a class="dropdown-item" href="#">Tipos de Tutoría</a></li>
                <li><a class="dropdown-item" href="#">Talleres</a></li>
                <li><a class="dropdown-item" href="#">Asesorías</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Acerca de</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">FAQ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contacto.php">Contacto</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Noticias</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Recursos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Portal Alumno</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Portal Tutor</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Soporte</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="idiomasDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Idioma
              </a>
              <ul class="dropdown-menu" aria-labelledby="idiomasDropdown">
                <li><a class="dropdown-item" href="#">Español</a></li>
                <li><a class="dropdown-item" href="#">English</a></li>
              </ul>
            </li>
          </ul>

          <!-- Menú alineado a la derecha -->
          <ul class="navbar-nav ms-auto">
            <div class="d-flex align-items-center gap-2">
              <form class="d-flex" role="search">
                <input class="form-control form-control-sm me-2" type="search" placeholder="Buscar" aria-label="Buscar">
                <button class="btn btn-outline-primary btn-sm" type="submit">Buscar</button>
              </form>

              <a class="nav-link" href="menu.php"><i class="fa-solid fa-toolbox"></i> Regístrate</a>

              <div class="nav-item dropdown">
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item" href="login_tutor.php">Tutor</a></li>
                  <li><a class="dropdown-item" href="login_alumno.php">Alumno</a></li>
                  <li><a class="dropdown-item" href="login_admin.php">Administrador</a></li>
                </ul>
              </div>
            </div>
          </ul>

        </div>
      </div>
    </nav>
  </header>

  <!-- Contenido principal -->
  <main class="container my-5">
    <h2 class="text-center mb-4">Acceso a Tutores</h2>
    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-8">
        <h3 class="text-center mb-4">Inicia sesión</h3>

        <!-- Mensaje de error -->
        <?php if (isset($_GET['error']) && $_GET['error'] == 1): ?>
          <div class="alert alert-danger" role="alert">Código UDG o contraseña incorrectos.</div>
        <?php endif; ?>

        <form action="procesar_login_tutor.php" method="POST" novalidate>
          <div class="mb-3">
            <label for="codigo_udg" class="form-label">Código UDG</label>
            <input type="text" class="form-control" id="codigo_udg" name="codigo_udg" required autofocus />
          </div>

          <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <div class="input-group">
              <input type="password" class="form-control" id="password" name="password" required />
              <button type="button" class="btn btn-outline-secondary" id="togglePassword" aria-label="Mostrar u ocultar contraseña">
                <i class="fa-solid fa-eye"></i>
              </button>
            </div>
          </div>

          <div class="mb-3 text-end">
            <a href="recuperar_contrasenia.php">¿Olvidaste tu contraseña?</a>
          </div>

          <button type="submit" class="btn btn-success w-100">Entrar</button>
        </form>

        <!-- Sección de registro -->
        <div class="text-center mt-4">
          <p class="mb-2">¿Aún no estás registrado?</p>
          <a href="menu.php" class="btn btn-primary">
            <i class="fa-solid fa-user-plus me-2"></i>Regístrate aquí
          </a>
        </div>

      </div>

      <div class="col-lg-4 d-none d-md-block text-center">
        <img src="img/login-usuario-3.png" alt="Ilustración de acceso al sistema de tutorías CUCEA" class="img-fluid mt-4" />
      </div>
    </div>
  </main>

  <!-- Pie de página -->
  <footer class="bg-dark text-white text-center py-3 mt-5">
    <p>Centro Universitario de Ciencias Económico Administrativas<br />
      Periférico Norte N° 799, Núcleo Universitario Los Belenes, C.P. 45100, Zapopan, Jalisco, México.<br />
      Teléfono: +52 (33) 3770 3300.
    </p>
    <div class="mt-2">
      <a href="#" class="text-white me-3">Política de Privacidad</a>
      <a href="#" class="text-white me-3">Aviso Legal</a>
      <a href="#" class="text-white"><i class="fab fa-facebook"></i></a>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Mostrar/ocultar contraseña -->
  <script>
    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    togglePassword.addEventListener('click', () => {
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);
      togglePassword.innerHTML = type === 'password'
        ? '<i class="fa-solid fa-eye"></i>'
        : '<i class="fa-solid fa-eye-slash"></i>';
    });
  </script>
</body>
</html>
