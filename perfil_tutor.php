<?php 
session_start();

if (!isset($_SESSION['codigo_udg'])) {
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    header("Expires: 0");
    header("Location: ../login_tutor.php");
    exit;
}

include '../conexion.php';

$codigo_udg = $_SESSION['codigo_udg'];

$stmt = $conexion->prepare("SELECT nombre, apellido_1, apellido_2, email, preferencia_carrera_tutor, cantidad_cantidad_de_tutorados, tipo_de_tutoria, ciclo_de_tutoria, url_foto_perfil FROM tutores WHERE codigo_udg = ?");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
</head>
<body>
<header class="bg-black text-white text-center py-2">
    <h1>Bienvenido al Sistema Digital Tutorías CUCEA</h1>
    <?php if ($tutor): ?>
        <p class="mb-0">Sesión activa como: <strong><?php echo htmlspecialchars($tutor['nombre'] . ' ' . $tutor['apellido_1'] . ' ' . $tutor['apellido_2']); ?></strong></p>
    <?php endif; ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="inicio_tutor.php"><i class="fa-solid fa-house"></i> Inicio Tutorias Maestros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="perfil_tutor.php"><i class="fa-solid fa-toolbox"></i> Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cerrar_sesion.php"><i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<main class="container my-5">
    <?php if (isset($_GET['exito'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            ¡Datos actualizados correctamente!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    <?php elseif (isset($_GET['error'])): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Ocurrió un error al actualizar los datos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    <?php endif; ?>

    <h2 class="mb-4 text-primary">Preferencias de Perfil del Tutor</h2>
    <form action="update_tutor_proceso.php" method="POST" enctype="multipart/form-data">
        <div class="row">
            <!-- Datos personales no editables -->
            <?php
            $nombre = $tutor['nombre'] ?: 'Ningún dato seleccionado';
            $apellido1 = $tutor['apellido_1'] ?: 'Ningún dato seleccionado';
            $apellido2 = $tutor['apellido_2'] ?: 'Ningún dato seleccionado';
            $email = $tutor['email'] ?: 'Ningún dato seleccionado';
            ?>
            <div class="col-md-6 mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" value="<?php echo htmlspecialchars($nombre); ?>" disabled>
            </div>
            <div class="col-md-3 mb-3">
                <label class="form-label">Primer Apellido</label>
                <input type="text" class="form-control" value="<?php echo htmlspecialchars($apellido1); ?>" disabled>
            </div>
            <div class="col-md-3 mb-3">
                <label class="form-label">Segundo Apellido</label>
                <input type="text" class="form-control" value="<?php echo htmlspecialchars($apellido2); ?>" disabled>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" value="<?php echo htmlspecialchars($email); ?>" disabled>
            </div>
        </div>

        <!-- Imagen de perfil -->
        <div class="mb-4 text-center">
            <label class="form-label">Imagen de perfil actual</label><br>
            <?php if (!empty($tutor['url_foto_perfil'])): ?>
                <img src="../<?php echo htmlspecialchars($tutor['url_foto_perfil']); ?>" alt="Foto del tutor" class="img-thumbnail mb-2" style="max-width: 150px;">
            <?php else: ?>
                <p class="text-muted">No hay imagen de perfil</p>
            <?php endif; ?>
            <input type="file" class="form-control mt-2" name="foto_tutor" accept="image/*" disabled>
        </div>

        <!-- Preferencias editables -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                Preferencias editables
            </div>
            <div class="card-body">
                <!-- Carreras preferentes -->
                <div class="mb-3">
                    <label class="form-label">Carrera(s) preferente(s)</label>
                    <div class="row">
                        <?php
                        $carreras = [
                            "LA" => "Lic. en Administración",
                            "LAFS" => "Lic. en Administración Financiera y Sistemas",
                            "LAGPP" => "Lic. en Administración Gubernamental y Políticas Públicas",
                            "LCP" => "Lic. en Contaduría Pública",
                            "LE" => "Lic. en Economía",
                            "LGNG" => "Lic. en Gestión de Negocios Gastronómicos",
                            "LGEA" => "Lic. en Gestión y Economía Ambiental",
                            "LINE" => "Lic. en Ingeniería en Negocios",
                            "LM" => "Lic. en Mercadotecnia",
                            "LMD" => "Lic. en Mercadotecnia Digital",
                            "LNI" => "Lic. en Negocios Internacionales",
                            "LRH" => "Lic. en Recursos Humanos",
                            "LRPC" => "Lic. en Relaciones Públicas y Comunicación",
                            "LTI" => "Lic. en Tecnologías de la Información",
                            "LTUR" => "Lic. en Turismo"
                        ];
                        $preferidas = explode(',', $tutor['preferencia_carrera_tutor'] ?? '');
                        foreach ($carreras as $clave => $nombre) {
                            $checked = in_array($clave, $preferidas) ? 'checked' : '';
                            echo "<div class='col-md-4'><div class='form-check'>
                                <input class='form-check-input' type='checkbox' name='preferencia_carrera_tutor[]' value='$clave' id='carrera_$clave' $checked disabled>
                                <label class='form-check-label' for='carrera_$clave'>$nombre</label>
                            </div></div>";
                        }
                        ?>
                    </div>
                </div>

                <!-- Cantidad de tutorados -->
                <div class="mb-3">
                    <label for="cantidad" class="form-label">Cantidad de Tutorados</label>
                    <input type="number" class="form-control" id="cantidad" name="cantidad_cantidad_de_tutorados"
                        value="<?php echo htmlspecialchars($tutor['cantidad_cantidad_de_tutorados'] ?: ''); ?>" disabled>
                </div>

                <!-- Tipo de tutoría -->
                <div class="mb-3">
                    <label class="form-label">Tipo(s) de Tutoría</label>
                    <div class="row">
                        <?php
                        $tipos = ["Inicio", "Trayectoria", "Trayectoria Discontinua", "Tutoría 1 a 1"];
                        $tipos_seleccionados = explode(',', $tutor['tipo_de_tutoria'] ?? '');
                        foreach ($tipos as $tipo) {
                            $checked = in_array($tipo, $tipos_seleccionados) ? 'checked' : '';
                            echo "<div class='col-md-3'><div class='form-check'>
                                <input class='form-check-input' type='checkbox' name='tipo_de_tutoria[]' value='$tipo' id='tipo_$tipo' $checked disabled>
                                <label class='form-check-label' for='tipo_$tipo'>$tipo</label>
                            </div></div>";
                        }
                        ?>
                    </div>
                </div>

                <!-- Ciclo de tutoría -->
                <div class="mb-3">
                    <label for="ciclo_tutoria" class="form-label">Ciclo de tutoría</label>
                    <select class="form-select" id="ciclo_tutoria" name="ciclo_de_tutoria" disabled>
                        <option value="">Selecciona un ciclo</option>
                        <?php
                        $ciclos = ["2025A", "2025B", "2026A", "2026B"];
                        foreach ($ciclos as $ciclo) {
                            $selected = ($tutor['ciclo_de_tutoria'] === $ciclo) ? 'selected' : '';
                            echo "<option value='$ciclo' $selected>$ciclo</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="text-end mb-3">
            <button type="button" class="btn btn-primary me-2" id="btnEditar" onclick="habilitarEdicion()">Editar Preferencias</button>
            <button type="submit" class="btn btn-success" id="btnGuardar" style="display:none;">Guardar Cambios</button>
        </div>

    </form>
</main>

<footer class="bg-dark text-white text-center py-3">
    <p>Centro Universitario de Ciencias Económico Administrativas<br>
        Periférico Norte N° 799, Núcleo Universitario Los Belenes, C.P. 45100, Zapopan, Jalisco, México.<br>
        Teléfono: +52 (33) 3770 3300.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
function habilitarEdicion() {
    document.querySelectorAll('input[type="checkbox"], input[type="number"], input[type="file"], select').forEach(el => {
        el.disabled = false;
    });
    document.getElementById('btnEditar').style.display = 'none';
    document.getElementById('btnGuardar').style.display = 'inline-block';
}
</script>
</body>
</html>
