<?php
session_start(); // Inicia o continúa la sesión

// Validar si hay una sesión activa
if (!isset($_SESSION['codigo_udg'])) {
    // Enviar headers para evitar caché
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    header("Expires: 0");

    header("Location: ../login_tutor.php"); // Redirige si no hay sesión válida
    exit;
}

include '../conexion.php';

$codigo_udg = $_SESSION['codigo_udg'];

// Consulta para obtener el nombre del tutor
$stmt = $conexion->prepare("SELECT nombre, apellido_1,apellido_2,email,preferencia_carrera_tutor,cantidad_cantidad_de_tutorados,tipo_de_tutoria,ciclo_de_tutoria FROM tutores WHERE codigo_udg = ?");
$stmt->bind_param("s", $codigo_udg);
$stmt->execute();
$resultado = $stmt->get_result();
$tutor = $resultado->fetch_assoc();
$stmt->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <?php if ($tutor): ?>
            <p class="mb-0">Sesión activa como: <strong><?php  echo htmlspecialchars($tutor['nombre'] . ' ' . $tutor['apellido_1'] . ' ' . $tutor['apellido_2']);  ?></strong></p>
        <?php endif; ?>
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

       <main class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <article class="bg-light p-4 rounded shadow">
                <h2 class="mb-3 text-primary">El Rol del Maestro Tutor en CUCEA</h2>
                <p class="lead">El maestro tutor es una figura clave en el acompañamiento académico, personal y profesional de los estudiantes universitarios.</p>
                <img src="img/tutor_blog.jpg" class="img-fluid rounded my-3" alt="Imagen de tutor orientando a estudiantes">
                
                <p>En el Sistema Digital de Tutorías CUCEA, los tutores desempeñan un papel fundamental en la orientación de los estudiantes. No solo se encargan de apoyar en temas académicos, sino que también ayudan a los tutorados a desarrollar habilidades para la vida, planear su trayectoria escolar y enfrentar desafíos personales y emocionales.</p>
                
                <h4 class="mt-4 text-secondary">Funciones principales del maestro tutor:</h4>
                <ul>
                    <li>Brindar orientación académica y vocacional.</li>
                    <li>Detectar problemas de rendimiento escolar y canalizar adecuadamente.</li>
                    <li>Fomentar la integración del estudiante a la vida universitaria.</li>
                    <li>Ser un vínculo entre los alumnos y las áreas de apoyo institucional.</li>
                </ul>

                <h4 class="mt-4 text-secondary">Tipos de tutoría en CUCEA:</h4>
                <p>El sistema contempla distintos enfoques de tutoría: <strong>individual, grupal, académica y de seguimiento</strong>, adaptándose a las necesidades de los estudiantes durante su trayectoria.</p>

                <blockquote class="blockquote my-4">
                    <p class="mb-0">"Ser tutor no es solo guiar, es acompañar con empatía, compromiso y visión de futuro."</p>
                   <br><footer class="blockquote-footer">Coordinación de Tutorías CUCEA</footer>
                </blockquote>

                <p>Gracias al esfuerzo conjunto de tutores, coordinadores y estudiantes, se fortalece una comunidad educativa más sólida y colaborativa, orientada al éxito académico y humano.</p>
            </article>
        </div>
    </div>
</main>
    <!-- Pie de página -->
    <footer class="bg-dark text-white text-center py-3">
        <p>Centro Universitario de Ciencias Económico Administrativas<br>
        Periférico Norte N° 799, Núcleo Universitario Los Belenes, C.P. 45100, Zapopan, Jalisco, México.<br>
        Teléfono: +52 (33) 3770 3300.</p>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>
