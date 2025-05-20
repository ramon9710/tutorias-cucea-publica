<?php
session_start();
include 'conexion.php';

// Validar entradas
if (empty($_POST['codigo_udg']) || empty($_POST['password'])) {
    include 'usuario_no_escontrado.php';
    exit;
}

$codigo_udg = trim($_POST['codigo_udg']);
$password = $_POST['password'];

// Consulta segura con prepared statement
$stmt = $conexion->prepare("SELECT codigo_udg, password FROM tutores WHERE codigo_udg = ?");
$stmt->bind_param("s", $codigo_udg);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado && $resultado->num_rows === 1) {
    $usuario = $resultado->fetch_assoc();

    if (password_verify($password, $usuario['password'])) {
        $_SESSION['codigo_udg'] = $usuario['codigo_udg'];
        header('Location: tutor/inicio_tutor.php');
        exit;
    } else {
        include 'contrasenia_incorrecta.php';
        exit;
    }
} else {
    include 'usuario_no_escontrado.php';
    exit;
}

$stmt->close();
$conexion->close();
?>
