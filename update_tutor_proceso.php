<?php
session_start();
if (!isset($_SESSION['codigo_udg'])) {
    header("Location: ../login_tutor.php");
    exit;
}

include '../conexion.php';

$codigo_udg = $_SESSION['codigo_udg'];

// Procesar carreras preferentes (checkbox múltiple)
$preferencia_carrera_tutor = isset($_POST['preferencia_carrera_tutor']) ? implode(',', $_POST['preferencia_carrera_tutor']) : '';

// Procesar tipo de tutoría (checkbox múltiple)
$tipo_de_tutoria = isset($_POST['tipo_de_tutoria']) ? implode(',', $_POST['tipo_de_tutoria']) : '';

// Cantidad de tutorados y ciclo
$cantidad_cantidad_de_tutorados = isset($_POST['cantidad_cantidad_de_tutorados']) ? intval($_POST['cantidad_cantidad_de_tutorados']) : 0;
$ciclo_de_tutoria = isset($_POST['ciclo_de_tutoria']) ? $_POST['ciclo_de_tutoria'] : '';

// Procesar imagen de perfil
$url_foto_perfil = null;
if (isset($_FILES['foto_tutor']) && $_FILES['foto_tutor']['error'] === UPLOAD_ERR_OK) {
    $dir = "../img/perfiles/";
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
    $ext = pathinfo($_FILES['foto_tutor']['name'], PATHINFO_EXTENSION);
    $filename = $codigo_udg . "_" . time() . "." . $ext;
    $ruta = $dir . $filename;
    if (move_uploaded_file($_FILES['foto_tutor']['tmp_name'], $ruta)) {
        $url_foto_perfil = "img/perfiles/" . $filename;
    }
}

// Construir la consulta SQL
$sql = "UPDATE tutores SET preferencia_carrera_tutor=?, cantidad_cantidad_de_tutorados=?, tipo_de_tutoria=?, ciclo_de_tutoria=?";
$params = [$preferencia_carrera_tutor, $cantidad_cantidad_de_tutorados, $tipo_de_tutoria, $ciclo_de_tutoria];

if ($url_foto_perfil) {
    $sql .= ", url_foto_perfil=?";
    $params[] = $url_foto_perfil;
}
$sql .= " WHERE codigo_udg=?"; 
$params[] = $codigo_udg;

// Preparar y ejecutar
$stmt = $conexion->prepare($sql);
$types = "siss" . ($url_foto_perfil ? "s" : "") . "s";
$stmt->bind_param($types, ...$params);

if ($stmt->execute()) {
    header("Location: perfil_tutor.php?exito=1");
    exit;
} else {
    header("Location: perfil_tutor.php?error=1");
    exit;
}
$stmt->close();
?>

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
