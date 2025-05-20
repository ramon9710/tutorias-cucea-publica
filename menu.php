<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistema Digital Tutorías CUCEA</title>
  <!-- Meta SEO -->
  <meta name="description" content="Sistema Digital de Tutorías CUCEA: accede como tutor, alumno o administrador para gestionar sesiones de acompañamiento académico.">
  <meta name="keywords" content="tutorías, CUCEA, tutores, tutorados, registro, login">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
  <!-- Estilos personalizados -->
  <link rel="stylesheet" href="css/styles.css">
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
                <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  Iniciar sesión
                </a>
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
    <div class="row g-4">

      <!-- Tarjeta de Tutores -->
      <div class="col-sm-6">
        <div class="card h-100" role="region" aria-label="Sección para tutores">
          <div class="card-body text-center">
            <h3 class="card-title">Tutores</h3>
            <img src="img/TUTOR.png" class="card-img-top mx-auto d-block" alt="Imagen de tutor">
            <p class="mt-3">Gestiona a tus tutorados, registra sesiones y acompaña su desarrollo académico.</p>
            <a href="registro_tutor.php" class="btn btn-primary me-2">Registro</a>
            <a href="login_tutor.php" class="btn btn-secondary">Login</a>
          </div>
        </div>
      </div>

      <!-- Tarjeta de Tutorados -->
      <div class="col-sm-6">
        <div class="card h-100" role="region" aria-label="Sección para alumnos tutorados">
          <div class="card-body text-center">
            <h3 class="card-title">Tutorados (Alumnos)</h3>
            <img src="img/estudiante.jpg" class="card-img-top mx-auto d-block" alt="Imagen de tutorado">
            <p class="mt-3">Consulta tus tutorías, registra tus avances y mantente en contacto con tu tutor académico.</p>
            <a href="registro_tutorado.php" class="btn btn-primary me-2">Registro</a>
            <a href="login_tutorado.php" class="btn btn-secondary">Login</a>
          </div>
        </div>
      </div>

    </div>
  </main>

  <!-- Pie de página -->
  <footer class="bg-dark text-white text-center py-3 mt-5">
    <p>Centro Universitario de Ciencias Económico Administrativas<br>
      Periférico Norte N° 799, Núcleo Universitario Los Belenes, C.P. 45100, Zapopan, Jalisco, México.<br>
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
  <!-- Scripts personalizados -->
  <script src="js/scripts.js"></script>
</body>
</html>
