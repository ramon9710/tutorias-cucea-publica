<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sistema Digital Tutorías CUCEA</title>
  <meta name="description" content="Sistema Digital de Tutorías del CUCEA. Brindamos apoyo académico, orientación vocacional y atención personalizada a estudiantes.">
  <meta name="keywords" content="tutorías, CUCEA, asesoría académica, orientación vocacional, apoyo psicológico, universidad de guadalajara">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <!-- Estilos personalizados -->
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <!-- Encabezado -->
  <header class="bg-black text-white text-center py-2" role="banner">
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
  <main class="container my-5" role="main">
    <div class="text-center mb-4">
      <h2>¡Acompañamos tu formación académica y personal!</h2>
      <p class="lead">El programa de tutorías brinda acompañamiento a los estudiantes en apoyo a su formación integral, desarrollando estrategias para evitar el rezago y la deserción.</p>
    </div>

    <div class="row text-center">
      <div class="col-lg-4 mb-4">
        <div class="card h-100 shadow-sm">
          <img src="img/Tutoria-para-estudiantes.jpg" class="card-img-top" alt="Estudiantes recibiendo tutoría">
          <div class="card-body">
            <h3 class="card-title">Servicios de Tutoría</h3>
            <ul class="list-unstyled">
              <li>Asesoría académica</li>
              <li>Orientación vocacional</li>
              <li>Apoyo psicológico</li>
              <li>Talleres de desarrollo personal</li>
            </ul>
          </div>
        </div>
      </div>

      <div class="col-lg-4 mb-4">
        <div class="card h-100 shadow-sm">
          <div class="card-body">
            <h3 class="card-title">Horarios de Atención</h3>
            <p><strong>Lunes a Viernes:</strong> 9:00 - 18:00</p>
            <p><strong>Sábados:</strong> 9:00 - 13:00</p>
          </div>
        </div>
      </div>

      <div class="col-lg-4 mb-4">
        <div class="card h-100 shadow-sm">
          <div class="card-body">
            <h3 class="card-title">¿Dudas? Contáctanos</h3>
            <p>Correo: tutorias@cucea.udg.mx</p>
            <p>Teléfono: +52 (33) 3770 3300 ext. 12345</p>
            <a href="contacto.php" class="btn btn-outline-primary mt-2">Ir a Contacto</a>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Pie de página -->
  <footer class="bg-dark text-white text-center py-4" role="contentinfo">
    <p class="mb-1">Centro Universitario de Ciencias Económico Administrativas</p>
    <p class="mb-1">Periférico Norte N° 799, Núcleo Universitario Los Belenes</p>
    <p class="mb-1">C.P. 45100, Zapopan, Jalisco, México</p>
    <p>Tel: +52 (33) 3770 3300</p>
    <div class="mt-2">
      <a href="#" class="text-white me-3">Política de Privacidad</a>
      <a href="#" class="text-white">Aviso Legal</a>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Scripts personalizados -->
  <script src="js/scripts.js"></script>
</body>
</html>
