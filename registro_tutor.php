<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sistema Digital Tutorías CUCEA</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Estilos personalizados -->
  <link rel="stylesheet" href="css/styles.css">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
</head>

<body>
  <!-- Encabezado -->
  <header class="bg-black text-white text-center py-2">
    <h1>Bienvenido al Sistema Digital Tutorías CUCEA</h1>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" role="navigation" aria-label="Menú principal">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Mostrar u ocultar menú">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <!-- Menú alineado a la izquierda -->
          <ul class="navbar-nav me-auto">
            <li class="nav-item"><a class="nav-link" href="tutorias_cucea.php">Inicio</a></li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="serviciosDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Servicios</a>
              <ul class="dropdown-menu" aria-labelledby="serviciosDropdown">
                <li><a class="dropdown-item" href="#">Tipos de Tutoría</a></li>
                <li><a class="dropdown-item" href="#">Talleres</a></li>
                <li><a class="dropdown-item" href="#">Asesorías</a></li>
              </ul>
            </li>
            <li class="nav-item"><a class="nav-link" href="#">Acerca de</a></li>
            <li class="nav-item"><a class="nav-link" href="#">FAQ</a></li>
            <li class="nav-item"><a class="nav-link" href="contacto.php">Contacto</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Noticias</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Recursos</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Portal Alumno</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Portal Tutor</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Soporte</a></li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="idiomasDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Idioma</a>
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

              <?php if (isset($_SESSION['usuario'])): ?>
                <div class="nav-item dropdown">
                  <a class="btn btn-success dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php echo htmlspecialchars($_SESSION['usuario']); ?>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="perfil.php">Perfil</a></li>
                    <li><a class="dropdown-item" href="logout.php">Cerrar sesión</a></li>
                  </ul>
                </div>
              <?php else: ?>
                <div class="nav-item dropdown">
                  <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Iniciar sesión
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="login_tutor.php">Tutor</a></li>
                    <li><a class="dropdown-item" href="login_alumno.php">Alumno</a></li>
                    <li><a class="dropdown-item" href="login_admin.php">Administrador</a></li>
                  </ul>
                </div>
              <?php endif; ?>
            </div>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <!-- Contenido principal -->
  <main class="container my-5">
    <div class="row mt-4">
      <div class="col-md-6">
        <h3>Registro de Tutores</h3>
        <form action="registro_procesar.php" method="POST">
          <div class="mb-3">
            <label for="codigo_udg" class="form-label">Código UDG:</label>
            <input type="text" class="form-control" id="codigo_udg" name="codigo_udg" required>
          </div>

          <div class="mb-3">
            <label for="password" class="form-label">Contraseña:</label>
            <input type="password" class="form-control" id="password" name="password" required>
            <div id="password-error" class="text-danger small mt-1"></div>
          </div>

          <div class="mb-3">
            <label for="confirm_password" class="form-label">Confirmar Contraseña:</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
            <div id="confirm-password-error" class="text-danger small mt-1"></div>
          </div>

          <button type="submit" class="btn btn-success w-100 mb-3">Registrar Tutor</button>
        </form>

        <!-- Sección de pregunta y botón de iniciar sesión -->
        <div class="text-center mt-3">
          <p class="mb-2">¿Ya tienes cuenta?</p>
          <a href="login_tutor.php" class="btn btn-outline-primary w-100">
            <i class="fa-solid fa-right-to-bracket me-2"></i>Iniciar Sesión
          </a>
        </div>
      </div>

      <div class="col-md-6 text-center">
        <img src="img/registro.png" width="70%" height="auto" alt="Registro de tutor">
      </div>
    </div>
  </main>

  <!-- Pie de página -->
  <footer class="bg-dark text-white text-center py-3">
    <p>Centro Universitario de Ciencias Económico Administrativas<br>
      Periférico Norte N° 799, Núcleo Universitario Los Belenes, C.P. 45100, Zapopan, Jalisco, México. Teléfono: +52 (33) 3770 3300.
    </p>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Scripts personalizados -->
  <script src="js/scripts.js"></script>

  <!-- Validación de contraseñas en tiempo real -->
  <script>
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('confirm_password');
    const passwordError = document.getElementById('password-error');
    const confirmPasswordError = document.getElementById('confirm-password-error');

    function validatePasswords() {
      if (password.value !== confirmPassword.value) {
        confirmPasswordError.textContent = 'Las contraseñas no coinciden.';
      } else {
        confirmPasswordError.textContent = '';
      }
    }

    password.addEventListener('input', validatePasswords);
    confirmPassword.addEventListener('input', validatePasswords);
  </script>
</body>
</html>
